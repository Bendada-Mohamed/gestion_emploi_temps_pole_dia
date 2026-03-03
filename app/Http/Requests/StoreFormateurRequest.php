<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormateurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'matricule' => 'required|unique:formateurs',
            'nom' => 'required',
            'prenom' => 'required',
            'email_professionnel' => 'email|required|unique:formateurs',
            'telephone' => 'nullable',
            'specialite' => 'nullable'
        ];
    }
}
