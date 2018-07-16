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
          		    <div class="row">
			            <table style="margin-top: 50px;" class="table table-bordered table-striped table-hover css-serial reult" id="myTable"> 
			                <thead  class="col-md-12 ">
								<tr class="card-header card-header-info" style="background-color: #9c27b0; color: white; box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);">
										<th>Serial No</th>
										<th>Eployee ID</th>
										<th>Employee Name</th>
										<th>Attendance</th>
										<th>Action</th>
								</tr>
							</thead>
							<tbody> 
								<?php $count=1; ?>
							<? foreach($x as  $row){ ?>
								<tr>
									<td><?=  $count++; ?></td>
									<td><?= $row['employee_id']; ?></td>
									<td><?= $row['first_name'].''.$row['last_name']; ?></td>
									<td>P</td>
									<td>edit</td>
								</tr>
								<? } ?>
							</tbody>
								
			            </table>
    				</div>
    			</div>
    			</div>
            </div>
        </div>
</div>
