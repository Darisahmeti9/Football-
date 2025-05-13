<?php
if (isset($_GET['index'])) {
    $index = $_GET['index'];
    $lines = file("users.txt");
    unset($lines[$index]);
    file_put_contents("users.txt", implode("", $lines));
}
header("Location: admin.php");
exit();
?>
