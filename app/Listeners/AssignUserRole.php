<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\Role;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AssignUserRole
{

    private $roles;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Role $roles)
    {
        $this->roles = $roles;
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $role = $this->roles->getRole('user');

        $event->user->assignRole($role);
    }
}
