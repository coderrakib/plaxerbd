<?php require_once ('config.php'); ?>
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
    
            $custom     = new Custom;
            $custom->getcustom();
            $cus_query  = $custom->query;
        ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title"> Set Custom Id </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo 'dashboard.php'; ?>" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="<?php echo 'set-custom-id.php'; ?>" class="breadcrumb-link">Set Custom Id</a></li>
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
                    <div class="col-xl-6 col-lg-6 col-md-6 offset-md-3 col-sm-12 col-12">
                       
                       <?php

                            if(isset($_POST['submit']) && $_POST['submit'] === 'Save'){

                                $tournament_id  = $_POST['t_id'];
                                $custom         = $_POST['custom_id'];
                                $pass           = $_POST['pass'];
                                

                                $form_data  = array(

                                    array(

                                        'field_name'    => 't_id',
                                        'name'          => 'Tournament Id',
                                        'required'      => true
                                    ),

                                    array(

                                        'field_name'    => 'custom_id',
                                        'name'          => 'Custom Id',
                                        'required'      => true
                                        
                                    ),

                                    array(

                                        'field_name'    => 'pass',
                                        'name'          => 'Password',
                                        'required'      => true  
                                    ),
                                );

                                $validation     = new Validation;
                                $validation->validate($form_data);

                                if($validation->hasErrorPassed){

                                    $insert = new Custom;

                                    if($insert->addcustom($tournament_id,$custom,$pass)){

                                        $message[] = "Successfully Save Custom";

                                        $_SESSION['messages']   = $message;
                                        $_SESSION['class_name'] = 'alert-success';

                                        require_once ('messages.php');

                                    }else{

                                        $message[] = "Something is Wrong .. Try again";

                                        $_SESSION['messages']   = $message;
                                        $_SESSION['class_name'] = 'alert-danger';

                                        require_once ('messages.php');
                                    }
                                }
                            }
                        ?>

                        <!--update -->
                        
                         <?php

                            if(isset($_POST['submit']) && $_POST['submit'] === 'Update'){

                                $get_id         = $_POST['hidden'];

                                $tournament_id  = $_POST['t_id'];
                                $custom_id      = $_POST['custom_id'];
                                $pass           = $_POST['pass'];
                                

                                $form_data  = array(

                                    array(

                                        'field_name'    => 't_id',
                                        'name'          => 'Tournament Id',
                                        'required'      => true
                                    ),

                                    array(

                                        'field_name'    => 'custom_id',
                                        'name'          => 'Custom Id',
                                        'required'      => true
                                        
                                    ),

                                    array(

                                        'field_name'    => 'pass',
                                        'name'          => 'Password',
                                        'required'      => true  
                                    ),
                                );

                                $validation     = new Validation;
                                $validation->validate($form_data);

                                if($validation->hasErrorPassed){

                                    $update = new Custom;

                                    $data   = array(

                                        'tournament_id', '=', $tournament_id,
                                        'custom_id',   '=', $custom_id,
                                        'password',   '=', $pass,
                                    );

                                    $where  = array(

                                        'id', '=', $get_id
                                    );

                                    if($update->updatecustom('custom',$data,$where)){

                                        $message[] = "Successfully Update Custom Id";

                                        $_SESSION['messages']   = $message;
                                        $_SESSION['class_name'] = 'alert-success';

                                        require_once ('messages.php');

                                    }else{

                                        $message[] = "Something is Wrong .. Try again";

                                        $_SESSION['messages']   = $message;
                                        $_SESSION['class_name'] = 'alert-danger';

                                        require_once ('messages.php');
                                    }
                                }
                            }
                        ?>

                       <div class="card">
                                <h3 class="card-header">Add Custom Id</h3>
                                <div class="card-body">
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Tournament Id</label>
                                            <select name="t_id" class="form-control">
                                                <option value="">Select Tournament Id</option>
                                                <?php
    
                                                    $tournament = new Tournament;
                                                    $tournament->gettournament(['status','=',1]);
                                                    $query      = $tournament->query;

                                                    while ($result=$query->fetch_assoc()) {
                                                        
                                                        $tro_id = $result['tournament_id'];
                                                    
                                                ?>
                                                <option value="<?php echo $tro_id; ?>"><?php echo $tro_id; ?></option>
                                                <?php } ?> 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Custom Id</label>
                                            <input type="text" name="custom_id" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" name="pass" class="form-control">
                                        </div>
                                        <div class="row pt-3">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                <label class="be-checkbox custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                                </label>
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <input type="submit" name="submit" value="Save" class="btn btn-space btn-primary">
                                                    <button class="btn btn-space btn-secondary">Cancel</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h3 class="card-header">All Custom Lists</h3>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Custom Id</th>
                                      <th>Password</th>
                                      <th>Tournament Id</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th>#</th>
                                      <th>Custom Id</th>
                                      <th>Password</th>
                                      <th>Tournament Id</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                  </tfoot>
                                  <tbody>
                                    <?php 

                                        $sl = 1;

                                        while ($row = $cus_query->fetch_assoc()) { 

                                        $id             = $row['id'];
                                        $db_t_id        = $row['tournament_id'];
                                        $db_custom      = $row['custom_id'];
                                        $db_pass        = $row['password'];
                                        $db_status      = $row['status'];
                                    ?>
                                    <tr>
                                      <td><?php echo $sl++; ?></td>
                                      <td><?php echo $db_t_id;?></td>
                                      <td><?php echo $db_custom;?></td>
                                      <td><?php echo $db_pass;?></td>
                                      <td>
                                        <?php 

                                            if($db_status == 0){
                                                echo "<a href='change-status.php?id=$id&&value=1&&table=custom' class='btn btn-danger'>Disable</a>";
                                            }elseif($db_status == 1){
                                                echo "<a href='change-status.php?id=$id&&value=0&&table=custom' class='btn btn-success'>Enable</a>";
                                            }
                                        ?>
                                      </td>
                                      <td>
                                        <!-- Edit modal -->
                                        <button type="button" class="btn btn-success btn-sm d-inline-block" data-toggle="modal" data-target="#exampleModal-<?php echo $id; ?>">
                                          <i class="fa fa-edit"></i>&nbsp;Edit
                                        </button>

                                        <?php 

                                            $edit_custom = new Custom;
                                            $edit_custom->getcustom(['id','=',$id]);
                                            $edit_query  = $edit_custom->query;

                                            $edit_result = $edit_query->fetch_assoc();
                                            $t_id        = $edit_result['tournament_id'];
                                            $c_id        = $edit_result['custom_id'];
                                            $pw          = $edit_result['password'];     

                                        ?>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal-<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Custom Id</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label>Tournament Id</label>
                                                        <select name="t_id" class="form-control">
                                                            <option value="">Select Tournament Id</option>
                                                            <?php
                
                                                                $tournament = new Tournament;
                                                                $tournament->gettournament(['status','=',1]);
                                                                $query      = $tournament->query;

                                                                while ($result=$query->fetch_assoc()) {
                                                                    
                                                                    $tro_id = $result['tournament_id'];
                                                                
                                                            ?>
                                                            <option value="<?php echo $tro_id; ?>" <?php if($tro_id == $t_id){echo "selected='selected'";}?>><?php echo $tro_id; ?></option>
                                                            <?php } ?> 
                                                        </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Custom Id</label>
                                                            <input type="text" name="custom_id" class="form-control" value="<?php echo $c_id; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="text" name="pass" class="form-control" value="<?php echo $pw; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="hidden" value="<?php echo $id; ?>">
                                                        <input type="submit" name="submit" value="Update" class="btn btn-primary">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                          </div>
                                        </div>

                                        <button type="button" class="btn btn-danger btn-sm d-inline-block" data-toggle="modal" data-target="#exampleModalCenter-<?php echo $id;?>">
                                          <i class="fa fa-trash-alt"></i>&nbsp;Delete
                                        </button></td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter-<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLongTitle">Delete Custom Id</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <h5 class="text-center">If you want to delete custom id ?</h5>
                                              </div>
                                              <div class="modal-footer">
                                                <a href='<?php echo "delete-custom.php?id=$id"?>' class="btn btn-danger">Yes</a>
                                                <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
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
            <?php require_once ('include/footer.php');?>
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
