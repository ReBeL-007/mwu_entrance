<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faculty;
use App\Level;
use App\Program;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use App\Http\Requests\MassDestroyFacultyRequest;
use Session;

class FacultyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //
    public function index()
    {
       
        abort_if(Gate::denies('faculty-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faculties = Faculty::all();

        return view('admin.backend.faculties.index', compact('faculties'));
    }

    public function create()
    {
        abort_if(Gate::denies('faculty-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $levels = Level::all()->pluck('name','id');

        return view('admin.backend.faculties.create',compact('levels'));
    }

    public function store(StoreFacultyRequest $request)
    {
        // dd($request->all());
        $data=[
            'name' => $request->name,
            'description' => $request->description,
            'slug' => str_slug($request->name)
        ];
        
        // dd($request->input('programs', []));
        $faculty = Faculty::create($data);
        $faculty->levels()->sync($request->input('levels', []));

        Session::flash('flash_success', 'Faculty created successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.faculty.index');

    }

    public function edit(Faculty $faculty)
    {
        abort_if(Gate::denies('faculty-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $levels = Level::all()->pluck('name','id');
        $faculty->load('levels');
        return view('admin.backend.faculties.edit', compact('faculty','levels'));
    }

    public function update(UpdateFacultyRequest $request, Faculty $faculty)
    {
        // dd($request);
        $data=[
            'name' => $request->name,
            'description' => $request->description,
            'slug' => str_slug($request->name)
        ];
        // dd($data);
        $faculty->update($data);
        $faculty->levels()->sync($request->input('levels', []));

        Session::flash('flash_success', 'Faculty updated successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.faculty.index');

    }

    public function show(Faculty $faculty)
    {
        abort_if(Gate::denies('faculty-show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $faculty->load('programs');
        return view('admin.backend.faculties.show', compact('faculty'));
    }

    public function destroy(Faculty $faculty)
    {
        abort_if(Gate::denies('faculty-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faculty->delete();

        Session::flash('flash_danger', 'Faculty has been deleted !.');
        Session::flash('flash_type', 'alert-danger');
        return back();

    }

    public function massDestroy(MassDestroyFacultyRequest $request)
    {
        Faculty::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
