<?php

use crud\UserCRUD;
use models\User;
use Registry\it\Provincia;
use Registry\it\Regione;
use validator\ValidateDate;
use validator\ValidateMail;
use validator\ValidateRequired;
use validator\ValidatorRunner;

require "../config.php";
require "./autoload.php";

//error_reporting(E_ALL); li vede tutti
//error_reporting(0); li spegne tutti
$user_id = filter_input(INPUT_GET,"user_id", FILTER_VALIDATE_INT);
// var_dump($user_id);
if($user_id){   
    $crud = new UserCRUD;
    $user = $crud->read($user_id);
}else{
    echo "problemi";
}

$validatorRunner = new ValidatorRunner([
    'first_name' => new ValidateRequired($user->first_name,'Il Nome è obbligatorio'),
    'last_name'  => new ValidateRequired($user->last_name,'Il Cognome è obbligatorio'),
    'birthday'  => new ValidateRequired($user->birthday,'La data di nascità non è valida'),
    'birth_city'  => new ValidateRequired($user->birth_city,'La città  è obbligatoria'),
    'regione_id'  => new ValidateRequired($user->regione_id,'La regione è obbligatoria'),
    'provincia_id'  => new ValidateRequired($user->provincia_id,'La provincia è obbligatoria'),
    'gender'  => new ValidateRequired($user->gender,'Il Genere è obbligatorio'),
    'username'  => new ValidateRequired('', 'Email obbligatoria'),
    //'username_email ' => new ValidateMail('','Formato email non valido'),
    'password' => new ValidateRequired('', 'Password obbligatoria'),
]);
extract($validatorRunner->getValidatorList());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $validatorRunner->isValid();
    if($validatorRunner->getValid()){
        $user = User::arrayToUser($_POST);
        $crud = new UserCRUD;
        $crud->update($user, $_POST['user_id']);
        var_dump($_POST);
        //redirect
        header("location: index_user.php");
        }else{
            echo "Il form non è valido";
        }
    }

?>
<?php require "./class/views/head_view.php"  ?>


<section class="row">
    <div class="col-sm-8">
        <form class="mt-1 mt-md-5" action="edit_user.php" method="post">
        <input type="hidden" id= "user_id" name="user_id" value="<?= $_GET['user_id'] ?>">
            <div class="mb-3">
                <label for="first_name" class="form-label">Nome</label>
                <input type="text" value="<?= $first_name->getValue() ?>" class="form-control <?php echo !$first_name->getValid() ? 'is-invalid' : ''  ?>" name="first_name" id="first_name">

                <?php if (!$first_name->getValid()) : ?>
                    <div class="invalid-feedback">
                        <?php echo $first_name->getMessage() ?>
                    </div>
                <?php endif ?>


            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Cognome</label>
                <input type="text" id="last_name" value="<?= $last_name->getValue() ?>" name="last_name" class="form-control <?php echo !$last_name->getValid() ? 'is-invalid' : '' ?>">
                <?php if (!$last_name->getValid()) : ?>
                    <div class="invalid-feedback">
                        <?php echo $last_name->getMessage() ?>
                    </div>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Data Di Nascita</label>
                <input type="date" id="birthday" value="<?= $birthday->getValue() ?>" name="birthday" class="form-control <?php echo !$birthday->getValid() ? 'is-invalid' : '' ?>">
                <?php if (!$birthday->getValid()) : ?>
                    <div class="invalid-feedback">
                        <?php echo $birthday->getMessage() ?>
                    </div>
                <?php endif ?>
            </div>


            <div class="mb-3">
                <div class="row">
                    <div class="col">

                        <label for="birth_city" class="form-label">Città</label>
                        <input type="text" value="<?= $birth_city->getValue() ?>" class="form-control <?php echo !$birth_city->getValid() ? 'is-invalid' : '' ?>" name="birth_city" id="birth_city">
                        <?php if (!$birth_city->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?php echo $birth_city->getMessage() ?>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="col">
                    <label for="birth_region" class="form-label">Regione</label>
                    <select id="birth_region" class="form-select birth_region <?= !$regione_id->getValid() ? 'is-invalid':''?>" name="regione_id">
                              <option value=""></option>    
                            <?php foreach(Regione::all() as $regione) : ?> 
                                <option <?= $regione_id->getValue() == $regione->regione_id ? 'selected':'' ?> value="<?= $regione->regione_id ?>"><?= $regione->nome ?></option>
                                <?php endforeach;  ?>
                            </select>
                            <?php if (!$regione_id->getValid()) : ?>
                        <div class="invalid-feedback">
                            <?php echo $regione_id->getMessage() ?>
                        </div>
                    <?php endif ?>

                        </div>
                        <div class="col">
                        <label for="birth_province" class="form-label">Provincia</label>
                        <select id="birth_province" class="form-select birth_province <?= !$provincia_id->getValid() ? 'is-invalid':''?>" name="provincia_id">
                        <option value=""></option>
                                <?php foreach(Provincia::all() as $provincia) : ?> 
                                    <option <?= $provincia_id->getValue() == $provincia->provincia_id ? 'selected':'' ?> value="<?= $provincia->provincia_id ?>"><?= $provincia->nome ?></option>
                                <?php endforeach;  ?>
                        </select>
                        <?php if (!$provincia_id->getValid()) : ?>
                        <div class="invalid-feedback">
                            <?php echo $provincia_id->getMessage() ?>
                        </div>
                    <?php endif ?>
                    </div>

                </div>
            </div>

            <div class="mb-3">
                <!-- <h1><?php echo $gender->getValue() == 'M' ? 'AA' : 'BB' ?></h1> -->
                <label for="gender" class="form-label">Genere</label>
                <select name="gender" class="form-select <?php echo !$gender->getValid() ? 'is-invalid' : '' ?>" id="gender">
                    <option value=""></option>
                    <option <?php echo $gender->getValue() == 'M' ? 'selected' : ''  ?> value="M">M</option>
                    <option <?php echo $gender->getValue() == 'F' ? 'selected' : ''  ?> value="F">F</option>
                </select>
                <?php
                if (!$gender->getValid()) : ?>
                    <div class="invalid-feedback">
                        <?php echo $gender->getMessage() ?>
                    </div>
                <?php endif; ?>

            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Email</label>
                <input type="text" value="<?php $username->getValue() ?>" class="form-control 
                            <?php echo (!$username->getValid() && !$username->getValid()) ? 'is-invalid' : '' ?>" name="username" id="username">
                <?php
                //if (!$username_email->getValid()) : 
                ?>
                <div class="invalid-feedback">
                    <?php //echo $username_email->getMessage() 
                    ?>
                </div>
                <?php //endif 
                ?>

                <?php
                if (!$username->getValid()) : ?>
                    <div class="invalid-feedback">
                        <?php echo $username->getMessage() ?>
                    </div>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" value="<?= $password->getValue() ?>" id="password" name="password" class="form-control <?php echo !$password->getValid() ? 'is-invalid' : ''  ?>">
                <?php
                if (!$password->getValid()) : ?>
                    <div class="invalid-feedback">
                        <?php echo $password->getMessage() ?>
                    </div>
                <?php endif ?>
            </div>

            <button class="btn btn-primary btn-sm" type="submit">Aggiorna utente</button>
        </form>
    </div>
</section>
<?php require "./class/views/footer_view.php" ?>