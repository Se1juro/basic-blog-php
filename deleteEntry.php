<?php
require_once './includes/conexion.php';
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['user']) && isset($_GET['id'])) {
    $entryId = $_GET['id'];
    $userId = $_SESSION['user']['id'];
    $sql = "DELETE FROM entradas WHERE usuario_id=$userId AND id=$entryId";
    $result = mysqli_query($conexion,$sql);
}else{
    header('Location:Coche.php');
}
header('Location:Coche.php');