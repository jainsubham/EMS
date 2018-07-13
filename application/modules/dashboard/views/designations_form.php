<?php 
include('adminpannel.php');?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Desiginations of your company</a>
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
                  <h4 class="card-title">Designations</h4>
               	  <!-- <p class="card-category">Complete your profile</p> -->
                </div>
                <div class="card-body">
                  
                   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">All Designations in your Organization</label>
                            <ul>
                              <?php if(isset($q)){
                                  foreach ($q as $row) {
                                    echo "<li>".$row->name."</li>";
                                  }
                                }
                                if(isset($data)){
                                  echo $data;
                                }
                              ?>
                            </ul>
                        </div>
                      </div>
                       <div class="form-group">
                        <h4>Add New Designation</h4>
                        
                            <? $hidden = array('company_id' => $companyid); echo form_open('dashboard/add_designation','',$hidden); ?>
                            <?php 
                              $desg = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'placeholder' => 'Designation Name',
                                'name' =>'designation'
                              );
                              echo form_input($desg);
                              
                              ?>
                               
                              <div class="form-group">
                              <? if(isset($teams)){ ?>  <label >Select Team / Department</label><br>
                               <?php
                                     echo form_dropdown('team',$teams); 
                                   } else {
                                    if(isset($msg)){
                                      echo $msg;
                                    }
                                   } ?>
                              
                            </div>
                              <?php

                              $btn = array(
                                'class' => "btn btn-primary pull-right",
                                 'type' => 'submit',
                                 'name' => 'submit',
                                 'value' => 'Add'
                              );
                               echo form_submit($btn);
                             ?>
                            <?= form_close(); ?>
                        </div>
                      </div>  
                    </div>


                </div>
              </div>
            </div>    
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>