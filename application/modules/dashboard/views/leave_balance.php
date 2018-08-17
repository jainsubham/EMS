<?php 
include('adminpannel.php');?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Upload closing leaves of employee's</a>
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
        <div class="container-fluid">
          
            <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-7">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Leaves data</h4>
                  <!-- <p class="card-category">Complete your profile</p> -->
                </div>
                <div class="card-body">
               
                        <h4>Select CSV file to upload</h4>  
                  <p class="card-description">Upload  the CSV file in the predefined format : <br>
                    -> Employee1_ID ,Closing_Casual_Leave,Closing_Earning_leavve<br>
                  </p>
                      <?= form_open_multipart('dashboard/csv_upload'); ?>
                        <div class="form-group">
                        <label >Select year</label><br>
                          <?php $year = array(
                             'select' => '---select Year---',
                                 '2016-17' =>'2016-17',
                                 '2017-18'=>"2017-18"   
                          );       
                      echo form_dropdown('year',$year,'select'); ?>
                      </div>
                      <div class="form-group">
                          <br>        
                        <?= form_upload('csvfile'); ?>
                      </div>
                            <?
                              $btn = array(
                                'class' => "btn btn-primary pull-right",
                                 'type' => 'submit',
                                 'name' => 'submit',
                                 'value' => 'Upload'
                              );
                              echo form_submit($btn);
                             ?>
                      <?= form_close(); ?>
                        </div>
                      </div>  
                    </div>
                </div>                    
  <script src="<?= base_url('assets/js/core/jquery.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/core/popper.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/core/bootstrap-material-design.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js');?>"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="<?= base_url('assets/js/plugins/chartist.min.js') ?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?= base_url('assets/js/plugins/bootstrap-notify.js'); ?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/material-dashboard.min.js?v=2.1.0'); ?>" type="text/javascript"></script>
  