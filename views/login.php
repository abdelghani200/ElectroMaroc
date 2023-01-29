<?php
if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true) {
    Redirect::to("home");
}
$loginUser = new UserController();
$loginUser->auth();
?>
<div class="container mt-5">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Connexion
                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" class="mr-1">
                        <div class="input-icone">
                            <input autocomplete="off" type="text" class="input-nom" name="username" placeholder="Username" id="">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="input-icone">
                            <input autocomplete="off" type="password" class="input-nom" name="password" placeholder="Mot de passe" id="">
                            <i class="fa-solid fa-key"></i>
                        </div>
                        <div class="input-icone">
                            <button name="submit" class="btn btn-primary">
                                Connexion
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo BASE_URL; ?>register" class="btn btn-success">
                        Inscription
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>