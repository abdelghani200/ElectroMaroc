<?php
if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
    $data = new OrdersController();
    $orders = $data->getAllOrders();
    // die(var_dump($orders));
} else {
    Redirect::to("home");
}
?>
<div class="container">
    <div class="row my-5">
        <div class="col-md-10 mx-auto">
            <form id="delete_order" action="<?php echo BASE_URL ?>deleteOrder" method="post">
                <input type="hidden" name="delete_order_id" id="delete_order_id">
            </form>
            <form id="valider_order" action="<?php echo BASE_URL ?>validerOrder" method="post">
                <input type="hidden" name="validateOrderId" id="validateOrderId">
            </form>
            <div class="card bg-light p-3">
                <table class="table table-striped table-inverse">
                    <h3 class="font-weight-bold">Commandes</h3>
                    <thead>
                        <tr>
                            <th>Nom & Prénom</th>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix</th>
                            <th>Total</th>
                            <th>Effectuée le</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) : ?>
                            <tr data-order-id="<?php echo $order['id']; ?>">
                                <td><?php echo $order["fullname"]; ?></td>
                                <td><?php echo $order["product"]; ?></td>
                                <td><?php echo $order["qte"]; ?></td>
                                <td><?php echo $order["price"]; ?></td>
                                <td><?php echo $order["total"]; ?></td>
                                <td><?php echo $order["done_at"]; ?></td>
                                <td class="text-center">
                                    <a onclick="Valider(<?php echo $order['id']; ?>)" class="btn btn-success validate-order" title="Valider">
                                        <i class="fa-solid fa-check"></i>
                                    </a>
                                    <a onclick="deleteOrder(<?php echo $order['id']; ?>)" class="btn btn-danger delete-order" title="Supprimer">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    <a onclick="Delivery(<?php echo $order['id']; ?>)" class="btn btn-warning delete-order" title="Delivery">
                                        <i class="fa-solid fa-truck"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>