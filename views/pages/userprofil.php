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
                                <a href="logic/logout.php"><button type="button" class="btn btn-secondary">LOGOUT</button></a>
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
                <div class="col-12 text-center table-responsive">

                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>CreatedOn</th>
                                <th>Update</th>
                                <th>Change Password</th>
                            </tr>
                        </thead>

                        <tbody id="ispis">
                        <?php
                            $id = $_SESSION['users']->id;
                                $getall = $conn->query("SELECT *  FROM users WHERE id = $id")->fetchAll();
                                foreach($getall as $n):?>
                                <tr>
                                    <td><?=$n->username?></td>
                                    <td><?=$n->email?></td> 
                                    <td><?=$n->created_on?></td>
                                    <td>
                                        <a href="#" class="btn btn-info promeni-parametre" data-id="<?= $n->id ?>" data-toggle="modal" data-target="#myModalUser">&nbspEdit&nbsp</a>
                                    </td>
                                    <td>
                                        <a href="index.php?page=password" class="btn btn-danger" data-id="<?= $n->id ?>">Change Password</a>
                                    </td>
                                </tr>
                            <?php
                                endforeach
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal products -->
<div id="myModalUser" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <form action="logic/changeUserParameter.php" method="POST">
                <input type="hidden" name="hdnChange1" id="hdnIdUserChange1"/>   

                <div class="form-group">
                    <label for="first-name">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Change Username">
                </div>

                <div class="form-group">
                    <label for="first-name">Email</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Change Email">
                </div>
            
                <button type="submit" name="change1" class="btn btn-primary">Change my parameter</button>
            </form>
            </div>
            
        </div>
    </div>
</div>