<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class HandleCustomerRequest extends Request
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
            'name'         => 'required|min:2',
            'address'      => 'string',
            'points'       => 'integer',
            'phone_number' => 'string' 
        ];
    }
}
