<?php include('adminpannel.php') ;?>


 <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#"><? if(isset($error)){ if(NULL!=$error){ print_r($error['error']); } }else { ?> Invitation sent to following employees <? } ?></a>
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
      <? if(isset($success)){ if(NULL!=$success){ ?>
      <div class="content">
        <div class="container-fluid"> 
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <ul>
                    <? if(count($success)>=1){
                          foreach ($success as $row) {
                            echo "<li> ".$row['name']." ( ".$row['email']." ) is invited successfully";
                          }
                        }
                    ?>

                  </ul>

                <div class="card-body">
                    

                </div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
  <? } } ?>
</div>

    
   

</body>
</html> 