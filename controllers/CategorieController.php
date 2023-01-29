<?php

class CategorieController
{

    public function getAllCategories()
    {
        $categories = Category::getAll();
        return $categories;
    }


    public function getCategorie()
    {
        //    var_dump($_POST);
        if (isset($_POST["cat_id"])) {
         
            $data = array(
                'id' => $_POST["cat_id"]
            );
            $categorie = Category::getCategorieById($data);
            return $categorie;
        }
    }

    public function newCategories()
    {
        if (isset($_POST["submit"])) {
            $data = array(
                "cat_title" => $_POST["cat_title"],
                "description_cat" => $_POST["description_cat"],
                "image_categorie" => $this->uploadPhoto(),

            );
            $result = Category::addCategorie($data);
            if ($result === "ok") {
                Session::set("success", "Categorie ajouté");
                Redirect::to("categories");
            } else {
                echo $result;
            }
        }
    }

    public function uploadPhoto($oldImage = null)
    {
        $dir = "public/uploads";
        $time = time();
        $name = str_replace(' ', '-', strtolower($_FILES["image"]["name"]));
        $type = $_FILES["image"]["type"];
        $ext = substr($name, strpos($name, '.'));
        $ext = str_replace('.', '', $ext);
        $name = preg_replace("/\.[^.\s]{3,4}$/", "", $name);
        $imageName = $name . '-' . $time . '.' . $ext;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $dir . "/" . $imageName)) {
            return $imageName;
        }
        return $oldImage;
    }

    public function updateCategorie()
    {
        if (isset($_POST["submit"])) {
            $oldImage = $_POST["categorie_current_image"];
            $data = array(
                "cat_id" => $_POST["cat_id"],
                "cat_title" => $_POST["cat_title"],
                "description_cat" => $_POST["description_cat"],
                "product_image" => $this->uploadPhoto($oldImage),
            );
            $result = Category::editCategorie($data);
            if ($result === "ok") {
                Session::set("success", "Categorie modifié");
                Redirect::to("categories");
            } else {
                echo $result;
            }
        }
    }
    public function removeCategorie()
    {
        if (isset($_POST["delete_categorie_id"])) {
            $data = array(
                "id" => $_POST["delete_categorie_id"]
            );
            $result = Category::deleteCategorie($data);
            if ($result === "ok") {
                Session::set("success", "Categorie supprimé");
                Redirect::to("categories");
            } else {
                echo $result;
            }
        }
    }
}
