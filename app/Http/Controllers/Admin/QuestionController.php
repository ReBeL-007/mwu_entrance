<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subject;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Requests\MassDestroyQuestionRequest;
use Session;
use Auth;

class QuestionController extends Controller
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
        abort_if(Gate::denies('question-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::with('subject')->get();
        // dd($questions);
        return view('admin.backend.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort_if(Gate::denies('question-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $subjects = Subject::all()->pluck('title','id')->prepend('please select a subject...','');        
        return view('admin.backend.questions.create', compact('subjects'));
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        // dd($request->file('files')->isValid());
        if($request->hasFile('files') && $request->file('files')->isValid()){
            $file = $request->file('files');
            $file_name= uniqid().'_'.$file->getClientOriginalName();
                $file->move(public_path().'/questions', $file_name);
                $files = $file_name;
        }else{
            //if statement checks if file is a file and is valid, otherwise no file to upload
            return "Failed to upload";

        }
        $data=[           
            'subject_id' => $request->subject_id,
            'files' => $files
        ];
        // dd($data);
        Question::create($data);    

        Session::flash('flash_success', 'Question created successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.questions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(question $question)
    {
        //
        abort_if(Gate::denies('question-show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $question->load('subject');
        return view('admin.backend.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(question $question)
    {
        //
        abort_if(Gate::denies('question-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');                
        $subjects = Subject::all()->pluck('title','id')->prepend('please select a subject...','');        
        $question->load('subject');
        // dd($question);
        return view('admin.backend.questions.edit', compact('question','subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, question $question)
    {    
        //  dd($request->all());
         $data=[
            'subject_id' => $request->subject_id,
            // 'description' => $request->description
        ];
        $question->update($data);        

        Session::flash('flash_success', 'Question updated successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $question)
    {
        //
        abort_if(Gate::denies('question-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->delete();

        Session::flash('flash_danger', 'Question has been deleted !.');
        Session::flash('flash_type', 'alert-danger');
        return back();
    }

    public function massDestroy(MassDestroyQuestionRequest $request)
    {
        Question::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    public function download($file) {
        return response()->download(public_path("questions/{$file}"));
    }
}
