<?php

namespace App\Controllers;

use Core\View;

class HomeController
{
    public function index()
    {
        $message = 'Mensaje de prueba desde el controlador';

        // Se puede pasar un array asociativo a la vista
        // En este caso, se pasa la variable $message a la vista
        // compact('message') es una forma de crear un array asociativo
        // donde la clave es el nombre de la variable y el valor es el contenido de la variable
        // compact('message') = [ 'message' => $message ]
        View::render('home', compact('message'));
    }
}