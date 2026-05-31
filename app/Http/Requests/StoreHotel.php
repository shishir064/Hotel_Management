<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreHotel extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
            'hotel_name' => 'required|string|max:50',
            'email' => 'required|email|unique:hotels,email',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required|string|max:255',
            'city' => 'required|string',
            'country' => 'required|string',
            'star_rating' => 'required|numeric|between:1,5',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ];
    }
}
