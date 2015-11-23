<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use Gate;

class HandleUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('update-user', $this->route('userId'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'sex' => 'required|boolean',
            'birthdate' => 'required|date|before:' . \Carbon\Carbon::now(),
            'email' => 'required|email|max:255|unique:users,email,' . Auth::user()->id
        ];
    }

    public $messages = [
        'birthdate.before' => 'You were born in the future?',
    ];
}
