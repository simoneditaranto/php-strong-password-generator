<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "./functions.php";

    if(isset($_GET['input-password']) && $_GET['input-password'] != ' ') {
        // input dell'utente
        $password_lenght = $_GET['input-password'];

        $random_password = getRandomPassword($password_lenght);
        // echo $random_password;

        session_start();

        $_SESSION['password'] = $random_password;
        
        header('Location: new-password.php');

    }


?>

<!DOCTYPE html>
<html lang="it">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong password</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <h1>Password generator</h1>

        <form>
            <div class="mb-3">
                <label for="input-password" class="form-label">Inserisci la lunghezza della password</label>
                <input type="number" min="0" class="form-control" id="input-password" name="input-password">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="only-number" name="only-number" value="true">
                <label class="form-check-label" for="only-number">Password con numeri</label>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="only-characters" name="only-characters" value="true">
                <label class="form-check-label" for="only-characters">Password con lettere</label>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="only-symbols" name="only-symbols" value="true">
                <label class="form-check-label" for="only-symbols">Password con simboli</label>
            </div>

            <button type="submit" class="btn btn-primary">Genera la tua password</button>
        </form>

    </div>
    

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>