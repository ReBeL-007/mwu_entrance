<?php

namespace App\Http\Requests;

use App\Sub;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreSubRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sub-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'title' => [
                'required'],
            'subject_code' => [
                'required'],
            'course_id' => [
                'required'],
            'semester' => [
                'required'],
        ];

    }
}