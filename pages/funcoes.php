<?php
session_start();

// Função para limpar o carrinho
function limparCarrinho() {
    $_SESSION['carrinho'] = array();
}
?>