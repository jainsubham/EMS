<!DOCTYPE html>
<html>
<head>
  <title>Company Registration</title>
<?=  link_tag('assets/css/font-awesome.min.css'); ?>

<?= link_tag('assets/css/style.css'); ?>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Raleway+Dots' rel='stylesheet' type='text/css'>
<? include "header.php"; ?>


<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
 //function hideURLbar(){ window.scrollTo(0,1); } </script> -->
<!-- Meta tag Keywords -->
<!-- css files -->


<!-- //css files -->
<!-- online-fonts -->
<div class="main-agileits">
  <div class="header-w3l">
        <h1 align="center">Company  Registration</h1>
</div>
     <?php
     $attr = array('id' => 'regForm');
      echo form_open_multipart('user/comp_reg',$attr); 
      ?>
      
  <!-- One "tab" for each step in the form: -->
<div class="sub-main " align="center">  
  <div class="tab"><? echo form_fieldset('Company Information :'); ?>  
    

        
       
                <?php $name = array(
                       'class'=>"name",
                       'type'=>"text" ,
                       'name'=>"companyname" ,
                       'placeholder'=>"Company Name",
                       'required' => 'required'
                 );
        echo form_input($name); ?>
                <span class="icon1"><i class="fa fa-university" aria-hidden="true"></i></span>
        
                <?php $add = array(
                       'class' => 'name',
                       'type' => 'text',
                       'name' => 'address',
                       'placeholder'=>"Address"

                );
         echo form_input($add);?>
                   <span class="icon2"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
        
                   <?php $web = array(
                    'class' => 'name',
                    'type' => 'text',
                    'name' => 'website',
                    'placeholder'=>"Link to your Website"
                    );
        echo form_input($web);?>
                   <span class="icon3"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
       
                    <?php
                    $email = array(
                    'class' => 'name',
                    'type' => 'email',
                    'name' => 'mail',
                    'placeholder'=>"Email"

                    );
        echo form_input($email);?>
        <span class="icon4"><i class="fa fa-envelope" aria-hidden="true"></i></span>
        
       
                   <?php $contact = array(
                        'class' =>'name',
                       'type'=>"text",
                       'name'=>"number",
                       'placeholder'=>'Phone'    
                    );
        echo form_input($contact); ?>
        <span class="icon5"><i class="fa fa-phone" aria-hidden="true"></i></span>   
</div>

  <div class="tab"><? echo form_fieldset('Administrator Details :'); ?> 
   <?php $fname = array(
                       'class'=>"name",
                       'type'=>"text" ,
                       'name'=>"fname" ,
                       'placeholder'=>"First Name",
                       'required' => 'required'
                 );
        echo form_input($fname); ?>
                <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
        
                <?php $lname = array(
                       'class' => 'name',
                       'type' => 'text',
                       'name' => 'lname',
                       'placeholder'=>"Last Name"

                );
         echo form_input($lname);?>
                   <span class="icon2"><i class="fa fa-user" aria-hidden="true"></i></span>
        
                   <?php $phoneno = array(
                    'class' => 'name',
                    'type' => 'text',
                    'name' => 'phoneno',
                    'placeholder'=>"Contact No"
                    );
        echo form_input($phoneno);?>
                   <span class="icon3"><i class="fa fa-phone" aria-hidden="true"></i></span>
       
                    <?php
                    $emaill = array(
                    'class' => 'name',
                    'type' => 'email',
                    'name' => 'maill',
                    'placeholder'=>"Email"

                    );
        echo form_input($emaill);?>
        <span class="icon4"><i class="fa fa-envelope" aria-hidden="true"></i></span>
        
       
                   <?php $gender = array(
                        'male' =>'Male',
                       'female'=>"Female",
                       'other'=>"Other"    
                    );
                  
        echo form_dropdown('gender',$gender); ?>
        <span class="icon5"><i class="fa fa-male" aria-hidden="true"></i></span> 
  </div>
  <div class="tab"><? echo form_fieldset('Account Security Details :'); ?> 
    <?php $pass1 = array(
                       'class'=>"name",
                       'name'=>"pass1" ,
                       'placeholder'=>"Password",
                       'required' => 'required'
                 );
        echo form_password($pass1); ?>
                <span class="icon1"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
        
                 <?php $pass2 = array(
                       'class'=>"name",
                       'name'=>"pass2" ,
                       'placeholder'=>"Repeat Password",
                       'required' => 'required'
                 );
        echo form_password($pass2); ?> 
                   <span class="icon2"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
        
              
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
