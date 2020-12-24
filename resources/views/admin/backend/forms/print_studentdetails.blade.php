{{-- @extends('admin.backend.layouts.master') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$form->regd_no ?? ''}}_{{ $form->fname ?? '' }} {{ $form->mname ?? '' }} {{ $form->lname ?? '' }}</title>
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
            <form class="ui form" method="POST" action="{{ route("admin.forms.update", [$form->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <!-- Name Filed -->
                <div class="field">
                    <label class="required">Name</label>
                    <div class="two fields">
                        <div class="field">
                            <input class=" {{ $errors->has('fname') ? 'is-invalid' : '' }}" type="text" name="fname" placeholder="First Name" value="{{$form->fname}}">
                            @if($errors->has('lname'))
                            <span class="text-danger">{{ $errors->first('lname') }}</span>
                            @endif
                            @if($errors->has('fname'))
                            <span class="text-danger">{{ $errors->first('fname') }}</span>
                            @endif
                        </div>
                        <div class="field">
                            <input class=" " type="text" name="mname" placeholder="Middle Name" value="{{$form->mname}}">
                        </div>
                        <div class="field">
                            <input class=" {{ $errors->has('lname') ? 'is-invalid' : '' }}" type="text" name="lname" placeholder="Last Name" value="{{$form->lname}}" required>
                            @if($errors->has('lname'))
                            <span class="text-danger">{{ $errors->first('lname') }}</span>
                            @endif
                            @if($errors->has('lname'))
                            <span class="text-danger">{{ $errors->first('lname') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Name of School and Faculty -->
                <div class="two fields">
                    <div class="field">
                        <label class="required">Name of School/College</label>
                        {{-- <input class=" {{ $errors->has('campus') ? 'is-invalid' : '' }}" type="text" name="campus" placeholder="School/College" value="{{$form->campus}}" required> --}}
                        <select class="form-control select2 {{ $errors->has('campus') ? 'is-invalid' : '' }}" name="campus" id="campus" placeholder="School/College" required>
                            <option value="">Select College</option>
                            <option value="Babai Multiple Campus" {{ ('Babai Multiple Campus' === $form->campus) ? 'selected' : ''}}>Babai Multiple Campus</option>
                            <option value="Bageshwari Multiple Campus" {{ ('Bageshwari Multiple Campus' === $form->campus) ? 'selected' : ''}}>Bageshwari Multiple Campus</option>
                            <option value="Bheri Education Campus" {{ ('Bheri Education Campus' === $form->campus) ? 'selected' : ''}}>Bheri Education Campus</option>
                            <option value="Bheri Gyanodaya Multiple Campus" {{ ('Bheri Gyanodaya Multiple Campus' === $form->campus) ? 'selected' : ''}}>Bheri Gyanodaya Multiple Campus</option>
                            <option value="Bidyapur Janata Multiple Campus" {{ ('Bidyapur Janata Multiple Campus' === $form->campus) ? 'selected' : ''}}>Bidyapur Janata Multiple Campus</option>
                            <option value="Central Campus of Engineering" {{ ('Central Campus of Engineering' === $form->campus) ? 'selected' : ''}}>Central Campus of Engineering</option>
                            <option value="Central Campus of Education" {{ ('Central Campus of Education' === $form->campus) ? 'selected' : ''}}>Central Campus of Education,</option>
                            <option value="Central Campus of Humanities and Social Sciences" {{ ('Central Campus of Humanities and Social Sciences' === $form->campus) ? 'selected' : ''}}>Central Campus of Humanities and Social Sciences</option>
                            <option value="Central Campus of Management" {{ ('Central Campus of Management' === $form->campus) ? 'selected' : ''}}>Central Campus of Management</option>
                            <option value="Central campus of Science and Technology" {{ ('Central campus of Science and Technology' === $form->campus) ? 'selected' : ''}}>Central campus of Science and Technology</option>
                            <option value="Global College International" {{ ('Global College International' === $form->campus) ? 'selected' : ''}}>Global College International</option>
                            <option value="Jaljala Multiple Campus" {{ ('Jaljala Multiple Campus' === $form->campus) ? 'selected' : ''}}>Jaljala Multiple Campus</option>
                            <option value="Musikot Khalanga Multiple Campus" {{ ('Musikot Khalanga Multiple Campus' === $form->campus) ? 'selected' : ''}}>Musikot Khalanga Multiple Campus</option>
                            <option value="Narayan Campus" {{ ('Narayan Campus' === $form->campus) ? 'selected' : ''}}>Narayan Campus</option>
                            <option value="Rara Multiple Campus" {{ ('Rara Multiple Campus' === $form->campus) ? 'selected' : ''}}>Rara Multiple Campus</option>
                            <option value="School of Law" {{ ('School of Law' === $form->campus) ? 'selected' : ''}}>School of Law</option>
                            <option value="School of Management" {{ ('School of Management' === $form->campus) ? 'selected' : ''}}>School of Management</option>
                            <option value="Tila Karnali Multiple Campus" {{ ('Tila Karnali Multiple Campus' === $form->campus) ? 'selected' : ''}}>Tila Karnali Multiple Campus</option>
                        </select>
                        @if($errors->has('campus'))
                        <span class="text-danger">{{ $errors->first('campus') }}</span>
                        @endif
                    </div>

                    {{-- <div class="four wide field">
                        <label class="">Symbol No.</label>
                        <input class=" {{ $errors->has('symbol_no') ? 'is-invalid' : '' }}" type="text" name="symbol_no" placeholder="Symbol No." value="{{$form->symbol_no}}">
                    @if($errors->has('symbol_no'))
                    <span class="text-danger">{{ $errors->first('symbol_no') }}</span>
                    @endif
                </div> --}}

                {{-- <div class="four wide field">
                        <label class="">Form Serial No.</label>
                    <input class=" {{ $errors->has('form_serial_no') ? 'is-invalid' : '' }}" type="text" name="form_serial_no" placeholder="Form Serial No." value="{{$form->form_serial_no}}" >
                @if($errors->has('form_serial_no'))
                <span class="text-danger">{{ $errors->first('form_serial_no') }}</span>
                @endif
        </div> --}}

        {{-- <div class="seven wide field">
                        <label class="">Exam Centre</label>
                        <input class=" {{ $errors->has('exam_centre') ? 'is-invalid' : '' }}" type="text" name="exam_centre" placeholder="Exam Centre" value="{{$form->exam_centre}}" >
        @if($errors->has('exam_centre'))
        <span class="text-danger">{{ $errors->first('exam_centre') }}</span>
        @endif
    </div> --}}

    <div class="seven wide field">
        <label class="required">Sex</label>
        <select class="ui fluid search dropdown" name="sex" id="sex" required>
            @if($errors->has('sex'))
            <span class="text-danger">{{ $errors->first('sex') }}</span>
            @endif
            <option value="male" {{ ('male' === $form->sex) ? 'selected' : '' }}>Male</option>
            <option value="female" {{ ('female' === $form->sex) ? 'selected' : '' }}>Female</option>
            <option value="other" {{ ('other' === $form->sex) ? 'selected' : '' }}>Other</option>
        </select>
    </div>
    </div>

    <!-- Registration No, Year and Exam Type-->
    <div class="fields">
        <div class="seven wide field">
            <label class="">MU Registration No</label>
            <input class=" {{ $errors->has('regd_no') ? 'is-invalid' : '' }}" type="text" name="regd_no" maxlength="15" placeholder="Registration No" value="{{$form->regd_no}}" required>
            @if($errors->has('regd_no'))
            <span class="text-danger">{{ $errors->first('regd_no') }}</span>
            @endif
        </div>

        <div class="two field">
            <label class="required">Academic Year</label>
            <input class=" {{ $errors->has('year') ? 'is-invalid' : '' }}" type="text" name="year" maxlength="4" placeholder="Year" value="{{$form->year}}" required>
            @if($errors->has('year'))
            <span class="text-danger">{{ $errors->first('year') }}</span>
            @endif
        </div>

        <div class="six wide field">
            <label class="required">Exam Type</label>
            <select class="ui fluid search dropdown" name="exam_type" id="exam-type" required>
                @if($errors->has('exam_type'))
                <span class="text-danger">{{ $errors->first('exam_type') }}</span>
                @endif
                <option value="Regular" {{ ('Regular' === $form->exam_type) ? 'selected' : '' }}>Regular</option>
                <option value="Chance" {{ ('Chance' === $form->exam_type) ? 'selected' : '' }}>Chance</option>
                <option value="Partial" {{ ('Partial' === $form->exam_type) ? 'selected' : '' }}>Partial</option>
            </select>
        </div>
    </div>


    <!-- Registration No, Year and Exam Type-->
    <div class="fields">
        <div class="seven wide field">
            <label class="required">Faculty</label>
            <select class="form-control {{ $errors->has('faculty') ? 'is-invalid' : '' }}" name="faculty" id="faculties" required>


                <option value="">Select a faculty...</option>
                @foreach($faculties as $id => $faculty)

                <option value="{{ $id }}" {{ ($id==$form->faculty) ? 'selected' : '' }}>{{ $faculty }}</option>
                @endforeach
            </select>
            @if($errors->has('faculty'))
            <span class="text-danger">{{ $errors->first('faculty') }}</span>
            @endif
        </div>

        <div class="four wide field">
            <label class="required">Level</label>
            <select class="ui fluid search dropdown" name="level" id="level" required>
                @if($errors->has('level'))
                <span class="text-danger">{{ $errors->first('level') }}</span>
                @endif
                <option value="{{$form->level}}">{{$form->levels->name}}</option>
                {{-- <option value="Master" {{ ('Master' === $form->level) ? 'selected' : '' }}>Master</option>
                <option value="M.Phil." {{ ('M.Phil.' === $form->level) ? 'selected' : '' }}>M.Phil.</option>
                <option value="PhD" {{ ('PhD' === $form->level) ? 'selected' : '' }}>PhD</option> --}}
            </select>
        </div>

        <div class="seven wide field">
            <label class="required">Program</label>
            <select class="form-control select2" name="programs" id="programs" required>
                <option value="{{$form->programs}}">{{$form->course->name}}</option>
                {{-- <option value="Bachelor of English" {{ ('Bachelor of English' === $form->programs) ? 'selected' : '' }}>Bachelor of English</option>
                <option value="Bachelor of HEP" {{ ('Bachelor of HEP' === $form->programs) ? 'selected' : '' }}>Bachelor of HEP</option>
                <option value="Bachelor of Math" {{ ('Bachelor of Math' === $form->programs) ? 'selected' : '' }}>Bachelor of Math</option>
                <option value="Bachelor of Nepali" {{ ('Bachelor of Nepali' === $form->programs) ? 'selected' : '' }}>Bachelor of Nepali</option>
                <option value="Bachelor of Science" {{ ('Bachelor of Science' === $form->programs) ? 'selected' : '' }}>Bachelor of Science</option>
                <option value="BBS" {{ ('BBS' === $form->programs) ? 'selected' : '' }}>BBS</option>
                <option value="Bachelor of Pop" {{ ('Bachelor of Pop' === $form->programs) ? 'selected' : '' }}>Bachelor of Pop</option>
                <option value="BBA" {{ ('BBA' === $form->programs) ? 'selected' : '' }}>BBA</option>
                <option value="Bachelor of Population" {{ ('Bachelor of Population' === $form->programs) ? 'selected' : '' }}>Bachelor of Population</option>
                <option value="BHM" {{ ('BHM' === $form->programs) ? 'selected' : '' }}>BHM</option>
                <option value="BTTM" {{ ('BTTM' === $form->programs) ? 'selected' : '' }}>BTTM</option>
                <option value="B.Sc. CSIT" {{ ('B.Sc. CSIT' === $form->programs) ? 'selected' : '' }}>B.Sc. CSIT</option>
                <option value="BA LLB" {{ ('BA LLB' === $form->programs) ? 'selected' : '' }}>BA LLB</option>
                <option value="B.Sc." {{ ('B.Sc.' === $form->programs) ? 'selected' : '' }}>B.Sc.</option>
                <option value="BE (Civil)" {{ ('BE (Civil)' === $form->programs) ? 'selected' : '' }}>BE (Civil)</option>
                <option value="BE (Computer)" {{ ('BE (Computer)' === $form->programs) ? 'selected' : '' }}>BE (Computer)</option>
                <option value="BE (Hydropower)" {{ ('BE (Hydropower)' === $form->programs) ? 'selected' : '' }}>BE (Hydropower)</option>
                <option value="Master of English" {{ ('Master of English' === $form->programs) ? 'selected' : '' }}>Master of English</option>
                <option value="Master of Nepali" {{ ('Master of Nepali' === $form->programs) ? 'selected' : '' }}>Master of Nepali</option>
                <option value="Master of HEP" {{ ('Master of HEP' === $form->programs) ? 'selected' : '' }}>Master of HEP</option>
                <option value="Master of EPM" {{ ('Master of EPM' === $form->programs) ? 'selected' : '' }}>Master of EPM</option>
                <option value="MBS" {{ ('MBS' === $form->programs) ? 'selected' : '' }}>MBS</option>
                <option value="Master of CE" {{ ('Master of CE' === $form->programs) ? 'selected' : '' }}>Master of CE</option>
                <option value="Master of Pop" {{ ('Master of Pop' === $form->programs) ? 'selected' : '' }}>Master of Pop</option>
                <option value="Master of Math" {{ ('Master of Math' === $form->programs) ? 'selected' : '' }}>Master of Math</option>
                <option value="Masters in Physics" {{ ('Masters in Physics' === $form->programs) ? 'selected' : '' }}>Masters in Physics</option>
                <option value="Master in International Co-operation and Development" {{ ('Master in International Co-operation and Development' === $form->programs) ? 'selected' : '' }}>Master in International Co-operation and Development</option>
                <option value="MBA" {{ ('MBA' === $form->programs) ? 'selected' : '' }}>MBA</option>
                <option value="ME (Structure)" {{ ('ME (Structure)' === $form->programs) ? 'selected' : '' }}>ME (Structure)</option>
                <option value="ME (Construction Management)" {{ ('ME (Construction Management)' === $form->programs) ? 'selected' : '' }}>ME (Construction Management)</option>
                <option value="MEd Nepali" {{ ('MEd Nepali' === $form->programs) ? 'selected' : '' }}>MEd Nepali</option>
                <option value="Journalism" {{ ('Journalism' === $form->programs) ? 'selected' : '' }}>Journalism</option>
                <option value="Anthropology" {{ ('Anthropology' === $form->programs) ? 'selected' : '' }}>Anthropology</option>
                <option value="Social Work" {{ ('Social Work' === $form->programs) ? 'selected' : '' }}>Social Work</option>
                <option value="Sociology" {{ ('Sociology' === $form->programs) ? 'selected' : '' }}>Sociology</option>
                <option value="International Relation and Diplomacy" {{ ('International Relation and Diplomacy' === $form->programs) ? 'selected' : '' }}>International Relation and Diplomacy</option>
                <option value="English" {{ ('English' === $form->programs) ? 'selected' : '' }}>English</option>
                <option value="Math" {{ ('Math' === $form->programs) ? 'selected' : '' }}>Math</option>
                <option value="Nepali" {{ ('Nepali' === $form->programs) ? 'selected' : '' }}>Nepali</option>
                <option value="Rural Development" {{ ('Rural Development' === $form->programs) ? 'selected' : '' }}>Rural Development</option>
                <option value="Development Economics" {{ ('Development Economics' === $form->programs) ? 'selected' : '' }}>Development Economics</option>
                <option value="Folklore Studies" {{ ('Folklore Studies' === $form->programs) ? 'selected' : '' }}>Folklore Studies</option>
                <option value="Conflict and Peace Studies" {{ ('Conflict and Peace Studies' === $form->programs) ? 'selected' : '' }}>Conflict and Peace Studies</option> --}}
            </select>
            @if($errors->has('programs'))
            <span class="text-danger">{{ $errors->first('programs') }}</span>
            @endif
        </div>

        <div class="six wide field">
            <label class="required">Semester</label>
            <select class="ui fluid search dropdown" name="semester" id="semester" required>
                @if($errors->has('semester'))
                <span class="text-danger">{{ $errors->first('semester') }}</span>
                @endif
                <option value="First" {{ ('First' === $form->semester) ? 'selected' : '' }}>1st Semester</option>
                <option value="Second" {{ ('Second' === $form->semester) ? 'selected' : '' }}>2nd Semester</option>
                <option value="Third" {{ ('Third' === $form->semester) ? 'selected' : '' }}>3rd Semester</option>
                <option value="Fourth" {{ ('Fourth' === $form->semester) ? 'selected' : '' }}>4th Semester</option>
                <option value="Fifth" {{ ('Fifth' === $form->semester) ? 'selected' : '' }}>5th Semester</option>
                <option value="Sixth" {{ ('Sixth' === $form->semester) ? 'selected' : '' }}>6th Semester</option>
                <option value="Seventh" {{ ('Seventh' === $form->semester) ? 'selected' : '' }}>7th Semester</option>
                <option value="Eighth" {{ ('Eighth' === $form->semester) ? 'selected' : '' }}>8th Semester</option>
                <option value="Ninth" {{ ('Ninth' === $form->semester) ? 'selected' : '' }}>9th Semester</option>
                <option value="Tenth" {{ ('Tenth' === $form->semester) ? 'selected' : '' }}>10th Semester</option>
            </select>
        </div>
    </div>

    <!-- Student Photo -->
    {{-- <div class="field">
                    <label class="required">PassPort Size Photo of Student</label>
                    <input class=" {{ $errors->has('image') ? 'is-invalid' : '' }}" type="file" name="image" required>
    @if($errors->has('lname'))
    <span class="text-danger">{{ $errors->first('lname') }}</span>
    @endif
    </div> --}}

    <!-- Student Photo -->
    {{-- <div class="field">
                    <label class="required">Applicant signature</label>
                    <input class=" {{ $errors->has('signature') ? 'is-invalid' : '' }}" type="file" name="signature" required>
    @if($errors->has('lname'))
    <span class="text-danger">{{ $errors->first('lname') }}</span>
    @endif
    </div> --}}

    <!-- Subject Code and name -->
    <h4 class="ui dividing header">Subject Infromation</h4>
    <div class="two fields">
        <div class="field">
            <label class="required">Subject Name</label>
            @foreach($form->subjects as $subject)
            <input class=" {{ $errors->has('subjects') ? 'is-invalid' : '' }}" type="text" name="subjects[]" placeholder="Subject Name" value="{{$subject->title}}">
            @endforeach
        </div>
        <div class="two field">
            <label class="required">Subject Code</label>
            @foreach($form->subjects as $subject)
            <input class=" {{ $errors->has('subject_codes') ? 'is-invalid' : '' }}" type="text" name="subject_codes[]" placeholder="Subject Code" value="{{$subject->subject_code}}">
            @endforeach
        </div>
    </div>

    <h4 class="ui dividing header">Student's Other Infromation</h4>


    <div class="two fields">
        <div class="field">
            <label class="required">Nationality</label>
            <input class=" {{ $errors->has('nationality') ? 'is-invalid' : '' }}" type="text" name="nationality" placeholder="Nationality" value="{{$form->nationality}}" required>
            @if($errors->has('nationality'))
            <span class="text-danger">{{ $errors->first('nationality') }}</span>
            @endif
        </div>
        <div class="field">
            <label class="required">Date of Birth (According to SLC/SEE):</label>
            <input class=" {{ $errors->has('dateOfBirth') ? 'is-invalid' : '' }} date-picker" type="text" name="dateOfBirth" placeholder="Date of Birth" value="{{$form->dateOfBirth}}" required>
            @if($errors->has('dateOfBirth'))
            <span class="text-danger">{{ $errors->first('dateOfBirth') }}</span>
            @endif
        </div>
        <div class="two field">
            <label class="required">District</label>
            <input class=" {{ $errors->has('district') ? 'is-invalid' : '' }}" type="text" name="district" placeholder="District" value="{{$form->district}}" required>
            @if($errors->has('district'))
            <span class="text-danger">{{ $errors->first('district') }}</span>
            @endif
        </div>
    </div>

    <!-- Father and Mother Name -->
    <div class="two fields">
        <div class="field">
            <label class="required">Mother's Name</label>
            <input class=" {{ $errors->has('mother_name') ? 'is-invalid' : '' }}" type="text" name="mother_name" placeholder="Mother's Name" value="{{$form->mother_name}}" required>
            @if($errors->has('mother_name'))
            <span class="text-danger">{{ $errors->first('mother_name') }}</span>
            @endif
        </div>
        <div class="two field">
            <label class="required">Father's Name</label>
            <input class=" {{ $errors->has('father_name') ? 'is-invalid' : '' }}" type="text" name="father_name" placeholder="Father's Name" value="{{$form->father_name}}" required>
            @if($errors->has('father_name'))
            <span class="text-danger">{{ $errors->first('father_name') }}</span>
            @endif
        </div>
    </div>

    <div class="two fields">
        <div class="field">
            <label class="required">Ward No.</label>
            <input class=" {{ $errors->has('ward') ? 'is-invalid' : '' }}" type="text" name="ward" placeholder="Ward No." value="{{$form->ward}}" required>
            @if($errors->has('ward'))
            <span class="text-danger">{{ $errors->first('ward') }}</span>
            @endif
        </div>
        <div class="field">
            <label class="required">Contact Number</label>
            <input class=" {{ $errors->has('contact') ? 'is-invalid' : '' }}" type="text" name="contact" placeholder="Contact Number" value="{{$form->contact}}" required>
            @if($errors->has('contact'))
            <span class="text-danger">{{ $errors->first('contact') }}</span>
            @endif
        </div>
        <div class="two field">
            <label class="">E-Mail</label>
            <input class=" {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" placeholder="E-Mail" value="{{$form->email}}">
        </div>
    </div>



    @php
    $boards = json_decode($form->board);
    $passed_year = json_decode($form->passed_year);
    $roll_no = json_decode($form->roll_no);
    $divison = json_decode($form->division);
    @endphp
    <h4 class="ui dividing header">Examination History</h4>
    <label class="required">SLC/SEE</label>
    <div class="fields">
        <div class="seven wide field">
            <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board" placeholder="Board or University" value="{{ $boards[0] }}" required>
            @if($errors->has('lname'))
            <span class="text-danger">{{ $errors->first('lname') }}</span>
            @endif
        </div>
        <div class="three wide field">
            <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year" placeholder="Passed Year" value="{{ $passed_year[0] }}" required>
            @if($errors->has('lname'))
            <span class="text-danger">{{ $errors->first('lname') }}</span>
            @endif
        </div>
        <div class="six wide field">
            <div class="two fields">
                <div class="field">
                    <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no" placeholder="Roll No./ Symbol No." value="{{ $roll_no[0] }}" required>
                    @if($errors->has('lname'))
                    <span class="text-danger">{{ $errors->first('lname') }}</span>
                    @endif
                </div>
                <div class="field">
                    <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division" placeholder="Division" value="{{ $divison[0] }}" required>
                    @if($errors->has('lname'))
                    <span class="text-danger">{{ $errors->first('lname') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <label class="value=" {{ $passed_year[0] }}" required">Intermediate/+2</label>
    <div class="fields">
        <div class="seven wide field">
            <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board" placeholder="Board or University" value="{{ $boards[1] }}" required>
            @if($errors->has('lname'))
            <span class="text-danger">{{ $errors->first('lname') }}</span>
            @endif
        </div>
        <div class="three wide field">
            <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year" placeholder="Passed Year" value="{{ $passed_year[1] }}" required>
            @if($errors->has('lname'))
            <span class="text-danger">{{ $errors->first('lname') }}</span>
            @endif
        </div>
        <div class="six wide field">
            <div class="two fields">
                <div class="field">
                    <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no" placeholder="Roll No./ Symbol No." value="{{ $roll_no[1] }}" required>
                    @if($errors->has('lname'))
                    <span class="text-danger">{{ $errors->first('lname') }}</span>
                    @endif
                </div>
                <div class="field">
                    <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division" placeholder="Division" value="{{ $divison[1] }}" required>
                    @if($errors->has('lname'))
                    <span class="text-danger">{{ $errors->first('lname') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <label class="">Bachelor</label>
    <div class="fields">
        <div class="seven wide field">
            <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board" placeholder="Board or University" value="{{ $boards[2] }}">
        </div>
        <div class="three wide field">
            <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year" placeholder="Passed Year" value="{{ $passed_year[2] }}">
        </div>
        <div class="six wide field">
            <div class="two fields">
                <div class="field">
                    <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no" placeholder="Roll No./ Symbol No." value="{{ $roll_no[2] }}">
                </div>
                <div class="field">
                    <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division" placeholder="Division" value="{{ $divison[2] }}">
                </div>
            </div>
        </div>
    </div>

    <label class="">Master</label>
    <div class="fields">
        <div class="seven wide field">
            <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board" placeholder="Board or University" value="{{ $boards[3] }}">
        </div>
        <div class="three wide field">
            <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year" placeholder="Passed Year" value="{{ $passed_year[3] }}">
        </div>
        <div class="six wide field">
            <div class="two fields">
                <div class="field">
                    <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no" placeholder="Roll No./ Symbol No." value="{{ $roll_no[3] }}">
                </div>
                <div class="field">
                    <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division" placeholder="Division" value="{{ $divison[3] }}">
                </div>
            </div>
        </div>
    </div>

    <label class="">Others</label>
    <div class="fields">
        <div class="seven wide field">
            <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board" placeholder="Board or University" value="{{ $boards[4] }}">
        </div>
        <div class="three wide field">
            <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year" placeholder="Passed Year" value="{{ $passed_year[4] }}">
        </div>
        <div class="six wide field">
            <div class="two fields">
                <div class="field">
                    <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no" placeholder="Roll No./ Symbol No." value="{{ $roll_no[4] }}">
                </div>
                <div class="field">
                    <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division" placeholder="Division" value="{{ $divison[4] }}">
                </div>
            </div>
        </div>
    </div>
    <div class="field">
        <span><input type="checkbox" name="consent" id="consent" {{$form->consent==1?'checked':''}}> I hereby declare that the information given by me in this examination application form is correct to the best of my knowledge and belief. I understand that in case anything is found contradictory or false, my application form shall be cancelled. I shall abide by all terms and conditions of the Examinations Management Office (EMO) with regards to examination. </span>
    </div>
        <img class="signature" src="{{asset('storage/uploads/signature/'.$form->signature)}}" width="257" height="74" style="float: right">


    {{-- <div class="form-group">
                    <button class="btn btn-success" type="submit">
                        Approve
                    </button>
                    <a href="{{route('admin.forms.index')}}" class="btn btn-danger">{{ trans('global.cancel') }}</a>
    </div> --}}
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
