 <?php include "session.php";?>
 <html>
	 <head>
	 	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- mysql -->
		<!-- stylesheet -->
		<link rel="stylesheet" href="../assets/stylesheet3.css">
		</head>
	 </head>
	 <body>
	 	<!-- alternativer -->
		<div class="container">
			<form id="stemming" action="" method="post">
				<div class="radio">
					<label><input type="radio" name="optradio"value="rødt">Rødt</input></label>
				</div>
				<div class="radio">
					<label><input type="radio" name="optradio"value="SV">SV</input></label>
				</div>
				<div class="radio">
					<label><input type="radio" name="optradio"value="A">A</input></label>
				</div>
				<div class="radio">
					<label><input type="radio" name="optradio"value="SP">SP</input></label>
				</div>
				<div class="radio">
					<label><input type="radio" name="optradio"value="MDG">MDG</input></label>
				</div>
				<div class="radio">
					<label><input type="radio" name="optradio"value="KRF">KRF</input></label>
				</div>
				<div class="radio">
					<label><input type="radio" name="optradio"value="V">V</input></label>
				</div>
				<div class="radio">
					<label><input type="radio" name="optradio"value="H">H</input></label>
				</div>
				<div class="radio">
					<label><input type="radio" name="optradio"value="FrP">FrP</input></label>
				</div>
				<div class="radio">
					<label><input type="radio" name="optradio" value="PIR">PIR</input></label>
				</div>
			</form>
		</div>

		<!-- avgi stemme -->
		<button id="stemmeOk" type="button" class="btn" data-toggle="modal" data-target="#bekreftstemme">AVGI STEMME</button>

		<!-- MODAL --> 
		<div class="modal fade" id="bekreftstemme" role="dialog">
			<div class="modal-dialog">

				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Bekreft stemmen din</h4>
					</div>
					<div class="modal-body">
						<h6>Du er i ferd med å stemme på <p id="selection"></p>. Er du sikker?</h6>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal" onclick="avgiStemme ()">JA</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">NEI</button>
					</div>
				</div>
			</div>
		</div>
		<?php
			echo $_SESSION['login_user'];
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				global $db;
				global $conn;
				global $database;
				$valg = $_POST["optradio"];
				$sql = "INSERT INTO passwords (parti) VALUES ('$valg') WHERE passord = $_SESSION[login_user]";
				mysqli_query($db,$sql);
				echo $sql;

				$deletepw = "UPDATE passwords SET passord = NULL WHERE passord = $_SESSION[login_user]";
				$result = "mysqli_query($db, $deletepw)";

				//mysqli_query($db,$deletepw);
					echo "passord sletta bro";
			}

		?>
		<script>
			var avgi = document.getElementById("stemming");

			$('#stemming input').on('change', function() {
			   var stemmevalg = $('input[name=optradio]:checked', '#stemming').val(); 
			   document.getElementById("selection").innerHTML = stemmevalg;
			});

			function avgiStemme () {
				//document.getElementById("stemming").submit();
			}
		</script>
	</body>
 </html>