<?php

namespace App\Controllers\CartShop;

use App\Models\Cart;
use App\Controllers\Controller;

class CartController extends Controller
{

    private static $addToCartClicks = 0;

    public function cart()
    {
        // $this->isAdmin();

        $carts = (new Cart($this->getDB()))->all();
        // var_dump($carts);
        return $this->view('admin.produit.cart', compact('carts'));
    }


    public function cartid($id)
    {

        // $this->isAdmin();

        $prd = (new Cart($this->getDB()))->findById($id);

        // return $this->view('admin.produit.cart', compact('prd'));
        echo $id;
        exit;
    }


    public function display($id)
    {

        $carts = new Cart($this->getDB());
        $carts = $carts->findById($id);
        var_dump($carts);
        return $this->view('admin.produit.cart', compact('carts'));
    }


    // Fonction pour ajouter un clic au compteur
    public static function addToCartClick()
    {
        self::$addToCartClicks++;
    }

    // Fonction pour récupérer le nombre de clics
    public static function getAddToCartClicks()
    {
        return self::$addToCartClicks;
    }
}
