<?php

namespace App\Models;



class Categorie extends Model
{

    protected $table = 'categorie';


    public function getExcerpt()
    {
        return substr($this->description, 0, 10) . '....';
    }

    public function create(array $data, $relations = null)
    {
        // Create the record in the database
        parent::create($data);
    }

    public function getProduit()
    {
        return $this->query("
         SELECT p.* FROM produit p INNER JOIN produit_categorie pc ON pc.pr_id
         WHERE pc.cat_id = ?", [$this->id]);
    }



}
