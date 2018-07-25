
<div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Your Profile</a>
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
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                <? $hidden = array('adminid' => $x->id); echo form_open_multipart("profile/updateprofile",'',$hidden); ?>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company Name</label>
                          <?php 
                              $comp = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $companyname,
                                'disabled' => true
                              );
                          echo form_input($comp);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact No</label>
                          <?php 
                              $contact = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->contact_no,
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
                                'value' => $x->email,
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
                                'value' => $x->first_name,
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
                                'value' => $x->last_name,
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
                          <label class="bmd-label-floating">Residence Address</label>
                          <?php 
                              $add1 = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->address_1,
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
                          <label class="bmd-label-floating">Office Address</label>
                          <?php 
                              $add2 = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->address_2,
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
                                'value' => $x->city,
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
                                'value' => $x->state,
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
                                'value' => $x->pin_code,
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
                                'value' => $x->blood_group,
                                'name' => 'blood'
                              );
                          echo form_input($bld);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Gender</label>
                         <?php $gender = array(
                               'select' => '---select---',
                               'male' =>'Male',
                               'female'=>"Female",
                               'other'=>"Other"    
                            );
                         echo form_dropdown('gender',$gender,$x->gender); ?>
                  
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Martail Status</label>
                          <?php $martialstatus = array(
                                  'select' => '---select---',
                                  'married' =>'Married',
                                  'unmarried'=>"Unmarried",   
                                  );
                          echo form_dropdown('MartialStatus',$martialstatus,$x->martial_status); ?>
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
                                'type' => 'date',
                                'value' => $x->dob,
                                'name' => 'dob'
                              );
                          echo form_input($dob);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Disabled</label>
                          <?php $dis = array(
                               'select' => 'Disability',
                                   '1' =>'Yes',
                                   '0'=>"No",   
                                );         
                          echo form_dropdown('dis',$dis,$x->disability); ?>
                          
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">PAN No</label>
                          <?php 
                              $pan = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->pan_no,
                                'name' => 'pan'
                              );
                          echo form_input($pan);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Aadhar No</label>
                          <?php 
                              $aadhar = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $x->aadhaar_no,
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
                                'value' => $x->father_name,
                                'name' => 'pname'
                              );
                          echo form_input($pname);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Parents Senior Citizen</label>
                          <?php $ParentsSeniority = array(
                               'select' => '---select---',
                                '1' => 'Yes',
                                '0' => 'No'
                                );
                          echo form_dropdown('ps',$ParentsSeniority,$x->parents_seniority); ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Parents Disabled</label>
                          <?php $parentdis = array(
                               'select' => '---select---',
                                '1' => 'Yes',
                                '0' => 'No'
                                );
                          echo form_dropdown('pd',$parentdis,$x->parents_disability); ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Children</label>
                          <?php $children = array(
                               'select' => '---select---',
                                '0' => 'No',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',

                                );
                        echo form_dropdown('children',$children,$x->children); ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Hosteler Chidren</label>
                          <?php $HostelerChidren = array(
                               'select' => '---select---',
                                '1' => 'Yes',
                                '0' => 'No'
                                );
                          echo form_dropdown('hc',$HostelerChidren,$x->hosteler_children); ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Select Image</label>
                            <? $img = array(
                               'name' => 'img'
                            );
                            echo  form_upload($img); ?> 
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

                    <img class="img" src="<?= base_url('assets/img/user/').$x->img; ?>" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title"><?php echo $x->first_name.' '.$x->last_name; ?></h4>
                  <p class="card-description">
                   Details
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </div>
  <script src="<?= base_url('assets/js/core/jquery.min.js')?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/core/popper.min.js')?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/core/bootstrap-material-design.min.js')?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js')?>"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?= base_url('assets/js/plugins/bootstrap-notify.js')?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/material-dashboard.min.js?v=2.1.0')?>" type="text/javascript"></script>
</body>

</html>