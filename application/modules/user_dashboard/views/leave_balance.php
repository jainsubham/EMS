<?php include('user_header.php'); ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo"><b>Leave Balance</b></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
          	<a href="<?= base_url('user_dashboard/apply_leave'); ?>">
                <button class="btn btn-primary pull-right" type="button"><i class="material-icons">add</i>APPLY LEAVE</button>
                </a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title" style="margin-left: 15px">Annual Leave Balance</h4>
                </div>
                <div class="card-body">
                    <div class = "self-card-small-header" style="overflow-x:auto;" >
                       <div class="content">
                         <div class="container">
                            <div class="container-fluid">
                              <div class="row">
                                  <table style="margin-top: 20px;" class="table table-bordered table-striped table-hover css-serial reult" id="myTable"> 
                                    <thead  class="col-md-12 ">
                                      <tr class="card-header card-header-info" style="background-color: #9c27b0; color: white; box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);">
                                        <th style="width:140px">Leave Category</th>
                                        <th>Opening Balance</th>
                                        <th>Accrued Balance</th>
                                        <th>Leaves Taken</th>
                                        <th>Usable Balance</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($q) {  ?> 
                                      <tr>
                                      <?php foreach ($q as $row) { ?>
                                        <td><?= $row->category_id ?></td>
                                        <td><?= $row->opening_balance.'days' ?></td>
                                        <td><?= $row->accrued_balance.'days' ?></td>
                                        <td><?= $row->leaves_taken.'days' ?></td>
                                        <td><?= $row->balance.'days' ?></td>
                                      </tr>
                                      <?php } 
                                    } ?>
                                    </tbody>
                                  </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?= base_url('assets/js/core/jquery.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/core/popper.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/core/bootstrap-material-design.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js');?>"></script>
  <!--  Google Maps Plugin    -->
  
  <!-- Chartist JS -->
  
  <!--  Notifications Plugin    -->
  <script src="<?= base_url('assets/js/plugins/bootstrap-notify.js'); ?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/material-dashboard.min.js?v=2.1.0'); ?>" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>