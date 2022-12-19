

<h1 class="text-center">Les derniers produits</h1>



<?php foreach ($params['produit'] as $prd) : ?>
  <!-- <?php   var_dump($prd)   ;          ?> -->
    <div class="card" style="width: 18rem;">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
            <h5 class="card-title"><?= $prd->id ?></h5>
            <small class="badge bg-success">Publié le <?= $prd->getCreatedAt() ?></small>
            <p class="card-text"><?= $prd->getExcerpt() ?></p>
            <?= $prd->getButton() ?>
            <!-- <a href="/posts/<?= $prd->id ?>" class="btn btn-primary">Lire plus</a> -->
        </div>
    </div>

<?php endforeach ?>