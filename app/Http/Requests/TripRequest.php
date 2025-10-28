<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'timeStart' => 'required',
            'dateReturn' => 'required|date|after_or_equal:date',
            'timeReturn' => 'required',
            'place' => 'required|string|max:255',
            'price' => ['required', 'regex:/^\d+[,.]?\d{0,2}$/'],
            'description' => 'required|string|max:1000',
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'Pole "Nazwa" jest wymagane.',
            'date.required' => 'Pole "Data wyjazdu" jest wymagane.',
            'date.date' => 'Nieprawidłowy format daty wyjazdu.',
            'dateReturn.required' => 'Pole "Data powrotu" jest wymagane.',
            'dateReturn.date' => 'Nieprawidłowy format daty powrotu.',
            'dateReturn.after_or_equal' => 'Data powrotu nie może być wcześniejsza niż data wyjazdu.',
            'timeStart.required' => 'Pole "Godzina wyjazdu" jest wymagane.',
            'timeReturn.required' => 'Pole "Godzina powrotu" jest wymagane.',
            'place.required' => 'Pole "Miejsce" jest wymagane.',
            'price.required' => 'Pole "Cena" jest wymagane.',
            'price.regex' => 'Cena musi być liczbą z maksymalnie dwoma miejscami po przecinku.',
            'description.required' => 'Pole "Opis" jest wymagane.',
        ];
    }

    public function prepareForValidation(): void {
        $this->merge([
            'price' => (float) str_replace(',', '.', $this->price),
        ]);
    }
}
