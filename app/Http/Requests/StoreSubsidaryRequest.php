<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubsidaryRequest extends FormRequest
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
            'customer_id' => 'required',
            'alias' => 'required',
            'email' => 'required|unique:subsidiaries,email',
            'telephone' => 'required',
            'send_address' => 'required|string|min:10',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function($validator){
            if($validator->errors()->count()){
                if(!in_array($this->method(), ['PUT', 'PATCH'])){
                    $validator->errors()->add('post', true);
                }
            }
        });
    }
}
