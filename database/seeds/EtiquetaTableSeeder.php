<?php

use Illuminate\Database\Seeder;
use App\Etiqueta;

class EtiquetaTableSeeder extends Seeder
{
   
    public function run()
    {
    	$insert = new Etiqueta();
        $insert->nombre = 'Click';
        $insert->tipo = 'única';
        $insert->color = 'Clouds';
    	$insert->metadata_inicio = '<div class="icheck-clouds icheck-inline"><input type="radio"';
    	$insert->idetiqueta = ' id="';
        $insert->nameetiqueta = '" name="';   	
        $insert->cierreetiqueta = '" />';
        $insert->metadata_cierra = '</div>';
    	$insert->fkestado = 5;    
        $insert->save();

    	$insert = new Etiqueta();
        $insert->nombre = 'Click';
        $insert->tipo = 'única';
        $insert->color = 'default';
    	$insert->metadata_inicio = '<div class="icheck-default icheck-inline"><input type="radio"';
    	$insert->idetiqueta = ' id="';
        $insert->nameetiqueta = '" name="';   	
        $insert->cierreetiqueta = '" />';
        $insert->metadata_cierra = '</div>';
    	$insert->fkestado = 5;
        $insert->save();

    	$insert = new Etiqueta();
        $insert->nombre = 'Click';
        $insert->tipo = 'única';
        $insert->color = 'primary';
    	$insert->metadata_inicio = '<div class="icheck-primary icheck-inline"><input type="radio"';
    	$insert->idetiqueta = ' id="';
        $insert->nameetiqueta = '" name="';    	
        $insert->cierreetiqueta = '" />';
        $insert->metadata_cierra = '</div>';
    	$insert->fkestado = 5; 
        $insert->save();

    	$insert = new Etiqueta();
        $insert->nombre = 'Click';
        $insert->tipo = 'única';
        $insert->color = 'success';
    	$insert->metadata_inicio = '<div class="icheck-success icheck-inline"><input type="radio"';
    	$insert->idetiqueta = ' id="';
        $insert->nameetiqueta = '" name="';   	
        $insert->cierreetiqueta = '" />';
        $insert->metadata_cierra = '</div>';
    	$insert->fkestado = 5; 
        $insert->save();

    	$insert = new Etiqueta();
        $insert->nombre = 'Click';
        $insert->tipo = 'única';
        $insert->color = 'info';
    	$insert->metadata_inicio = '<div class="icheck-info icheck-inline"><input type="radio"';
    	$insert->idetiqueta = ' id="';
        $insert->nameetiqueta = '" name="';  	
        $insert->cierreetiqueta = '" />';
        $insert->metadata_cierra = '</div>';
    	$insert->fkestado = 5;  
        $insert->save();

    	$insert = new Etiqueta();
        $insert->nombre = 'Click';
        $insert->tipo = 'única';
        $insert->color = 'warning';
    	$insert->metadata_inicio = '<div class="icheck-warning icheck-inline"><input type="radio"';
    	$insert->idetiqueta = ' id="';
        $insert->nameetiqueta = '" name="';   	
        $insert->cierreetiqueta = '" />';
        $insert->metadata_cierra = '</div>';
    	$insert->fkestado = 5; 
        $insert->save();

    	$insert = new Etiqueta();
        $insert->nombre = 'Click';
        $insert->tipo = 'única';
        $insert->color = 'danger';
    	$insert->metadata_inicio = '<div class="icheck-danger icheck-inline"><input type="radio"';
    	$insert->idetiqueta = ' id="';
        $insert->nameetiqueta = '" name="';  	
        $insert->cierreetiqueta = '" />';
        $insert->metadata_cierra = '</div>';
    	$insert->fkestado = 5;  
        $insert->save();

        $insert = new Etiqueta();
        $insert->nombre = 'Click';
        $insert->tipo = 'multiple';
        $insert->color = 'primary';
        $insert->metadata_inicio = '<div class="icheck-primary"><input type="checkbox"';
        $insert->idetiqueta = ' id="';
        $insert->nameetiqueta = '" name="';     
        $insert->cierreetiqueta = '" />';
        $insert->metadata_cierra = '</div>';
        $insert->fkestado = 5;    
        $insert->save();      

        //Checkbox

        $insert = new Etiqueta();
        $insert->nombre = 'Click';
        $insert->tipo = 'multiple';
        $insert->color = 'primary';
        $insert->metadata_inicio = '<div class="icheck-primary"><input type="checkbox"';
        $insert->idetiqueta = ' id="';
        $insert->nameetiqueta = '" name="';     
        $insert->cierreetiqueta = '" />';
        $insert->metadata_cierra = '</div>';
        $insert->fkestado = 5;    
        $insert->save(); 

        $insert = new Etiqueta();
        $insert->nombre = 'Click';
        $insert->tipo = 'multiple';
        $insert->color = 'Clouds';
        $insert->metadata_inicio = '<div class="icheck-primary"><input type="checkbox"';
        $insert->idetiqueta = ' id="';
        $insert->nameetiqueta = '" name="';     
        $insert->cierreetiqueta = '" />';
        $insert->metadata_cierra = '</div>';
        $insert->fkestado = 5;    
        $insert->save();

        $insert = new Etiqueta();
        $insert->nombre = 'Click';
        $insert->tipo = 'multiple';
        $insert->color = 'default';
        $insert->metadata_inicio = '<div class="icheck-primary"><input type="checkbox"';
        $insert->idetiqueta = ' id="';
        $insert->nameetiqueta = '" name="';     
        $insert->cierreetiqueta = '" />';
        $insert->metadata_cierra = '</div>';
        $insert->fkestado = 5;
        $insert->save();

        $insert = new Etiqueta();
        $insert->nombre = 'Click';
        $insert->tipo = 'multiple';
        $insert->color = 'success';
        $insert->metadata_inicio = '<div class="icheck-primary"><input type="checkbox"';
        $insert->idetiqueta = ' id="';
        $insert->nameetiqueta = '" name="';     
        $insert->cierreetiqueta = '" />';
        $insert->metadata_cierra = '</div>';
        $insert->fkestado = 5; 
        $insert->save();

        $insert = new Etiqueta();
        $insert->nombre = 'Click';
        $insert->tipo = 'multiple';
        $insert->color = 'info';
        $insert->metadata_inicio = '<div class="icheck-primary"><input type="checkbox"';
        $insert->idetiqueta = ' id="';
        $insert->nameetiqueta = '" name="';     
        $insert->cierreetiqueta = '" />';
        $insert->metadata_cierra = '</div>';
        $insert->fkestado = 5;  
        $insert->save();

        $insert = new Etiqueta();
        $insert->nombre = 'Click';
        $insert->tipo = 'multiple';
        $insert->color = 'warning';
        $insert->metadata_inicio = '<div class="icheck-primary"><input type="checkbox"';
        $insert->idetiqueta = ' id="';
        $insert->nameetiqueta = '" name="';     
        $insert->cierreetiqueta = '" />';
        $insert->metadata_cierra = '</div>';
        $insert->fkestado = 5; 
        $insert->save();

        $insert = new Etiqueta();
        $insert->nombre = 'Click';
        $insert->tipo = 'multiple';
        $insert->color = 'danger';
        $insert->metadata_inicio = '<div class="icheck-primary"><input type="checkbox"';
        $insert->idetiqueta = ' id="';
        $insert->nameetiqueta = '" name="';     
        $insert->cierreetiqueta = '" />';
        $insert->metadata_cierra = '</div>';
        $insert->fkestado = 5;  
        $insert->save();                     
        
    }
}
