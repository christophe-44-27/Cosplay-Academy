<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'language_id' => 'required',
            'difficulty' => 'required',
            'type_id' => 'required',
            'keywords' => 'nullable',
            'thumbnail_picture' => 'dimensions:min_width=258,min_height=150',
            'main_picture' => 'dimensions:min_width=700,min_height=500',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'content.required' => 'A message is required',
            'thumbnail_picture.dimensions' => 'Minimum dimensions are 258x150px',
            'main_picture.dimensions' => 'Minimum dimensions are 700x500px',
        ];
    }
}
