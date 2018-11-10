<?php

use Illuminate\Database\Seeder;
use App\Formato_Documento;

class FormatoDocumentoTablaSeeder extends Seeder
{
    public function run()
    {
        $insert = new Formato_Documento();
        $insert->formato = 'PDF';
        $insert->icono = 'fa fa-file-pdf-o';
        $insert->save();

        $insert = new Formato_Documento();
        $insert->formato = 'Excel';
        $insert->icono = 'fa fa-file-excel-o';
        $insert->save();

        $insert = new Formato_Documento();
        $insert->formato = 'Word';
        $insert->icono = 'fa fa-file-word-o';
        $insert->save();    

        $insert = new Formato_Documento();
        $insert->formato = 'Power Point';
        $insert->icono = 'fa fa-file-powerpoint-o ';
        $insert->save();                            
    }
}
