//this is leave balance file
<?php include('adminpannel.php'); ?>

  <div class="main-panel" >
    <!--l Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="#">Leave Balance</a>
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
        <div class="row">
          		 <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Leave Balance Of Empoyees</h4>
                  <!-- <p class="card-category">Complete your profile</p> -->
                </div>
                <div class="card-body">
                <table id="example" class="mdl-data-table" style="width:100%">
        <thead>
            <tr>
      				<th>Employee_Id</th>
      				<th>Employee Name</th>
      				<th>Casual Leave Allowed</th>
              <th>Earning Leave Allowed</th>
      				<th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php //echo "<pre>"; print_r($leave); die(); ?>
          <?php foreach ($leave as $row) { ?>
            <tr>
            <td><?php if (isset($row['employee_id'])) {
             echo $row['employee_id']; ?></td>  
            <?php } ?>
            <td><?= $row['employee_name'];?></td>
            <td><?= $row['Casual Leave']; ?> </td>
            <td><?= $row['Privilege/Earned Leave']; ?> </td>
            <?= form_open('dashboard/edit_leave_data/'.$row['user_id']) ?>
            <td>
              <?php 
                  $btn = array(
                    'class' => "btn btn-info pull-center",
                    'type' => 'submit',
                    'name' => 'submit',
                    'value' => 'Edit'
                  );
                echo form_submit($btn);
                echo form_close(); ?>
            </td>
          </tr>
         <?php  } ?>
          
        </tbody>
     
      </table>
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
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src=" https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js "></script>
  

  <!--  Notifications Plugin    -->
  <script src="<?= base_url('assets/js/plugins/bootstrap-notify.js')?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/material-dashboard.min.js?v=2.1.0')?>" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
    $('#example').DataTable( {
        columnDefs: [
            {
                targets: [ 0, 1, 2 ],
                className: 'mdl-data-table__cell--non-numeric mdl-cell--12-col'
            }
        ]
    } );
    $('.mdl-grid').addClass('mdl-cell--12-col');
    $("#example_info").css("white-space", "normal");
} );

  </script>
  <script >
    $(document).ready(function() {
    $(".to-target").click(function() {
        window.location = $(this).data("href");
    });
});
  </script>
 