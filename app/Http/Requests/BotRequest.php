<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BotRequest extends FormRequest
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
            'message.text' => 'required|string'
        ];
    }

    public function validatedData() //NORMALIZATION FOR USER INPUT
    {
        return [
            'chat_id' => $this->input('message.chat.id'), //CHAT_ID of telegram
            'username' => $this->input('message.from.username'),//USERNAME OF telegram user
            'text' => $this->input('message.text'), // the input data
        ];
    }
}
