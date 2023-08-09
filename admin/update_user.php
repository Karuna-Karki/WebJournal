<?php
require_once("../db/connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["updateUser"])) {
    $userId = $_POST["userId"];
    $updatedUsername = $_POST["updatedUsername"];
    $updatedEmail = $_POST["updatedEmail"];

    $stmt = $conn->prepare("UPDATE register SET username = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $updatedUsername, $updatedEmail, $userId);
    $result = $stmt->execute();

    if ($result) {
        echo "success";
    } else {
        echo "Error updating user.";
    }

    $stmt->close();
}
?>
