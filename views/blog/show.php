


<a href="/produits" class="btn btn-danger mt-5">Back</a>

<div class="col d-flex justify-content-center" style="display: flex;">
    
    <?php echo '<img  src="../public/uploads/' . $params['prd']->image_produit . '"/>'; ?>
    <div class="card mt-5" id="card-display">
        <div class="card-body text-center" style="align-items:center">
            <h5 class="card-title mt-5"><?php echo $params['prd']->id ?></h5>
            <p class="card-text mt-5"><?php echo $params['prd']->description ?>.</p>
            <small class="badge bg-success mt-5">Publié le <?php echo  $params['prd']->getCreatedAt() ?></small><br><br>
            Qantité disponible:<input type="number" class="mt-5" name="qty" required min="1" value="" max="99" maxlength="2" class="qty" style="border: 2px solid #72ae00;border-radius: 4px;">
            <p class="sub-total mt-5">sub total : <?php echo $params['prd']->prix_final ?> <i class="fa-solid fa-euro-sign"></i></p>

            <div class="mt-5 btn-btn">
                <a name="add_to_cart" href="" class="btn btn-primary" id="add-to-cart" >Add To Cart</a>
                <a href="#" class="btn btn-danger">Buy New</a>
            </div>
        </div>
    </div>
</div>
