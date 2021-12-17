<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class CreateSubscriptionRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        $this->merge([
            'topic' => $this->topic
        ]);
    } 
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'topic'=>[
                'required',
                'string',
                'max:255'
            ],
            'url'=>[
                'required',
                'url',
                'max:255'
            ]
        ];
    }
}
