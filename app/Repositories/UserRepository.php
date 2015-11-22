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

    /**
     * Retrieves specified user from database
     * @param  User   $user
     * @return Collection 
     */
    public function getUser(User $user)
    {
        return $user->with('customer.rentals', 'roles')->find($user->id);   
    }

    /**
     * Retrieves all the users from the database
     * @return Collection
     */
    public function getAllUsers()
    {
        return $this->user->with('customer.rentals', 'roles')->get();
    }
}