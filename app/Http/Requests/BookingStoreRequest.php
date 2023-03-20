<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingStoreRequest extends FormRequest
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
            'date'=> 'required|date',
            'name'=> 'required|string|max:20',
            'slot'=>'required',
            
        ];
    }

    public function messages()
    {
        return[
            'slot.required' => 'The slot field is required. If there is no option generated please choose another date'
        ];
    }
}
