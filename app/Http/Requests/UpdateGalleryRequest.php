<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGalleryRequest extends FormRequest
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
            'description' => 'required',
            'category_id' => 'required',
            'cover_image' => 'dimensions:min_width=258,min_height=150'
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
            'title.required' => "Le titre est obligatoire",
            'description.required'  => "La description est obligatoire",
            'category_id.required' => "Le choix d'une catégorie est obligatoire",
            'cover_image.dimensions' => 'Les dimensions minimum sont de 258x150px'
        ];
    }
}
