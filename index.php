<?php 
if(isset($_COOKIE["kayttajakeksi"])) {
	$kayttaja = $_COOKIE["kayttajakeksi"];
} else {
	$kayttaja = "";	
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Postinumerot</title>
<link href="resources/bootstrap/css/bootstrap.min.css"
	rel="stylesheet" type="text/css">
<link href="resources/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<div class="row-fluid">
			<div class="navbar navbar-default navbar-static-top">
				<div class="navbar-inner">
					<div class="container">
						<ul class="nav">
							<li class="active"><a href="index.php">Etusivu</a></li>
							<li><a href="lisaa.php">Lisää postinumero</a></li>
							<li><a href="listaa.php">Listaa postinumerot</a></li>
							<li><a href="asetukset.php">Asetukset</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12" id="area">
				<div class="row-fluid">
					<div class="span10 offset1">
						<?php 
						print ("<h2>Tervetuloa " . $kayttaja . "</h2>");
						?>
						<p>Lisää, poista, muokkaa ja hae postinumeroita</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
