<?php
    namespace src;

    class Pedido{
        private $status;
        private $carrinhoCompra;
        private $valor_total;
        
        public function __construct()
        {
            $this->status = 'aberto';
            $this->valor_total = 0.00;
            $this->carrinhoCompra = new CarrinhoCompra();
        }

        public function getStatus(){
            return $this->status;
        }

        public function setStatus($status){
            $this->status = $status;
        }

        public function getValorTotal(){
            return $this->valor_total;
        }

        public function addValorTotal($valor_total){
            $this->valor_total += $valor_total;
        }

        public function getCarrinhoCompra(){
            return $this->carrinhoCompra;
        }

        public function finalizarPedido(){
            if ($this->getCarrinhoCompra()->getItens()){
                $this->setStatus('finalizado');
                return true;
            }

            return false;
        }


        
    }