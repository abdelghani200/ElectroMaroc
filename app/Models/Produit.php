<?php

namespace App\Models;

use PDO;
use DateTime;
use Exception;
use SplFileInfo;

class Produit extends Model
{

    protected $table = 'produit';

    public function getCreatedAt()
    {
        return (new DateTime($this->created_at))->format('d/m/Y à H:i');
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

        // Create the record in the database
        parent::create($data);
    }

    public function getCategorie()
    {
        return $this->query(" SELECT c.* FROM categorie c INNER JOIN produit_categorie pc ON pt.cat_id = c.id 
        WHERE pc.cat_id = ?", [$this->id]);
    }


    public function update(int $id, array $data, $relations = null)
    {
        parent::update($id, $data);

        $stmt = $this->db->getPDO()->prepare("DELETE FROM produit_categorie WHERE cat_id = ?");
        $result = $stmt->execute([$id]);

        foreach($relations as $catId){
           $stmt = $this->db->getPDO()->prepare("INSERT produit_categorie(pr_id, cat_id) VALUES (?, ?)");
           $stmt->execute([$id, $catId]);
        }


        if($result){

            return true;
        }

    }

    

}
