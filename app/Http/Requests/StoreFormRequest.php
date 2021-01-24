<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Form;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class StoreFormRequest extends FormRequest
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
            'see_certificate' => [
                'required',
                'mimes:jpeg,png',
                'max:512'
            ],
            'see_marksheet' => [
                'required',
                'mimes:jpeg,png',
                'max:512'
            ],
            'see_provisional' => [
                'required',
                'mimes:jpeg,png',
                'max:512'
            ],
            'citizenship' => [
                'required',
                'mimes:jpeg,png',
                'max:512'
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
            // 'voucher' => [
            //     'required',
            //     'mimes:jpeg,png',
            //     'max:512'
            // ],
            'mother_name' => [
                'required'
            ],
            'father_name' => [
                'required'
            ],
            'payment_method' => [
                'required'
            ],     
            'consent' => [
                'required'
            ],

        ];
    }
}
