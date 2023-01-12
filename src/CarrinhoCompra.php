<?php
    namespace src;

    class CarrinhoCompra{
        // Atributos
        private $itens;

        public function __construct()
        {
            $this->itens = array();
        }

        // Métodos
        public function adicionarItem(Item $item, Pedido $pedido){
            array_push($this->itens, array(
                'descricao' => $item->getDescricao(),
                'valor' => $item->getValor()
            ));

            $pedido->addValorTotal($item->getValor());
        }

        public function getItens(){
            return $this->itens;
        }
    }