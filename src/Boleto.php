<?php
require_once __DIR__ . '/Pagavel.php';

class Boleto implements Pagavel {
    public function __construct(
        private float $valor
    ) {}

    public function total(): float {
        return $this->valor;
    }

    // Código de barras fictício: 44 dígitos aleatórios
    public function codigoBarras(): string {
        $codigo = '';
        for ($i = 0; $i < 44; $i++) {
            $codigo .= random_int(0, 9);
        }
        return $codigo;
    }
}
