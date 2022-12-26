<a href="/produits" class="btn btn-danger mt-5">Back</a>




<div class="col d-flex justify-content-center">
    <div class="card" id="card-display">
        <?php echo '<img  src="../public/uploads/' . $params['prd']->image_produit . '" style="class="card-img-top" />'; ?>
        <div class="card-body">
            <h5 class="card-title"><?php echo $params['prd']->id ?></h5>
            <p class="card-text"><?php echo $params['prd']->description ?>.</p>
            <small class="badge bg-success">Publié le <?php echo  $params['prd']->getCreatedAt() ?></small><br><br>
            <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty" style="border: 2px solid #72ae00;border-radius: 4px;"><button class="btn btn-warning ms-5"><i class="fa-solid fa-pen-to-square"></i></button>
            <p class="sub-total">sub total : <?php echo $params['prd']->prix_final ?> <i class="fa-solid fa-euro-sign"></i></p>

            <div class="mt-5 btn-btn">
                <a name="add_to_cart" href="#" class="btn btn-primary">Add To Cart</a>
                <a href="#" class="btn btn-danger">Buy New</a>
            </div>
        </div>
    </div>
</div>