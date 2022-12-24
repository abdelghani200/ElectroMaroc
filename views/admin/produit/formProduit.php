<h1 class="text-center">page de création</h1>

<div class="container" id="page_creation">
    <form action="/admin/produits/createProduit" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title Produit</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title produit">
        </div>
        <div class="mb-3">
            <label for="categorie" class="form-label">Categorie Produit</label>
            <input type="text" class="form-control" name="categorie" id="categorie" placeholder="Categorie produit">
        </div>
        <div class="mb-3">
            <label for="prix_final" class="form-label">Prix Produit</label>
            <input type="text" class="form-control" name="prix_final" id="prix_final" placeholder="Price produit">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Entrer une description"></textarea>
        </div>
        <div class="mb-3">
            <label for="image_produit" class="form-label">Image</label>
            <input type="file" class="form-control" name="image_produit" id="image_produit">
            <!-- <input type="submit" value="Create"> -->
        </div>

        <button type="submit" href="" class="btn btn-primary">Enregistrer mon article</button>

    </form>
</div>



