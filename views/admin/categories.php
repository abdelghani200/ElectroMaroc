<?php
if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
    $data = new CategorieController();
    $categories = $data->getAllCategories();
} else {
    Redirect::to("home");
}
?>
<div class="container">
    <div class="row my-5">
        <div class="col-md-10 mx-auto">
            <div class="form-group">
                <a href="<?php echo BASE_URL ?>addCategorie" class="btn btn-primary">
                    <i class="fa-solid fa-user-plus"></i>
                </a>
            </div>
            <form id="form" action="<?php echo BASE_URL ?>updateCategorie" method="post">
                <input type="hidden" name="cat_id" id="categorie_id">
            </form>
            <form id="delete_form" action="<?php echo BASE_URL ?>deleteCategorie" method="post">
                <input type="hidden" name="delete_categorie_id" id="delete_categorie_id">
            </form>
            <div class="card bg-light p-3 mt-3">
                <table class="table table-striped table-inverse">
                    <h3 class="font-weight-bold">Categories</h3>
                    <thead>
                        <tr>
                            <th>id_categorie</th>
                            <th>Image_categorie</th>
                            <th>Description_categorie</th>
                            <th>Title_categorie</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $categorie) : ?>
                            <tr>
                                <td><?php echo $categorie["cat_id"]; ?></td>
                                <td><img width="50" height="50" src="./public/uploads/<?php echo $categorie["image_categorie"]; ?>" alt="" class="img-fluid"></td>
                                <td><?php echo $categorie["description_cat"]; ?></td>
                                <td><?php echo $categorie["cat_title"]; ?></td>
                                <!-- <td>
                                    <img width="50" height="50" src="" alt="" class="img-fluid">
                                </td> -->
                                <td class="text-center">
                                    <a onclick="submitFormCat(<?php echo $categorie['cat_id']; ?>)" class="btn btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a onclick="deleteFormCat(<?php echo $categorie['cat_id']; ?>)" class="btn btn-danger ms-3">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>