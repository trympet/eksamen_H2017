<?php
	$create_table = "CREATE TABLE passwords (
	passord VARCHAR(30) NOT NULL,
	parti VARCHAR(30),
	)";

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

	if ($conn->query($create_table) === TRUE) {
		echo "det funka brosjan";
	}
?>