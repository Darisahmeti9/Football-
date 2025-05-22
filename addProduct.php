<?php

// Include database connection
include_once('config.php');

if (isset($_POST['submit'])) {
    // Get form values
    $product_name     = $_POST['product_name'];
    $product_desc     = $_POST['product_desc'];
    $product_quality  = $_POST['product_quality'];
    $product_rating   = $_POST['product_rating'];

    // Handle uploaded image
    $product_image = $_FILES['product_image']['name'];
    $image_tmp     = $_FILES['product_image']['tmp_name'];
    $upload_dir    = "uploads/";

    // Create upload folder if it doesn't exist
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Move the uploaded file
    move_uploaded_file($image_tmp, $upload_dir . $product_image);

    // Prepare SQL
    $sql = "INSERT INTO products (product_name, product_desc, product_quality, product_rating, product_image)
            VALUES (:product_name, :product_desc, :product_quality, :product_rating, :product_image)";

    $insertProduct = $conn->prepare($sql);

    // Bind form values
    $insertProduct->bindParam(':product_name', $product_name);
    $insertProduct->bindParam(':product_desc', $product_desc);
    $insertProduct->bindParam(':product_quality', $product_quality);
    $insertProduct->bindParam(':product_rating', $product_rating);
    $insertProduct->bindParam(':product_image', $product_image);

    // Execute the insert
    $insertProduct->execute();

    // Redirect to the product list page
    header("Location: list_products.php");
}
?>
