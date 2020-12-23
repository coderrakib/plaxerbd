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
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title"> Add Tournament </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo 'dashboard.php'; ?>" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="<?php echo 'add-tournament.php'; ?>" class="breadcrumb-link">Add Tournament</a></li>
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

                            if(isset($_POST['submit']) && $_POST['submit'] === 'Add New'){

                                $name           = ucwords($_POST['name']);
                                $fee            = $_POST['fee'];
                                $prize          = $_POST['prize'];
                                $type           = $_POST['type'];
                                $map            = $_POST['map'];
                                $players        = $_POST['players'];
                                $level          = $_POST['level'];
                                $counter        = $_POST['counter'];

                                $t_id           = 'Tournament'.rand(1000, 99999);

                                $image          = $_FILES['image']['name'];
                                $image_tmp      = $_FILES['image']['tmp_name'];

                                $time           = $_POST['time'];

                                date_default_timezone_set("Asia/Dhaka");
                                $open_time      = date("d M Y h:i:sa");

                                $directory      = 'images/tournament/';
                                
                                $form_data      = array(

                                    array(

                                        'field_name'    => 'name',
                                        'name'          => 'Tournament Name',
                                        'required'      => true,
                                        'min'           => 5,
                                        'max'           => 100
                                    ),

                                    array(

                                        'field_name'    => 'fee',
                                        'name'          => 'Entry Fee',
                                        'required'      => true,
                                        'min'           => 2,
                                        'max'           => 11
                                    ),

                                    array(

                                        'field_name'    => 'prize',
                                        'name'          => 'Prize Money',
                                        'required'      => true,
                                        'min'           => 2,
                                        'max'           => 11
                                    ),

                                    array(

                                        'field_name'    => 'type',
                                        'name'          => 'Tournament Type',
                                        'required'      => true,
                                        'min'           => 5,
                                        'max'           => 30
                                    ),

                                    array(

                                        'field_name'    => 'map',
                                        'name'          => 'Tournament Map',
                                        'required'      => true,
                                        'min'           => 5,
                                        'max'           => 15
                                    ),

                                    array(

                                        'field_name'    => 'players',
                                        'name'          => 'Players',
                                        'required'      => true,
                                        'min'           => 2,
                                        'max'           => 11
                                    ),

                                    array(

                                        'field_name'    => 'level',
                                        'name'          => 'Level',
                                        'required'      => true,
                                        'min'           => 5,
                                        'max'           => 15
                                    ),

                                    array(

                                        'field_name'    => 'counter',
                                        'name'          => 'Tournament Counter Code',
                                        'required'      => true
                                    ),

                                    array(

                                        'field_name'    => 'image',
                                        'name'          => 'Image',
                                        'type'          => 'file',
                                        'required'      => true
                                    ),
                                );

                                $validation     = new Validation;
                                $validation->validate($form_data);

                                if($validation->hasErrorPassed){

                                    $explode    = explode('.', $image);
                                    $extension  = end($explode);
                                    $new_name   = rand(1000, 99999).'.'.$extension;

                                    $insert = new Tournament;

                                    if($insert->addtournament($name, $t_id, $fee, $prize, $type, $map, $players, $level, $counter, $new_name, $time, $open_time)){

                                        move_uploaded_file($image_tmp, $directory.$new_name);

                                        $message[] = "Successfully Add Tournament";

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
                                <h3 class="card-header">Add Tournament</h3>
                                <div class="card-body">
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Tournament Name</label>
                                            <select name="name" class="form-control">
                                                <option value="">Select Tournament Name</option>
                                                <option value="Classic Solo 48 Players">Classic Solo 48 Players</option>
                                                <option value="Classic Solo 30 Players">Classic Solo 30 Players</option>
                                                <option value="Classic Solo 20 Players">Classic Solo 20 Players</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Entry Fee</label>
                                            <select name="fee" class="form-control">
                                                <option value="">Select Tournament Entry Fee</option>
                                                <option value="Free">Free</option>
                                                <option value="15">15</option>
                                                <option value="25">25</option>
                                                <option value="35">35</option>
                                                <option value="45">45</option>
                                                <option value="55">55</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Prize Money</label>
                                            <input type="text" name="prize" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tournament Type</label>
                                            <select name="type" class="form-control">
                                                <option value="">Select Tournament Type</option>
                                                <option value="Classic Solo">Classic Solo</option>
                                                <option value="Classic Dou" disabled="disabled">Classic Dou</option>
                                                <option value="Classic Squad" disabled="disabled">Classic Squad</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tournament Map</label>
                                            <select name="map" class="form-control">
                                                <option value="">Select Tournament Map</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Purgatory">Purgatory</option>
                                                <option value="Kalahari">Kalahari</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Players</label>
                                            <select name="players" class="form-control">
                                                <option value="">Select Tournament Players</option>
                                                <option value="48">48</option>
                                                <option value="30">30</option>
                                                <option value="20">20</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                             <select name="level" class="form-control">
                                                <option value="">Select Tournament Level</option>
                                                 <option value="Any Level">Any Level</option>
                                                <option value="1 upto 30">1 upto 30</option>
                                                <option value="31 upto 40">31 upto 40</option>
                                                <option value="41 upto 50">41 upto 50</option>
                                                <option value="51 upto 60">51 upto 60</option>
                                                <option value="61 upto 70">61 upto 70</option>
                                                <option value="71 upto 80">71 upto 80</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Tournament Counter Code</label>
                                            <input type="text" name="counter" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Start Time</label>
                                            <input type="datetime-local" name="time" class="form-control">
                                        </div>
                                        <div class="row pt-3">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                <label class="be-checkbox custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                                </label>
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <input type="submit" name="submit" value="Add New" class="btn btn-space btn-primary">
                                                    <button class="btn btn-space btn-secondary">Cancel</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
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
