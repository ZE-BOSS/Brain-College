<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Database\Eloquent\Model;

class student extends Authenticatable
{
    use Notifiable;

	protected $guard = 'admin';

	protected $fillable = [
		'name', 'username', 'password',
	];


	protected $hidden = [
		'password', 'remember_token',
	];
}
