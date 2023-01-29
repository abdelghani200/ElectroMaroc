<?php

namespace App\Controllers\Admin;

// use App\Models\Pager;
use App\Controllers\Controller;
use App\Models\Categorie;

class CategorieController extends Controller
{

    public function index()
    {
        // $this->isAdmin();

        $produit = (new Categorie($this->getDB()))->all();
        return $this->view('admin.categorie.index', compact('produit'));
    }

    public function create()
    {
        // $this->isAdmin();

        $prd = (new Categorie($this->getDB()))->all();
        // var_dump($prd);
        return $this->view('admin.categorie.formCategorie', compact('prd'));
    }

    public function createCategorie()
    {
        $this->isAdmin();

        $prd = new Categorie($this->getDB());
        $image = $_FILES['photo'];

        move_uploaded_file($image['tmp_name'], getcwd() . '/uploads/' . $image['name']);
        $data['photo'] = $image['name'];
        $data = $_POST;

        $result = $prd->create($data);

        if ($result) {
            return header('Location: /admin/categories');
        } else {
            return header('Location: /admin/categories');
        }
    }


    public function edit($id)
    {

        // $this->isAdmin();

        $prd = (new Categorie($this->getDB()))->findById($id);

        return $this->view('admin.categorie.edit', compact('prd'));
    }


    public function update($id)
    {
        $prd = new Categorie($this->getDB());
        $image = $_FILES['photo'];

        if (is_uploaded_file($image['tmp_name'])) {
            move_uploaded_file($image['tmp_name'], getcwd() . '/uploads/' . $image['name']);
            $data['photo'] = $image['name'];
            $data = array_merge($data, $_POST);

            // $this->isAdmin();

            $result = $prd->update($id, $data);

            if ($result) {
                return header('Location: /admin/categories');
            }
        } else {
            return header('Location: /admin/categories');
        }
    }


    public function destroy(int $id)
    {

        // $this->isAdmin();

        $prd = new Categorie($this->getDB());
        $result = $prd->destroy($id);

        if ($result) {
            return header('Location: /admin/categories');
        }
    }
}
