<?php 
/* 
  Përfshijmë config.php për lidhje me databazën.
  Fshijmë një produkt bazuar në ID-në e tij.
*/
include_once('config.php');

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id = :id";
$prep = $conn->prepare($sql);
$prep->bindParam(':id', $id);
$prep->execute();

// Pasi fshihet, kthehemi në faqen e listës së produkteve
header("Location: list_products.php");
?>
