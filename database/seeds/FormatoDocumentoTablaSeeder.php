<?php

use Illuminate\Database\Seeder;
use App\Formato_Documento;

class FormatoDocumentoTablaSeeder extends Seeder
{
    public function run()
    {
        $insert = new Formato_Documento();
        $insert->formato = 'PDF';
        $insert->save();

        $insert = new Formato_Documento();
        $insert->formato = 'Excel';
        $insert->save();

        $insert = new Formato_Documento();
        $insert->formato = 'Word';
        $insert->save();    

        $insert = new Formato_Documento();
        $insert->formato = 'Power Point';
        $insert->save();                            
    }
}
