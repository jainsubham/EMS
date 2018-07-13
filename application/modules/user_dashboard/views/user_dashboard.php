    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Welcome <?= $user_name ?> </a>
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
            <container class="col-lg-3">
           <div >
                <div class="card">
                  <div class="card-header card-header-info self-card-small-header" >
                    <h4 class="card-title">Quick Links</h4>
                  </div>
                  <div class="card-body self-card-body">
                    <div>
                    <span class="inline-flex-nd">
                      <i class="material-icons">chrome_reader_mode</i>
                      <p class="self-data-card-header">Request Leave</p>
                      </span>
                      <p class="self-data-card-des"> Add an application for leave</p>
                    </div>
                    <div>
                    <span class="inline-flex-nd">
                      <i class="material-icons">assignment</i>
                      <p class="self-data-card-header">Regularize Attendence</p>
                      </span>
                      <p class="self-data-card-des"> Add a regularization request</p>
                    </div>
                    <div>
                    <span class="inline-flex-nd">
                      <i class="material-icons">attach_money</i>
                      <p class="self-data-card-header">View Payslips</p>
                      </span>
                      <p class="self-data-card-des"> Access your Payroll history</p>
                    </div>
                  </div>
                </div>
              </div>
              <div >
                <div class="card">
              <div class="card-header card-header-warning self-card-small-header" >
                    <h4 class="card-title">Leaves Remaining</h4>
                  </div>
                  <div class="card-body self-card-body">
                    <div>
                    <span class="inline-flex-nd">
                      <i class="material-icons">alarm_on</i>
                      <p class="self-data-card-header">Casual Leaves</p>
                      </span>
                      <p class="self-data-card-des"> 10 Days</p>
                    </div>
                    <div>
                    <span class="inline-flex-nd">
                      <i class="material-icons">event</i>
                      <p class="self-data-card-header">Earned Leaves</p>
                      </span>
                      <p class="self-data-card-des"> 2 Days</p>
                    </div>
                  </div>
                </div>
              </div>
            </container>
          <div class="col-lg-9">
            <div class="card">
              <div class="card-header card-header-success self-card-small-header" >
                    <h4 class="card-title">Your working hours</h4>
                  </div>
                  <div class="card-body self-card-body">
                    <div id="chartcontainer"></div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!--   Core JS Files   -->
  <script src="<?= base_url('assets/js/core/jquery.min.js')?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/core/popper.min.js')?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/core/bootstrap-material-design.min.js')?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js')?>"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?= base_url('assets/js/plugins/bootstrap-notify.js')?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/material-dashboard.min.js?v=2.1.0')?>" type="text/javascript"></script>
 <script>
      
    var chart = Highcharts.chart('chartcontainer', {

        title: {
            text: 'Your working hour record per day'
        },

        subtitle: {
            text: 'Showing record of 1 week'
        },

        xAxis: {
            categories: ['Monday', 'Tuesday', 'Wednesday', 'Thrusday', 'Friday', 'Saturday', 'Sunday']
        },

        series: [{
            type: 'column',
            colorByPoint: true,
            data: [12,10,09,14,11,07,00],
            showInLegend: false
        }]

    });
</script>
    
</body>

</html>
