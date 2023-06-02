function limparCarrinho() {
    if (confirm("Tem certeza que deseja limpar o carrinho?")) {
        location.href = "limpar_carrinho.php";
    }
}