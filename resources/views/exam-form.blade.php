<!-- <!DOCTYPE html>
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
    <link rel="stylesheet" href="{{ asset('/backend/plugins/datepicker/css/bootstrap-datepicker3.min.css')}}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200&display=swap" rel="stylesheet">

    <title>Entrance Exam Registration</title>

    <style>

    </style>
</head>
<body> -->
@extends('layouts.app')
@section('styles')
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
@endsection
@section('content')
    <div class="container exam-card">
        @include('admin.backend.includes.messages')
        <div class="ui three item menu">
            <div class="logo"><img src="{{asset('mwu-logo.png') }}" alt="logo" width="" height=""></div>
            <div class="title">
                <h1><b> Mid-Western University </b></h1>
                <p><strong>Surkhet, Nepal</strong></p>
                <p class="underline"><b> Application Form for Entrance Examination of 2077 </b></p>
            </div>
            <div class="photo">
              <div class="box"></div>
          </div>
        </div>
        <form class="ui form" method="POST" action="{{ route('admin.forms.store') }}" enctype="multipart/form-data">
            @csrf
            <h4 class="ui dividing header"></h4>
            <!-- <div class="row">
                <div class="col-md-2">
                    <label class="">Entrance Exam Roll No :-</label>
                </div>
               <div class="col-md-10 roll-no">
                    <input class=" {{ $errors->has('symbol_no') ? 'is-invalid' : '' }}" type="text" name="symbol_no" placeholder="Exam Roll No" disabled>
                    @if($errors->has('symbol_no'))
                    <span class="text-danger">
                        {{$errors->first('symbol_no')}}
                    </span>
                    @endif
                </div>
            </div> -->

            <div class="row">
                <div class="col-md-3">
                    <label class="required">Name of School/College/Campus</label>
                </div>
                <div class="col-md-4">
                    <select class="form-control {{ $errors->has('campus') ? 'is-invalid' : '' }}"
                        name="campus" id="campus" required>
                        <option value="">Select a campus...
                        </option>
                        @foreach($colleges as $id=>$campus)
                        <option value="{{ $id }}"> {{$campus}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('campus'))
                    <span class="text-danger">{{ $errors->first('campus') }}</span>
                    @endif
                </div>
            </div>
           {{-- permission  --}}
           <div class="permission field" >
                <div class="row engineer">
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
                                <option value="{{ $id }}"> {{$faculty}}</option>
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
                            <option value="">Select a level...</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1 hide-for-engineer">
                        <p>Programme</p>
                    </div>
                    <div class="col-md-3 hide-for-engineer">
                        <select class="form-control select2" name="programs" id="programs" required>
                            <option value="">Select a programme...</option>
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
            {{-- caste,religion and nationality --}}
            <div class="row fields">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 caste required">Caste/Ethnicity</label>
                        <input type="text" class="form-control col-md-8" name="caste" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4   required" >Religion</label>
                        <input type="text" class="form-control col-md-8" name="religion" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4  required">Nationality</label>
                        <input type="text" class="form-control col-md-8" name="nationality" required>
                    </div>
                </div>
            </div>
            {{-- dob --}}
            <div class="row dob">
                <div class="col-md-2 name">
                    <label class="required">Date of Birth:</label>
                </div>
                <div class="col-md-3">
                <input class="form-control {{ $errors->has('dateOfBirth') ? 'is-invalid' : '' }} date-picker" type="text" name="dateOfBirth" placeholder="YYYY-MM-DD (BS)" required>
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
                            <option value="male">Male </option>
                            <option value="female">Female </option>
                            <option value="other">Other </option>
                        </select>
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
            {{-- address --}}
            <h4 class="ui dividing header">Permanent Address</h4>
            <div class="row permanent-address fields">
                <div class="col-md-3">
                    <div class="row">
                        <label class="col-md-4 ">Tole/Village </label>
                        <input type="text" class="form-control col-md-8" name="tole" >
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <label class="col-md-5 ">Ward No. </label>
                        <input type="tel" class="form-control col-md-7" name="ward" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 ">VDC/Municipality </label>
                        <input type="text" class="form-control col-md-8" name="vdc" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                    <label class="col-md-4">District </label>
                    <select name="district" class="form-control col-md-8">
                        <option value="">Select a district</option>
                        <option value="Bhojpur">Bhojpur</option>
                        <option value="Dhankuta">Dhankuta</option>
                        <option value="Ilam">Ilam</option>
                        <option value="Jhapa">Jhapa</option>
                        <option value="Khotang">Khotang</option>
                        <option value="Morang">Morang</option>
                        <option value="Okhaldhunga">Okhaldhunga</option>
                        <option value="Panchthar">Panchthar</option>
                        <option value="Sankhuwasabha">Sankhuwasabha</option>
                        <option value="Solukhumbu">Solukhumbu</option>
                        <option value="Sunsari">Sunsari</option>
                        <option value="Taplejung">Taplejung</option>
                        <option value="Terhathum">Terhathum</option>
                        <option value="Udayapur">Udayapur</option>
                        <option value="Bara">Bara</option>
                        <option value="Parsa">Parsa</option>
                        <option value="Dhanusha">Dhanusha</option>
                        <option value="Mahottari">Mahottari</option>
                        <option value="Rautahat">Rautahat</option>
                        <option value="Saptari">Saptari</option>
                        <option value="Sarlahi">Sarlahi</option>
                        <option value="Siraha">Siraha</option>
                        <option value="Bhaktapur">Bhaktapur</option>
                        <option value="Chitwan">Chitwan</option>
                        <option value="Dhading">Dhading</option>
                        <option value="Dolakha">Dolakha</option>
                        <option value="Kathmandu">Kathmandu</option>
                        <option value="Kavrepalanchok">Kavrepalanchok</option>
                        <option value="Lalitpur">Lalitpur</option>
                        <option value="Makwanpur">Makwanpur</option>
                        <option value="Nuwakot">Nuwakot</option>
                        <option value="Ramechhap">Ramechhap</option>
                        <option value="Rasuwa">Rasuwa</option>
                        <option value="Sindhuli">Sindhuli</option>
                        <option value="Sindhupalchok">Sindhupalchok</option>
                        <option value="Baglung">Baglung</option>
                        <option value="Gorkha">Gorkha</option>
                        <option value="Kaski">Kaski</option>
                        <option value="Lamjung">Lamjung</option>
                        <option value="Manang">Manang</option>
                        <option value="Mustang">Mustang</option>
                        <option value="Myagdi">Myagdi</option>
                        <option value="Nawalpur">Nawalpur</option>
                        <option value="Parbat">Parbat</option>
                        <option value="Syangja">Syangja</option>
                        <option value="Tanahun">Tanahun</option>
                        <option value="Arghakhanchi">Arghakhanchi</option>
                        <option value="Banke">Banke</option>
                        <option value="Bardiya">Bardiya</option>
                        <option value="Dang">Dang</option>
                        <option value="Eastern Rukum">Eastern Rukum</option>
                        <option value="Gulmi">Gulmi</option>
                        <option value="Kapilavastu">Kapilavastu</option>
                        <option value="Parasi">Parasi</option>
                        <option value="Palpa">Palpa</option>
                        <option value="Pyuthan">Pyuthan</option>
                        <option value="Rolpa">Rolpa</option>
                        <option value="Rupandehi">Rupandehi</option>
                        <option value="Dailekh">Dailekh</option>
                        <option value="Dolpa">Dolpa</option>
                        <option value="Humla">Humla</option>
                        <option value="Jajarkot">Jajarkot</option>
                        <option value="Jumla">Jumla</option>
                        <option value="Kalikot">Kalikot</option>
                        <option value="Mugu">Mugu</option>
                        <option value="Salyan">Salyan</option>
                        <option value="Surkhet">Surkhet</option>
                        <option value="Western Rukum">Western Rukum</option>
                        <option value="Achham">Achham</option>
                        <option value="Baitadi">Baitadi</option>
                        <option value="Bajhang">Bajhang</option>
                        <option value="Bajura">Bajura</option>
                        <option value="Dadeldhura">Dadeldhura</option>
                        <option value="Darchula">Darchula</option>
                        <option value="Doti">Doti</option>
                        <option value="Kailali">Kailali</option>
                        <option value="Kanchanpur">Kanchanpur</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="row contact-info fields">
                <div class="email col-md-7">
                    <div class="row">
                        <label class="col-md-3 ">Email Address</label>
                        <input type="email" class="form-control col-md-9" name="contact_address" >
                    </div>
                </div>
                <div class="telephone col-md-5">
                    <div class="row">
                        <label class="col-md-4  ">Mobile No. </label>
                        <input type="tel" class="form-control col-md-8" name="contact" >
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
                        <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Percent / GPA" required>
                        @if($errors->has('roll_no'))
                        <span class="text-danger">{{ $errors->first('roll_no') }}</span>
                        @endif
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division/Grade" required>
                        @if($errors->has('division'))
                        <span class="text-danger">{{ $errors->first('division') }}</span>
                        @endif
                    </div>
                </div>
            </div>            
        </div>
        <div class="fields">
            <div class="six wide field">
                <p class="required" style="font-size:larger">Character Certificate</p>
                <input class=" {{ $errors->has('see_certificate') ? 'is-invalid' : '' }}" type="file" name="see_certificate" accept="image/*" maxlength="" required>
                @if($errors->has('see_certificate'))
                <span class="text-danger">{{ $errors->first('see_certificate') }}</span>
                @endif
                <span class="text-danger"> Maximum File size: 512KB</span> <br>
                <span class="text-danger"> Acceptable format: jpeg, png</span>
            </div>
            <div class="six wide field">
                <p class="required" style="font-size:larger;">Transcript / Marksheet</p>
                <input class=" {{ $errors->has('see_marksheet') ? 'is-invalid' : '' }}" type="file" name="see_marksheet" accept="image/*" maxlength="" required>
                @if($errors->has('see_marksheet'))
                <span class="text-danger">{{ $errors->first('see_marksheet') }}</span>
                @endif
                <span class="text-danger"> Maximum File size: 512KB</span> <br>
                <span class="text-danger"> Acceptable format: jpeg, png</span>
            </div>
            <div class="six wide field">
                <p class="required" style="font-size:larger;">Provisional Certificate</p>
                <input class=" {{ $errors->has('see_provisional') ? 'is-invalid' : '' }}" type="file" name="see_provisional" accept="image/*" maxlength="" required>
                @if($errors->has('see_provisional'))
                <span class="text-danger">{{ $errors->first('see_provisional') }}</span>
                @endif
                <span class="text-danger"> Maximum File size: 512KB</span> <br>
                <span class="text-danger"> Acceptable format: jpeg, png</span>
            </div>
        </div>

        <label class="">Intermediate / +2</label>
        <div class="fields">
            <div class="seven wide field">
                <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board[]" placeholder="Board or University" >
            </div>
            <div class="three wide field">
                <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year[]" placeholder="Passed Year" >
            </div>
            <div class="six wide field">
                <div class="two fields">
                    <div class="field">
                        <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Percent / GPA" >
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division / Grade" >
                    </div>
                </div>
            </div>
        </div>
        <div class="fields">
            <div class="six wide field">
                <p class="" style="font-size:larger">Character Certificate</p>
                <input class=" {{ $errors->has('intermediate_certificate') ? 'is-invalid' : '' }}" type="file" name="intermediate_certificate" accept="image/*" maxlength="" >
                @if($errors->has('intermediate_certificate'))
                <span class="text-danger">{{ $errors->first('intermediate_certificate') }}</span>
                @endif
                <span class="text-danger"> Maximum File size: 512KB</span> <br>
                <span class="text-danger"> Acceptable format: jpeg, png</span>
            </div>
            <div class="six wide field">
                <p class="" style="font-size:larger;">Transcript / Marksheet</p>
                <input class=" {{ $errors->has('intermediate_marksheet') ? 'is-invalid' : '' }}" type="file" name="intermediate_marksheet" accept="image/*" maxlength="" >
                @if($errors->has('intermediate_marksheet'))
                <span class="text-danger">{{ $errors->first('intermediate_marksheet') }}</span>
                @endif
                <span class="text-danger"> Maximum File size: 512KB</span> <br>
                <span class="text-danger"> Acceptable format: jpeg, png</span>
            </div>
            <div class="six wide field">
                <p class="" style="font-size:larger;">Provisional Certificate</p>
                <input class=" {{ $errors->has('intermediate_provisional') ? 'is-invalid' : '' }}" type="file" name="intermediate_provisional" accept="image/*" maxlength="" >
                @if($errors->has('intermediate_provisional'))
                <span class="text-danger">{{ $errors->first('intermediate_provisional') }}</span>
                @endif
                <span class="text-danger"> Maximum File size: 512KB</span> <br>
                <span class="text-danger"> Acceptable format: jpeg, png</span>
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
                        <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Percent / GPA">
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division/Grade">
                    </div>
                </div>
            </div>
        </div>
        <div class="fields">
            <div class="six wide field">
                <p class="" style="font-size:larger">Character Certificate</p>
                <input class=" {{ $errors->has('bachelor_certificate') ? 'is-invalid' : '' }}" type="file" name="bachelor_certificate" accept="image/*" maxlength="" >
                @if($errors->has('bachelor_certificate'))
                <span class="text-danger">{{ $errors->first('bachelor_certificate') }}</span>
                @endif
                <span class="text-danger"> Maximum File size: 512KB</span> <br>
                <span class="text-danger"> Acceptable format: jpeg, png</span>
            </div>
            <div class="six wide field">
                <p class="" style="font-size:larger;">Transcript / Marksheet</p>
                <input class=" {{ $errors->has('bachelor_marksheet') ? 'is-invalid' : '' }}" type="file" name="bachelor_marksheet" accept="image/*" maxlength="" >
                @if($errors->has('bachelor_marksheet'))
                <span class="text-danger">{{ $errors->first('bachelor_marksheet') }}</span>
                @endif
                <span class="text-danger"> Maximum File size: 512KB</span> <br>
                <span class="text-danger"> Acceptable format: jpeg, png</span>
            </div>
            <div class="six wide field">
                <p class="" style="font-size:larger;">Provisional Certificate</p>
                <input class=" {{ $errors->has('bachelor_provisional') ? 'is-invalid' : '' }}" type="file" name="bachelor_provisional" accept="image/*" maxlength="" >
                @if($errors->has('bachelor_provisional'))
                <span class="text-danger">{{ $errors->first('bachelor_provisional') }}</span>
                @endif
                <span class="text-danger"> Maximum File size: 512KB</span> <br>
                <span class="text-danger"> Acceptable format: jpeg, png</span>
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
                        <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Percent / GPA">
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division/Grade">
                    </div>
                </div>
            </div>
        </div>
        <div class="fields">
            <div class="six wide field">
                <p class="" style="font-size:larger">Character Certificate</p>
                <input class=" {{ $errors->has('masters_certificate') ? 'is-invalid' : '' }}" type="file" name="masters_certificate" accept="image/*" maxlength="" >
                @if($errors->has('masters_certificate'))
                <span class="text-danger">{{ $errors->first('masters_certificate') }}</span>
                @endif
                <span class="text-danger"> Maximum File size: 512KB</span> <br>
                <span class="text-danger"> Acceptable format: jpeg, png</span>
            </div>
            <div class="six wide field">
                <p class="" style="font-size:larger;">Transcript / Marksheet</p>
                <input class=" {{ $errors->has('masters_marksheet') ? 'is-invalid' : '' }}" type="file" name="masters_marksheet" accept="image/*" maxlength="" >
                @if($errors->has('masters_marksheet'))
                <span class="text-danger">{{ $errors->first('masters_marksheet') }}</span>
                @endif
                <span class="text-danger"> Maximum File size: 512KB</span> <br>
                <span class="text-danger"> Acceptable format: jpeg, png</span>
            </div>
            <div class="six wide field">
                <p class="" style="font-size:larger;">Provisional Certificate</p>
                <input class=" {{ $errors->has('masters_provisional') ? 'is-invalid' : '' }}" type="file" name="masters_provisional" accept="image/*" maxlength="" >
                @if($errors->has('masters_provisional'))
                <span class="text-danger">{{ $errors->first('masters_provisional') }}</span>
                @endif
                <span class="text-danger"> Maximum File size: 512KB</span> <br>
                <span class="text-danger"> Acceptable format: jpeg, png</span>
            </div>
        </div>

        <label class="">Other Documents</label>
        <!-- <div class="fields">
            <div class="seven wide field">
                <input class=" {{ $errors->has('board') ? 'is-invalid' : '' }}" type="text" name="board[]" placeholder="Board or University">
            </div>
            <div class="three wide field">
                <input class=" {{ $errors->has('passed_year') ? 'is-invalid' : '' }}" type="text" name="passed_year[]" placeholder="Passed Year">
            </div>
            <div class="six wide field">
                <div class="two fields">
                    <div class="field">
                        <input class=" {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no[]" placeholder="Percent / GPA">
                    </div>
                    <div class="field">
                        <input class=" {{ $errors->has('division') ? 'is-invalid' : '' }}" type="text" name="division[]" placeholder="Division/Grade">
                    </div>
                </div>
            </div>
        </div> -->
        <div class="fields">
            <div class="six wide field">
                <p class="required" style="font-size:larger">Citizenship</p>
                <input class=" {{ $errors->has('citizenship') ? 'is-invalid' : '' }}" type="file" name="citizenship" accept="image/*" maxlength="" required>
                @if($errors->has('citizenship'))
                <span class="text-danger">{{ $errors->first('citizenship') }}</span>
                @endif
                <span class="text-danger"> Maximum File size: 512KB</span> <br>
                <span class="text-danger"> Acceptable format: jpeg, png</span>
            </div>
            <div class="six wide field">
                <p class="" style="font-size:larger;">Letter from Community School</p>
                <input class=" {{ $errors->has('community_certificate') ? 'is-invalid' : '' }}" type="file" name="community_certificate" accept="image/*" maxlength="" >
                @if($errors->has('community_certificate'))
                <span class="text-danger">{{ $errors->first('community_certificate') }}</span>
                @endif
                <span class="text-danger"> Maximum File size: 512KB</span> <br>
                <span class="text-danger"> Acceptable format: jpeg, png</span>
            </div>
            <div class="six wide field">
                <p class="" style="font-size:larger;">Sponsor's Letter</p>
                <input class=" {{ $errors->has('sponsor_letter') ? 'is-invalid' : '' }}" type="file" name="sponsor_letter" accept="image/*" maxlength="" >
                @if($errors->has('sponsor_letter'))
                <span class="text-danger">{{ $errors->first('sponsor_letter') }}</span>
                @endif
                <span class="text-danger"> Maximum File size: 512KB</span> <br>
                <span class="text-danger"> Acceptable format: jpeg, png</span>
            </div>
        </div>

        {{-- guardian's details --}}
        <h4 class="ui dividing header">Parent's/Guardian's Details</h4>
        <div class="parents-details field">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 required">Father's Name</label>
                        <input type="text" class="form-control col-md-8" name="father_name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 det">Qualifications</label>
                        <input type="text" class="form-control col-md-8 "placeholder="Qualifications" name="father_qualification" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-3 det">Occupation</label>
                        <input type="text" class="form-control col-md-9" placeholder="Occupation" name="father_occupation" >
                    </div>
                </div>
            </div>
        </div>
        <div class="parents-details field">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 required">Mother's Name</label>
                        <input type="text" class="form-control col-md-8" name="mother_name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 det">Qualifications</label>
                        <input type="text" class="form-control col-md-8" placeholder="Qualifications" name="mother_qualification" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-3 det">Occupation</label>
                        <input type="text" class="form-control col-md-9"placeholder="Occupation" name="mother_occupation" >
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
                        <input type="text" class="form-control col-md-8" name="spouse_name" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-4 det">Qualifications</label>
                        <input type="text" class="form-control col-md-8" placeholder="Qualifications" name="spouse_qualification" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-3 det">Occupation</label>
                        <input type="text" class="form-control col-md-9" placeholder="Occupation" name="spouse_occupation" >
                    </div>
                </div>
            </div>
        </div>

        <h6 class="ui dividing header">Payment Method: 
            <select class="col-md-3" name="payment_method" id="payment_method">
                <option value="0">Upload Voucher</option>
                <option value="1">eSewa</option>
            </select>
        </h6>
           <!-- bank voucher -->
        <div class="field" id="upload_voucher">
            <label class="required">Deposit Receipt / Voucher (scanned image)</label>
            <input class=" {{ $errors->has('voucher') ? 'is-invalid' : '' }}" type="file" name="voucher" accept="image/*" id="voucher">
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

   <div class="field">
        <button type="submit" class="btn btn-success"> Register </button>
    </div>
    </form>
    
    </div>

    <!-- <template class="subject-row-template">
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
    </template> -->

    
    @endsection

    @section('scripts')
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> -->
    <!-- <script src="{{ asset('/backend/plugins/jquery/jquery.min.js')}}"></script> -->
    <script src="{{ asset('js/form/semantic.min.js')}}"></script>
    <script src="{{ asset('/backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('/backend/plugins/nepali-date-picker/nepaliDatePicker.min.js')}}"></script>
    <script src="{{ asset('/backend/plugins/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script>
        $(function() {
        var selected_type = $("#payment_method").val();
            if(selected_type == '1') {
                $("#upload_voucher").hide();
                $("voucher").removeAttr('required');
            } else if(selected_type == '0'){
                $("#upload_voucher").show();
                $("voucher").attr('required');
            }
        })

        $(document).ready(function() {
            $("#payment_method").change(function() {
                var selected_type = $(this).val();
                if(selected_type == '1') {
                    $("#upload_voucher").hide();
                    $("voucher").removeAttr('required');
                } else if(selected_type == '0'){
                    $("#upload_voucher").show();
                    $("voucher").attr('required');
                }
            });
            var $subject_list = [];

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

                if(faculty_id==5 && selected_id==1) { 
                    $(".engineer").append(`<div class="priority">
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
                                                    <td><input type="number" name="priority[]" min="1" max="9"  required></td>
                                                    <td><input type="number" name="priority[]" min="1" max="9" ></td>
                                                    <td><input type="number" name="priority[]" min="1" max="9" ></td>
                                                    <td><input type="number" name="priority[]" min="1" max="9" ></td>
                                                    <td><input type="number" name="priority[]" min="1" max="9" ></td>
                                                    <td><input type="number" name="priority[]" min="1" max="9" ></td>
                                                    <td><input type="number" name="priority[]" min="1" max="9" ></td>
                                                    <td><input type="number" name="priority[]" min="1" max="9" ></td>
                                                    <td><input type="number" name="priority[]" min="1" max="9" ></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                `);
                    $(".hide-for-engineer").hide(); 
                    $("#programs").removeAttr("required")                             
                } else {
                    $(".hide-for-engineer").show();  
                    $("#programs").attr("required",true)                             
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
                            $(".priority").remove();
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
                }
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
            // $("#semester").change(function() {
            //     var selected_id = $(this).val();
            //     var program_id = $('#programs').val();
            //     //
            //     $.ajax({
            //         cache: false
            //         , url: "{{ route('admin.subs.getspecificsubs') }}"
            //         , type: 'get'
            //         // , async: false
            //         , data: {
            //             semester: selected_id
            //             , programId: program_id
            //         , }
            //         , dataType: 'json'
            //         , beforeSend: function(request) {
            //             return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            //         }
            //         , success: function(data) {
            //             // console.log(data)
            //             $subject_list = data;
            //             var len = data.length;
            //             $(".subjects").empty();
            //             $subjects = $(".subjects").append("<option value=''>Select a subject...</option>");
            //             for (var i = 0; i < len; i++) {
            //                 var name = data[i]['title'];
            //                 var id = data[i]['id'];
            //                 $subjects.append("<option value='" + id + "'>" + name + "</option>");
            //             }
            //         }
            //     });
            // });

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

        
    </script>
    @endsection
<!-- </body>
</html> -->
