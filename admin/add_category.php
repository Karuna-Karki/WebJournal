<?php
require_once("../db/connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["addCategory"])) {
    $categoryName = $_POST["categoryName"];

    $stmt = $conn->prepare("INSERT INTO categories (category_name) VALUES (?)");
    $stmt->bind_param("s", $categoryName);
    $result = $stmt->execute();

    if ($result) {
        echo "success";
    } else {
        echo "Error adding category.";
    }

    $stmt->close();
}
?>
