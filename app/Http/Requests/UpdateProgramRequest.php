<?php

namespace App\Http\Requests;

use App\Program;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateProgramRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('program-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'title' => [
                'required'],
            'grades' => [
                'required'],
        ];

    }
}