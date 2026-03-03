<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormateurRequest extends FormRequest
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
            'matricule' => 'required|unique:formateurs,matricule,' . $this->formateur->id,
            'nom' => 'required',
            'prenom' => 'required',
            'email_professionnel' => 'email|required|unique:formateurs,email_professionnel,' . $this->formateur->id,
            'telephone' => 'nullable',
            'specialite' => 'nullable'
        ];
    }
}
