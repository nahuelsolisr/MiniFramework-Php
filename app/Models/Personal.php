<?php

namespace App\Models;

use Core\Model;

// Se extiende de la clase Model para obtener todas sus funciones 
class Personal extends Model {
    // Establecemos que este modelo administra la tabla alumnos
    protected $table = "personal";
}
