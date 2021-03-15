{{-- @extends('admin.backend.layouts.master') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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


    {{-- @section('title','Edit') --}}

    {{-- @section('styles') --}}
    <link rel="stylesheet" href="{{ asset('css/form/semantic.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/form/style.css')}}">
    {{-- @endsection --}}

    {{-- @section('content') --}}
@foreach($exams as $key => $exam)

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
            <form class="ui form" method="POST" action="{{ route('admin.forms.update', [$exam->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <!-- Name Filed -->
                <div class="field">
                    <label class="required">Name</label>
                    <div class="two fields">
                        <div class="field">
                            <input class=" {{ $errors->has('fname') ? 'is-invalid' : '' }}" type="text" name="fname" placeholder="First Name" value="{{$exam->fname}}">
                            @if($errors->has('lname'))
                            <span class="text-danger">{{ $errors->first('lname') }}</span>
                            @endif
                            @if($errors->has('fname'))
                            <span class="text-danger">{{ $errors->first('fname') }}</span>
                            @endif
                        </div>
                        <div class="field">
                            <input class=" " type="text" name="mname" placeholder="Middle Name" value="{{$exam->mname}}">
                        </div>
                        <div class="field">
                            <input class=" {{ $errors->has('lname') ? 'is-invalid' : '' }}" type="text" name="lname" placeholder="Last Name" value="{{$exam->lname}}" required>
                            @if($errors->has('lname'))
                            <span class="text-danger">{{ $errors->first('lname') }}</span>
                            @endif
                            @if($errors->has('lname'))
                            <span class="text-danger">{{ $errors->first('lname') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Registration No, Year and Exam Type-->
                <div class="fields">
                    <div class="seven wide field">
                        <label class="">MU Registration No</label>
                        <input class=" {{ $errors->has('regd_no') ? 'is-invalid' : '' }}" type="text" name="regd_no" maxlength="15" placeholder="Registration No" value="{{$exam->regd_no}}" required>
                        @if($errors->has('regd_no'))
                        <span class="text-danger">{{ $errors->first('regd_no') }}</span>
                        @endif
                    </div>

                    <div class="two field">
                        <label class="required">Academic Year</label>
                        <input class=" {{ $errors->has('year') ? 'is-invalid' : '' }}" type="text" name="year" maxlength="4" placeholder="Year" value="{{$exam->year}}" required>
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
                            <option value="Regular" {{ ('Regular' === $exam->exam_type) ? 'selected' : '' }}>Regular</option>
                            <option value="Chance" {{ ('Chance' === $exam->exam_type) ? 'selected' : '' }}>Chance</option>
                            <option value="Partial" {{ ('Partial' === $exam->exam_type) ? 'selected' : '' }}>Partial</option>
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

                            <option value="{{ $id }}" {{ ($id==$exam->faculty) ? 'selected' : '' }}>{{ $faculty }}</option>
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
                            <option value="{{$exam->level}}">{{$exam->levels->name}}</option>
                            {{-- <option value="Master" {{ ('Master' === $exam->level) ? 'selected' : '' }}>Master</option>
                            <option value="M.Phil." {{ ('M.Phil.' === $exam->level) ? 'selected' : '' }}>M.Phil.</option>
                            <option value="PhD" {{ ('PhD' === $exam->level) ? 'selected' : '' }}>PhD</option> --}}
                        </select>
                    </div>

                    <div class="seven wide field">
                        <label class="required">Program</label>
                        <select class="form-control select2" name="programs" id="programs" required>
                            <option value="{{$exam->programs}}">{{$exam->course->name}}</option>
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
                            <option value="First" {{ ('First' === $exam->semester) ? 'selected' : '' }}>1st Semester</option>
                            <option value="Second" {{ ('Second' === $exam->semester) ? 'selected' : '' }}>2nd Semester</option>
                            <option value="Third" {{ ('Third' === $exam->semester) ? 'selected' : '' }}>3rd Semester</option>
                            <option value="Fourth" {{ ('Fourth' === $exam->semester) ? 'selected' : '' }}>4th Semester</option>
                            <option value="Fifth" {{ ('Fifth' === $exam->semester) ? 'selected' : '' }}>5th Semester</option>
                            <option value="Sixth" {{ ('Sixth' === $exam->semester) ? 'selected' : '' }}>6th Semester</option>
                            <option value="Seventh" {{ ('Seventh' === $exam->semester) ? 'selected' : '' }}>7th Semester</option>
                            <option value="Eighth" {{ ('Eighth' === $exam->semester) ? 'selected' : '' }}>8th Semester</option>
                        </select>
                    </div>
                </div>

                <!-- Subject Code and name -->
                <h4 class="ui dividing header">Subject Infromation</h4>
                <div class="two fields">
                    <div class="field">
                        <label class="required">Subject Name</label>
                        @foreach($exam->subjects as $subject)
                        <input class=" {{ $errors->has('subjects') ? 'is-invalid' : '' }}" type="text" name="subjects[]" placeholder="Subject Name" value="{{$subject->title}}">
                        @endforeach
                    </div>
                    <div class="two field">
                        <label class="required">Subject Code</label>
                        @foreach($exam->subjects as $subject)
                        <input class=" {{ $errors->has('subject_codes') ? 'is-invalid' : '' }}" type="text" name="subject_codes[]" placeholder="Subject Code" value="{{$subject->subject_code}}">
                        @endforeach
                    </div>
                </div>

                <h4 class="ui dividing header">Student's Other Infromation</h4>


                <div class="two fields">
                    <div class="field">
                        <label class="required">Nationality</label>
                        <input class=" {{ $errors->has('nationality') ? 'is-invalid' : '' }}" type="text" name="nationality" placeholder="Nationality" value="{{$exam->nationality}}" required>
                        @if($errors->has('nationality'))
                        <span class="text-danger">{{ $errors->first('nationality') }}</span>
                        @endif
                    </div>
                    <div class="field">
                        <label class="required">Date of Birth (According to SLC/SEE):</label>
                        <input class=" {{ $errors->has('dateOfBirth') ? 'is-invalid' : '' }} date-picker" type="text" name="dateOfBirth" placeholder="Date of Birth" value="{{$exam->dateOfBirth}}" required>
                        @if($errors->has('dateOfBirth'))
                        <span class="text-danger">{{ $errors->first('dateOfBirth') }}</span>
                        @endif
                    </div>
                    <div class="field">
                        <label class="required">Sex</label>
                        <select class="ui fluid search dropdown" name="sex" id="sex" required>
                            @if($errors->has('sex'))
                            <span class="text-danger">{{ $errors->first('sex') }}</span>
                            @endif
                            <option value="male" {{ ('male' === $exam->sex) ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ ('female' === $exam->sex) ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ ('other' === $exam->sex) ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="two field">
                        <label class="required">District</label>
                        <input class=" {{ $errors->has('district') ? 'is-invalid' : '' }}" type="text" name="district" placeholder="District" value="{{$exam->district}}" required>
                        @if($errors->has('district'))
                        <span class="text-danger">{{ $errors->first('district') }}</span>
                        @endif
                    </div>
                </div>

                <!-- Father and Mother Name -->
                <div class="two fields">
                    <div class="field">
                        <label class="required">Mother's Name</label>
                        <input class=" {{ $errors->has('mother_name') ? 'is-invalid' : '' }}" type="text" name="mother_name" placeholder="Mother's Name" value="{{$exam->mother_name}}" required>
                        @if($errors->has('mother_name'))
                        <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                        @endif
                    </div>
                    <div class="two field">
                        <label class="required">Father's Name</label>
                        <input class=" {{ $errors->has('father_name') ? 'is-invalid' : '' }}" type="text" name="father_name" placeholder="Father's Name" value="{{$exam->father_name}}" required>
                        @if($errors->has('father_name'))
                        <span class="text-danger">{{ $errors->first('father_name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label class="required">Ward No.</label>
                        <input class=" {{ $errors->has('ward') ? 'is-invalid' : '' }}" type="text" name="ward" placeholder="Ward No." value="{{$exam->ward}}" required>
                        @if($errors->has('ward'))
                        <span class="text-danger">{{ $errors->first('ward') }}</span>
                        @endif
                    </div>
                    <div class="field">
                        <label class="required">Contact Number</label>
                        <input class=" {{ $errors->has('contact') ? 'is-invalid' : '' }}" type="text" name="contact" placeholder="Contact Number" value="{{$exam->contact}}" required>
                        @if($errors->has('contact'))
                        <span class="text-danger">{{ $errors->first('contact') }}</span>
                        @endif
                    </div>
                    <div class="two field">
                        <label class="">E-Mail</label>
                        <input class=" {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" placeholder="E-Mail" value="{{$exam->email}}">
                    </div>
                </div>



                @php
                $boards = json_decode($exam->board);
                $passed_year = json_decode($exam->passed_year);
                $roll_no = json_decode($exam->roll_no);
                $divison = json_decode($exam->division);
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
                    <span><input type="checkbox" name="consent" id="consent" {{$exam->consent==1?'checked':''}}> I hereby declare that the information given by me in this examination application form is correct to the best of my knowledge and belief. I understand that in case anything is found contradictory or false, my application form shall be cancelled. I shall abide by all terms and conditions of the Examinations Management Office (EMO) with regards to examination. </span>
                </div>
                    <img class="signature" src="{{asset('storage/uploads/exams/signature/'.$exam->signature)}}" width="257" height="74" style="float: right">


                {{-- <div class="form-group">
                                <button class="btn btn-success" type="submit">
                                    Approve
                                </button>
                                <a href="{{route('admin.forms.index')}}" class="btn btn-danger">{{ trans('global.cancel') }}</a>
                </div> --}}
            </form>
    </div>
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
