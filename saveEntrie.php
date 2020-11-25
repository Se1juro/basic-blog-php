<?php
require_once './includes/conexion.php';
if (isset($_POST)) {
    $title = isset($_POST['titulo']) ? mysqli_real_escape_string($conexion, $_POST['titulo']) : null;
    $category = isset($_POST['categoria']) ? (int)mysqli_real_escape_string($conexion, $_POST['categoria']) : null;
    $description = isset($_POST['descripcion']) ? mysqli_real_escape_string($conexion, $_POST['descripcion']) : null;

    $errors = array();
    if (!empty($title)) {
        $title_validate = true;
    } else {
        $title_validate = false;
        $errors['titulo'] = "El título de la entrada no es valido.";
    }
    if (!empty($category) && is_numeric($category)) {
        $category_validate = true;
    } else {
        $category_validate = false;
        $errors['categoria'] = "La categoría de la entrada no es valida.";
    }
    if (!empty($description)) {
        $description_validate = true;
    } else {
        $description_validate = false;
        $errors['descripcion'] = "La descripción de la entrada no es valida.";
    }
    $user_id = $_SESSION['user']['id'];
    if (count($errors) == 0) {
        if ($_GET['edit']) {
            $entryId = $_GET['edit'];
            $query = "UPDATE entradas SET usuario_id=$user_id,categoria_id=$category,titulo='$title',descripcion='$description',fecha=curdate()
            WHERE id=$entryId and usuario_id=$user_id;";
        } else {
            $query = "Insert into entradas VALUES(null,$user_id,$category,'$title','$description',curdate());";
        }
        $insert = mysqli_query($conexion, $query);
        if ($insert) {
            if ($_GET['edit']) {
                header('Location: index.php');
            } else {
                header('Location: editEntry.php?id=' . $_GET['edit']);
            }
        }
    } else {
        $_SESSION['errors_entries'] = $errors;
        if ($_GET['edit']) {
            header('Location: editEntry.php?id=' . $_GET['edit']);
        } else {
            header('Location:createEntries.php');
        }
    }
}
