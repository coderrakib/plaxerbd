<?php require_once ('config.php'); ?>

<?php 
    
    $user = $_SESSION['front_user'];

    $users = new Users;
    $users->getUsers(['user_name', '=', $user]);
    $query = $users->query;

    $result = $query->fetch_assoc();
    $type   = $result['type'];
?>

<!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="<?php echo 'dashboard.php'; ?>" ><i class="fa fa-fw fa-home"></i>Dashboard</a>
                            </li>
                            <?php if($type == 'Administrator'){ ?>
                            <!--<li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>UI Elements</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="add-ui-elements.php">Add Ui Elements</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-element-lists.php">Ui Elements Lists</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>-->
                            <?php } ?>
                            
                            <?php if($type == 'Administrator'){ ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-cogs"></i></i>Settings</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo 'general-setting.php'?>">General Settings</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-1" aria-controls="submenu-1-1">User Settings</a>
                                            <div id="submenu-1-1" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo 'add-user.php'; ?>">Add User</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo 'user-lists.php'; ?>">User Lists</a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo 'contact-setting.php'; ?>">Contact Settings</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <?php } ?>
                            
                            <?php if($type == 'Administrator'){ ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-trophy"></i> Tournament </a>
                                <div id="submenu-9" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        
                                            <li class="nav-item">
                                                <a class="nav-link" href="add-tournament.php">Add Tournament</a>
                                            </li>
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" href="tournament-lists.php">Tournament Lists</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                             <?php } ?>
                            
                            <?php if($type == 'Administrator'){ ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo 'set-custom-id.php'; ?>" ><i class="fas fa-list-alt"></i>Set Custom Id</a>
                            </li>
                            <?php } ?>
                            
                            <?php if($type == 'Administrator'){ ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo 'player-lists.php'; ?>" ><i class="fas fa-user-circle"></i>Player Lists</a>
                            </li>
                            <?php } ?>

                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo 'winner-lists.php'; ?>" ><i class="fas fa-shield-alt"></i>Winner Lists</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-9"><i class="fas fa-trophy"></i> Running Tournament </a>
                                <div id="submenu-10" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <?php
    
                                            $tournament = new Tournament;
                                            $tournament->gettournament(['status','=',1]);
                                            $query      = $tournament->query;

                                            while ($result=$query->fetch_assoc()) {
                                                
                                                $tro_id = $result['tournament_id'];
                                            
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="running-tournament.php?Tid=<?php echo $tro_id; ?>"><?php echo $tro_id; ?></a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-divider">
                                Features
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> Pages </a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="add-page.php">Add Page</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="page-lists.php">Page Lists</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>-->

                            <!--<li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-bars"></i> Menus </a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="header-menus.php">Header Menus</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="footer-menus.php">Footer Menus</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>-->
                            <?php if($type == 'Administrator'){ ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-search"></i>Seo</a>
                                <div id="submenu-8" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/icon-fontawesome.html">Add Seo</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/icon-material.html">Seo Page Lists</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->