<body>

	<!-- main -->
	<div class="main-w3layouts wrapper">

        <?php 

            if(isset($_SESSION['users'])){
                if($_SESSION['users']->role_id == 1){

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
                        <h2 class="mb-3" style="color:white">All users</h2>
                    <table class="table table-dark" style="width:100%;">
                        <thead>
                            <tr>
                                <th><strong>Username</strong> </th>
                                <th><strong>Email</strong></th>
                                <th><strong>isActive</strong></th>
                                <th><strong>Update</strong></th>
                            </tr>
                        </thead>

                        <tbody id="ispis">
                            <?php
                                $getall = $conn->query("SELECT *  FROM users")->fetchAll();
                                foreach($getall as $n):?>
                                <tr>
                                    <td><?=$n->username?></td>
                                    <td><?=$n->email?></td> 
                                    <td><?=$n->isActive?></td>
                                    <td>
                                        <a href="#" class="btn btn-info promeni-korisnika" data-id="<?= $n->id ?>" data-toggle="modal" data-target="#myModal">&nbspEdit&nbsp</a>
                                        <a href="#" class="btn btn-danger izbrisi-korisnika" data-id="<?= $n->id ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php
                                endforeach
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="row">
                <div class="col-12 text-right">
                    <p>1 is to be ACTIVE <br> 0 is to be INACTIVE</p>
                </div>
            </div>
        </div>
    </div>

<!-- Modal products -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <form action="logic/changeUser.php" method="POST">
            <input type="hidden" name="hdnChange" id="hdnIdUserChange"/>    
                <div class="form-group">
                    <label for="first-name">Activiti</label>
                    <input type="text" id="isActive" name="isActive" class="form-control" placeholder="Activiti">
                </div>
            
                <button type="submit" name="change" class="btn btn-primary">Change Users Activiti</button>
            </form>
            </div>
            
        </div>
    </div>
</div>