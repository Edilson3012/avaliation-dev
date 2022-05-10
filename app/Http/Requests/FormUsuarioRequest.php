<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormUsuarioRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|min:3|max:15',
            'birthday' => 'required',
            'image' => 'required|image|max:2048|mimes:jpeg,png,jpg',
        ];

        if($this->method() == 'PUT'){
            $rules['image'] = 'nullable|image';
        }

        return $rules;
    }

    public function messages()
    {
        $name = [
            'name' => 'Nome',
            'birthday' => 'Data de Nascimento',
            'image' => 'Imagem',
        ];

        return [
            "name.required" => "Campo de " . $name['name'] . " é obrigatório.",
            "name.min" => "Campo " . $name['name'] . " deve ter no mínimo :min caracteres.",
            "name.max" => "Campo " . $name['name'] . " deve ter no máximo :max caracteres.",
            "birthday.required" => "Campo de " . $name['birthday'] . " é obrigatório.",
            "image.required" => "Campo de " . $name['image'] . " é obrigatório.",
            "image.image" => "Campo de " . $name['image'] . " deve ser uma imagem.",
            "image.mimes" => "Campo de " . $name['image'] . " deve ser na extensão: jpeg, png, jpg.",
        ];
    }
}
