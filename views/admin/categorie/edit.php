<h1>Modifier <?= $params['prd']->nom ?> </h1>

<form action="/admin/categories/edit/<?= $params['prd']->id ?>" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="Categorie">title de categorie</label>
        <input type="text" class="form-control" name="nom" id="Categorie" value="<?= $params['prd']->nom ?>">
    </div>

    <div class="form-group">
        <label for="description">description</label>
        <textarea name="description" id="description" rows="8" class="form-control"><?= $params['prd']->description ?> </textarea>
    </div>
    <div class="mb-3">
            <label for="image_produit" class="form-label">Image</label>
            <input type="file" class="form-control"   name="photo" id="image_produit">
        </div>
    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>

</form>





