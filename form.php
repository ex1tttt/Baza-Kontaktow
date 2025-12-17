<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj kontakt - Baza Kontaktów</title>

    <!-- Własne style CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; padding-top: 20px; }
        .form-container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .header { background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white; padding: 25px; border-radius: 10px; margin-bottom: 30px; }
        h1 { font-weight: 600; }
        .btn-back { border-radius: 50px; padding: 8px 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header text-center">
            <h1><i class="fas fa-user-plus me-2"></i> Dodaj nowy kontakt</h1>
            <p class="mb-0">Wypełnij formularz aby dodać nowy kontakt</p>
        </div>
        
        <div class="form-container">
            <form action="save.php" method="POST">

                <!-- Pole: Imie -->

                <div class="mb-3">
                    <label for="imie" class="form-label"><i class="fas fa-user me-2"></i>Imię *</label>
                    <input type="text" class="form-control" id="imie" name="imie" required>
                </div>

                <!-- Pole: Nazwisko -->
                
                <div class="mb-3">
                    <label for="nazwisko" class="form-label"><i class="fas fa-user me-2"></i>Nazwisko *</label>
                    <input type="text" class="form-control" id="nazwisko" name="nazwisko" required>
                </div>

                <!-- Pole: Email -->
                
                <div class="mb-3">
                    <label for="email" class="form-label"><i class="fas fa-envelope me-2"></i>Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <!-- Pole: Telefon -->
                
                <div class="mb-4">
                    <label for="telefon" class="form-label"><i class="fas fa-phone me-2"></i>Telefon</label>
                    <input type="text" class="form-control" id="telefon" name="telefon">
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary btn-back"><i class="fas fa-arrow-left me-2"></i>Powrót</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save me-2"></i>Zapisz kontakt</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>