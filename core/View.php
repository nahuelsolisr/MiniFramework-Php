<?php

namespace Core;

class View {
    // Renderiza una vista
    public static function render($view, $data = []) {
        // extract convierte un array en variables
        extract($data);
        
        // Inicia el buffer de salida
        ob_start();
        // include la vista correspondiente dentro de la carpeta app/Views
        include __DIR__ . '/../app/Views/' . $view . '.php';

        // Captura el contenido del buffer y lo limpia
        $content = ob_get_clean();
        include __DIR__ . '/../app/Views/layouts/main.php'; // Include the main layout
    }
}