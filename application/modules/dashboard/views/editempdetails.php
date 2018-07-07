<?php include('adminpannel.php')  ?>
<div class="main-panel">
         <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Edit:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#profile" data-toggle="tab">
                            <i class="material-icons">person</i>Employee Details	
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">person</i>Personal Details
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">cloud</i>Bank Details/salary
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table">
                        <tbody>
                        <div class="card-body">
                <div class="card-body">
                  <? echo form_open("profile/"); ?>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">EmployeeID</label>
                          <?php 
                              $empid = array(
                                'class' =>'form-control',
                                'type' => 'varchar',
                                'name' => 'empid'
                              );
                          echo form_input($empid);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Joining Date</label>
                          <?php 
                              $jdate = array(
                                'class' =>'form-control',
                                'type' => 'date',
       
                                'name' =>'joindate'
                              );
                          echo form_input($jdate);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirmation Date</label>
                          <?php 
                              $cdate = array(
                                'class' =>'form-control',
                                'type' => 'date',
                                'name' => 'confirmdate'
                              );
                          echo form_input($cdate);
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Effective From</label>
                         <?php 
                              $effectivefrom = array(
                                'class' =>'form-control',
                                'type' => 'date',
                                'name' => 'effectivefrom'
                              );
                          echo form_input($effectivefrom);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" style="">Effective To</label>
                          <?php 
                              $effectiveto = array(
                                'class' =>'form-control',
                                'type' => 'date',
                                'name' => 'effectiveto'
                              );
                          echo form_input($effectiveto);
                          ?>
                        </div>
                      </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                         <label class="bmd-label-floating" style="">Effective To</label>
                          <div class="form-group">
                            <label class="bmd-label-floating">Employee Status</label>
                            <?php 
                            	$empstatus = array(

                            			'class' =>'form-control'  ,
                            			'type' =>'text'
                            			'name' => 'empstatus'
                            	);
                            echo form_input($empstatus);
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
            </div>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </footer>
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
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
        </div>