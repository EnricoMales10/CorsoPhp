<?php
require "../config.php";
require "./class/Registry/it/Regione.php";
require "./class/Registry/it/Provincia.php";
//error_reporting(E_ALL); li vede tutti
//error_reporting(0); li spegne tutti
require "./class/validator/Validable.php";
require "./class/validator/ValidateRequired.php";
require "./class/validator/ValidateDate.php";
require "./class/validator/ValidateMail.php";


$first_name = new ValidateRequired('','Il Nome è obblicatorio');
$last_name  = new ValidateRequired('','Il Cognome è obblicatorio');
$birtday  = new ValidateDate('','La data di nascità non è valida');
$birth_place  = new ValidateRequired('','Il Luogo di nascita è obbligatorio');
$gender  = new ValidateRequired('','Il Genere è obbligatorio');

$username_required  = new ValidateRequired('','Username è obbligaztorio');
$username_email  = new ValidateMail('','Formato email non valido');

$password  = new ValidateRequired('','Password è obbligatorio');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $first_name->isValid($_POST['first_name']);
    $last_name->isValid($_POST['last_name']);
    $birth_place->isValid($_POST['birth_place']);
    $gender->isValid($_POST['gender']);
    $username_email->isValid($_POST['username']);
    $username_required->isValid($_POST['username']);
    $password->isValid($_POST['password']);

    // Usato per il caso dei radio
    // $value = isset($_POST['gender']) ? $_POST['gender'] :'';
    // $gender->isValid($value);
}

/** questo script viene eseguito quanod visualizzo per la prima volta il form */
// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
// }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Esercitazione Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <header class="bg-light p-1">
        <h1 class="display-6">Applicazione demo</h1>
    </header>
    <main class="container">

        <section class="row">
            <div class="col-sm-8">
                <form class="mt-1 mt-md-5" action="create-user.php" method="post">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">nome</label>
                        <input type="text" 
                            value="<?= $first_name->getValue() ?>"
                            class="form-control <?php echo !$first_name->getValid() ? 'is-invalid':''  ?>" 
                            name="first_name" 
                            id="first_name"
                        >
                      
                        <?php if (!$first_name->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?php echo $first_name->getMessage() ?>
                            </div>
                        <?php endif ?>


                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">cognome</label>
                        <input type="text"
                               id="last_name"
                               value="<?= $last_name->getValue() ?>"
                               name="last_name" 
                               class="form-control <?php echo !$last_name->getValid() ? 'is-invalid':'' ?>"
                               >
                        <?php if (!$last_name->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?php echo $last_name->getMessage() ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="mb-3">
                        <label for="birthday" class="form-label">Data Di Nascita</label>
                        <input type="date"
                               value="<?= $birtday->getValue() ?>"
                               class="form-control <?php echo !$birtday->getValid() ? 'is-invalid':'' ?>" 
                               name="birthday" 
                               id="birthday">
                        
                        <?php if (!$birtday->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?php echo $birtday->getMessage() ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="mb-3">
                        <label for="birth_place" class="form-label">luogo di nascita</label>
                        <input type="text" 
                               value="<?= $birth_place->getValue() ?>"
                               class="form-control <?php echo !$birth_place->getValid() ? 'is-invalid':'' ?>" 
                               name="birth_place" 
                               id="birth_place"
                               >
                        <?php if(!$birth_place->getValid()):?>
                            <div class="invalid-feedback">
                                <?php echo $birth_place->getMessage() ?>  
                            </div>
                        <?php endif; ?>
                    </div>

                <div class="mb-3">
                    <div class="row">
                    <div class="col">
                        
                        <label for="birth_city" class="form-label">Città</label>
                        <input type="text" class="form-control" name="birth_city" id="birth_city">


                    </div>
                    <div class="col">
                        
                        <label for="birth_region" class="form-label">Regione</label>
                        <select id="birth_region" class="form-select birth_region" name="birth_region">
                                <option value=""></option>
                                <?php foreach(Regione::all() as $regione) : ?> 
                                    <option value="<?= $regione->regione_id ?>"><?= $regione->nome ?></option>
                                <?php endforeach;  ?>
                        </select>

                        </div>
                        <div class="col">
                        <label for="birth_province" class="form-label">Provincia</label>
                        <select id="birth_province" class="form-select birth_province" name="birth_province">
                        <option value=""></option>
                                <?php foreach(Provincia::all() as $provincia) : ?> 
                                    <option value="<?= $provincia->provincia_id ?>"><?= $provincia->nome ?></option>
                                <?php endforeach;  ?>
                        </select>
                            
                    </div>
                    </div>
                </div>

                    <div class="mb-3">
                        <!-- <h1><?php echo $gender->getValue() == 'M' ? 'AA':'BB' ?></h1> -->
                        <label for="gender" class="form-label">Genere</label>
                        <select name="gender" class="form-select <?php echo !$gender->getValid() ? 'is-invalid' :'' ?>" id="gender">
                            <option value=""></option>
                            <option <?php echo $gender->getValue() == 'M' ? 'selected':''  ?> value="M">M</option>
                            <option <?php echo $gender->getValue() == 'F' ? 'selected':''  ?> value="F">F</option>
                        </select>
                        <?php
                        if (!$gender->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?php echo $gender->getMessage() ?>  
                            </div>
                        <?php endif; ?>
                        
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Nome Utente / EMAIL</label>
                        <input type="text" class="form-control 
                            <?php echo (!$username_email->getValid() && !$username_required->getValid()) ? 'is-invalid':'' ?>" name="username" id="username">
                        <?php
                        if (!$username_email->getValid()) : ?>
                            <div class="invalid-feedback">
                            <?php echo $username_email->getMessage() ?>
                            </div>
                        <?php endif ?>

                        <?php
                        if (!$username_required->getValid()) : ?>
                            <div class="invalid-feedback">
                            <?php echo $username_required->getMessage() ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" id="password" name="password" class="form-control <?php echo !$password->getValid() ? 'is-invalid' : ''  ?>">
                        <?php
                        if (!$password->getValid()) : ?>
                            <div class="invalid-feedback">
                               <?php echo $password->getMessage() ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <button class="btn btn-primary btn-sm" type="submit">Registrati</button>
                </form>
            </div>



      
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>