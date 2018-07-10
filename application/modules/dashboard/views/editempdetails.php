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
               <!-- Employee Details; -->
                   <?php echo form_open("profile/display"); ?>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company Name</label>
                          <?php 
                              $comp = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'disabled' => true
                              );
                          echo form_input($comp);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">EmployeeId</label>
                          <?php 
                              $empid = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'name' =>'empid'
                              );
                          echo form_input($empid);
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Joining Date</label>
                          <?php 
                              $jdate = array(
                                'class' =>'form-control',
                                'type' => 'date',
                                'name' => 'jdate'
                              );
                          echo form_input($jdate);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirmation Date</label>
                          <?php 
                              $cdate = array(
                                'class' =>'form-control',
                                'type' => 'date',
                                'name' =>'cdate'
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
                              $efrom = array(
                                'class' =>'form-control',
                                'type' => 'date',
                                'name' =>'efrom'
                              );
                          echo form_input($efrom);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Effective To</label>
                          <?php 
                              $eto = array(
                                'class' =>'form-control',
                                'type' => 'date',
                                'name' => 'eto'
                              );
                          echo form_input($eto);
                          ?>
                        </div>
                      </div>
                    </div>
                    
                    <?php
                            $btn = array(
                              'class' => "btn btn-primary pull-right",
                               'type' => 'submit',
                               'value' => 'Edit'
                            );
                    echo form_submit($btn);
                    ?>
                <?php echo form_close(); ?>
                    </div>
                    <div class="tab-pane" id="messages">
                      <!-- Personal Details -->
                        <div class="card-body">
                    <?php echo form_open("profile/editinfo"); ?>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                         <label class="bmd-label-floating">Company : </label>
                         <?php //echo  $companyname ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ContactNo :</label>
                          <?php  // echo $x->contact_no ?>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address :</label>
                          <?php // echo $Email ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name :</label>
                          <?php //echo $x->first_name ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name :</label>
                          <?php //echo $x->last_name ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress:</label>
                          <?php //echo $x->address_1 ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress:</label>
                          <?php //echo $x->address_2 ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City :</label>
                          <?php //echo $x->city ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">State :</label>
                          <?php //echo $x->state ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Pin Code :</label>
                          <?php //echo $x->pin_code?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">BloddGroup :</label>
                          <?php //echo $x->blood_group ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Gender :</label>
                          <?php // echo $x->gender ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Martail Status :</label>
                          <?php // echo $x->martail_status?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">DOB :  </label>
                          <?php // echo $x->dob ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Disability:  </label>
                          <?php //if($x->disability == 1) 
                                //echo "Disable";
                             //  else 
                              //  echo "NOT Disable";
                           ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">PAN :  </label>
                          <?php //echo $x->pan_no ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Aadhar:  </label>
                          <?php //echo $x->aadhaar_no ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Father Name:</label>
                          <?php //echo $x->father_name ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ParentsSeniority:</label>
                          <?php //if($x->parents_seniority == 1) 
                                //echo "Yes";
                               //else 
                               // echo "NO";
                           ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ParentDisability :</label>
                          <?php //if($x->parents_disability == 1) 
                               // echo "Disable";
                               //else 
                               // echo "NOT Disable";
                           ?>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Children :</label>
                          <?php //echo $x->children ?>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">HostelerChildren :</label>
                          <?php //echo $x->hosteler_children?>
                        </div>
                      </div>
                    </div>
                    <?php
                            $btn = array(
                              'class' => "btn btn-primary pull-right",
                               'type' => 'submit',
                               'value' => 'Edit'
                            );
                    echo form_submit($btn);
                    ?>
                  <?php echo form_close(); ?>
                </div>
                    </div>
                    <div class="tab-pane" id="settings">
                          <?php echo form_open("profile/bankinfo"); ?>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Payment Mode</label>
                          <?php 
                              $pm = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'name' => 'pm'
                               );
                          echo form_input($pm);
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bank_Name</label>
                          <?php 
                              $bname = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'name' => 'bankname'
                              );
                          echo form_input($bname);
                          ?>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bank_Acc_No</label>
                          <?php 
                              $accno = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'name' => 'bank_acc_no'
                              );
                          echo form_input($accno);
                          ?>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bank_IFSC_Code</label>
                          <?php 
                              $ifsc = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'name' => ''
                              );
                          echo form_input($ifsc);
                          ?>
                        </div>
                      </div>
                  </div> 
                    <?php
                            $btn = array(
                              'class' => "btn btn-primary pull-right",
                               'type' => 'submit',
                               'name' => 'submit',
                               'value' => 'Edit'
                            );
                    echo form_submit($btn);
                    ?>
                <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
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
