<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true) {
    $data = new CategorieController();
    $data->removeCategorie();
} else {
    Redirect::to("home");
}
