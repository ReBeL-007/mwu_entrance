<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Gate;
use App\Sub;
use Session;
use App\Exam;
use App\Admin;
use App\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Http\Requests\MassDestroyExamRequest;
use Symfony\Component\HttpFoundation\Response;

class ExamController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth:admin')->except(['create','store','fraudCheck','printform','printformdetails']);
        $this->middleware('auth')->only(['create']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('exam-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $datas = Exam::orderBy('regd_no','asc')->get();
        $datas = Exam::with(['faculties','levels','course'])->orderBy('created_at','asc')->get();
        return view('admin.backend.exams.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // abort_if(Gate::denies('question-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $subjects = Subject::all()->pluck('title','id')->prepend('please select a subject...','');
        // return view('admin.backend.questions.create', compact('subjects'));
        $faculties = Faculty::all()->pluck('name','id');
        $colleges = Admin::whereHas('roles', function ($query)
                            {
                                $query->where('id', 2);
                            })                          
                            ->where('name','MUSOM')
                            ->first();
        return view('internal-exam-form',compact('faculties','colleges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request)
    {
        // dd($request->all());
        $user_id = Auth::user()->id;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $file = $request->file('image');
            $file_name= uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/uploads/exams/image',$file_name);
        }else{
            //if statement checks if file is a file and is valid, otherwise no file to upload
            return "Failed to upload photo";

        }
        if($request->hasFile('signature') && $request->file('signature')->isValid()){
            $file = $request->file('signature');
            $signature= uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/uploads/exams/signature',$signature);
        }else{
            //if statement checks if file is a file and is valid, otherwise no file to upload
            return "Failed to upload signature";

        }
        if($request->hasFile('voucher') && $request->file('voucher')->isValid()){
            $file = $request->file('voucher');
            $voucher= uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/uploads/exams/voucher',$voucher);
        }else{
            $voucher= null;

        }
        $data=[
            'faculty' => $request->faculty,
            'campus' => $request->campus,
            'level' => $request->level,
            'programs' => $request->programs,
            'year' => $request->year,
            'sex' => $request->sex,
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'regd_no' => $request->regd_no,
            'symbol_no' => $request->symbol_no,
            'semester' => $request->semester,
            'exam_type' => $request->exam_type,
            'subjects' => json_encode($request->subjects),
            'subject_codes' => json_encode($request->subject_codes),
            'image' => $file_name,
            'signature' => $signature,
            'voucher' => $voucher,
            'nationality' => $request->nationality,
            'dateOfBirth' => $request->dateOfBirth,
            'district' => $request->district,
            'mother_name' => $request->mother_name,
            'father_name' => $request->father_name,
            'ward' => $request->ward,
            'contact' => $request->contact,
            'email' => $request->email,
            'board' => json_encode($request->board),
            'passed_year' => json_encode($request->passed_year),
            'roll_no' => json_encode($request->roll_no),
            'division' => json_encode($request->division),
            'consent' => $request->consent,
            'pid' => substr(md5(time()), 0, 16),
            'payment_method' => $request->payment_method,
            'user_id' => $user_id,
        ];
        // dd($data);
        $form = Exam::create($data);

        Session::flash('flash_success', 'Form successfully submitted for verification!.');
        Session::flash('flash_type', 'alert-success');
        if($request->payment_method == 0) {
            return redirect()->route('home');
        } else {
            return view('esewa2',compact('form'));
        }
        // return redirect()->route('admin.exams.create')->with('modal','true');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
        // abort_if(Gate::denies('exam-show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $exam->load('subject');
        return view('admin.backend.exams.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($data)
    {
        //
        abort_if(Gate::denies('exam-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = Exam::find($data);
        $data->load(['faculties','levels','course']);
        $faculties = Faculty::all()->pluck('name','id');

        $subject_ids = json_decode($data->subjects);
        $subjects = Sub::whereIn('id',$subject_ids)->get();
        return view('admin.backend.exams.edit', compact('data','faculties','subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        //  dd($request->all());
        $auth = Auth::user();

         $data=[
            'faculty' => $request->faculty,
            // 'campus' => $request->campus,
            'level' => $request->level,
            'programs' => $request->programs,
            'year' => $request->year,
            'sex' => $request->sex,
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'regd_no' => $request->regd_no,
            'symbol_no' => $request->symbol_no,
            'semester' => $request->semester,
            'exam_type' => $request->exam_type,
            'subjects' => json_encode($request->subjects),
            'subject_codes' => json_encode($request->subject_codes),
            'nationality' => $request->nationality,
            'dateOfBirth' => $request->dateOfBirth,
            'district' => $request->district,
            'mother_name' => $request->mother_name,
            'father_name' => $request->father_name,
            'ward' => $request->ward,
            'contact' => $request->contact,
            'email' => $request->email,
            'is_verified' => 1
            // 'form_serial_no' => $request->form_serial_no,
        ];
        
        // dd($data);
        $exam->update($data);

        Session::flash('flash_success', 'Form approved successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.exams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
        abort_if(Gate::denies('exam-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $exam->delete();

        Session::flash('flash_danger', 'Form has been deleted !.');
        Session::flash('flash_type', 'alert-danger');
        return back();
    }

    public function massDestroy(MassDestroyExamRequest $request)
    {
        Exam::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    public function download($file) {
        return response()->download(public_path("questions/{$file}"));
    }

    public function generateform(Exam $exam)
    {
        // abort_if(Gate::denies('payment-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $exam->load('fee','student','fine_payments');

        return view('admin.backend.exams.create', compact('exam'));
    }

    public function printform(Exam $exam)
    {
        // abort_if(Gate::denies('payment-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $exam->load(['faculties','levels','course']);
        // $exam->load('fee','student','fine_payments');
        // $faculties = Faculty::all()->pluck('name','id');
        // $exam->load('fee','student','fine_payments');
        $subject_ids = json_decode($exam->subjects);
        $subjects = Sub::whereIn('id',$subject_ids)->get();
        return view('admin.backend.exams.print', compact('exam','subjects'));
    }

public function printmultipleform(Request $request)
{
    $ids = explode(',',$request->ids);
    $exams = Exam::with(['faculties','levels','course'])->whereIn('id',$ids)->get();
    foreach ($exams as $key => $exam) {
        $subject_ids = json_decode($exam->subjects);
        $subjects = Sub::whereIn('id',$subject_ids)->get();
        $exam->subjects = $subjects;
    }
    return view('admin.backend.exams.printM', compact('exams'));
}

public function printtriplicate(Request $request)
{
    $college_data = [
        'college' => $request->college,
        'program' => $request->program,
        'semester' => $request->semester,
    ];
    $ids = explode(',',$request->ids);
    $exams = Exam::whereIn('id',$ids)->get();
    foreach ($exams as $key => $exam) {
        $subject_ids = json_decode($exam->subjects);
        $subjects = Sub::whereIn('id',$subject_ids)->get();
        $exam->subjects = $subjects;
    }
    return view('admin.backend.exams.triplicate', compact('exams','college_data'));
}

    public function printformdetails(Exam $exam)
    {
        $exam->load(['faculties','levels','course']);
        $subject_ids = json_decode($exam->subjects);
        $subjects = Sub::whereIn('id',$subject_ids)->get();
        $exam->subjects = $subjects;
        // $exam->load('fee','student','fine_payments');
        $faculties = Faculty::all()->pluck('name','id');

        return view('admin.backend.exams.print_studentdetails', compact('exam','faculties'));
    }

    public function printmultipleformdetails(Request $request)
    {
        $ids = explode(',',$request->ids);
        $exams = Exam::with(['faculties','levels','course'])->whereIn('id',$ids)->get();
        foreach ($exams as $key => $exam) {
            $subject_ids = json_decode($exam->subjects);
            $subjects = Sub::whereIn('id',$subject_ids)->get();
            $exam->subjects = $subjects;
        }
        // $exam->load('fee','student','fine_payments');
        $faculties = Faculty::all()->pluck('name','id');

        return view('admin.backend.exams.print_studentdetailsM', compact('exams','faculties'));
    }

    public function fraudCheck(Exam $exam)
    {
        // esewa stuffs
        $url = "https://esewa.com.np/epay/transrec";
        $data =[
            'amt'=> $exam->colleges->form_charge,
            'rid'=> $_GET['refId'],
            'pid'=> $exam->pid,
            'scd'=> $exam->colleges->merchant_no
        ];

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);
            // dd($response);
        // end of esewa stuffs

        if(strpos($response,'Success') !== false) {
            $exam->esewa_amt = $data['amt'];
            $exam->esewa_status = 1;
            $exam->rid = $data['rid'];
            $exam->scd = $data['scd'];
            $exam->save();
            Session::flash('flash_success', 'eSewa payment successfully made!.');
            Session::flash('flash_type', 'alert-success');
            return redirect()->route('home');
        } else {
            Session::flash('flash_danger', 'eSewa payment was unsuccessful!.');
            Session::flash('flash_type', 'alert-danger');
            return redirect()->route('home');
        }
    }

}
