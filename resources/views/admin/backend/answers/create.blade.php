@extends('admin.backend.layouts.master')
@section('title','Add Answer')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.upload') }} {{ trans('cruds.answer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.answers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                {{-- <label class="" for="subject">{{ trans('cruds.question.fields.subject') }}</label> --}}
                {!! Form::label('program_id', trans('cruds.subject.fields.program'), ['class' => 'control-label required']) !!}
                {!! Form::select('program_id', $programs, old('program_id'), ['class' => 'form-control select2', 'required' => 'required']) !!}
                @if($errors->has('program_id'))
                    <span class="text-danger">{{ $errors->first('program_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.program_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="grade_id">{{ trans('cruds.subject.fields.grade') }}</label>
                <select class="form-control select2 {{ $errors->has('grade_id') ? 'is-invalid' : '' }}" name="grade_id" id="grade_id" required>
                        <option value="">Please select grade...</option>
                </select>
                @if($errors->has('grade_id'))
                    <span class="text-danger">{{ $errors->first('grade_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.grade_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="subject_id">{{ trans('cruds.answer.fields.subject') }}</label>
                <select class="form-control select2 {{ $errors->has('subject_id') ? 'is-invalid' : '' }}" name="subject_id" id="subject_id" required>
                        <option value="">Please select subject...</option>
                </select>
                @if($errors->has('subject_id'))
                    <span class="text-danger">{{ $errors->first('subject_id') }}</span>
                @endif
                <span class="help-block upload_overdue">{{ trans('cruds.answer.fields.subject_helper') }}</span>
            </div>

            {{-- <div class="form-group">
                <label class="required" for="files">{{ trans('cruds.answer.fields.answer') }}</label>
                <input class="form-control {{ $errors->has('files') ? 'is-invalid' : '' }}" type="file" name="files" id="files" value="{{ old('files', '') }}" multiple required>
                @if($errors->has('files'))
                    <span class="text-danger">{{ $errors->first('files') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answer.fields.answer_helper') }}</span>
            </div> --}}

            <div class="form-group">
                <button class="btn btn-success" type="submit" id="upload">
                    {{-- {{ trans('global.upload') }} --}}
                    Choose file to upload
                </button>
                <a href="{{route('admin.answers.index')}}" class="btn btn-danger">{{ trans('global.cancel') }}</a>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
       // if changes is made on faculty selection
       $("#program_id").change(function(){
        var selected_id = $(this).val();
        $.ajax({
            cache:false,
            url: '{{ route('admin.subjects.getspecificgrades') }}',
            type: 'get',
            data: {programId:selected_id},
            dataType: 'json',
            beforeSend: function(request) {
                                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                            },
            success:function(data){
                var len = data.length;
                $("#grade_id").empty();

                var grade = $("#grade_id").append("<option value=''>Please select grade...</option>");

                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var name = data[i]['title'];
                    grade.append("<option value='"+id+"'>"+name+"</option>");
                }
            }
        });
    });

    // if changes is made on grade selection
    $("#grade_id").change(function(){
        var selected_id = $(this).val();
        $.ajax({
            cache:false,
            url: '{{ route('admin.answers.getspecificsubjects') }}',
            type: 'get',
            data: {gradeId:selected_id},
            dataType: 'json',
            beforeSend: function(request) {
                                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                            },
            success:function(data){
                var len = data.length;
                $("#subject_id").empty();

                var subject = $("#subject_id").append("<option value=''>Please select subject...</option>");

                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var name = data[i]['title'];
                    subject.append("<option value='"+id+"'>"+name+"</option>");
                }
            }
        });
    });

    $("#subject_id").change(function(){
        var currentTime = '<?php echo \Carbon\Carbon::now() ?>';
        var selected_id = $(this).val();
        if(selected_id){
            $.ajax({
                cache:false,
                url: '{{ route('admin.answers.getsubject') }}',
                type: 'get',
                data: {subjectId:selected_id},
                dataType: 'json',
                beforeSend: function(request) {
                                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                                },
                success:function(data){
                    var deadline = data['deadline'];
                    if(deadline){
                        if(currentTime < deadline) {
                            $("#upload").prop('disabled', false);
                            $(".upload_overdue").html('');
                        } else {
                            $(".upload_overdue").html('<p style="color:red;">Sorry... you missed the deadline for submission !</p>');
                            $("#upload").prop('disabled', true);
                        }
                    } else {
                        $(".upload_overdue").html('');
                        $("#upload").prop('disabled', false);
                    }
                }
            });
        }
    });
   </script>
@endsection
