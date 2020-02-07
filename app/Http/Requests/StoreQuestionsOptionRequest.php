<?php

namespace App\Http\Requests;

use App\QuestionsOption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreQuestionsOptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('questions_option_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'option_text' => [
                'required',
            ],
        ];
    }
}
