<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Level;
use App\Faculty;
// use App\ProgramType;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Requests\MassDestroyCourseRequest;
use Session;
use Auth;

class CoursesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin')->except('getCourses');
    }
    //
    public function index()
    {

        abort_if(Gate::denies('course-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::all();

        return view('admin.backend.courses.index', compact('courses'));
    }

    public function create()
    {

        abort_if(Gate::denies('course-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $faculties = Faculty::all()->pluck('name','id');
        // $programtypes = ProgramType::all()->pluck('name','id');
        // $groups = Auth::user()->groups;
        // foreach($groups as $g){
        //     dd($g);
        // }
        return view('admin.backend.courses.create',compact('faculties'));
    }

    public function store(StoreCourseRequest $request)
    {
        // dd($request->all());
        $data=[
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'duration' => $request->duration,
            'description' => $request->description,
            'slug' => str_slug($request->name),
            'faculty_id' => $request->faculty_id,
            'level_id' => $request->level_id,
            'created_by' => Auth::user()->name,
        ];
        $max_weight = Course::pluck('weight')->max();

            if($request['weight'] == null){

                $data['weight'] = $max_weight + 10;
            }
        // dd($data);
        $course = Course::create($data);
        // $course->coursetypes()->sync($request->input('programtypes', []));

        Session::flash('flash_success', 'course created successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.courses.index');

    }

    public function edit(Course $course)
    {
        abort_if(Gate::denies('course-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $faculties = Faculty::all()->pluck('name','id');
        // $programtypes = ProgramType::all()->pluck('name','id');
        // $groups = Auth::user()->groups;
        $course->load(['faculty','level']);
        $faculty_id = $course->faculty_id;
        $levels = Level::whereHas('faculties' , function ($query) use ($faculty_id)
                                {
                                    $query->where('faculty_id', $faculty_id);
                                })
                                ->with('faculties')
                                ->pluck('name','id');

        // dd($levels);
        return view('admin.backend.courses.edit', compact('course','faculties','levels'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
    //  dd($request);
        $data=[
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'duration' => $request->duration,
            'description' => $request->description,
            'slug' => str_slug($request->name),
            'faculty_id' => $request->faculty_id,
            'level_id' => $request->level_id,
            'created_by' => Auth::user()->name,
        ];

        // dd($data);
        $course->update($data);
        // $course->coursetypes()->sync($request->input('programtypes', []));

        Session::flash('flash_success', 'course updated successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.courses.index');

    }

    public function show(Course $course)
    {
        abort_if(Gate::denies('course-show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $course->load('coursetypes');
        return view('admin.backend.courses.show', compact('course'));
    }

    public function destroy(Course $course)
    {
        abort_if(Gate::denies('course-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->delete();

        Session::flash('flash_danger', 'course has been deleted !.');
        Session::flash('flash_type', 'alert-danger');
        return back();

    }

    public function massDestroy(MassDestroyCourseRequest $request)
    {
        // dd($request);
        Course::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    public function getCourses(Request $request)
    {

        $level_id = $request->levelId;
        $faculty_id = $request->facultyId;
        // dd($faculty_id);
        $courses = Course::where([
                                    ['level_id',$level_id ],
                                    ['faculty_id',$faculty_id]
                                ])->get();
        // dd($courses);
        return $courses;

    }

    public function getCourseTypes(Request $request)
    {
        $course_id = $request->courseId;
        $courses = Course::with('coursetypes')->find($course_id);
        return $courses;

    }
}
