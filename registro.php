<?php
require_once './includes/conexion.php';
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST)) {
    $name = isset($_POST['nombres']) ? mysqli_real_escape_string($conexion, $_POST['nombres']) : null;
    $lastname = isset($_POST['apellidos']) ? mysqli_real_escape_string($conexion, $_POST['apellidos']) : null;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conexion, $_POST['email']) : null;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conexion, $_POST['password']) : null;

    //Array de Errores
    $errors = array();

    //Validar datos antes de la BD
    if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
        $name_validate = true;
    } else {
        $name_validate = false;
        $errors['nombre'] = 'El nombre no es valido';
    }
    if (!empty($lastname) && !is_numeric($lastname) && !preg_match("/[0-9]/", $lastname)) {
        $lastname_validate = true;
    } else {
        $lastname_validate = false;
        $errors['lastname'] = 'El apellido no es valido';
    }
    if (!empty($email) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email_validate = true;
    } else {
        $email_validate = false;
        $errors['email'] = 'El email no es valido';
    }
    if (strlen($password) >= 5 && !empty($password)) {
        $password_validate = true;
    } else {
        $password_validate = false;
        $errors['password'] = 'La contraseña no es valida';
    }
    $saveUser = false;
    if (count($errors) == 0) {
        $saveUser = true;
        //Cifrar password
        $password_hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        //Si no hay datos en el array de errores insertamos en la BD
        $sql = "INSERT INTO usuarios VALUES(null,'$name','$lastname','$email','$password_hash',curdate())";
        $insert = mysqli_query($conexion, $sql);
        /*var_dump(mysqli_error($conexion));
        die();*/
        if ($insert) {
            $_SESSION['complete'] = 'El Registro ha sido exitoso';
        } else {
            $_SESSION['errors']['general'] = 'Error al tratar de registrar el usuario';
            header('Location:index.php#register_form');
        }
    } else {
        $_SESSION['errors'] = $errors;
        header('Location:index.php#register_form');
    }
}
header('Location:index.php');