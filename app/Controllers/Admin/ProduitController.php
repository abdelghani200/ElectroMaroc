<?php 

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Produit;

class ProduitController extends Controller{

    public function index()
    {
        $this->isAdmin();

        $produit = (new Produit($this->getDB()))->all();

        return $this->view('admin.produit.index',compact('produit'));
    }

    public function create()
    {
        $this->isAdmin();

        $prd = (new Produit($this->getDB()))->all();
        // var_dump($prd);
        return $this->view('admin.produit.formProduit',compact('prd'));
    }

    public function createProduit()
    {

        $this->isAdmin();
        // $prd = new Produit($this->getDB());
        // $result = $prd->create($_POST,$prd);
        // var_dump($result);
        // if($result){
        //     return header('Location: /admin/produits');
        // }
        $prd = new Produit($this->getDB());
        $result = $prd->create($_POST);

        if($result)
        {
            return header('Location: /admin/produits');
        }
        
    }

    public function edit($id)
    {

        $this->isAdmin();

        $prd = (new Produit($this->getDB()))->findById($id);

        return $this->view('admin.produit.edit',compact('prd'));
    }

    public function update($id)
    {

        $this->isAdmin();

        $prd = new Produit($this->getDB());
        $result = $prd->update($id,$_POST);

        if($result)
        {
            return header('Location: /admin/produits');
        }
    }

    public function destroy(int $id)
    {

        $this->isAdmin();

        $prd = new Produit($this->getDB());
        $result = $prd->destroy($id);

        if($result)
        {
            return header('Location: /admin/produits');
        }
    }
}