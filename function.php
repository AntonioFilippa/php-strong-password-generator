<?php
//DEFINIAMO UNA LUNGHEZZA MASSIMA PER EVITARE CHE L'UTENTE INSERISCA UNA LUNGHEZZA TROPPO GRANDE
define('MAX_PASSWORD_LENGTH', 128);
//Funzione per generare la password casuale con lunghezza specificatra tramite form con metodo GET
function generateRandomPassword($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_-+=[]{}|;:,.<>?';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//Inizializziamo una variabile errore
$errorMsg = '';
//Se la lunghezza della password è stata passata tramite GET
if(isset($_GET['length'])){
    $length = intval($_GET['length']);
    // Se la lunghezza è minore di 1
    if ($length > MAX_PASSWORD_LENGTH) {
        // DARE ERRORE SE LA LUNGHEZZA INSERITA E' MAGGIORE DI QUELLA MASSIMA
        $errorMsg = 'La lunghezza massima consentita per la password è ' . MAX_PASSWORD_LENGTH . ' caratteri.';
        
    } else {
        $password = generateRandomPassword($length);
    }
}
else{
    $password = '';
}