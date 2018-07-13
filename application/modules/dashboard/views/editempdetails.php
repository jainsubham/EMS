<?php include('adminpannel.php')  ?>
<?php //echo "<pre>"; print_r($x['p']->contact_no); die(); ?>
<div class="main-panel">
  <div class="container">
    <div class="container-fluid">
         <div class="row">
            <div class="col-lg-8 col-md-8">
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
                                 Employee Details;
                                <?=  form_open('dashboard/editdata/'.$x['user_id']) ;?>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company Name</label>
                          <?php 
                              $comp = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $company_name,
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
                                'value' => $x['employee_id'],
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
                                'value' => $x['joining_date'],
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
                                'value' => $x['confirmation_date'],
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
                                'value' => $x['effective_from'],
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
                                'value' => $x['effective_to'],
                                'name' => 'eto'
                              );
                          echo form_input($eto);
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                            <label >Select Designations</label><br>
                            <?php
                             echo form_dropdown('designations',$designations,$x['designation']); ?>   
                    </div>
                            <?php
                            $btn = array(
                              'class' => "btn btn-primary pull-right",
                               'type' => 'submit',
                               'value' => 'Update'
                            );
                            echo form_submit($btn); ?>
                          <?php echo form_close(); ?>
                      </div>
                    <div class="tab-pane" id="messages">
                      Personal Details
                  <div class="card-body">
                                <?=  form_open('dashboard/update_personal_info/'.$x['user_id']) ;?>
                    
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company Name</label>
                          <?php 
                              $comp = array(
                                'class' =>'form-control',
                                'type' => 'text',
                                'value' => $company_name,
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
                                'value' => $x['p']->contact_no,
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
                                'value' => $Email,
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
                                'value' => $x['p']->first_name,
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
                                'value' => $x['p']->last_name,
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
                                'value' => $x['p']->address_1,
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
                                'value' => $x['p']->address_2,
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
                                'value' => $x['p']->city,
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
                                'value' => $x['p']->state,
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
                                'value' => $x['p']->pin_code,
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
                                'value' => $x['p']->blood_group,
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
                         echo form_dropdown('gender',$gender,$x['p']->gender); ?>
                  
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
                          echo form_dropdown('MartailStatus',$martailstatus,$x['p']->martail_status); ?>
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
                                'value' => $x['p']->dob,
                                'name' => 'dob'
                              );
                          echo form_input($dob);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Disability</label>
                          <?php $dis = array(
                               'select' => 'Disability',
                                   '1' =>'Yes',
                                   '0'=>"No",   
                                );         
                          echo form_dropdown('dis',$dis,$x['p']->disability); ?>
                          
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
                                'value' => $x['p']->pan_no,
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
                                'value' => $x['p']->aadhaar_no,
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
                                'value' => $x['p']->father_name,
                                'name' => 'pname'
                              );
                          echo form_input($pname);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ParentsSeniority</label>
                          <?php $ParentsSeniority = array(
                               'select' => '---select---',
                                '1' => 'Yes',
                                '0' => 'No'
                                );
                          echo form_dropdown('ps',$ParentsSeniority,$x['p']->parents_seniority); ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ParentsDisability</label>
                          <?php $parentdis = array(
                               'select' => '---select---',
                                '1' => 'Yes',
                                '0' => 'No'
                                );
                          echo form_dropdown('pd',$parentdis,$x['p']->parents_disability); ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">children</label>
                          <?php $children = array(
                               'select' => '---select---',
                                '0' => '0',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                  
                                );
                        echo form_dropdown('children',$children,$x['p']->children); ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">HostelerChidren</label>
                          <?php $HostelerChidren = array(
                               'select' => '---select---',
                                '1' => 'Yes',
                                '0' => 'No'
                                );
                          echo form_dropdown('hc',$HostelerChidren,$x['p']->hosteler_children); ?>
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
                    echo form_submit($btn);
                    ?>
                    <div class="clearfix"></div>
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
      <div class="col-md-4">
              <div class="card card-profile">
                  <div class="card-avatar" style="margin-top: -22px;">
                    <a href="#pablo">
                    <img id="OpenImgUpload" class="img" src="<?=base_url('assets/img/user/').$x['p']->img; ?>" />
                    </a>
                  </div>
                  <!-- <button type="button" rel="tooltip" title="Edit Image" class="btn btn-primary btn-link btn-sm" style="margin-left: 120px; margin-top: -50px" >
                                <i class="material-icons">edit</i>
                              </button> -->
                <? $hidden = array('user_id' => $x['user_id']); echo form_open_multipart("dashboard/img_update",'',$hidden); ?>
                         <input type="file" id="imgupload" name="img" style="display:none;" onchange="SubmitForm();" /> 
                        <input type="submit" name="submit" value="submit" id="submitimg" style="display:none;">
                        <?= form_close(); ?>

                  <div class="card-body">
                  <h6 class="card-category text-gray"> Chief Terrorist</h6>
                  <h4 class="card-title"><?php echo $x['p']->first_name.' '.$x['p']->last_name?></h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
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
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="<?= base_url('assets/js/plugins/chartist.min.js') ?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?= base_url('assets/js/plugins/bootstrap-notify.js'); ?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/material-dashboard.min.js?v=2.1.0'); ?>" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  

  <script >
    $('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });
  </script>
  <script>
    function SubmitForm() {
      $('#submitimg').trigger('click');
  }
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
