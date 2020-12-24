<?php

namespace App\Http\Controllers\Admin;

use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Http\Requests\MassDestroySubjectRequest;
use Session;
use Auth;
use App\Program;
use App\Grade;

class SubjectController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        abort_if(Gate::denies('subject-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subjects = subject::all();

        return view('admin.backend.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort_if(Gate::denies('subject-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $programs = Program::pluck('title','id')->prepend('Please select a program','');
        return view('admin.backend.subjects.create', compact('programs'));
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
        $data=[
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'subject_code' => $request->subject_code,
            'description' => $request->description,
            'grade_id' => $request->grade_id,
            'deadline' => $request->deadline
        ];
        $subject = Subject::create($data);    

        Session::flash('flash_success', 'Subject created successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.subjects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
        abort_if(Gate::denies('subject-show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('admin.backend.subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {        
        abort_if(Gate::denies('subject-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');                
        $programs = Program::pluck('title','id')->prepend('Please select a program','');
        $subject->load('grade');
        return view('admin.backend.subjects.edit', compact('subject','programs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {    
        // dd($request->all());
         $data=[
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'subject_code' => $request->subject_code,
            'description' => $request->description,
            'grade_id' => $request->grade_id,
            'deadline' => $request->deadline
        ];
        // dd($data);
        $subject->update($data);        

        Session::flash('flash_success', 'Subject updated successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
        abort_if(Gate::denies('subject-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subject->delete();

        Session::flash('flash_danger', 'Subject has been deleted !.');
        Session::flash('flash_type', 'alert-danger');
        return back();
    }

    public function massDestroy(MassDestroySubjectRequest $request)
    {
        Subject::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    public function getGrades(Request $request)
    {
        $program_id = $request->programId;
        return Grade::where('program_id',$program_id)->get();
    }

    
}
