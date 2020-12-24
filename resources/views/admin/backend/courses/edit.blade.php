@extends('admin.backend.layouts.master')
@section('title','Edit Program')

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.program.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.courses.update", [$course->slug]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label class="required" for="faculties">{{ trans('cruds.course.fields.faculty') }}</label>
                
                <select class="form-control {{ $errors->has('faculties') ? 'is-invalid' : '' }}" name="faculty_id" id="faculties" required>
                    {{-- <option value="{{$course->faculty_id}}">{{$course->faculty->name}}</option> --}}
                    
                    @foreach($faculties as $id => $faculty)
                        <option value="{{ $id }}" {{($id==$course->faculty_id)?'selected':''}}>{{ $faculty }}</option>
                    @endforeach
                                                
                </select>
                @if($errors->has('faculties'))
                    <span class="text-danger">{{ $errors->first('faculties') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.faculty_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="level_id">{{ trans('cruds.course.fields.level') }}</label>
                
                <select class="form-control {{ $errors->has('level_id') ? 'is-invalid' : '' }}" name="level_id" id="levels" required>
                    {{-- <option value="{{$course->level_id}}">{{$course->level->name}}</option> --}}
                    @foreach($levels as $id => $levels)
                        <option value="{{ $id }}" {{($id==$course->level_id)?'selected':''}}>{{ $levels }}</option>
                    @endforeach                 
                </select>
                @if($errors->has('level_id'))
                    <span class="text-danger">{{ $errors->first('level_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.level_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.course.fields.title') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $course->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.title_helper') }}</span>
            </div>
            
            <div class="form-group">
                <label class="" for="abbreviation">{{ trans('cruds.course.fields.abbreviation') }}</label>
                <input class="form-control {{ $errors->has('abbreviation') ? 'is-invalid' : '' }}" type="text" name="abbreviation" id="abbreviation" value="{{ old('abbreviation', $course->abbreviation) }}">
                @if($errors->has('abbreviation'))
                    <span class="text-danger">{{ $errors->first('abbreviation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.title_helper') }}</span>
            </div>

            {{-- <div class="form-group">
                <label class="" for="duration">{{ trans('cruds.course.fields.duration') }} (in Year)</label>
                <input class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" type="number" name="duration" id="duration" value="{{ old('duration', $course->duration) }}">
                @if($errors->has('duration'))
                    <span class="text-danger">{{ $errors->first('duration') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.title_helper') }}</span>
            </div> --}}

            {{-- <div class="form-group">
                <label class="required" for="programtypes">{{ trans('cruds.course.fields.coursetypes') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <div class="row">
                    <div class="col-lg-11 row">
                    <select class="form-control select2 {{ $errors->has('programtypes') ? 'is-invalid' : '' }}" name="programtypes[]" id="programtypes" multiple required>
                        @foreach($programtypes as $id => $programtypes)
                            <option value="{{ $id }}" {{ (in_array($id, old('programtypes', [])) || $course->coursetypes->contains($id)) ? 'selected' : '' }}>{{ $programtypes }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-lg-1 row">
                        <a class="btn btn-success btn-md" data-toggle='modal' data-target="#addCourse" style="cursor:pointer;">
                                <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                @if($errors->has('programtypes'))
                    <span class="text-danger">{{ $errors->first('programtypes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.coursetypes_helper') }}</span>
            </div> --}}

            <div class="form-group">
                <label class="" for="description">{{ trans('cruds.course.fields.description') }}</label>
                
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" 
                                        style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor">{{ $course->description }}</textarea>
                            
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a href="{{route('admin.courses.index')}}" class="btn btn-danger">{{ trans('global.cancel') }}</a>
            </div>
        </form>
    </div>
</div>

{{-- modal box for adding course types --}}
<div class="modal fade" id="addCourse">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{trans('global.add')}} {{ trans('cruds.programtype.title') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">    
                    <div class="box-body">        
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.programtype.fields.title') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="type_name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.programtype.fields.title_helper') }}</span>
                            
                        </div>
                        <div class="form-group">
                            <label class="required" for="description">{{ trans('cruds.programtype.fields.description') }}</label>
                            {{-- <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required> --}}
                            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" 
                                                    style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="description">{{ old('description', '') }}</textarea>
                                        
                            @if($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.programtype.fields.title_helper') }}</span>
                        </div>
                        <!--form control-->
                    </div>
                </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="addCourseType">Ok</button>
            </div>
        </div>
       
    </div>

</div>
@endsection

@section('scripts')
    {{-- get programs of specific faculty --}}
    <script>
        $(document).ready(function(){
            $("#faculties").change(function(){
                var selected_id = $(this).val();
                console.log(selected_id);
                $.ajax({
                    cache:false,
                    url: '{{ route('admin.levels.getspecificlevels') }}',
                    type: 'get',
                    data: {facultyId:selected_id},
                    dataType: 'json',
                    beforeSend: function(request) {
                                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                                    },
                    success:function(data){
                        var len = data.length;
                        $("#levels").empty();
                        for( var i = 0; i<len; i++){
                            var id = data[i]['id'];
                            var name = data[i]['name'];
                            $("#levels").append("<option value='"+id+"'>"+name+"</option>");
                        }
                    }
                });
            });

            // $('#addCourseType').click(function(){
            // var type_name = $('#type_name').val();
            // var description =  $('#description').val();
            // var type_data={
            //             name: type_name,
            //             description: description
            //         };
            // // console.log(type_data);
            // $.ajax({
            //    data:{data: type_data},
            //    url: "{{}}",
            //    type: 'POST',
            //    beforeSend: function (request) {
            //                 return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            //             },
            //     success: function (data){
            //         // console.log(data);
            //         location.reload();  
            //         }
            //     });
            // });
        });
    </script>
@endsection