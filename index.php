<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // input dell'utente
    $password_lenght = $_GET['input-password'];

    // funzione per generare una password casuale
    function getRandomPassword($lenght) {
        $password = "";
        
        // stringa di caratteri da cui prendo la mia password
        $password_string = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()";

        for($i = 0; $i < $lenght; $i++) {
            // genero un numero casuale da 0 a $password_string.lenght
            $rand = rand(0, (strlen($password_string) - 1));
            
            $password .= $password_string[$rand];
        }

        return $password;
        
    }



?>

<!DOCTYPE html>
<html lang="en">
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

        <form for="index.php">
            <div class="mb-3">
                <label for="input-password" class="form-label">Inserisci la lunghezza della password</label>
                <input type="number" min="0" class="form-control" id="input-password" name="input-password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div class="password">
            <span>La tua password è:</span>
            <div class="col-12 overflow-x-auto">
                <?php
                    $random_password = getRandomPassword($password_lenght);

                    echo $random_password;
                ?>
            </div>
        </div>

    </div>
    

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>