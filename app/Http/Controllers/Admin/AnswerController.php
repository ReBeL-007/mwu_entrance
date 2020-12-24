<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Gate;
use Session;
use App\Answer;
use App\Program;
use App\Subject;
use \Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroyAnswerRequest;
use Illuminate\Contracts\Encryption\DecryptException;

class AnswerController extends Controller
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
        abort_if(Gate::denies('answer-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $auth_roles = Auth::user()->roles()->pluck('title');
        $admin = Auth::user()->id;

        //getting only accessible answers for user group
        foreach($auth_roles as $key => $role){
            if($role == 'IT Admin' || $role == 'Admin'){
                $answers = Answer::with('subject')->get();
                break;
            }
            else{
                $answers = Answer::where('admin_id',$admin)->with('subject')->get();
            }
        }
        foreach ($answers as $answer) {
            $startTime = Carbon::now();
            $endTime = Carbon::parse($answer->subject->deadline);
            $timeRemaining = $endTime->diffForHumans($startTime);
            // dd($timeRemaining);
            if(str_contains($timeRemaining,'before')){
                $answer->expired = 1;
            }
            $answer->hash = Crypt::encrypt($answer->id);
        }
        // dd($answers);
        return view('admin.backend.answers.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort_if(Gate::denies('answer-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $programs = Program::pluck('title','id')->prepend('Please select a program','');
        return view('admin.backend.answers.create', compact('programs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswerRequest $request)
    {
        // dd($request->all());
        $current = Carbon::now();
        $subject = Subject::findOrFail($request->subject_id);
        $deadline = $subject->deadline;

        if(!$deadline || $current < $deadline) {
            // if subject has no deadline or gets submitted before dealine

            // if($request->hasFile('files')){
            //     $file = $request->file('files');
            //     $file_name= $file->getClientOriginalName();
            //     $file->storeAs('public/uploads/answers',$file_name);
            // }else{

                //if statement checks if file is a file and is valid, otherwise no file to upload
            
                //     return "Failed to upload";
            // }
            
        $data=[
            'subject_id' => $request->subject_id,
            'admin_id' => Auth::user()->id,
            // 'files' => $file_name,
        ];
        $answer = Answer::create($data);  
        $answer->hash = Crypt::encrypt($answer->id);
        return view('admin.backend.answers.tus',compact('answer'));

        } else {
            // late submission won't be accepted
            Session::flash('flash_danger', 'Sorry... you missed the deadline for submission !');
            Session::flash('flash_type', 'alert-danger');
            return redirect()->route('admin.answers.index');
        }
        // $data=[
        //     'subject_id' => $request->subject_id,
        //     'admin_id' => Auth::user()->id,
        //     'files' => $file_name,
        // ];
        // $answer = Answer::create($data);
        // Session::flash('flash_success', 'Answer created successfully!.');
        // Session::flash('flash_type', 'alert-success');
        // return redirect()->route('admin.answers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $Answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
        abort_if(Gate::denies('answer-show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $answer->load('subject','user');
        return view('admin.backend.answers.show', compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
        abort_if(Gate::denies('answer-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $subjects = Subject::all()->pluck('title','id')->prepend('please select a subject...','');
        $answer->load('subject');
        return view('admin.backend.answers.edit', compact('answer','subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
         $data=[
            'subject_id' => $request->subject_id,
            'admin_id' => Auth::user()->id,
            // 'description' => $request->description
        ];
        $answer->update($data);

        Session::flash('flash_success', 'Answer updated successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.answers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
        abort_if(Gate::denies('answer-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $answer->delete();

        Session::flash('flash_danger', 'Answer has been deleted !.');
        Session::flash('flash_type', 'alert-danger');
        return back();
    }

    public function massDestroy(MassDestroyAnswerRequest $request)
    {
        Answer::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function download($file) {
        return response()->download(storage_path("app/public/uploads/answers/{$file}"));
    }

    public function getSubject(Request $request)
    {
        $subject_id = $request->subjectId;
        return Subject::findOrFail($subject_id);
    }

    public function getSubjects(Request $request)
    {
        $grade_id = $request->gradeId;
        return Subject::where('grade_id',$grade_id)->get();
    }

    public function uploaded(Request $request){
        $id = Crypt::decrypt($request->hash);
        $answer = Answer::find($id);
        if($answer->is_uploaded){
            abort(404);
        }
        $answer->files = $request->filename;
        $answer->is_uploaded = 1;
        $answer->update();
        return response('200');
    }
    public function tusUpload($hash)
    {
        try {
            $id = Crypt::decrypt($hash);
        } catch (DecryptException $e) {
            abort(404);
        }
        $answer = Answer::find($id);
        if($answer->is_uploaded){
            abort(404);
        }
        $answer->hash = Crypt::encrypt($answer->id);
        return view('admin.backend.answers.tus',compact('answer'));
    }
}
