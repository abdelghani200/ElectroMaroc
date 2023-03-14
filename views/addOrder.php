<?php


$order = new OrdersController();

foreach ($_SESSION as $name => $product) {
    if (substr($name, 0, 9) == "products_") {
        $data = array(
            "fullname" => $_SESSION["fullname"],
            "product" => $product["title"],
            "qte" => $product["qte"],
            "price" => $product["price"],
            "total" => $product["total"],
            "id" => $product["product_id"]
        );
        $order->addOrder($data);
    } else {
        Redirect::to("home");
    }
}

// foreach ($_SESSION as $name => $product) {
    //     if (substr($name, 0, 9) == "products_") {
        //         $data = array(
            //             "fullname" => $_SESSION["fullname"],
            //             "product" => $product["title"],
            //             "qte" => $product["qte"],
            //             "price" => $product["price"],
            //             "total" => $product["total"],
            //             "id" => $product["product_id"],
            //         );
            //         $order->addOrder($data);
            //     }
            // }
            // Redirect::to("home");