<?php

namespace App\Http\Requests;

use App\Answer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAnswerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('answer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'mark'        => [
                'numeric',
                'required',
            ],
            'answer'      => [
                'string',
                'nullable',
            ],
            'student_id'  => [
                'required',
                'integer',
            ],
            'question_id' => [
                'required',
                'integer',
            ],
        ];
    }
}