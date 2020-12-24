@extends('admin.backend.layouts.master')
@section('title','View Answer')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.answer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            
            <table class="table table-bordered table-striped">
                <tbody>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.subject') }}
                        </th>
                        <td>
                            {{ $answer->subject->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.college') }}
                        </th>
                        <td>
                            {{ $answer->user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.answer') }}
                        </th>
                        <td>
                            {{ $answer->files }}
                        </td>
                    </tr>
                   
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.answers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection