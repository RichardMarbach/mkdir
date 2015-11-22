<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Models\User;

class UserRepository
{
    private $user;
    private $customer;

    public function __construct(User $user, Customer $customer)
    {
        $this->user = $user;
        $this->customer = $customer;
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

    /** Retrieves all customers */
    public function getAllCustomers()
    {
        return $this->customer->with('user.roles', 'rentals')->get();
    }
}