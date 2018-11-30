
<?php 
include 'eventlog.php';
session_start();    
if(!isset($_SESSION['pm'])) 
    header('location:../login/index.php');
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">


<!-- Mirrored from wrappixel.com/demos/free-admin-templates/matrix-admin-bt4/html/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Jul 2018 05:33:40 GMT -->
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <title>NIIT University</title>
    <!-- Custom CSS -->
    <link href="../../assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/2.5.94/css/materialdesignicons.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="vieworders.php">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../../assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" />
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="fas fa-sliders-h"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                       
                    </ul>
                    
                    
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <h4>Welcome <?php echo $_SESSION['login']; ?></h4>

                                
                                
                                
                                <a class="dropdown-item" href="../login/logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>


        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="vieworders.php" aria-expanded="false"><i class="fas fa-tachometer-alt"></i>
                        <span class="hide-menu">Dashboard</span></a></li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Equipmentorders.php" aria-expanded="false"><i class="fas fa-chart-pie"></i><span class="hide-menu">Order Details</span></a></li>
                        
                        
                        
                       
                            
                            
                        
                                
                          
                        
                            
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="vieworders.php">Home</a></li>
                                    
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    
                    <!-- Column -->
                    
                     <!-- Column -->
                    <a href="Checklist_data.php"><div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="fas fa-th-list"></i></h1>
                                <h6 class="text-white">Checklist</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->

                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <a href="defectlist_data.php">
                                <h1 class="font-light text-white"><i class="mdi mdi-alert"></i></h1>
                                <h6 class="text-white">Defect List</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    
                    <!-- Column -->
                    <!-- Column -->
                    
                    <!-- Column -->
                    
                     <!-- Column -->
                    
                    
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        
                                        <h5 class="card-subtitle">Overview of This week <?php $cr_date = date("Y-m-d"); echo date('d M Y l' , strtotime($cr_date)); ?></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- column -->
                                    <div class="col-lg-9">
                                        <div class="flot-chart">
<style>




table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 10px;
    text-align: left;    
}
</style>
</head>

<body>
 <style>
 .blink {
    animation:fade 3000ms infinite;
    -webkit-animation:fade 3000ms infinite;
}
body {
    background-color:  orange;
}
.zoom {
    padding: 22px;
    transition: transform .2s; /* Animation */
    width: 2px;
    height: 2px;
    margin: 0 auto;
}

.zoom:hover {
    transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
<?php  
include 'orderbyweek.php';

$order = new order();

?>
 <?php

$ddate = date("Y-m-d");
$date = new DateTime($ddate);
$week1 = $date->format("W");
$week0 = $week1- 1;
$week2= $week1 +1;
$week3= $week2 +1;
$week4= $week3 +1;
$week5= $week4 +1;
//$order ->this_week_order($week1);
?>
<section class="section2">
  

    <div style="width:150% ,height:500px">
  <div style="background-color:white">
        <table style="width:150%" class="mySlides">

                  <tr style="background-color: #343a40;color: white">
    <th >week-<?php echo $week0 ?></th>
    <th>Orders</th>
    <th >week-<?php echo $week1 ?> (Current Week)</br>(<?php $cr_date = date("Y-m-d"); echo date('d M Y l' , strtotime($cr_date));?>)</th>
    <th >week-<?php echo $week2 ?></th>
    <th>week-<?php echo $week3?></th>
    <th >week-<?php echo $week4 ?></th>
       
   
  </tr>
  <tr>

    <td><?php $order ->total_orders_this_week($week0); ?></td>
    <th style="background-color: #27a9e3; color: white">Total orders</th>
    
    <td><div class="zoom"><a href="
      Equipmentorders.php"><?php $order ->total_orders_this_week($week1); ?></a></td></div>
     <td><a href="Equipmentorders.php"><?php $order ->total_orders_this_week($week2); ?></td>
      <td><a href="Equipmentorders.php"><?php $order ->total_orders_this_week($week3); ?></td>
       <td><a href="Equipmentorders.php"><?php $order ->total_orders_this_week($week4); ?></td>
       
    
   
  </tr>
   <tr>
    <td><?php $order ->pending_this_week($week0);?></td>
    <th style="background-color: #da542e; color: white">Pending</th>
    
    <td><div class="zoom"><a href="Equipmentorders.php"><?php $order ->pending_this_week($week1);?></a></td></div>
     <td><a href="Equipmentorders.php"><?php $order ->pending_this_week($week2);?></td>
      <td><a href="Equipmentorders.php"><?php $order ->pending_this_week($week3);?></td>
       <td><a href="Equipmentorders.php"><?php $order ->pending_this_week($week4);?></td>
        

    
   
  </tr>
   <tr>
    <td><?php $order ->completed_this_week($week0);?></a></td>
    <th style="background-color: #28b779; color: white">Completed</th>
    
    <td><div class="zoom"><a href="Equipmentorders.php"><?php $order ->completed_this_week($week1);?></a></td></div>
     <td><a href="Equipmentorders.php"><?php $order ->completed_this_week($week2);?></td>
      <td><a href="Equipmentorders.php"><?php $order ->completed_this_week($week3);?></td>
       <td><a href="Equipmentorders.php"><?php $order ->completed_this_week($week4);?></td>
        

    
   
  </tr>
   <tr>
    <td><?php $order ->progress_this_week($week0);?></a></td>
    <th style="background-color: #ffb848; color: white">Progress</th>
     
    <td><div class="zoom"><a href="<a href="Equipmentorders.php"><?php $order ->progress_this_week($week1);?></a></td></div>
     <td><a href="Equipmentorders.php"><?php $order ->progress_this_week($week2);?></td>
      <td><a href="Equipmentorders.php"><?php $order ->progress_this_week($week3);?></td>
       <td><a href="Equipmentorders.php"><?php $order ->progress_this_week($week4);?></td>
       

    
   
  </tr>
  
</table>
    </div>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "";  
}
</script>


                                        </div>
                                    </div>
                                   
                
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="../../assets/libs/flot/excanvas.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.time.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="../../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../../dist/js/pages/chart/chart-page-init.js"></script>

</body>


<!-- Mirrored from wrappixel.com/demos/free-admin-templates/matrix-admin-bt4/html/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Jul 2018 05:34:12 GMT -->
</html>