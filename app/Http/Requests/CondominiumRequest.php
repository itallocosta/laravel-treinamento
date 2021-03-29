<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CondominiumRequest extends FormRequest
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
            'name' => 'required|string',
            'telefone' => 'required|string',
            'endereco' => 'required|string',
            'sindico' => 'required|exists:users,id',
            'subsindico' => 'required|exists:users,id',
        ];
    }
}
