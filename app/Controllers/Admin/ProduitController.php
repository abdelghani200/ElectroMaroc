<?php

namespace App\Controllers\Admin;

use App\Models\Pager;
use App\Models\Produit;
use App\Controllers\Controller;

class ProduitController extends Controller
{

    public function index()
    {
        $this->isAdmin();

        $produit = (new Produit($this->getDB()))->all();
        return $this->view('admin.produit.index', compact('produit'));
    }

    public function create()
    {
        $this->isAdmin();

        $prd = (new Produit($this->getDB()))->all();
        return $this->view('admin.produit.formProduit', compact('prd'));
    }

    public function createProduit()
    {
        $this->isAdmin();

        $prd = new Produit($this->getDB());
        $image = $_FILES['image_produit'];

        move_uploaded_file($image['tmp_name'], getcwd(). '/uploads/' . $image['name']);
        $data = $_POST;
        $data['image_produit'] = $image['name'];
        
        $result = $prd->create($data);

        if ($result) {
            return header('Location: /admin/produits');
        }
        else{
            return header('Location: /admin/produits');
        }
    }


    public function edit($id)
    {

        $this->isAdmin();

        $prd = (new Produit($this->getDB()))->findById($id);

        return $this->view('admin.produit.edit', compact('prd'));
    }

    public function update($id)
    {

        $this->isAdmin();

        $prd = new Produit($this->getDB());
        $result = $prd->update($id, $_POST);

        if ($result) {
            return header('Location: /admin/produits');
        }
    }

    public function destroy(int $id)
    {

        $this->isAdmin();

        $prd = new Produit($this->getDB());
        $result = $prd->destroy($id);

        if ($result) {
            return header('Location: /login');
        }
    }
}



 // echo "<pre>";
    // var_dump($_POST['image_produit']);
    // echo "<pre>";
    // exit;