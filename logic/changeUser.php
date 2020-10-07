<?php

require_once(__DIR__.'/../config/connection.php');

require_once "../functions/functions.php";

if(isset($_POST['change'])){
    $id = $_POST['hdnChange'];
    $isActive = $_POST['isActive'];


    try{
        changeUser($id, $isActive);
            header("Location: ../index.php?page=admin");
      
    }catch(PDOException $e){
        $e->getMessage();
        http_response_code(500);
    }
}else{
    http_response_code(400);
}