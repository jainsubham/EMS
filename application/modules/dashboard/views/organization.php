<?php include('adminpannel.php') ;?>

<?= link_tag('assets/css/treant.css') ?>
<?= link_tag('assets/css/org-struct.css') ?>

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

		    <script src="<?= base_url('assets/js/raphael.js') ?>"></script>
		    <script src="<?= base_url('assets/js/treant.js') ?>"></script>
    
    <? $c = 1;

        foreach ($data as $node) {
    ?>
<script type="text/javascript">
    var config_<?= $c ?>= {
        container: "#org_struct_<?= $c ?>",
        
        connectors: {
            type: 'step'
        },
        node: {
            HTMLclass: 'nodeExample1'
        }
    },

    <?
            foreach ($node as $key => $element) {
                $chart_element[] = $key;
    ?>

        e<?= $key ?> = {
       <? if(isset($element['parent'])){
        ?>
            parent: e<?= $element['parent'] ?>,
            stackChildren: true,
        <?
        }
       ?>        text:{
            name: "<?= $element['name'] ?>",
            title: "<?= $element['employee_id'] ?> - <?= $element['designation'] ?>",
        },
        image: "<?= base_url('/assets/img/user/'.$element['img']) ?>"
    },

    <?
            }

            $elements_in_node = end($chart_element);
    ?>

    chart_config_<?= $c ?> = [
        config_<?= $c ?>,
        <? foreach ($chart_element as $key => $data) {

            if($data==$elements_in_node){
                echo "e".$data."\n";
            }else{
                
                $n =  "e".$data.", \n";
            print_r($n);
            }
            
        }
        unset($chart_element);
        ?>
    ];

    new Treant(chart_config_<?= $c ?>);

</script>
    <?

            $c++;
        }

    ?>

</body>
</html> 