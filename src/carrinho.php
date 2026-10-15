<?php
    require_once __DIR__ . '/produto.php';

    class Carrinho {
        private array $listaItens = [];

        public function adicionar(Produto $prod, int $qtd = 1): void {
            if (!$prod->temEstoque($qtd)) {
                throw new Exception("Sem estoque");
            }

            $this->listaItens[] = ['produto' => $prod, 'quantidade' => $qtd];
        }

        public function getItens(): array {
            return $this->listaItens;
        }

        public function total(): float {
            $soma = 0;

            foreach ($this->listaItens as $linha) {
                $soma += $linha['produto']->getPreco() * $linha['quantidade'];
            }

            return $soma;
        }
    }
