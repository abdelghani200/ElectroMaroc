<?php



if (isset($_POST['id'])) {
    $ordersController = new OrdersController();

    $send =  $ordersController->sendOrder();

    Redirect::to('orders');

 }
?>