<?php

class Order
{

    static public function getAll()
    {
        $stmt = DB::connect()->prepare(' SELECT u.fullname, u.email, o.user_id, o.id ,  COUNT(p.product_id) as count ,  oc.qte as Nb, SUM(o.total) as total, o.done_at, o.send_date, o.delivery_date, o.status
        FROM orders o
        JOIN orders_commande oc ON o.id = oc.order_id
        JOIN products p ON oc.product_id = p.product_id
        JOIN users u ON o.user_id = u.id;');
        
       // SELECT u.id, u.fullname, u.email, o.user_id, o.id, o.done_at, o.send_date, o.delivery_date, status, 
         // COUNT(*) AS nb_produits, SUM(o.total) as total
         // FROM orders AS o 
         // JOIN products p ON o.id = p.product_id
         // JOIN users AS u ON o.user_id = u.id
        // GROUP BY u.id, u.fullname, u.email
        
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function getOrder($orderId)
    {

        $stmt = DB::connect()->prepare('SELECT o.*,oo.qte,oo.price,p.product_image,p.product_title
    FROM orders o
    JOIN orders_commande as oo ON order_id  = o.id
    JOIN products p ON oo.product_id = p.product_id 
    JOIN users u ON o.user_id = u.id
    WHERE u.id = :orderId
    LIMIT 0, 25;');
        $stmt->bindParam(':orderId', $orderId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //componant

    public static function create_order_commande($data)
    {
        try {
            $stmt = DB::connect()->prepare('INSERT INTO orders_commande (product_id, order_id)
            VALUES (:product_id, :order_id)');
            $stmt->bindParam(':product_id', $data['product_id']);
            $stmt->bindParam(':order_id', $data['order_id']);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $e) {
            error_log("Error tarah hadxi makhadamx : " . $e->getMessage());
            return 'error';
        }
    }


    static public function deleteOrder($data)
    {
        $id = $data['id'];
        try {
            $stmt = DB::connect()->prepare('DELETE FROM orders WHERE id = :id');
            $stmt->execute(array(":id" => $id));
            $order = $stmt->fetch(PDO::FETCH_OBJ);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $ex) {
            echo "erreur " . $ex->getMessage();
        }
    }

    static public function validorders($id, $status, $delivery_date)
    {
        $stmt = DB::connect()->prepare('UPDATE orders SET status = :status ,delivery_date =:delivery_date WHERE id = :id');
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':delivery_date', $delivery_date);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }




    static public function sendorders($id, $send_date)
    {
        $stmt = DB::connect()->prepare('UPDATE orders SET send_date = :send_date WHERE id = :id');
        $stmt->bindParam(':send_date', $send_date);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }












    public static function createComponentProduct($data)
    {
        try {
            $stmt = DB::connect()->prepare('INSERT INTO orders_commande (product_id , order_id, qte, price)
            VALUES (:product_id , :order_id, :qte, :price  )');
            $stmt->bindParam(':product_id', $data['product_id']);
            $stmt->bindParam(':order_id', $data['order_id']);
            $stmt->bindParam(':qte', $data['qte']);
            $stmt->bindParam(':price', $data['price']);
            // die(print_r($data));

            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $e) {
            error_log("Error while creating component product: " . $e->getMessage());
            return 'error';
        }
    }

    
    public static function createOrder($data)
    {
        try {
            $stmt = DB::connect()->prepare('INSERT INTO orders (total ,done_at , user_id) VALUES (:total,:done_at,:user_id)');
            $stmt->bindParam(':total', $data['total']);
            $stmt->bindParam(':done_at', $data['done_at']);
            $stmt->bindParam(':user_id', $_SESSION['id']);
            

        //    die(print_r($data));
            $result = $stmt->execute();

            if ($result) {
                $stmt = DB::connect()->prepare('SELECT id FROM `orders` ORDER BY id DESC LIMIT 1');
                $stmt->execute();
                $orderId = $stmt->fetchColumn();
                return ['result' => 'ok', 'orderId' => $orderId];
            } else {
                return ['result' => 'error'];
            }
        } catch (PDOException $e) {
            error_log("Error while creating order: " . $e->getMessage());
            return ['result' => 'error'];
        }
    }
}
