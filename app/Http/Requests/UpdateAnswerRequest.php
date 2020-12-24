<?php

namespace App\Http\Requests;

use App\Answer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAnswerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('answer-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'subject_id' => [
                'required'],
            'answer' => [
                'required'],
        ];

    }
}