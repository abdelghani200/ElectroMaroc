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
}
