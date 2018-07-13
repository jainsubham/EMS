<?php include('adminpannel.php');  ?>
<?php //echo "<pre>"; print_r($x); die(); ?>
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
                          <a class="nav-link" href="#messeges"  data-toggle="tab">
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
      <?= form_open('dashboard/editempdetails/'.$x['user_id']) ;?>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Company Name :</label>
              <?php  echo $company_name ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">EmployeeId :</label>
              <?php echo $x['employee_id'] ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Joining Date :</label>
              <?php echo $x['joining_date'] ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Confirmation Date :</label>
              <?php echo $x['confirmation_date'] ?>
            </div>
          </div>
      </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Effective From :</label>
              <?php echo $x['effective_from'] ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Effective To :</label>
              <?php  echo $x['effective_to'] ?>
            </div>
          </div>
        </div>
         <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Designation :</label>
              <?php echo $x['name']; ?>
            </div>
          </div>
      </div>
        
        <?php
                $btn = array(
                  'class' => "btn btn-primary pull-right",
                   'type' => 'submit',
                   'value' => 'Update'
                );
        echo form_submit($btn);
        ?>
                      <?php echo form_close(); ?>
        </div>
        <div class="tab-pane" id="messeges">
         <div class="card-body">
        <?php echo form_open("dashboard/editempdetails/".$x['user_id']); ?>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
             <label class="bmd-label-floating">Company : </label>
             <?php echo  $company_name ?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="bmd-label-floating">ContactNo :</label>
              <?php   echo $x['p']->contact_no ?>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label class="bmd-label-floating">Email address :</label>
              <?php  echo $Email ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">First Name :</label>
              <?php echo $x['p']->first_name ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Last Name :</label>
              <?php echo $x['p']->last_name ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Adress:</label>
              <?php echo $x['p']->address_1 ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Adress:</label>
              <?php echo $x['p']->address_2 ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="bmd-label-floating">City :</label>
              <?php echo $x['p']->city ?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="bmd-label-floating">State :</label>
              <?php echo $x['p']->state ?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="bmd-label-floating">Pin Code :</label>
              <?php echo $x['p']->pin_code?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="bmd-label-floating">BloddGroup :</label>
              <?php echo $x['p']->blood_group ?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="bmd-label-floating">Gender :</label>
              <?php  echo $x['p']->gender ?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="bmd-label-floating">Martail Status :</label>
              <?php  echo $x['p']->martail_status?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">DOB :  </label>
              <?php  echo $x['p']->dob ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Disability:  </label>
              <?php $disability = $x['p']->disability;
                if(null!=($disability)){
                      if($disability == 1) { 
                          echo "Disabled";
                      }
                      if($disability == 0 ) {
                          echo "NOT Disabled";
                     }
                }
               ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">PAN :  </label>
              <?php echo $x['p']->pan_no ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Aadhar:  </label>
              <?php echo $x['p']->aadhaar_no ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Father Name:</label>
              <?php echo $x['p']->father_name ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">ParentsSeniority:</label>
              <?php $ps = $x['p']->parents_seniority;
                if(null!=($ps)){
                      if($ps == 1) { 
                          echo "Senior Citizen";
                      }
                      if($ps == 0 ) {
                          echo "NO";
                     }
                }
               ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">ParentDisability :</label>
              <?php $pd = $x['p']->parents_disability;
                if(null!=($pd)){
                      if($disability == 1) { 
                          echo "Disabled";
                      }
                      if($disability == 0 ) {
                          echo "NOT Disabled";
                     }
                }
               ?>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label class="bmd-label-floating">Children :</label>
              <?php echo $x['p']->children ?>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label class="bmd-label-floating">HostelerChildren :</label>
              <?php echo $x['p']->hosteler_children?>
            </div>
          </div>
        </div>
        <?php
                $btn = array(
                  'class' => "btn btn-primary pull-right",
                   'type' => 'submit',
                   'value' => 'Update'
                );
        echo form_submit($btn);
        ?>
      <?php echo form_close(); ?>
                      </div>
        </div>
      
        <div class="tab-pane" id="settings">
           <?php echo form_open("profile/editempdetails"); ?>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Payment Mode :</label>
              <?php //echo $payment_mode ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Bank_Name :</label>
              <?php //echo $bank_name ?>
            </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Bank_Acc_No :</label>
              <?php //echo $bank_acc_no ?>
            </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Bank_IFSC_Code :</label>
              <?php //echo $bank_ifsc_code ?>
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
                    <img class="img" src="<?=base_url('assets/img/user/').$x['p']->img; ?>" />
                    </a>
                  </div>
                  <div class="card-body">
                  <h6 class="card-category text-gray"><?php echo $x['name'] ?></h6>
                  <h4 class="card-title"><?php echo $x['p']->first_name.' '.$x['p']->last_name?></h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
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
