<h1>Modifier <?= $params['prd']->categorie ?> </h1>

<form action="/admin/produits/edit/<?= $params['prd']->id ?>" method="POST">

    <div class="form-group">
        <label for="Categorie">title de produit</label>
        <input type="text" class="form-control" name="Categorie" id="Categorie" value="<?= $params['prd']->categorie ?>">
    </div>

    <div class="form-group">
        <label for="description">description</label>
        <textarea name="description" id="description" rows="8" class="form-control"><?= $params['prd']->description ?> </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>

</form>





