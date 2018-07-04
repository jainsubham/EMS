<?php 
//print_r($x->FirstName);
//die();
include('adminpannel.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Profile</title>
</head>
<body>
	<table align="center" style=" margin-top:70px;background-color: #00CED1;"  border="1">
					<tr>
						<th>FirstName</th>
						<th><?php echo $x->FirstName ?></th>
					</tr>
					<tr>
						<th>LastName</th>
						<th><?php echo $x->LastName ?></th>
					</tr>
					<tr>
						<th>ContactNo</th>
						<th><?php echo $x->ContactNo ?></th>
					</tr>
					<tr>
						<th>Adress</th>
						<th><?php echo $x->Address1 ?></th>
					</tr>
					<tr>
						<th>Address</th>
						<th><?php echo $x->Address2 ?></th>
					</tr>
					<tr>
						<th>City</th>
						<th><?php echo $x->City ?></th>
					</tr>
					<tr>
						<th>State</th>
						<th><?php echo $x->State ?></th>
					</tr>
					<tr>
						<th>PinCode</th>
						<th><?php echo $x->PinCode ?></th>
					</tr>
					<tr>
						<th>BloodGroup</th>
						<th><?php echo $x->BloodGroup ?></th>
					</tr>
					<tr>
						<th>PAN</th>
						<th><?php echo $x->PAN ?></th>
					</tr>
					<tr>
						<th>AadharNo</th>
						<th><?php echo $x->AadharNo ?></th>
					</tr>
					<tr>
						<th>Gender</th>
						<th><?php echo $x->Gender ?></th>
					</tr>
					<tr>
						<th>MartailStatus</th>
						<th><?php echo $x->MartailStatus ?></th>
					</tr>
					<tr>
						<th>DOB</th>
						<th><?php echo $x->Dob ?></th>
					</tr>
					<tr>
						<th>Disability</th>
						<th><?php echo $x->Disability ?></th>
					</tr>
					<tr>
						<th>FatherName</th>
						<th><?php echo $x->FatherName ?></th>
					</tr>
					<tr>
						<th>ParentsSeniority</th>
						<th><?php echo $x->ParentsSeniority ?></th>
					</tr>
					<tr>
						<th>ParentsDisability</th>
						<th><?php echo $x->ParentsDisability ?></th>
					</tr>
					<tr>
						<th>Children</th>
						<th><?php echo $x->Children ?></th>
					</tr>
					<tr>
						<th>HostelerChildren</th>
						<th><?php echo $x->HostelerChildren ?></th>
					</tr>
	</table>
</div>
</body>
</html>