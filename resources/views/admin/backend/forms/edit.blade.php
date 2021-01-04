@extends('admin.backend.layouts.master')
@section('title','Edit')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/form/semantic.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/form/style.css')}}">
<link rel="stylesheet" href="{{ asset('/backend/plugins/select2/css/select2.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('/backend/bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('/backend/plugins/nepali-date-picker/nepaliDatePicker.min.css')}}">
<link rel="stylesheet" href="{{ asset('/backend/plugins/datepicker/css/bootstrap-datepicker3.min.css')}}">
<link rel="stylesheet" href="{{ asset('/backend/plugins/datepicker/css/bootstrap-datepicker3.min.css')}}">

@endsection

@section('content')

<div class="card">
    <div class="card-header">
        {{-- {{ trans('global.edit') }} --}} Approve Applicant
    </div>

    <div class="card-body">
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
    <form class="ui form" method="POST" action="{{ route('admin.forms.update', [$data->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <h4 class="ui dividing header"></h4>
            <div class="row">
                <div class="col-md-2">
                    <label class="">Entrance Exam Roll No :-</label>
                </div>
               <div class="col-md-10 roll-no">
                    <input class=" {{ $errors->has('symbol_no') ? 'is-invalid' : '' }}" type="text" name="symbol_no" placeholder="Exam Roll No" value="{{$data->symbol_no}}" disabled>
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
                        name="campus" id="campus" required>
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
                        <label class="col-md-4 caste">Caste</label>
                        <input type="text" class="form-control col-md-8" name="caste" value="{{$data->caste}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4  religion" >Religion</label>
                        <input type="text" class="form-control col-md-8" name="religion" value="{{$data->religion}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 nationality">Nationality</label>
                        <input type="text" class="form-control col-md-8" name="nationality" value="{{$data->nationality}}" required>
                    </div>
                </div>
            </div>
            {{-- dob --}}
            <div class="row dob">
                <div class="col-md-2 name">
                    <label>Date of Birth:</label>
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
                    <div class="row"><label class="col-md-4 sex">Sex </label><select
                            class="form-control col-md-8" name="sex" id="sex" required>
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
                        <input type="text" class="form-control col-md-8" name="tole" value="{{$data->tole}}" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <label class="col-md-5 ">Ward No. </label>
                        <input type="tel" class="form-control col-md-7" name="ward" value="{{$data->ward}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 ">VDC/Municipality </label>
                        <input type="text" class="form-control col-md-8" name="vdc" value="{{$data->vdc}}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                    <label class="col-md-4 district">District </label>
                        <input type="text" class="form-control col-md-8" name="district" value="{{$data->district}}" required>
                    </div>
                </div>
            </div>
            <div class="row contact-info fields">
                <div class="email col-md-7">
                    <div class="row">
                        <label class="col-md-3 ">Contact Address</label>
                        <input type="email" class="form-control col-md-9" name="contact_address" value="{{$data->contact_address}}" required>
                    </div>
                </div>
                <div class="telephone col-md-5">
                    <div class="row">
                        <label class="col-md-4 mobile">Mobile No. </label>
                        <input type="tel" class="form-control col-md-8" name="contact" value="{{$data->contact}}" required>
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
        <!-- <div class="fields"> -->
            @if($data->see_certificate)<h6><a href="/storage/uploads/see_certificate/{{ $data->see_certificate }}" download="{{ $data->see_certificate }}">Click here to download SEE character certificate</a></h6>@endif
            @if($data->see_marksheet)<h6><a href="/storage/uploads/see_marksheet/{{ $data->see_marksheet }}" download="{{ $data->see_marksheet }}">Click here to download SEE marksheet</a></h6>@endif
            @if($data->see_provisional)<h6><a href="/storage/uploads/see_provisional/{{ $data->see_provisional }}" download="{{ $data->see_provisional }}">Click here to download SEE prvisional certificate</a></h6>@endif
        <!-- </div> -->

        <label class="required">Intermediate/+2</label>
        <div class="fields">
            <div class="seven wide field">
                <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board[]" placeholder="Board or University" value="{{ $boards[1] }}" required>
            </div>
            <div class="three wide field">
                <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year[]" placeholder="Passed Year" value="{{ $passed_year[1] }}" required>
            </div>
            <div class="six wide field">
                <div class="two fields">
                    <div class="field">
                        <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Percent / GPA" value="{{ $roll_no[1] }}" required>
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division/CGPA" value="{{ $divison[1] }}" required>
                    </div>
                </div>
            </div>
        </div>
            @if($data->intermediate_certificate)<h6><a href="/storage/uploads/intermediate_certificate/{{ $data->intermediate_certificate }}" download="{{ $data->intermediate_certificate }}">Click here to download intermediate character certificate</a></h6>@endif
            @if($data->intermediate_marksheet)<h6><a href="/storage/uploads/intermediate_marksheet/{{ $data->intermediate_marksheet }}" download="{{ $data->intermediate_marksheet }}">Click here to download intermediate marksheet</a></h6>@endif
            @if($data->intermediate_provisional)<h6><a href="/storage/uploads/intermediate_provisional/{{ $data->intermediate_provisional }}" download="{{ $data->intermediate_provisional }}">Click here to download intermediate prvisional certificate</a></h6>@endif

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
            @if($data->bachelor_certificate)<h6><a href="/storage/uploads/bachelor_certificate/{{ $data->bachelor_certificate }}" download="{{ $data->bachelor_certificate }}">Click here to download bachelor character certificate</a></h6>@endif
            @if($data->bachelor_marksheet)<h6><a href="/storage/uploads/bachelor_marksheet/{{ $data->bachelor_marksheet }}" download="{{ $data->bachelor_marksheet }}">Click here to download bachelor marksheet</a></h6>@endif
            @if($data->bachelor_provisional)<h6><a href="/storage/uploads/bachelor_provisional/{{ $data->bachelor_provisional }}" download="{{ $data->bachelor_provisional }}">Click here to download bachelor prvisional certificate</a></h6>@endif


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
            @if($data->masters_certificate)<h6><a href="/storage/uploads/masters_certificate/{{ $data->masters_certificate }}" download="{{ $data->masters_certificate }}">Click here to download masters character certificate</a></h6>@endif
            @if($data->masters_marksheet)<h6><a href="/storage/uploads/masters_marksheet/{{ $data->masters_marksheet }}" download="{{ $data->masters_marksheet }}">Click here to download masters marksheet</a></h6>@endif
            @if($data->masters_provisional)<h6><a href="/storage/uploads/masters_provisional/{{ $data->masters_provisional }}" download="{{ $data->masters_provisional }}">Click here to download masters prvisional certificate</a></h6>@endif


        <label class="">Other Documents</label>
        
            @if($data->citizenship)<h6><a href="/storage/uploads/citizenship/{{ $data->citizenship }}" download="{{ $data->citizenship }}">Click here to download citizenship</a></h6>@endif
            @if($data->community_certificate)<h6><a href="/storage/uploads/community_certificate/{{ $data->community_certificate }}" download="{{ $data->community_certificate }}">Click here to download community certificate</a></h6>@endif
            @if($data->sponsor_letter)<h6><a href="/storage/uploads/sponsor_letter/{{ $data->sponsor_letter }}" download="{{ $data->sponsor_letter }}">Click here to download sponsor letter</a></h6>@endif


        {{-- guardian's details --}}
        <h4 class="ui dividing header">Parent's/Guardian's Details</h4>
        <div class="parents-details field">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 ">Father's Name</label>
                        <input type="text" class="form-control col-md-8" name="father_name" value="{{$data->father_name}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 det">Qualifications</label>
                        <input type="text" class="form-control col-md-8 "placeholder="Qualifications" name="father_qualification" value="{{$data->father_qualification}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-3 det">Occupation</label>
                        <input type="tel" class="form-control col-md-9" placeholder="Occupation" name="father_occupation" value="{{$data->father_occupation}}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="parents-details field">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 ">Mother's Name</label>
                        <input type="text" class="form-control col-md-8" name="mother_name" value="{{$data->mother_name}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 det">Qualifications</label>
                        <input type="text" class="form-control col-md-8" placeholder="Qualifications" name="mother_qualification" value="{{$data->mother_qualification}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-3 det">Occupation</label>
                        <input type="tel" class="form-control col-md-9"placeholder="Occupation" name="mother_occupation" value="{{$data->mother_occupation}}" required>
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
                        <input type="text" class="form-control col-md-8" name="spouse_name" value="{{$data->spouse_name}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 det">Qualifications</label>
                        <input type="text" class="form-control col-md-8" placeholder="Qualifications" name="spouse_qualification" value="{{$data->spouse_qualification}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-3 det">Occupation</label>
                        <input type="tel" class="form-control col-md-9" placeholder="Occupation" name="spouse_occupation" value="{{$data->spouse_occupation}}" required>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="ui dividing header">Other Details</h4>
           <!-- bank voucher -->
           @if($data->image)<h6><a href="/storage/uploads/image/{{ $data->image }}" download="{{ $data->image }}">Click here to download Applicant's Photo</a></h6>@endif
            @if($data->signature)<h6><a href="/storage/uploads/signature/{{ $data->signature }}" download="{{ $data->signature }}">Click here to download Applicant's Signature</a></h6>@endif
            @if($data->voucher)<h6><a href="/storage/uploads/voucher/{{ $data->voucher }}" download="{{ $data->voucher }}">Click here to download voucher</a></h6>@endif


        
 

   <div class="field">
        <button type="submit" class="btn btn-success"> Approved </button>
    </div>
    </form>
    </div>
</div>

@endsection

@section('scripts')
{{-- <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> --}}
<script src="{{ asset('js/form/semantic.min.js')}}"></script>
<script src="{{ asset('/backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('/backend/plugins/nepali-date-picker/nepaliDatePicker.min.js')}}"></script>
<script src="{{ asset('/backend/plugins/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('/backend/plugins/datepicker/js/bootstrap-datepicker.min.js')}}"></script>

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
        $('.datepicker').datepicker( {
            format: 'dd/mm/yyyy',
        });

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
