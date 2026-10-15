<?php
    class Conta {
        private float $saldoAtual = 0;

        public function getSaldo(): float {
            return $this->saldoAtual;
        }

        public function depositar(float $quantia): void {
            $this->validarQuantia($quantia);
            $this->saldoAtual += $quantia;
        }

        public function sacar(float $quantia): void {
            $this->validarQuantia($quantia);

            if ($quantia > $this->saldoAtual) {
                throw new InvalidArgumentException("Saldo insuficiente.");
            }

            $this->saldoAtual -= $quantia;
        }

        private function validarQuantia(float $quantia): void {
            if ($quantia <= 0) {
                throw new InvalidArgumentException("Valor deve ser positivo.");
            }
        }
    }
