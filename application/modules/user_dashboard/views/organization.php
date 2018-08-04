<?php include('user_header.php');?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style type="text/css">
  td{
    width: 45px;
  }
  .profileImageTree{
    display: block;
    margin: auto;
  }
  .profileName{
    font-weight: 600;
    font-size: 12px;
  }
  .jobTitle{
    line-height: 0;
    margin-bottom: 15px;
  }
</style>

 <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#">Organization Structure</a>
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
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header card-header-info">
                   <h4 class="card-title">Graphical presentation of structure of your Organization </h4>
               	  <!-- <p class="card-category">Complete your profile</p> -->
                  </div>
                <div class="card-body">
                    <? 
		    		    for($i=1;$i<=$count;$i++){
                            echo '<div class="chart" id="org_struct_'.$i.'"></div>';
		    	         }
                     ?>

                </div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
</div>

    
    <? $c = 1;

        foreach ($data as $node) {
    ?>
 <script type="text/javascript">
      google.charts.load('current', {packages:["orgchart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');
        // For each orgchart box, provide the name, manager, and tooltip to show.
        data.addRows([

    <?
            foreach ($node as $key => $element) {
    ?>
        [{v:'<?= $key ?>', f:'<div><img class="profileImageTree" src="<?= base_url('/assets/img/user/'.$element['img']) ?>" width="60px"><strong class="profileName"><?= $element['name'] ?></strong><div class="jobTitle"> <?= $element['employee_id'] ?> - <?= $element['designation'] ?></div></div>'},'<? if(isset($element['parent'])){
           echo $element['parent']; 
           }
       ?>', ''],

    <?  }   ?>
     ]);
    // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('org_struct_<?= $c ?>'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {allowHtml:true,allowCollapse:true});
      }
   
   </script>

    <?
            $c++;
        }

    ?>


</body>
</html> 