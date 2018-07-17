<?php include('adminpannel.php');?>
   <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Announcement</a>
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
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Announcement</h4>
                </div>
                <div class="card-body">
                  <?= form_open('dashboard/update_announcement/'.$id); ?>
               	<div class="row">
               	  	<div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Enter Announcement</label>
                          <?php
      							        $data = array(
          						        'class'  => 'form-control',
          						        'rows'   => '7',
          						        'cols'   => '12',
                              'value' => $x->announcement,
          						        'name'	 => 'announcement'	
           							  );
          						    echo form_textarea($data); ?>
					             	</div>
					          </div>
                </div>
                <div class="row">
               	  	<div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date_Till_Display</label>
                          <?php
							             $display = array(
        						        'class'  => 'form-control',
        						        'type'	 => 'date',
                            'value'  => $x->date_till_display,
        						        'name'  => 'display'
           							  );
    						          echo form_input($display); ?>
						            </div>
					          </div>
                </div>
                <?php
                    $btn = array(
                        'class' => "btn btn-primary pull-right",
                        'type' => 'submit',
                        'name' => 'submit',
                        'value' => 'Update'
                            );
                    echo form_submit($btn);?>
                <?php echo form_close(); ?>
                </div>
              </div>
            </div>    
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