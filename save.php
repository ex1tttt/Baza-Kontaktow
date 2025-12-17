<?php
require_once 'db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imie = trim($_POST['imie']);
    $nazwisko = trim($_POST['nazwisko']);
    $email = trim($_POST['email']);
    $telefon = trim($_POST['telefon']);
    
    if(empty($imie) || empty($nazwisko)) {
        die("Imię i nazwisko są wymagane!");
    }
    
    // Zapisz do bazy danych
    $sql = "INSERT INTO kontakt (imie, nazwisko, email, telefon) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if($stmt->execute([$imie, $nazwisko, $email, $telefon])) {
        header("Location: index.php?success=1");
        exit();
    } else {
        die("Wystąpił błąd podczas zapisywania kontaktu!");
    }
} else {
    header("Location: form.php");
    exit();
}
?>