<?php

namespace App\Controllers\CartShop;

use App\Models\Cart;
use App\Controllers\Controller;

class CartController extends Controller
{


    public function cart()
    {
        // $this->isAdmin();

        $carts = (new Cart($this->getDB()))->all();
        var_dump($carts);
        return $this->view('admin.produit.cart', compact('carts'));
    }


    public function cartid($id)
    {

        // $this->isAdmin();

        $prd = (new Cart($this->getDB()))->findById($id);

        return $this->view('admin.produit.cart', compact('prd'));
        
    }

    public function addProduit()
    {
        
    }
}
