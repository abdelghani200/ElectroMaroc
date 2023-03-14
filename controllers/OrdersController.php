<?php

class OrdersController
{
    public function getAllOrders()
    {
        $orders = Order::getAll();
        return $orders;
    }

    public function getOrderProducts()
    {

        // die(var_dump($_GET));

        if (isset($_GET['id'])) {
            $orderId = $_GET['id'];
            $orders = Order::getOrder($orderId);
            // die(var_dump($orders));
            return $orders;
        } else {
            // handle the case where the "id" parameter is not set
        }
    }


    public function removeOrder()
    {
        if (isset($_POST["delete_order_id"])) {
            $data = array(
                "id" => $_POST["delete_order_id"]
            );
            // die(var_dump($data));
            $result = Order::deleteOrder($data);
            if ($result === "ok") {
                Session::set("success", "Order supprimé");
                Redirect::to("orders");
            } else {
                echo $result;
            }
        }
    }

    public function validateOrders()
    {
        $id = $_POST['id'];
        $status = 1;
        $delivery_date = date("Y-m-d H:i:s");
        return Order::validorders($id, $status, $delivery_date);
    }
    public function sendOrder()
    {
        $id = $_POST['id'];
        $send_date = date("Y-m-d H:i:s");;
        // die($send_date);
        return Order::sendorders($id, $send_date);
    }






    public function addOrder($data)
    {
        $client = $_SESSION['id'];
        $dateOfCreation = date("Y-m-d H:i:s");
        $totalprice = $_SESSION['totaux'];
        

        $orderData = array(
            'done_at' => $dateOfCreation,
            'total' => $totalprice,
            'user_id' => $client,
            

        );
        // die(print_r($_SESSION));
        // die(print_r($_SESSION));

        $result = Order::createOrder($orderData);
        if ($result['result'] === "ok") {
            $orderId = $result['orderId'];

            foreach ($_SESSION as $name => $product) {
                if (is_array($product) && isset($product["qte"])) {
                    $componentData = array(
                        'product_id' => $product['id'],
                        'order_id' => $orderId,
                        'qte' => $product['qte'],
                        'price' => $product['price']
                        
                    );
                    // die(print_r($componentData));

                    Order::createComponentProduct($componentData);
                    unset($_SESSION[$name]);
                    unset($_SESSION["count"]);
                    unset($_SESSION["totaux"]);
                }
            }

            Session::set("success", "Commande effectuée");
            Redirect::to("cart");
        } else {
            Session::set("error", "Erreur lors de la création de la commande");
            Redirect::to("cart");
        }
    }


}
