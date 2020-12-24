<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Program;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class StoreProgramRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('program-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
            'title' => [
                'required'],
            'grades' => [
                'required'],
        ];
    }
}
