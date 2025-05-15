<?php

// usamos la clase Core\Router
use Core\Router;

// Configura la ruta principal con el controlador HomeController y su función index
Router::get('/', 'HomeController@index');

// Rutas para los alumnos 

// Configura la ruta /alumnos con el controlador AlumnosController y su función index
Router::get('/alumnos', 'AlumnosController@index');
// Configura la ruta /alumnos/create con el controlador AlumnosController y su función create
Router::get('/alumnos/create', 'AlumnosController@create');
// Configura la ruta /alumnos/store con el controlador AlumnosController y su función store
Router::post('/alumnos/store', 'AlumnosController@store');
// Configura la ruta /alumnos/edit con el controlador AlumnosController y su función edit
Router::get('/alumnos/edit', 'AlumnosController@edit');
// Configura la ruta /alumnos/update con el controlador AlumnosController y su función update
Router::post('/alumnos/update', 'AlumnosController@update');
// Configura la ruta /alumnos/delete con el controlador AlumnosController y su función delete
Router::post('/alumnos/delete', 'AlumnosController@delete');

// Rutas para el personal 


Router::get('/personal', 'PersonalController@index');
Router::get('/personal/create', 'PersonalController@create');
Router::post('/personal/store', 'PersonalController@store');
Router::get('/personal/edit', 'PersonalController@edit');
Router::post('/personal/update', 'PersonalController@update');
Router::post('/personal/delete', 'PersonalController@delete');

// Asignamos la ruta /test para que ejecute una función directamente
Router::get('/test', function() {
    echo 'Test route';
});

Router::dispatch();
