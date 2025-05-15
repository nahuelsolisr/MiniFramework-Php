<?php

namespace Core;

// Se define el uso de PDO y PDOException para poder utilizar las clases
use PDO;
use PDOException;

class Database {
    // Establece una única instancia de esta clase en todo el proyecto
    private static $instance = null;
    // objeto que nos permite conectarnos a la base de datos
    private $pdo;

    private function __construct() {
        try {
            // incluye la configuración con la base de datos
            $config = require __DIR__ . '/../config/database.php';
            // establece el conection string
            $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";

            // crea una conexión con la base de datos usando usuario y contraseña
            $this->pdo = new PDO($dsn, $config['username'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Genera una excepción si hay error
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Por cara registro genera un array donde la clave es el nombre del campo
            ]);

        } catch (PDOException $e) {
            // si hay error mata el proceso y no ejecuta nada más
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        // Si no existe una instancia de esta clase
        if (self::$instance === null) {
            // Genera una nueva instancia y la asigna a la propiedad estatica $instance
            self::$instance = new self();
        }

        // En caso de existir, devuelve la instancia ya creada, directamente en la propiedad $pdo
        return self::$instance->pdo;
    }
}
