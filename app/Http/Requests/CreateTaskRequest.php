<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
            'title' => 'required|string|min:3',
            'description' => 'nullable|string|max:500',
            'due_date' => 'required|date|after_or_equal:today',
            'category_id' => 'required|exists:categories,id', 
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Titlul este obligatoriu',
            'title.min' => 'Titlul trebuie să aibă cel puțin 3 caractere',
            'description.max' => 'Descrierea poate avea maxim 500 de caractere',
            'due_date.required' => 'Data limită este obligatorie',
            'due_date.after_or_equal' => 'Data limită trebuie să fie cel puțin astăzi',
            'category_id.required' => 'Categoria este obligatorie',
            'category_id.exists' => 'Categoria selectată nu există',
        ];
    }
}
