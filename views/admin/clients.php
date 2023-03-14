<?php
if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
    $data = new UserController();
    $users = $data->getAllUsers();
} else {
    Redirect::to("home");
}
?>
<div class="container">
    <div class="row my-5">
        <div class="col-md-10 mx-auto">
            <div class="card bg-light p-3 mt-3">
                <table class="table table-striped table-inverse">
                    <h3 class="font-weight-bold">Clients</h3>
                    <thead>
                        <tr>
                            <th>id_clients</th>
                            <th>Nom_Clinets</th>
                            <th>Ville_Clinets</th>
                            <th>Email_Clinets</th> 
                            <th>Ntele_Clinets</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?php echo $user["id"]; ?></td>
                                <td><?php echo $user["fullname"]; ?></td>
                                <td><?php echo $user["ville"]; ?></td>
                                <td><?php echo $user["email"]; ?></td>
                                <td><?php echo $user["ntele"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>