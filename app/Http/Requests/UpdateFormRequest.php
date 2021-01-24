<?php

namespace App\Http\Requests;

use App\Form;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateFormRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('form-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            // 'symbol_no' => [
            //     'required'
            // ],
            'exam_centre' => [
                'required'
            ],
            'campus' => [
                'required'
            ],
            'faculty' => [
                'required'
            ],
            'level' => [
                'required'
            ],
            // 'programs' => [
            //     'required'
            // ],
            'fname' => [
                'required'
            ],
            'lname' => [
                'required'
            ],
            'caste' => [
                'required'
            ],
            'religion' => [
                'required'
            ],
            'nationality' => [
                'required'
            ],
            'dateOfBirth' => [
                'required'
            ],
            'sex' => [
                'required'
            ],
            'board' => [
                'required'
            ],
             'passed_year' => [
                'required'
            ],
             'roll_no' => [
                'required'
            ],
             'division' => [
                'required'
            ],
            'mother_name' => [
                'required'
            ],
            'father_name' => [
                'required'
            ],
        ];

    }
}