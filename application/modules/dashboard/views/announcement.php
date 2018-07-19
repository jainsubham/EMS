
<?php include('adminpannel.php') ;?>
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
                <a href="<?= base_url('dashboard/add_announcement'); ?>" >
                    <?php
                            $btn = array(
                              'class' => "btn btn-primary pull-right",
                               'type' => 'button',
                               'name' => 'submit',
                               'value' => 'Add Announcement'
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
               <h4 style="margin-top: 10px">Announcement</h4>
                 <div class="container-fluid">
                  <div class="row">
                    <table style="margin-top: 50px;" class="table table-bordered table-striped table-hover css-serial reult" id="myTable"> 
                      <thead  class="col-md-12 ">
                        <tr class="card-header card-header-info" style="background-color: #9c27b0; color: white; box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);">
                          <th>Serial No</th>
                          <th>Date_Till_Display</th>
                          <th>Announcement</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $count = 0; ?>
                      <?php foreach ($x as $row) { ?>
                      <tr>
                        <td><?= ++$count; ?></td>
                        <td><?= $row->date_till_display ;?></td>
                        <td><?= $row->announcement?></td>
                        <td class="td-actions text-center">
                        <a href="<?= base_url('dashboard/edit_announcement/'.$row->id) ?>">
                        <button type="button" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                        </button>
                        </a>
                        <a href="<?= base_url('dashboard/delete_announcement/'.$row->id) ?>"  onclick = "delete">
                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" id="delete">
                                <i class="material-icons">close</i>
                            </button>
                        </a>
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
  <script type="text/javascript">
    function delete(delete){
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location.reload();
        else
          return false;
        } 
</script>