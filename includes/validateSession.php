<?php

if (!isset($_SESSION['user'])) {
    header('Location: Coche.php');
}