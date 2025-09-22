<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrosLlamadaRequest extends FormRequest
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
			'id_persona' => 'required',
			'id_estado' => 'required',
			'fecha_contacto' => 'required',
			'hora_contacto' => 'required',
			'atendio_llamada' => 'required|string',
			'observaciones' => 'required|string',
        ];
    }
}
