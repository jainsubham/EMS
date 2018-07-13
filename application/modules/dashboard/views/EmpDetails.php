<?php include('adminpannel.php'); ?>
<div class="main-panel">
       <div style="overflow-x:auto;">
           <div class="content">
        	    <div class="container-fluid">
          		    <div class="row">
			            <table style="margin-top: 4px;" class="table table-bordered table-striped table-hover css-serial reult"> 
			                <thead  class="col-md-12 ">
								<tr class="card-header card-header-primary" style="background-color: #9c27b0;box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);">
										<th>Serial No</th>
										<th>Photo</th>
										<th>Employee Name</th>
										<th>Designation</th>
										<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$count = 0;
									foreach ($data as $row) { ?>
										<tr>
										<td align="center"><?php echo ++$count; ?></td>
										<td align="center"><img src="<?= base_url('assets/img/user/').$row['img']; ?>" height = "80px" style="border-radius:50px;"></td>
										<td align="center"><?php echo $row['fname'].' '.$row['lname']  ;?></td>
										<td align="center"><?php echo $row['designationname'] ?></td>
										<?= form_open('dashboard/displayempdetails/'.$row['user_id']) ;?>			
										<td align="center">
											<?php
						                            $btn = array(
						                              'class' => "btn btn-primary pull-center",
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
