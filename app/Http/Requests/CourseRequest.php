<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Lang;

class CourseRequest extends FormRequest {
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
            'title' => 'required',
            'category_id' => 'required',
            'introduction' => 'required',
            'language_id' => 'required',
            'difficulty' => 'required',
            'content_price_id' => 'required',
//            'thumbnail_picture' => 'required|dimensions:min_width=258,min_height=150',
//            'main_picture' => 'required|dimensions:min_width=700,min_height=500',
//            'filename.*' => 'mimes:doc,pdf,docx,zip|size:2048',
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
            'title.required' => Lang::get('Le titre du cours est obligatoire'),
            'introduction.required'  => Lang::get('Vous devez indiquer une introduction'),
            'content_price_id.required' => "Veuillez indiquer une tranche de prix",
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
