<?php
require_once __DIR__ . '/Pagavel.php';

abstract class Produto implements Pagavel {
    public function __construct(
        protected string $nome,
        protected float $preco
    ) {}

    abstract public function frete(): float;

    public function descricao(): string {
        return "{$this->nome}: {$this->preco}";
    }

    public function total(): float {
        return $this->preco + $this->frete();
    }
}

class ProdutoFisico extends Produto {
    public function __construct(
        string $nome,
        float $preco,
        private float $pesoKg
    ) {
        parent::__construct($nome, $preco);
    }

    public function frete(): float {
        return $this->pesoKg * 5;
    }
}

class ProdutoDigital extends Produto {
    public function __construct(
        string $nome,
        float $preco,
        private string $link
    ) {
        parent::__construct($nome, $preco);
    }

    public function descricao(): string {
        return parent::descricao() . " (download)";
    }

    public function frete(): float {
        return 0;
    }
}

class ProdutoComDesconto extends ProdutoFisico {
    public function __construct(
        string $nome,
        float $preco,
        float $pesoKg,
        private float $percentualDesconto
    ) {
        parent::__construct($nome, $preco, $pesoKg);
    }

    public function total(): float {
        return parent::total() * (1 - $this->percentualDesconto / 100);
    }
}
