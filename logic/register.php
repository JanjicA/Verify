<?php

    session_start();
    require_once(__DIR__.'/../config/connection.php');

    if($_SERVER["REQUEST_METHOD"] != 'POST'){
        http_response_code(404);
        exit;
    }

    $errors = [];

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];

    $reUsername = "/^([A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]*$/";
    $rePassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

    if(!isset($_POST['username'])){
        $errors[] = 'Enter your username';
    }

    if(!isset($_POST['email'])){
        $errors[] = 'Enter your email';
    }

    if(!isset($_POST['password'])){
        $errors[] = 'Enter your password';
    }
    
    if(!isset($_POST['confpassword'])){
        $errors[] = 'Enter your confpassword';
    }

    if(!preg_match($reUsername, $username)){
        $errors[] = "Korisnik nije ok";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Email nije ok";
    }

    // if(!preg_match($rePassword, $password)){
    //     $errors[] = "Lozinka nije ok";
    // }

    if($password != $confpassword){
        $errors[] = "Lozinke se ne podudaraju";
    }


    if(count($errors) == 0){
        
        $vkey = md5(time());

        $password = md5($password);
        $datum = date("Y-m-d H:i:s");

        $unosKorisnika = $conn->prepare("INSERT INTO users VALUES (NULL, ?, ?, 0, ?, 2, ?, ?)" );
        
        try{
            $unosKorisnika->execute([$username, $password, $datum, $email, $vkey]);

            // $_SESSION['uspeh'] = ["Uspesno ste se registrovali!"];
            // header("Location: ../index.php?page=login");

            if($unosKorisnika){
                $to = $email;
                $subject = "Email verification";
                $message = "<a href='http://verify-test.rf.gd/logic/verify.php?vkey=$vkey'>Register Account</a>";
                $headers = "From: acojanjic995@gmail.com \r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                mail($to, $subject, $message, $headers);

                header("Location: ../index.php?page=thankyou");
            }
        }

        //kad bacim na stranicuda se logovao ide ono page=...

        catch(PDOException $e){
            $_SESSION['greske'] = ["Vec postoji korisnik sa tim email!"];

            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Someone already has account with this EMAIL!');
                    window.location.href='../index.php?page=register';
                </script>");
        }
    }
    else
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Something is wrong!');
        window.location.href='../index.php?page=register';
    </script>");
    }
?>