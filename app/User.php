<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	protected $table="users";
    protected $fillable = ['id_user', 'name'];

    public function products()
    {
        return $this->hasMany("App\Product","id_user","id_user");
    }
}
