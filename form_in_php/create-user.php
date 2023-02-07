<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <header class="bg-light p-1">
        <h1 class="display-6">Applicazione demo</h1>
    </header>
    <main class="container">

        <section class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4">
                <form class="mt-1 mt-md-5" action="register-user.php" method="get">
                    <div class="mb-3">
                        <label for="text" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="first_name" id="first_name">
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Cognome</label>
                        <input type="text" class="form-control" name="last_name" id="last_name">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Data di nascita</label>
                        <input type="date" class="form-control" name="birthday" id="birthday">
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Luogo di nascita</label>
                        <input type="text" class="form-control" name="birth_place" id="birth_place">
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Sesso</label>
                        <select  class="form-control" name="gender" id="gender">
                        <option>M</option>
                        <option>F</option>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Nome utente</label>
                        <input type="email" class="form-control" name="username" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit"> Registrati </button>
                </form>



            </div>

            <div class="col-sm-4">
            </div>
        </section>


    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>