<?php
require_once __DIR__ . '/Pagavel.php';

class Boleto implements Pagavel {
    public function pagar(float $valor): bool {
        echo "Pagando R$ {$valor} via Boleto - código: {$this->codigoBarras()}<br>";
        return true;
    }

    // Código de barras fictício: 44 dígitos aleatórios
    private function codigoBarras(): string {
        $codigo = '';
        for ($i = 0; $i < 44; $i++) {
            $codigo .= random_int(0, 9);
        }
        return $codigo;
    }
}
