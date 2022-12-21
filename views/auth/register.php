<div class="container mt-5" id="login">

    <h1 class="text-center">S'inscrire</h1>

    <form action="/login" method="POST" class="register">
        <div class="input-icone mt-5">
            <input type="text" class="input-nom" name="nom" id="nom" placeholder="Nom">
            <i class="fa-solid fa-user" aria-hidden="true"></i>
        </div>
        <div class="input-icone">
            <input type="email" class="input-email" name="email" id="email" placeholder="Email">
            <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="input-icone">
            <input type="password" class="input-password" name="password" id="password" placeholder="Password">
            <i class="fa-solid fa-key"></i>
        </div>
        <div class="input-icone">
            <input type="password" class="input-password" name="password" id="password" placeholder="Confirmer mot de pass">
            <i class="fa-solid fa-key"></i>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Créer Compte</button>
    </form>

</div>