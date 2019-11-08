<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTutorialRequest extends FormRequest
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
            'thumbnail_picture' => 'dimensions:min_width=750,min_height=422',
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
            'title.required' => "Un titre de tutoriel est requis.",
            'category_id.required' => "Veuillez sélectionner une catégorie.",
            'language_id.required' => "Veuillez spécifier la langue du tutoriel.",
            'difficulty.required' => "Veuillez spécifier la difficulté du tutoriel.",
            'content.required' => "Veuillez remplir la section contenu.",
            'thumbnail_picture.dimensions' => "Les dimensions de la miniature doivent être d'au moins  750px * 422px",
        ];
    }
}
