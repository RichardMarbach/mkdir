<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class HandleDvdRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'length' => 'required|integer|max:255',
            'description' => 'string',
            'price_whole' => 'required|integer|min:0',
            'price_cents' => 'required|integer|min:0|max:99',
            'late_fee_whole' => 'required|integer|min:0',
            'late_fee_cents' => 'required|integer|min:0|max:99',
            'discount' => 'required|integer|min:0|max:100',
            'age_restriction' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'cover_image' => 'image',
            'points' => 'required|integer|min:0'
        ];
    }
}
