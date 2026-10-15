<?php
    class Produto {
        public function __construct(
            private int $codigo,
            private string $descricao,
            private float $valorUnitario,
            private int $qtdDisponivel
        ) {}

        public function getId(): int {
            return $this->codigo;
        }

        public function getNome(): string {
            return $this->descricao;
        }

        public function getPreco(): float {
            return $this->valorUnitario;
        }

        public function temEstoque(int $qtdDesejada): bool {
            return $this->qtdDisponivel >= $qtdDesejada;
        }
    }
