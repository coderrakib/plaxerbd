<?php 

    require_once ('config.php'); 
    
    $user = $_SESSION['front_user'];

    $users = new Users;
    $users->getUsers(['user_name', '=', $user]);
    $query = $users->query;

    $result = $query->fetch_assoc();
    $type   = $result['type'];


?>
<!doctype html>
<html lang="en">
 
<head>
    <?php require_once ('include/css.php');
        echo '<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>';
    ?>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <?php require_once ('include/navbar.php');?>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php require_once ('include/leftsidebar.php');?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <?php

            $t_id       = (string) $_GET['Tid'];
            $tournament = new Tournament;
            $tournament->gettournament(['tournament_id','=',$t_id]);
            $query      = $tournament->query;
            $result     = $query->fetch_assoc();
            $t_name     = $result['tournament_name'];
            $t_map      = $result['tournament_map'];
        ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title"> <?php echo $t_name; ?> (<?php echo $t_map; ?>) </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo 'dashboard.php'; ?>" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href='<?php echo "running-tournament.php?Tid=$t_id"; ?>' class="breadcrumb-link"><?php echo $t_name; ?> (<?php echo $t_map; ?>)</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h3 class="card-header">All Participants</h3>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Full Name</th>
                                      <th>Free Fire Id</th>
                                      <th>Level</th>
                                      <th>Trxid</th>
                                      <th>Counter Code</th>
                                      <th>Bkash</th>
                                      <?php if($type == 'Administrator'){ ?>
                                      <th>Checked</th>
                                      <th>Status</th>
                                       <?php } ?>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                     <th>#</th>
                                      <th>Full Name</th>
                                      <th>Free Fire Id</th>
                                      <th>Level</th>
                                      <th>Trxid</th>
                                      <th>Counter Code</th>
                                      <th>Bkash</th>
                                      <?php if($type == 'Administrator'){ ?>
                                      <th>Checked</th>
                                      <th>Status</th>
                                       <?php } ?>
                                    </tr>
                                  </tfoot>
                                  <tbody>
                                    <?php 

                                        $running        = new RunningTournament;
                                        $running->getrunning(['tournament_id','=',$t_id]);
                                        $running_query  = $running->query;

                                        $sl = 1;

                                        while ($row = $running_query->fetch_assoc()) { 

                                        $id           = $row['id'];
                                        $name         = $row['name'];
                                        $id_code      = $row['free_fire_id'];
                                        $level        = $row['tournament_level'];
                                        $trxid        = $row['trxid'];
                                        $counter      = $row['counter_code'];
                                        $checked      = $row['checked'];
                                        $bkash        = $row['bkash'];
                                        $status       = $row['status']; 
                                    ?>
                                    <tr>
                                      <td><?php echo $sl++; ?></td>
                                      <td><?php echo $name;?></td>
                                      <td><?php echo $id_code;?></td>
                                      <td><?php echo $level;?></td>
                                      <td><?php echo $trxid;?></td>
                                      <td><?php echo $counter;?></td>
                                      <td><?php echo $bkash;?></td>
                                      <?php if($type == 'Administrator'){ ?>
                                      <td>
                                        <?php 
                                            
                                            if($checked == 0){
                                                echo "<a href='checked.php?id=$id&&value=1&&table=running_tournament' class='btn btn-danger'>Uncheck</a>";
                                            }elseif($checked == 1){
                                                echo "<a href='checked.php?id=$id&&value=0&&table=running_tournament' class='btn btn-success'>Checked</a>";
                                            }
                                        ?>
                                      </td>
                                      <?php } ?>
                                      
                                      <?php if($type == 'Administrator'){ ?>
                                      <td>
                                        <?php 
                                            
                                            if($status == 0){
                                                echo "<a href='change-status.php?id=$id&&value=1&&table=running_tournament' class='btn btn-danger'>Disable</a>";
                                            }elseif($status == 1){
                                                echo "<a href='change-status.php?id=$id&&value=0&&table=running_tournament' class='btn btn-success'>Enable</a>";
                                            }
                                            
                                        ?>
                                      </td>
                                      <?php } ?>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php require_once ('include/footer.php'); ?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <?php require_once ('include/js.php');?>
    </body>
</html>