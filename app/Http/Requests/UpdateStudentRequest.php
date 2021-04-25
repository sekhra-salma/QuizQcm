<?php

namespace App\Http\Requests;

use App\Student;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStudentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('student_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'cin'    => [
                'string',
                'required',
            ],
            'name'   => [
                'string',
                'required',
                'unique:students,name,' . request()->route('student')->id,
            ],
            'gmail'  => [
                'required',
                'unique:students,gmail,' . request()->route('student')->id,
            ],
            'adress' => [
                'string',
                'nullable',
            ],
            'city'   => [
                'string',
                'nullable',
            ],
            'mobile' => [
                'string',
                'nullable',
            ],
            'role'   => [
                'string',
                'nullable',
            ],
        ];
    }
}