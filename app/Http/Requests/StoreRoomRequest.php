<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'features'=>'required',
            'features.*'=>'exists:features,id',
            'description'=>'required|min:20',
            'price'=>'required',
            'photos'=>'required',
            'photos.*'=>'file|mimes:jpg,png|max:5000',
            'feature_image'=>'required|file|mimes:jpg,png|max:5000',
        ];
    }

    public function messages()
    {
        return [
            "name.required"=>"ခေါင်းစဥ်ထည့်လေ",
            "photos.required"=>"ပုံထည့်လေ ကွာ"
        ];
    }
}
