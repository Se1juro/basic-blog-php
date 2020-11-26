<aside class="form-login" id="aside-bar">
    <div class="search-box" id="search-box">
        <form action="./search.php" method="post"  id="form-search">
            <input type="text" name="search" id="search">
            <input type="submit" class="btn-generic" value="Buscar">
        </form>
    </div>
    <?php if (isset($_SESSION['user'])): ?>
        <div class="info-user">
            <h3 class="user"><span>Bienvenido,</span>
                <?= $_SESSION['user']['nombre'] . ' ' . $_SESSION['user']['apellidos'] ?>
            </h3>
            <div class="container-buttons">
                <a href="./createEntries.php" class="btn-generic">Crear Entrada</a>
                <a href="./createCategorie.php" class="btn-generic">Crear Categoráa</a>
                <a href="./profile.php" class="btn-generic">Mi Perfil</a>
                <a href="logout.php" class="btn-generic">Cerrar Sesión</a>
            </div>
        </div>
    <?php else: ?>
        <form action="login.php" id="login_form" method="post" class="form-login__form">
            <div class="header-form">
                <h3>Iniciar Sesión</h3>
            </div>
            <?php if (isset($_SESSION['error_login'])): ?>
                <div class='alert error-alert'><?= $_SESSION['error_login']; ?> </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password">
            </div>
            <input type="submit" class="btn-generic" value="Iniciar Sesión">
        </form>
        <form action="registro.php" id="register_form" method="post" class="form-login__form">
            <div class="header-form">
                <h3>Registrarse</h3>
            </div>
            <!--Valida y muestra si el registro fue exitoso o no!-->
            <?php if (isset($_SESSION['complete'])): ?>
                <div class='alert'> <?= $_SESSION['complete']; ?></div>
            <?php elseif (isset($_SESSION['errors']['general'])): ?>
                <div class='alert error-alert'><?= $_SESSION['errors']['general']; ?> </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="user">Nombres</label>
                <input type="text" name="nombres" id="nombres">
            </div>
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'nombre') : null; ?>
            <div class="form-group">
                <label for="user">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos">
            </div>
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'apellidos') : null; ?>
            <div class="form-group">
                <label for="user">Correo Electronico</label>
                <input type="email" name="email" id="email">
            </div>
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email') : null; ?>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password">
            </div>
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'password') : null; ?>
            <input type="submit" class="btn-generic" value="Registrarse">
            <?php deleteErrors(); ?>
        </form>
    <?php endif; ?>
</aside>