<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CADASTRO DE PEDIDOS</title>
    </head>
    <body>
        <h1>CADASTRO DE PEDIDOS</h1>
        <a href="<?=$url;?>">Incluir Pedido</a>
        <br> Pedidos:
        <ul>
            <?php foreach ($pedidos as $pedido): ?>
                <li><?=$pedido->getNumero();?></li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>