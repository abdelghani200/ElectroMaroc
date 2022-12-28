<h1>Modifier <?= $params['prd']->categorie ?> </h1>

<form action="/admin/produits/edit/<?= $params['prd']->id ?>" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="Categorie">title de produit</label>
        <input type="text" class="form-control" name="Categorie" id="Categorie" value="<?= $params['prd']->categorie ?>">
    </div>
    <div class="mb-3">
            <label for="categorie" class="form-label">Categorie Produit</label>
            <input type="text" class="form-control" name="categorie" id="categorie" value="<?= $params['prd']->categorie ?? '' ?>" placeholder="Categorie produit">
        </div>
        <div class="mb-3">
            <label for="prix_final" class="form-label">Prix Produit</label>
            <input type="text" class="form-control" name="prix_final" id="prix_final" value="<?= $params['prd']->prix_final ?? '' ?>" placeholder="Price produit">
        </div>
    <div class="form-group">
        <label for="description">description</label>
        <textarea name="description" id="description" rows="8" class="form-control"><?= $params['prd']->description ?> </textarea>
    </div>
    <div class="mb-3">
            <label for="image_produit" class="form-label">Image</label>
            <input type="file" class="form-control" name="image_produit" id="image_produit">
            
        </div>
    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>

</form>





