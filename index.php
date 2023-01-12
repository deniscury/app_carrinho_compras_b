<?php
    require __DIR__."/vendor/autoload.php";

    use src\Item;
    use src\Pedido;
    use src\Email;

    echo "<h3/>Com SRP</h3>";
    
    $pedido = new Pedido();

    $item = new Item();

    $item->setDescricao('Bicicleta');
    $item->setValor(750.00);

    if ($item->itemValido()){
        $pedido->getCarrinhoCompra()->adicionarItem($item, $pedido);
    }

    $item->setDescricao('Videogame');
    $item->setValor(501,99);

    if ($item->itemValido()){
        $pedido->getCarrinhoCompra()->adicionarItem($item, $pedido);
    }

    $item->setDescricao('Geladeira');
    $item->setValor(752.10);

    if ($item->itemValido()){
        $pedido->getCarrinhoCompra()->adicionarItem($item, $pedido);
    }

    $pedido->finalizarPedido();

    echo '<h4>Pedido</h4>';
    echo '<pre>';
    print_r($pedido);
    echo '</pre>';

    echo '<h4>Status</h4>';
    echo '<pre>';
    print_r($pedido->getStatus());
    echo '</pre>';

    echo '<pre>';
    print_r($pedido->getCarrinhoCompra()->getItens()?'<h4>Carrinho está válido</h4>':'<h4>Carrinho está inválido</h4>');
    echo '</pre>';
    
    echo '<h4>Itens</h4>';
    echo '<pre>';
    print_r($pedido->getCarrinhoCompra()->getItens());
    echo '</pre>';
    
    echo '<h4>Valor Total</h4>';
    echo '<pre>';
    print_r($pedido->getValorTotal());
    echo '</pre>';

    if($pedido->getStatus() == 'finalizado'){
        $email = new Email();
        echo '<h4>Email</h4>';
        echo '<pre>';
        print_r($email ->dispararEmail());
        echo '</pre>';
    }