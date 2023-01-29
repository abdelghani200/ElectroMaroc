<?php
if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true) {
    Redirect::to("home");
}
if (isset($_POST["submit"])) {
    $createUser = new UserController();
    $createUser->register();
}
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Inscription
                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" class="mr-1">
                        <div class="input-icone">
                            <input type="text" class="input-nom" name="fullname" required autocomplete="off" placeholder="Nom & Prénom" id="">
                            <i class="fa-solid fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="input-icone">
                            <input type="text" autocomplete="off" class="input-nom" name="username" placeholder="Pseudo" id="">
                            <i class="fa-solid fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="input-icone">
                            <input type="text" class="input-nom" name="ville" id="nom" placeholder="Ville">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="input-icone">
                            <input type="text" class="input-nom" name="ntele" id="nom" placeholder="Phone">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="input-icone">
                            <input type="email" autocomplete="off" class="input-email" name="email" placeholder="Email" id="">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="input-icone">
                            <input type="password" autocomplete="off" class="input-password" name="password" placeholder="Mot de passe" id="">
                            <i class="fa-solid fa-key"></i>
                        </div>
                        <div class="input-icone">
                            <button name="submit" class="btn btn-primary">
                                Inscription
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo BASE_URL; ?>login" class="btn btn-success">
                        Connexion
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>