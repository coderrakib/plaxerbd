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

            $get_id     = (int) $_GET['id'];
            $tournament = new Tournament;
            $tournament->gettournament(['id','=',$get_id]);
            $query      = $tournament->query;
            $result     = $query->fetch_assoc();
            $db_name    = $result['tournament_name'];
            $db_fee     = $result['entry_fee'];
            $db_prize   = $result['prize'];
            $db_type    = $result['tournament_type'];
            $db_map     = $result['tournament_map'];
            $db_players = $result['players'];
            $db_level   = $result['level'];
            $db_counter = $result['counter_code'];
            $db_image   = $result['image'];
            $db_start   = $result['start_time'];
        ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title"> Edit Tournament </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo 'dashboard.php'; ?>" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="<?php echo 'edit-tournament.php'; ?>" class="breadcrumb-link">Edit Tournament</a></li>
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

                            if(isset($_POST['submit']) && $_POST['submit'] === 'Update'){

                                $name           = ucwords($_POST['name']);
                                $fee            = $_POST['fee'];
                                $prize          = $_POST['prize'];
                                $type           = $_POST['type'];
                                $map            = $_POST['map'];
                                $players        = $_POST['players'];
                                $level          = $_POST['level'];
                                $counter        = $_POST['counter'];

                                //$t_id           = 'Tournament'.rand(1000, 99999);

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
                                    ),
                                );

                                $validation     = new Validation;
                                $validation->validate($form_data);

                                if($validation->hasErrorPassed){

                                    $explode    = explode('.', $image);
                                    $extension  = end($explode);
                                   
                                    $update = new Tournament;

                                    $data   = array(

                                        'tournament_name', '=', $name,
                                        'entry_fee',       '=', $fee,
                                        'prize',           '=', $prize,
                                        'tournament_type', '=', $type,
                                        'tournament_map',  '=', $map,
                                        'players',         '=', $players,
                                        'level',           '=', $level,
                                        'counter_code',    '=', $counter,
                                        'start_time',      '=', $time,
                                        'open_time',       '=', $open_time,
                                    );

                                    if(!empty($image)){

                                        $new_name   = rand(1000, 99999).'.'.$extension;
                                        $data[]     = 'image';
                                        $data[]     = '=';
                                        $data[]     = $new_name;
                                    }

                                    $where  = array(

                                        'id', '=', $get_id,
                                    );

                                    if($update->updatetournament('tournament',$data,$where)){

                                        $message[] = "Successfully Update Tournament";

                                        $_SESSION['messages']   = $message;
                                        $_SESSION['class_name'] = 'alert-success';

                                        require_once ('messages.php');

                                        if(!empty($image)){

                                            if(isset($image)){
                                               
                                               $path = "images/tournament/$db_image";
                                                unlink($path); 
                                            }
                                            
                                            move_uploaded_file($image_tmp, $directory.$new_name);
                                        }
                                        
                                        echo "<script>
                                setTimeout(function(){
                                window.location.href = 'tournament-lists.php';
                                }, 2000);
                            </script>" ;

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
                                <h3 class="card-header">Edit Tournament</h3>
                                <div class="card-body">
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?id=$get_id"; ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Tournament Name</label>
                                            <select name="name" class="form-control">
                                                <option value="">Select Tournament Name</option>
                                                <option value="Classic Solo 48 Players" <?php if($db_name == 'Classic Solo 48 Players'){echo "selected='selected'";}?>>Classic Solo 48 Players</option>
                                                <option value="Classic Solo 30 Players" <?php if($db_name == 'Classic Solo 30 Players'){echo "selected='selected'";}?>>Classic Solo 30 Players</option>
                                                <option value="Classic Solo 20 Players" <?php if($db_name == 'Classic Solo 20 Players'){echo "selected='selected'";}?>>Classic Solo 20 Players</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Entry Fee</label>
                                            <select name="fee" class="form-control">
                                                <option value="">Select Tournament Entry Fee</option>
                                                <option value="Free" <?php if($db_fee == 'Free'){echo "selected='selected'";}?>>Free</option>
                                                <option value="15" <?php if($db_fee == 15){echo "selected='selected'";}?>>15</option>
                                                <option value="25" <?php if($db_fee == 25){echo "selected='selected'";}?>>25</option>
                                            <option value="35" <?php if($db_fee == 35){echo "selected='selected'";}?>>35</option>
                                            <option value="45" <?php if($db_fee == 45){echo "selected='selected'";}?>>45</option>
                                            <option value="55" <?php if($db_fee == 55){echo "selected='selected'";}?>>55</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Prize Money</label>
                                            <input type="text" name="prize" class="form-control" value="<?php echo $db_prize;?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tournament Type</label>
                                            <select name="type" class="form-control">
                                                <option value="">Select Tournament Type</option>
                                                <option value="Classic Solo" <?php if($db_type == 'Classic Solo'){echo "selected='selected'";}?>>Classic Solo</option>
                                                <option value="Classic Dou" disabled="disabled">Classic Dou</option>
                                                <option value="Classic Squad" disabled="disabled">Classic Squad</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tournament Map</label>
                                            <select name="map" class="form-control">
                                                <option value="">Select Tournament Map</option>
                                                <option value="Bermuda" <?php if($db_map == 'Bermuda'){echo "selected='selected'";}?>>Bermuda</option>
                                                <option value="Purgatory" <?php if($db_map == 'Purgatory'){echo "selected='selected'";}?>>Purgatory</option>
                                                <option value="Kalahari" <?php if($db_map == 'Kalahari'){echo "selected='selected'";}?>>Kalahari</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Players</label>
                                            <select name="players" class="form-control">
                                                <option value="">Select Tournament Players</option>
                                                <option value="48" <?php if($db_players == 48){echo "selected='selected'";}?>>48</option>
                                                <option value="30" <?php if($db_players == 30){echo "selected='selected'";}?>>30</option>
                                                <option value="20" <?php if($db_players == 20){echo "selected='selected'";}?>>20</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                             <select name="level" class="form-control">
                                                <option value="">Select Tournament Level</option>
                                                <option value="Any Level" <?php if($db_level == 'Any Level'){echo "selected='selected'";}?>>Any Level</option>
                                                <option value="1 upto 30" <?php if($db_level == '1 upto 30'){echo "selected='selected'";}?>>1 upto 30</option>
                                                <option value="31 upto 40" <?php if($db_level == '31 upto 40'){echo "selected='selected'";}?>>31 upto 40</option>
                                                <option value="41 upto 50" <?php if($db_level == '41 upto 50'){echo "selected='selected'";}?>>41 upto 50</option>
                                                <option value="51 upto 60" <?php if($db_level == '51 upto 60'){echo "selected='selected'";}?>>51 upto 60</option>
                                                <option value="61 upto 70" <?php if($db_level == '61 upto 70'){echo "selected='selected'";}?>>61 upto 70</option>
                                            <option value="71 upto 80" <?php if($db_level == '71 upto 80'){echo "selected='selected'";}?>>71 upto 80</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Tournament Counter Code</label>
                                            <input type="text" name="counter" class="form-control" value="<?php echo $db_counter; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label><br>
                                            <img class="mb-3" src="images/tournament/<?php echo $db_image; ?>" width="100">
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Start Time</label>
                                            <input type="datetime-local" name="time" class="form-control" value="<?php echo $db_start; ?>">
                                        </div>
                                        <div class="row pt-3">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                <label class="be-checkbox custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                                </label>
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <input type="submit" name="submit" value="Update" class="btn btn-space btn-primary">
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
