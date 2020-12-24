@extends('admin.backend.layouts.master')
@section('title','Add Question')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.add') }} {{ trans('cruds.question.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.questions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                {{-- <label class="" for="subject">{{ trans('cruds.question.fields.subject') }}</label> --}}
                {!! Form::label('subject_id', trans('cruds.question.fields.subject'), ['class' => 'control-label required']) !!}
                {!! Form::select('subject_id', $subjects, old('subject_id'), ['class' => 'form-control select2']) !!}
                @if($errors->has('subject_id'))
                    <span class="text-danger">{{ $errors->first('subject_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.subject_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="files">{{ trans('cruds.question.fields.question') }}</label>
                <input class="form-control {{ $errors->has('files') ? 'is-invalid' : '' }}" type="file" name="files" id="files" value="{{ old('files', '') }}" required>
                @if($errors->has('files'))
                    <span class="text-danger">{{ $errors->first('files') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.question_helper') }}</span>
            </div>
            
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a href="{{route('admin.questions.index')}}" class="btn btn-danger">{{ trans('global.cancel') }}</a>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
   
@endsection