<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $nuevo = new User();
        $nuevo->username = 'SoporteSistema';
        $nuevo->email = 'soportesistema@imedchi.edu.gt';
        $nuevo->password = bcrypt('S0p0rt3S1stEm4');
        $nuevo->token = '1';
        $nuevo->fkpersona = 1;
        $nuevo->fkestado = 11;
        $nuevo->save();
    }
}
