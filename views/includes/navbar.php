<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"> <img width="50px" height="50px" src="<?php echo BASE_URL; ?>public/images/images.jpg" alt="" class="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-6 mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>welcome">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo BASE_URL; ?>home">Produit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo BASE_URL; ?>about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo BASE_URL; ?>contact">Contact</a>
                </li>
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true) : ?>
                        <a class="nav-link cart-btn" href="<?php echo BASE_URL; ?>cart"><i class="fa-solid fa-cart-shopping"></i><span><?php if (isset($_SESSION["count"]) && $_SESSION["count"] > 0) : ?>
                                    (<?php echo $_SESSION["count"]; ?>)
                                <?php else : ?>
                                    (0)
                                <?php endif; ?> </span>
                        </a>
                    <?php endif; ?>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-right-to-bracket"></i> Connection
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <?php
                    if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true) : ?>
                        <?php if ($_SESSION["role"] === 'user' || $_SESSION["role"] === 'admin') : ?>
                            <a class="dropdown-item" href="#"><?php echo $_SESSION["fullname"]; ?></a>
                        <?php endif; ?>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>logout">Déconnexion</a>
                        <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true) : ?>
                            <a class="dropdown-item" href="<?php echo BASE_URL; ?>dashboard">Admin</a>
                        <?php endif; ?>
                    <?php else : ?>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>login">Login</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>register">Inscription</a>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </div>
    </div>
</nav>