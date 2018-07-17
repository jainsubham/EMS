<?php 
include('adminpannel.php');?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Leave Categories</a>
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
                  <h4 class="card-title">Leave Categories</h4>
               	  <!-- <p class="card-category">Complete your profile</p> -->
                </div>
                <div class="card-body">
                  
                   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">All Categories</label>
                            <ul>
                              <?php if(isset($q)){
                                  foreach ($q as $row) {
                                    echo "<li>".$row->category_name."</li>";
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
                        <h4>Add Leave Categories</h4>
                        
                            <? $hidden = array('company_id' => $row->company_id); echo form_open('dashboard/add_category','',$hidden); ?>
                            <?php 
                              $category= array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'placeholder' => 'Category Name',
                                'name' =>'category'
                              );
                              echo form_input($category);?>
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