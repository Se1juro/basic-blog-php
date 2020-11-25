<?php
function showError($errors, $field)
{
    $alert = '';
    if (isset($errors[$field]) && !empty($field)) {
        $alert = "<div class='alert error-alert'>$errors[$field]</div>";
    }
    return $alert;
}

function deleteErrors()
{
    if (isset($_SESSION['error_login'])) {
        $_SESSION['error_login'] = null;
        unset($_SESSION['error_login']);
    }
    if (isset($_SESSION['errors'])) {
        $_SESSION['errors'] = null;
        unset($_SESSION['errors']);
    }
    if (isset($_SESSION['complete'])) {
        $_SESSION['complete'] = null;
        unset($_SESSION['complete']);
    }
    if(isset($_SESSION['errors_entries'])){
        unset($_SESSION['errors_entries']);
    }
    return $_SESSION;
}