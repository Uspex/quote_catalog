<?php

namespace App\Http\Requests\Quote;

use Illuminate\Foundation\Http\FormRequest;

class QuoteCreateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'quote'         => ['required', 'min:2', 'unique:quotes,quote'],
            'author'        => ['nullable', 'min:2', 'max:191'],
        ];
    }
}
