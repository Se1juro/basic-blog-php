<?php
include_once './includes/conexion.php';
include_once './includes/validateSession.php';
include_once './helpers/getData.php';
$entry = getEntry($conexion, $_GET['id']);
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
        <h1 class="title-entries">Editar Entrada</h1>
        <form action="saveEntrie.php?edit=<?= $entry['id'] ?>" method="post" id="form-categorie"
              class="form-login__form categorie">
            <div class="header-form">
                <h3>Editar Entrada</h3>
            </div>
            <p class="paragraph-info">Editar Entrada <strong><?= $entry['titulo'] ?></strong></p>
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" value="<?= $entry['titulo'] ?>">
            </div>
            <?php echo isset($_SESSION['errors_entries']) ? showError($_SESSION['errors_entries'], 'titulo') : null; ?>
            <div class="form-group">
                <label for="categoria">Categorias</label>
                <select name="categoria" id="categoria" value="<?= $entry['titulo'] ?>">
                    <?php
                    $categories = getCategories($conexion);
                    if (!empty($categories)):
                        while ($category = mysqli_fetch_assoc($categories)): ?>
                            <option value="<?= $category['id'] ?>"
                                <?= $category['id'] == $entry['categoria_id'] ? "selected='selected'" : null ?>
                            >
                                <?= $category['nombre'] ?>
                            </option>
                        <?php endwhile; endif; ?>
                </select>
            </div>
            <?php echo isset($_SESSION['errors_entries']) ? showError($_SESSION['errors_entries'], 'categoria') : null; ?>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10">
                    <?= $entry['descripcion'] ?>
                </textarea>
            </div>
            <?php echo isset($_SESSION['errors_entries']) ? showError($_SESSION['errors_entries'], 'descripcion') : null; ?>
            <input type="submit" value="Actualizar Entrada" class="btn-generic">
            <?php deleteErrors(); ?>
        </form>
    </section>
    <?php
    include_once './includes/sidebar.php';
    ?>
</main>
<script src="./js/menu.js"></script>

</body>
</html>