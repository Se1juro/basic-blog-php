<?php
include_once './includes/conexion.php';
include_once './includes/validateSession.php';
?>
<!doctype html>
<html lang="es">
<?php
include_once './includes/head.php';
?>
<body>
<?php
include_once './includes/header.php';
?>
<figure class="close_button">
    <button id="close_button"><i class="fas fa-times" ></i> <!-- uses solid style -->
    </button>
</figure>
<main>
    <section class="createCategories">
        <h1 class="title-entries">Crear Categoría</h1>
        <form action="saveCategorie.php" method="post" id="form-categorie" class="form-login__form categorie">
            <div class="header-form">
                <h3>Crear Categoría</h3>
            </div>
            <p class="paragraph-info">Añade nuevas categorias para que los usuarios puedan usarlas en sus entradas.</p>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">
            </div>
            <input type="submit" value="Registrar Categoría" class="btn-generic">
        </form>
    </section>
    <?php
    include_once './includes/sidebar.php';
    ?>
</main>
<script src="./js/menu.js"></script>

</body>
</html>