<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true) {
    $data = new ProductController();
    $data->removeProduct();
    // header("Location: products");
} else {
    Redirect::to("home");
}

