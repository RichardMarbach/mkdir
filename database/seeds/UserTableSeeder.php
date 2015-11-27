<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Customer;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'admin')->first();
        $customer = Customer::create(['name' => 'test']);
        $customer->user()->save(new User(['email' => 't@t.test', 'password' => bcrypt('testing')]));

        $customer->user->assignRole($role);
    }
}
