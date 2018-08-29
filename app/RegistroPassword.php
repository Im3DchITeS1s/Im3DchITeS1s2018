<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroPassword extends Model
{
	protected $table = 'registro_password';
	protected $guarded = ['id', 'fkuser'];
	protected $fillable = ['password'];
}
