<?php include('adminpannel.php');  ?>
<?php //echo "<pre>"; print_r($x); die(); ?>
<div class="main-panel">
<div class="container">
  <div class="container-fluid">

         <div class="row">
            <div class="col-lg-8 col-md-8">
              <div class="card">
                <div class="card-header card-header-tabs card-header-info">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <!-- <span class="nav-tabs-title">Edit:</span> -->
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#profile" data-toggle="tab" style="font-size: 10px; padding: 10px 10px;">
                            <i class="material-icons">person</i>Employee Details  
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messeges"  data-toggle="tab" style="font-size: 10px; padding: 10px 10px;">
                            <i class="material-icons">details</i>Personal Details
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab" style="font-size: 10px; padding: 10px 10px;">
                            <i class="material-icons">attach_money</i>Bank Details/salary
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item ">
                          <a class="nav-link " href="#xyz" data-toggle="tab" style="font-size: 10px; padding: 10px 10px;">
                            <i class="material-icons">add</i> Supervisor
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
              <?php if(isset($x['name'])){
              echo $x['name']." (".$x['team_name'].")"; 
            }?>
            </div>
          </div>
      </div>
        
        <?php
                $btn = array(
                  'class' => "btn btn-info pull-right",
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
              <?php  echo $x['p']->email ?>
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
              <?php  echo $x['p']->martial_status?>
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
                  'class' => "btn btn-info pull-right",
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
                  'class' => "btn btn-info pull-right",
                   'type' => 'submit',
                   'name' => 'submit',
                   'value' => 'Update'
                );
        echo form_submit($btn);
        ?>
        <?php echo form_close(); ?>
        </div>
        <div class="tab-pane" id = "xyz">
          <?php echo form_open("dashboard/editempdetails/".$x['user_id']); ?>
          <h3 align="Center" style="color: blue"><u>Employee</u></h3>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Emploee Name :</label>
              <?php  echo $x['p']->first_name.' '.$x['p']->last_name ; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Employee_Id :</label>
              <?php echo $x['employee_id']  ?>
            </div>
          </div>
      </div>
        <h3 align="Center" style="color: blue"><u>Reporting Supervisor</u></h3>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Employee Name :</label>
              <?php echo $x['reporting_name']->first_name.' '.$x['reporting_name']->last_name ; ?>
            </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Employee_Id :</label>
              <?= $x['reporting_id'] ?>
            </div>
          </div>
      </div>
        <?php
                $btn = array(
                  'class' => "btn btn-info pull-right",
                   'type' => 'submit',
                   'name' => 'submit',
                   'value' => 'Update'
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
                  <p class="self-card-designation text-gray inline-flex-nd"><i class="material-icons">work</i> &nbsp <?php if(isset($x['name'])){
              echo $x['name']; 
              }?>  at &nbsp<b><?= $company_name ?></b></p>
                  <h4 class="card-title"><?php echo $x['p']->first_name.' '.$x['p']->last_name?></h4>
                  <p class="card-description ">
                    <div class="row text-gray">
                    <div class="col-md-5 inline-flex-nd "><i class="material-icons">call</i><?= $x['p']->contact_no ?></div>
                    <div class="col-md-7 inline-flex-nd"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="18.211px" height="24.211px" viewBox="0 0 485.211 485.211" style="enable-background:new 0 0 485.211 485.211; fill: #999999;"
   xml:space="preserve">
<g>
  <path d="M485.211,363.906c0,10.637-2.992,20.498-7.785,29.174L324.225,221.67l151.54-132.584
    c5.895,9.355,9.446,20.344,9.446,32.219V363.906z M242.606,252.793l210.863-184.5c-8.653-4.737-18.397-7.642-28.908-7.642H60.651
    c-10.524,0-20.271,2.905-28.889,7.642L242.606,252.793z M301.393,241.631l-48.809,42.734c-2.855,2.487-6.41,3.729-9.978,3.729
    c-3.57,0-7.125-1.242-9.98-3.729l-48.82-42.736L28.667,415.23c9.299,5.834,20.197,9.329,31.983,9.329h363.911
    c11.784,0,22.687-3.495,31.983-9.329L301.393,241.631z M9.448,89.085C3.554,98.44,0,109.429,0,121.305v242.602
    c0,10.637,2.978,20.498,7.789,29.174l153.183-171.44L9.448,89.085z"/>
</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
 &nbsp<?= $x['p']->email ?></div>
                    </div>
                    <div class="row text-gray self-div-row-padding">
                    <div class="col-md-3 inline-flex-nd"><svg style="width:24px;height:24px; fill: #999999;" viewBox="0 0 24 24">
    <path  d="M12,20A6,6 0 0,1 6,14C6,10 12,3.25 12,3.25C12,3.25 18,10 18,14A6,6 0 0,1 12,20Z" />
</svg><?= $x['p']->blood_group ?></div>
                    <div class="col-md-3 inline-flex-nd"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px;" height="20px"
   viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; fill: #999999;"  xml:space="preserve">
<g>
  <g>
    <path d="M476.722,0.159L366.323,0l-0.043,30.059l59.203,0.085l-82.618,82.618c-37.951-29.78-89.316-34.444-131.471-13.993
      c-15.719-7.162-33.173-11.157-51.544-11.157c-68.777,0-124.732,55.954-124.732,124.732c0,63.971,48.411,116.839,110.519,123.917
      v89.863H90.168v30.059h55.469V512h30.059v-55.818h55.469v-30.059h-55.469v-90.05c13.704-1.745,26.717-5.727,38.669-11.559
      c16.338,7.397,33.952,11.105,51.57,11.105c31.941,0,63.882-12.159,88.198-36.475c23.559-23.558,36.533-54.881,36.533-88.198
      c0-28.254-9.335-55.072-26.539-76.938l82.608-82.608l0.086,59.202l30.059-0.043L476.722,0.159z M159.85,307.017
      c-52.203,0-94.673-42.47-94.673-94.673c0-52.203,42.47-94.673,94.673-94.673c7.131,0,14.078,0.798,20.764,2.299
      c-0.969,0.91-1.931,1.831-2.877,2.776c-48.633,48.633-48.633,127.765,0,176.397c1.729,1.729,3.501,3.39,5.303,4.995
      C175.617,306.016,167.849,307.017,159.85,307.017z M213.885,290.036c-5.267-3.469-10.263-7.517-14.893-12.147
      c-36.912-36.913-36.912-96.974,0-133.888c4.026-4.026,8.339-7.585,12.856-10.732c25.688,16.948,42.675,46.062,42.675,79.073
      C254.523,244.474,238.43,272.913,213.885,290.036z M332.88,277.89c-23.767,23.766-57.126,32.205-87.727,25.368
      c24.253-22.769,39.429-55.101,39.429-90.913c0-36.999-16.199-70.28-41.869-93.143c7.613-1.914,15.416-2.885,23.222-2.885
      c24.243,0,48.488,9.228,66.944,27.684c17.881,17.882,27.729,41.656,27.729,66.944C360.608,236.232,350.761,260.008,332.88,277.89z
      "/> </g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
 &nbsp<?= $x['p']->gender ?></div>
                     <div class="col-md-6 inline-flex-nd"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 469.333 469.333" style="enable-background:new 0 0 469.333 469.333; fill: #999999;"  width="24px;" height="20px" xml:space="preserve">
<g> <g>   <g>     <path d="M234.56,128c23.573,0,42.667-19.093,42.667-42.667c0-8-2.24-15.573-6.08-21.973L234.56,0l-36.587,63.36
        c-3.84,6.4-6.08,13.973-6.08,21.973C191.893,108.907,210.987,128,234.56,128z"/>
      <path d="M362.56,192L362.56,192H255.893v-42.667h-42.667V192H106.56c-35.307,0-64,28.693-64,64v32.853
        c0,23.04,18.773,41.813,41.813,41.813c11.2,0,21.653-4.373,29.547-12.267l45.653-45.547l45.547,45.44
        c15.787,15.787,43.307,15.787,59.093,0l45.653-45.44l45.547,45.44c7.893,7.893,18.347,12.267,29.547,12.267
        c23.04,0,41.813-18.773,41.813-41.813V256C426.56,220.693,397.867,192,362.56,192z"/>
      <path d="M332.587,341.013L332.587,341.013l-22.933-22.933l-23.04,22.933c-27.84,27.84-76.48,27.84-104.32,0L159.36,318.08
        l-23.04,22.933c-13.76,13.973-32.213,21.653-51.947,21.653c-15.467,0-29.867-4.907-41.813-13.12V448
        c0,11.733,9.6,21.333,21.333,21.333h341.333c11.733,0,21.333-9.6,21.333-21.333v-98.453c-11.947,8.213-26.24,13.12-41.813,13.12
        C365.013,362.667,346.56,354.987,332.587,341.013z"/>   </g>  </g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg><?= $x['p']->dob ?></div>
                    </div>  
                  </p>
                   <div class="self-div-more-details">
                      <button class="self-button-more-details" id="headingFour1"  onclick="showdetails();" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 49.656 49.656" height="24px" style="enable-background:new 0 0 49.656 49.656;" xml:space="preserve">
<g>
  <polygon style="fill:#00AD97;" points="1.414,14.535 4.242,11.707 24.828,32.292 45.414,11.707 48.242,14.535 24.828,37.95   "/>
  <path style="fill:#00AD97;" d="M24.828,39.364L0,14.536l4.242-4.242l20.586,20.585l20.586-20.586l4.242,4.242L24.828,39.364z
     M2.828,14.536l22,22l22-22.001l-1.414-1.414L24.828,33.707L4.242,13.122L2.828,14.536z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></button>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                      <div class="self-more-details-profile">
                         <div class="col-md-12 inline-flex-nd text-gray">
                         <i class="material-icons">place</i> <?= $x['p']->address_1 ?> , <?= $x['p']->address_2 ?> , <?= $x['p']->city ?> , <?= $x['p']->state ?> , <?= $x['p']->pin_code ?>
                         </div>
                      </div>
                    </div>
                    <div class="self-div-more-details">
                      <button class="self-button-more-details" style="display: none;" id="headingFour2" onclick="hidedetails();" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"  viewBox="0 0 49.656 49.656" height="24px" style="enable-background:new 0 0 49.656 49.656;" xml:space="preserve"><g>  <polygon style="fill:#00AD97;" points="48.242,35.122 45.414,37.95 24.828,17.364 4.242,37.95 1.414,35.122 24.828,11.707  "/>
  <path style="fill:#00AD97;" d="M45.414,39.363L24.828,18.778L4.242,39.363L0,35.121l24.828-24.828l24.828,24.828L45.414,39.363z
     M24.828,15.95l20.586,20.585l1.414-1.414l-22-22l-22,22l1.414,1.414L24.828,15.95z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></button>
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
  <script type="text/javascript">
    function showdetails(){
      document.getElementById('headingFour1').style.display="none"; 
      document.getElementById('headingFour2').style.display="inline-block"; 

    };
    function hidedetails(){
      document.getElementById('headingFour2').style.display="none"; 
      document.getElementById('headingFour1').style.display="inline-block"; 
      

    };
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
                  
                  
                 