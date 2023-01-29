<h1>gestion des produits</h1>
<div class="container mt-5">
</div>

<?php if (isset($_GET['success'])) : ?>
    <div class="alert alert-success text-center">Vous etes connecté !!</div>
<?php endif ?>

<a href="/admin/produits/create" class="btn btn-success my-3">Créer un nouvel produit</a>
<a href="/admin/categories/create" class="btn btn-success my-3">Créer un nouvel Categorie</a>

<table class="table table-striped table-hover border">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Nom Produit</th>
            <th scope="col">Price</th>
            <th scope="col">categorie</th>
            <th scope="col">publié le</th>
            <th scope="col">description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($params['produit'] as $prd) : ?>
            <tr>
                <th scope="row"><?= $prd->id ?></th>
                <td> <?php echo '<img  src="../public/uploads/' . $prd->image_produit . '" style="width: 80px; height: 80px; border-radius: 50px;" class="card-img-top" alt=""/>'; ?></td>
                <td><?= $prd->title ?></td>
                <td><?= $prd->prix_final ?></td>
                <td><?= $prd->categorie ?></td>
                <td><?= $prd->getCreatedAt() ?></td>
                <td><?= $prd->getExcerpt() ?></td>
                <td>
                    <a href="/admin/produits/edit/<?= $prd->id ?>" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                    <form action="/admin/produits/delete/<?= $prd->id ?>" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>

        <?php endforeach  ?>
    </tbody>
</table>