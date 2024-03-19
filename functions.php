<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // funzione per generare una password casuale
    function getRandomPassword($lenght) {
        $password = "";
        
        // stringa di caratteri da cui prendo la mia password
        $password_string = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()";

        $password_filtered = $password_string;

        // se la checkbox "solo numeri" è attiva
        if(isset($_GET['only-number']) && $_GET['only-number']) {
            
            // prendo solo i numeri
            $password_filtered = substr($password_string, 0, 10);
            
            // se è attiva anche quella "solo lettere"
            if(isset($_GET['only-characters']) && $_GET['only-characters']) {
                $password_filtered .= substr($password_string, 10, 52);
            };
            
            // se è attiva anche quella "solo simboli"
            if(isset($_GET['only-symbols']) && $_GET['only-symbols']) {
                $password_filtered = $password_string;
            };

        };

        // se è attiva solo la checkbox "solo lettere"
        if(isset($_GET['only-characters'])) {
            $password_filtered = substr($password_string, 10, 52);
        };

        // // se è attiva solo la checkbox "solo simboli"
        // if(isset($_GET['only-symbols']) && $_GET['only-symbols']) {
        //     $password_filtered = substr($password_string, 62, 11);
        // };


        for($i = 0; $i < $lenght; $i++) {
            // genero un numero casuale da 0 a $password_string.lenght
            $rand = rand(0, (strlen($password_filtered) - 1));

            $password .= $password_filtered[$rand];
        };

        return $password;
        
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

        <div class="password">
            <span>La tua password è:</span>
            <div class="col-12 overflow-x-auto">
                <?php
                    $random_password = getRandomPassword($password_lenght);

                    echo $random_password;
                ?>
            </div>
        </div>
    

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>