<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Level;
use App\Faculty;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreLevelRequest;
use App\Http\Requests\UpdateLevelRequest;
use App\Http\Requests\MassDestroyLevelRequest;
use Session;
use Auth;

class LevelsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin')->except('getlevels');
    }
    //
    public function index()
    {

        abort_if(Gate::denies('level-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $levels = Level::all();

        return view('admin.backend.levels.index', compact('levels'));
    }

    public function create()
    {
        abort_if(Gate::denies('level-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $faculties = Faculty::all()->pluck('name','id');
        // $groups = Auth::user()->groups;
        return view('admin.backend.levels.create',compact('faculties'));
    }

    public function store(StoreLevelRequest $request)
    {
        // dd($request->all());
        $data=[
            'name' => $request->name,
            'description' => $request->description,
            'slug' => str_slug($request->name)
        ];
        // dd($data);
        $level = Level::create($data);
        $level->faculties()->sync($request->input('faculty_id', []));

        Session::flash('flash_success', 'Level created successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.levels.index');

    }

    public function edit(Level $level)
    {
        abort_if(Gate::denies('level-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $level->load('faculties');
        $faculties = Faculty::all()->pluck('name','id');
        // $groups = Auth::user()->groups;
        // dd($level);
        return view('admin.backend.levels.edit', compact('level','faculties'));
    }

    public function update(UpdateLevelRequest $request, Level $level)
    {
        // dd($request);
        $data=[
            'name' => $request->name,
            'description' => $request->description,
            'slug' => str_slug($request->name)
        ];
        // dd($data);
        $level->update($data);
        $level->faculties()->sync($request->faculty_id);
        Session::flash('flash_success', 'Level updated successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.levels.index');

    }

    public function show(Level $level)
    {
        abort_if(Gate::denies('level-show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.backend.levels.show', compact('level'));
    }

    public function destroy(Level $level)
    {
        abort_if(Gate::denies('level-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $level->delete();

        Session::flash('flash_danger', 'Level has been deleted !.');
        Session::flash('flash_type', 'alert-danger');
        return back();

    }

    public function getlevels(Request $request)
    {
        $faculty_id = $request->facultyId;

        $levels = Level::whereHas('faculties' , function ($query) use ($faculty_id)
                                {
                                    $query->where('faculty_id', $faculty_id);
                                })
                                ->with('faculties')
                                ->get();

        return $levels;

    }

    public function massDestroy(MassDestroyLevelRequest $request)
    {
        Level::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    public function addLevel(Request $request)
    {
        $data=[
            'name' => $request->data['name'],
            'description' => $request->data['description'],
            'slug' => str_slug($request->data['name'])
        ];
        // dd($data);
        $level = Level::create($data);
        return $level;

    }
}
