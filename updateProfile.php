<?php
require_once './includes/conexion.php';
if (isset($_POST)) {
    $name = isset($_POST['nombres']) ? mysqli_real_escape_string($conexion, $_POST['nombres']) : null;
    $lastname = isset($_POST['apellidos']) ? mysqli_real_escape_string($conexion, $_POST['apellidos']) : null;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conexion, $_POST['email']) : null;
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
    $saveUser = false;
    if (count($errors) == 0) {
        $saveUser = true;
        //Cifrar password
        //Si no hay datos en el array de errores insertamos en la BD
        $sql_findUser = "SELECT id, email from usuarios where email='$email'";
        $isset_email = mysqli_query($conexion, $sql_findUser);
        $isset_user = mysqli_fetch_assoc($isset_email);
        if ($isset_user['id'] == $_SESSION['user']['id'] || empty($isset_user)) {
            $sql = "UPDATE usuarios SET nombre='$name', apellidos='$lastname', email='$email'";
            $update = mysqli_query($conexion, $sql);
            if ($update) {
                $_SESSION['complete'] = 'Se ha actualizado tu perfil correctamente.';
                header('Location:profile.php');
                $_SESSION['user']['nombre'] = $name;
                $_SESSION['user']['apellidos'] = $lastname;
                $_SESSION['user']['email'] = $email;
            } else {
                $_SESSION['errors']['general'] = 'Error al tratar de actualizar el perfil';
                header('Location:profile.php');
            }
        } else {
            $_SESSION['errors']['general'] = 'Ya hay un usuario registrado con este correo.';
        }
    } else {
        $_SESSION['errors'] = $errors;
        header('Location:profile.php');
    }
}
header('Location: profile.php');