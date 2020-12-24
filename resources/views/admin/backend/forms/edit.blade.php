@extends('admin.backend.layouts.master')
@section('title','Edit')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/form/semantic.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/form/style.css')}}">
<link rel="stylesheet" href="{{ asset('/backend/plugins/select2/css/select2.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('/backend/bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('/backend/plugins/nepali-date-picker/nepaliDatePicker.min.css')}}">

@endsection

@section('content')

<div class="card">
    <div class="card-header">
        {{-- {{ trans('global.edit') }} --}} Approve Applicant
    </div>

    <div class="card-body">
        <form class="ui form" method="POST" action="{{ route("admin.forms.update", [$data->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <h4 class="ui dividing header">Registration Form</h4>
            <!-- Name Filed -->
            <div class="field">
                <label class="required">Name</label>
                <div class="two fields">
                    <div class="field">
                        <input class=" {{ $errors->has('fname') ? 'is-invalid' : '' }}" type="text" name="fname" placeholder="First Name" value="{{$data->fname}}">
                        @if($errors->has('lname'))
                        <span class="text-danger">{{ $errors->first('lname') }}</span>
                        @endif
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
                    {{-- <input class=" {{ $errors->has('campus') ? 'is-invalid' : '' }}" type="text" name="campus" placeholder="School/College" value="{{$data->campus}}" required> --}}
                    <select class="form-control select2 {{ $errors->has('campus') ? 'is-invalid' : '' }}" name="campus" id="campus" placeholder="School/College" required>
                        <option value="">Select College</option>
                        <option value="Babai Multiple Campus" {{ ('Babai Multiple Campus' === $data->campus) ? 'selected' : ''}}>Babai Multiple Campus</option>
                        <option value="Bageshwari Multiple Campus" {{ ('Bageshwari Multiple Campus' === $data->campus) ? 'selected' : ''}}>Bageshwari Multiple Campus</option>
                        <option value="Bheri Education Campus" {{ ('Bheri Education Campus' === $data->campus) ? 'selected' : ''}}>Bheri Education Campus</option>
                        <option value="Bheri Gyanodaya Multiple Campus" {{ ('Bheri Gyanodaya Multiple Campus' === $data->campus) ? 'selected' : ''}}>Bheri Gyanodaya Multiple Campus</option>
                        <option value="Bidyapur Janata Multiple Campus" {{ ('Bidyapur Janata Multiple Campus' === $data->campus) ? 'selected' : ''}}>Bidyapur Janata Multiple Campus</option>
                        <option value="Central Campus of Engineering" {{ ('Central Campus of Engineering' === $data->campus) ? 'selected' : ''}}>Central Campus of Engineering</option>
                        <option value="Central Campus of Education" {{ ('Central Campus of Education' === $data->campus) ? 'selected' : ''}}>Central Campus of Education,</option>
                        <option value="Central Campus of Humanities and Social Sciences" {{ ('Central Campus of Humanities and Social Sciences' === $data->campus) ? 'selected' : ''}}>Central Campus of Humanities and Social Sciences</option>
                        <option value="Central Campus of Management" {{ ('Central Campus of Management' === $data->campus) ? 'selected' : ''}}>Central Campus of Management</option>
                        <option value="Central campus of Science and Technology" {{ ('Central campus of Science and Technology' === $data->campus) ? 'selected' : ''}}>Central campus of Science and Technology</option>
                        <option value="Global College International" {{ ('Global College International' === $data->campus) ? 'selected' : ''}}>Global College International</option>
                        <option value="Jaljala Multiple Campus" {{ ('Jaljala Multiple Campus' === $data->campus) ? 'selected' : ''}}>Jaljala Multiple Campus</option>
                        <option value="Musikot Khalanga Multiple Campus" {{ ('Musikot Khalanga Multiple Campus' === $data->campus) ? 'selected' : ''}}>Musikot Khalanga Multiple Campus</option>
                        <option value="Narayan Campus" {{ ('Narayan Campus' === $data->campus) ? 'selected' : ''}}>Narayan Campus</option>
                        <option value="Rara Multiple Campus" {{ ('Rara Multiple Campus' === $data->campus) ? 'selected' : ''}}>Rara Multiple Campus</option>
                        <option value="School of Law" {{ ('School of Law' === $data->campus) ? 'selected' : ''}}>School of Law</option>
                        <option value="School of Management" {{ ('School of Management' === $data->campus) ? 'selected' : ''}}>School of Management</option>
                        <option value="Tila Karnali Multiple Campus" {{ ('Tila Karnali Multiple Campus' === $data->campus) ? 'selected' : ''}}>Tila Karnali Multiple Campus</option>

                    </select>
                    @if($errors->has('campus'))
                    <span class="text-danger">{{ $errors->first('campus') }}</span>
                    @endif
                </div>
                <div class="four wide field">
                    <label class="">Symbol No.</label>
                    <input class=" {{ $errors->has('symbol_no') ? 'is-invalid' : '' }}" type="text" name="symbol_no" placeholder="Symbol No." value="{{$data->symbol_no}}">
                    @if($errors->has('symbol_no'))
                    <span class="text-danger">{{ $errors->first('symbol_no') }}</span>
                    @endif
                </div>
                {{-- <div class="four wide field">
                        <label class="">Form Serial No.</label>
                    <input class=" {{ $errors->has('form_serial_no') ? 'is-invalid' : '' }}" type="text" name="form_serial_no" placeholder="Form Serial No." value="{{$data->form_serial_no}}" >
                @if($errors->has('form_serial_no'))
                <span class="text-danger">{{ $errors->first('form_serial_no') }}</span>
                @endif
            </div> --}}
            <div class="seven wide field">
                <label class="">Exam Centre</label>
                <input class=" {{ $errors->has('exam_centre') ? 'is-invalid' : '' }}" type="text" name="exam_centre" placeholder="Exam Centre" value="{{$data->exam_centre}}">
                @if($errors->has('exam_centre'))
                <span class="text-danger">{{ $errors->first('exam_centre') }}</span>
                @endif
            </div>
            <div class="four wide field">
                <label class="required">Sex</label>
                <select class="ui fluid search dropdown" name="sex" id="sex" required>
                    @if($errors->has('sex'))
                    <span class="text-danger">{{ $errors->first('sex') }}</span>
                    @endif
                    <option value="male" {{ ('male' === $data->sex) ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ ('female' === $data->sex) ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ ('other' === $data->sex) ? 'selected' : '' }}>Other</option>
                </select>
            </div>
    </div>

    <!-- Registration No, Year and Exam Type-->
    <div class="fields">
        <div class="seven wide field">
            <label class="">MU Registration No</label>
            <input class=" {{ $errors->has('regd_no') ? 'is-invalid' : '' }}" type="text" name="regd_no" maxlength="19" placeholder="0000-00-0-0000-0000" value="{{$data->regd_no}}">
            @if($errors->has('regd_no'))
            <span class="text-danger">{{ $errors->first('regd_no') }}</span>
            @endif
        </div>

        <div class="two field">
            <label class="required"> Academic Year</label>
            <input class=" {{ $errors->has('year') ? 'is-invalid' : '' }}" type="text" name="year" maxlength="4" placeholder="Year" value="{{$data->year}}" required>
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
                <option value="Regular" {{ ('Regular' === $data->exam_type) ? 'selected' : '' }}>Regular</option>
                <option value="Chance" {{ ('Chance' === $data->exam_type) ? 'selected' : '' }}>Chance</option>
                <option value="Partial" {{ ('Partial' === $data->exam_type) ? 'selected' : '' }}>Partial</option>
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

                <option value="{{ $id }}" {{ ($id==$data->faculty) ? 'selected' : '' }}>{{ $faculty }}</option>
                @endforeach
            </select>
            @if($errors->has('faculty'))
            <span class="text-danger">{{ $errors->first('faculty') }}</span>
            @endif
        </div>

        <div class="four wide field">
            <label class="required">Level</label>
            <select class="ui fluid search dropdown" name="level" id="levels" required>
                <option value="{{$data->level}}">{{$data->levels->name}}</option>

            </select>
            @if($errors->has('level'))
            <span class="text-danger">{{ $errors->first('level') }}</span>
            @endif

        </div>

        <div class="seven wide field">
            <label class="required">Program</label>
            <select class="form-control select2" name="programs" id="programs" required>
                <option value="{{$data->programs}}">{{$data->course->name}}</option>
                {{-- <option value="B. Ed. in English" {{ ('B. Ed. in English' === $data->programs) ? 'selected' : '' }}>B. Ed. in English</option>
                <option value="B. Ed. in HEP" {{ ('B. Ed. in HEP' === $data->programs) ? 'selected' : '' }}>B. Ed. in HEP</option>
                <option value="B. Ed. in Math" {{ ('B. Ed. in Math' === $data->programs) ? 'selected' : '' }}>B. Ed. in Math</option>
                <option value="B. Ed. in Nepali" {{ ('B. Ed. in Nepali' === $data->programs) ? 'selected' : '' }}>B. Ed. in Nepali</option>
                <option value="B. Ed. in Science" {{ ('B. Ed. in Science' === $data->programs) ? 'selected' : '' }}>B. Ed. in Science</option>
                <option value="B. Ed. in Population" {{ ('B. Ed. in Population' === $data->programs) ? 'selected' : '' }}>B. Ed. in Population</option>
                <option value="B. A. in Social Work" {{ ('B. A. in Social Work' === $data->programs) ? 'selected' : '' }}>B. A. in Social Work</option>
                <option value="B. A. in Sociology" {{ ('B. A. in Sociology' === $data->programs) ? 'selected' : '' }}>B. A. in Sociology</option>
                <option value="B. A. in Journalism and Mass Communications" {{ ('B. A. in Journalism and Mass Communications' === $data->programs) ? 'selected' : '' }}>B. A. in Journalism and Mass Communications</option>
                <option value="B. A. in International Relation and Diplomacy" {{ ('B. A. in International Relation and Diplomacy' === $data->programs) ? 'selected' : '' }}>B. A. in International Relation and Diplomacy</option>
                <option value="B. A. in English" {{ ('B. A. in English' === $data->programs) ? 'selected' : '' }}>B. A. in English</option>
                <option value="B. A. in Nepali" {{ ('B. A. in Nepali' === $data->programs) ? 'selected' : '' }}>B. A. in Nepali</option>
                <option value="B. A. in Rural Development" {{ ('B. A. in Rural Development' === $data->programs) ? 'selected' : '' }}>B. A. in Rural Development</option>
                <option value="B. A. in Development Economics" {{ ('B. A. in Development Economics' === $data->programs) ? 'selected' : '' }}>B. A. in Development Economics</option>
                <option value="BBS" {{ ('BBS' === $data->programs) ? 'selected' : '' }}>BBS</option>
                <option value="BBA" {{ ('BBA' === $data->programs) ? 'selected' : '' }}>BBA</option>
                <option value="BHM" {{ ('BHM' === $data->programs) ? 'selected' : '' }}>BHM</option>
                <option value="BTTM" {{ ('BTTM' === $data->programs) ? 'selected' : '' }}>BTTM</option>
                <option value="B.Sc. CSIT" {{ ('B.Sc. CSIT' === $data->programs) ? 'selected' : '' }}>B.Sc. CSIT</option>
                <option value="BA LLB" {{ ('BA LLB' === $data->programs) ? 'selected' : '' }}>BA LLB</option>
                <option value="B. E. in Civil Engineering" {{ ('B. E. in Civil Engineering' === $data->programs) ? 'selected' : '' }}>B. E. in Civil Engineering</option>
                <option value="B. E. in Computer Engineering" {{ ('B. E. in Computer Engineering' === $data->programs) ? 'selected' : '' }}>B. E. in Computer Engineering</option>
                <option value="B. E. in Hydropower Engineering" {{ ('B. E. in Hydropower Engineering' === $data->programs) ? 'selected' : '' }}>B. E. in Hydropower Engineering</option>
                <option value="M. Ed. in English" {{ ('M. Ed. in English' === $data->programs) ? 'selected' : '' }}>M. Ed. in English</option>
                <option value="M. Ed. in Nepali" {{ ('M. Ed. in Nepali' === $data->programs) ? 'selected' : '' }}>M. Ed. in Nepali</option>
                <option value="M. Ed. in HEP" {{ ('M. Ed. in HEP' === $data->programs) ? 'selected' : '' }}>M. Ed. in HEP</option>
                <option value="M. Ed. in EPM" {{ ('M. Ed. in EPM' === $data->programs) ? 'selected' : '' }}>M. Ed. in EPM</option>
                <option value="M. Ed. in CE" {{ ('M. Ed. in CE' === $data->programs) ? 'selected' : '' }}>M. Ed. in CE</option>
                <option value="M. Ed. in Popuplation" {{ ('M. Ed. in Popuplation' === $data->programs) ? 'selected' : '' }}>M. Ed. in Popuplation</option>
                <option value="M. Ed. in Math" {{ ('M. Ed. in Math' === $data->programs) ? 'selected' : '' }}>M. Ed. in Math</option>
                <option value="M. A. in Social Work" {{ ('M. A. in Social Work' === $data->programs) ? 'selected' : '' }}>M. A. in Social Work</option>
                <option value="M. A. in Sociology" {{ ('M. A. in Sociology' === $data->programs) ? 'selected' : '' }}>M. A. in Sociology</option>
                <option value="M. A. in Journalism and Mass Communications" {{ ('M. A. in Journalism and Mass Communications' === $data->programs) ? 'selected' : '' }}>M. A. in Journalism and Mass Communications</option>
                <option value="M. A. in Anthropology" {{ ('M. A. in Anthropology' === $data->programs) ? 'selected' : '' }}>M. A. in Anthropology</option>
                <option value="M. A. in International Relation and Diplomacy" {{ ('M. A. in International Relation and Diplomacy' === $data->programs) ? 'selected' : '' }}>M. A. in International Relation and Diplomacy</option>
                <option value="M. A. in English" {{ ('M. A. in English' === $data->programs) ? 'selected' : '' }}>M. A. in English</option>
                <option value="M. A. in Nepali" {{ ('M. A. in Nepali' === $data->programs) ? 'selected' : '' }}>M. A. in Nepali</option>
                <option value="M. A. in Rural Development" {{ ('M. A. in Rural Development' === $data->programs) ? 'selected' : '' }}>M. A. in Rural Development</option>
                <option value="M. A. in Development Economics" {{ ('M. A. in Development Economics' === $data->programs) ? 'selected' : '' }}>M. A. in Development Economics</option>
                <option value="M. A. in Folklore Studies" {{ ('M. A. in Folklore Studies' === $data->programs) ? 'selected' : '' }}>M. A. in Folklore Studies</option>
                <option value="M. A. in Conflict and Peace Studies" {{ ('M. A. in Conflict and Peace Studies' === $data->programs) ? 'selected' : '' }}>M. A. in Conflict and Peace Studies</option>
                <option value="MBS" {{ ('MBS' === $data->programs) ? 'selected' : '' }}>MBS</option>
                <option value="MBA" {{ ('MBA' === $data->programs) ? 'selected' : '' }}>MBA</option>
                <option value="M.Sc. in Physics" {{ ('M.Sc. in Physics' === $data->programs) ? 'selected' : '' }}>M.Sc. in Physics</option>
                <option value="M. Sc. in Structural Engineering" {{ ('M. Sc. in Structural Engineering' === $data->programs) ? 'selected' : '' }}>M. Sc. in Structural Engineering</option>
                <option value="M. Sc. in Construction Management" {{ ('M. Sc. in Construction Management' === $data->programs) ? 'selected' : '' }}>M. Sc. in Construction Management</option> --}}

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
                <option value="First" {{ ('First' === $data->semester) ? 'selected' : '' }}>1st Semester</option>
                <option value="Second" {{ ('Second' === $data->semester) ? 'selected' : '' }}>2nd Semester</option>
                <option value="Third" {{ ('Third' === $data->semester) ? 'selected' : '' }}>3rd Semester</option>
                <option value="Fourth" {{ ('Fourth' === $data->semester) ? 'selected' : '' }}>4th Semester</option>
                <option value="Fifth" {{ ('Fifth' === $data->semester) ? 'selected' : '' }}>5th Semester</option>
                <option value="Sixth" {{ ('Sixth' === $data->semester) ? 'selected' : '' }}>6th Semester</option>
                <option value="Seventh" {{ ('Seventh' === $data->semester) ? 'selected' : '' }}>7th Semester</option>
                <option value="Eighth" {{ ('Eighth' === $data->semester) ? 'selected' : '' }}>8th Semester</option>
                <option value="Ninth" {{ ('Ninth' === $data->semester) ? 'selected' : '' }}>9th Semester</option>
                <option value="Tenth" {{ ('Tenth' === $data->semester) ? 'selected' : '' }}>10th Semester</option>
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
<div class="subject-info">
    <h4 class="ui dividing header">Subject Information</h4>
    <div class="three fields subject-row">
        <div class="field">
            <label class="required">Subject Name</label>
            @if($errors->has('subjects'))
            <span class="text-danger">{{ $errors->first('subjects') }}</span>
            @endif
        </div>
        <div class="three field">
            <label class="required">Subject Code</label>
            @if($errors->has('subject_codes'))
            <span class="text-danger">{{ $errors->first('subject_codes') }}</span>
            @endif
        </div>
        <div class="three field">
            <label for="btn">Action</label>
        </div>
    </div>
    @foreach($subjects as $key => $subject)
    <div class="three fields subject-row">
        <div class="field">
            <select name="subjects[]" class="subjects" data-id="{{ $subject->id }}">

            </select>
        </div>
        <div class="three field">
            <input class=" {{ $errors->has('subject_codes') ? 'is-invalid' : '' }} subject-code" type="text" readonly name="subject_codes[]" placeholder="Subject Code" value="{{$subject->subject_code}}" required>
        </div>
        <div class="three field">
            <button class="btn btn-primary add-btn" type="button"><span style="color:white;" class="fas fa-plus"></span></button>
            <button class="btn btn-danger remove-btn" type="button"><span style="color:white;" class="fas fa-trash"></span></button>
        </div>
    </div>
@endforeach
</div>

<h4 class="ui dividing header">Student's Other Information</h4>


<div class="two fields">
    <div class="field">
        <label class="required">Nationality</label>
        <input class=" {{ $errors->has('nationality') ? 'is-invalid' : '' }}" type="text" name="nationality" placeholder="Nationality" value="{{$data->nationality}}" required>
        @if($errors->has('nationality'))
        <span class="text-danger">{{ $errors->first('nationality') }}</span>
        @endif
    </div>
    <div class="field">
        <label class="required">Date of Birth (According to SLC/SEE):</label>
        <input class=" {{ $errors->has('dateOfBirth') ? 'is-invalid' : '' }} date-picker" type="text" name="dateOfBirth" placeholder="Date of Birth" value="{{$data->dateOfBirth}}" required>
        @if($errors->has('dateOfBirth'))
        <span class="text-danger">{{ $errors->first('dateOfBirth') }}</span>
        @endif
    </div>
    <div class="two field">
        <label class="required">District</label>
        <input class=" {{ $errors->has('district') ? 'is-invalid' : '' }}" type="text" name="district" placeholder="District" value="{{$data->district}}" required>
        @if($errors->has('district'))
        <span class="text-danger">{{ $errors->first('district') }}</span>
        @endif
    </div>
</div>

<!-- Father and Mother Name -->
<div class="two fields">
    <div class="field">
        <label class="required">Mother's Name</label>
        <input class=" {{ $errors->has('mother_name') ? 'is-invalid' : '' }}" type="text" name="mother_name" placeholder="Mother's Name" value="{{$data->mother_name}}" required>
        @if($errors->has('mother_name'))
        <span class="text-danger">{{ $errors->first('mother_name') }}</span>
        @endif
    </div>
    <div class="two field">
        <label class="required">Father's Name</label>
        <input class=" {{ $errors->has('father_name') ? 'is-invalid' : '' }}" type="text" name="father_name" placeholder="Father's Name" value="{{$data->father_name}}" required>
        @if($errors->has('father_name'))
        <span class="text-danger">{{ $errors->first('father_name') }}</span>
        @endif
    </div>
</div>

<div class="two fields">
    <div class="field">
        <label class="required">Ward No.</label>
        <input class=" {{ $errors->has('ward') ? 'is-invalid' : '' }}" type="text" name="ward" placeholder="Ward No." value="{{$data->ward}}" required>
        @if($errors->has('ward'))
        <span class="text-danger">{{ $errors->first('ward') }}</span>
        @endif
    </div>
    <div class="field">
        <label class="required">Contact Number</label>
        <input class=" {{ $errors->has('contact') ? 'is-invalid' : '' }}" type="text" name="contact" placeholder="Contact Number" value="{{$data->contact}}" required>
        @if($errors->has('contact'))
        <span class="text-danger">{{ $errors->first('contact') }}</span>
        @endif
    </div>
    <div class="two field">
        <label class="required">E-Mail</label>
        <input class=" {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" placeholder="E-Mail" value="{{$data->email}}" required>
    </div>
</div>

@php
$boards = json_decode($data->board);
$passed_year = json_decode($data->passed_year);
$roll_no = json_decode($data->roll_no);
$divison = json_decode($data->division);
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
                <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no" placeholder="Roll No./ Symbol No." value="{{ $roll_no[0] }}"  required>
                @if($errors->has('lname'))
                <span class="text-danger">{{ $errors->first('lname') }}</span>
                @endif
            </div>
            <div class="field">
                <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division" placeholder="Division" value="{{ $divison[0] }}"  required>
                @if($errors->has('lname'))
                <span class="text-danger">{{ $errors->first('lname') }}</span>
                @endif
            </div>
        </div>
    </div>
</div>

<label class="value="{{ $passed_year[0] }}"  required">Intermediate/+2</label>
<div class="fields">
    <div class="seven wide field">
        <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board" placeholder="Board or University" value="{{ $boards[1] }}" required>
        @if($errors->has('lname'))
        <span class="text-danger">{{ $errors->first('lname') }}</span>
        @endif
    </div>
    <div class="three wide field">
        <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year" placeholder="Passed Year" value="{{ $passed_year[1] }}"  required>
        @if($errors->has('lname'))
        <span class="text-danger">{{ $errors->first('lname') }}</span>
        @endif
    </div>
    <div class="six wide field">
        <div class="two fields">
            <div class="field">
                <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no" placeholder="Roll No./ Symbol No." value="{{ $roll_no[1] }}"  required>
                @if($errors->has('lname'))
                <span class="text-danger">{{ $errors->first('lname') }}</span>
                @endif
            </div>
            <div class="field">
                <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division" placeholder="Division" value="{{ $divison[1] }}"  required>
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
        <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board" placeholder="Board or University" value="{{ $boards[2] }}" >
    </div>
    <div class="three wide field">
        <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year" placeholder="Passed Year" value="{{ $passed_year[2] }}" >
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
        <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board" placeholder="Board or University" value="{{ $boards[3] }}" >
    </div>
    <div class="three wide field">
        <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year" placeholder="Passed Year" value="{{ $passed_year[3] }}" >
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
        <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board" placeholder="Board or University" value="{{ $boards[4] }}" >
    </div>
    <div class="three wide field">
        <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year" placeholder="Passed Year" value="{{ $passed_year[4] }}" >
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
<div class="voucher" style="display: flex;justify-content: center;text-align: center">
    <div>
        <h4>Deposit Receipt / Voucher</h4>
        <img src="{{ asset('storage/uploads/voucher/'.$data->voucher) }}" alt="No Voucher" style="height: 40vh"><br><br>
        <h5><a href="/storage/uploads/voucher/{{ $data->voucher }}" download="{{ $data->voucher }}">Click to download deposit slip</a></h5>
    </div>
</div>

<div class="form-group">
    <button class="btn btn-success" type="submit">
        {{-- {{ trans('global.save') }} --}} Approve
    </button>
    <a href="{{route('admin.forms.index')}}" class="btn btn-danger">{{ trans('global.cancel') }}</a>
</div>
</form>
</div>
</div>
<template class="subject-row-template">
    <div class="three fields subject-row">
        <div class="field col-md-6">
            <select name="subjects[]" class="subjects">
                [[[options]]]
            </select>
        </div>
        <div class="three field">
            <input class=" {{ $errors->has('subject_codes') ? 'is-invalid' : '' }}  subject-code" readonly type="text" name="subject_codes[]" placeholder="Subject Code" required>
        </div>
        <div class="three field">
            <button class="btn btn-primary add-btn" type="button"><span style="color:white;" class="fas fa-plus"></span></button>
            <button class="btn btn-danger remove-btn" type="button"><span style="color:white;" class="fas fa-trash"></span></button>
        </div>
    </div>
</template>
@endsection

@section('scripts')
{{-- <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> --}}
<script src="{{ asset('js/form/semantic.min.js')}}"></script>
<script src="{{ asset('/backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('/backend/plugins/nepali-date-picker/nepaliDatePicker.min.js')}}"></script>
<script>
    $(document).ready(function() {
        var semester = $('#semester').val();
        var program = $('#programs').val();
        var $subject_list = [];
        $.ajax({
            cache: false
            , url: "{{ route('admin.subs.getspecificsubs') }}"
            , type: 'get'
            , async: false
            , data: {
                semester: semester
                , programId: program
            , }
            , dataType: 'json'
            , beforeSend: function(request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            }
            , success: function(data) {
                $subject_list = data;
            }
        });
        addSubject();
        function addSubject(){
            var len = $subject_list.length;
            $options = '';
            $options += "<option value=''>Select a subject...</option>";
            for (var i = 0; i < len; i++) {
                var name = $subject_list[i]['title'];
                var id = $subject_list[i]['id'];
                $options += "<option value='" + id + "'>" + name + "</option>";
            }
            $('.subjects').html($options);


            $.each($('.subjects'),function(){
                $(this).val($(this).attr('data-id')).trigger('selected');
            });
        }

        $('select').select2({
            theme: 'bootstrap4'
        });
        $('.date-picker').nepaliDatePicker({
            dateFormat: "%y-%m-%d"
            , closeOnDateSelect: true
        , });

        $(document).on('click', '.add-btn', function() {
            $template = $('.subject-row-template').html();
            console.log($subject_list);
            var len = $subject_list.length;
            $options = '';
            $options += "<option value=''>Select a subject...</option>";
            for (var i = 0; i < len; i++) {
                var name = $subject_list[i]['title'];
                var id = $subject_list[i]['id'];
                $options += "<option value='" + id + "'>" + name + "</option>";
            }
            $template = $template.replace('[[[options]]]', $options);
            $('.subject-info').append($template);
            $('select').select2({
                theme: 'bootstrap4'
            });
        });

        $(document).on('click', '.remove-btn', function() {
            $(this).parents('.subject-row').remove();
        });

        // if faculty is already selected
        var selected_id = $("#faculties").val();
        if (selected_id !== ' ') {
            $.ajax({
                cache: false
                , url: "{{ route('admin.levels.getspecificlevels') }}"
                , type: 'get'
                , data: {
                    facultyId: selected_id
                }
                , dataType: 'json'
                , beforeSend: function(request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                }
                , success: function(data) {
                    console.log(data)
                    var len = data.length;
                    // $("#levels").empty();
                    // $levels = $("#levels").append("<option value=''>Select a level...</option>");
                    for (var i = 0; i < len; i++) {
                        var id = data[i]['id'];
                        var name = data[i]['name'];
                        $("#levels").append("<option value='" + id + "'>" + name + "</option>");
                    }
                }
            });
        }

        // if changes is made on faculty selection
        $("#faculties").change(function() {
            //
            var selected_id = $(this).val();
            $.ajax({
                cache: false
                , url: "{{ route('admin.levels.getspecificlevels') }}"
                , type: 'get'
                , data: {
                    facultyId: selected_id
                }
                , dataType: 'json'
                , beforeSend: function(request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                }
                , success: function(data) {
                    console.log(data)
                    var len = data.length;
                    $("#levels").empty();
                    $levels = $("#levels").append("<option value=''>Select a level...</option>");
                    for (var i = 0; i < len; i++) {
                        var id = data[i]['id'];
                        var name = data[i]['name'];
                        $levels.append("<option value='" + id + "'>" + name + "</option>");
                    }
                }
            });
        });

        // if level is already selected

        var selected_id = $('#levels').val();
        var faculty_id = $('#faculties').val();
        if (selected_id !== ' ') {
            $.ajax({
                cache: false
                , url: "{{ route('admin.courses.getspecificcourses') }}"
                , type: 'get'
                , data: {
                    levelId: selected_id
                    , facultyId: faculty_id
                , }
                , dataType: 'json'
                , beforeSend: function(request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                }
                , success: function(data) {
                    // console.log(data)
                    var len = data.length;
                    for (var i = 0; i < len; i++) {
                        var id = data[i]['id'];
                        var name = data[i]['name'];
                        $("#programs").append("<option value='" + id + "'>" + name + "</option>");
                    }
                }
            });
        }

        // if changes is made on level selection
        $("#levels").change(function() {
            var selected_id = $(this).val();
            var faculty_id = $('#faculties').val();
            //
            $.ajax({
                cache: false
                , url: "{{ route('admin.courses.getspecificcourses') }}"
                , type: 'get'
                , data: {
                    levelId: selected_id
                    , facultyId: faculty_id
                , }
                , dataType: 'json'
                , beforeSend: function(request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                }
                , success: function(data) {
                    // console.log(data)
                    var len = data.length;
                    $("#programs").empty();
                    $programs = $("#programs").append("<option value=''>Select a program...</option>");
                    for (var i = 0; i < len; i++) {
                        var id = data[i]['id'];
                        var name = data[i]['name'];
                        $programs.append("<option value='" + id + "'>" + name + "</option>");
                    }
                }
            });
        });

        // if changes is made on programs selection
        $("#programs").change(function() {
            $("#semester").empty();
            $("#semester").append(`<option value=""> Select a semester...</option>
                    <option value="First">1st Semester</option>
                    <option value="Second">2nd Semester</option>
                    <option value="Third">3rd Semester</option>
                    <option value="Fourth">4th Semester</option>
                    <option value="Fifth">5th Semester</option>
                    <option value="Sixth">6th Semester</option>
                    <option value="Seventh">7th Semester</option>
                    <option value="Eighth">8th Semester</option>
                    <option value="Ninth">9th Semester</option>
                    <option value="Tenth">10th Semester</option>
                    `);
        });

        // if changes is made on semester selection
        $("#semester").change(function() {
            var selected_id = $(this).val();
            var program_id = $('#programs').val();
            //
            $.ajax({
                cache: false
                , url: "{{ route('admin.subs.getspecificsubs') }}"
                , type: 'get'
                , async: false
                , data: {
                    semester: selected_id
                    , programId: program_id
                , }
                , dataType: 'json'
                , beforeSend: function(request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                }
                , success: function(data) {
                    $subject_list = data;
                    var len = data.length;
                    $(".subjects").empty();
                    $subjects = $(".subjects").append("<option value=''>Select a subject...</option>");
                    for (var i = 0; i < len; i++) {
                        var name = data[i]['title'];
                        var id = data[i]['id'];
                        $subjects.append("<option value='" + id + "'>" + name + "</option>");
                    }
                }
            });
        });
        $(document).on('change', '.subjects', function() {
            $subject = $(this).val();
            $this = $(this);
            console.log($subject);

            $.ajax({
                cache: false
                , url: "{{ route('admin.subs.getspecificsub') }}"
                , type: 'get'
                , data: {
                    id: $subject
                , }
                , dataType: 'json'
                , beforeSend: function(request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                }
                , success: function(data) {
                    console.log(data);
                    $this.parents('.subject-row').find($('.subject-code')).val(data.subject_code);
                }
            });
            //     });
        });

    });

</script>
@endsection
