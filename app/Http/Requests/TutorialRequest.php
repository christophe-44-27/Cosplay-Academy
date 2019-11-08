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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title.required' => "Un titre de tutoriel est requis.",
            'category_id.required' => "Veuillez sélectionner une catégorie.",
            'language_id.required' => "Veuillez spécifier la langue du tutoriel.",
            'difficulty.required' => "Veuillez spécifier la difficulté du tutoriel.",
            'content.required' => "Veuillez remplir la section contenu.",
            'thumbnail_picture.dimensions' => "Les dimensions de la miniature doivent être d'au moins  750px * 422px",
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
            'introduction.required'  => 'A message is required',
//            'thumbnail_picture.required' => 'Vous devez mettre une image de "miniature"',
//            'thumbnail_picture.dimensions' => 'Minimum dimensions are 258x150px',
//            'main_picture.required' => 'Vous devez mettre une image de couverture',
//            'filename.*.size' => "Le poids de votre fichier est trop volumineux (Maximum: 2mo)",
//            'main_picture.dimensions' => 'Minimum dimensions are 700x500px'
        ];
    }

//    /**
//     * This function display a better error message.
//     * @param Validator $validator
//     */
//    protected function failedValidation(Validator $validator) {
//        $message = $validator->errors()->all();
//        throw new HttpResponseException(response()->json(['status' => 0,'messages' => $message]));
//    }
}
