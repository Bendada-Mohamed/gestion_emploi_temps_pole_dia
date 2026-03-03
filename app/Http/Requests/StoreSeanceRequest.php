<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class StoreSeanceRequest extends FormRequest
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
            'groupe_id' => 'required|exists:groupes,id',
            'salle_id' => 'required|exists:salles,id',
            'formateur_id' => 'required|exists:formateurs,id',
            'date' => 'required|date',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i|after:heure_debut',
        ];
    }
}
