<?php

namespace App\Http\Controllers\Admin;

use App\Sub;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreSubRequest;
use App\Http\Requests\UpdateSubRequest;
use App\Http\Requests\MassDestroySubRequest;
use Session;
use Auth;
use App\Course;
use App\Faculty;

class SubController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth:admin')->except(['getSubs','getSub']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // abort_if(Gate::denies('sub-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $subs = Sub::all();

        // return view('admin.backend.subs.index', compact('subs'));
    }

    public function courseSubjects($id)
    {
        abort_if(Gate::denies('sub-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subs = Sub::where('course_id',$id)->with('course')->get();

        return view('admin.backend.subs.index', compact('subs','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // dd($id);
        abort_if(Gate::denies('sub-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $course = Course::where('id',$id)->pluck('name','id');
        // dd($course);
        return view('admin.backend.subs.create', compact('course','id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubRequest $request)
    {
        // dd($request->all());
        $data=[
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'subject_code' => $request->subject_code,
            'description' => $request->description,
            'course_id' => $request->course_id,
            'semester' => $request->semester
        ];
        $subject = Sub::create($data);

        Session::flash('flash_success', 'Subject created successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.subs.courseSubjects', $request->course_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Sub $sub)
    {
        //
        abort_if(Gate::denies('sub-show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.backend.subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Sub $sub)
    {
        abort_if(Gate::denies('sub-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $course = Course::where('id',$sub->course_id)->pluck('name','id');
        $sub->load('course');
        return view('admin.backend.subs.edit', compact('sub','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubRequest $request, Sub $sub)
    {
        // dd($request->all());
         $data=[
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'subject_code' => $request->subject_code,
            'description' => $request->description,
            'course_id' => $request->course_id,
            'semester' => $request->semester
        ];
        // dd($data);
        $sub->update($data);

        Session::flash('flash_success', 'Subject updated successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.subs.courseSubjects', $request->course_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub $sub)
    {
        //
        abort_if(Gate::denies('sub-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub->delete();

        Session::flash('flash_danger', 'Subject has been deleted !.');
        Session::flash('flash_type', 'alert-danger');
        return back();
    }

    public function massDestroy(MassDestroySubRequest $request)
    {
        Sub::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    public function getSubs(Request $request)
    {
        $program_id = $request->programId;
        $semester = $request->semester;
        return Sub::where([
                            ['course_id',$program_id ],
                            ['semester',$semester]
                        ])->get();
    }
    public function getSub(Request $request)
    {
        return Sub::where('id',$request->id)->first();
    }


}
