@extends('admin.backend.layouts.master')
@section('title','View Subject')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.subject.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            
            <table class="table table-bordered table-striped">
                <tbody>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.subject.fields.subject_code') }}
                        </th>
                        <td>
                            {{ $subject->subject_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subject.fields.title') }}
                        </th>
                        <td>
                            {{ $subject->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subject.fields.description') }}
                        </th>
                        <td>
                            {{ $subject->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.subjects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection