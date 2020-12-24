<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Course;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('course-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
              //
            'name' => [
                'required'],
            // 'duration' => [
            //     'required'],
            // 'programtypes' => [
            //     'required'],
            'faculty_id' => [
                'required'],
            'level_id' => [
                'required'],
        ];
    }
}
