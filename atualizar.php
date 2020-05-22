<?php
include "usuarios.php";
$v_usuario = new usuarios();
$v_usuario->setNome($_POST['nome']);
$v_usuario->setEmail($_POST['email']);
$v_usuario->update($_POST['id']);
header("Location: cadastro.php");
?>