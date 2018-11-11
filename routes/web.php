<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//ConfirmarResetPassword
Route::resource('/usuario/reset/password/confirmar', 'ConfirmarResetPasswordController');

//Profesion
Route::resource('/mantenimiento/profesion', 'ProfesionController');
Route::get('profesion/getdata', 'ProfesionController@getdata')->name('profesion.getdata');
Route::post('/mantenimiento/profesion/cambiarEstado', 'ProfesionController@cambiarEstado');

//TipoPersona
Route::resource('/mantenimiento/tipopersona', 'TipoPersonaController');
Route::get('tipopersona/getdata', 'TipoPersonaController@getdata')->name('tipopersona.getdata');
Route::post('/mantenimiento/tipopersona/cambiarEstado', 'TipoPersonaController@cambiarEstado');

//Genero
Route::resource('/mantenimiento/genero', 'GeneroController');
Route::get('genero/getdata', 'GeneroController@getdata')->name('genero.getdata');
Route::post('/mantenimiento/genero/cambiarEstado', 'GeneroController@cambiarEstado');

//TipoEmail
Route::resource('/mantenimiento/tipoemail', 'TipoEmailController');
Route::get('tipoemail/getdata', 'TipoEmailController@getdata')->name('tipoemail.getdata');
Route::post('/mantenimiento/tipoemail/cambiarEstado', 'TipoEmailController@cambiarEstado');


//Compania
Route::resource('/mantenimiento/compania', 'CompaniaController');
Route::get('compania/getdata', 'CompaniaController@getdata')->name('compania.getdata');
Route::post('/mantenimiento/compania/cambiarEstado', 'CompaniaController@cambiarEstado');


//Persona
Route::resource('/sistema/imedchi/persona', 'PersonaController');
Route::get('persona/getdata', 'PersonaController@getdata')->name('persona.getdata');
Route::post('/sistema/imedchi/persona/cambiarEstado', 'PersonaController@cambiarEstado');
Route::get('/sistema/imedchi/persona/droptipopersona/{id}', 'PersonaController@droptipopersona');
Route::get('/sistema/imedchi/persona/droppais/{id}', 'PersonaController@droppais');
Route::get('/sistema/imedchi/persona/droppaisdepartamento/{id}', 'PersonaController@droppaisdepartamento');
Route::get('/sistema/imedchi/persona/dropgenero/{id}', 'PersonaController@dropgenero');
Route::get('/sistema/imedchi/persona/dropestado/{id}', 'PersonaController@dropestado');
Route::get('/sistema/imedchi/persona/codigopersona/{id}', 'PersonaController@codigopersona');
Route::get('/sistema/imedchi/persona/existepersona/{id}', 'PersonaController@existepersona');

//PersonaProfesion
Route::resource('/sistema/imedchi/personaprofesion', 'PersonaProfesionController');
Route::get('/personaprofesion/getdata/{id}', 'PersonaProfesionController@getdata');
Route::post('/sistema/imedchi/personaprofesion/cambiarEstado', 'PersonaProfesionController@cambiarEstado');
Route::get('/sistema/imedchi/personaprofesion/dropprofesion/{id}', 'PersonaProfesionController@dropprofesion');

//Email
Route::resource('/sistema/imedchi/email', 'EmailController');
Route::get('/email/getdata/{id}', 'EmailController@getdata');
Route::post('/sistema/imedchi/email/cambiarEstado', 'EmailController@cambiarEstado');
Route::get('/sistema/imedchi/email/droptipoemail/{id}', 'EmailController@droptipoemail');

//Telefono
Route::resource('/sistema/imedchi/telefono', 'TelefonoController');
Route::get('/telefono/getdata/{id}', 'TelefonoController@getdata');
Route::post('/sistema/imedchi/telefono/cambiarEstado', 'TelefonoController@cambiarEstado');
Route::get('/sistema/imedchi/telefono/dropcompania/{id}', 'TelefonoController@dropcompania');

//Usuario
Route::resource('/sistema/imedchi/usuario', 'UsuarioController');
Route::get('usuario/getdata', 'UsuarioController@getdata')->name('usuario.getdata');
Route::post('/sistema/imedchi/usuario/cambiarEstado', 'UsuarioController@cambiarEstado');
Route::get('/sistema/imedchi/usuario/droppersona/{id}', 'UsuarioController@droppersona');
Route::get('/sistema/imedchi/usuario/dropemail/{id}', 'UsuarioController@dropemail');
Route::get('/sistema/imedchi/usuario/existeuser/{id}', 'UsuarioController@existeuser');

//Sistema Rol Usuario
Route::resource('/sistema/imedchi/sistemarolusuario', 'SistemaRolUsuarioController');
Route::get('/sistemarolusuario/getdata/{id}', 'SistemaRolUsuarioController@getdata');
Route::post('/sistema/imedchi/sistemarolusuario/cambiarEstado', 'SistemaRolUsuarioController@cambiarEstado');
Route::get('/sistema/imedchi/sistemarolusuario/dropsistema/{id}', 'SistemaRolUsuarioController@dropsistema');
Route::get('/sistema/imedchi/sistemarolusuario/dropsistemarol/{id}', 'SistemaRolUsuarioController@dropsistemarol');

//Curso
Route::resource('/mantenimiento/curso', 'CursoController');
Route::get('Curso/getdata', 'CursoController@getdata')->name('curso.getdata');
Route::post('/mantenimiento/curso/cambiarEstado', 'CursoController@cambiarEstado');

//Grado
Route::resource('/mantenimiento/grado', 'GradoController');
Route::get('grado/getdata', 'GradoController@getdata')->name('grado.getdata');
Route::post('/mantenimiento/grado/cambiarEstado', 'GradoController@cambiarEstado');

//Carrera
Route::resource('/mantenimiento/carrera', 'CarreraController');
Route::get('Carrera/getdata', 'CarreraController@getdata')->name('Carrera.getdata');
Route::post('/mantenimiento/carrera/cambiarEstado', 'CarreraController@cambiarEstado');

//CarreraCurso
Route::resource('/mantenimiento/carreracurso', 'CarreraCursoController');
Route::get('carreracurso/getdata', 'CarreraCursoController@getdata')->name('carreracurso.getdata');
Route::post('/mantenimiento/carreracurso/cambiarEstado', 'CarreraCursoController@cambiarEstado');
Route::get('/mantenimiento/carreracurso/dropcarrera/{id}', 'CarreraCursoController@dropcarrera');
Route::get('/mantenimiento/carreracurso/dropcurso/{id}', 'CarreraCursoController@dropcurso');
Route::get('/mantenimiento/carreracurso/dropestado/{id}', 'CarreraCursoController@dropestado');

//CarreraGrado
Route::resource('/mantenimiento/carreragrado', 'CarreraGradoController');
Route::get('carreragrado/getdata', 'CarreraGradoController@getdata')->name('carreragrado.getdata');
Route::post('/mantenimiento/carreragrado/cambiarEstado', 'CarreraGradoController@cambiarEstado');
Route::get('/mantenimiento/carreragrado/dropcarrera/{id}', 'CarreraGradoController@dropcarrera');
Route::get('/mantenimiento/carreragrado/dropgrado/{id}', 'CarreraGradoController@dropgrado');
Route::get('/mantenimiento/carreragrado/dropestado/{id}', 'CarreraGradoController@dropestado');

//CantidadAlumno
Route::resource('/mantenimiento/cantidadalumno', 'CantidadAlumnoController');
Route::get('cantidadalumno/getdata', 'CantidadAlumnoController@getdata')->name('cantidadalumno.getdata');
Route::get('/mantenimiento/cantidadalumno/dropCantidadCarreraGrado/{id}', 'CantidadAlumnoController@dropCantidadCarreraGrado');
Route::get('/mantenimiento/cantidadalumno/dropCantidadSeccion/{id}', 'CantidadAlumnoController@dropCantidadSeccion');
Route::post('/mantenimiento/cantidadalumno/cambiarEstado', 'CantidadAlumnoController@cambiarEstado');

//PeriodoAcademico
Route::resource('/mantenimiento/periodoacademico', 'PeriodoAcademicoController');
Route::get('periodoacademico/getdata', 'PeriodoAcademicoController@getdata')->name('periodoacademico.getdata');
Route::get('/mantenimiento/periodoacademico/droptiperiodo/{id}', 'PeriodoAcademicoController@droptiperiodo');
Route::post('/mantenimiento/periodoacademico/cambiarEstado', 'PeriodoAcademicoController@cambiarEstado');

//Estudiante
Route::resource('/academico/estudiante/estudiante', 'EstudianteController');
Route::get('estudiante/getdata', 'EstudianteController@getdata')->name('estudiante.getdata');

//Docente y Docente Curso
Route::resource('/academico/docente/docente', 'DocenteController');
Route::get('docente/getdata', 'DocenteController@getdata')->name('docente.getdata');

Route::resource('/academico/catedraticocurso/catedraticocurso', 'CatedraticoCursoController');
Route::get('CatedraticoCurso/getdata', 'CatedraticoCursoController@getdata')->name('CatedraticoCurso.getdata');
Route::get('/academico/catedraticocurso/dropcarreracurso/{id}', 'CatedraticoCursoController@dropcarreracurso');
Route::get('/academico/catedraticocurso/dropdocente/{id}', 'CatedraticoCursoController@dropdocente');
Route::get('/academico/catedraticocurso/dropcarreracatedratico/{id}', 'CatedraticoCursoController@dropcarreracatedratico');
Route::post('/academico/catedraticocurso/catedraticocurso/cambiarEstado', 'CatedraticoCursoController@cambiarEstado');



//Encargado y Encargado de Estudiantes
Route::resource('/academico/encargado/encargado', 'EncargadoController');
Route::get('encargado/getdata', 'EncargadoController@getdata')->name('encargado.getdata');
Route::resource('/academico/encargadoalumno/encargadoalumno', 'EncargadoAlumnoController');
Route::post('/academico/encargadoalumno/cambiarEstado', 'EncargadoAlumnoController@cambiarEstado');
Route::get('EncargadoAlumno/getdata', 'EncargadoController@getdata')->name('EncargadoAlumno.getdata');
Route::get('/academico/inscripcion/dropencargado/{id}', 'InscripcionController@dropencargado');



//Inscripcion
Route::resource('/academico/inscripcion/inscripcion', 'InscripcionController');
Route::get('inscripcion/getdata', 'InscripcionController@getdata')->name('inscripcion.getdata');
Route::get('/academico/inscripcion/dropCantidadCarreraGrado/{id}', 'InscripcionController@dropCantidadCarreraGrado');
Route::get('/academico/inscripcion/droptiperiodo/{id}', 'InscripcionController@droptiperiodo');
Route::get('/academico/inscripcion/dropestudiante/{id}', 'InscripcionController@dropestudiante');
Route::get('/academico/inscripcion/dropciclo/{id}', 'InscripcionController@dropciclo');
Route::post('/academico/inscripcion/cambiarEstado', 'InscripcionController@cambiarEstado');

//Sistema Rol Usuario
Route::resource('/sistema/imedchi/sistemarolusuario', 'SistemaRolUsuarioController');
Route::get('sistemarolusuario/getdata', 'SistemaRolUsuarioController@getdata')->name('sistemarolusuario.getdata');
Route::post('/sistema/imedchi/sistemarolusuario/cambiarEstado', 'SistemaRolUsuarioController@cambiarEstado');
Route::get('/sistema/imedchi/sistemarolusuario/dropsistema/{id}', 'SistemaRolUsuarioController@dropsistema');
Route::get('/sistema/imedchi/sistemarolusuario/dropsistemarol/{id}', 'SistemaRolUsuarioController@dropsistemarol');

//Cuestionario
Route::resource('/plataforma/blackboard/cuestionario', 'CuestionarioController');
Route::get('cuestionario/getdataCuestionarioCreado', 'CuestionarioController@getdataCuestionarioCreado')->name('cuestionario.getdataCuestionarioCreado');
Route::get('cuestionario/getdataCuestionarioEdicion', 'CuestionarioController@getdataCuestionarioEdicion')->name('cuestionario.getdataCuestionarioEdicion');
Route::get('cuestionario/getdataCuestionarioListo', 'CuestionarioController@getdataCuestionarioListo')->name('cuestionario.getdataCuestionarioListo');
Route::get('cuestionario/getdataCuestionarioPublicado', 'CuestionarioController@getdataCuestionarioPublicado')->name('cuestionario.getdataCuestionarioPublicado');
Route::get('cuestionario/getdataCuestionarioRestringido', 'CuestionarioController@getdataCuestionarioRestringido')->name('cuestionario.getdataCuestionarioRestringido');
Route::get('/plataforma/blackboard/cuestionario/contadorEstadoCuestionario/{id}', 'CuestionarioController@contadorEstadoCuestionario');
Route::post('/plataforma/blackboard/cuestionario/cambiarEstado', 'CuestionarioController@cambiarEstado');
Route::get('/plataforma/blackboard/cuestionario/dropcarreracatedratico/{id}', 'CuestionarioController@dropcarreracatedratico');
Route::get('/plataforma/blackboard/cuestionario/droptipocuestionario/{id}', 'CuestionarioController@droptipocuestionario');
Route::get('/plataforma/blackboard/cuestionario/dropperiodoacademico/{id}', 'CuestionarioController@dropperiodoacademico');
Route::get('/plataforma/blackboard/cuestionario/mostrarfecha/{id}', 'CuestionarioController@mostrarFechaPeriodoAcademico');
Route::get('/plataforma/blackboard/cuestionario/dropprioridad/{id}', 'CuestionarioController@dropprioridad');
Route::get('/plataforma/blackboard/verificar/fecha/{inicio}/{fin}/{id}', 'CuestionarioController@verificarFecha');

//Etiquetas
Route::get('/plataforma/blackboard/etiqueta/etiquetaestado/{id}', 'EtiquetaController@etiquetaestado');

//Preguntas
Route::resource('/plataforma/blackboard/pregunta', 'PreguntaController');
Route::get('/pregunta/getdata/{id}', 'PreguntaController@getdata');
Route::get('/plataforma/blackboard/pregunta/buscaretiqueta/{id}', 'PreguntaController@buscaretiqueta');
Route::post('/plataforma/blackboard/pregunta/cambiarEstado', 'PreguntaController@cambiarEstado');

//Respuestas
Route::resource('/plataforma/blackboard/respuesta', 'RespuestaController');
Route::get('/respuesta/getdata/{id}', 'RespuestaController@getdata');
Route::post('/plataforma/blackboard/respuesta/cambiarEstado', 'RespuestaController@cambiarEstado');
Route::get('/plataforma/blackboard/respuesta/valida/{id}/{tipo}/{seleccion}', 'RespuestaController@validarRespuesta');

//Producto
Route::resource('/gestionadministrativa/inventario/producto', 'ProductoController');
Route::get('producto/getdata', 'ProductoController@getdata')->name('producto.getdata');
Route::get('/gestionadministrativa/inventario/producto/dropcategoria/{id}', 'ProductoController@dropcategoria');
Route::post('/gestionadministrativa/inventario/producto/cambiarEstado', 'ProductoController@cambiarEstado');

//RespuestaBandejaCuestionario
Route::resource('/plataforma/blackboard/bandeja/responder/cuestionario', 'ResponderBandejaCuestionarioController');
Route::get('/bandeja/responder/carrera', 'ResponderBandejaCuestionarioController@getdataCarrera');
Route::get('/bandeja/responder/cuestionario/{id}', 'ResponderBandejaCuestionarioController@getdata');
Route::get('/contar/bandeja/responder/cuestionario/{id1}/{id2}', 'ResponderBandejaCuestionarioController@contadorCuestionarios');
Route::get('/mostrar/cuestionarios/seleccionados/blackboard/{id1}/{id2}', 'ResponderBandejaCuestionarioController@mostrarCuestionariosSeleccionados')->name('cuestionarios.mostrarCuestionariosSeleccionados');
Route::get('/resolver/cuestionario/seleccionado/blackboard/{id1}', 'ResponderBandejaCuestionarioController@encabezadoCuestionarioSeleccionado')->name('cuestionarios.encabezadoCuestionarioSeleccionado');
Route::get('/respuestas/de/la/preguntas/{id}', 'ResponderBandejaCuestionarioController@buscarRespuestas');
Route::get('/respuestas/por/pregunta/{id}', 'ResponderBandejaCuestionarioController@buscarRespuestasPorPregunta');

//CuestionarioPreguntasRespuestas
Route::resource('/cuestionario/pregunta/respuesta', 'AlumnoCuestionarRespuestaController');
Route::get('/cuestionarios/preguntas/respuestas/{id}', 'AlumnoCuestionarRespuestaController@cuestionariosPreguntasRespuestas');

//CuestionarioResuelto
Route::resource('/cuestionario/resuelto/alumno/nota/obtenida', 'ResultadoCuestionarioController');
Route::get('/imprimir/constancia/cuestionario/{alumno}/{cuestionario}', 'ResultadoCuestionarioController@imprimirCuestiionarioAlumno')->name('imprimir.imprimirCuestiionarioAlumno');
Route::get('/nota/cuestionario/alumno/{id}', 'ResultadoCuestionarioController@existeCuestionarioResuelto');
Route::get('/grafica/resultados/cuestionario/{id}', 'ResultadoCuestionarioController@mostrarGraficaResultado');

//CargarContenidoCatedratico
Route::resource('/plataforma/blackboard/cargar/contenido_educativo/catedratico', 'CatedraticoContenidoEducativoController');
Route::get('/plataforma/blackboard/contenido_educativo/catedratico/historico', 'CatedraticoContenidoEducativoController@index_historico')->name('contenido_educativo_catedratico.historico');
Route::get('cargar/contenido_educativo/catedratico/getdata', 'CatedraticoContenidoEducativoController@getdata')->name('contenido_educativo_catedratico.getdata');
Route::get('filtro/contenido_educativo/catedratico/{catedratico_curso}/{anio}', 'CatedraticoContenidoEducativoController@getdataFiltro')->name('contenido_educativo_catedratico.getdataFiltro');
Route::get('/cargar/contenido_educativo/catedratico/getdata/ID/{id}', 'CatedraticoContenidoEducativoController@getdataID');
Route::get('/plataforma/blackboard/cargar/dropInformacionCatedratico', 'CatedraticoContenidoEducativoController@dropInformacionCatedratico');
Route::get('/plataforma/blackboard/cargar/dropFormatoDocumento', 'CatedraticoContenidoEducativoController@dropFormato');
Route::post('/plataforma/blackboard/cargar/contenido_educativo/catedratico/cambiarEstado', 'CatedraticoContenidoEducativoController@cambiarEstado');

//CargarContenidoAlumno
Route::resource('/plataforma/blackboard/cargar/contenido_educativo/alumno', 'AlumnoContenidoEducativoController');


//Categoria
Route::resource('/gestionadministrativa/inventario/categoria', 'CategoriaController');
Route::get('categoria/getdata', 'CategoriaController@getdata')->name('categoria.getdata');
Route::post('/gestionadministrativa/inventario/categoria/cambiarEstado', 'CategoriaController@cambiarEstado');

//Stock 
Route::resource('/gestionadministrativa/inventario/stock', 'InventarioStockProductoController');
Route::get('InventarioStockProducto/getdata', 'InventarioStockProductoController@getdata')->name('stock.getdata');

//Alta Producto
Route::resource('/gestionadministrativa/inventario/altaproducto', 'AltaProductoController');
Route::get('/gestionadministrativa/inventario/altaproducto/dropproducto/{id}', 'AltaProductoController@dropProducto');
Route::get('AltaProducto/getdata', 'AltaProductoController@getdata')->name('altaproducto.getdata');

//Baja Producto
Route::resource('/gestionadministrativa/inventario/bajaproducto', 'BajaProductoController');
Route::get('/gestionadministrativa/inventario/bajaproducto/dropproducto/{id}', 'BajaProductoController@dropProducto');
Route::get('AltaProducto/getdata', 'AltaProductoController@getdata')->name('altaproducto.getdata');

// Tipo Pago 

Route::resource('/gestionadministrativa/controlpago/tipopago', 'TipoPagoController');
Route::get('TipoPago/getdata', 'TipoPagoController@getdata')->name('tipopago.getdata');
Route::post('/gestionadministrativa/controlpago/tipopago/cambiarEstado', 'TipoPagoController@cambiarEstado');

// Pago

Route::resource('/gestionadministrativa/controlpago/pago', 'PagoController');
Route::get('Pago/getdata', 'PagoController@getdata')->name('pago.getdata');
//Route::post('/gestionadministrativa/controlpago/tipopago/cambiarEstado', 'TipoPagoController@cambiarEstado');

// Cuestionarios Historicos Alumno
Route::get('/plataforma/blackboard/cuestionario/historicos/alumnohistorico', 'CuestionarioHistoricoAlumno@index')->name('alumnohistorico.index');
Route::get('get/historicos/alumnohistorico/{carrera}/{curso}/{anio}', 'CuestionarioHistoricoAlumno@getdata')->name('alumnohistorico.getdata');
Route::get('/filtrar/curso/carrera/{id}', 'CuestionarioHistoricoAlumno@dropCurso');

// Cuestionarios Historicos Catedratico
Route::get('/plataforma/blackboard/cuestionario/historicos/catedraticohistorico', 'CuestionarioHistoricoCatedratico@index')->name('catedraticohistorico.index');
Route::get('get/historicos/catedraticohistorico/{carrera}/{cuestionario}/{anio}', 'CuestionarioHistoricoCatedratico@getdata')->name('alumnohistorico.getdata');
Route::get('/filtrar/cuestionario/carrera/{id}', 'CuestionarioHistoricoCatedratico@dropCuestionario');

// Dashboard Blackboard
Route::resource('/dashboard/blackboard', 'DashboardBlackboardController');

Route::get('/500', ['as' => 'denied', function() {
	flash('¡Sin Privilegios!')->error()->important();
    return view('errores.500');
}])->middleware('auth');