<body>

	<!-- main -->
	<div class="main-w3layouts wrapper">

        <?php 

            if(isset($_SESSION['users'])){
                if($_SESSION['users']->role_id == 2){

                    require_once (__DIR__ . "/../../config/connection.php");

                    echo '
                    
                    <h1>Welcome, '. $_SESSION['users']->username. '</h1>

                    <div class="container mt-5 mb-5">
                        <div class="row">
                            <div class="col-6 text-right">
                                <a href="index.php"><button type="button" class="btn btn-danger">HOME</button></a>
                            </div>

                            <div class="col-6 text-left">
                                <a href="index.php?page=userprofil"><button type="button" class="btn btn-secondary">PROFILE</button></a>
                            </div>
                        </div>
                    </div>
                    ';
                }

                else{
                    header("Location: ../index.php");
                }
            }

            else{
                header("Location: ../index.php");
            }
            ?>



        <div class="container mt-5">
            <div class="row">
                <div class="col-12 text-center">

                    
                    <!-- main -->
                    <div class="main-w3layouts wrapper">
                    
                        <h2 style="color:white">You can change your password here!</h2>

                        <div class="main-agileinfo">
                            <div class="agileits-top">
                            
                                <form action="logic/password.php" method="post">
                                    <div class="alert alert-danger">
                                        
                                    </div>

                                    <input type="password" name="oldpass" id="oldpass" placeholder="Enter old password"/>
                                    <input type="password" name="newpass" id="newpass" placeholder="Enter new password"/>
                                    <input type="password" name="confnewpass" id="confnewpass" placeholder="Confirm new password"/>
                                    
                                    <button type="submit" name="chpass" id="chpass" class="btn btn-primary btn-block btn-lg"> Change Password</button>
                                    
                                </form>
                            </div>
                        </div>
                    <!-- //main -->

                </div>
            </div>
        </div>
    </div>
