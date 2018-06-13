<?php
	$servername = "localhost";
	$username = "test";
	$password = "testtest";
	$database = "eksamen";

	$conn = new mysqli($servername, $username, $password, $database);
	$db = mysqli_connect($servername, $username, $password, $database);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
		function seeder() {
			global $db;
			$create_table = "CREATE TABLE passwords (
			passord VARCHAR(30) NOT NULL,
			parti VARCHAR(30))";
			$sql1 = "INSERT INTO passwords (passord) VALUES ('Passord001')";
			$sql2 = "INSERT INTO passwords (passord) VALUES ('Passord002')";
			$sql3 = "INSERT INTO passwords (passord) VALUES ('Passord003')";
			$sql4 = "INSERT INTO passwords (passord) VALUES ('Passord004')";
			$sql5 = "INSERT INTO passwords (passord) VALUES ('Passord005')";
			$sql6 = "INSERT INTO passwords (passord) VALUES ('Passord006')";
			$sql7 = "INSERT INTO passwords (passord) VALUES ('Passord007')";
			$sql8 = "INSERT INTO passwords (passord) VALUES ('Passord008')";
			$sql9 = "INSERT INTO passwords (passord) VALUES ('Passord009')";
			$sql10 = "INSERT INTO passwords (passord) VALUES ('Passord010')";
			$sql11 = "INSERT INTO passwords (passord) VALUES ('Passord001'), ('Passord002'), ('Passord003'), ('Passord004'), ('Passord005'), ('Passord006'), ('Passord007'), ('Passord008'), ('Passord009'), ('Passord010')";
			//mysqli_query($db,$create_table);
			//mysqli_query($db,$sql11);
		}
	
		//seeder();
	echo '<script>console.log("connected successfully");</script>';
	
?>