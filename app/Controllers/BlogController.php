<?php

namespace App\Controllers;

use App\Models\Categorie;
use App\Models\Produit;


class BlogController extends Controller{


    public function welcome()
    {
        return $this->view('blog.welcome');
    }


    public function contact()
    {
        return $this->view('blog.contact');
    }

    public function index()
    {
        $prd = new Produit($this->getDB());
        $produit = $prd->all(); 
        
        return $this->view('blog.index',compact('produit'));
    }

    public function show($id)
    {

        $prd = new Produit($this->getDB());
        $prd = $prd->findById($id); 

        return $this->view('blog.show', compact('prd'));
    }

    public function cat($id)
    {
        $cat = (new Categorie($this->getDB()))->findById($id);
    }
}