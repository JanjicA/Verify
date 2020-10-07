<body>

	<!-- main -->
	<div class="main-w3layouts wrapper">
        <?php 
             if(isset($_SESSION['users'])){
                if($_SESSION['users']->role_id == 1){
                    echo '
                    

                    <h1>Welcome, '. $_SESSION['users']->username. '</h1>

                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-6 text-right">
                                <a href="index.php?page=admin"><button type="button" class="btn btn-danger">ADMIN</button></a>
                            </div>
        
                            <div class="col-6 text-left">
                                <a href="logic/logout.php"><button type="button" class="btn btn-secondary">LOGOUT</button></a>
                            </div>
                        </div>
                    </div>
                    ';
                }

                elseif($_SESSION['users']->role_id == 2){
                    echo '
                    <h1>Welcome, '. $_SESSION['users']->username. '</h1>

                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-6 text-right">
                                <a href="index.php?page=userprofil"><button type="button" class="btn btn-danger">PROFIL</button></a>
                            </div>

                            <div class="col-6 text-left">
                                <a href="logic/logout.php"><button type="button" class="btn btn-secondary">LOGOUT</button></a>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }   

            
             else{
                 echo '
                 <h1>Hello, this is TEST!</h1>
     
                 <div class="container mt-5">
                     <div class="row">
                         <div class="col-6 text-right">
                             <a href="index.php?page=register"><button type="button" class="btn btn-success">SIGN UP</button></a>
                         </div>
     
                         <div class="col-6 text-left">
                             <a href="index.php?page=login"><button type="button" class="btn btn-primary">LOGIN</button></a>
                         </div>
                     </div>
                 </div>
                 ';
             }
?>

<div class="container">
                <div class="row">
                    <div class="col-12 text-center mt-5">
                        <h4 class="mt-5" style="color:white;">Link ka Git-u gde sam postavio kod je: <a href="https://github.com/JanjicA/Verify/upload/main" target="_blank">Verify</a></h4>
                    </div>
                </div>
             </div>
       
</body>

