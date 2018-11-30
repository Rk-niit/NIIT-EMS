
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
                    <a href="vieworders.php">
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="fas fa-tachometer-alt"></i></h1>
                                <h6 class="text-white">Dashboard</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <a href="Equipmentorders.php">
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="fas fa-chart-pie"></i></h1>
                                <h6 class="text-white">Order Details</h6></a>
                            </div>
                        </div>
                    </div>
                     <!-- Column -->
                    <a href="Users.php"><div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="fa fa-user m-b-5 font-32"></i></h1>
                                <h6 class="text-white">Users</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <a href="equipments.php">
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                                <h6 class="text-white">Equipments</h6>
                            </div>
                        </div>
                    </div></a>
                    <!-- Column -->
                    <a href="events.php">
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></i></h1>
                                <h6 class="text-white">Logs</h6>
                            </div>
                        </div>
                    </div></a>
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