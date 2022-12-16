<?php

namespace App\Controllers;

use Database\DBConnection;

class BlogController extends Controller{

    public function index()
    {
        return $this->view('blog.index');
    }

    public function show($id)
    {
        $db = new DBConnection('ElectroMaroc', '127.0.0.1', 'root', '');
        $req = $db->getPDO()->query('select * from produit');
        $produit = $req->fetchAll();
        var_dump($produit);
        return $this->view('blog.show', compact('id'));
    }
}