<?php
require_once './includes/conexion.php';
if (isset($_POST)) {
    $name = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : null;
    $errors = array();
    if (!empty($name) && !is_numeric($name)) {
        $name_validate = true;
    } else {
        $name_validate = false;
        $errors['name'] = "El nombre de la categoría no es valido";
    }
    if (count($errors) == 0) {
        $query = "Insert into categorias VALUES(null,'$name');";
        $insert = mysqli_query($conexion, $query);
    }
}
header('Location:Coche.php');