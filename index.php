<?php
   session_start();
//include('class/products.php');

require_once('config/connection.php');
require_once('views/fixed/header.php');

if(!isset($_GET['page'])){

    require_once('views/pages/home.php');

}else{
    switch($_GET['page']){
        case 'login':
            require_once('views/pages/login.php');
            break;

        case 'register':
            require_once('views/pages/register.php');
            break;

        case 'admin':
            require_once('views/pages/admin.php');
            break;
            
        case 'userprofil':
        require_once('views/pages/userprofil.php');
            break;

        case 'password':
            require_once('views/pages/password.php');
            break;

        case 'verification':
            require_once('views/pages/verification.php');
            break;
        case 'thankyou':
            require_once('views/pages/thankyou.php');
            break;
    }
    
}


require_once('views/fixed/footer.php');






?>
