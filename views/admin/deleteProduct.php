<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true) {
    $data = new ProductController();
    $data->removeProduct();
} else {
    Redirect::to("home");
}
