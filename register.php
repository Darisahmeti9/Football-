<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Regjistrohu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Futboll Fanatik</h1>
    <nav>
        <a href="index.html">Home</a>
        <a href="shop.html">Shop</a>
        <a href="register.php">Regjistrohu</a>
        <a href="admin.php">Admin</a>
    </nav>
</header>

    <main>
    <form method="post">
    <label>Emri:</label>
    <input type="text" name="emri" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <label>Mosha:</label>
    <input type="number" name="mosha" required><br>

    <label>Numri i telefonit:</label>
    <input type="text" name="telefoni" required><br>

    <label>Pozita që dëshiron të luash:</label>
    <select name="pozita">
        <option value="Portier">Portier</option>
        <option value="Mbrojtës">Mbrojtës</option>
        <option value="Mesfushor">Mesfushor</option>
        <option value="Sulmues">Sulmues</option>
    </select><br>

    <label>Zgjedh Ekipin:</label>
    <select name="ekipi">
        <option value="Real Madrid">Real Madrid</option>
        <option value="FC Barcelona">FC Barcelona</option>
        <option value="Manchester United">Manchester United</option>
        <option value="Juventus">Juventus</option>
    </select><br>

    <button type="submit" name="submit">Regjistrohu</button>
</form>


        <?php
        if (isset($_POST['submit'])) {
            $emri = $_POST['emri'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $mosha = $_POST['mosha'];
            $telefoni = $_POST['telefoni'];
            $pozita = $_POST['pozita'];
            $ekipi = $_POST['ekipi'];
        
            $rreshti = "$emri|$email|$password|$mosha|$telefoni|$pozita|$ekipi\n";
            file_put_contents("users.txt", $rreshti, FILE_APPEND);
            echo "<p class='success'>Regjistrimi u bë me sukses!</p>";
        }
        
        
        ?>
    </main>
</body>
</html>

