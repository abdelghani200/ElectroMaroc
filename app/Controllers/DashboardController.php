<?php 

namespace App\Controllers;

use App\Models\Dash;

class DashboardController extends Controller{

    public function index()
    {
        return $this->view('admin.produit.dash');
    }
}