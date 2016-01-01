<?php 
if(!isset($hakuKaupunki))
	$hakuKaupunki = "";


if (isset ( $_POST ["poista"] )) {
	try
	{
		require_once "postiPDO.php";
		$kantakasittely = new postiPDO();
		$kantakasittely->poistaPostinumero($_POST['id']);
	
	} catch (Exception $error) {
		print($error->getMessage());
		// header("location: virhe.php?virhe=" . $error->getMessage());
		exit;
	}
	header("location: listaa.php");
	exit;
} else if(isset ( $_POST ["hae"] )) {
	try
	{
		require_once "postiPDO.php";
		$kantakasittely = new postiPDO();
		$rivit = $kantakasittely->haePostinumerot("%" . $_POST ["hakuKaupunki"] . "%");
		$hakuKaupunki = $_POST ["hakuKaupunki"];
	} catch (Exception $error) {
		print($error->getMessage());
		// header("location: virhe.php?virhe=" . $error->getMessage());
		exit;
	}

} else {
	try
	{
		require_once "postiPDO.php";
		$kantakasittely = new postiPDO();
		$rivit = $kantakasittely->kaikkiPostinumerot();
	} catch (Exception $error) {
		print($error->getMessage());
		// header("location: virhe.php?virhe=" . $error->getMessage());
		exit;
	}
}
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
							<li><a href="lisaa.php">Lisää postinumero</a></li>
							<li class="active"><a href="listaa.php">Listaa postinumerot</a></li>
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
					<form action='' method='post'>
						<div class="control-group">
							<label class="control-label">Kaupunki</label>
								<div class="controls">
										<input type="text" class="span10" name="hakuKaupunki" placeholder="esim. Helsinki" value="<?php print(htmlentities($hakuKaupunki, ENT_QUOTES, "UTF-8"));?>">
								</div>
						</div>
					<input type='submit' class='btn btn-success' name='hae' value='Hae' />
					</form>
						<h2>Listaa postinumerot</h2>
						<table class="table">
							<tr>
								<th>ID</th>
								<th>Postinumero</th>
								<th>Kaupunki</th>
								<th>Kaupunginosa</th>
								<th>Väkiluku</th>
								<th>Päivämäärä</th>
								<th>Lisätietoa</th>
								<th></th>
								<th></th>
							</tr>
<?php

	if($kantakasittely->getLkm() == 0)
		print ("<tr><td colspan='9'>Ei yhtään tulosta</td></tr>");
	else {
   foreach ($rivit as $posti){
		print("<form action='' method='post'>\n");
		print("<tr>\n");
			print("<td>" . $posti->getId() . "</td>\n");
			print("<td>" . $posti->getPostinumero() . "</td>\n");
			print("<td>" . $posti->getKaupunki() . "</td>\n");
			print("<td>" . $posti->getKaupunginosa() . "</td>\n");
			print("<td>" . $posti->getVakiluku() . "</td>\n");
			print("<td>" . $posti->getPvm() . "</td>\n");
			print("<td>" . $posti->getLisatietoa() . "</td>\n");
			print ("<td><input type='hidden' name='id' value='" . $posti->getId() . "' /></td>\n");
			print("<td><input type='submit' class='btn btn-danger' name='poista' value='Poista' /></td>\n");
		print("</tr>\n");
		print("</form>\n");
   }
   }
?>
</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>