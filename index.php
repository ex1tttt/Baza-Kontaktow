<?php
require_once 'db.php';

// Wyszukiwanie kontaktow
$search = '';
if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM kontakt WHERE imie LIKE :search OR nazwisko LIKE :search OR email LIKE :search OR telefon LIKE :search";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['search' => "%$search%"]);
} else {
    $sql = "SELECT * FROM kontakt ORDER BY nazwisko, imie";
    $stmt = $pdo->query($sql);
}
$kontakty = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baza Kontaktów</title>

    <!-- CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; padding-top: 20px; }
        .header { background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white; padding: 30px 0; margin-bottom: 30px; border-radius: 10px; }
        .table-container { background: white; padding: 25px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .search-box { max-width: 400px; }
        .btn-add { border-radius: 50px; padding: 10px 25px; }
        .action-buttons .btn { margin-right: 5px; }
        .table th { border-top: none; background-color: #f8f9fa; }
        h1 { font-weight: 600; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header text-center">
            <h1><i class="fas fa-address-book me-2"></i> Baza Kontaktów</h1>
            <p class="lead mb-0">Zarządzaj swoimi kontaktami w jednym miejscu</p>
        </div>
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <form method="GET" class="d-flex search-box">
                <input type="text" class="form-control me-2" name="search" placeholder="Szukaj kontaktu..." value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                <?php if(!empty($search)): ?>
                    <a href="index.php" class="btn btn-outline-secondary ms-2"><i class="fas fa-times"></i></a>
                <?php endif; ?>
            </form>
            <a href="form.php" class="btn btn-success btn-add"><i class="fas fa-plus me-2"></i>Dodaj kontakt</a>
        </div>
        
        <div class="table-container">
            <?php if(count($kontakty) > 0): ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Imię</th>
                                <th>Nazwisko</th>
                                <th>Email</th>
                                <th>Telefon</th>
                                <th class="text-end">Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($kontakty as $kontakt): ?>
                            <tr>
                                <td><?php echo $kontakt['id']; ?></td>
                                <td><?php echo htmlspecialchars($kontakt['imie']); ?></td>
                                <td><?php echo htmlspecialchars($kontakt['nazwisko']); ?></td>
                                <td><a href="mailto:<?php echo htmlspecialchars($kontakt['email']); ?>"><?php echo htmlspecialchars($kontakt['email']); ?></a></td>
                                <td><a href="tel:<?php echo htmlspecialchars($kontakt['telefon']); ?>"><?php echo htmlspecialchars($kontakt['telefon']); ?></a></td>
                                <td class="text-end action-buttons">
                                    <a href="edit.php?id=<?php echo $kontakt['id']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="delete.php?id=<?php echo $kontakt['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć ten kontakt?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-users fa-4x text-muted mb-3"></i>
                    <h3>Brak kontaktów</h3>
                    <p class="text-muted"><?php echo !empty($search) ? 'Brak wyników wyszukiwania.' : 'Dodaj swój pierwszy kontakt.'; ?></p>
                    <?php if(empty($search)): ?>
                        <a href="form.php" class="btn btn-success mt-2"><i class="fas fa-plus me-2"></i>Dodaj pierwszy kontakt</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <footer class="mt-4 text-center text-muted">
            <p>Baza kontaktów <?php echo date('Y'); ?></p>
        </footer>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>