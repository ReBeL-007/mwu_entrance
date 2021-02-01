@extends('admin.backend.layouts.master')

@section('title','Add User')

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                @if(Auth::user()->name=='IT Admin')
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                @else
                <label class="required" for="name">College {{ trans('cruds.user.fields.name') }}</label>
                @endif
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                @if(Auth::user()->name=='IT Admin')
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @else
                <label class="required" for="email">College Code</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email') }}" required>
                @endif
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            @if(Auth::user()->name=='IT Admin')
            <div class="form-group">
                <label for="generatePassword">Auto Generate Password</label>
                <input type="checkbox" name="generate_password">
            </div>
            @endif
            <div class="form-group">
                <label class="" for="mobile">{{ trans('cruds.user.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="number" name="mobile" id="mobile" value="{{ old('mobile', '') }}" >
                @if($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            @if(Auth::user()->name=='IT Admin')
             <div class="form-group">
                <label class="" for="groups">{{ trans('cruds.user.fields.groups') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('groups') ? 'is-invalid' : '' }}" name="groups[]" id="groups" multiple >
                    @foreach($groups as $id => $groups)
                        <option value="{{ $id }}" {{ in_array($id, old('groups', [])) ? 'selected' : '' }}>{{ $groups }}</option>
                    @endforeach
                </select>
                @if($errors->has('groups'))
                    <span class="text-danger">{{ $errors->first('groups') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.groups_helper') }}</span>
            </div>
            @endif
            <div class="form-group">
                <label class="" for="merchant_no">{{ trans('cruds.user.fields.merchant_no') }}</label>
                <input class="form-control {{ $errors->has('merchant_no') ? 'is-invalid' : '' }}" type="text" name="merchant_no" id="merchant_no" value="{{ old('merchant_no', '') }}" >
                @if($errors->has('merchant_no'))
                    <span class="text-danger">{{ $errors->first('merchant_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.merchant_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="" for="form_charge">{{ trans('cruds.user.fields.form_charge') }}</label>
                <input class="form-control {{ $errors->has('form_charge') ? 'is-invalid' : '' }}" type="number" name="form_charge" id="form_charge" value="{{ old('form_charge', '') }}" >
                @if($errors->has('form_charge'))
                    <span class="text-danger">{{ $errors->first('form_charge') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.form_charge_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="" for="official_seal">{{ trans('cruds.user.fields.official_seal') }}</label>
                <input class="form-control {{ $errors->has('official_seal') ? 'is-invalid' : '' }}" type="file" name="official_seal" id="official_seal" value="{{ old('official_seal', '') }}" >
                @if($errors->has('official_seal'))
                    <span class="text-danger">{{ $errors->first('official_seal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.official_seal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="" for="authorized_signature">{{ trans('cruds.user.fields.authorized_signature') }}</label>
                <input class="form-control {{ $errors->has('authorized_signature') ? 'is-invalid' : '' }}" type="file" name="authorized_signature" id="authorized_signature" value="{{ old('authorized_signature', '') }}" >
                @if($errors->has('authorized_signature'))
                    <span class="text-danger">{{ $errors->first('authorized_signature') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.authorized_signature_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a href="{{route('admin.users.index')}}" class="btn btn-danger">{{ trans('global.cancel') }}</a>
            </div>
        </form>
    </div>
</div>



@endsection
