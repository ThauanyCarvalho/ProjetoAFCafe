<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

spl_autoload_register(function ($class) {
    require_once("../classes/{$class}.class.php");
});

$usuario = new Usuario;

if ($usuario->sessaoExpirou()) {
    header("Location: login.php?session_expired=true");
    exit;
}

if (!isset($_SESSION['user_name'])) {
    // Salva a URL atual
    $current_page = urlencode($_SERVER['REQUEST_URI']);
    header("Location: login.php?redirect=$current_page");
    exit();
}