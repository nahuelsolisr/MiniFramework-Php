<div class="container my-5">
  <h1>Lista de Personal</h1>

  <!-- Enlace para agregar un nuevo alumno -->
  <div class="row my-3">
    <div class="col text-end"><a href="/personal/create" class="btn btn-success">Agregar</a></div>
  </div>

  <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Legajo</th>
        <th>Cargo </th>
        <th>Tramo Pedagogico</th>
        <th>Fecha Ingreso</th>
        <th>Fecha Egreso</th>
      </tr>
    </thead>
    <tbody>
      <!-- Iteramos sobre la lista de alumnos y mostramos sus datos en la tabla -->
      <!-- Cada fila contiene los datos de un alumno y botones para editar o eliminar -->
      <?php foreach ($personal as $person): ?>
        <tr>
          <td><?= $person['id'] ?></td>
          <td><?= $person['nombre'] ?></td>
          <td><?= $person['apellido'] ?></td>
          <td><?= $person['legajo'] ?></td>
          <td><?= $person['cargo'] ?></td>
          <td><?= $person['tramo_pedagogico'] ?></td>
          <td><?= $person['fecha_ingreso'] ?></td>
          <td><?= $person['fecha_egreso'] ?></td>
          <td class="text-end">
            <!-- Botones para editar y eliminar el personal -->
            <a href="/personal/edit?id=<?= $person['id'] ?>" class="btn btn-warning">Editar</a>

            <!-- Formulario para eliminar el alumno -->
            <!-- El formulario se envía mediante POST para eliminar el alumno -->
            <!-- Se utiliza un botón de confirmación para evitar eliminaciones accidentales -->
            <form action="/personal/delete" method="post" class="d-inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este alumno?');">
              <input type="hidden" name="id" value="<?= $person['id'] ?>">
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
