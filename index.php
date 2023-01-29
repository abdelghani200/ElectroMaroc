<?php

require_once './autoload.php';

require_once("./views/includes/header.php");

$home = new HomeController();

// $home->index("home");

$pages =['home','welcome','cart','dashboard','updateProduct','deleteProduct','addProduct','emptyCart','show','cancelcart','register','login','checkout','logout','products','orders','addOrders','formuleAchat','contact','about','categories','updateCategorie','deleteCategorie','addCategorie'];


if(isset($_GET['page'])){
    if(in_array($_GET['page'],$pages)){
        $page = $_GET['page'];
        if($page === "dashboard" || $page === "deleteProduct" || $page === "updateProduct" || $page === "addProduct" || $page === "products" || $page === "orders" || $page === "categories" || $page === "updateCategorie" || $page === "deleteCategorie" || $page === "addCategorie"){
            // if(isset($_SESSION['admin']) && $_SESSION['admin'] === true){
                $admin = new AdminController();
                $admin->index($page);
            // }else{
            //     include('views/includes/404.php');
            // }
        }else{
            $home->index($page);
        }
    }else{
        include('views/includes/404.php');
    }
}else{
    $home->index("home");
}


require_once("./views/includes/footer.php");