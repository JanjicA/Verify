<?php

    session_start();
    require_once(__DIR__.'/../config/connection.php');

    if($_SERVER["REQUEST_METHOD"] != 'POST'){
        http_response_code(404);
        exit;
    }


    $email = $_POST['email'];
    $password = $_POST['password'];

    $rePassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

    $password = md5($password);

    $login = $conn->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
    $provera = $login->execute([$email, $password]);
    
    if($provera){
        if($login->rowCount() == 1){
            $userlogin = $login->fetch();

            if($userlogin->isActive == 1){

                $_SESSION['users'] = $userlogin;

                if($_SESSION['users']->role_id == 2){
                    header("Location: ../index.php");
                }elseif($_SESSION['users']->role_id == 1){
                    header("Location: ../index.php");
                }
            }
            else{
                echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Unfortunately your account is NOT active anymore!');
                        window.location.href='../index.php?page=register';
                    </script>");
            }
        
            
               
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Your EMAIL or PASSWORD was wrong!');
            window.location.href='../index.php?page=login';
        </script>");
        }
    }
    else
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Your EMAIL or PASSWORD was wrong!');
        window.location.href='../index.php?page=login';
    </script>");
    }
?>
