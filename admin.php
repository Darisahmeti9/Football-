<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Lista e Regjistrimeve</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Futboll Fanatik</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="shop.php">Shop</a>
        <a href="signup.php">Regjistrohu</a>
        <a href="admin.php">Admin</a>
    </nav>
</header>

    <main>
        <h2>Regjistrime:</h2>
        <ul>
        <?php
        $lines = file("users.txt");
        foreach ($lines as $index => $line) {
            list($emri, $email, $ekipi) = explode('|', trim($line));
            echo "<li>$emri - $email - $ekipi 
                <a href='delete.php?index=$index' onclick='return confirm(\"A je i sigurt që do ta fshish?\")'>[Fshi]</a></li>";
        }
        $lines = file("users.txt");
        foreach ($lines as $index => $line) {
            list($emri, $email, $password, $mosha, $telefoni, $pozita, $ekipi) = explode('|', trim($line));
    echo "<li>
        <strong>$emri</strong>, Email: $email, Mosha: $mosha, Tel: $telefoni, Pozita: $pozita, Ekipi: $ekipi 
        <a href='delete.php?index=$index' onclick='return confirm(\"A je i sigurt që dëshiron të fshish këtë regjistrim?\")'>[Fshi]</a>
    </li>";
}

        ?>
        </ul>
    </main>

</body>
</html>
