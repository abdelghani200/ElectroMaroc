<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true) {
    if (isset($_POST["submit"])) {
        $categorie = new CategorieController();
        $categorie->newCategories();
        header("Location: categories");
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
                        Ajouter une categorie
                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" class="mr-1" enctype="multipart/form-data">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="cat_title" required autocomplete="off" placeholder="Titre" id="">
                        </div>
                        <div class="form-group mt-3">
                            <textarea row="5" cols="20" autocomplete="off" class="form-control" name="description_cat" placeholder="Description" id=""></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group mt-3">
                            <button name="submit" class="btn btn-primary">
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>