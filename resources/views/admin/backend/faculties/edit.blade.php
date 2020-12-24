@extends('admin.backend.layouts.master')
@section('title','Edit Faculty')

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.faculty.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.faculty.update", [$faculty->slug]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.faculty.fields.title') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $faculty->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.faculty.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="" for="levels">{{ trans('cruds.faculty.fields.levels') }}</label>
                <div class="row">
                    <div class="col-md-12" style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('levels') ? 'is-invalid' : '' }}" name="levels[]" id="levels" multiple required>
                        @foreach($levels as $id => $levels)
                            <option value="{{ $id }}" {{ (in_array($id, old('levels', [])) || $faculty->levels->contains($id)) ? 'selected' : '' }}>{{ $levels }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <a class="btn btn-success btn-md" data-toggle='modal' data-target="#addLevel" style="cursor:pointer;">
                            <i class="fa fa-plus"> Add new level</i>
                    </a>
                </div>
                @if($errors->has('levels'))
                    <span class="text-danger">{{ $errors->first('levels') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.faculty.fields.levels_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="" for="description">{{ trans('cruds.faculty.fields.description') }}</label>
                
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" 
                                        style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor">{{ $faculty->description }}</textarea>
                            
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.faculty.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a href="{{route('admin.faculty.index')}}" class="btn btn-danger">{{ trans('global.cancel') }}</a>
            </div>
        </form>
    </div>
</div>

{{-- modal box for adding new program --}}
<div class="modal fade" id="addLevel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{trans('global.add')}} {{ trans('cruds.level.title') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">    
                    <div class="box-body">        
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.level.fields.title') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="level_name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.level.fields.title_helper') }}</span>
                            
                        </div>
                       
                        <div class="form-group">
                            <label class="required" for="description">{{ trans('cruds.level.fields.description') }}</label>
                            {{-- <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required> --}}
                            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" 
                                                    style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="description">{{ old('description', '') }}</textarea>
                                        
                            @if($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.level.fields.title_helper') }}</span>
                        </div>
                        <!--form control-->
                    </div>
                </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="addNewLevel">Ok</button>
            </div>
        </div>
       
    </div>

</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#addNewLevel').click(function(){
            var level_name = $('#level_name').val();
        var description =  $('#description').val();
        var level_data={
                    name: level_name,
                    description: description
                };
        console.log(level_data);
        $.ajax({
        data:{data: level_data},
        url: "{{route('admin.levels.addLevel')}}",
        type: 'POST',
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
            success: function (data){
                console.log(data);
                location.reload();  
            }
        });
    });
});
</script>
@endsection