<?php
function getCategories($conexion)
{
    $query = "Select * from categorias order by id ASC";
    $categories = mysqli_query($conexion, $query);
    $result = array();
    if ($categories && mysqli_num_rows($categories) >= 1) {
        $result = $categories;
    }
    return $result;
}

function getEntries($conexion, $limit = null, $category = null, $search = null)
{
    $query = "Select e.id, c.nombre as 'Categoria', concat(u.nombre,' ',u.apellidos) as 'Usuario' , 
       e.titulo, e.descripcion,e.fecha from entradas e INNER JOIN categorias c on e.categoria_id=c.id 
           INNER JOIN usuarios u on e.usuario_id=u.id ";
    if (!empty($category)) {
        $query .= "WHERE e.categoria_id=$category ";
    }
    if (!empty($search)) {
        $query .= "WHERE e.titulo LIKE '%$search%' OR e.descripcion LIKE '%$search%' OR u.nombre LIKE '%$search%' OR
        u.apellidos LIKE '%$search%' OR c.nombre LIKE '%$search%'";
    }
    if ($limit != null) {
        $query .= 'LIMIT 5 ';
    }
    $entries = mysqli_query($conexion, $query);
    $result = array();
    if ($entries && mysqli_num_rows($entries) >= 1) {
        $result = $entries;
    }
    return $result;
}

function getCategory($conexion, $id)
{
    $query = "SELECT * from categorias where id=$id";
    $category = mysqli_query($conexion, $query);
    $result = array();
    if ($category && mysqli_num_rows($category) == 1) {
        $result = mysqli_fetch_assoc($category);
    }
    return $result;
}

function getEntry($conexion, $id)
{
    $query = "SELECT e.id, c.nombre as 'Categoria', e.categoria_id, concat(u.nombre, ' ',u.apellidos) as 'Autor', u.id as 'usuario_id', e.titulo, e.descripcion, e.fecha 
                from entradas e INNER JOIN categorias c ON e.categoria_id=c.id INNER JOIN usuarios u ON u.id=e.usuario_id where e.id=$id";
    $entry = mysqli_query($conexion, $query);
    $result = array();
    if ($entry && mysqli_num_rows($entry) == 1) {
        $result = mysqli_fetch_assoc($entry);
    }
    return $result;
}