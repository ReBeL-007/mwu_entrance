<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Exam;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class StoreExamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // abort_if(Gate::denies('program-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'faculty' => [
                'required'
            ],
            'level' => [
                'required'
            ],
            'programs' => [
                'required'
            ],
            'year' => [
                'required'
            ],
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
            'semester' => [
                'required'
            ],
            'exam_type' => [
                'required'
            ],
            'subjects' => [
                'required'
            ],
            'subject_codes' => [
                'required'
            ],
            'image' => [
                'required',
                'mimes:jpeg,png',
                'max:512'
            ],
            'signature' => [
                'required',
                'mimes:jpeg,png',
                'max:512'
            ],
            // 'voucher' => [
            //     'required',
            //     'mimes:jpeg,png',
            //     'max:512'
            // ],
            'nationality' => [
                'required'
            ],
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
            'contact' => [
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
            'consent' => [
                'required'
            ],
            'email' => [
                'required'
            ],

        ];
    }
}
