<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'business_name' => ['required', 'string', 'unique:customers'],
            'rfc' => ['required', 'string', 'unique:customers'],
            'zipcode' => ['required'],
            'colony' => ['required', 'string'],
            'street' => ['required', 'string'],
            'out_number' => ['required'],
            'int_number' => ['string'],
            'city' => ['required', 'string'],
            'locally' => ['required', 'string'],
            'state' => ['required', 'string'],
            'country' => ['required', 'string'],
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
