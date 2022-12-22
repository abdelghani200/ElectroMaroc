<h1>gestion des produits</h1>

<?php if(isset($_GET['success'])): ?>
   <div class="alert alert-success">Vous etes connecté !!</div>
<?php endif ?>

<a href="/admin/produits/create" class="btn btn-success my-3">Créer un nouvel produit</a>

<table class="table table-striped table-hover border">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">categorie</th>
            <th scope="col">publié le</th>
            <th scope="col">description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($params['produit'] as $prd) : ?>
            <tr>
                <th scope="row"><?= $prd->id ?></th>
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