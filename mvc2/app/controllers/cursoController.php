<?php
class cursoController
{
    public function index()
    {
        // Obtenemos los datos de los cursos de la base de datos
        $cursos = cursoModel::listar();

        // Renderizamos la vista
        return view('cursos', ['cursos' => $cursos]);
    }

    public function guardar()
    {
        // Obtenemos los datos del formulario
        $nombre = $_POST['nombre'];
        $año = $_POST['año'];

        // Guardamos los datos en la base de datos
        cursoModel::guardar($nombre, $año);

        // Redirigimos a la página principal
        return redirect('/cursos');
    }

    public function eliminar($id)
    {
        // Eliminamos el curso de la base de datos
        cursoModel::eliminar($id);

        // Eliminamos a los alumnos matriculados en el curso
        alumnoModel::eliminarAlumnos($id);

        // Redirigimos a la página principal
        return redirect('/cursos');
    }
}