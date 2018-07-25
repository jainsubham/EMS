<?php include('user_header.php'); ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo"><b>Apply Leave</b></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title" style="margin-left: 15px">Add Leave</h4>
                </div>
                <div class="card-body">
                 <?php echo form_open('user_dashboard/leave_data') ?>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <? if(isset($leave)){ ?>  <label >Select Leave Category</label><br>
                               <?php
                                     echo form_dropdown('leave',$leave); 
                                } 
                                ?>
                        </div>
                      </div>
                  </div>
                    <div class="row">
                      <div class="col-md-6">
                          <!-- <label class="bmd-label-floating">Select Date Range for this leave</label><br> -->
                          From
                          <div class="form-group">
                            <?php 
                          	 $start = array(
                          	 	'class' => 'form-control',
                          	 	'type' => 'date',
                          	 	'name' => 'start'
                          	 );
                            echo form_input($start);?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        To
                        <div class="form-group">
                          <?php 
                          	 $end = array(
                          	 	'class' => 'form-control',
                          	 	'type' => 'date',
                          	 	'name' => 'end'
                          	 );
                           echo form_input($end);?>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                  	<div class="col-md-12">
                        <div class="form-group">
                    	<!-- <label class="bmd-label-floating">Are there any half day</label> -->
    	                  	<h4>Are there any half day</h4>
    	                 <div class="container">
            						<input type="radio" name="radio" value="1">Yes		
            						<input type="radio" name="radio" checked="checked" value="0">No
            					</div>
                    </div>
                	</div>
           		   </div> 
           		<div class="row">
               	  	<div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Reason for Leave</label>
                          	<?php
      						   $data = array(
          						'class'  => 'form-control',
          						'rows'   => '2',
          						'cols'   => '12',
          						'name'	 => 'reason'	
           						);
          					echo form_textarea($data); ?>
					    </div>
					</div>
                </div>
                <?php
                    $btn = array(
                        'class' => "btn btn-success pull-right",
                        'type' => 'submit',
                        'name' => 'submit',
                        'value' => 'Apply'
                        );
                    echo form_submit($btn);?>                 
                  <? echo form_close(); ?>
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
  <style type="text/css">
  	
  	.container {
    display: block;
    position: relative: ;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 15px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
  </style>