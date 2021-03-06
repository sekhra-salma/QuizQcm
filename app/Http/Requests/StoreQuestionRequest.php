<?php

namespace App\Http\Requests;

use App\Question;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuestionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'description'    => [
                'string',
                'required',
            ],
            'a_option'       => [
                'string',
                
            ],
            'b_option'       => [
                'string',
                
            ],
            'c_option'       => [
                'string',
                
            ],
            'd_option'       => [
                'string',
                
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