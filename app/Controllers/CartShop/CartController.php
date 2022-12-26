<?php

namespace App\Controllers\CartShop;

use App\Models\Cart;
use App\Controllers\Controller;

class CartController extends Controller
{

    private static $addToCartClicks = 0;

    

    // public function cart()
    // {
    //     // $this->isAdmin();

    //     $cart = (new Cart($this->getDB()))->all();
        
    //     return $this->view('admin.produit.cart', compact('cart'));
    // }

    public function cart()
{
    // $this->isAdmin();

    $cart = (new Cart($this->getDB()))->all();
    
    return $this->view('admin.produit.cart', ['carts' => $cart]);
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

    // public function display()
    // {
    //     $prd = new Cart($this->getDB());
    //     $cart = $prd->all();

    //     return $this->view('admin.produit.cart', ['carts' => $cart]);
    // }
}
