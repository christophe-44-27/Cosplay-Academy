<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TutorialRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'content'  => 'required',
            'category_id' => 'required',
            'difficulty' => 'required',
            'language_id' => 'required',
            'thumbnail_picture'  => 'required|dimensions:min_width=750,min_height=422',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages() {
        return [
            'title.required' => "Un titre de tutoriel est requis.",
            'content.required' => "Veuillez remplir la section contenu.",
            'category_id.required' => "Veuillez choisir une catégorie.",
            'difficulty.required' => "Veuillez indiquer la difficulté du tutoriel.",
            'language_id.required' => "Veuillez indiquer la langue du tutoriel.",
            'thumbnail_picture.required' => "Veuillez renseigner une image pour le tutoriel",
            'thumbnail_picture.dimensions' => "Les dimensions de l'image doivent être d'au moins  750px * 422px",
        ];
    }
}
