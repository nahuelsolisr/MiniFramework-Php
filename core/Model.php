<?php

namespace Core;

class Model {
    // Para poder manipular la base de datos con la conexión ya establecida
    protected $pdo;
    // Nombre de la tabla, lo definira cada modelo en particular
    protected $table;

    public function __construct() {
        // Establecemos una instancia de la base de datos, siempre va a ser una sola instancia
        $this->pdo = Database::getInstance();
    }

    // Devuelve todos los registros de la tabla
    public function all() {
        // Creamos la query hacia la tabla del modelo
        $stmt = $this->pdo->query("SELECT * FROM {$this->table}");
        // Ejecutamos la query que devuelve multiples registros
        return $stmt->fetchAll();
    }

    // Devuelve un solo registro filtrado por id
    public function find($id) {
        // Creamos la query hacia la tabla del modelo filtrano por el id
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        // Ejecutamos la query y pasamos el parametro $id
        $stmt->execute([$id]);
        // Devolvemos el resultado de la consulta que tiene un solo registro
        return $stmt->fetch();
    }

    // Agrega un registro a la tabla
    public function create($data) {
        // Obtenemos las columnas de la tabla a partir de los datos que recibimos
        // Ej. [ "nombre" => "Esteban", "apellido" => "Quito", "documento" => "37648561" ]
        // Salida: nombre, apellido, documento
        $columns = implode(", ", array_keys($data));
        // Por cada valor, asignamos ? para proteger el dato
        // Ej. [ "nombre" => "Esteban", "apellido" => "Quito", "documento" => "37648561" ]
        // Salida: ?, ?, ?
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        // Creamos un nuevo array solamente con los valores de los datos
        // Ej. [ "nombre" => "Esteban", "apellido" => "Quito", "documento" => "37648561" ]
        // Salida: ['Esteban', 'Quito', '37648561']
        $values = array_values($data);

        // Creamos la query INSERT INTO con la tabla del modelo, las columnas que recibe de los detos y el signo ? por cada valor
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} ($columns) VALUES ($placeholders)");
        // Ejecutamos la query pasandole los valores recibidos
        return $stmt->execute($values);
    }

    // Edita un registro de la tabla, recibe el id y los datos por separado
    public function update($id, $data) {
        // Obtenemos los campos de la tabla a partir de los datos que recibimos, asignamos = ?, por cada valor  
        // Ej. [ "nombre" => "Esteban", "apellido" => "Quito", "documento" => "37648561" ]
        // Salida: nombre = ?, apellido = ?, documento = ?
        $fields = implode(" = ?, ", array_keys($data)) . " = ?";


        // Creamos un nuevo array solamente con los valores de los datos
        $values = array_values($data);
        // Agregamos el id a la lista de valores dado que es lo último que se pasa a la query
        $values[] = $id;

        // Creamos la query UPDATE con la tabla del modelo, asignamos los campos y el id con valores en ?
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET $fields WHERE id = ?");
        // Ejecutamos la query pasandole los valores recibidos incluido el id
        return $stmt->execute($values);
    }

    // Elimina un registro a partir de un id
    public function delete($id) {
        // Creamos la query DELETE con la tabla del modelo, filtrando por el id
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");
        // Ejecutamos la query y le pasamos el parametro $id
        return $stmt->execute([$id]);
    }
}
