<?php

class Category
{
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM categories');
        $stmt->execute();
        return $stmt->fetchAll();
        // $stmt->close();
        // $stmt = null;
    }

    static public function getCategorieById($data)
    {
        $id = $data['id'];
        try {
            $stmt = DB::connect()->prepare('SELECT * FROM categories WHERE cat_id = :id');
            $stmt->execute(array(":id" => $id));
            $categorie = $stmt->fetch(PDO::FETCH_OBJ);
            return $categorie;
        } catch (PDOException $ex) {
            echo "erreur " . $ex->getMessage();
        }
    }

    static public function addCategorie($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO categories (cat_title
        ,description_cat,image_categorie)
        VALUES (:cat_title,:description_cat,:image_categorie)');
        $stmt->bindParam(':cat_title', $data['cat_title']);
        $stmt->bindParam(':description_cat', $data['description_cat']);
        $stmt->bindParam(':image_categorie', $data['image_categorie']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }

    static public function editCategorie($data)
    {
        $stmt = DB::connect()->prepare('UPDATE categories SET 
                cat_title = :cat_title,
                description_cat=:description_cat,
                image_categorie=:image_categorie
                WHERE cat_id=:cat_id
        ');
        $stmt->bindParam(':cat_id', $data['cat_id']);
        $stmt->bindParam(':cat_title', $data['cat_title']);
        $stmt->bindParam(':description_cat', $data['description_cat']);
        $stmt->bindParam(':image_categorie', $data['image_categorie']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }

    static public function deleteCategorie($data)
    {
        $id = $data['id'];
        try {
            $stmt = DB::connect()->prepare('DELETE FROM categories WHERE cat_id = :id');
            $stmt->execute(array(":id" => $id));
            $categorie = $stmt->fetch(PDO::FETCH_OBJ);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $ex) {
            echo "erreur " . $ex->getMessage();
        }
    }
}
