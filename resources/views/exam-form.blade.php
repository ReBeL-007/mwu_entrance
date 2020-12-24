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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200&display=swap" rel="stylesheet">

    <title>Entrance Exam Registration</title>

    <style>

    </style>
</head>
<body>
    <div class="container exam-card">
        @include('admin.backend.includes.messages')
        <div class="ui three item menu">
            <div class="logo"><img src="{{ asset('mwu-logo.png') }}" alt="logo"></div>
            <div class="title">
                <h1><b> Mid-Western University </b></h1>
                <h1><b> Faculty of Science and Technology</b></h1>
                <h1><b> Central Campus Science and Technology</b></h1>
                <p><strong>Surkhet, Nepal</strong></p>
                <p class="underline"><b> Application Form for Entrance Examination of 2077 </b></p>
            </div>
            <div class="photo">
              <div class="box"></div>
          </div>
        </div>
        <form class="ui form" method="POST" action="{{ route("admin.forms.store") }}" enctype="multipart/form-data">
            @csrf
            <h4 class="ui dividing header"></h4>
           {{-- entrance roll number --}}
           {{-- <div class=" container"> --}}
               <div class="row">
                <div class="col-md-2">
               <label class="required">Entrance Exam Roll No :-</label></div>
               <div class="col-md-10 roll-no">
               <input type="tel"placeholder="Enter Your Roll Number"></div>
            </div>
           {{-- </div> --}}

           {{-- permission  --}}
           <div class="permission field" >
                <div class="row">
                    <div class="col-md-6">
                         <p>I hereby request for the permission to appear in the entrance examination for Faculty of </p>
                    </div> 
                    <div class="col-md-3 facultyy">
                        <span><select name="faculty" id="faculty" required>
                            <option >Faculty</option>
                            <option >...</option>
                            <option >....</option>
                        </select></span>
                    </div> 
                    <div class="col-md-1 text-center level">
                        <p>Level</p>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="" id="" placeholder="Level" >
                       
                    </div>
                 </div>
              Programme.I have included all my credentials and information requiredfor appearing in the examinations.
      
                
           </div>
            <!-- Name Field -->
            <div class="field">
                <label class="required">Name of the Applicant:
                </label>
                <label>(In Block Letters)</label>
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
            {{-- <div class="field devanagari">
                <label class="required">Name of the Applicant:
                </label>
                <label>(In Devanagari)</label>
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
            </div> --}}
            {{-- caste,religion and nationality --}}
            <div class="row fields">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4  caste">Caste</label>
                        <input type="text" class="form-control col-md-8"  required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4  religion" >Religion</label>
                        <input type="text" class="form-control col-md-8"required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 nationality">Nationality</label>
                        <input type="text" class="form-control col-md-8" required>
                    </div>
                </div>
            </div>
            {{-- dob --}}
            <div class="row dob">
                <div class="col-md-2 name">
                    <label>Date of Birth:</label>
                </div>
                <div class="col-md-4">
                    <input type="tel" class="form-control" placeholder="DD/MM/YYYY(BS)" required>
                </div>
                <div class="col-md-4">
                    <input type="tel" class="form-control" placeholder="DD/MM/YYYY(AD)" required>
                </div>
            </div>
            {{-- address --}}
            <h4 class="ui dividing header">Permanent Address</h4>
            <div class="row permanent-address fields">
                <div class="col-md-3">
                    <div class="row">
                        <label class="col-md-4 ">Tole/ Village</label>
                        <input type="text" class="form-control col-md-8"required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <label class="col-md-5 ">Ward No.</label>
                        <input type="tel" class="form-control col-md-7" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 ">VDC/ Municipality</label>
                        <input type="text" class="form-control col-md-8" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row ">
                        <label class="col-md-4 district">District</label>
                        <input type="text" class="form-control col-md-8" required>
                    </div>
                </div>
            </div>
            <div class="row contact-info fields">
                <div class="email col-md-7">
                    <div class="row">
                        <label class="col-md-3 ">
                            <label>Contact Address</label>
                        </label>
                        <input type="email" class="form-control col-md-9" required>
                    </div>
                </div>
                <div class="telephone col-md-5">
                    <div class="row">
                        <label class="col-md-4 mobile">
                            Mobile No.
                        </label>
                        <input type="tel" class="form-control col-md-8" required>
                    </div>
                </div>
                
            </div>
            {{-- examination --}}
        <h4 class="ui dividing header">Previous Academic Records</h4>
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

        {{-- guardian's details --}}
        <h4 class="ui dividing header">Parent's/Guardian's Details</h4>
        <div class="parents-details field">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 ">Father's Name</label>
                        <input type="text" class="form-control col-md-8" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 det">Qualifications</label>
                        <input type="text" class="form-control col-md-8 "placeholder="Qualifications"  required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-3 det">Occupation</label>
                        <input type="tel" class="form-control col-md-9" placeholder="Occupation" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="parents-details field">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 ">Mother's Name</label>
                        <input type="text" class="form-control col-md-8" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 det">Qualifications</label>
                        <input type="text" class="form-control col-md-8" placeholder="Qualifications"  required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-3 det">Occupation</label>
                        <input type="tel" class="form-control col-md-9"placeholder="Occupation" required>
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
                        <input type="text" class="form-control col-md-8" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 det">Qualifications</label>
                        <input type="text" class="form-control col-md-8" placeholder="Qualifications"  required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-3 det">Occupation</label>
                        <input type="tel" class="form-control col-md-9" placeholder="Occupation" required>
                    </div>
                </div>
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

        <!-- Student signature -->
            <div class="field">
                <label class="required">Applicant's signature (scanned image)</label>
                <input class=" {{ $errors->has('signature') ? 'is-invalid' : '' }}" type="file" name="signature" accept="image/*" required>
                @if($errors->has('signature'))
                <span class="text-danger">{{ $errors->first('signature') }}</span>
                @endif
                <span class="text-danger"> Maximum File size: 512KB</span> <br>
                <span class="text-danger"> Acceptable format: jpeg, png</span>
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
            <span><input type="checkbox" name="consent" id="consent" value="1" required> I declare that the particulars given above, to the best of my knowledge, are true. If found incorrect, any action to be taken against me by the University will be acceptable. If I admit, I agree to abide by the University rules and regulations.</span>
        </div>
    @if($errors->has('consent'))
    <span class="text-danger">{{ $errors->first('consent') }}</span>
    @endif

    <div class="date">
        <div class="row">
            <div class="col-md-2">
                <label for="date">Date</label>
            </div>
            <div class="col-md-10 date-input">
               <input type="tel" >
            </div>
        </div>
    </div>

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
