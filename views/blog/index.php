<div class="input-group mb-3 mt-5 ms-5" style="width:25rem">
    <label class="input-group-text" for="inputGroupSelect01">Categories</label>
    <select class="form-select" id="inputGroupSelect01">
        <option selected>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
</div>


<div class="container mt-5 list_produits">


    <?php foreach ($params['produit'] as $prd) : ?>

        <div class="card" style="width:20rem;">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">

                <h5 class="card-title badge bg-danger"><?= $prd->title ?></h5>
                <p class="card-text"><?= $prd->getExcerpt() ?></p>
                <div class="prix" style="display:flex;">
                    <p style="padding-right: 1rem;"><?= $prd->prix_final ?>$</p>
                    <p style="-webkit-text-decoration-line: line-through;text-decoration-line: line-through;color:crimson;">167$</p>
                </div>
                <small class="badge bg-success">Publié le <?= $prd->getCreatedAt() ?></small><br><br>
                <?= $prd->getButton() ?>
                <!-- <a href="/posts/<?= $prd->id ?>" class="btn btn-primary">Lire plus</a> -->
            </div>
        </div>

    <?php endforeach ?>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>

</div>