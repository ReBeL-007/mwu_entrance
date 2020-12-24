<?php

namespace App\Http\Requests;

use App\Subject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySubjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('subject-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:subjects,id',
        ];

    }
}