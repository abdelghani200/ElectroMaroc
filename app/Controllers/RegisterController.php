<?php

namespace App\Controllers;

use App\Models\Register;
use App\Validation\Validator;

class RegisterController extends Controller
{

    public function register()
    {
        return $this->view('auth.register');
    }


    public function registerClient()
    {
        $prd = new Register($this->getDB());
        $result = $prd->create($_POST);
        if ($result) {
            header('Location: /admin/produits');
        }
        else{
            header('Location: /login');
        }
    }
}
