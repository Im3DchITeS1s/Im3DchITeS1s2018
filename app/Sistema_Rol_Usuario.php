<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema_Rol_Usuario extends Model
{
	protected $table = 'sistema_rol_usuario';
	protected $guarded = ['id', 'fksistema_rol', 'fkuser'];
}
