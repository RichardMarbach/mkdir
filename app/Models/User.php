<?php

namespace App\Models;

use App\Models\Role;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password', 'sex', 'birthdate', 'customer_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'birthdate'];

    /**
     * Converts birthdate into a Carbon instance
     * @param $value
     */
    public function setBirthdateAttribute($value) {
        $this->attributes['birthdate'] = new \Carbon\Carbon($value);
    }

    /**
     * @return mixed
     */
    public function customer() {
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * @return mixed
     */
    public function roles() 
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /**
     * Does a user have a particular role=
     * @param  $name 
     * @return boolean       
     */
    public function hasRole($name) 
    {
        foreach ($this->roles as $role) {
            if ($role->name == $name) return true;
        }
        return false;
    }

    /**
     * Assign a role to the user
     * @param  $role
     * @return mixed 
     */
    public function assignRole($role) 
    {
        return $this->roles()->attach($role);
    }

    /**
     * Remove user from role
     * @param  $role 
     * @return mixed
     */
    public function removeRole($role) 
    {
        return $this->roles()->detach($role);
    }

    /**
     * Is the user an administrator?
     * @return boolean
     */
    public function isAdmin() 
    {
        return $this->hasRole('admin');
    }
}
