<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Regjistrohu</title>
    <link rel="stylesheet" href="style.css">
    <style>

		
	</style>
</head>
<body>
<header>
    <h1>Futboll </h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="shop.php">Shop</a>
        <a href="signup.php">Regjistrohu</a>
        <a href="admin.php">Admin</a>
    </nav>
</header>

<main class="form-signin">
<form action="register.php" method="post">
    
    <h1 class="h3 mb-3 fw-normal">Register</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Emri" name="emri">
      
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
     
    </div>
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email">
     
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingInput" placeholder="Password" name="password">
      
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" name="confirm_password">
     
    </div>

    
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign up</button>
    <span>Already have an account: </span><a href="login.php">Sign in</a>
  </form>
      </main>


    
    
</body>
</html>

