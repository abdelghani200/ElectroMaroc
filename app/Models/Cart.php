<?php

namespace App\Models;

class Cart extends Model
{
    
    protected $table = 'recommanded';
    
    
    public function getRows(int $id = null)
    {
        if ($id) {
            var_dump($this->findById($id));
            return $this->findById($id);
        } else {
            return $this->all();
            var_dump($this->all());
        }
    }
    
    

    


}
