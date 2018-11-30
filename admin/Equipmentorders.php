<?php 
include 'eventlog.php';
session_start();    
if(!isset($_SESSION['admin_login'])) 
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
                        
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-user m-b-5 font-32"></i><span class="hide-menu">Users </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="addusers.php" class="sidebar-link"><i class="fas fa-user-plus"></i><span class="hide-menu"> Add Users </span></a></li>
                                
                                
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-puzzle-piece"></i><span class="hide-menu">Equipments </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="addequip.php" class="sidebar-link"><i class="mdi mdi-border-inside"></i><span class="hide-menu"> Add Equipments </span></a></li>
                                
                                
                            </ul>
                        </li>
                       
                            
                            
                        
                                
                          
                        
                            
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
                        <h4 class="page-title">Orders Details</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="hello.php">Order Details</a></li>
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
<?php
class Equipment_orders extends mysqli
{
    public function __construct()
	{
		parent::__construct("localhost","root","","ems1");
		if($this->connect_error)
			{
			echo "fail";
			} 
		else {
			 echo "success";
			}	
	}
	
	
  public function total($week)
  {

  	   $sql = "SELECT 
  	   		location_master.`Location_name`,
			equipment_master.`Location_id`,
			equipment_master.`Equipment_name`,
			equipment_master.`Equipment_type_id`,
			equipment_master.`Frequency`,
			equipment_type.`Equipment_type`,
			order_master.`Equipment_id`,
			order_master.`Last_complete_date`, 
			order_master.`Order_id`,
			order_master.`Order_status`,
			order_master.`User1_verification`,
			order_master.`User2_verification`,
			order_master.`User3_verification`
             from order_master INNER JOIN equipment_master on order_master.`Equipment_id`= equipment_master.`Equipment_id`
			 INNER JOIN  location_master on equipment_master.`Location_id`= location_master.`Location_id`
			 INNER JOIN equipment_type on equipment_master.`Equipment_type_id`=equipment_type.`Equipment_type_id`";
		$result= $this->query($sql);
		$numRows = $result->num_rows;
		if($numRows>0)
			{
?>
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
<section class="section2">
  

    <div style="width:100% ,height:500px">
  <div style="background-color:white">
        <table style="width:50%" class="mySlides">




<div align="center">
<table style="width:50%">
            <tr>  
			    <th >Order Number</th>
			    <th >Equipment name</th>
			    <th>Location</th>
         		<th>Equipment type</th>
				<th>Data operator verification</th>
				<th>P&M verification</th>
				<th>E&M_verification</th>
			    
			</tr>

<?php
		 while ($row= $result->fetch_assoc()) 
				{
					$week1 = $week;
					$Last_complete_date =$row['Last_complete_date'];

						$var = date( "Y-m-d", strtotime( "$Last_complete_date + 1 month" ) );
					    $date = new Datetime($var);
						 $current_week = $date ->format("W"); 
						 if($week1 == $current_week)
						 {


            		     		if($row['Order_status']==2)
            		     		{
?>
		                         <td><a href="../admin/checklist.php?Equipment_type=<?php echo $row['Equipment_type'] ?>&Order_id=<?php echo $row['Order_id'] ?> "><?php echo "".$row['Order_id'];  ?> </td>
		                        <td><?php echo "".$row['Equipment_name']; ?> </td>
		                        <td><?php echo "".$row['Location_name'];  ?> </td>
		                       <td><?php echo "".$row['Equipment_type']; ?> </td>
		                        <td><?php echo "".$row['User1_verification']; ?> </td>
	                			<td><?php echo "".$row['User2_verification']; ?> </td>
	                			<td><?php echo "".$row['User3_verification']; ?> </td>
                       </tr>

<?php
						}
									}
       				 }
    
?>	
</table>
</div>
</body>
</html>
				
					
<?php
				
					
				
			}



  }

}
$ddate = date("Y-m-d");
		$date = new DateTime($ddate);
		$week1 = $date->format("W");
$equip = new Equipment_orders();
$equip -> total($week1);



?>
</body>
</html>
</br></br></br></br></br></br></br></br>
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


<!-- Mirrored  wrappixel.com/demos/free-admin-templates/matrix-admin-bt4/html/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Jufroml 2018 05:34:12 GMT -->
</html>