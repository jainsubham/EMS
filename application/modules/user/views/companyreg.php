<!DOCTYPE html>
<html>
<head>
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

    <div class="header-w3l">
        <h1 align="center">Company Registration Form</h1>
    </div>

<div class="main-agileits" align="center">
 <br>
        <div class="sub-main" align="center">  
       
        <?php echo form_open_multipart('user/login'); ?>
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
                    'class' => 'website',
                    'type' => 'text',
                    'name' => 'website',
                    'placeholder'=>"Link to your Website"
                    );
        echo form_input($web);?>
                   <span class="icon3"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
       
                    <?php
                    $email = array(
                    'class' => 'mail',
                    'type' => 'text',
                    'name' => 'mail',
                    'placeholder'=>"Email"

                    );
        echo form_input($email);?>
        <span class="icon4"><i class="fa fa-envelope" aria-hidden="true"></i></span>
        
       
                   <?php $contact = array(
                        'class' =>'number',
                       'type'=>"text",
                       'name'=>"number",
                       'placeholder'=>'Phone'    
                    );
        echo form_input($contact); ?>
        <span class="icon5"><i class="fa fa-phone" aria-hidden="true"></i></span>   

        <?php echo form_submit('submit','sign up') ?>
        <?php echo form_close(); ?>
        </div>
        <div class="clear"></div>


</div>

<? include "footer.php"; ?>
