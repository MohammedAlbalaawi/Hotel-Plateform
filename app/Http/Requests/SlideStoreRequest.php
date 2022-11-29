<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideStoreRequest extends FormRequest
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
        return [
            'photo' => ['required','image','mimes:jpg,jpeg,png,gif,webp'],
            'heading' => ['string','nullable'],
            'text' => ['string','nullable'],
            'button_text' => ['string','nullable'],
            'button_url' => ['string','nullable'],
        ];
    }
}
