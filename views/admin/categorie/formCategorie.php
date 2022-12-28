<h1 class="text-center">page de création</h1>

<div class="container" id="page_creation">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title Categorie</label>
            <input type="text" class="form-control" name="nom" id="title" value="<?= $params['prd']->title ?? '' ?>" placeholder="Title produit">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Entrer une description"><?= $params['prd']->description ?? '' ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image_produit" class="form-label">Image</label>
            <input type="file" class="form-control" name="photo" id="image_produit">
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer mon categorie</button>

    </form>
</div>