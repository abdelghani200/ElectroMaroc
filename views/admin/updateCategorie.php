<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true) {
    // $categories = new CategorieController();
    // $categories = $categories->getAllCategories();
    $categorieToUpdate = new CategorieController();
    $categorieToUpdate = $categorieToUpdate->getCategorie();
    // var_dump($categorieToUpdate);
    if (isset($_POST["submit"])) {
        $categorie = new CategorieController();
        $categorie->updateCategorie();
        // header("Location: products");
    }
} else {
    Redirect::to("home");
}
?>



<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Modifier une Categorie
                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" class="mr-1" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" name="cat_title" required autocomplete="off" placeholder="Titre" value="<?php echo (isset($categorieToUpdate->cat_title)) ? $categorieToUpdate->cat_title : ''; ?>">
                        </div>
                        <div class="form-group">
                            <textarea row="5" cols="20" autocomplete="off" class="form-control" name="description_cat" placeholder="Description" id=""><?php echo $categorieToUpdate->description_cat; ?></textarea>
                        </div>
                       
                       
                        <input type="hidden" name="cat_id" value="<?php echo $categorieToUpdate->cat_id; ?>">
                        <input type="hidden" name="categorie_current_image" value="<?php echo $categorieToUpdate->image_categorie; ?>">
                        <div class="form-group">
                            <img src="./public/uploads/<?php echo $categorieToUpdate->image_categorie; ?>" width="400" height="400" alt="" class="img-fluid rounded">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <button name="submit" class="btn btn-primary">
                                Valider
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>