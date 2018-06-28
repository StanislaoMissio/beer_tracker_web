<?php

require_once('init.php');

    session_start();

    unset($_SESSION['logged_in']);
    unset($_SESSION['user_id'] :: $user['cod_usuario']);
    unset($_SESSION['user_name'] :: $user['nome_usuario']);
    session_destroy();

    header("Location: ../login.php");
?>