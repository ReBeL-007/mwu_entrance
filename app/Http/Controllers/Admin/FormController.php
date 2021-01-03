<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Gate;
use App\Sub;
use Session;
use App\Form;
use App\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFormRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Http\Requests\MassDestroyFormRequest;
use Symfony\Component\HttpFoundation\Response;

class FormController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth:admin')->except(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('form-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $datas = Form::orderBy('regd_no','asc')->get();
        $datas = [];
        $user = Auth::user();

        $groups = $user->groups()->pluck('title');

        // dd($groups);
        //getting only accessible courses for user group
        foreach($groups as $key => $group){
            if($group == 'Owner'){
                // $datas = Form::where('is_verified','1')->with(['faculties','levels','course'])->orderBy('created_at','asc')->get();
                $datas = Form::with(['faculties','levels','course'])->orderBy('created_at','asc')->get();
                break;
            }
            else{
                $courses_under_faculty[$key] = Form::where('is_verified','1')->whereHas('faculties' , function ($query) use ($group)
                                                        {
                                                            $query->where('name', $group);
                                                        })
                                                        ->with(['faculties','levels','course'])
                                                        ->orderBy('created_at','asc')
                                                        ->get();
            }
        }

        //converting multidimentional array of courses to single in order to return to view
        if(isset($courses_under_faculty) && !empty($courses_under_faculty)){
            foreach($courses_under_faculty as $course){
                foreach($course as $c){
                    $datas[] = $c;
                }
            }
        }

        foreach($user->roles as $role){
            if($role->title==='User'){
                $datas = Form::where('campus',$user->name)->orderBy('created_at','asc')->get();
            }
        }
        // $datas = Form::all();

        return view('admin.backend.forms.index', compact('datas'));
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
        return view('exam-form',compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormRequest $request)
    {
        $user_id = Auth::user()->id;
        $data = Form::where('user_id',$user_id)->first();
        if($data) {
            Session::flash('flash_warning', 'Sorry... you have already submitted the admission form!.');
            Session::flash('flash_type', 'alert-warning');
            return redirect()->route('home');
        }
        
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $file = $request->file('image');
            $file_name= uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/uploads/image',$file_name);
        }else{
            //if statement checks if file is a file and is valid, otherwise no file to upload
            return "Failed to upload photo";

        }
        if($request->hasFile('signature') && $request->file('signature')->isValid()){
            $file = $request->file('signature');
            $signature= uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/uploads/signature',$signature);
        }else{
            //if statement checks if file is a file and is valid, otherwise no file to upload
            return "Failed to upload signature";

        }
        if($request->hasFile('voucher') && $request->file('voucher')->isValid()){
            $file = $request->file('voucher');
            $voucher= uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/uploads/voucher',$voucher);
        }else{
            $voucher= null;

        }
        if($request->hasFile('see_certificate') && $request->file('see_certificate')->isValid()){
            $file = $request->file('see_certificate');
            $see_certificate= uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/uploads/see_certificate',$see_certificate);
        }else{
            //if statement checks if file is a file and is valid, otherwise no file to upload
            return "Failed to upload see certificate";

        }
        if($request->hasFile('see_marksheet') && $request->file('see_marksheet')->isValid()){
            $file = $request->file('see_marksheet');
            $see_marksheet= uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/uploads/see_marksheet',$see_marksheet);
        }else{
            //if statement checks if file is a file and is valid, otherwise no file to upload
            return "Failed to upload see marksheet";

        }
        if($request->hasFile('intermediate_certificate') && $request->file('intermediate_certificate')->isValid()){
            $file = $request->file('intermediate_certificate');
            $intermediate_certificate= uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/uploads/intermediate_certificate',$intermediate_certificate);
        }else{
            //if statement checks if file is a file and is valid, otherwise no file to upload
            return "Failed to upload intermediate certificate";

        }
        if($request->hasFile('intermediate_marksheet') && $request->file('intermediate_marksheet')->isValid()){
            $file = $request->file('intermediate_marksheet');
            $intermediate_marksheet= uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/uploads/intermediate_marksheet',$intermediate_marksheet);
        }else{
            //if statement checks if file is a file and is valid, otherwise no file to upload
            return "Failed to upload intermediate marksheet";

        }
        // if($request->hasFile('bachelor_certificate') && $request->file('bachelor_certificate')->isValid()){
        //     $file = $request->file('bachelor_certificate');
        //     $bachelor_certificate= uniqid().'_'.$file->getClientOriginalName();
        //     $file->storeAs('public/uploads/bachelor_certificate',$bachelor_certificate);
        // }else{
        //     //if statement checks if file is a file and is valid, otherwise no file to upload
        //     return "Failed to upload bachelor certificate";

        // }
        // if($request->hasFile('bachelor_marksheet') && $request->file('bachelor_marksheet')->isValid()){
        //     $file = $request->file('bachelor_marksheet');
        //     $bachelor_marksheet= uniqid().'_'.$file->getClientOriginalName();
        //     $file->storeAs('public/uploads/bachelor_marksheet',$bachelor_marksheet);
        // }else{
        //     //if statement checks if file is a file and is valid, otherwise no file to upload
        //     return "Failed to upload bachelor marksheet";

        // }

        $data=[
            'faculty' => $request->faculty,
            'campus' => $request->campus,
            'level' => $request->level,
            'programs' => $request->programs,
            // 'year' => $request->year,
            // 'form_serial_no' => $request->year,
            'sex' => $request->sex,
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            // 'regd_no' => $request->regd_no,
            'symbol_no' => $request->symbol_no,
            'caste' => $request->caste,
            'religion' => $request->religion,
            // 'subjects' => json_encode($request->subjects),
            // 'subject_codes' => json_encode($request->subject_codes),
            'image' => $file_name,
            'signature' => $signature,
            'voucher' => $voucher,
            'tole' => $request->tole,
            'nationality' => $request->nationality,
            'dateOfBirth' => $request->dateOfBirth,
            'dateOfBirth2' => $request->dateOfBirth2,
            'district' => $request->district,
            'mother_name' => $request->mother_name,
            'father_name' => $request->father_name,
            'ward' => $request->ward,
            'contact' => $request->contact,
            'vdc' => $request->vdc,
            'board' => json_encode($request->board),
            'passed_year' => json_encode($request->passed_year),
            'roll_no' => json_encode($request->roll_no),
            'division' => json_encode($request->division),
            'consent' => $request->consent,
            'contact_address' => $request->contact_address,
            'father_qualification' => $request->father_qualification,
            'father_occupation' => $request->father_occupation,
            'mother_qualification' => $request->mother_qualification,
            'mother_occupation' => $request->mother_occupation,
            'spouse_name' => $request->spouse_name,
            'spouse_qualification' => $request->spouse_qualification,
            'spouse_occupation' => $request->spouse_occupation,
            'user_id' => $user_id,
            'see_certificate' => $see_certificate,
            'see_marksheet' => $see_marksheet,
            'intermediate_certificate' => $intermediate_certificate,
            'intermediate_marksheet' => $intermediate_marksheet,
            // 'bachelor_certificate' => $bachelor_certificate,
            // 'bachelor_marksheet' => $bachelor_marksheet,
        ];
        // dd($data);
        Form::create($data);

        Session::flash('flash_success', 'Form successfully submitted for verification!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('home');
        // return redirect()->route('admin.forms.create')->with('modal','true');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
        // abort_if(Gate::denies('form-show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $form->load('subject');
        return view('admin.backend.forms.show', compact('form'));
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
        abort_if(Gate::denies('form-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = Form::find($data);
        $data->load(['faculties','levels','course']);
        $faculties = Faculty::all()->pluck('name','id');
        
        // $subject_ids = json_decode($data->subjects);
        // $subjects = Sub::whereIn('id',$subject_ids)->get();
        // dd($data);
        return view('admin.backend.forms.edit', compact('data','faculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormRequest $request, Form $form)
    {
        //  dd($request->all());
        $roles = Auth::user()->roles;
        $r = 'Admin';
        foreach($roles as $role){
            if($role->title == 'User'){
                $r = $role->title;
                break;
            }
        }

         $data=[
            'faculty' => $request->faculty,
            'campus' => $request->campus,
            'level' => $request->level,
            'programs' => $request->programs,
            // 'year' => $request->year,
            // 'form_serial_no' => $request->year,
            'sex' => $request->sex,
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            // 'regd_no' => $request->regd_no,
            'symbol_no' => $request->symbol_no,
            'caste' => $request->caste,
            'religion' => $request->religion,
            // 'subjects' => json_encode($request->subjects),
            // 'subject_codes' => json_encode($request->subject_codes),
            // 'image' => $file_name,
            // 'signature' => $signature,
            // 'voucher' => $voucher,
            'tole' => $request->tole,
            'nationality' => $request->nationality,
            'dateOfBirth' => $request->dateOfBirth,
            // 'dateOfBirth2' => $request->dateOfBirth2,
            'district' => $request->district,
            'mother_name' => $request->mother_name,
            'father_name' => $request->father_name,
            'ward' => $request->ward,
            'contact' => $request->contact,
            'vdc' => $request->vdc,
            // 'board' => json_encode($request->board),
            // 'passed_year' => json_encode($request->passed_year),
            // 'roll_no' => json_encode($request->roll_no),
            // 'division' => json_encode($request->division),
            // 'consent' => $request->consent,
            'contact_address' => $request->contact_address,
            'father_qualification' => $request->father_qualification,
            'father_occupation' => $request->father_occupation,
            'mother_qualification' => $request->mother_qualification,
            'mother_occupation' => $request->mother_occupation,
            'spouse_name' => $request->spouse_name,
            'spouse_qualification' => $request->spouse_qualification,
            'spouse_occupation' => $request->spouse_occupation,
        ];
        if($r=='User'){
            $data['is_verified'] = 1;
        } else {
            $data['is_final_verified'] = 1;
        }
        // dd($data);
        $form->update($data);

        Session::flash('flash_success', 'Form approved successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.forms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
        abort_if(Gate::denies('form-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $form->delete();

        Session::flash('flash_danger', 'Form has been deleted !.');
        Session::flash('flash_type', 'alert-danger');
        return back();
    }

    public function massDestroy(MassDestroyFormRequest $request)
    {
        Form::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    public function download($file) {
        return response()->download(public_path("questions/{$file}"));
    }

    public function generateform(Form $form)
    {
        // abort_if(Gate::denies('payment-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $form->load('fee','student','fine_payments');

        return view('admin.backend.forms.create', compact('form'));
    }

    public function printform(Form $form)
    {
        // abort_if(Gate::denies('payment-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        abort_if(Gate::denies('card-download'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $form->load(['faculties','levels','course']);
        // $form->load('fee','student','fine_payments');
        // $faculties = Faculty::all()->pluck('name','id');
        // $form->load('fee','student','fine_payments');
        $subject_ids = json_decode($form->subjects);
        $subjects = Sub::whereIn('id',$subject_ids)->get();
        return view('admin.backend.forms.print', compact('form','subjects'));
    }

public function printmultipleform(Request $request)
{
    $ids = explode(',',$request->ids);
    $forms = Form::with(['faculties','levels','course'])->whereIn('id',$ids)->get();
    foreach ($forms as $key => $form) {
        $subject_ids = json_decode($form->subjects);
        $subjects = Sub::whereIn('id',$subject_ids)->get();
        $form->subjects = $subjects;
    }
    return view('admin.backend.forms.printM', compact('forms'));
}

public function printtriplicate(Request $request)
{
    $college_data = [
        'college' => $request->college,
        'program' => $request->program,
        'semester' => $request->semester,
    ];
    $ids = explode(',',$request->ids);
    $forms = Form::whereIn('id',$ids)->get();
    foreach ($forms as $key => $form) {
        $subject_ids = json_decode($form->subjects);
        $subjects = Sub::whereIn('id',$subject_ids)->get();
        $form->subjects = $subjects;
    }
    return view('admin.backend.forms.triplicate', compact('forms','college_data'));
}

    public function printformdetails(Form $form)
    {
        abort_if(Gate::denies('form-download'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $form->load(['faculties','levels','course']);
        $subject_ids = json_decode($form->subjects);
        $subjects = Sub::whereIn('id',$subject_ids)->get();
        $form->subjects = $subjects;
        // $form->load('fee','student','fine_payments');
        $faculties = Faculty::all()->pluck('name','id');

        return view('admin.backend.forms.print_studentdetails', compact('form','faculties'));
    }

    public function printmultipleformdetails(Request $request)
    {
        abort_if(Gate::denies('form-download'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $ids = explode(',',$request->ids);
        $forms = Form::with(['faculties','levels','course'])->whereIn('id',$ids)->get();
        foreach ($forms as $key => $form) {
            $subject_ids = json_decode($form->subjects);
            $subjects = Sub::whereIn('id',$subject_ids)->get();
            $form->subjects = $subjects;
        }
        // $form->load('fee','student','fine_payments');
        $faculties = Faculty::all()->pluck('name','id');

        return view('admin.backend.forms.print_studentdetailsM', compact('forms','faculties'));
    }
}
