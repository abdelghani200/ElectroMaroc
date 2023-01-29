<h1>Modifier <?= $params['prd']->title ?> </h1>

<form action="/admin/produits/edit/<?= $params['prd']->id ?>" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">title de produit</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $params['prd']->title ?>">
    </div>
    <div class="mb-3">
            <label for="categorie" class="form-label">Categorie Produit</label>
            <select name="categorie" class="form-control">
                <?php foreach ($params['cats'] as $cat) : ?>
                    <option value="<?= $cat->nom ?>"><?= $cat->nom ?></option>
                <?php endforeach  ?>    
            </select>
        </div>
        <div class="mb-3">
            <label for="prix_final" class="form-label">Prix Produit</label>
            <input type="text" class="form-control" name="prix_final" id="prix_final" value="<?= $params['prd']->prix_final  ?>" placeholder="Price produit">
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





