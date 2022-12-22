<?php

namespace App\Models;

use DateTime;

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

    // public function create(array $data, $relations = null)
    // {
    //     parent::create($data);

    //     // $id = $this->db->getPDO()->lastInsertId();

    //     // return true;

    //     // foreach ($data as $key) {
    //     //     $statement = $this->db->getPDO()->prepare("INSERT INTO produit (tilte,categorie,prix_final,description) VALUES(?,?)");
    //     //     $statement->execute($key);
    //     // }
    //     // return true;
    // }
}
