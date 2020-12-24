<?php

namespace App\Http\Controllers\Receipt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Faculty;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Receipt\StoreProgramRequest;
use App\Http\Requests\Receipt\UpdateProgramRequest;
use App\Http\Requests\Receipt\MassDestroyProgramRequest;
use Session;
use Auth;

class ProgramsController extends Controller
{

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
        $faculties = Faculty::all()->pluck('name','id');
        $groups = Auth::user()->groups;
        return view('admin.backend.programs.create',compact('faculties','groups'));
    }

    public function store(StoreProgramRequest $request)
    {
        // dd($request->all());
        $data=[
            'name' => $request->name,
            'description' => $request->description,
            'slug' => str_slug($request->name)
        ];
        // dd($data);
        $program = Program::create($data);
        $program->faculties()->sync($request->faculty_id);
        Session::flash('flash_success', 'program created successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.programs.index');

    }

    public function edit(Program $program)
    {
        abort_if(Gate::denies('program-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $program->load('faculties');
        $faculties = Faculty::all()->pluck('name','id');
        $groups = Auth::user()->groups;
        // dd($program);
        return view('admin.backend.programs.edit', compact('program','faculties','groups'));
    }

    public function update(UpdateProgramRequest $request, Program $program)
    {
        // dd($request);
        $data=[
            'name' => $request->name,
            'description' => $request->description,
            'slug' => str_slug($request->name)
        ];
        // dd($data);
        $program->update($data);
        $program->faculties()->sync($request->faculty_id);
        Session::flash('flash_success', 'program updated successfully!.');
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

        Session::flash('flash_danger', 'program has been deleted !.');
        Session::flash('flash_type', 'alert-danger');
        return back();

    }

    public function getPrograms(Request $request)
    {
        $faculty_id = $request->facultyId;

        $programs = Program::whereHas('faculties' , function ($query) use ($faculty_id)
                                {
                                    $query->where('faculty_id', $faculty_id);
                                })
                                ->with('faculties')
                                ->get();

        return $programs;

    }

    public function massDestroy(MassDestroyProgramRequest $request)
    {
        Program::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    public function addProgram(Request $request)
    {
        $data=[
            'name' => $request->data['name'],
            'description' => $request->data['description'],
            'slug' => str_slug($request->data['name'])
        ];
        // dd($data);
        $program = Program::create($data);
        return $program;

    }
}
