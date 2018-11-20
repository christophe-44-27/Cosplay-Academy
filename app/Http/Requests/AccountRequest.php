<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest {
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
			'profile_picture' => 'required',
			'cover_picture' => 'required',
			'public_pseudonym' => 'required',
			'firstname' => 'required',
			'lastname' => 'required',
			'email' => 'required'
		];
	}

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages() {
		return [
			'profile_picture.required' => "L'image de profil est obligatoire",
			'cover_picture.required' => "L'image de couverture est obligatoire",
			'public_pseudonym.required' => "Le nom d'affichage est obligatoire",
			'firstname.required' => "Le prénom est obligatoire",
			'lastname.required' => "Le nom est obligatoire",
			'email.required' => "L'adresse de courriel est obligatoire"
		];
	}
}
