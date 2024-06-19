<?php
session_start(); // Avvia la sessione all'inizio del file

define('MAX_PASSWORD_LENGTH', 128);

function generateRandomPassword($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_-+=[]{}|;:,.<>?';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$errorMsg = '';
if(isset($_GET['length'])){
    $length = intval($_GET['length']);
    if ($length > MAX_PASSWORD_LENGTH) {
        $errorMsg = 'La lunghezza massima consentita per la password è ' . MAX_PASSWORD_LENGTH . ' caratteri.';
        $_SESSION['errorMsg'] = $errorMsg; // Salva l'errore in sessione
        header("Location: errore.php"); // Redirect a una pagina di errore
        exit;
    } else {
        $_SESSION['password'] = generateRandomPassword($length); // Salva la password in sessione
        header("Location: mostra_password.php"); // Redirect alla pagina per mostrare la password
        exit;
    }
}