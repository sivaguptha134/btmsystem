<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
// Code for change password	
if(isset($_POST['submit']))
{
$bc_name=$_POST['bc_name'];
$bc_number=$_POST['bc_number'];
$bc_alt_number=$_POST['bc_alt_number'];
$bc_email=$_POST['bc_email'];
$bc_address=$_POST['bc_address'];
$bc_organized_by=$_POST['bc_organized_by'];

$sql="INSERT INTO  blood_camp (name,phone_number,alternative_phone_number,EmailId,address,organized_by) VALUES(:bc_name,:bc_number,:bc_alt_number,:bc_email,:bc_address,:bc_organized_by)";
$query = $dbh->prepare($sql);
$query->bindParam(':bc_name',$bc_name,PDO::PARAM_STR);
$query->bindParam(':bc_number',$bc_number,PDO::PARAM_STR);
$query->bindParam(':bc_alt_number',$bc_alt_number,PDO::PARAM_STR);
$query->bindParam(':bc_email',$bc_email,PDO::PARAM_STR);
$query->bindParam(':bc_address',$bc_address,PDO::PARAM_STR);
$query->bindParam(':bc_organized_by',$bc_organized_by,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Blood Camp Created successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>BTS | Admin add-blood_camp</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>


</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Add Blood Camp </h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form fields</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal" >
										
											
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

											<div class="form-group">
												<label class="col-sm-4 control-label">Blood Camp Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="bc_name" id="bloodgroup" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Blood Camp Mobile Number</label>
												<div class="col-sm-8">
													<input type="number" class="form-control" name="bc_number" id="bloodgroup" required>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-4 control-label">Alternative Mobile Number</label>
												<div class="col-sm-8">
													<input type="number" class="form-control" name="bc_alt_number" id="bloodgroup" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Blood Camp Organized By</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="bc_organized_by" id="bloodgroup" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Blood Camp Email</label>
												<div class="col-sm-8">
													<input type="email" class="form-control" name="bc_email" id="bloodgroup" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Blood Camp Address</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="bc_address" id="bloodgroup" required>
												</div>
											</div>

											<div class="hr-dashed"></div>
											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="submit" type="submit">Submit</button>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
							
						</div>
						
					

					</div>
				</div>
				
			
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
<?php } ?>