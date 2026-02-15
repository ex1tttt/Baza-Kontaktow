<?php
require_once 'db.php';

if(!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// Usun z bazy danych
$sql = "DELETE FROM kontakt WHERE id = ?";
$stmt = $pdo->prepare($sql);

if($stmt->execute([$id])) {
    header("Location: index.php?deleted=1");
    exit();
} else {
    die("Wystąpił błąd podczas usuwania kontaktu!");
}
?>
