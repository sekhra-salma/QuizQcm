<?php

namespace App\Http\Requests;

use App\Student;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStudentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('student_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'cin'       => [
                'string',
                'required',
            ],
            'name'      => [
                'string',
                'required',
                'unique:students',
            ],
            'gmail'     => [
                'required',
                'unique:students',
            ],
            'adress'    => [
                'string',
                'nullable',
            ],
            'city'      => [
                'string',
                'nullable',
            ],
            'mobile'    => [
                'string',
                'nullable',
            ],
            'password'  => [
                'required',
            ],
            'classe_id' => [
                'required',
                'integer',
            ],
            'role_id'   => [
                'required',
                'integer',
            ],
        ];
    }
}