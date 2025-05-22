<?php 
// Start session and include database connection
session_start();
include_once('config.php');

// Get product ID from URL
$id = $_GET['id'];

// Fetch the product details
$sql = "SELECT * FROM products WHERE id = :id";
$selectProduct = $conn->prepare($sql);
$selectProduct->bindParam(':id', $id);
$selectProduct->execute();

$product_data = $selectProduct->fetch();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo "Welcome to dashboard " . $_SESSION['username']; ?></a>
  <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php">Dashboard</a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Product Details</h1>
      </div>

      <form action="update_product.php" method="post">
        <div class="form-floating mb-3">
          <input readonly type="text" class="form-control" name="id" value="<?php echo $product_data['id']; ?>">
          <label>ID</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="product_name" value="<?php echo $product_data['product_name']; ?>">
          <label>Product Name</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="product_desc" value="<?php echo $product_data['product_desc']; ?>">
          <label>Product Description</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="product_quality" value="<?php echo $product_data['product_quality']; ?>">
          <label>Product Quality</label>
        </div>
        <div class="form-floating mb-3">
          <input type="number" class="form-control" name="product_rating" value="<?php echo $product_data['product_rating']; ?>">
          <label>Product Rating</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit1">Update Product</button>
      </form>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
