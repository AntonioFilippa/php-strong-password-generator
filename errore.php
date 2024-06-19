<?php
session_start(); // Avvia la sessione

if(isset($_SESSION['errorMsg'])){
    echo $_SESSION['errorMsg'];
    unset($_SESSION['errorMsg']); // Pulisci il messaggio di errore dalla sessione
} else {
    echo "Si è verificato un errore.";
}