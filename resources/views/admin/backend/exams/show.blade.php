@extends('admin.backend.layouts.master')
@section('title','View Permission')

@section('styles')
    <style>
        
    </style>
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.permission.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            
            <div id="Web_1920__1">
                <div id="Group_18">
                    <img id="mwu-logo" src="mwu-logo.png" srcset="mwu-logo.png 1x, mwu-logo@2x.png 2x">
                    <div id="Mid-Western_University">
                        <span>Mid-Western University</span>
                    </div>
                    <div id="Examinations_Management_Office">
                        <span>Examinations Management Office</span>
                    </div>
                    <div id="Surkhet_Nepal">
                        <span>Surkhet, Nepal</span>
                    </div>
                    <div id="Examination_Admission_Card">
                        <span>Examination Admission Card</span>
                    </div>
                    <div id="Full_Name_">
                        <span>Full Name :</span>
                    </div>
                    <svg class="Line_1" viewBox="0 0 944.482 3">
                        <path id="Line_1" d="M 0 0 L 944.4818115234375 0">
                        </path>
                    </svg>
                    <div id="Symbol_No">
                        <span>Symbol No:</span>
                    </div>
                    <svg class="Line_2" viewBox="0 0 432 3">
                        <path id="Line_2" d="M 0 0 L 432 0">
                        </path>
                    </svg>
                    <svg class="Rectangle_2">
                        <rect id="Rectangle_2" rx="49" ry="49" x="0" y="0" width="217" height="217">
                        </rect>
                    </svg>
                    <div id="Photo_PP_Size">
                        <span>Photo P/P<br/>Size</span>
                    </div>
                    <div id="Registration_No_">
                        <span>Registration No: </span>
                    </div>
                    <svg class="Line_4" viewBox="0 0 883.221 3">
                        <path id="Line_4" d="M 0 0 L 883.2205200195313 0">
                        </path>
                    </svg>
                    <div id="SchoolCampus">
                        <span>School/Campus:</span>
                    </div>
                    <svg class="Line_5" viewBox="0 0 356 3">
                        <path id="Line_5" d="M 0 0 L 356 0">
                        </path>
                    </svg>
                    <div id="Faculty_">
                        <span>Faculty :</span>
                    </div>
                    <svg class="Line_6" viewBox="0 0 983.482 3">
                        <path id="Line_6" d="M 0 0 L 983.4818115234375 0">
                        </path>
                    </svg>
                    <div id="Exam_Year_">
                        <span>Exam. Year :</span>
                    </div>
                    <svg class="Line_7" viewBox="0 0 412 3">
                        <path id="Line_7" d="M 0 0 L 412 0">
                        </path>
                    </svg>
                    <div id="Level_">
                        <span>Level :</span>
                    </div>
                    <div id="Exam_Centre_">
                        <span>Exam. Centre :</span>
                    </div>
                    <svg class="Line_9" viewBox="0 0 381 3">
                        <path id="Line_9" d="M 0 0 L 381 0">
                        </path>
                    </svg>
                    <div id="Bachelor__Master__MPhil">
                        <span>Bachelor / Master / M.Phil</span>
                    </div>
                    <div id="Semester">
                        <span>Semester:</span>
                    </div>
                    <svg class="Rectangle_4">
                        <rect id="Rectangle_4" rx="0" ry="0" x="0" y="0" width="1744" height="527">
                        </rect>
                    </svg>
                    <svg class="Line_10" viewBox="0 0 1744 1">
                        <path id="Line_10" d="M 0 0 L 1744 0">
                        </path>
                    </svg>
                    <svg class="Line_12" viewBox="0 0 1744 1">
                        <path id="Line_12" d="M 0 0 L 1744 0">
                        </path>
                    </svg>
                    <svg class="Line_13" viewBox="0 0 1744 1">
                        <path id="Line_13" d="M 0 0 L 1744 0">
                        </path>
                    </svg>
                    <svg class="Line_14" viewBox="0 0 1744 1">
                        <path id="Line_14" d="M 0 0 L 1744 0">
                        </path>
                    </svg>
                    <svg class="Line_15" viewBox="0 0 1744 1">
                        <path id="Line_15" d="M 0 0 L 1744 0">
                        </path>
                    </svg>
                    <svg class="Line_16" viewBox="0 0 1744 1">
                        <path id="Line_16" d="M 0 0 L 1744 0">
                        </path>
                    </svg>
                    <svg class="Line_17" viewBox="0 0 1744 1">
                        <path id="Line_17" d="M 0 0 L 1744 0">
                        </path>
                    </svg>
                    <svg class="Line_18" viewBox="0 0 1744 1">
                        <path id="Line_18" d="M 0 0 L 1744 0">
                        </path>
                    </svg>
                    <div id="Regular">
                        <span>Regular</span>
                    </div>
                    <svg class="Rectangle_5">
                        <rect id="Rectangle_5" rx="0" ry="0" x="0" y="0" width="44" height="37">
                        </rect>
                    </svg>
                    <div id="Chance">
                        <span>Chance</span>
                    </div>
                    <svg class="Rectangle_6">
                        <rect id="Rectangle_6" rx="0" ry="0" x="0" y="0" width="44" height="37">
                        </rect>
                    </svg>
                    <div id="Partial">
                        <span>Partial</span>
                    </div>
                    <svg class="Rectangle_7">
                        <rect id="Rectangle_7" rx="0" ry="0" x="0" y="0" width="44" height="37">
                        </rect>
                    </svg>
                    <svg class="Line_19" viewBox="0 0 1 474">
                        <path id="Line_19" d="M 0 0 L 0 474">
                        </path>
                    </svg>
                    <svg class="Line_20" viewBox="0 0 1 474">
                        <path id="Line_20" d="M 0 0 L 0 474">
                        </path>
                    </svg>
                    <div id="SN">
                        <span>S.N.</span>
                    </div>
                    <div id="Subjects">
                        <span>Subjects</span>
                    </div>
                    <div id="Sub_Code">
                        <span>Sub. Code</span>
                    </div>
                    <svg class="Line_21" viewBox="0 0 1744 1">
                        <path id="Line_21" d="M 0 0 L 1744 0">
                        </path>
                    </svg>
                    <svg class="Line_22" viewBox="0 0 1744 1">
                        <path id="Line_22" d="M 0 0 L 1744 0">
                        </path>
                    </svg>
                    <svg class="Line_23" viewBox="0 0 365 3">
                        <path id="Line_23" d="M 0 0 L 365 0">
                        </path>
                    </svg>
                    <div id="__">
                        <span>परीक्षार्थि पुरा दस्तखत</span>
                    </div>
                    <svg class="Line_24" viewBox="0 0 365 3">
                        <path id="Line_24" d="M 0 0 L 365 0">
                        </path>
                    </svg>
                    <div id="Full_Signature_of_Applicant">
                        <span>Full Signature of Applicant</span>
                    </div>
                    <div id="_M___________">
                        <span>नोट M प्रवेशपत्र र उत्तरपुस्तिकामा गरिएको हस्ताक्षर फरक परेमा परिक्षा रद्द गर्न सकिन्छ।</span>
                    </div>
                    <div id="student_name">
                        <span>student_name</span>
                    </div>
                    <div id="symbol_no">
                        <span>symbol_no</span>
                    </div>
                    <div id="college_name">
                        <span>college_name</span>
                    </div>
                    <div id="registration_no">
                        <span>registration_no</span>
                    </div>
                    <div id="faculty">
                        <span>faculty</span>
                    </div>
                    <div id="exam_year">
                        <span>exam_year</span>
                    </div>
                    <div id="exam_centre">
                        <span>exam_centre</span>
                    </div>
                    <svg class="Rectangle_8">
                        <rect id="Rectangle_8" rx="0" ry="0" x="0" y="0" width="257" height="74">
                        </rect>
                    </svg>
                    <svg class="Rectangle_9">
                        <rect id="Rectangle_9" rx="0" ry="0" x="0" y="0" width="257" height="74">
                        </rect>
                    </svg>
                    <svg class="Checkbox" viewBox="0 -29.294 73.817 55.072">
                        <path id="Checkbox" d="M 20.84847640991211 25.7776050567627 L 0 4.92912769317627 L 4.230125904083252 0.6990022659301758 L 20.84847640991211 17.01520347595215 L 69.58707427978516 -29.29393768310547 L 73.81719970703125 -25.06381416320801 L 20.84847640991211 25.7776050567627 Z">
                        </path>
                    </svg>
                    <svg class="Checkbox_b" viewBox="0 0 30.312 20.905">
                        <path id="Checkbox_b" d="M 12.02042675018311 20.90509033203125 L 0 8.884662628173828 L 2.438927173614502 6.445735931396484 L 12.02042675018311 15.85302734375 L 27.87345314025879 0 L 30.31237983703613 2.438927173614502 L 12.02042675018311 20.90509033203125 Z">
                        </path>
                    </svg>
                    <svg class="Checkbox_ca" viewBox="0 0 30.312 20.905">
                        <path id="Checkbox_ca" d="M 12.02042675018311 20.90509033203125 L 0 8.884662628173828 L 2.438927173614502 6.445735931396484 L 12.02042675018311 15.85302734375 L 27.87345314025879 0 L 30.31237983703613 2.438927173614502 L 12.02042675018311 20.90509033203125 Z">
                        </path>
                    </svg>
                    <svg class="Checkbox_cb" viewBox="0 0 30.312 20.905">
                        <path id="Checkbox_cb" d="M 12.02042675018311 20.90509033203125 L 0 8.884662628173828 L 2.438927173614502 6.445735931396484 L 12.02042675018311 15.85302734375 L 27.87345314025879 0 L 30.31237983703613 2.438927173614502 L 12.02042675018311 20.90509033203125 Z">
                        </path>
                    </svg>
                    <svg class="Checkbox_cc" viewBox="0 -29.294 73.817 55.072">
                        <path id="Checkbox_cc" d="M 20.84847640991211 25.7776050567627 L 0 4.92912769317627 L 4.230125904083252 0.6990022659301758 L 20.84847640991211 17.01520347595215 L 69.58707427978516 -29.29393768310547 L 73.81719970703125 -25.06381416320801 L 20.84847640991211 25.7776050567627 Z">
                        </path>
                    </svg>
                    <svg class="Checkbox_cd" viewBox="0 -29.294 73.817 55.072">
                        <path id="Checkbox_cd" d="M 20.84847640991211 25.7776050567627 L 0 4.92912769317627 L 4.230125904083252 0.6990022659301758 L 20.84847640991211 17.01520347595215 L 69.58707427978516 -29.29393768310547 L 73.81719970703125 -25.06381416320801 L 20.84847640991211 25.7776050567627 Z">
                        </path>
                    </svg>
                    <div id="semester">
                        <span>semester</span>
                    </div>
                    <div id="sn">
                        <span>sn</span>
                    </div>
                    <div id="subject">
                        <span>subject</span>
                    </div>
                    <div id="sub_code">
                        <span>sub_code</span>
                    </div>
                    <div id="Group_9">
                        <div id="sn_cg">
                            <span>sn</span>
                        </div>
                        <div id="subject_ch">
                            <span>subject</span>
                        </div>
                        <div id="sub_code_ci">
                            <span>sub_code</span>
                        </div>
                    </div>
                    <div id="Group_10">
                        <div id="sn_ck">
                            <span>sn</span>
                        </div>
                        <div id="subject_cl">
                            <span>subject</span>
                        </div>
                        <div id="sub_code_cm">
                            <span>sub_code</span>
                        </div>
                    </div>
                    <div id="Group_11">
                        <div id="sn_co">
                            <span>sn</span>
                        </div>
                        <div id="subject_cp">
                            <span>subject</span>
                        </div>
                        <div id="sub_code_cq">
                            <span>sub_code</span>
                        </div>
                    </div>
                    <div id="Group_12">
                        <div id="sn_cs">
                            <span>sn</span>
                        </div>
                        <div id="subject_ct">
                            <span>subject</span>
                        </div>
                        <div id="sub_code_cu">
                            <span>sub_code</span>
                        </div>
                    </div>
                    <div id="Group_13">
                        <div id="sn_cw">
                            <span>sn</span>
                        </div>
                        <div id="subject_cx">
                            <span>subject</span>
                        </div>
                        <div id="sub_code_cy">
                            <span>sub_code</span>
                        </div>
                    </div>
                    <div id="Group_14">
                        <div id="sn_c">
                            <span>sn</span>
                        </div>
                        <div id="subject_c">
                            <span>subject</span>
                        </div>
                        <div id="sub_code_c">
                            <span>sub_code</span>
                        </div>
                    </div>
                    <div id="Group_15">
                        <div id="sn_da">
                            <span>sn</span>
                        </div>
                        <div id="subject_da">
                            <span>subject</span>
                        </div>
                        <div id="sub_code_da">
                            <span>sub_code</span>
                        </div>
                    </div>
                    <div id="Group_16">
                        <div id="sn_db">
                            <span>sn</span>
                        </div>
                        <div id="subject_db">
                            <span>subject</span>
                        </div>
                        <div id="sub_code_db">
                            <span>sub_code</span>
                        </div>
                    </div>
                    <div id="Group_17">
                        <div id="sn_dc">
                            <span>sn</span>
                        </div>
                        <div id="subject_dd">
                            <span>subject</span>
                        </div>
                        <div id="sub_code_de">
                            <span>sub_code</span>
                        </div>
                    </div>
                </div>
                 <!-- this row will not appear when printing -->
                 <div class="row no-print">
                    <div class="col-12">
                      <a href="{{route('admin.forms.print', $form->id)}}" target="_blank" class="btn btn-default float-right"><i class="fas fa-print"></i> Print</a>
                      
                    </div>
                  </div>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.permissions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection