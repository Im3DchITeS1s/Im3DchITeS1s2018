<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $nuevo = new User();
        $nuevo->username = 'Admin';
        $nuevo->email = 'admin@imedchi.edu.gt';
        $nuevo->password = bcrypt('secret');
        $nuevo->token = '1';
        $nuevo->fkpersona = 1;
        $nuevo->fkestado = 11;
        $nuevo->save();

        $nuevo = new User();
        $nuevo->username = 'Jose';
        $nuevo->email = 'jose@imedchi.edu.gt';
        $nuevo->password = bcrypt('secret');
        $nuevo->token = '1';
        $nuevo->fkpersona = 2;
        $nuevo->fkestado = 11;
        $nuevo->save();   

        $nuevo = new User();
        $nuevo->username = 'Alejandro';
        $nuevo->email = 'alejandro@imedchi.edu.gt';
        $nuevo->password = bcrypt('secret');
        $nuevo->token = '1';
        $nuevo->fkpersona = 3;
        $nuevo->fkestado = 11;
        $nuevo->save();                

        /*$nuevo = new User();
        $nuevo->username = 'Liliana';
        $nuevo->email = 'liliana@imedchi.edu.gt';
        $nuevo->password = bcrypt('secret');
        $nuevo->active = 1;        
        $nuevo->save();

        $nuevo = new User();
        $nuevo->username = 'Mayra';
        $nuevo->email = 'mayra@imedchi.edu.gt';
        $nuevo->password = bcrypt('secret');
        $nuevo->active = 1;        
        $nuevo->save();      

        $nuevo = new User();
        $nuevo->username = 'Mynor';
        $nuevo->email = 'mynor@imedchi.edu.gt';
        $nuevo->password = bcrypt('secret');
        $nuevo->active = 1;        
        $nuevo->save();

        $nuevo = new User();
        $nuevo->username = 'Adalberto';
        $nuevo->email = 'adalberto@imedchi.edu.gt';
        $nuevo->password = bcrypt('secret');
        $nuevo->active = 1;        
        $nuevo->save();      

        $nuevo = new User();
        $nuevo->username = 'Estuardo';
        $nuevo->email = 'estuardo@imedchi.edu.gt';
        $nuevo->password = bcrypt('secret');
        $nuevo->active = 1;        
        $nuevo->save();*/    
    }
}
