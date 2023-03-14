<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true) {
    $data = new CategorieController();
    $data->removeCategorie();
    header("Location: categories");
} else {
    Redirect::to("home");
}
