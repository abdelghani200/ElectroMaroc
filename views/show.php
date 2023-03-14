<?php
$data = new ProductController();
$product = $data->getProduct();
?>


<div class="container">
  <div class="row my-5">
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-12 mb-2">
          <div class="card h-100 bg-white rounded p-2">
            <div class="card-header bg-light">
              <h3 class="card-title text-center" style="color: green; font-size: 3rem;">
                <?php echo $product->product_title; ?>
              </h3>
            </div>
            <div class="card-img-top">
              <img width="" src="./public/uploads/<?php echo $product->product_image; ?>" alt="" class="img-fluid rounded">
            </div>
            <div class="card-body">
              <p class="card-text">
                <?php echo $product->product_description; ?>
              </p>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
              <div class="price">
                <span class="badge bg-danger p-2">
                  <?php echo $product->product_price; ?> dh
                </span>
              </div>
              <div class="old-price">
                <span class="badge bg-dark p-2 ms-5">
                  <strike>
                    <?php echo $product->old_price; ?> dh
                  </strike>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <h3 class="text-secondary m-3 text-center">
        Qté :
      </h3>
      <form method="post" action="<?php echo BASE_URL; ?>checkout">
        <div class="form-group">
          <input type="number" name="product_qte" id="product_qte" class="form-control" value="1">
          <input type="hidden" name="product_title" value="<?php echo $product->product_title; ?>">
          <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary mt-3" value="Ajouter au panier">
        </div>
      </form>
    </div>
  </div>
</div>




<style>
  .container {
    padding: 2rem 0;
  }

  .card {
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
    transition: all 0.2s ease-in-out;
  }

  .card:hover {
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
  }

  /* .card-img-top {
    height: 250px;
    overflow: hidden;
  }

  .card-img-top img {
    width: 100%;
    transition: all 0.2s ease-in-out;
  }

  .card:hover .card-img-top img {
    transform: scale(1.1);
  } */

  .card-header {
    background-color: #f2f2f2;
    padding: 1rem;
  }

  .card-header h3 {
    font-size: 2.5rem;
    font-weight: bold;
    color: #2ecc71;
    margin: 0;
  }

  .card-body {
    padding: 1.5rem;
  }

  .card-footer {
    display: flex;
    justify-content: center;
    padding: 1rem;
    background-color: #f2f2f2;
  }

  .badge {
    font-size: 1.3rem;
    padding: 0.5rem 1rem;
  }

  .badge.bg-danger {
    background-color: #e74c3c;
    color: white;
    margin-right: 1rem;
  }

  .badge.bg-dark {
    background-color: #34495e;
    color: white;
  }

  form {
    background-color: #f2f2f2;
    padding: 1rem;
    border-radius: 5px;
  }

  form input[type="number"] {
    width: 100%;
    padding: 0.5rem;
    font-size: 1.3rem;
    margin-bottom: 1rem;
  }

  form input[type="submit"] {
    width: 100%;
    padding: 1rem;
    background-color: #2ecc71;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1.3rem;
    font-weight: bold;
    transition: all 0.2s ease-in-out;
  }

  form input[type="submit"]:hover {
    background-color: #27ae60;
    cursor: pointer;
  }
</style>