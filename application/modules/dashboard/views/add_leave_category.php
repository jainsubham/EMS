<?php include('adminpannel.php');?>
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
                <div class="card-header card-header-info">
                  <h4 class="card-title">Leave Categories</h4>
               	  <!-- <p class="card-category">Complete your profile</p> -->
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
                                        <th>Increment/Nature</th>
                                        <th>Leave Default Value</th> 
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php if (isset($q)) { ?>
                                        <tr>
                                        <?php foreach ($q as $row) { ?>
                                          <td><?= $row->category_name ?></td>
                                          <td><?= $row->nature ?></td>
                                          <td><?= $row->leave_default_value ?></td>  
                                        </tr>
                                       <?php  }
                                      }
                                      if (isset($data)) {
                                        echo $data;
                                      }
                                       ?>
                                    </tbody>
                                  </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      <div class="col-md-6">
                         <div class="form-group">
                          <h4>Add Leave Categories</h4>
                              <? $hidden = array('company_id' => $company_id); echo form_open('dashboard/add_category','',$hidden); ?>
                              <?php 
                                $category= array(
                                  'class' =>'form-control',
                                  'type' => 'text',
                                  'placeholder' => 'Category Name',
                                  'name' =>'category'
                                );
                              echo form_input($category);?> <br>
                          </div>
                         <div class="form-group">
                              <label>Select Month OR Year if you want increment</label><br>
                            <?php $year = array(
                               'no' => '-----Select Month or Year-----',
                                   'month' =>'Monthly',
                                   'year'=>"Yearly"   
                            );       
                            echo form_dropdown('year',$year,'select'); ?> <br>
                          </div>
                         <div class="form-group">
                            <label class="bmd-label-floating">Enter Default Leave</label> <br>
                                  <?php
                                    $default = array(
                                      'class'  => 'form-control',
                                      'type' => 'text',
                                      'name'   => 'default'  
                                  );
                                  echo form_input($default); ?>
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