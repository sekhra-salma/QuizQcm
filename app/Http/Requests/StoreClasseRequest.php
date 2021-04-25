<?php

namespace App\Http\Requests;

use App\Classe;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClasseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('classe_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}