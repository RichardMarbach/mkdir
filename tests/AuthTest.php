<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
  public function testRegisterPage()
  {
    $this->visit('/register')
      ->seePageIs('/register');
  }

  public function testNewUserRegistration() 
  {
    $this->visit('/register')
      ->type('test@test.com', 'email')
      ->type('testing', 'password')
      ->type('testing', 'password_confirmation')
      ->press('Register')
      ->seePageIs('/dashboard');

    $user = App\Models\User::where('email', 'test@test.com')->first();

    $this->assertTrue($user->hasRole('user'));

    $user->delete();
  }

  public function testLogin()
  {
    App\Models\User::create(['email' => 'abc@abc.com', 'password' => bcrypt('testing')]);

    $this->visit('/login')
      ->type('abc@abc.com', 'email')
      ->type('testing', 'password')
      ->press('Login')
      ->seePageIs('/dashboard');

    App\Models\User::where('email', 'abc@abc.com')->delete(); 
  }
}
