<h1>gestion des produits</h1>

<table class="table">
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
                    <a href="/admin/produits/edit/<?= $prd->id ?>" class="btn btn-warning">Modifier</a>
                    <form action="/admin/produits/delete/<?= $prd->id ?>" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>

        <?php endforeach  ?>
    </tbody>
</table>