<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'Titre' => 'required|min:5',
            'Price' => 'required',
            'Categorie' => 'required|min:5',
            'Contenu' => 'required|min:5',
        ];
    }
    public function messages()
 {
 return [
        'Titre.required' => 'name is required',
        'Titre.min' => 'too short enter more',
        'Price.required' => 'price is required',
        'Categorie.required' => 'category is required',
        'Categorie.min' => 'too short enter more',
        'Contenu.required' => 'Contenu is required',
        'Contenu.min' => 'too short enter more Content',
 ];
 }
} 



