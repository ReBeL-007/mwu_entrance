@extends('admin.backend.layouts.master')
@section('title','Add Program')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.program.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.programs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.program.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.program.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="" for="description">{{ trans('cruds.program.fields.description') }}</label>
                {{-- <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required> --}}
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" 
                                        style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor">{{ old('description', '') }}</textarea>
                            
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.program.fields.title_helper') }}</span>
            </div>
            <div class="form-group dynamic_field">
                <label class="required" for="grades">{{ trans('cruds.program.fields.grades') }}</label>
                <input class="form-control {{ $errors->has('grades') ? 'is-invalid' : '' }}" type="text" name="grades[]" id="grades" value="{{ old('grades', '') }}" required>
                @if($errors->has('grades'))
                    <span class="text-danger">{{ $errors->first('grades') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.program.fields.grades_helper') }}</span>
            </div>
            <p id="add" style="color:#3B3B98; cursor:pointer;"> Click me to add more grades</p>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a href="{{route('admin.programs.index')}}" class="btn btn-danger">{{ trans('global.cancel') }}</a>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
    <script>
        $(document).ready(function(){    
            //adding permissions dynamically
            var i = 1;
            $('#add').click(function(){
                i++;
                $('.dynamic_field').append('<div class="row" id="row'+i+'" style="padding:5px;"> <div class="col-md-11"><input class="form-control {{ $errors->has('grades') ? 'is-invalid' : '' }}" type="text" name="grades[]" id="grades" value="{{ old('grades', '') }}" required> </div> <div class="col-md-1"> <input type="button" id="'+i+'" class="btn btn-danger remove" value="X"> </div> </div>');
                // <div class="col-md-12 row" id="row'+i+'" style="padding:5px;"> <div class="col-md-10"> <input type="text" class="form-control is-warning" name="options[]" id="options" placeholder="Enter Options..." required> </div> <div class="col-md-1"> <span><i class="fas fa-book"></i></span> </div> <div class="col-md-1"> <input type="button" id="'+i+'" class="btn btn-danger remove" value="X"> </div> </div>
                
                // @if($errors->has('title'))
                //     <span class="text-danger">{{ $errors->first('title') }}</span>
                // @endif
                // <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            });
            

            $('body').on('click','.remove',function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });

        });
    </script>
@endsection