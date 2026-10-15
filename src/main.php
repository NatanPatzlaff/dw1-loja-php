<?php
    require_once __DIR__ . '/carrinho.php';
    require_once __DIR__ . '/cliente.php';

    function reais(float $valor): string {
        return "R$ " . number_format($valor, 2, ',', '.');
    }

    // Carrinho de compras
    $meuCarrinho = new Carrinho();
    $meuCarrinho->adicionar(new Produto(1, 'Smartphone', 3000, 5));
    $meuCarrinho->adicionar(new Produto(2, 'Computador', 5000, 5));

    // Cliente e conta
    $cliente = new Cliente("Natan", "natan@gmail.com");
    $conta = $cliente->getConta();

    $conta->depositar(5000);
    $conta->sacar(4999);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Loja</title>
</head>
<body>
    <h2>Carrinho</h2>
    <table border="1" cellpadding="6">
        <tr><th>Produto</th><th>Qtd</th><th>Preço</th><th>Subtotal</th></tr>
        <?php foreach ($meuCarrinho->getItens() as $linha): ?>
            <tr>
                <td><?= $linha['produto']->getNome() ?></td>
                <td><?= $linha['quantidade'] ?></td>
                <td><?= reais($linha['produto']->getPreco()) ?></td>
                <td><?= reais($linha['produto']->getPreco() * $linha['quantidade']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><strong>Total: <?= reais($meuCarrinho->total()) ?></strong></p>

    <h2>Cliente</h2>
    <p>Nome: <?= $cliente->getNome() ?></p>
    <p>E-mail: <?= $cliente->getEmail() ?></p>
    <p>Depositou <?= reais(5000) ?> e sacou <?= reais(4999) ?>.</p>
    <p><strong>Saldo: <?= reais($conta->getSaldo()) ?></strong></p>
</body>
</html>
