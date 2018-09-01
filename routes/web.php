<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Profesion
Route::resource('/mantenimiento/profesion', 'ProfesionController');
Route::get('profesion/getdata', 'ProfesionController@getdata')->name('profesion.getdata');
Route::post('/mantenimiento/profesion/cambiarEstado', 'ProfesionController@cambiarEstado');
Route::get('/mantenimiento/profesion/dropestado/{id}', 'ProfesionController@dropestado');

//TipoPersona
Route::resource('/mantenimiento/tipopersona', 'TipoPersonaController');
Route::get('tipopersona/getdata', 'TipoPersonaController@getdata')->name('tipopersona.getdata');
Route::post('/mantenimiento/tipopersona/cambiarEstado', 'TipoPersonaController@cambiarEstado');
Route::get('/mantenimiento/tipopersona/dropestado/{id}', 'TipoPersonaController@dropestado');

//Genero
Route::resource('/mantenimiento/genero', 'GeneroController');
Route::get('genero/getdata', 'GeneroController@getdata')->name('genero.getdata');
Route::post('/mantenimiento/genero/cambiarEstado', 'GeneroController@cambiarEstado');
Route::get('/mantenimiento/genero/dropestado/{id}', 'GeneroController@dropestado');

//TipoEmail
Route::resource('/mantenimiento/tipoemail', 'TipoEmailController');
Route::get('tipoemail/getdata', 'TipoEmailController@getdata')->name('tipoemail.getdata');
Route::post('/mantenimiento/tipoemail/cambiarEstado', 'TipoEmailController@cambiarEstado');
Route::get('/mantenimiento/tipoemail/dropestado/{id}', 'TipoEmailController@dropestado');

//TipoEmail
Route::resource('/mantenimiento/compania', 'CompaniaController');
Route::get('compania/getdata', 'CompaniaController@getdata')->name('compania.getdata');
Route::post('/mantenimiento/compania/cambiarEstado', 'CompaniaController@cambiarEstado');
Route::get('/mantenimiento/compania/dropestado/{id}', 'CompaniaController@dropestado');

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
Route::get('sistemarolusuario/getdata', 'SistemaRolUsuarioController@getdata')->name('sistemarolusuario.getdata');
Route::post('/sistema/imedchi/sistemarolusuario/cambiarEstado', 'SistemaRolUsuarioController@cambiarEstado');
Route::get('/sistema/imedchi/sistemarolusuario/dropsistema/{id}', 'SistemaRolUsuarioController@dropsistema');
Route::get('/sistema/imedchi/sistemarolusuario/dropsistemarol/{id}', 'SistemaRolUsuarioController@dropsistemarol');

//Curso
Route::resource('/mantenimiento/curso', 'CursoController');
Route::get('Curso/getdata', 'CursoController@getdata')->name('Curso.getdata');
Route::post('/mantenimiento/curso/cambiarEstado', 'CursoController@cambiarEstado');
Route::get('/mantenimiento/curso/dropestado/{id}', 'CursoController@dropestado');

//Grado
Route::resource('/mantenimiento/grado', 'GradoController');
Route::get('Grado/getdata', 'GradoController@getdata')->name('Grado.getdata');
Route::post('/mantenimiento/grado/cambiarEstado', 'GradoController@cambiarEstado');
Route::get('/mantenimiento/grado/dropestado/{id}', 'GradoController@dropestado');

//Carrera
Route::resource('/mantenimiento/carrera', 'CarreraController');
Route::get('Carrera/getdata', 'CarreraController@getdata')->name('Carrera.getdata');
Route::post('/mantenimiento/carrera/cambiarEstado', 'CarreraController@cambiarEstado');
Route::get('/mantenimiento/carrera/dropestado/{id}', 'CarreraController@dropestado');

//Genero
Route::resource('/plataforma/blackboard/cuestionario', 'CuestionarioController');