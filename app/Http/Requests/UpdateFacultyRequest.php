<?php

namespace App\Http\Requests;

use App\Faculty;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateFacultyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('faculty-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'unique:faculties,name,' . request()->route('faculty')->id],
        ];

    }
}