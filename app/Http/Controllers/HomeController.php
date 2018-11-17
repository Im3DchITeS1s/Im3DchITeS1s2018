<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Persona;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $config = array();
        $config['center'] = '14.080380, -90.380628';
        $config['zoom'] = '18';
        $config['onboundschanged'] = 'if (!centreGot) {
                var mapCentre = map.getCenter();
                marker_0.setOptions({
                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
                });
            }
            centreGot = true;';

        app('map')->initialize($config);

        // set up the marker ready for positioning
        // once we know the users location
        $marker = array();
        $marker['position'] = '14.080380, -90.380628';
        app('map')->add_marker($marker);

        $map = app('map')->create_map();


        $logueado = Persona::find(Auth::user()->fkpersona);
        $mision = $this->mision();
        $vision = $this->vision();
        return view('home', compact('logueado', 'mision', 'vision', 'map'));
    }

    public function mision()
    {
        return 'Formamos Maestros y Maestras de Educación Primaria con Bachillerato en Ciencias y letras, con apego a los lineamientos del CNB-FID para desarrollar labor docente especialmente en el área surorientes de Guatemala, en el resto del país, así como también en el trabajo empresarial e industrial del país. El Bachillerato se establece como base para aquellos estudiantes que considere haberse extraviado vocacionalmente y que al finalizar el quinto grado puedan continuar estudios universitarios. Formamos mediante principios valores para brindar una educación integral. El proceso de enseñanza aprendizaje se desarrolla con metodología activa, participativa, cooperativa y propositiva para que se cimiente la base y que luego estos procesos sean aplicados en la tarea docente del egresado. En función de la reconquista de valores y actitudes humanas positivas, la formación del nuevo docente responderá a las  características de ser: guía facilitador de experiencias educativas, Modelo de ejemplo para la niñez y juventud, Orientador consejero, facilitador de la capacidad creativa, promotor del desarrollo de la comunidad suroriental de Guatemala, investigador y renovador que busca la realización, el descubrimiento la formación y proyección social y cultural.';
    }

    public function vision()
    {
        return 'El Instituto Diversificado por Cooperativa de Enseñanza de Chiquimulilla, Santa Rosa IMEDCHI es  una Institución Educativa que ofrece las carreras de Perito en Administración de Empresas, Bachillerato en Computación con Orientación Científica, Magisterio de Educación Primaria. Forma maestros y maestras de educación primaria, con los lineamientos establecidos por el Ministerio de Educación en el Currículo Nacional Base de formación de Docente inicial. En la formación académica la base se consolida con la promoción de la formación ciudadana que construya una cultura de paz sobre derechos humanos y, ante todo, con la participación de la institución como tal, la comunidad y la sociedad civil.';
    }    
}
