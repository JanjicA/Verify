<?php
    session_start();
    require_once(__DIR__.'/../config/connection.php');

    require_once "../functions/functions.php";

    if($_SERVER["REQUEST_METHOD"] != 'POST'){
        http_response_code(404);
        exit;
    }

    $id = $_SESSION['users']->id;


    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];

    $rePassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

    $oldpass = md5($oldpass);
    $newpass = md5($newpass);

    $loginpass = $conn->prepare('SELECT * FROM users WHERE password = ?');
    $newpassword = $loginpass->execute([$oldpass]);

    if($newpassword){
        if($loginpass->rowCount() == 1){

            changePassword($id, $newpass);
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('You are change your password successfuly!');
                window.location.href='../index.php?page=userprofil';
                </script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Something was wrong!');
            window.location.href='../index.php?page=userprofil';
        </script>");
        }
    }
    else
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Your EMAIL or PASSWORD was wrong!');
        window.location.href='../index.php?page=register';
    </script>");
    }
    