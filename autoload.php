<?php

spl_autoload_register(function ($class) {
    // Convertir namespace a ruta de archivo
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

    // Verificar si el archivo existe y cargarlo con require_once
    if (file_exists($file)) {
        require_once $file;
    }
});