<?php
require_once("../db/connect.php");

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $categoryId = $_GET["id"];

    $stmt = $conn->prepare("SELECT * FROM categories WHERE id = ?");
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();
    $category = $result->fetch_assoc();

    header("Content-Type: application/json");
    echo json_encode($category);

    $stmt->close();
}
?>
