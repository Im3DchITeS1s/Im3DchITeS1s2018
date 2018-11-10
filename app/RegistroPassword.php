<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class RegistroPassword extends Model
{
	protected $table = 'registro_password';
	protected $guarded = ['id', 'fkuser'];
	protected $fillable = ['password'];

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('registropassword.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('registropassword.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('registropassword.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('registropassword.deleted', $data);
	    });

	}	
}
