<?php



if (isset($_POST['id'])) {
    $ordersController = new OrdersController();

    $valide =  $ordersController->validateOrders();

    Redirect::to('orders');

 }
?>