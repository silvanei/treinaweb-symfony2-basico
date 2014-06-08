<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CADASTRO DE PEDIDOS</title>
    </head>
    <body>
        <h1>CADASTRO DE PEDIDOS</h1>
        <a href="<?=$this->url;?>">Incluir Pedido</a>
        <br> Pedidos:
        <ul>
            <?php foreach ($this->pedidos as $pedido): ?>
                <li><?=$pedido->numero;?></li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>