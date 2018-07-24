<?php include('adminpannel.php'); ?>
<div class="main-panel">
	<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
			
              <div class="input-group no-border">
              </div>
              	<a href="<?= base_url('dashboard/upload_attendance'); ?>" >
                    <?php
                            $btn = array(
                              'class' => "btn btn-primary pull-right",
                               'type' => 'button',
                               'name' => 'submit',
                               'value' => 'upload attendance'
                            );
                    echo form_submit($btn);
                    ?>
                </a>
          </div>
        </div>
      </nav>
       <div style="overflow-x:auto;">
           <div class="content">
           	<div class="container">
           	<h4 style="margin-top: 10px">Attendance of Employees</h4>
        	    <div class="container-fluid">
          		
                <table id="example" class="mdl-data-table" style="width:100%">
        <thead>
            <tr>
                <th>Employee Id</th>
                <th>Name</th>
                <? for($i=6;$i>=0;$i--){ 
                echo "<th>".$data['0']['week'][$i]['day']."<br>".$data['0']['week'][$i]['display_date']."</th>";
                 }
                 ?>
            </tr>
        </thead>
        <tbody>
            <? foreach ($data as $row) { ?>

            <tr class="to-target" data-href="<?= base_url('dashboard/get_monthly_attendance/'.$row['user_id'].'/'.date('Y-m')) ?>">
                <td><?= $row['employee_id'] ?></td>
                <td><?= $row['name'] ?></td>
                <? 
                    $present = '<td><button class="btn btn-success self-button-padding">Present</button></td>';
                    $absent = '<td><button class="btn btn-danger self-button-padding">Absent</button></td>'; 
                    $off = '<td><button class="btn btn-info self-button-padding">Off</button></td>';
                    for($i=6;$i>=0;$i--){

                        $status = $row['week'][$i]['status'];
                        if($status==0){
                            echo $absent;
                        }
                        if($status==1){
                            echo $present;
                        }
                        if($status==2){
                            echo $off;
                        }
                         } ?>
                    </tr>
               
                    <?    }  ?>
        </tbody>
     
    </table>


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