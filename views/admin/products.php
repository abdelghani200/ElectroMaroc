<?php
if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
    $data = new ProductController();
    $products = $data->getAllProducts();
} else {
    Redirect::to("home");
}
?>
<div class="container">
    <div class="row my-5">
        <div class="col-md-10 mx-auto">
            <div class="form-group">
                <a href="<?php echo BASE_URL ?>addProduct" class="btn btn-primary">
                    <i class="fa-solid fa-user-plus"></i>
                </a>
            </div>
            <form id="form" action="<?php echo BASE_URL ?>updateProduct" method="post">
                <input type="hidden" name="product_id" id="product_id">
            </form>
            <form id="delete_form" action="<?php echo BASE_URL ?>deleteProduct" method="post">
                <input type="hidden" name="delete_product_id" id="delete_product_id">
            </form>
            <div class="card bg-light p-3 mt-3">
                <table class="table table-striped table-hover border">
                    <h3 class="font-weight-bold">Produits</h3>
                    <thead>
                        <tr>
                            <th>Libellé</th>
                            <th>Prix</th>
                            <th class="text-center">Quantité</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><?php echo $product["product_title"]; ?></td>
                                <td><?php echo $product["product_price"]; ?></td>
                                <td class="text-center"><?php echo $product["product_quantity"]; ?></td>
                                <td><?php echo substr($product["product_description"], 0, 100); ?></td>
                                <td>
                                    <img width="50" height="50" src="./public/uploads/<?php echo $product["product_image"]; ?>" alt="" class="img-fluid">
                                </td>
                                <td class="text-center">
                                    <a onclick="submitForm(<?php echo $product['product_id']; ?>)" class="btn btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a onclick="deleteForm(<?php echo $product['product_id']; ?>)" class="btn btn-danger ms-3">
                                        <i class="fa-solid fa-trash"></i>
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