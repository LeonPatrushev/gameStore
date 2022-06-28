<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'product_img' => ['required', 'image:jpg, jpeg, png'],
            'product_name' => ['required', 'string', 'min:3', 'max:255'],
            'product_description' =>['required','string','min:5', 'max:255'],
            'product_old_price' => ['required','numeric','min:1'],
            'product_price' => ['required','numeric','min:1'],
            'product_release_date'=> ['required','date'],
            'product_availability' =>['required','numeric'],
            'product_distributor' =>['required','numeric','min:1','max:6'],
            'product_genre' =>['required','numeric', 'min:1','max:6']
        ];
    }
}
