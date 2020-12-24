<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/form/semantic.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/form/style.css')}}">
    <link rel="stylesheet" href="{{ asset('/backend/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/backend/plugins/select2/css/select2.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/backend/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/backend/bower_components/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/backend/plugins/nepali-date-picker/nepaliDatePicker.min.css')}}">

    <title>Exam Registration</title>

    <style>

    </style>
</head>
<body>
    <div class="conatiner exam-card">
        @include('admin.backend.includes.messages')
        <div class="ui three item menu">
            <div class="logo"><img src="{{ asset('mwu-logo.png') }}" alt="logo"></div>
            <div class="title">
                <p><b> Mid-Western University </b></p>
                <h1><b> Examinations Management Office </b></h1>
                <p><strong>Surkhet, Nepal</strong></p>
                <p class="underline"><b> Application Form for Examination of 2077 </b></p>
            </div>
            <div class="photo">
              <div class="box"></div>
          </div>
        </div>
        <form class="ui form" method="POST" action="{{ route("admin.forms.store") }}" enctype="multipart/form-data">
            @csrf
            <h4 class="ui dividing header"></h4>
            <!-- Name Filed -->
            <div class="field">
                <label class="required">Name</label>
                <div class="two fields">
                    <div class="field">
                        <input class=" {{ $errors->has('fname') ? 'is-invalid' : '' }}" type="text" name="fname" placeholder="First Name" required>
                        @if($errors->has('fname'))
                        <span class="text-danger">{{ $errors->first('fname') }}</span>
                        @endif
                    </div>
                    <div class="field">
                        <input class=" " type="text" name="mname" placeholder="Middle Name">
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('lname') ? 'is-invalid' : '' }}" type="text" name="lname" placeholder="Last Name" required>
                        @if($errors->has('lname'))
                        <span class="text-danger">{{ $errors->first('lname') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Name of School and Faculty -->
            <div class="two fields">
                <div class="seven wide field">
                    <label class="required">Name of School/College/Campus</label>
                    {{-- <input class=" {{ $errors->has('campus') ? 'is-invalid' : '' }}" type="text" name="campus" placeholder="School/College" required> --}}
                    <select class="form-control select2" name="campus" id="campus" placeholder="School/College" required>
                        <option value="">Select College</option>
                        <option value="Babai Multiple Campus">Babai Multiple Campus</option>
                        <option value="Bageshwari Multiple Campus">Bageshwari Multiple Campus</option>
                        <option value="Bheri Education Campus">Bheri Education Campus</option>
                        <option value="Bheri Gyanodaya Multiple Campus">Bheri Gyanodaya Multiple Campus</option>
                        <option value="Bidyapur Janata Multiple Campus">Bidyapur Janata Multiple Campus</option>
                        <option value="Central Campus of Engineering">Central Campus of Engineering</option>
                        <option value="Central Campus of Education">Central Campus of Education</option>
                        <option value="Central Campus of Humanities and Social Sciences">Central Campus of Humanities and Social Sciences</option>
                        <option value="Central Campus of Management">Central Campus of Management</option>
                        <option value="Central campus of Science and Technology">Central campus of Science and Technology</option>
                        <option value="Global College International">Global College International</option>
                        <option value="Jaljala Multiple Campus">Jaljala Multiple Campus</option>
                        <option value="Musikot Khalanga Multiple Campus">Musikot Khalanga Multiple Campus</option>
                        <option value="Narayan Campus">Narayan Campus</option>
                        <option value="Rara Multiple Campus">Rara Multiple Campus</option>
                        <option value="School of Law">School of Law</option>
                        <option value="School of Management">School of Management</option>
                        <option value="Tila Karnali Multiple Campus">Tila Karnali Multiple Campus</option>

                    </select>
                    @if($errors->has('campus'))
                    <span class="text-danger">{{ $errors->first('campus') }}</span>
                    @endif
                </div>
                {{-- <div class="seven wide field">
                    <label class="required">Symbol No.</label>
                    <input class=" {{ $errors->has('symbol_no') ? 'is-invalid' : '' }}" type="text" name="symbol_no" maxlength="4" placeholder="Symbol No." required>
            </div> --}}

            <div class="two field">
                <label class="required">Sex</label>
                <select class="ui fluid search dropdown" name="sex" id="sex" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
    </div>

    <!-- Registration No, Year and Exam Type-->
    <div class="fields">
        <div class="seven wide field">
            <label class="">MU Registration No</label>
            <input class=" {{ $errors->has('regd_no') ? 'is-invalid' : '' }}" type="text" name="regd_no" maxlength="19" placeholder="0000-00-0-0000-0000">
            @if($errors->has('regd_no'))
            <span class="text-danger">{{ $errors->first('regd_no') }}</span>
            @endif
        </div>

        <div class="two field">
            <label class="required">Academic Year (A.D)</label>
            <input class=" {{ $errors->has('year') ? 'is-invalid' : '' }}" type="text" name="year" maxlength="4" placeholder="Year" required>
            @if($errors->has('year'))
            <span class="text-danger">{{ $errors->first('year') }}</span>
            @endif
        </div>

        <div class="six wide field">
            <label class="required">Exam Type</label>
            <select class="ui fluid search dropdown" name="exam_type" id="exam-type" required>
                <option value="Regular">Regular</option>
                <option value="Chance">Chance</option>
                <option value="Partial">Partial</option>
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

                <option value="{{ $id }}" >{{ $faculty }}</option>
                @endforeach
            </select>
            @if($errors->has('faculty'))
            <span class="text-danger">{{ $errors->first('faculty') }}</span>
            @endif
        </div>

        <div class="four wide field">
            <label class="required">Level</label>
            <select class="ui fluid search dropdown" name="level" id="levels" required>
                <option value="">Select a level...</option>

            </select>
        </div>

        <div class="seven wide field">
            <label class="required">Program</label>
            <select class="form-control select2" name="programs" id="programs" required>
                <option value="">Select a program...</option>
                {{-- <option value="B. Ed. in English">B. Ed. in English</option>
                <option value="B. Ed. in HEP">B. Ed. in HEP</option>
                <option value="B. Ed. in Math">B. Ed. in Math</option>
                <option value="B. Ed. in Nepali" }>B. Ed. in Nepali</option>
                <option value="B. Ed. in Science">B. Ed. in Science</option>
                <option value="B. Ed. in Population">B. Ed. in Population</option>
                <option value="B. A. in Social Work">B. A. in Social Work</option>
                <option value="B. A. in Sociology">B. A. in Sociology</option>
                <option value="B. A. in Journalism and Mass Communications">B. A. in Journalism and Mass Communications</option>
                <option value="B. A. in International Relation and Diplomacy">B. A. in International Relation and Diplomacy</option>
                <option value="B. A. in English">B. A. in English</option>
                <option value="B. A. in Nepali">B. A. in Nepali</option>
                <option value="B. A. in Rural Development">B. A. in Rural Development</option>
                <option value="B. A. in Development Economics">B. A. in Development Economics</option>
                <option value="BBS">BBS</option>
                <option value="BBA">BBA</option>
                <option value="BHM">BHM</option>
                <option value="BTTM">BTTM</option>
                <option value="B.Sc. CSIT">B.Sc. CSIT</option>
                <option value="BA LLB">BA LLB</option>
                <option value="B. E. in Civil Engineering">B. E. in Civil Engineering</option>
                <option value="B. E. in Computer Engineering">B. E. in Computer Engineering</option>
                <option value="B. E. in Hydropower Engineering">B. E. in Hydropower Engineering</option>
                <option value="M. Ed. in English">M. Ed. in English</option>
                <option value="M. Ed. in Nepali">M. Ed. in Nepali</option>
                <option value="M. Ed. in HEP">M. Ed. in HEP</option>
                <option value="M. Ed. in EPM">M. Ed. in EPM</option>
                <option value="M. Ed. in CE">M. Ed. in CE</option>
                <option value="M. Ed. in Popuplation">M. Ed. in Popuplation</option>
                <option value="M. Ed. in Math">M. Ed. in Math</option>
                <option value="M. A. in Social Work">M. A. in Social Work</option>
                <option value="M. A. in Sociology">M. A. in Sociology</option>
                <option value="M. A. in Journalism and Mass Communications">M. A. in Journalism and Mass Communications</option>
                <option value="M. A. in Anthropology">M. A. in Anthropology</option>
                <option value="M. A. in International Relation and Diplomacy">M. A. in International Relation and Diplomacy</option>
                <option value="M. A. in English">M. A. in English</option>
                <option value="M. A. in Nepali">M. A. in Nepali</option>
                <option value="M. A. in Rural Development">M. A. in Rural Development</option>
                <option value="M. A. in Development Economics">M. A. in Development Economics</option>
                <option value="M. A. in Folklore Studies">M. A. in Folklore Studies</option>
                <option value="M. A. in Conflict and Peace Studies">M. A. in Conflict and Peace Studies</option>
                <option value="MBS">MBS</option>
                <option value="MBA">MBA</option>
                <option value="M.Sc. in Physics">M.Sc. in Physics</option>
                <option value="M. Sc. in Structural Engineering">M. Sc. in Structural Engineering</option>
                <option value="M. Sc. in Construction Management">M. Sc. in Construction Management</option> --}}

            </select>
        </div>

        <div class="six wide field">
            <label class="required">Semester</label>
            <select class="ui fluid search dropdown" name="semester" id="semester" required>
                <option value="">Select a semester...</option>
                {{-- <option value="First">1st Semester</option>
                <option value="Second">2nd Semester</option>
                <option value="Third">3rd Semester</option>
                <option value="Fourth">4th Semester</option>
                <option value="Fifth">5th Semester</option>
                <option value="Sixth">6th Semester</option>
                <option value="Seventh">7th Semester</option>
                <option value="Eighth">8th Semester</option>
                <option value="Ninth">9th Semester</option>
                <option value="Tenth">10th Semester</option> --}}
            </select>
        </div>
    </div>

    <!-- Student Photo -->
    <div class="field">
        <label class="required">PassPort Size Photo of Student</label>
        <input class=" {{ $errors->has('image') ? 'is-invalid' : '' }}" type="file" name="image" accept="image/*" maxlength="" required>
        @if($errors->has('image'))
        <span class="text-danger">{{ $errors->first('image') }}</span>
        @endif
        <span class="text-danger"> Maximum File size: 512KB</span> <br>
        <span class="text-danger"> Acceptable format: jpeg, png</span>
    </div>

    <!-- Student Photo -->
    <div class="field">
        <label class="required">Applicant's signature (scanned image)</label>
        <input class=" {{ $errors->has('signature') ? 'is-invalid' : '' }}" type="file" name="signature" accept="image/*" required>
        @if($errors->has('signature'))
        <span class="text-danger">{{ $errors->first('signature') }}</span>
        @endif
        <span class="text-danger"> Maximum File size: 512KB</span> <br>
        <span class="text-danger"> Acceptable format: jpeg, png</span>
    </div>

    <!-- Subject Code and name -->
    <div class="subject-info">
        <h4 class="ui dividing header ">Subject Information</h4>
        <div class="three fields subject-row">
            <div class="field">
                <label class="required">Subject Name</label>
                @if($errors->has('subjects'))
                <span class="text-danger">{{ $errors->first('subjects') }}</span>
                @endif
                <select name="subjects[]" class="subjects" required>
                    <option value=''>Select a subject...</option>
                </select>
            </div>
            <div class="three field">
                <label class="required">Subject Code</label>
                @if($errors->has('subject_codes'))
                <span class="text-danger">{{ $errors->first('subject_codes') }}</span>
                @endif
                <input class=" {{ $errors->has('subject_codes') ? 'is-invalid' : '' }} subject-code" readonly type="text" name="subject_codes[]" placeholder="Subject Code" required>
            </div>
            <div class="three field">
                <label for="btn">Action</label>
                <button class="btn btn-primary add-btn" type="button"><span style="color:white;" class="fas fa-plus"></span></button>
            </div>
        </div>
    </div>

    <h4 class="ui dividing header">Student's Other Information</h4>


    <div class="two fields">
        <div class="field">
            <label class="required">Nationality</label>
            <input class=" {{ $errors->has('nationality') ? 'is-invalid' : '' }}" type="text" name="nationality" placeholder="Nationality" required>
            @if($errors->has('nationality'))
            <span class="text-danger">{{ $errors->first('nationality') }}</span>
            @endif
        </div>
        <div class="field">
            <label class="required">Date of Birth (According to SLC/SEE):</label>
            <input class=" {{ $errors->has('dateOfBirth') ? 'is-invalid' : '' }} date-picker" type="text" name="dateOfBirth" placeholder="Date of Birth" required>
            @if($errors->has('dateOfBirth'))
            <span class="text-danger">{{ $errors->first('dateOfBirth') }}</span>
            @endif
        </div>
        <div class="two field">
            <label class="required">District</label>
            <input class=" {{ $errors->has('district') ? 'is-invalid' : '' }}" type="text" name="district" placeholder="District" required>
            @if($errors->has('district'))
            <span class="text-danger">{{ $errors->first('district') }}</span>
            @endif
        </div>
    </div>

    <!-- Father and Mother Name -->
    <div class="two fields">
        <div class="field">
            <label class="required">Mother's Name</label>
            <input class=" {{ $errors->has('mother_name') ? 'is-invalid' : '' }}" type="text" name="mother_name" placeholder="Mother's Name" required>
            @if($errors->has('mother_name'))
            <span class="text-danger">{{ $errors->first('mother_name') }}</span>
            @endif
        </div>
        <div class="two field">
            <label class="required">Father's Name</label>
            <input class=" {{ $errors->has('father_name') ? 'is-invalid' : '' }}" type="text" name="father_name" placeholder="Father's Name" required>
            @if($errors->has('father_name'))
            <span class="text-danger">{{ $errors->first('father_name') }}</span>
            @endif
        </div>
    </div>

    <div class="two fields">
        <div class="field">
            <label class="">Ward No.</label>
            <input class=" {{ $errors->has('ward') ? 'is-invalid' : '' }}" type="text" name="ward" placeholder="Ward No.">
        </div>
        <div class="field">
            <label class="required">Contact Number</label>
            <input class=" {{ $errors->has('contact') ? 'is-invalid' : '' }}" type="text" name="contact" placeholder="Contact Number" required>
            @if($errors->has('contact'))
            <span class="text-danger">{{ $errors->first('contact') }}</span>
            @endif
        </div>
        <div class="two field">
            <label class="required">E-Mail</label>
            <input class=" {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" placeholder="E-Mail" required>
        </div>
    </div>


    <h4 class="ui dividing header">Examination History</h4>
    <label class="required">SLC/SEE</label>
    <div class="fields">
        <div class="seven wide field">
            <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board[]" placeholder="Board or University" required>
            @if($errors->has('board'))
            <span class="text-danger">{{ $errors->first('board') }}</span>
            @endif
        </div>
        <div class="three wide field">
            <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year[]" placeholder="Passed Year" required>
            @if($errors->has('passed_year'))
            <span class="text-danger">{{ $errors->first('passed_year') }}</span>
            @endif
        </div>
        <div class="six wide field">
            <div class="two fields">
                <div class="field">
                    <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Roll No./ Symbol No." required>
                    @if($errors->has('roll_no'))
                    <span class="text-danger">{{ $errors->first('roll_no') }}</span>
                    @endif
                </div>
                <div class="field">
                    <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division" required>
                    @if($errors->has('division'))
                    <span class="text-danger">{{ $errors->first('division') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <label class="required">Intermediate/+2</label>
    <div class="fields">
        <div class="seven wide field">
            <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board[]" placeholder="Board or University" required>
        </div>
        <div class="three wide field">
            <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year[]" placeholder="Passed Year" required>
        </div>
        <div class="six wide field">
            <div class="two fields">
                <div class="field">
                    <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Roll No./ Symbol No." required>
                </div>
                <div class="field">
                    <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division" required>
                </div>
            </div>
        </div>
    </div>

    <label class="">Bachelor</label>
    <div class="fields">
        <div class="seven wide field">
            <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board[]" placeholder="Board or University">
        </div>
        <div class="three wide field">
            <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year[]" placeholder="Passed Year">
        </div>
        <div class="six wide field">
            <div class="two fields">
                <div class="field">
                    <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Roll No./ Symbol No.">
                </div>
                <div class="field">
                    <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division">
                </div>
            </div>
        </div>
    </div>

    <label class="">Master</label>
    <div class="fields">
        <div class="seven wide field">
            <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board[]" placeholder="Board or University">
        </div>
        <div class="three wide field">
            <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year[]" placeholder="Passed Year">
        </div>
        <div class="six wide field">
            <div class="two fields">
                <div class="field">
                    <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Roll No./ Symbol No.">
                </div>
                <div class="field">
                    <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division">
                </div>
            </div>
        </div>
    </div>

    <label class="">Others</label>
    <div class="fields">
        <div class="seven wide field">
            <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board[]" placeholder="Board or University">
        </div>
        <div class="three wide field">
            <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year[]" placeholder="Passed Year">
        </div>
        <div class="six wide field">
            <div class="two fields">
                <div class="field">
                    <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Roll No./ Symbol No.">
                </div>
                <div class="field">
                    <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division">
                </div>
            </div>
        </div>
    </div>

    <h4 class="ui dividing header">Payment Details</h4>
    <!-- bank voucher -->
    <div class="field">
        <label class="required">Deposit Receipt / Voucher (scanned image)</label>
        <input class=" {{ $errors->has('voucher') ? 'is-invalid' : '' }}" type="file" name="voucher" accept="image/*" required>
        @if($errors->has('voucher'))
        <span class="text-danger">{{ $errors->first('voucher') }}</span>
        @endif
        <span class="text-danger"> Maximum File size: 512KB</span> <br>
        <span class="text-danger"> Acceptable format: jpeg, png</span>
    </div>

    <div class="field">
        <span><input type="checkbox" name="consent" id="consent" value="1" required> I hereby declare that the information given by me in this examination application form is correct to the best of my knowledge and belief. I understand that in case anything is found contradictory or false, my application form shall be cancelled. I shall abide by all terms and conditions of the Examinations Management Office (EMO) with regards to examination. </span>
    </div>
    @if($errors->has('consent'))
    <span class="text-danger">{{ $errors->first('consent') }}</span>
    @endif

    <div class="field">
        <button type="submit">
            <div class="ui button" tabindex="0"> Register </div>
        </button>
    </div>
    </form>

    </div>

    {{-- <div id="emailSentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
    
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
              <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
    
        </div>
    </div> --}}

    <template class="subject-row-template">
        <div class="three fields subject-row">
            <div class="field col-md-6">
                <select name="subjects[]" class="subjects">
                   [[[options]]]
                </select>
            </div>
            <div class="three field">
                <input class=" {{ $errors->has('subject_codes') ? 'is-invalid' : '' }} subject-code" readonly type="text" name="subject_codes[]" placeholder="Subject Code" required>
            </div>
            <div class="three field">
                <button class="btn btn-primary add-btn" type="button"><span style="color:white;" class="fas fa-plus"></span></button>
                <button class="btn btn-danger remove-btn" type="button"><span style="color:white;" class="fas fa-trash"></span></button>
            </div>
        </div>
    </template>

    {{-- <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('/backend/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('js/form/semantic.min.js')}}"></script>
    <script src="{{ asset('/backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('/backend/plugins/nepali-date-picker/nepaliDatePicker.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            var $subject_list = [];

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
                    $options+="<option value='" + id + "'>" + name + "</option>";
                }
                $template =$template.replace('[[[options]]]',$options);
                $('.subject-info').append($template);
                $('select').select2({
                    theme: 'bootstrap4'
                });
            });

            $(document).on('click', '.remove-btn', function() {
                $(this).parents('.subject-row').remove();
            });


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
                        // console.log(data)
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
                        // console.log(data);
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
                    // , async: false
                    , data: {
                        semester: selected_id
                        , programId: program_id
                    , }
                    , dataType: 'json'
                    , beforeSend: function(request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    }
                    , success: function(data) {
                        // console.log(data)
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
                        $this.parents('.subject-row').find($('.subject-code')).val(data.subject_code);
                    }
                });
                //     });
            });


        });

        // @if(session()->has('modal'))
        //      $("#emailSentModal").modal("toggle");

        // @endif

        @if(session()->has('modal')) alert('Form successfully submitted for verification!. Thank you...') @endif
    </script>
</body>
</html>
