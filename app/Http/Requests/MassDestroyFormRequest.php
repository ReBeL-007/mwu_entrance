<?php

namespace App\Http\Requests;

use App\Form;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFormRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('form-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:forms,id',
        ];

    }
}