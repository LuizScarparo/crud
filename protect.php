<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])) {
    die("Faz login antes!!!.<p><a href=\"index.php\">Entrar</a></p>");
}


?>