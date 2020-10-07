<?php

header("Content-Type: application/json");


require_once(__DIR__.'/../config/connection.php');

$users = $conn->query('SELECT * FROM users')->fetchAll();

echo json_encode($users);
