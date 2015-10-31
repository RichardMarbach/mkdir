<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $fillable = ['name'];


  public function users() {
    return $this->belongsToMany(User::class)->withTimestamps();
  }

  /**
   * Get a role by role name
   * @param  string $name
   * @return App\Models\Role
   */
  public function getRole($name) {
    return $this->where('name', $name)->first();
  }
}
