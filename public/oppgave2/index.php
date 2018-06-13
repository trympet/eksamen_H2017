<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../assets/stylesheet2.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="header">
				Partioppslutningskalkulator
		</div>
		<div id="content">
			<div id="parti_input" class="form-group">
				<h2>OPPSLUTNING I PROSENT:</h2>

				<h4>PARTI NR:</h4>
				<ul>
					<li>Rødt<input type="number" id="rødt" placeholder="0"></li>
					<li>SV<input type="number" id="sv" placeholder="0"></li>
					<li>A<input type="number" id="a" placeholder="0"></li>
					<li>SP<input type="number" id="sp" placeholder="0"></li>
					<li>MDG<input type="number" id="mdg" placeholder="0"></li>
					<li>KrF<input type="number" id="krf" placeholder="0"></li>
					<li>V<input type="number" id="v" placeholder="0"></li>
					<li>H<input type="number" id="h" placeholder="0"></li>
					<li>FrP<input type="number" id="frp" placeholder="0"></li>
					<li>PIR<input type="number" id="pir" placeholder="0"></li>
				</ul>
				<input id="regnut" type="submit" value="Regn ut!" onclick="partiblokk ()">
			</div>
			<div id="parti_blokker">
				<h4 class="right">BORGELIG BLOKK</h4>
				
				<h4 class="left">RØD-GRØNN BLOKK</h4>
					<div class="right">
						<p id="borgelig_text"></p>
					</div>
					<div class="left">
						<p id="rødgrønn_text"></p>
					</div>
				
			<div id="største_blokken">
				<p id="største_blokken_svar">placeholder</p>
			</div>
			<div id="piechart"></div>
			</div>
			<p id="testst"></p>
		</div>
		<div class="footer">
			<a href="..">hjem</a>
		</div>
		<script>
			function partiblokk () {
				var rødt = document.getElementById("rødt").value;
				var sv = document.getElementById("sv").value;
				var a = document.getElementById("a").value;
				var sp = document.getElementById("sp").value;
				var mdg = document.getElementById("mdg").value;
				var krf = document.getElementById("krf").value;
				var v = document.getElementById("v").value;
				var h = document.getElementById("h").value;
				var frp = document.getElementById("frp").value;
				var pir = document.getElementById("pir").value;
				var borgelig = parseInt(h)+parseInt(frp)+parseInt(krf)+parseInt(v);
				var rødgrønn = parseInt(a) + parseInt(sv) + parseInt(sp);
				var rødgrønn_poeng = parseInt(rødgrønn) -  parseInt(borgelig)
				var borgelig_poeng = parseInt(borgelig) -  parseInt(rødgrønn)
				alert(borgelig);
				document.getElementById("testst").innerHTML = borgelig.valueOf();
				rødt = rødt || 0
				document.getElementById("borgelig_text").innerHTML = borgelig + " PROSENTPOENG";
				document.getElementById("rødgrønn_text").innerHTML = rødgrønn + " PROSENTPOENG";
				document.getElementById("rødgrønn_text").style.display = 'inherit';
				document.getElementById("borgelig_text").style.display = 'inherit';
				if (borgelig > rødgrønn) {
					document.getElementById("største_blokken_svar").innerHTML = "den borgelige blokken er " + borgelig_poeng + " prosentpoeng større!";
				}
				else if (rødgrønn > borgelig) {
					document.getElementById("største_blokken_svar").innerHTML = "den rød-grønne blokken er " + rødgrønn_poeng + " prosentpoeng større!";
				}
				else {
					document.getElementById("største_blokken_svar").innerHTML = "Begge blokkene er like store!";
				}
			

			// Load google charts
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);

			// Draw the chart and set the chart values
			function drawChart() {
			  var data = google.visualization.arrayToDataTable([
			  ['Parti', 'Prosentpoeng'],
			  ['Borgelig blokk', parseInt(borgelig)],
			  ['Rød-grønn blokk', parseInt(rødgrønn)],
			]);

			  // Optional; add a title and set the width and height of the chart
			  var options = {'title':'PPOENGFORDELING', 'width':400, 'height':300};

			  // Display the chart inside the <div> element with id="piechart"
			  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
			  chart.draw(data, options);
			}}
		</script>
	</body>	
</html>