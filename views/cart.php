<div class="container">
    <div class="row">
        <div class="col-md-8 bg-white">
            <table class="table table-bordered border-primary">
                <thead>
                    <tr class="thead-light">
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
                            <tr>
                                <td><?php echo $product["title"]; ?></td>
                                <td><?php echo $product["price"]; ?></td>
                                <td class="text-center">
                                    <input type="number" id="qte-<?php echo $product["id"]; ?>" min="1" value="<?php echo $product["qte"]; ?>" data-price="<?php echo $product["price"]; ?>" onchange="updateTotal(this)">
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


            <button type="submit" class="btn btn-primary" id="buy-button">Acheter</button>


            <button type="submit" class="btn btn-danger ms-3">
                Vider le panier
            </button>

            <form method="post" id="addorder" action="<?php echo BASE_URL; ?>addOrder"></form>





        </div>
    </div>
    <div class="mt-5" id="achat" style="display: flex;justify-content:center;justify-items: center;display:none">
        <form  style="width: 600px;border-style: solid;padding:2rem;justify-content:center;justify-items: center;">
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
            <button class="btn btn-primary buy" type="submit" id="paypalbutton"><i class="fa fa-cc-paypal fa-brands"></i> Pay€</button>
        </form>

    </div>
        <script>
            document.querySelector("#addorder").addEventListener("click", function() {
                var form = document.querySelector("#addorder");
                if (form) {
                    form.submit();
                }
            });
        </script>

</div>