<?php

namespace App\Http\Requests\Navigation;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            'full_name' => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255'],
            'subject'   => ['required', 'string', 'max:255'],
            'message'   => ['required', 'string', 'min:15']
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required'    => 'Nama lengkap wajib diisi.',
            'email.required'        => 'Email wajib diisi.',
            'email.email'           => 'Masukkan alamat email yang valid.',
            'subject.required'      => 'Subjek wajib diisi.',
            'message.required'      => 'Pesan wajib diisi.',
            'message.min'           => 'Pesan minimal 10 karakter.'
        ];
    }
}
