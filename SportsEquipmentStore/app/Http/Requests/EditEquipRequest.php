<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditEquipRequest extends FormRequest
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
            'url' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O Nome do Produto é Obrigatório.',
            'url.image' => 'A Image deve ser uma imagem.',
            'url.mimes' => 'A Imagem pode ser jpeg,jpg,png,gif.',
            'url.max'=> 'A Imagem Não pode exceder 2MB.'
        ];
    }
}
