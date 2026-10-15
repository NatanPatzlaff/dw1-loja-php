<?php
    require_once __DIR__ . '/conta.php';

    class Cliente {
        private string $nomeCompleto;
        private string $enderecoEmail;
        private Conta $contaBancaria;

        public function __construct(string $nomeCompleto, string $enderecoEmail) {
            $this->setNome($nomeCompleto);
            $this->setEmail($enderecoEmail);
            $this->contaBancaria = new Conta();
        }

        public function getNome(): string {
            return $this->nomeCompleto;
        }

        public function setNome(string $novoNome): void {
            $this->nomeCompleto = $novoNome;
        }

        public function getEmail(): string {
            return $this->enderecoEmail;
        }

        public function setEmail(string $novoEmail): void {
            if (!filter_var($novoEmail, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException("E-mail inválido.");
            }

            $this->enderecoEmail = $novoEmail;
        }

        public function getConta(): Conta {
            return $this->contaBancaria;
        }
    }
