<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommissionRequest extends FormRequest
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
            'max_budget' => 'required|numeric',
            'delivery_location' => 'required',
            'desired_delivery_date' => 'required|date',
            'cover_path' => 'required|dimensions:min_width=750,min_height=500',
            'category_id' => 'required'
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
            'title.required' => 'Tu dois indiquer un titre à ton annonce.',
            'description.required'  => 'Tu dois saisir une description.',
            'max_budget.required'  => 'Indiques ton budget indicatif.',
            'max_budget.numeric'  => 'Budget indicatif : Le montant doit être en format numérique.',
            'delivery_location.required' => 'Tu dois indiquer une localisation pour la livraison.',
            'desired_delivery_date.required' => 'Tu dois indiquer une approximative de réalisation.',
            'desired_delivery_date.date' => 'La date doit être au format date.',
            'cover_path.required' => "L'image de couverture est obligatoire.",
            'cover_path.dimensions' => 'Les dimensions minimales sont de 750px sur 500px de hauteur.',
            'category_id.required' => "Choisis une catégorie pour ton offre"
        ];
    }
}
