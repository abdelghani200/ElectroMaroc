<?php

namespace App\Models;

use PDO;
use DateTime;
use Exception;

class Produit extends Model
{

    protected $table = 'produit';

    public function getCreatedAt()
    {
        return (new DateTime($this->created_at))->format('d/m/Y à H:i');
        // echo  $this->created_at;
    }

    public function getExcerpt()
    {
        return substr($this->description, 0, 10) . '....';
    }

    public function getButton()
    {
        return <<<HTML
        <a href="/produits/$this->id" class="btn btn-primary">Lire plus</a>
HTML;
    }

    public function create(array $data, $relations = null)
    {
        parent::create($data);
    }

   

      


   
}
