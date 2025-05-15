<?php

namespace App\Controllers;

use Core\View;
use App\Models\Alumno;

class AlumnosController
{
    /**
     * Muestra la lista de alumnos.
     *
     * @return void
     */
    public function index()
    {
        // Cargamos el modelo Alumno y obtenemos todos los registros
        // Se usa el método all() que está definido en la clase Model
        $alumnos = (new Alumno())->all();

        // Renderizamos la vista 'alumnos/index' y le pasamos los datos de los alumnos
        View::render('alumnos/index', compact('alumnos'));
    }

    /**
     * Muestra el formulario para crear un nuevo alumno.
     *
     * @return void
     */
    public function create()
    {
        // Renderizamos la vista 'alumnos/create'
        View::render('alumnos/create');
    }

    /**
     * Almacena un nuevo alumno en la base de datos.
     *
     * @return void
     */
    public function store()
    {
        // Obtenemos los datos del formulario
        $data = $_POST;

        // Creamos una nueva instancia del modelo Alumno y guardamos los datos
        $alumno = new Alumno();
        $alumno->create($data);

        // Redirigimos a la lista de alumnos
        header('Location: /alumnos');
        exit;
    }

    /**
     * Muestra el formulario para editar un alumno existente.
     *
     * @return void
     */
    public function edit()
    {
        // Obtenemos el ID del alumno a editar
        $id = $_GET['id'] ?? null;

        // Si no se proporciona un ID, redirigimos a la lista de alumnos
        if (!$id) {
            header('Location: /alumnos');
            exit;
        }

        // Cargamos el modelo Alumno y obtenemos el registro correspondiente al ID
        $alumno = (new Alumno())->find($id);

        // Si no se encuentra el alumno, redirigimos a la lista de alumnos
        if (!$alumno) {
            header('Location: /alumnos');
            exit;
        }

        // Renderizamos la vista 'alumnos/edit' y le pasamos los datos del alumno
        View::render('alumnos/edit', compact('alumno'));
    }

    /**
     * Actualiza un alumno existente en la base de datos.
     *
     * @return void
     */
    public function update()
    {
        // Obtenemos los datos del formulario
        $data = $_POST;

        // Creamos una nueva instancia del modelo Alumno y actualizamos los datos
        $alumno = new Alumno();
        $alumno->update($data['id'], $data);

        // Redirigimos a la lista de alumnos
        header('Location: /alumnos');
        exit;
    }

    /**
     * Elimina un alumno de la base de datos.
     *
     * @return void
     */
    public function delete()
    {
        // Obtenemos el ID del alumno a eliminar
        $id = $_POST['id'] ?? null;

        // Si no se proporciona un ID, redirigimos a la lista de alumnos
        if (!$id) {
            header('Location: /alumnos');
            exit;
        }

        // Creamos una nueva instancia del modelo Alumno y eliminamos el registro correspondiente al ID
        $alumno = new Alumno();
        $alumno->delete($id);

        // Redirigimos a la lista de alumnos
        header('Location: /alumnos');
        exit;
    }
}
