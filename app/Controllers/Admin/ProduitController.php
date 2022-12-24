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
        // var_dump($prd);
        return $this->view('admin.produit.formProduit', compact('prd'));
    }

    // public function createProduit()
    // {

    //     $this->isAdmin();

    //     $prd = new Produit($this->getDB());

    //     $result = $prd->create($_POST);

    //     if($result)
    //     {
    //         return header('Location: /admin/produits');
    //     }


    // }

    public function createProduit()
    {
        $this->isAdmin();

        $prd = new Produit($this->getDB());

        // Handle the uploaded image
        $image = $_FILES['image_produit'];
        $image_path = '';
        if ($image['error'] === UPLOAD_ERR_OK) {
            $image_name = time() . '_' . $image['name'];
            $image_path = 'uploads/produits/' . $image_name;
            move_uploaded_file($image['tmp_name'], $image_path);
        }

        // Add the image path to the data array
        $data = $_POST;
        $data['image_produit'] = $image_path;

        // Insert the record into the database
        $result = $prd->create($data);

        if ($result) {
            return header('Location: /admin/produits');
        }
    }


    // echo "<pre>";
    // var_dump($_POST['image_produit']);
    // echo "<pre>";
    // exit;

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
            return header('Location: /admin/produits');
        }
    }
}
