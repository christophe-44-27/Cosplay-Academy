<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class ReviewRequest extends FormRequest
{
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
            'content' => 'required',
            'nb_stars' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => Lang::get('validation.review.content.required'),
            'nb_stars.required' => Lang::get('validation.review.nb_stars.required'),
        ];
    }
}
