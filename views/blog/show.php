<a href="/produits" class="btn btn-danger mt-5">Back</a>




<div class="col d-flex justify-content-center">
    <div class="card" id="card-display">
        <img src="<?php echo  '/uploads/produits/' . $params['prd']->image_produit ?>" style="width: 80px; height: 80px; border-radius: 50px;" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $params['prd']->id ?></h5>
            <p class="card-text"><?php echo $params['prd']->description ?>.</p>
            <div class="btn-btn">
                <a href="#" class="btn btn-primary">Add To Cart</a>
                <a href="#" class="btn btn-danger">Buy New</a>
            </div>
        </div>
    </div>
</div>