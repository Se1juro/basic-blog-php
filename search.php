<!doctype html>
<html lang="es">
<?php
require_once './includes/conexion.php';
include_once './includes/head.php';
include_once './helpers/getData.php';
if (isset($_POST)) {
    $search = getEntries($conexion, null, null, $_POST['search']);
} else {
    header('Location: Coche.php');
}
?>

<body>
<?php
include_once './includes/header.php'
?>
<figure class="close_button">
    <button id="close_button"><i class="fas fa-times" ></i> <!-- uses solid style -->
    </button>
</figure>
<main>
    <section class="entries">
        <h1 class="title-entries">Busqueda: <?= $_POST['search'] ?></h1>
        <?php if (!empty($search)):
            while ($entry = mysqli_fetch_assoc($search)): ?>
                <article class="entries">
                    <a href="entry.php?id=<?= $entry['id'] ?>" class="link-entrie">
                        <h2 class="title-entrie"><?= $entry['titulo'] ?></h2>
                        <p class="author">
                            <strong>
                                <?= $entry['Usuario'] ?>
                            </strong>
                        </p>
                        <p class="category"><?= $entry['Categoria'] . ' | <strong>' . $entry['fecha'] . '</strong>' ?></p>
                        <p class="body-entrie">
                            <?= substr($entry['descripcion'], 0, 250) . '... ' ?>
                            <a href="entry.php?id=<?= $entry['id'] ?>" class="read-more">Leer más</a>
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
<script src="./js/menu.js"></script>

</html>