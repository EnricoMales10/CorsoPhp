<?php

use crud\UserCRUD;

require "./config1.php";
require "./autoload.php";

$users = (new UserCRUD())->read();

?>

<?php require "./class/views/head_view.php"  ?>
<a href="create_user.php" class="btn btn-sm btn-primary" >aggiungi utente</a>
<table class="table">
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Nascita</th>
        <th>Comune</th>
        <th>Regione</th>
        <th>Provincia</th>
        <th>Genere</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    <?php foreach ($users as $user) { ?>
        <tr>
            <td><?= $user->user_id ?></td>
            <td><?= $user->first_name ?></td>
            <td><?= $user->last_name ?></td>
            <td><?= $user->birthday ?></td>
            <td><?= $user->birth_city ?></td>
            <td><?= $user->regione_id ?></td>
            <td><?= $user->provincia_id ?></td>
            <td><?= $user->gender ?></td>
            <td><?= $user->username ?></td>
            <td><?= $user->password ?></td>
            <td>
            <a href="edit_user.php?user_id=<?= $user->user_id ?>" class="btn btn-sm btn-primary" >modifica</a>
                <!--  -->
                <a href="delete_user.php?user_id=<?= $user->user_id ?>" class="btn btn-sm btn-danger" >elimina</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php require "./class/views/footer_view.php" ?>