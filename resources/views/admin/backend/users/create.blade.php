@extends('admin.backend.layouts.master')

@section('title','Add User')

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                @if(Auth::user()->name=='IT Admin')
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @else
                <label class="required" for="name">College {{ trans('cruds.user.fields.name') }}</label>
                <select class="form-control select2 {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" placeholder="School/College" required>
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
                @endif
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
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a href="{{route('admin.users.index')}}" class="btn btn-danger">{{ trans('global.cancel') }}</a>
            </div>
        </form>
    </div>
</div>



@endsection
