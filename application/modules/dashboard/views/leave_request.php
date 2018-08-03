<?php include('adminpannel.php');?>
   <style>
.pagination {
    display: inline-none;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
   <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          <div class="container-fluid">
            <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Leave Status</a>
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
                <div class="card-header card-header-success">
                  <h4 class="card-title">Employees Leave Request</h4>
                </div>
                <div class="card-body">
                  <div class="container-fluid">
                  <div class="row">
                    <table style="margin-top: -10px;" class="table table-bordered table-striped table-hover css-serial reult" id="myTable"> 
                      <thead  class="col-md-12 ">
                        <!-- <tr class="card-header card-header-info" style="background-color: #9c27b0; color: white; box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);"> -->
                        <tr>
                          <th><b>Employee Name</b></th>
                          <th><b>Category</b></th>
                          <th><b>Start Date</b></th>
                          <th><b>End Date</b></th>
                          <th><b>Half Day</b></th>
                          <th><b>Total Days</b></th>
                          <th><b>Status</b></th>
                          <th><b></th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <?php if($q) { ?>
                            <?php foreach ($q as $row) { ?>
                                <td><?php echo '<b>'.$row->user_id.'<b>'; ?></td>
                                <td><?= $row->leave_category;?></td>
                                <td><?= $row->start_date ?></td>
                                <td><?= $row->end_date ?></td>
                                <?php
                                  if ($row->half_day == 1) { ?>
                                    <td><?php echo "Yes"; ?></td>
                                <?php } 
                                  else{ ?>
                                <td><?php echo "No" ;?></td>
                                  <?php }
                                ?>
                                <?php
                                if ($row->half_day == 1) {
                                  $date1 = strtotime($row->start_date);
                                  $date2 = strtotime($row->end_date);
                                  $datediff = $date2 - $date1;
                                  $no_of_days =  floor($datediff / (60 * 60 * 24));
                                  $total = $no_of_days + 0.5; ?>
                                  <td><?= $total.'days' ?></td>
                                <?php }
                                else {
                                    $date1 = strtotime($row->start_date);
                                    $date2 = strtotime($row->end_date);
                                    $datediff = $date2 - $date1;
                                    $no_of_days =  floor($datediff / (60 * 60 * 24)); ?>
                                    <td><?= $no_of_days.'days' ;?></td>
                                <?php   } ?>
                                <?php
                                  if ($row->approvation_status == 1) {
                                     $approved = '<button class="btn btn-success self-button-padding">Approved</button>'; ?>
                                    <td><?= $approved ;?></td>
                                    <?php }
                                    elseif ($row->approvation_status == 2) {
                                      $rejected = '<button class="btn btn-danger self-button-padding">Rejected</button>'; ?>
                                    <td><?= $rejected ;?></td> 
                                    <?php  }
                                    else { 
                                     $pending = '<button class="btn btn-warning self-button-padding">Pending</button>'; 
                                    ?>
                                    <td><?= $pending ?></td>
                                <?php } ?> 
                                <?php if ($row->approvation_status == 1) { ?>
                                <td class="td-actions text-center">
                                 <a href="<?= base_url('dashboard/action_leave_request/'.$row->id.'/2') ?>">
                                  <button type="button" rel="tooltip" title="Reject" class="btn btn-danger btn-link btn-sm">
                                      <i class="material-icons">close</i>
                                  </button>
                                 </a>
                                </td>
                                <?php  } 
                                elseif ($row->approvation_status == 2) { ?>
                                <td class="td-actions text-center">
                                  <a href="<?= base_url('dashboard/action_leave_request/'.$row->id.'/1') ?>">
                                    <button type="button" rel="tooltip" title="Approve" class="btn btn-primary btn-link btn-sm">
                                      <i class="material-icons">done</i>
                                    </button>
                                  </a>
                                </td>
                                <?php }
                                else {  ?>
                                <td class="td-actions text-center">
                                  <a href="<?= base_url('dashboard/action_leave_request/'.$row->id.'/1') ?>">
                                    <button type="button" rel="tooltip" title="Approve" class="btn btn-primary btn-link btn-sm">
                                          <i class="material-icons">done</i>
                                    </button>
                                  </a>
                                  <a href="<?= base_url('dashboard/action_leave_request/'.$row->id.'/2') ?>">
                                    <button type="button" rel="tooltip" title="Reject" class="btn btn-danger btn-link btn-sm">
                                          <i class="material-icons">close</i>
                                    </button>
                                  </a>
                               </td>
                             <?php }?>
                              </tr>

                            <?php 
                             } 
                          }
                      ?>
                      </tbody>
                    </table>
                    <?php echo $this->pagination->create_links(); ?>
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