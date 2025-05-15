<div class="container my-5">
  <h1>Lista de Alumnos</h1>

  <!-- Enlace para agregar un nuevo alumno -->
  <div class="row my-3">
    <div class="col text-end"><a href="/alumnos/create" class="btn btn-success">Agregar</a></div>
  </div>

  <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Documento</th>
        <th>Fecha de nacimiento</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <!-- Iteramos sobre la lista de alumnos y mostramos sus datos en la tabla -->
      <!-- Cada fila contiene los datos de un alumno y botones para editar o eliminar -->
      <?php foreach ($alumnos as $alumno): ?>
        <tr>
          <td><?= $alumno['id'] ?></td>
          <td><?= $alumno['nombre'] ?></td>
          <td><?= $alumno['apellido'] ?></td>
          <td><?= $alumno['documento'] ?></td>
          <td><?= $alumno['fecha_nacimiento'] ?></td>
          <td class="text-end">
            <!-- Botones para editar y eliminar el alumno -->
            <a href="/alumnos/edit?id=<?= $alumno['id'] ?>" class="btn btn-warning">Editar</a>

            <!-- Formulario para eliminar el alumno -->
            <!-- El formulario se envía mediante POST para eliminar el alumno -->
            <!-- Se utiliza un botón de confirmación para evitar eliminaciones accidentales -->
            <form action="/alumnos/delete" method="post" class="d-inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este alumno?');">
              <input type="hidden" name="id" value="<?= $alumno['id'] ?>">
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
