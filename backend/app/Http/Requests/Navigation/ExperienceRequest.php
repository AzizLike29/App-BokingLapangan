<?php

namespace App\Http\Requests\Navigation;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
            'name'              => ['required', 'string', 'max:255'],
            'city'              => ['required', 'string', 'max:255'],
            'district'          => ['required', 'string', 'max:255'],
            'image'             => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'open_time'         => ['required', 'date_format:H:i'],
            'close_time'        => ['required', 'date_format:H:i'],
            'field_count'       => ['required', 'integer'],
            'maps_url'          => ['required', 'string', 'max:255'],
            'contact_name'      => ['required', 'string', 'max:255'],
            'contact_whatsapp'  => ['required', 'string', 'max:255'],
            'rating'            => ['required', 'numeric', 'between:0,5'],
        ];
    }
}
