@extends('admin.backend.layouts.master')
@section('title','Add Subject')

@section('styles')

@endsection

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.add') }} {{ trans('cruds.sub.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.subs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                {!! Form::label('course_id', trans('cruds.program.title_singular'), ['class' => 'control-label required']) !!}
                {!! Form::select('course_id', $course, old('course_id'), ['class' => 'form-control']) !!}
                @if($errors->has('course_id'))
                    <span class="text-danger">{{ $errors->first('course_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sub.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="semester">{{ trans('cruds.sub.fields.semester') }}</label>
                <select class="form-control select2 {{ $errors->has('semester') ? 'is-invalid' : '' }}" name="semester" id="semester" required>
                        <option value="">Please select semester...</option>
                        <option value="First">First semester</option>
                        <option value="Second">Second semester</option>
                        <option value="Third">Third semester</option>
                        <option value="Fourth">Fourth semester</option>
                        <option value="Fifth">Fifth semester</option>
                        <option value="Sixth">Sixth semester</option>
                        <option value="Seventh">Seventh semester</option>
                        <option value="Eighth">Eighth semester</option>
                        <option value="Ninth">Ninth semester</option>
                        <option value="Tenth">Tenth semester</option>

                </select>
                @if($errors->has('semester'))
                    <span class="text-danger">{{ $errors->first('semester') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sub.fields.semester_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="subject_code">{{ trans('cruds.sub.fields.subject_code') }}</label>
                <input class="form-control {{ $errors->has('subject_code') ? 'is-invalid' : '' }}" type="text" name="subject_code" id="subject_code" value="{{ old('subject_code', '') }}">
                @if($errors->has('subject_code'))
                    <span class="text-danger">{{ $errors->first('subject_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sub.fields.subject_code_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.sub.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sub.fields.title_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="" for="description">{{ trans('cruds.sub.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" cols="30" rows="10">{{ old('description', '') }}</textarea>
                {{-- <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}"> --}}
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sub.fields.description_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a href="{{route('admin.subs.courseSubjects', $id)}}" class="btn btn-danger">{{ trans('global.cancel') }}</a>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')


@endsection
