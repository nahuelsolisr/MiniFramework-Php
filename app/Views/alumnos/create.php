<div class="container my-5">
    <h1>Agregar Alumno</h1>

    <!-- Formulario para agregar un nuevo alumno -->
    <!-- El formulario se envía mediante POST a la ruta '/alumnos/store' -->
    <form action="/alumnos/store" method="post">
        <div class="row mb-3">
            <div class="col-md-6 mb-3">
                <!-- Campo para el nombre del alumno -->
                <!-- Se utiliza el atributo 'required' para hacer que el campo sea obligatorio -->
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="col-md-6 mb-3">
                <!-- Campo para el apellido del alumno -->
                <!-- Se utiliza el atributo 'required' para hacer que el campo sea obligatorio -->
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6 mb-3">
                <!-- Campo para el documento del alumno -->
                <!-- Se utiliza el atributo 'required' para hacer que el campo sea obligatorio -->
                <label for="documento" class="form-label">Documento</label>
                <input type="text" class="form-control" id="documento" name="documento" required>
            </div>
            <div class="col-md-6 mb-3">
                <!-- Campo para la fecha de nacimiento del alumno -->
                <!-- Se utiliza el atributo 'required' para hacer que el campo sea obligatorio -->
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
        </div>
        <div class="mb-3 text-end">
            <!-- Botones para cancelar o guardar el formulario -->
            <!-- El botón de cancelar redirige a la lista de alumnos -->
            <a href="/alumnos" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
