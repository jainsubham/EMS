<?php include('adminpannel.php');?>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Monthly Attendance Record</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        

  <div class=" col-md-6 col-sm-12  pull-right-lg" style="border:0px solid">
    
    <div class="col-md-12" style="padding:0px;">
      <br>
        <table class="table table-bordered table-style table-responsive">
          <thead>
          <tr>
            <th colspan="2"><a href="<?= base_url('dashboard/get_monthly_attendance/'.$user_id.'/'.$prev) ?>"><i class="material-icons">keyboard_arrow_left</i></a></th>
            <th colspan="3"> <?php echo $html_title; ?></th>
            <th colspan="2"><a href="<?= base_url('dashboard/get_monthly_attendance/'.$user_id.'/'.$next) ?>"><i class="material-icons">keyboard_arrow_right</i></a></th>
          </tr>
          <tr class="self-calendar-th">
            <th>Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
          </tr>
          </thead>
          <tbody class="self-calendar-tbody">
          <?php
            foreach ($weeks as $week) {
              echo $week;
            };
          ?>
          </tbody>
        </table>

    </div>
  </div>
</div>
</div>

  
 <script src="<?= base_url('assets/js/core/jquery.min.js')?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/core/popper.min.js')?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/core/bootstrap-material-design.min.js')?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js')?>"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>

    
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/material-dashboard.min.js?v=2.1.0')?>" type="text/javascript"></script>