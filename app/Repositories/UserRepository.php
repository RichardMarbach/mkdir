<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(User $user)
    {
        return $user->with('customer.rentals')->find($user->id);   
    }
}