<?php include "../../mysqlconnect.php"; session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<script>
			function wrongPw (){
				$("#feilpw").addClass('in');
				setTimeout(function(){
					$("#feilpw").removeClass('in');
			}, 2000);	
			}
		</script>
		<?php
			$_SESSION['pwflag'] = true;
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				//$passord = test_input($db,$_POST["passord"]);
				$passord = mysqli_real_escape_string($db,$_POST["password"]);

				$sql = "SELECT passord FROM passwords WHERE passord = '$passord'";
				$result = mysqli_query($db,$sql);
				echo '<script type="text/javascript">console.log("' . $_POST["password"] . '");</script>';
			    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			    $active = $row['active'];
				$count = mysqli_num_rows($result);
				
				if($count >= 1) {
					echo "test";
					global $passord;
					$_SESSION['login_user'] = $passord;
					$_SESSION["pwflag"] = true;

					header("location: stemmegivning.php");
				}
				else {
					$_SESSION["pwflag"] = false;
					//header("refresh:0");
				}
			}
			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>
		

		<div id="feilpw" class="alert fade out alert-warning">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Feil passord!</strong>
		</div>
		<div class="container col-sm-12">
			<div class="row">
				<div class="col-sm-6">
					<form action="" method="post">
						<div class="input-group col-sm-12">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" class="form-control" name="password" placeholder="passord"></input>
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit">
				       				<i class="glyphicon glyphicon-log-in"></i>
				      			</button>
							</div>
						</div>
					</form>
				</div>
			
				
			</div>
		</div>
		<?php 
			if ($_SESSION["pwflag"] === false){
				echo '<script type="text/javascript">wrongPw ();</script>';
			}
		?>
	</body>
</html>