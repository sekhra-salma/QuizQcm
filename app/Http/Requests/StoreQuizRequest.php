<?php

namespace App\Http\Requests;

use App\Quiz;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuizRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('quiz_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title'      => [
                'string',
                'required',
            ],
            'module'     => [
                'string',
                'required',
            ],
            'nb_qst'     => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            
            'teacher_id' => [
                
                'integer',
            ],
        ];
    }
}