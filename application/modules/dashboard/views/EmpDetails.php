<?php include('adminpannel.php'); ?>
  <div class="main-panel" >
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="#">Employee Directory</a>
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
                  <h4 class="card-title">Employee's of your organization</h4>
                  <!-- <p class="card-category">Complete your profile</p> -->
                </div>
                <div class="card-body">
                <table id="example" class="mdl-data-table" style="width:100%">
        <thead>
            <tr>
				<th>Photo</th>
				<th>Employee_Id</th>
				<th>Employee Name</th>
				<th>Designation</th>
				<th></th>
            </tr>
        </thead>
        <tbody>
            <?php
			foreach ($data as $row) { ?>

				<tr>
				<td align="center"><img src="<?= base_url('assets/img/user/').$row['img']; ?>" height = "55px" style="border-radius:50px;"></td>
				<td><?= $row['employee_id'] ?></td>
				<td align="center"><?php echo $row['fname'].' '.$row['lname']  ;?></td>
				<td align="center"><?php echo $row['designationname'] ?></td>
				<?= form_open('dashboard/displayempdetails/'.$row['user_id']) ;?>			
				<td align="center">
					<?php
                            $btn = array(
                              'class' => "btn btn-info pull-center",
                               'type' => 'submit',
                               'name' => 'submit',
                               'value' => 'Manage'
                            );
                    echo form_submit($btn); ?>   
				</td>
				<?php echo form_close(); ?>
				</tr>
			 <?php	
			}
		?>
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