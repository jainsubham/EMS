<!DOCTYPE html>
<html>
<head>
  <title>Company Registration</title>
<?=  link_tag('assets/css/font-awesome.min.css'); ?>

<?= link_tag('assets/css/style.css'); ?>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Raleway+Dots' rel='stylesheet' type='text/css'>
<? include "header.php"; ?>
<div class="main-agileits">
  <div class="header-w3l">
        <h1 align="center">Registration</h1>
</div>
     <?php
     $attr = array('id' => 'regForm');
      echo form_open_multipart('user/reg_user',$attr); 
      ?>
      
  <!-- One "tab" for each step in the form: -->
<div class="sub-main " align="center">  
  <div class="tab"><? echo form_fieldset('User Personal Information :'); ?>  
  			<?php  $fname = array(
                       'class' => 'name',
            		   'placeholder'=> "First name...",
            		   'name'=> "fname",
            		   'type'=> "text"
          );
          echo form_input($fname); ?>
                <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
        
           <?php  $lname = array(
                       'class' => 'name',
                       'placeholder'=> "Last name...",
                       'name'=> "lname",
                       'type'=> "text"
          );
          echo form_input($lname); ?>
                <span class="icon2"><i class="fa fa-user" aria-hidden="true"></i></span>

			<?php  $phone = array(
                       'class' => 'name',
			           'placeholder'=> "Phone...",
			           'name'=> "phone",
			           'type'=> "text"
          );
          echo form_input($phone); ?>
               <span class="icon3"><i class="fa fa-phone" aria-hidden="true"></i></span>   
            <?php $dis = array(
                   'select' => 'Disability',
                       'insert' =>'Yes',
                       'okk'=>"No",   
                    );
                  
          echo form_dropdown('Disability',$dis,'select'); ?>
         
     	  <?php  $blood = array(
                       'class' => 'name',
			            'placeholder'=> "Blood Group...",  
			            'name'=>"blood" ,
			            'type'=>"text"
          );
      	  echo form_input($blood); ?>
			<span class="icon5"><i class="fa fa-tint" aria-hidden="true"></i></span>
		  <?php  $dob = array(
	                    'class' => 'name',
			            'placeholder'=>"Date of Birth...",
			            'name'=>"dob" ,
			            'type'=>"date"
          );
      	  echo form_input($dob); ?>

      	  <?php $gender = array(
      	  			   'select' => 'Gender',
                       'male' =>'Male',
                       'female'=>"Female",
                       'other'=>"Other"    
                    );
                  
          echo form_dropdown('gender',$gender,'select'); ?>
        	  <span class="icon7"><i class="fa fa-male" aria-hidden="true"></i></span>

        	<?php $martailstatus = array(
      	  			   'select' => 'Martail Status',
                       'married' =>'Married',
                       'unmarried'=>"Unmarried",    
                    );
          echo form_dropdown('Martail Status',$martailstatus,'select'); ?>
        	  <span class="icon8"><i class="fa fa-male" aria-hidden="true"></i></span>

    </div>

  <div class="tab"><? echo form_fieldset('Adress Information :'); ?>  

            <?php $add1 = array(
                       'class' => 'name',
                       'type' => 'text',
                       'name' => 'address1',
                       'placeholder'=>"Address"

                );
            echo form_input($add1);?>
                <span class="icon1"><i class="fa fa-home" aria-hidden="true"></i></span>
            <?php $add2 = array(
                       'class' => 'name',
                       'type' => 'text',
                       'name' => 'address2',
                       'placeholder'=>"Address"

                );
            echo form_input($add1);?>
                <span class="icon1"><i class="fa fa-home" aria-hidden="true"></i></span>
        
			<?php  $city = array(
					   'class' => 'name',
		               'placeholder'=>"City..." ,
		               'type' => 'text',
		               'name'=>"city"
          			);
             echo form_input($city); ?>
                <span class="icon2"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
			 
          <?php  $state = array(
          			   'class' => 'name',
			           'placeholder'=>"State..." ,
			           'type' => 'text', 
			           'name'=>"state"
          );
          echo form_input($state); ?>

        <?php  $pin = array(
        				'class' => 'name',
			           'placeholder'=>"Pin Code..." ,
			           'type' =>'text', 
			           'name'=>"pin"
          			);
         echo form_input($pin); ?>

        <h2>Identity Info</h2>

        <?php  $pan = array(
        				'class' => 'name',
			            'placeholder'=>"Pan Card Number..." ,
			            'type' => 'text',
			            'name'=>"pan"
          			);
        echo form_input($pan); ?>	 
                <span class="icon3"><i class="fa fa-map-marker" aria-hidden="true"></i></span>

        <?php  $aadhar = array(
			        	'class' => 'name',
			            'placeholder'=>"Aadhar Number..." ,
			            'type' => 'text',
			            'name'=>"aadhar"
          			);
          echo form_input($aadhar); ?>
   </div>

  <div class="tab"><? echo form_fieldset('Family Information :'); ?> 


		<?php  $pname = array(
						'class' => 'name',
			            'placeholder'=>"Father Name...",
			            'type' => 'text',
			            'name'=>"fname"
          			);
         echo form_input($pname); ?>
                <span class="icon1"><i class="fa fa-university" aria-hidden="true"></i></span>
				
          <?php  $parent = array(
          				'class' => 'name',
			            'placeholder'=>"ParentsSeniority ...",
			            'type' => 'text',
			            'name'=>"parents"
          			);
          echo form_input($parent); ?>
          <?php $parentdis = array(
                   'select' => 'ParentsDisability',
                    'insert' => 'Yes',
                    'okk' => 'No'
                    );
                  
          echo form_dropdown('Disability',$parentdis,'select'); ?>
          <?php $children = array(
                   'select' => 'Children???',
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',

                    );
                  
          echo form_dropdown('Children',$children,'select'); ?>
			<span class="icon4"><i class="fa fa-child" aria-hidden="true"></i></span>
          <?php  $Hchildren = array(
          		'class' => 'name',
	            'placeholder'=>"HostelerChildren...",
	            'type' => 'text',
	            'name'=>"Hchildren"
          );
          echo form_input($Hchildren); ?>
	</div>

  <div style="overflow:auto;">
    <div >
      <button type="button" class="PrevBtn" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" class="subBtn" id="nextBtn" onclick="nextPrev(1)">Proceed</button>

    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
      </div>

    </div>
</div>

        <?php echo form_close(); ?>
        </div>
        <div class="clear"></div>


</div>
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>


<? include "footer.php"; ?>