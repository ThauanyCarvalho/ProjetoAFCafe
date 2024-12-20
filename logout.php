<?php
  require_once '../PHP/validaUser.php';

spl_autoload_register(function ($class) {
    require_once "../classes/{$class}.class.php" ;
  });
  $usuario = new Usuario;

  $usuario->logout();