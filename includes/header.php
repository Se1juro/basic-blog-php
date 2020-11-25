<?php
require_once './helpers/renderErrors.php';
require_once './helpers/getData.php';
$categories = getCategories($conexion);
?>
<header id="header">
    <nav class="menu">
        <h1 class="title-blog">
            <a href="./index.php">Daniel Morales</a>
        </h1>
        <figure>
            <i class="fas fa-bars"></i> <!-- uses solid style -->
        </figure>
        <ul>
            <?php if (!empty($categories)): ?>
                <?php while ($categorie = mysqli_fetch_assoc($categories)): ?>
                    <li>
                        <a href="category.php?id=<?= $categorie['id'] ?>"
                           class="item-nav"><?= $categorie['nombre'] ?></a>
                    </li>
                <?php endwhile; ?>
            <?php endif; ?>
            <li>
                <a href="" class="item-nav">Sobre mi</a>
            </li>
            <li>
                <a href="" class="item-nav">Contacto</a>
            </li>
        </ul>
        <div class="menu-user">
            <p>Menu de Usuario</p>
            <figure><i class="fas fa-ellipsis-v"></i></figure>
        </div>
    </nav>
</header>