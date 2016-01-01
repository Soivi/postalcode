<?php 
require_once 'posti.php';

session_start();

if (isset($_SESSION["postinumero"])) {
	$posti = $_SESSION["postinumero"];
} else {
	$posti = new Posti();
}

if (isset ($_POST["korjaa"])) {
	header ("location: lisaa.php");
	exit;
} else if (isset ($_POST["tallenna"])) {
	try
	{
		require_once "postiPDO.php";
		$kantakasittely = new postiPDO();
	
		$kantakasittely->lisaaPostinumero($posti);
	
	} catch (Exception $error) {
		print($error->getMessage());
		// header("location: virhe.php?virhe=" . $error->getMessage());
		exit;
	}
	session_destroy();
	session_write_close ();
	header ("location: tallennuksenVahvistus.php");
	exit;
} else if (isset ($_POST["peruuta"])) {
	session_destroy();
	session_write_close ();
	header ("location: index.php");
	exit;
}
session_write_close ();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Postinumerot</title>
<link href="resources/bootstrap/css/bootstrap.min.css" rel="stylesheet"
	type="text/css">
<link href="resources/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<div class="row-fluid">
			<div class="navbar navbar-default navbar-static-top">
				<div class="navbar-inner">
					<div class="container">
						<ul class="nav">
							<li><a href="index.php">Etusivu</a></li>
							<li class="active"><a href="lisaa.php">Lisää postinumero</a></li>
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
						<h2>Tiedot</h2>
						<form action="" method="post">
						<table class="table table-striped">
						<?php 
						print ("<tr>\n<td>Postinumero:</td><td>" . $posti ->getPostinumero() . "</td></tr>");
						print ("<tr>\n<td>Kaupunki:</td><td>" . $posti ->getKaupunki() . "</td></tr>");
						print ("<tr>\n<td>Kaupunginosa:</td><td>" . $posti ->getKaupunginosa() . "</td></tr>");
						print ("<tr>\n<td>Väkiluku:</td><td>" . $posti ->getVakiluku() . "</td></tr>");
						print ("<tr>\n<td>Päivämäärä:</td><td>" . $posti ->getPvm() . "</td></tr>");
						print ("<tr>\n<td>Lisätietoa:</td><td>" . $posti ->getLisatietoa() . "</td></tr>");
						?>
						</table>
							<button type="submit" name="korjaa" class="btn btn-primary">Korjaa</button>
							<button type="submit" name="tallenna" class="btn btn-success">Tallenna</button>
							<button type="submit" name="peruuta" class="btn btn-danger">Peruuta</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>