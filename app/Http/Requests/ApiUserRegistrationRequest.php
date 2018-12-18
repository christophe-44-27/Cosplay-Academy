<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiUserRegistrationRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ];
    }

    public function messages() {
        return [
            'name.required' => "Votre nom d'utilisateur est requis",
            'email.required' => "Adresse de courriel obligatoire",
            'password.required' => "Veuillez saisir un mot de passe",
            'c_password.required' => "Veuillez confirmer votre mot de passe",
            'c_password.same' => "Les deux mots de passes ne sont pas identiques."
        ];
    }
}
