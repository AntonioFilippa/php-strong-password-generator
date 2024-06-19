<?php
require_once 'function.php'; 
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