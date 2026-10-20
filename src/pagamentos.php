<?php
require_once __DIR__ . '/produto.php';
require_once __DIR__ . '/Boleto.php';

$itens = [
    new ProdutoFisico("Tênis", 249.9, 1.2),
    new ProdutoDigital("E-book PHP", 39.9, "ebook-php.com/php.pdf"),
    new ProdutoComDesconto("Mochila", 200, 2, 10),
];

$soma = 0;
foreach ($itens as $item) {
    echo $item->descricao() . " | Total: R$ " . number_format($item->total(), 2, ',', '.') . "<br>";
    $soma += $item->total();
}

echo "<br>";
$formas = [new Pix(), new Cartao(), new Boleto()];
foreach ($formas as $forma) {
    $forma->pagar($soma);
}
