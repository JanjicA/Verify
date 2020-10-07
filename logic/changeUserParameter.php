<?php

require_once(__DIR__.'/../config/connection.php');

require_once "../functions/functions.php";

if(isset($_POST['change1'])){
    $id = $_POST['hdnChange1'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    try{
        changeUserParameter($id, $email, $username);

        header("Location: ../index.php?page=userprofil");

    }catch(PDOException $e){
        $e->getMessage();
        http_response_code(500);
    }
    }else{
        http_response_code(400);
}