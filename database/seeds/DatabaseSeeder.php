<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
    	$this->call(EstadoTableSeeder::class);
    	$this->call(TipoPersonaTableSeeder::class);
    	$this->call(GeneroTableSeeder::class);
    	$this->call(PaisDepartamentoTableSeeder::class);
    	$this->call(ProfesionTableSeeder::class);
		$this->call(PersonaTableSeeder::class);    	
    	$this->call(SistemaTableSeeder::class);
        $this->call(RolTableSeeder::class);
        $this->call(SistemaRolTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SistemaRolUserTableSeeder::class);
    }
}
