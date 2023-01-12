<?php

use PHPUnit\Framework\TestCase;
use src\Item;

class ItemTest extends TestCase{

    public function testEstadoInicialItem(){
        $item = new Item();

        // Asserções PHPUnit
        $this->assertEquals($item->getDescricao(), '');
        $this->assertEquals($item->getValor(), 0.00);
    }

    public function testGetSetDescricao(){
        $item = new Item();

        $descricao = 'Playstation 5';
        $item->setDescricao($descricao);
        
        $this->assertEquals($item->getDescricao(), $descricao);
    }

    public function testGetSetValor(){
        $item = new Item();

        $valor = 5399.99;
        $item->setValor($valor);
        
        $this->assertEquals($item->getValor(), $valor);
    }

    /**
     * @dataProvider dataValores
     */
    public function testItemValido(){
        $item = new Item();
        
        $descricao = 'Playstation 5';
        $valor = 5399.99;

        // Submeter um item válido - retorno true
        $item->setDescricao($descricao);
        $item->setValor($valor);
        $this->assertEquals(true, $item->itemValido());

        // Submeter um item inválido - retorno false (Descrição)
        $item->setDescricao('');
        $this->assertEquals(false, $item->itemValido());

        // Submeter um item inválido - retorno false (Valor)
        $item->setDescricao($descricao);
        $item->setValor(0.00);
        $this->assertEquals(false, $item->itemValido());

        // Submeter um item inválido - retorno false 
        $item->setDescricao('');
        $item->setValor(0.00);
        $this->assertEquals(false, $item->itemValido());
    }

    public function dataValores(){
        return array(
            array(100), 
            array(-2), 
            array(0)
        );
    }

}