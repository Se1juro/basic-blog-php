<?php
include_once './includes/conexion.php';
include_once './includes/validateSession.php';
include_once './helpers/getData.php';
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
        <h1 class="title-entries">Mi Perfil</h1>
        <form action="updateProfile.php" id="register_form" method="post" class="form-login__form categorie">
            <div class="header-form">
                <h3>Mi Perfil</h3>
            </div>
            <!--Valida y muestra si el registro fue exitoso o no!-->
            <?php if (isset($_SESSION['complete'])): ?>
                <div class='alert'> <?= $_SESSION['complete']; ?></div>
            <?php elseif (isset($_SESSION['errors']['general'])): ?>
                <div class='alert error-alert'><?= $_SESSION['errors']['general']; ?> </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="user">Nombres</label>
                <input type="text" name="nombres" id="nombres" value="<?= $_SESSION['user']['nombre'] ?>">
            </div>
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'nombre') : null; ?>
            <div class="form-group">
                <label for="user">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" value="<?= $_SESSION['user']['apellidos'] ?>">
            </div>
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'apellidos') : null; ?>
            <div class="form-group">
                <label for="user">Correo Electronico</label>
                <input type="email" name="email" id="email" value="<?= $_SESSION['user']['email'] ?>" >
            </div>
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email') : null; ?>
            <input type="submit" class="btn-generic" value="Actualizar Perfil">
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