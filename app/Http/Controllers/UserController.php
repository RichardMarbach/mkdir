<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Customer;
use App\Models\User;
use App\Http\Requests\HandleUserRequest;

class UserController extends Controller
{
 
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HandleUserRequest $request, $userId)
    {
        $user = $this->user->findOrFail($userId);

        $user->update($request->input());
        $user->customer()->update($request->input());

        return back()->with('success', 'Saved!');
    }
}
