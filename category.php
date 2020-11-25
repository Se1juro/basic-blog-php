<!doctype html>
<html lang="es">
<?php
require_once './includes/conexion.php';
include_once './includes/head.php';
include_once './helpers/getData.php';
$entries = getEntries($conexion, null, $_GET['id']);
$category = getCategory($conexion, $_GET['id']);
if (empty($category)) {
    header('Location: index.php');
}
?>

<body>
<?php
include_once './includes/header.php'
?>
<main>
    <section class="entries">
        <h1 class="title-entries">Entradas de <?= $category['nombre'] ?></h1>
        <?php if (!empty($entries) && mysqli_num_rows($entries) >= 1):
            while ($entrie = mysqli_fetch_assoc($entries)): ?>

                <article class="entries">
                    <a href="entry.php?id=<?= $entrie['id'] ?>" class="link-entrie">
                        <h2 class="title-entrie"><?= $entrie['titulo'] ?></h2>

                        <p class="author">
                            <strong>
                                <?= $entrie['Usuario'] ?>
                            </strong>
                        </p>
                        <p class="category"><?= $entrie['Categoria'] . ' | <strong>' . $entrie['fecha'] . '</strong>' ?></p>
                        <p class="body-entrie">
                            <?= substr($entrie['descripcion'], 0, 250) . '... ' ?>
                            <a href="entry.php?id=<?= $entrie['id'] ?>" class="read-more">Leer más</a>
                        </p>
                    </a>
                </article>

            <?php
            endwhile;
        else:
            ?>
            <div class='alert error-alert'>No hay entradas en esta categoría.</div>
        <?php endif; ?>
    </section>
    <?php include_once './includes/sidebar.php' ?>
</main>
<?php include_once './includes/footer.php' ?>
</body>
<script>
    window.onscroll = function () {
        addStickyHeader()
    };

    let header = document.getElementById("header");

    let sticky = header.offsetTop;

    function addStickyHeader() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>
</html>