<?php

namespace App\Http\Requests;

use App\Question;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreQuestionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('question-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'subject_id' => [
                'required'],
            'files' => [
                'required'],
        ];

    }
}