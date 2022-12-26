<h1 class="text-center">
    Your Order(👌);
</h1>


<table class="table table-striped table-hover border">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">categorie</th>
            <th scope="col">description</th>
            <th scope="col">quantite</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($params['carts'] as $cart) :   ?>
            <tr>
                <th scope="row"><?= $cart->id ?></th>
                <td><?= $cart->categorie ?></td>
                <td><?= $cart->getExcerpt() ?></td>
                <td>
                    <a href="" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                    <form action="/admin/produits/delete/<?= $prd->id ?>" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach;  ?>
    </tbody>
</table>