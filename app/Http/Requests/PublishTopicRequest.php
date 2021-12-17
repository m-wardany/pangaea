<?php

namespace App\Http\Requests;

use App\Models\Topic;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PublishTopicRequest extends FormRequest
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
                Rule::exists('topics', 'title')
            ],
            'data'=>[
                'required',
                'array'
            ]
        ];
    }
}
