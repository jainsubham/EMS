<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

<style type="text/css">
	body{
		background: 
		linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6));
	}
</style>
<? include "header.php"; ?>
<div class="">
<div class="container ">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title"><b>Please sign in</b></h3>
			 	</div>
			  	<div class="panel-body">
			    	<? echo form_open('user/verify_login'); ?>
                    <fieldset>
			    	  	<div class="form-group">
			    		    

			    		    <? $emailfield = array(
			    		    		'type'			=> 'email',
							        'name'          => 'emailfield',
							        'placeholder'     => 'E-mail',
							        'class'          => 'form-control',
							        'required'         => 'required'
									);
				            	echo form_input($emailfield);
							 ?>
							 
			    		</div>
			    		<div class="form-group">
			    			 <? $passfield = array(
							        'name'          => 'passwordfield',
							        'placeholder'     => 'Password',
							        'class'          => 'form-control',
							        'required'         => 'required'
									);
				            	echo form_password($passfield);
							 ?>
			    		</div>
				    		<? $subbtn = array(
							        'name'          => 'submit',
							        'value'			=> 'Login',
							        'class'          => 'btn btn-lg btn-success btn-block'
									);
				            	echo form_submit($subbtn);
							 ?>
			    	</fieldset>
			      	<?php
			      		echo form_close();
			      	 ?>
			    </div>
			</div>
		</div>
	</div>
</div>
	</div>

<? include "footer.php"; ?>