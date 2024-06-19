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
    // Validate the requested password length
    if ($length > MAX_PASSWORD_LENGTH) {
        // DARE ERRORE SE LA LUNGHEZZA INSERITA E' MAGGIORE DI QUELLA MASSIMA
        $errorMsg = 'La lunghezza massima consentita per la password è ' . MAX_PASSWORD_LENGTH . ' caratteri.';
        $password = '';
    } else {
        $password = generateRandomPassword($length);
    }
}
else{
    $password = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generatore di Password casuale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="text-white bg-dark">
    <!-- ERROR MESSAGE -->
    <?php if($errorMsg != ''): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($errorMsg); ?>
        </div>
    <?php endif; ?>
   
<!-- Navbar -->

<nav class="navbar navbar-dark bg-primary">

<div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Antonio Filippa</span>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Card -->
                <div class="card text-dark bg-light">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Generatore di Password Insicure</h1>
                        <form action="index.php" method="GET">
                            <div class="mb-3">
                                <label for="length" class="form-label">Lunghezza Password</label>
                                <input type="number" class="form-control" id="length" name="length" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Genera Password</button>
                        </form>
                        <?php if($password != ''): ?>
                            <div class="alert alert-success mt-3" role="alert">
                                Password generata: <?php echo htmlspecialchars($password); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>