<?php

$categories = new CategorieController();
$categories = $categories->getAllCategories();
$pager  = new Pager();

if (isset($_POST["cat_id"])) {
    $products = new ProductController();
    $products = $products->getProductsByCategory($_POST['cat_id']);
    // echo count($productByCat);
} else {

    $data = new ProductController();
    // $currentPage =3;
    $currentPage = 2;
    // die(var_dump($currentPage));
    // exit;
    // $totalPages = 5;
    $products = $data->getAllProducts_2();
}

?>

<div class="container">
    <div class="row my-5">
        <div class="col-md-8">
            <div class="row">
                <?php
                if (isset($products)) :
                    // print_r($_SESSION);
                ?>
                    <?php
                    foreach ($products as $product) :
                    ?>
                        <div class="col-md-6 mb-2">
                            <div class="card h-100 bg-white  rounded p-2">
                                <div class="card-header bg-light">
                                    <form id="form" method="post" action="<?php echo BASE_URL; ?>show">
                                        <input type="hidden" name="product_id" id="product_id">
                                    </form>
                                    <h3 onclick="submitForm(<?php echo $product['product_id']; ?>)" class="card-title" style="cursor: pointer;">
                                        <?php
                                        echo $product['product_title'];
                                        ?>
                                    </h3>
                                </div>
                                <div class="card-img-top">
                                    <img src="./public/uploads/<?php echo $product["product_image"]; ?>" alt="" class="img-fluid mt-3">
                                </div>
                                <div class="cord-body">
                                    <p class="card-text">
                                        <?php
                                        echo $product['short_desc'];
                                        ?>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <span class="badge bg-secondary p-2">
                                        <?php
                                        echo $product['product_price'];
                                        ?>Dh
                                    </span>
                                    <span class="badge bg-danger p-2">
                                        <strike>
                                            <?php
                                            echo $product['old_price'];
                                            ?>Dh
                                        </strike>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                <?php
                else :
                ?>
                    <div class="alert alert-info">
                        aucun produit !!
                    </div>
                <?php
                endif;
                ?>


                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php
                         $currentPage =  ( $_SERVER['REQUEST_URI'][(strlen($_SERVER['REQUEST_URI']) - 1)]);
                         if(!is_numeric( $currentPage )) $currentPage = 1; 
                        $totalPages = 5;   ?>
                        <?php if ($currentPage > 1) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                            <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                        <?php if ($currentPage < $totalPages) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>

            </div>
        </div>
        <div class="col-md-4">
            <h3 class="text-secondary m-3 text-center">
                Catégories
            </h3>
            <?php
            foreach ($categories as $caregorie) :
            ?>
                <ul class="list-group">
                    <li class="list-group-item text-center">
                        <form id="catPro" action="<?php echo BASE_URL; ?>" method="POST">
                            <input type="hidden" name="cat_id" id="cat_id">
                        </form>
                        <a onclick="gatCatProducts(<?php echo $caregorie['cat_id']; ?>)" class="btn btn-link text-secondary" style="text-decoration: none;font-size:24px;cursor:pointer"><?php echo $caregorie['cat_title']; ?>
                            (<?php
                                $productByCat = new ProductController();
                                $productByCat = $productByCat->getProductsByCategory($caregorie['cat_id']);
                                echo count($productByCat);
                                ?>)
                        </a>
                    </li>
                </ul>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>