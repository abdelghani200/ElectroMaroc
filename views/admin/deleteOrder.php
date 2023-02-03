<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true) {
    $data = new OrdersController();
    $data->removeOrder();
} else {
    Redirect::to("home");
}
