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
            'faculty' => [
                'required'
            ],
            // 'campus' => [
            //     'required'
            // ],
            'level' => [
                'required'
            ],
            // 'programs' => [
            //     'required'
            // ],
            // 'year' => [
            //     'required'
            // ],
            'sex' => [
                'required'
            ],
            'fname' => [
                'required'
            ],
            'lname' => [
                'required'
            ],
            // 'regd_no' => [
            //     'required'
            // ],
            // 'semester' => [
            //     'required'
            // ],
            // 'exam_type' => [
            //     'required'
            // ],
            // 'subjects' => [
            //     'required'
            // ],
            // 'subject_codes' => [
            //     'required'
            // ],
            // 'nationality' => [
            //     'required'
            // ],
            'dateOfBirth' => [
                'required'
            ],
            'district' => [
                'required'
            ],
            'mother_name' => [
                'required'
            ],
            'father_name' => [
                'required'
            ],
            // 'contact' => [
            //     'required'
            // ],
            // 'email' => [
            //     'required'
            // ],
        ];

    }
}