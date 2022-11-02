<?php

namespace App\Http\Requests\Quote;

use Illuminate\Foundation\Http\FormRequest;

class QuoteUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = request()->segment(2);

        return [
            'quote'         => ['required', 'min:2', 'unique:quotes,quote,'.$id],
            'author'        => ['nullable', 'min:2', 'max:191'],
        ];
    }
}
