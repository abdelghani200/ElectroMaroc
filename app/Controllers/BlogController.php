<?php

namespace App\Controller;

class BlogController
{
    public function index()
    {
        echo 'je suis abdelghani';
    }

    public function show(int $id)
    {
        echo ' je suis jelouani' . $id;
    }
}