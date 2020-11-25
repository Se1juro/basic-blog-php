<?php
//Conexion
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'blog';
$conexion = mysqli_connect($host, $user, $password, $database);
mysqli_query($conexion, "SET NAMES 'utf8'");

//INICIAR LA SESION
if (!isset($_SESSION)) {
    session_start();
}