<div class="container my-5">
    <h1>Agregar Personal</h1>

    <!-- Formulario para agregar un nuevo alumno -->
    <!-- El formulario se envía mediante POST a la ruta '/alumnos/store' -->
    <form action="/personal/store" method="post">
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
                 <label for="legajo" class="form-label">Legajo</label>
                <input type="text" class="form-control" id="legajo" name="legajo" required>
            </div>
            <div class="col-md-6 mb-3">
                <!-- Campo para la fecha de nacimiento del alumno -->
                <!-- Se utiliza el atributo 'required' para hacer que el campo sea obligatorio -->
                 <label for="cargo" class="form-label">Cargo</label>
                <input type="text" class="form-control" id="cargo" name="cargo" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6 mb-3">
                <!-- Campo para el nombre del alumno -->
                <!-- Se utiliza el atributo 'required' para hacer que el campo sea obligatorio -->
                <label for="tramo_pedagogico" class="form-label">Tramo Pedagogico</label>
                <input type="tinytin" class="form-control" id="tramo_pedagogico" name="tramo_pedagogico" required>
            </div>
            <div class="col-md-6 mb-3">
                <!-- Campo para el apellido del alumno -->
                <!-- Se utiliza el atributo 'required' para hacer que el campo sea obligatorio -->
                <label for="fecha_ingreso" class="form-label">Fecha Ingreso</label>
                <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" required>
            </div>
            <div class="col-md-6 mb-3">
                <!-- Campo para el apellido del alumno -->
                <!-- Se utiliza el atributo 'required' para hacer que el campo sea obligatorio -->
                <label for="fecha_egreso" class="form-label">Fecha Egreso</label>
                <input type="date" class="form-control" id="fecha_egreso" name="fecha_egreso" required>
            </div>
        </div>
        <div class="mb-3 text-end">
            <!-- Botones para cancelar o guardar el formulario -->
            <!-- El botón de cancelar redirige a la lista de alumnos -->
            <a href="/personal" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

    </form>
</div>
