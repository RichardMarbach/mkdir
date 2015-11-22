<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use \App\Repositories\UserRepository as Users;

class AdminCustomerComposer 
{
    protected $users;

    public function __construct(Users $users) 
    {
        $this->users = $users;
    }

    public function compose(View $view)
    {
        $view->with('customers', $this->users->getAllCustomers());
    }
}