<?php
include_once 'includes/conexion.php';
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST)) {
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conexion, $_POST['email']) : null;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conexion, $_POST['password']) : null;

    $query = "Select * from usuarios where email = '$email'";
    $login = mysqli_query($conexion, $query);
    //Cuento el numero de filas que me devuelve la consulta, en este caso seria 1
    if ($login && mysqli_num_rows($login) == 1) {
        $user = mysqli_fetch_assoc($login);
        $validatePassword = password_verify($password, $user['password']);
        if ($validatePassword) {
            unset($user['password']);
            $_SESSION['user'] = $user;
            if (isset($_SESSION['error_login'])) {
                unset($_SESSION['error_login']);
            }
        } else {
            //Las contraseñas no coinciden
            $_SESSION['error_login'] = 'Las contraseñas no coinciden, verifica bien tus datos';
        }
    } else {
        //Error
        $_SESSION['error_login'] = 'Usuario no encontrado, por favor verifica bien tus datos';
    }
}
header('Location: Coche.php');
