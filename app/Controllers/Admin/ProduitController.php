<?php 

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Produit;

class ProduitController extends Controller{

    public function index()
    {
        $produit = (new Produit($this->getDB()))->all();

        return $this->view('admin.produit.index',compact('produit'));
    }

    public function create()
    {
        $prd = (new Produit($this->getDB()))->all();
        return $this->view('admin.produit.formProduit',compact('prd'));
    }

    public function createProduit()
    {
        // $prd = new Produit($this->getDB());
        // return $this->view('admin.produit.create',compact('prd'));
    }

    public function edit($id)
    {
        $prd = (new Produit($this->getDB()))->findById($id);

        return $this->view('admin.produit.edit',compact('prd'));
    }

    public function update($id)
    {
        $prd = new Produit($this->getDB());
        $result = $prd->update($id,$_POST);

        if($result)
        {
            return header('Location: /admin/produits');
        }
    }

    public function destroy(int $id)
    {
        $prd = new Produit($this->getDB());
        $result = $prd->destroy($id);

        if($result)
        {
            return header('Location: /admin/produits');
        }
    }
}