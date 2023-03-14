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
                            <th class="text-center">Email</th>
                            <th>product</th>
                            <th>Nb</th>
                            <th>Total</th>
                            <th class="text-center">Effectuée le</th>
                            <th class="text-center">Delivery le</th>
                            <th class="text-center">Valider le</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) : ?>
                            <tr data-order-id="<?php echo $order['id']; ?>">
                                <td><?php echo $order["fullname"]; ?></td>
                                <td><?php echo $order["email"]; ?></td>
                                <td>
                                    <a href="membres?id=<?php echo $order["user_id"]; ?>" class="btn btn-success" title="View">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                                <td class="text-center"><?php echo $order['count'] ?></td>
                                <td><?php echo $order["total"]; ?></td>
                                <td><?php echo $order["done_at"]; ?></td>
                                <td><?php echo $order["send_date"]; ?></td>
                                <td><?php echo $order["delivery_date"]; ?></td>
                                <td class="pt-3 pb-4"><?php echo $order['status']
                                                            ?
                                                            '<span class="badge text-bg-success">Product Shipped</span>'
                                                            :
                                                            '<span class="badge text-bg-danger">Need Validation</span>'; ?>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex">
                                        <a onclick="deleteOrder(<?php echo $order['id'];?>)" class="btn btn-danger delete-order" title="Supprimer" style="height: 32px;width: 38px;">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>

                                        <form method="POST" class="ms-1" action="send">
                                            <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
                                            <button class="btn btn-sm btn-success">
                                                <i class="fa-solid fa-truck"></i>

                                            </button>
                                        </form>
                                        <form action="validate" class="ms-1" method="post">
                                            <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
                                            <button class="btn btn-sm btn-info" type="submit" value="Validate">
                                                <i class="fa-solid fa-check"></i>


                                            </button>

                                        </form>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>