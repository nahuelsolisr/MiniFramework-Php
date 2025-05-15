<?php

namespace App\Controllers;

use Core\View;
use App\Models\Personal;

class PersonalController
{
     /**
     * Muestra  lista de personal.
     *
     * @return void
     */
    public function index()
    {
        
        $personal = (new Personal())->all();
        View::render('personal/index', compact('personal'));
    }
     /**
     * Muestra el formulario para crear  personal.
     *
     * @return void
     */
    public function create()
    {
        View::render('personal/create');
    }
     /**
     * Almacena un nuevo personal en la base de datos.
     *
     * @return void
     */
    public function store()
    {
        $data = $_POST;
        $personal = new Personal();
        $personal->create($data);
        header('Location: /personal');
        exit;
    }

    /**
     * Muestra el formulario para editar un personal existente.
     *
     * @return void
     */
    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: /personal');
            exit;
        }
        $personal = (new Personal())->find($id);

        if (!$personal) {
            header('Location: /personal');
            exit;
        }

        View::render('personal/edit', compact('personal'));
    }

      /**
     * Actualiza un personal existente en la base de datos.
     *
     * @return void
     */
    public function update()
    {

        $data = $_POST;
        $personal = new Personal();
        $personal->update($data['id'], $data);


        header('Location: /personal');
        exit;
    }

     /**
     * Elimina personal de la base de datos.
     *
     * @return void
     */
    public function delete()
    {

        $id = $_POST['id'] ?? null;
        if (!$id) {
            header('Location: /personal');
            exit;
        }
        $personal = new Personal();
        $personal->delete($id);
        header('Location: /personal');
        exit;
    }
}


