<?php
require_once __DIR__ . '/produto.php';
require_once __DIR__ . '/Boleto.php';

$itens = [
    new ProdutoFisico("Tênis", 249.9, 1.2),
    new ProdutoDigital("E-book PHP", 39.9, "ebook-php.com/php.pdf"),
    new ProdutoComDesconto("Mochila", 200, 2, 10),
    new Boleto(150),
];

foreach ($itens as $item) {
    $nome = $item instanceof Produto ? $item->descricao() : "Boleto " . $item->codigoBarras();
    echo $nome . " | Total: R$ " . number_format($item->total(), 2, ',', '.') . "<br>";
}
