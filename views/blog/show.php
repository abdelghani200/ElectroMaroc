<a href="/produits" class="btn btn-danger mt-5">Back</a>




<div class="col d-flex justify-content-center">
    <div class="card" id="card-display">
        <img src="uploads/produits/ <?= $params['prd']->image_produit; ?>" style="width: 80px; height: 80px; border-radius: 50px;" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $params['prd']->id ?></h5>
            <p class="card-text"><?php echo $params['prd']->description ?>.</p>
            <small class="badge bg-success">Publié le <?php echo  $params['prd']->getCreatedAt() ?></small><br><br>
            <input type="number" name="qty" required min="1" value="" max="99" maxlength="2" class="qty" style="border: 2px solid #72ae00;border-radius: 4px;"><button class="btn btn-warning ms-5"><i class="fa-solid fa-pen-to-square"></i></button>
            <!-- <button type="submit" name="update_cart" class="fas fa-edit"> -->
            <p class="sub-total">sub total : 123 <i class="fa-solid fa-euro-sign"></i></p>

            <div class="mt-5 btn-btn">
                <a name="add_to_cart" href="#" class="btn btn-primary">Add To Cart</a>
                <a href="#" class="btn btn-danger">Buy New</a>
            </div>
        </div>
    </div>
</div>



