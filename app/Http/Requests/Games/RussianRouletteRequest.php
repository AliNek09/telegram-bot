<?php

namespace App\Http\Requests\Games;

use Illuminate\Foundation\Http\FormRequest;

class RussianRouletteRequest extends FormRequest
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
            'message.chat.id' => 'required|integer',
            'message.from.username' => 'required|string',
            'message.number' => 'required|integer|min:0|max:10'
        ];
    }

    public function messages(): array
    {
        return [
            'message.number.integer' => 'The value should be integer',
            'message.number.min' => 'The value should be at least 0',
            'message.number.max' => 'The value should be maximum 10'
        ];
    }

    public function validateData() {
        return [
          'chat_id' => $this->input('message.chat_id'),
          'username' => $this->input('message.from.username'),
          'number' => $this->input('message.number')
        ];
    }
}
