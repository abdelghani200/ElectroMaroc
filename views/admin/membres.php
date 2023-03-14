<?php


if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
    $data = new OrdersController();

    $orders = $data->getOrderProducts();

    // die(var_dump($orders));

} else {
    Redirect::to("home");
}


?>


<div class="container">
    <div class="row my-5">
        <div class="col-md-10 mx-auto">
            <div class="card bg-light p-3">
                <table class="table table-striped table-inverse">
                    <h3 class="font-weight-bold">Produits_commander</h3>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom Produit</th>
                            <th>image</th>
                            <th>Quantité</th>
                            <th>Prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) : ?>
                            <tr data-order-id="<?php echo $order['id']; ?>">
                                <td><?php echo $order["id"]; ?></td>
                                <td><?php echo $order['product_title']; ?></td>
                                <td>
                                    <img width="50" height="50" src="./public/uploads/<?php echo $order['product_image']; ?>" alt="" class="img-fluid">
                                </td>
                                <td><?php echo $order["qte"]; ?></td>
                                <td><?php echo $order["price"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
