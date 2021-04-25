<?php

namespace App\Http\Requests;

use App\Question;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQuestionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'description'    => [
                'string',
                'required',
            ],
            
            'correct_answer' => [
                'string',
                'required',
            ],
            'explain'        => [
                'string',
                'nullable',
            ],
        ];
    }
}