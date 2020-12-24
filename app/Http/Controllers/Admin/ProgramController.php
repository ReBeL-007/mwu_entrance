<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Program;
use App\Grade;
use App\Permission;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Http\Requests\MassDestroyProgramRequest;
use Session;

class ProgramController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //
    public function index()
    {
       
        abort_if(Gate::denies('program-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::all();

        return view('admin.backend.programs.index', compact('programs'));
    }

    public function create()
    {
        abort_if(Gate::denies('program-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.backend.programs.create');
    }

    public function store(StoreProgramRequest $request)
    {
        $data=[
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'description' => $request->description,
        ];

        $program = Program::create($data);
        foreach($request->grades as $grade) {
            $program->grades()->create([
                'title' => $grade
            ]);
        }

        Session::flash('flash_success', 'Program created successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.programs.index');

    }

    public function edit(Program $program)
    {
        abort_if(Gate::denies('program-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
      

        return view('admin.backend.programs.edit', compact('program'));
    }

    public function update(UpdateProgramRequest $request, Program $program)
    {
        // dd($request->all());
        $data=[
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'description' => $request->description,
        ];
        // dd($data);
        $program->update($data);
        
        Grade::where('program_id',$program->id)->delete();
        foreach($request->grades as $grade) {
            $program->grades()->create([
                'title' => $grade
            ]);
        }
        Session::flash('flash_success', 'Program updated successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.programs.index');

    }

    public function show(Program $program)
    {
        abort_if(Gate::denies('program-show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
   
        
        return view('admin.backend.programs.show', compact('program'));
    }

    public function destroy(Program $program)
    {
        abort_if(Gate::denies('program-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $program->delete();

        Session::flash('flash_danger', 'Program has been deleted !.');
        Session::flash('flash_type', 'alert-danger');
        return back();

    }

    public function massDestroy(MassDestroyProgramRequest $request)
    {
        Program::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
