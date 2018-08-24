<?php include('user_header.php'); ?>
<style type="text/css">
  .chosen-container{
    width: 250px !important;
  }
  
  .select-category select{
    width: 200px;
  }

</style>
<?= link_tag('assets/css/chosen.css') ?>
<?= link_tag('assets/css/bootstrap-clockpicker.min.css') ?>
<?= link_tag('assets/css/bootstrap-clockpicker.css') ?>
<?= link_tag('assets/css/clockpicker.css') ?>
<?= link_tag('assets/css/jquery-clockpicker.css') ?>
<?= link_tag('assets/css/jquery-clockpicker.min.css') ?>

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo"><b>Regularize Attendance</b></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title" style="margin-left: 15px">Regularize Attendance</h4>
                </div>
                <div class="card-body">
                <?php  ?>
                 <?=  form_open('user_dashboard/regularize_attendance_data') ;?>
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Select Employee:</label><br>
                          <select name="user_id" data-placeholder="Select Name"  class="chosen-select" >
                            <option> </option>
                            <?php print_r($report);  ?>
                        </select>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Select Date</label>
                        <?php
                          $date = array(
                            'class' => 'form-control',
                            'type' => 'date',
                            'name' => 'date'
                          );
                          echo form_input($date);  
                         ?>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group select-category">
                        <label >Select Category</label><br>
                         <select id="xyz" onclick="myfunction()" name="category">
                          <option>---select Category--</option>
                           <option value="Check In & Check Out">Check In & Check Out</option>
                           <option value="Work From Home">Work From Home</option>
                         </select>
                        </div>
                      </div>
                  </div>
                  <div class="row" id='abc'>
                    <div class="col-md-6">
                        <div class="form-group">
                         <label>select Check IN</label>
                          <div class="input-group clockpicker">
                            <input type="text" class="form-control" name="check_in">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>select Check Out</label>
                          <div class="input-group clockpicker">
                            <input type="text" class="form-control" name="check_out">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                          </div>
                        </div>
                    </div>
                  </div>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Comment</label>
                            <?php
                     $comment = array(
                      'class'  => 'form-control',
                      'rows'   => '2',
                      'cols'   => '12',
                      'name'   => 'reason'  
                      );
                    echo form_textarea($comment); ?>
              </div>
          </div>
                </div>
                    <?php
                            $btn = array(
                              'class' => "btn btn-info pull-right",
                               'type' => 'submit',
                               'name' => 'submit',
                               'value' => 'submit'
                            );
                    echo form_submit($btn);
                    ?>
                    <?php echo form_close(); ?>    </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?= base_url('assets/js/bootstrap-clockpicker.js');?>"></script>
  <script src="<?= base_url('assets/js/bootstrap-clockpicker.min.js');?>"></script>
  <script src="<?= base_url('assets/js/jquery-clockpicker.js');?>"></script>
  <script src="<?= base_url('assets/js/jquery-clockpicker.min.js');?>"></script>

  <script src="<?= base_url('assets/js/core/jquery.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/chosen.jquery.min.js'); ?>" type="text/javascript"></script>
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
  <script type="text/javascript">
    var config = {
  '.chosen-select'           : {},
  '.chosen-select-deselect'  : { allow_single_deselect: true },
  '.chosen-select-no-single' : { disable_search_threshold: 10 },
  '.chosen-select-no-results': { no_results_text: 'Oops, nothing found!' },
  '.chosen-select-rtl'       : { rtl: true },
  '.chosen-select-width'     : { width: '95%' }
}
for (var selector in config) {
  $(selector).chosen(config[selector]);
}
</script>
  <script type="text/javascript">
$('.clockpicker').clockpicker();
</script>
<script>
  function myfunction() {
    var x = document.getElementById('xyz');
    if (x.value === 'Work From Home') {
      document.getElementById("abc").style.display = "none"; 
    }
    else {
      document.getElementById("abc").style.display = ""; 
    }
  }
</script>