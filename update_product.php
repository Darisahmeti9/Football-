<?php 
include_once('config.php');

if (isset($_POST['submit1'])) {
    $id              = $_POST['id'];
    $product_name    = $_POST['product_name'];
    $product_desc    = $_POST['product_desc'];
    $product_quality = $_POST['product_quality'];
    $product_rating  = $_POST['product_rating'];

    $sql = "UPDATE products 
            SET product_name = :product_name, 
                product_desc = :product_desc, 
                product_quality = :product_quality, 
                product_rating = :product_rating 
            WHERE id = :id";

    $update = $conn->prepare($sql);
    $update->bindParam(':product_name', $product_name);
    $update->bindParam(':product_desc', $product_desc);
    $update->bindParam(':product_quality', $product_quality);
    $update->bindParam(':product_rating', $product_rating);
    $update->bindParam(':id', $id);

    $update->execute();

    header("Location: list_products.php");
}
?>
