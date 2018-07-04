<?php include('adminpannel.php');?>
<div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Admin Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
           
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                <? echo form_open('profile/updateprofile') ?>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company (disabled)</label>
                          <?php 
                              $comp = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->name,
                                'disabled' => true
                              );
                          echo form_input($comp);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ContactNo</label>
                          <?php 
                              $contact = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->ContactNo,
                                'name' =>'contact'
                              );
                          echo form_input($contact);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <?php 
                              $email = array(
                                'class' =>'form-control',
                                'type' => 'email',
                                'value' => $x->Email,
                                'name' => 'email'
                              );
                          echo form_input($email);
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <?php 
                              $fname = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->FirstName,
                                'name' => 'fname'
                              );
                          echo form_input($fname);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <?php 
                              $lname = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->LastName,
                                'name' => 'lname'
                              );
                          echo form_input($lname);
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress1</label>
                          <?php 
                              $add1 = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->Address1,
                                'name' => 'add1'
                              );
                          echo form_input($add1);
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress2</label>
                          <?php 
                              $add2 = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->Address2,
                                'name' => 'add2'
                              );
                          echo form_input($add2);
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <?php 
                              $city = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->City,
                                'name' => 'city'
                              );
                          echo form_input($city);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">State</label>
                          <?php 
                              $state = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->State,
                                'name' =>'state'
                              );
                          echo form_input($state);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Pin Code</label>
                          <?php 
                              $pin = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->PinCode,
                                'name' => 'pin'
                              );
                          echo form_input($pin);
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Blood Group</label>
                          <?php 
                              $bld = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->BloodGroup,
                                'name' => 'blood'
                              );
                          echo form_input($bld);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Gender</label>
                          <?php 
                              $gender = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->Gender,
                                'name' =>'gender'
                              );
                          echo form_input($gender);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Martail Status</label>
                          <?php $martailstatus = array(
                                  'select' => '---select---',
                                  'married' =>'Married',
                                  'unmarried'=>"Unmarried",   
                                  );
                          echo form_dropdown('MartailStatus',$martailstatus,'select'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">DOB</label>
                          <?php 
                              $dob = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->Dob,
                                'name' => 'dob'
                              );
                          echo form_input($dob);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Disability</label>
                          <?php 
                              $dis = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->Disability,
                                'name' => 'dis'
                              );
                          echo form_input($dis);
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">PanCard Number</label>
                          <?php 
                              $pan = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->PAN,
                                'name' => 'pan'
                              );
                          echo form_input($pan);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">AadharCard NO</label>
                          <?php 
                              $aadhar = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->AadharNo,
                                'name' => 'aadhar'
                              );
                          echo form_input($aadhar);
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Father Name</label>
                          <?php 
                              $pname = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->FatherName,
                                'name' => 'pname'
                              );
                          echo form_input($pname);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ParentsSeniority</label>
                          <?php 
                              $parents = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->ParentsSeniority,
                                'name' => 'ps'
                              );
                          echo form_input($parents);
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ParentsDisability</label>
                          <?php $parentdis = array(
                               'select' => '---selec---',
                                '1' => 'Yes',
                                '0' => 'No'
                                );
                          echo form_dropdown('pd',$parentdis,'select'); ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Children</label>
                          <?php 
                              $children = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->State,
                                'name' =>'children'
                              );
                          echo form_input($children);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">HostelerChidren</label>
                          <?php 
                              $hc = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->HostelerChildren,
                                'name' => 'hc'
                              );
                          echo form_input($hc);
                          ?>
                        </div>
                      </div>
                    </div>
                    <?php
                            $btn = array(
                              'class' => "btn btn-primary pull-right",
                               'type' => 'submit',
                               'name' => 'submit',
                               'value' => 'Update Profile'
                            );
                    echo form_submit($btn);
                    ?>
                    <div class="clearfix"></div>
                  <?php echo form_close(); ?>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="../assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
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
</body>

</html>