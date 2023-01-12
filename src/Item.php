<?php
    namespace src;

    class Item{
        private $descricao;
        private $valor;

        public function __construct()
        {
            $this->descricao = '';
            $this->valor = 0.00;
        }

        public function itemValido(){
            if ($this->descricao == '' || $this->valor <= 0){
                return false;
            }

            return true;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function setDescricao(string $descricao){
            $this->descricao = $descricao;
        }

        public function getValor(){
            return $this->valor;
        }

        public function setValor(float $valor){
            $this->valor = $valor;
        }
    }