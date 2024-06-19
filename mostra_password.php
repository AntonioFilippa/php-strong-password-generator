<?php
session_start(); // Avvia la sessione

if(isset($_SESSION['password'])){
    echo "La tua password generata è: " . $_SESSION['password'];
    unset($_SESSION['password']); // Opzionale: rimuovi la password dalla sessione dopo averla mostrata
} else {
    echo "Nessuna password generata.";
}