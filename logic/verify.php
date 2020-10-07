<?php
        session_start();
        if(isset($_GET['vkey'])){
            $vkey = $_GET['vkey'];

            require_once(__DIR__.'/../config/connection.php');
            require_once "../functions/functions.php";
    
            $resulteSet = $conn->prepare("SELECT * FROM users WHERE isActive = 0 AND vkey = ? LIMIT 1");
            $provera = $resulteSet->execute([$vkey]);
    
            if($resulteSet->rowCount() == 1){
                verify($vkey);

                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Congratulations, you have successfully logged in!');
                window.location.href='../index.php?page=login';
                </script>");
            }

            else
            {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('This is not correct KEY!');
                window.location.href='../index.php';
                </script>");
            }
        }
        
        else
        {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('This is not correct VKEY!');
            window.location.href='../../index.php';
            </script>");
        }