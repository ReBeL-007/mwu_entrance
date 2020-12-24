@extends('admin.backend.layouts.master')
@section('title','View Faculty')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.faculty.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            
            <table class="table table-bordered table-striped">
                <tbody>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.faculty.fields.title') }}
                        </th>
                        <td>
                            {{ $faculty->name }}
                        </td>
                    </tr>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.faculty.fields.programs') }}
                        </th>
                        <td>
                            @foreach($faculty->programs as $program)
                            <span class="badge badge-info">{{ $program->name }}</span>
                            @endforeach
                        </td>
                    </tr> --}}
                    <tr>
                        <th>
                            {{ trans('cruds.faculty.fields.description') }}
                        </th>
                        <td>
                            {{ html_entity_decode(strip_tags($faculty->description)) }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.faculty.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection