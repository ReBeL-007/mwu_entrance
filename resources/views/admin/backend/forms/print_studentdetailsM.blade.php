{{-- @extends('admin.backend.layouts.master') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <title>Forms</title>
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

        @media print {
            div.breakpage {
                page-break-before: always;
            }
        }
    </style>
</head>
<body>

@foreach($datas as $key => $data)

    <div class="card">
        {{-- <div class="card-header">
         Approve Applicant
    </div> --}}

        <div class="card-body">
            <div class="row">
                <div class="col-md-12 header-image">
                    <img src="{{asset('MWU top.png') }}" style="width:100%" alt="">
                </div>
            </div>

            <form class="ui form" method="POST" action="{{ route('admin.forms.update', [$data->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <h4 class="ui dividing header"></h4>
            <div class="row">
                <div class="col-md-2">
                    <label class="">Symbol No :-</label>
                </div>
               <div class="col-md-4 roll-no">
                    <input class=" {{ $errors->has('symbol_no') ? 'is-invalid' : '' }}" type="text" name="symbol_no" placeholder="Exam Roll No" value="{{$data->symbol_no}}" disabled>
                    @if($errors->has('symbol_no'))
                    <span class="text-danger">
                        {{$errors->first('symbol_no')}}
                    </span>
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
                                name="faculty" id="faculties" required>
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
                        <select class="form-control" name="level" id="levels" required>
                        <option value="{{$data->level}}">{{$data->levels->name}}</option>
                        </select>
                    </div>
                </div>
                @if($data->faculty===5 && $data->level===1)
                @php
                $priority = json_decode($data->priority);
                @endphp
                <div class="priority">
                    <div class="" style="overflow-x: auto; margin: 2rem;">
                    <h5 style="font-weight: bold">Priority</h5>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" colspan="3" style="text-align: center">
                            Scholarships
                            </th>
                            <th scope="col" colspan="3" style="text-align: center">
                            Full Paying
                            </th>
                            <th scope="col" colspan="3" style="text-align: center">
                            Sponsered
                            </th>
                        </tr>
                        <tr class="table-heading-row">
                            <th scope="col">Civil</th>
                            <th scope="col">Computer</th>
                            <th scope="col">Hydropower</th>
                            <th scope="col">Civil</th>
                            <th scope="col">Computer</th>
                            <th scope="col">Hydropower</th>
                            <th scope="col">Civil</th>
                            <th scope="col">Computer</th>
                            <th scope="col">Hydropower</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>

                    <div class="" style="overflow-x: auto; margin: 2rem; max-width: 100%;">
                    <h5 style="font-weight: bold">Fill The Priority</h5>
                    <table class="table table-bordered ">
                        <thead>
                        <tr>
                            <tr class="table-heading-row">
                            <th></th>
                            <th>P-1</th>
                            <th>P-2</th>
                            <th>P-3</th>
                            <th>P-4</th>
                            <th>P-5</th>
                            <th>P-6</th>
                            <th>P-7</th>
                            <th>P-8</th>
                            <th>P-9</th>
                            </tr>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Number</th>
                            <td><input type="number" name="priority[]" min="1" max="9" value="{{$priority[0]}}"  required></td>
                            <td><input type="number" name="priority[]" min="1" max="9" value="{{$priority[1]}}" ></td>
                            <td><input type="number" name="priority[]" min="1" max="9" value="{{$priority[2]}}" ></td>
                            <td><input type="number" name="priority[]" min="1" max="9" value="{{$priority[3]}}" ></td>
                            <td><input type="number" name="priority[]" min="1" max="9" value="{{$priority[4]}}" ></td>
                            <td><input type="number" name="priority[]" min="1" max="9" value="{{$priority[5]}}" ></td>
                            <td><input type="number" name="priority[]" min="1" max="9" value="{{$priority[6]}}" ></td>
                            <td><input type="number" name="priority[]" min="1" max="9" value="{{$priority[7]}}" ></td>
                            <td><input type="number" name="priority[]" min="1" max="9" value="{{$priority[8]}}" ></td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <p> . I have included all my credentials and information required for appearing in the examinations.</p>
                    </div>
                </div>
                @elseif($data->faculty===5 && $data->level===2)
                @php
                $priority = json_decode($data->priority);
                @endphp
                <div class="priority">
                    <div class="" style="overflow-x: auto; margin: 2rem;">
                    <h5 style="font-weight: bold">Priority</h5>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" colspan="2" style="text-align: center">
                            Scholarships
                            </th>
                            <th scope="col" colspan="2" style="text-align: center">
                            Full Paying
                            </th>
                            <th scope="col" colspan="2" style="text-align: center">
                            Sponsered
                            </th>
                        </tr>
                        <tr class="table-heading-row">
                            <th scope="col">MSc in Structural Engineering</th>
                            <th scope="col">MSc in Construction Management</th>
                            <th scope="col">MSc in Structural Engineering</th>
                            <th scope="col">MSc in Construction Management</th>
                            <th scope="col">MSc in Structural Engineering</th>
                            <th scope="col">MSc in Construction Management</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>

                    <div class="" style="overflow-x: auto; margin: 2rem; max-width: 100%;">
                    <h5 style="font-weight: bold">Fill The Priority</h5>
                    <table class="table table-bordered ">
                        <thead>
                        <tr>
                            <tr class="table-heading-row">
                            <th></th>
                            <th>P-1</th>
                            <th>P-2</th>
                            <th>P-3</th>
                            <th>P-4</th>
                            <th>P-5</th>
                            <th>P-6</th>
                            </tr>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Number</th>
                            <td><input type="number" name="priority[]" min="1" max="9" value="{{$priority[0]}}"  required></td>
                            <td><input type="number" name="priority[]" min="1" max="9" value="{{$priority[1]}}" ></td>
                            <td><input type="number" name="priority[]" min="1" max="9" value="{{$priority[2]}}" ></td>
                            <td><input type="number" name="priority[]" min="1" max="9" value="{{$priority[3]}}" ></td>
                            <td><input type="number" name="priority[]" min="1" max="9" value="{{$priority[4]}}" ></td>
                            <td><input type="number" name="priority[]" min="1" max="9" value="{{$priority[5]}}" ></td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <p> . I have included all my credentials and information required for appearing in the examinations.</p>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-md-1">
                        <p>Programme</p>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control select2" name="programs" id="programs" required>
                        @if($data->programs)
                        <option value="{{$data->programs}}">{{$data->course->name}}</option>
                        @endif
                        </select>
                    </div>
                    <div class="col-md-8">
                    <p> . I have included all my credentials and information required for appearing in the examinations.</p>
                    </div>
                </div>
                @endif
           </div>
           
           <h4 class="ui dividing header">Personal Details</h4>
            <!-- Name Field -->
            <div class="field">
                <label class="required">Name of the Applicant: </label>
                <div class="two fields">
                    <div class="field">
                        <input class=" {{ $errors->has('fname') ? 'is-invalid' : '' }}" type="text" name="fname" placeholder="First Name" value="{{$data->fname}}" required>
                        @if($errors->has('fname'))
                        <span class="text-danger">{{ $errors->first('fname') }}</span>
                        @endif
                    </div>
                    <div class="field">
                        <input class=" " type="text" name="mname" placeholder="Middle Name" value="{{$data->mname}}">
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('lname') ? 'is-invalid' : '' }}" type="text" name="lname" placeholder="Last Name" value="{{$data->lname}}" required>
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
                        <label class="col-md-4 caste required">Caste/Ethnicity</label>
                        <input type="text" class="form-control col-md-8" name="caste" value="{{$data->caste}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4  religion required" >Religion</label>
                        <input type="text" class="form-control col-md-8" name="religion" value="{{$data->religion}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 nationality required">Nationality</label>
                        <input type="text" class="form-control col-md-8" name="nationality" value="{{$data->nationality}}" required>
                    </div>
                </div>
            </div>
            {{-- dob --}}
            <div class="row dob">
                <div class="col-md-2 name">
                    <label class="required">Date of Birth:</label>
                </div>
                <div class="col-md-3">
                <input class="form-control {{ $errors->has('dateOfBirth') ? 'is-invalid' : '' }} date-picker" type="text" name="dateOfBirth" placeholder="YYYY-MM-DD (BS)" value="{{$data->dateOfBirth}}" required>
                @if($errors->has('dateOfBirth')) 
                    <span class="text-danger"> {{$errors ->first('dateOfBirth')}}</span>
                @endif
                </div>
                <!-- <div class="col-md-3">
                <input class="form-control {{ $errors->has('dateOfBirth') ? 'is-invalid' : '' }} datepicker" type="text" name="dateOfBirth2" placeholder="DD/MM/YYYY (AD)" required>
                @if($errors->has('dateOfBirth')) 
                    <span class="text-danger"> {{$errors ->first('dateOfBirth')}}</span>
                @endif 
                </div> -->
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <div class="row"><label class="col-md-4 sex required">Sex </label><select
                            class="form-control col-md-8" name="sex" id="sex" required>
                            <option value="male" {{ ('male' === $data->sex) ? 'selected' : '' }}>Male </option>
                            <option value="female" {{ ('female' === $data->sex) ? 'selected' : '' }}>Female </option>
                            <option value="other" {{ ('other' === $data->sex) ? 'selected' : '' }}>Other </option>
                        </select>
                    </div>
                </div>
            </div>
        
            <div id="disable_section">
            <div class="row field">
                <label class=" col-md-2 sex required">Disability Status </label>
                <select class="col-md-1" name="disable_status" id="disable_status">
                    <option value="0" {{ ('0' == $data->disable_status) ? 'selected' : '' }}>No</option>
                    <option value="1" {{ ('1' == $data->disable_status) ? 'selected' : '' }}>Yes</option>
                </select>        
            </div>
            @if($data->disable_status=='1')
                <div class="row fields" id="disable_subsection">
                    <div class="col-md-3">
                        <div class="row">
                            <label class="col-md-6 caste ">Classification</label>
                            <select class="form-control col-md-4" name="disable_class">
                                <option value="Ka" {{ ('Ka' == $data->disable_class) ? 'selected' : '' }}>Ka</option>
                                <option value="Kha" {{ ('Kha' == $data->disable_class) ? 'selected' : '' }}>Kha</option>
                                <option value="Ga" {{ ('Ga' == $data->disable_class) ? 'selected' : '' }}>Ga</option>
                                <option value="Gha" {{ ('Gha' == $data->disable_class) ? 'selected' : '' }}>Gha</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <label class="col-md-4" >Disability ID Number</label>
                            <input type="text" class="form-control col-md-8" name="disable_no" value="{{$data->disable_no}}">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <label class="col-md-4">Description</label>
                            <textarea class="form-control col-md-8" name="disable_description" rows="2">{{$data->disable_no}}</textarea>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <div id="martyr_section">
                <div class="row field">
                    <label class=" col-md-2 sex required">Children of Martyr </label>
                    <select class="col-md-1" name="martyr_status" id="martyr_status">
                        <option value="0" {{ ('0' == $data->martyr_status) ? 'selected' : '' }}>No</option>
                        <option value="1" {{ ('1' == $data->martyr_status) ? 'selected' : '' }}>Yes</option>
                    </select>        
                </div>
                @if($data->martyr_status=='1')
                    <div class="row field" id="martyr_subsection">                        
                        <div class="col-md-4">
                            <div class="row">
                                <label class="col-md-4" >Certificate ID Number</label>
                                <input type="text" class="form-control col-md-8" name="martyr_no" value="{{$data->martyr_no}}">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            
            {{-- address --}}
            <h4 class="ui dividing header">Permanent Address</h4>
            <div class="row permanent-address fields">
                <div class="col-md-3">
                    <div class="row">
                        <label class="col-md-4 ">Tole/Village </label>
                        <input type="text" class="form-control col-md-8" name="tole" value="{{$data->tole}}" >
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <label class="col-md-5 ">Ward No. </label>
                        <input type="tel" class="form-control col-md-7" name="ward" value="{{$data->ward}}" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 ">Municipality/Rural-Municipality </label>
                        <input type="text" class="form-control col-md-8" name="vdc" value="{{$data->vdc}}" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                    <label class="col-md-4 district required">District </label>
                        <input type="text" class="form-control col-md-8" name="district" value="{{$data->district}}" required>
                    </div>
                </div>
            </div>
            <div class="row contact-info fields">
                <div class="email col-md-7">
                    <div class="row">
                        <label class="col-md-3 ">Email Address</label>
                        <input type="email" class="form-control col-md-9" name="contact_address" value="{{$data->contact_address}}" >
                    </div>
                </div>
                <div class="telephone col-md-5">
                    <div class="row">
                        <label class="col-md-4 mobile">Mobile No. </label>
                        <input type="tel" class="form-control col-md-8" name="contact" value="{{$data->contact}}" >
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
                <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board[]" placeholder="Board or University" value="{{ $boards[0] }}" required>
                @if($errors->has('board'))
                <span class="text-danger">{{ $errors->first('board') }}</span>
                @endif
            </div>
            <div class="three wide field">
                <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year[]" placeholder="Passed Year" value="{{ $passed_year[0] }}" required>
                @if($errors->has('passed_year'))
                <span class="text-danger">{{ $errors->first('passed_year') }}</span>
                @endif
            </div>
            <div class="six wide field">
                <div class="two fields">
                    <div class="field">
                        <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Percent / GPA" value="{{ $roll_no[0] }}" required>
                        @if($errors->has('roll_no'))
                        <span class="text-danger">{{ $errors->first('roll_no') }}</span>
                        @endif
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division/CGPA" value="{{ $divison[0] }}" required>
                        @if($errors->has('division'))
                        <span class="text-danger">{{ $errors->first('division') }}</span>
                        @endif
                    </div>
                </div>
            </div>            
        </div>
        <label class="">Intermediate/+2</label>
        <div class="fields">
            <div class="seven wide field">
                <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board[]" placeholder="Board or University" value="{{ $boards[1] }}" >
            </div>
            <div class="three wide field">
                <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year[]" placeholder="Passed Year" value="{{ $passed_year[1] }}" >
            </div>
            <div class="six wide field">
                <div class="two fields">
                    <div class="field">
                        <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Percent / GPA" value="{{ $roll_no[1] }}" >
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division/CGPA" value="{{ $divison[1] }}" >
                    </div>
                </div>
            </div>
        </div>
        <label class="">Bachelor</label>
        <div class="fields">
            <div class="seven wide field">
                <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board[]" placeholder="Board or University" value="{{ $boards[2] }}">
            </div>
            <div class="three wide field">
                <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year[]" placeholder="Passed Year" value="{{ $passed_year[2] }}">
            </div>
            <div class="six wide field">
                <div class="two fields">
                    <div class="field">
                        <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Percent / GPA" value="{{ $roll_no[2] }}">
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division/CGPA" value="{{ $divison[2] }}">
                    </div>
                </div>
            </div>
        </div>
        <label class="">Master</label>
        <div class="fields">
            <div class="seven wide field">
                <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board[]" placeholder="Board or University" value="{{ $boards[3] }}">
            </div>
            <div class="three wide field">
                <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year[]" placeholder="Passed Year" value="{{ $passed_year[3] }}">
            </div>
            <div class="six wide field">
                <div class="two fields">
                    <div class="field">
                        <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Percent / GPA" value="{{ $roll_no[3] }}">
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division/CGPA" value="{{ $divison[3] }}">
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
                        <label class="col-md-4 required">Father's Name</label>
                        <input type="text" class="form-control col-md-8" name="father_name" value="{{$data->father_name}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 det">Qualifications</label>
                        <input type="text" class="form-control col-md-8 "placeholder="Qualifications" name="father_qualification" value="{{$data->father_qualification}}" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-3 det">Occupation</label>
                        <input type="tel" class="form-control col-md-9" placeholder="Occupation" name="father_occupation" value="{{$data->father_occupation}}" >
                    </div>
                </div>
            </div>
        </div>
        <div class="parents-details field">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 required">Mother's Name</label>
                        <input type="text" class="form-control col-md-8" name="mother_name" value="{{$data->mother_name}}" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 det">Qualifications</label>
                        <input type="text" class="form-control col-md-8" placeholder="Qualifications" name="mother_qualification" value="{{$data->mother_qualification}}" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-3 det">Occupation</label>
                        <input type="tel" class="form-control col-md-9"placeholder="Occupation" name="mother_occupation" value="{{$data->mother_occupation}}" >
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
                        <input type="text" class="form-control col-md-8" name="spouse_name" value="{{$data->spouse_name}}" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 det">Qualifications</label>
                        <input type="text" class="form-control col-md-8" placeholder="Qualifications" name="spouse_qualification" value="{{$data->spouse_qualification}}" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-3 det">Occupation</label>
                        <input type="tel" class="form-control col-md-9" placeholder="Occupation" name="spouse_occupation" value="{{$data->spouse_occupation}}" >
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
                <img class="signature" src="{{asset('storage/uploads/college/authorized_signature/'.$data->authorized_signature)}}" width="257" height="150">
            @endif
                <br> <span>...................................................</span> <br> 
                <span>Authorized Signature</span> 
            </div>
            <div class="col-md-4">
            @if($data->official_seal)
                <img class="signature" src="{{asset('storage/uploads/college/official_seal/'.$data->official_seal)}}" width="150" height="150">
            @endif
                <br> <span>...................................................</span> <br> 
                <span>Official Seal</span>             
            </div>
            <div class="col-md-4">
                <img class="signature" src="{{asset('storage/uploads/signature/'.$data->signature)}}" width="257" height="150">
                <br> <span>...................................................</span> <br> 
                <span>Applicant's Signature</span>   
            </div>
        </div>    
    </form>
    </div>
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 header-image">
                    <img src="{{asset('MWU Bottom.svg') }}" alt="">
                </div>
            </div>
        </div>
    </footer>
    </div>

    <div class="breakpage"></div>
    @endforeach

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
