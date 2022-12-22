<?php if (isset($_SESSION['errors'])) :   ?>

    <?php foreach ($_SESSION['errors'] as $errorsArray) : ?>

        <?php foreach ($errorsArray as $errors) :    ?>

            <div class="alert alert-danger">
                <?php foreach ($errors as $error) :  ?>
                    <h5 class="text-center"><?= $error ?></h5>
                <?php endforeach  ?>
            </div>

        <?php endforeach ?>

    <?php endforeach ?>

<?php endif  ?>

<?php session_destroy();   ?>

<div class="container mt-5" id="login">

    <h1 class="text-center">Se connecter</h1>

    <form action="/login" method="POST">
        <div class="input-icone mt-5">
            <input type="text" class="input-nom" name="username" id="username" placeholder="Nom d'utilisateur">
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="input-icone mt-5">
            <input type="password" class="input-password" name="password" id="password" placeholder="Mot de passe">
            <i class="fa-solid fa-key"></i>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Se connecter</button>
    </form>

</div>