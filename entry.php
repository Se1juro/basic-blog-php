<!doctype html>
<html lang="es">
<?php
require_once './includes/conexion.php';
include_once './includes/head.php';
include_once './helpers/getData.php';
$entry = getEntry($conexion, $_GET['id']);
if (empty($entry)) {
    header('Location: index.php');
}
?>

<body>
<?php
include_once './includes/header.php'
?>
<main>
    <section class="entries">
        <h1 class="title-entries"> <?= $entry['titulo'] ?></h1>
                <article class="entries">
                    <h2 class="title-entrie"><?= $entry['Autor'] ?></h2>
                    <p class="category"><?= $entry['Categoria'] . ' | <strong>' . $entry['fecha'] . '</strong>' ?></p>
                    <p class="body-entrie">
                        <?= $entry['descripcion'] ?>
                    </p>
                </article>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $entry['usuario_id']): ?>
            <div class="container-management-entry">
                <a href="deleteEntry.php?id=<?=$entry['id']?>" class="btn-generic btn-danger">
                    Eliminar Entrada
                </a>
                <a href="editEntry.php?id=<?=$entry['id']?>" class="btn-generic">
                    Editar Entrada
                </a>
            </div>
        <?php endif;?>
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