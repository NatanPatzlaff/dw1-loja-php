<?php
interface Pagavel {
    public function pagar(float $valor): bool;
}

class Pix implements Pagavel {
    public function pagar(float $valor): bool {
        echo "Pagando R$ {$valor} via Pix<br>";
        return true;
    }
}

Class Cartao implements Pagavel {
    public function pagar(float $valor): bool {
        echo "Pagando R$ {$valor} via Cartão<br>";
        return true;
    }
}