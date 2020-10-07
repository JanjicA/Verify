<?php

header('Content-Type: application/json');

require_once(__DIR__.'/../config/connection.php');
require_once "../functions/functions.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    try {
        $query = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $query->execute([$id]);
        $proizvodi = $query->fetch();

        echo json_encode($proizvodi);
    } catch (PDOException $e) {
        $e->getMessage();
        http_response_code(500);
    }
} else {
    http_response_code(400);
}