<?php
require_once("../db/connect.php");

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $userId = $_GET["id"];

    $stmt = $conn->prepare("SELECT * FROM register WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    header("Content-Type: application/json");
    echo json_encode($user);

    $stmt->close();
}
?>
