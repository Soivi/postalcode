<?php 
if(isset($_COOKIE["kayttajakeksi"])) {
	$kayttaja = $_COOKIE["kayttajakeksi"];
} else {
	$kayttaja = "";	
}

if (isset ( $_POST ["tallenna"] )) {
	setcookie("kayttajakeksi", $_POST["kayttaja"], time() + 60*60*24*7);
	$kayttaja = $_POST["kayttaja"];
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
							<li><a href="listaa.php">Listaa postinumerot</a></li>
							<li class="active"><a href="asetukset.php">Asetukset</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12" id="area">
				<div class="row-fluid">
					<div class="span10 offset1">
						<h2>Asetukset</h2>
						<form action="" method="post">
										<div class="control-group">
											<label class="control-label">Käyttäjänimi</label>
											<div class="controls">
												<input type="text" class="span10" name="kayttaja"
													placeholder="esim. Maija Meikäläinen"
													value="<?php print(htmlentities($kayttaja, ENT_QUOTES, "UTF-8"));?>">
											</div>
										</div>
							<button type="submit" name="tallenna" class="btn btn-success">Muuta nimeä</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>