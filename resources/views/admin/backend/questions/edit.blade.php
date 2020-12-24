@extends('admin.backend.layouts.master')
@section('title','Edit Question')

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.question.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.questions.update", [$question->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="subject_id">{{ trans('cruds.question.fields.subject') }}</label>
                <select class="form-control select2 {{ $errors->has('subject_id') ? 'is-invalid' : '' }}" name="subject_id" id="subject_id" required>
                    @foreach($subjects as $id => $subject)
                        <option value="{{ $id }}" {{ ($id === $question->subject->id) ? 'selected' : '' }}>{{ $subject }}</option>
                    @endforeach
                </select>
                @if($errors->has('subject_id'))
                    <span class="text-danger">{{ $errors->first('subject_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.subject_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="question">{{ trans('cruds.question.fields.question') }}</label>
                <input class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }}" type="file" name="question" id="question" value="{{ old('question', '') }}" required>
                @if($errors->has('question'))
                    <span class="text-danger">{{ $errors->first('question') }}</span>
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