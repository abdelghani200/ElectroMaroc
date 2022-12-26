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

        

        <div class="card" style="width: 20rem;">
        <h5 class="card-title text-center" style="color: green;"><?= $prd->title ?></h5>
        <?php echo '<img  src="../public/uploads/' . $prd->image_produit . '" style="class="card-img-top" />'; ?>
            <div class="card-body">
                <?= $prd->getButton() ?>
            </div>
        </div>

    <?php endforeach ?>



</div>

<div class="col d-flex justify-content-center mt-5">
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