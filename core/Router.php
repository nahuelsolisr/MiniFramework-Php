<?php

namespace Core;

class Router {
    // Almacena las rutas registradas
    // Se utiliza un array multidimensional para almacenar las rutas
    private static $routes = [];

    // Registra una ruta para el método GET
    public static function get($url, $callback) {
        // Dentro de la función get, se registra la ruta en el array $routes
        // Si la ruta ya existe, se sobrescribe
        self::$routes['GET'][$url] = $callback;
    }

    // Registra una ruta para el método POST
    public static function post($url, $callback) {
        // Dentro de la función post, se registra la ruta en el array $routes
        // Si la ruta ya existe, se sobrescribe
        self::$routes['POST'][$url] = $callback;
    }

    public static function dispatch() {
        // Obtiene la URL actual solicitada
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        // Obtiene el método HTTP (GET, POST, etc.)
        $method = $_SERVER['REQUEST_METHOD'];

        // Quita el path base (si estás en una subcarpeta como /public):
        $base_path = dirname($_SERVER['SCRIPT_NAME']);
        $uri = str_replace($base_path, '', $url);
        $uri = $uri ?: '/';

        // Busca si esa ruta está registrada para ese método
        if (isset(self::$routes[$method][$uri])) {
            // Si la ruta existe, ejecuta el callback correspondiente
            $callback = self::$routes[$method][$uri];

            // Si el callback es una función, lo ejecuta directamente
            if (is_callable($callback)) {
                return call_user_func($callback);
            }

            // Si el callback es una string, se asume que es un controlador y método
            if (is_string($callback)) {
                // Separa el controlador y el método
                list($controller, $method) = explode('@', $callback);
                // Aseguramos que el controlador tenga el namespace correcto
                $controller = "App\\Controllers\\$controller";

                // Verifica si la clase existe
                if (class_exists($controller)) {
                    // Crea una instancia del controlador
                    $instance = new $controller();
                    // Llama al método correspondiente
                    return call_user_func([$instance, $method]);
                }
            }
        }

        // Si no se encuentra la ruta, devuelve un error 404
        http_response_code(404);
        echo "404 - Página no encontrada";
    }
}