<?php
session_start();

$_SESSION['carrinho'] = array();

header('Location: mercado.php?id=1');
exit();
?>
