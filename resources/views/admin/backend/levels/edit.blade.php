@extends('admin.backend.layouts.master')
@section('title','Edit Level')

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.level.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.levels.update", [$level->slug]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="" for="faculties">{{ trans('cruds.level.fields.faculty') }}</label>
                
                <select class="form-control select2 {{ $errors->has('faculties') ? 'is-invalid' : '' }}" name="faculty_id[]" id="faculties" multiple required>
                    {{-- @foreach($level->faculties as $faculty)
                    <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                    @endforeach --}}
                    <option value="">Select a faculty...</option>
                    @foreach($faculties as $id => $faculty)
                        <option value="{{ $id }}" {{ (in_array($id, old('faculty', [])) || $level->faculties->contains($id)) ? 'selected' : '' }}>{{ $faculty }}</option>

                        {{-- <option value="{{ $id }}" {{ in_array($id, old('faculty', [])) ? 'selected' : '' }}>{{ $faculty }}</option> --}}
                    @endforeach
                </select>
                @if($errors->has('faculty_id'))
                    <span class="text-danger">{{ $errors->first('faculty_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.level.fields.faculty_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.level.fields.title') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $level->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.level.fields.title_helper') }}</span>
            </div>
          
            <div class="form-group">
                <label class="" for="description">{{ trans('cruds.level.fields.description') }}</label>
                
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" 
                                        style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor">{{ $level->description }}</textarea>
                            
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.level.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a href="{{route('admin.levels.index')}}" class="btn btn-danger">{{ trans('global.cancel') }}</a>
            </div>
        </form>
    </div>
</div>



@endsection