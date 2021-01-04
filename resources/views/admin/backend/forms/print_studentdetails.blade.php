{{-- @extends('admin.backend.layouts.master') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" readonly>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/form/semantic.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/form/style.css')}}">
    <link rel="stylesheet" href="{{ asset('/backend/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/backend/plugins/select2/css/select2.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/backend/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/backend/bower_components/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/backend/plugins/nepali-date-picker/nepaliDatePicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/backend/plugins/datepicker/css/bootstrap-datepicker3.min.css')}}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200&display=swap" rel="stylesheet">

    <title>{{$data->regd_no ?? ''}}_{{ $data->fname ?? '' }} {{ $data->mname ?? '' }} {{ $data->lname ?? '' }}</title>
    <style>
        #Rectangle_9 {
            fill: rgba(255, 255, 255, 1);
            stroke: rgba(112, 112, 112, 1);
            stroke-width: 1px;
            stroke-linejoin: miter;
            stroke-linecap: butt;
            stroke-miterlimit: 4;
            shape-rendering: auto;
        }

        .Rectangle_9 {
            position: absolute;
            overflow: visible;
            /* width: 257px;
		height: 74px; */
            left: 884px;
            top: 995px;
        }

    </style>
</head>
<body>


    {{-- @section('title','Edit') --}}

    {{-- @section('styles') --}}
    <link rel="stylesheet" href="{{ asset('css/form/semantic.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/form/style.css')}}">
    {{-- @endsection --}}

    {{-- @section('content') --}}

    <div class="card">
        {{-- <div class="card-header">
         Approve Applicant
    </div> --}}

        <div class="card-body">
            <div class="ui three item menu">
                <div class="logo"><img src="{{ asset('mwu-logo.png') }}" alt="logo"></div>
                <div class="title">
                    <p><b> Mid-Western University </b></p>
                    <h1><b> Examinations Management Office </b></h1>
                    <p><strong>Surkhet, Nepal</strong></p>
                    <p class="underline"><b> Application Form for Examination of 2077 </b></p>
                </div>
                {{-- <div class="photo">
            <div class="box"></div>
        </div> --}}
            </div>
            <form class="ui form" method="POST" action="{{ route('admin.forms.update', [$data->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <h4 class="ui dividing header"></h4>
            <div class="row">
                <div class="col-md-2">
                    <label class="">Entrance Exam Roll No :-</label>
                </div>
               <div class="col-md-10 roll-no">
                    <input class=" {{ $errors->has('symbol_no') ? 'is-invalid' : '' }}" type="text" name="symbol_no" placeholder="Exam Roll No" value="{{$data->symbol_no}}" disabled readonly>
                    @if($errors->has('symbol_no'))
                    <span class="text-danger">
                        {{$errors->first('symbol_no')}}
                    </span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="required">Name of School/College/Campus</label>
                </div>
                <div class="col-md-4">
                    <select class="form-control {{ $errors->has('campus') ? 'is-invalid' : '' }}"
                        name="campus" id="campus" required readonly>
                        @foreach($colleges as $id=>$campus)
                        <option value='{{ $id }}' {{ ($id==$data->campus) ? 'selected' : '' }}>{{ $campus }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('campus'))
                    <span class="text-danger">{{ $errors->first('campus') }}</span>
                    @endif
                </div>
            </div>
           {{-- permission  --}}
           <div class="permission field" >
                <div class="row">
                    <div class="col-md-6">
                         <p>I hereby request for the permission to appear in the entrance examination for Faculty of </p>
                    </div> 
                    <div class="col-md-3 facultyy">
                        <span>
                            <select class="form-control {{ $errors->has('faculty') ? 'is-invalid' : '' }}"
                                name="faculty" id="faculties" required readonly>
                                <option value="">Select a faculty...
                                </option>
                                @foreach($faculties as $id=>$faculty)
                                <option value="{{ $id }}" {{ ($id==$data->faculty) ? 'selected' : '' }}>{{ $faculty }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('faculty'))
                            <span class="text-danger">
                                {{$errors->first('faculty') }}
                            </span>
                            @endif
                        </span>
                    </div>
                    <div class="col-md-1">
                        <p> Level </p>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" name="level" id="levels" required readonly>
                        <option value="{{$data->level}}">{{$data->levels->name}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <p>Programme</p>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control select2" name="programs" id="programs" required readonly>
                        @if($data->programs)
                        <option value="{{$data->programs}}">{{$data->course->name}}</option>
                        @endif
                        </select>
                    </div>
                    <div class="col-md-8">
                    <p> . I have included all my credentials and information required for appearing in the examinations.</p>
                    </div>
                </div>
           </div>
           
           <h4 class="ui dividing header">Personal Details</h4>
            <!-- Name Field -->
            <div class="field">
                <label class="required">Name of the Applicant: </label>
                <div class="two fields">
                    <div class="field">
                        <input class=" {{ $errors->has('fname') ? 'is-invalid' : '' }}" type="text" name="fname" placeholder="First Name" value="{{$data->fname}}" required readonly>
                        @if($errors->has('fname'))
                        <span class="text-danger">{{ $errors->first('fname') }}</span>
                        @endif
                    </div>
                    <div class="field">
                        <input class=" " type="text" name="mname" placeholder="Middle Name" value="{{$data->mname}}" readonly>
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('lname') ? 'is-invalid' : '' }}" type="text" name="lname" placeholder="Last Name" value="{{$data->lname}}" required readonly>
                        @if($errors->has('lname'))
                        <span class="text-danger">{{ $errors->first('lname') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            {{-- caste,religion and nationality --}}
            <div class="row fields">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 caste">Caste</label>
                        <input type="text" class="form-control col-md-8" name="caste" value="{{$data->caste}}" required readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4  religion" >Religion</label>
                        <input type="text" class="form-control col-md-8" name="religion" value="{{$data->religion}}" required readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 nationality">Nationality</label>
                        <input type="text" class="form-control col-md-8" name="nationality" value="{{$data->nationality}}" required readonly>
                    </div>
                </div>
            </div>
            {{-- dob --}}
            <div class="row dob">
                <div class="col-md-2 name">
                    <label>Date of Birth:</label>
                </div>
                <div class="col-md-3">
                <input class="form-control {{ $errors->has('dateOfBirth') ? 'is-invalid' : '' }} date-picker" type="text" name="dateOfBirth" placeholder="YYYY-MM-DD (BS)" value="{{$data->dateOfBirth}}" required readonly>
                @if($errors->has('dateOfBirth')) 
                    <span class="text-danger"> {{$errors ->first('dateOfBirth')}}</span>
                @endif
                </div>
                <!-- <div class="col-md-3">
                <input class="form-control {{ $errors->has('dateOfBirth') ? 'is-invalid' : '' }} datepicker" type="text" name="dateOfBirth2" placeholder="DD/MM/YYYY (AD)" required readonly>
                @if($errors->has('dateOfBirth')) 
                    <span class="text-danger"> {{$errors ->first('dateOfBirth')}}</span>
                @endif 
                </div> -->
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <div class="row"><label class="col-md-4 sex">Sex </label><select
                            class="form-control col-md-8" name="sex" id="sex" required readonly>
                            <option value="male" {{ ('male' === $data->sex) ? 'selected' : '' }}>Male </option>
                            <option value="female" {{ ('female' === $data->sex) ? 'selected' : '' }}>Female </option>
                            <option value="other" {{ ('other' === $data->sex) ? 'selected' : '' }}>Other </option>
                        </select>
                    </div>
                </div>
            </div>
        
            {{-- address --}}
            <h4 class="ui dividing header">Permanent Address</h4>
            <div class="row permanent-address fields">
                <div class="col-md-3">
                    <div class="row">
                        <label class="col-md-4 ">Tole/Village </label>
                        <input type="text" class="form-control col-md-8" name="tole" value="{{$data->tole}}" required readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <label class="col-md-5 ">Ward No. </label>
                        <input type="tel" class="form-control col-md-7" name="ward" value="{{$data->ward}}" required readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 ">VDC/Municipality </label>
                        <input type="text" class="form-control col-md-8" name="vdc" value="{{$data->vdc}}" required readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                    <label class="col-md-4 district">District </label>
                        <input type="text" class="form-control col-md-8" name="district" value="{{$data->district}}" required readonly>
                    </div>
                </div>
            </div>
            <div class="row contact-info fields">
                <div class="email col-md-7">
                    <div class="row">
                        <label class="col-md-3 ">Contact Address</label>
                        <input type="email" class="form-control col-md-9" name="contact_address" value="{{$data->contact_address}}" required readonly>
                    </div>
                </div>
                <div class="telephone col-md-5">
                    <div class="row">
                        <label class="col-md-4 mobile">Mobile No. </label>
                        <input type="tel" class="form-control col-md-8" name="contact" value="{{$data->contact}}" required readonly>
                    </div>
                </div>
            </div>
           <!-- examination -->
        @php
        $boards = json_decode($data->board);
        $passed_year = json_decode($data->passed_year);
        $roll_no = json_decode($data->roll_no);
        $divison = json_decode($data->division);
        @endphp
        <h4 class="ui dividing header">Previous Academic Records</h4>
        <label class="required">SLC/SEE</label>
        <div class="fields">
            <div class="seven wide field">
                <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board[]" placeholder="Board or University" value="{{ $boards[0] }}" required readonly>
                @if($errors->has('board'))
                <span class="text-danger">{{ $errors->first('board') }}</span>
                @endif
            </div>
            <div class="three wide field">
                <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year[]" placeholder="Passed Year" value="{{ $passed_year[0] }}" required readonly>
                @if($errors->has('passed_year'))
                <span class="text-danger">{{ $errors->first('passed_year') }}</span>
                @endif
            </div>
            <div class="six wide field">
                <div class="two fields">
                    <div class="field">
                        <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Percent / GPA" value="{{ $roll_no[0] }}" required readonly>
                        @if($errors->has('roll_no'))
                        <span class="text-danger">{{ $errors->first('roll_no') }}</span>
                        @endif
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division/CGPA" value="{{ $divison[0] }}" required readonly>
                        @if($errors->has('division'))
                        <span class="text-danger">{{ $errors->first('division') }}</span>
                        @endif
                    </div>
                </div>
            </div>            
        </div>
        <!-- <div class="fields"> -->



        <!-- </div> -->

        <label class="required">Intermediate/+2</label>
        <div class="fields">
            <div class="seven wide field">
                <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board[]" placeholder="Board or University" value="{{ $boards[1] }}" required readonly>
            </div>
            <div class="three wide field">
                <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year[]" placeholder="Passed Year" value="{{ $passed_year[1] }}" required readonly>
            </div>
            <div class="six wide field">
                <div class="two fields">
                    <div class="field">
                        <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Percent / GPA" value="{{ $roll_no[1] }}" required readonly>
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division/CGPA" value="{{ $divison[1] }}" required readonly>
                    </div>
                </div>
            </div>
        </div>




        <label class="">Bachelor</label>
        <div class="fields">
            <div class="seven wide field">
                <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board[]" placeholder="Board or University" value="{{ $boards[2] }}" readonly>
            </div>
            <div class="three wide field">
                <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year[]" placeholder="Passed Year" value="{{ $passed_year[2] }}" readonly>
            </div>
            <div class="six wide field">
                <div class="two fields">
                    <div class="field">
                        <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Percent / GPA" value="{{ $roll_no[2] }}" readonly>
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division/CGPA" value="{{ $divison[2] }}" readonly>
                    </div>
                </div>
            </div>
        </div>





        <label class="">Master</label>
        <div class="fields">
            <div class="seven wide field">
                <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board[]" placeholder="Board or University" value="{{ $boards[3] }}" readonly>
            </div>
            <div class="three wide field">
                <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year[]" placeholder="Passed Year" value="{{ $passed_year[3] }}" readonly>
            </div>
            <div class="six wide field">
                <div class="two fields">
                    <div class="field">
                        <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Percent / GPA" value="{{ $roll_no[3] }}" readonly>
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division/CGPA" value="{{ $divison[3] }}" readonly>
                    </div>
                </div>
            </div>
        </div>

        {{-- guardian's details --}}
        <h4 class="ui dividing header">Parent's/Guardian's Details</h4>
        <div class="parents-details field">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 ">Father's Name</label>
                        <input type="text" class="form-control col-md-8" name="father_name" value="{{$data->father_name}}" required readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 det">Qualifications</label>
                        <input type="text" class="form-control col-md-8 "placeholder="Qualifications" name="father_qualification" value="{{$data->father_qualification}}" required readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-3 det">Occupation</label>
                        <input type="tel" class="form-control col-md-9" placeholder="Occupation" name="father_occupation" value="{{$data->father_occupation}}" required readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="parents-details field">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 ">Mother's Name</label>
                        <input type="text" class="form-control col-md-8" name="mother_name" value="{{$data->mother_name}}" required readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 det">Qualifications</label>
                        <input type="text" class="form-control col-md-8" placeholder="Qualifications" name="mother_qualification" value="{{$data->mother_qualification}}" required readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-3 det">Occupation</label>
                        <input type="tel" class="form-control col-md-9"placeholder="Occupation" name="mother_occupation" value="{{$data->mother_occupation}}" required readonly>
                    </div>
                </div>
            </div>
        </div>
        <h4 class=" ui dividing header">If married</h4>
        <div class="parents-details field">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 ">Spouse's Name</label>
                        <input type="text" class="form-control col-md-8" name="spouse_name" value="{{$data->spouse_name}}" required readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 det">Qualifications</label>
                        <input type="text" class="form-control col-md-8" placeholder="Qualifications" name="spouse_qualification" value="{{$data->spouse_qualification}}" required readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-3 det">Occupation</label>
                        <input type="tel" class="form-control col-md-9" placeholder="Occupation" name="spouse_occupation" value="{{$data->spouse_occupation}}" required readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <span><input type="checkbox" name="consent" id="consent" {{$data->consent==1?'checked':''}}> I declare that the particulars given above, to the best of my knowledge, are true. If found incorrect, any action to be taken against me by the University will be acceptable. If I admit, I agree to abide by the University rules and regulations.</span readonly>
        </div>
        <div class="row">
            <div class="col-md-4">
            @if($data->authorized_signature)
                <img class="signature" src="{{asset('storage/uploads/college/authorized_signature/'.$data->authorized_signature)}}" width="257" height="74">
                <br> <span>...................................................</span> <br> 
                <span>Authorized Signature</span> 
            @endif
            </div>
            <div class="col-md-4">
            @if($data->official_seal)
                <img class="signature" src="{{asset('storage/uploads/college/official_seal/'.$data->official_seal)}}" width="257" height="74">
                <br> <span>...................................................</span> <br> 
                <span>Official Seal</span>             
            @endif
            </div>
            <div class="col-md-4">
                <img class="signature" src="{{asset('storage/uploads/signature/'.$data->signature)}}" width="257" height="74">
                <br> <span>...................................................</span> <br> 
                <span>Applicant's Signature</span>   
            </div>
        </div>    
    </form>
    </div>
    </div>


    {{-- @endsection --}}

    {{-- @section('scripts') --}}
    {{-- <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/form/semantic.min.js')}}"></script>
    <script type="text/javascript">
        window.addEventListener("load", window.print());

    </script>
    {{-- @endsection --}}

</body>
</html>
