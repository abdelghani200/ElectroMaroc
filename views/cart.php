<?php

if(isset($_POST['pay'])){

    $data = new OrdersController();
    $data->addOrder($data);  
    // die(print_r($data));
    }  
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 bg-white">
            <table class="table table-bordered border-primary">
                <thead>
                    <tr class="thead-light">
                        <th>#</th>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th class="text-center">Qte</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION as $name => $product) : ?>
                        <?php if (substr($name, 0, 9) == "products_") : ?>
                            <?php
                            // Vérifier si la quantité a été soumise via POST
                            if (isset($_POST["quantity"]) && $_POST["product_id"] == $product["id"]) {
                                $quantity = (int) $_POST["quantity"];
                                $_SESSION[$name]["qte"] = $quantity;
                                $_SESSION[$name]["total"] = $quantity * $product["price"];
                            } else {
                                $quantity = $product["qte"];
                            }
                            ?>
                            <tr>
                                <td><?php echo $product["id"]; ?></td>
                                <td><?php echo $product["title"]; ?></td>
                                <td><?php echo $product["price"]; ?></td>
                                <td class="text-center">
                                    <form method="POST">
                                        <input type="hidden" name="product_id" value="<?php echo $product["id"]; ?>">
                                        <input type="hidden" name="product_price" value="<?php echo $product["price"]; ?>">
                                        <input type="number" name="quantity" min="1" class="text-center" value="<?php echo $quantity; ?>" onchange="this.form.submit()">
                                    </form>
                                </td>
                                <td id="total-<?php echo $product["id"]; ?>"><?php echo $product["total"]; ?>Dh</td>
                                <td>
                                    <form method="POST" action="<?php echo BASE_URL; ?>cancelcart">
                                        <input type="hidden" name="product_id" value="<?php echo $product["id"]; ?>">
                                        <input type="hidden" name="product_price" value="<?php echo $product["price"]; ?>">
                                        <button type="submit" class="btn btn-sm btn-danger text-white font-weight-bold p-1">
                                            <i class="fa-solid fa-trash text-center"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>

        <div class="col-4 col-md-4 float-right bg-white">
            <h4>Votre Factures:</h4>
            <table class="table table-bordered border-primary">
                <tbody>
                    <tr>
                        <th scope="row">Produits</th>
                        <td>
                            <?php echo isset($_SESSION["count"]) ? $_SESSION["count"] : 0; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Total TTC</th>
                        <td>
                            <strong id="amount">
                                <?php echo isset($_SESSION["totaux"]) ? $_SESSION["totaux"] : 0; ?> <span class="bb-danger">dh</span>
                            </strong>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex">
                <button type="submit" class="btn btn-primary" id="buy-button">Acheter</button>
                <?php if (isset($_SESSION["count"])) : ?>
                    <form action="<?php echo BASE_URL; ?>emptycart" method="post">
                        <button type="submit" class="btn btn-danger ms-3">
                            Vider le panier
                        </button>
                    </form>
                <?php endif;     ?>

            </div>

            <form method="post" id="addorder" action="<?php echo BASE_URL; ?>addOrder">
            </form>
        </div>
    </div>
    <div class="mt-5" id="achat" style="display: flex;justify-content:center;justify-items: center;display:none">
        <div>

        </div>
        <!-- <form style="width: 600px;border-style: solid;padding:2rem;justify-content:center;justify-items: center;"> -->
        <form  method="post" style="width: 600px;border-style: solid;padding:2rem;justify-content:center;justify-items: center;">

            <div class="form-group mb-3">
                <label for="card-number" class="form-label">Card Number</label>
                <input type="text" class="form-control" id="card-number" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group mb-3">
                <label for="card-holder-name" class="form-label">Cardholder name</label>
                <input type="text" class="form-control" id="card-holder-name" required>
            </div>
            <div class="form-group mb-3">
                <label for="expiry-date">Expiry date</label>
                <input class="form-control expire" type="text" placeholder="MM / YYYY" id="expiry-date" required />
            </div>
            <div class="form-group mb-3">
                <label for="security-number">Security Number</label>
                <input class="form-control ccv" type="text" placeholder="CVC" maxlength="3" id="security-number" required />
            </div>
            <!-- <button class="btn btn-primary buy" type="submit" id="paypalbutton"><i class="fa fa-cc-paypal fa-brands"></i> Pay€</button> -->
            <input type="submit" name="pay" value="Pay">

        </form>

    </div>
    <script>
        document.querySelector("#addorder").addEventListener("click", function() {
            var form = document.querySelector("#addorder");
            if (form) {
                form.submit();
            }
        });


        document.querySelector("#buy-button").addEventListener("click", function() {
            document.getElementById("achat").style.display = "flex";
        });

        document.querySelector("#paypalbutton").addEventListener("click", function() {
            var form = document.querySelector("#addorder");
            if (form) {
                form.submit();
            }
        });

        // add event listener to quantity input field
    </script>

</div>