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

        //Gestion Academica
        $this->call(CarreraTableSeeder::class);
        $this->call(CursoTableSeeder::class);
        $this->call(GradoTableSeeder::class);
        $this->call(SeccionTableSeeder::class);
        $this->call(CarreraCursoTableSeeder::class);
        $this->call(CarreraGradoTableSeeder::class);
        $this->call(CantidadAlumnoTableSeeder::class);
        $this->call(CatedraticoCursoTableSeeder::class); 
        $this->call(TipoPeriodoTableSeeder::class); 
        $this->call(PeriodoAcademicoTableSeeder::class);

        //Blackboard
        $this->call(PrioridadTableSeeder::class); 
        $this->call(TipoCuestionarioTableSeeder::class);

        //Gestion Administrativa 
         $this->call(MesTableSeeder::class); 
    }
}
