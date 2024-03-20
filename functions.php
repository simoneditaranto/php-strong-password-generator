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

