<?php
require_once "posti.php";

session_start ();

if (isset($_SESSION["postinumero"])) {
	$posti = $_SESSION["postinumero"];
} else {
	$posti = new Posti ();
}

if (isset ( $_POST ["tallenna"] )) {
	$posti = new Posti ( $_POST ["postinumero"], $_POST ["kaupunki"], $_POST ["kaupunginosa"], $_POST ["vakiluku"], $_POST ["pvm"], $_POST ["lisatietoa"] );
	
	$_SESSION ["postinumero"] = $posti;
	session_write_close ();
	
	$postinumeroVirhe = $posti->checkPostinumero ();
	$kaupunkiVirhe = $posti->checkKaupunki ();
	$kaupunginosaVirhe = $posti->checkKaupunnginosa ();
	$vakilukuVirhe = $posti->checkVakiluku ();
	$pvmVirhe = $posti->checkPvm();
	$lisatietoaVirhe = $posti->checkLisatietoa();
	
	$olikoVirheita = $postinumeroVirhe + $kaupunkiVirhe + $kaupunginosaVirhe + $vakilukuVirhe + $pvmVirhe + $lisatietoaVirhe;
	
	if($olikoVirheita == 0) {
		header ("location: nayta.php");
		exit;
	}
	
} else if (isset ( $_POST ["peruuta"] )) {
	session_destroy();
	session_write_close ();
	header ("location: index.php");
	exit;
	
} else {
	$postinumeroVirhe = 0;
	$kaupunkiVirhe = 0;
	$kaupunginosaVirhe = 0;
	$vakilukuVirhe = 0;
	$pvmVirhe = 0;
	$lisatietoaVirhe = 0;
}
session_write_close ();
// $diff = strtotime($posti->getPvm())-time();
// print_r ( $posti );
// print ($diff);

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
						<h2>Tallenna postinumero</h2>
						<form action="#" method="post">
							<fieldset>
								<div class="row-fluid">
									<div class="span6">
										<div class="control-group">
											<label class="control-label">Postinumero</label>
											<div class="controls">
												<input type="text" class="span10" name="postinumero"
													placeholder="esim. 00150"
													value="<?php print(htmlentities($posti->getPostinumero(), ENT_QUOTES, "UTF-8"));?>">
												<?php
												print ("<span class='help-block'>" . $posti->haeVirheenSyy ( $postinumeroVirhe ) . "</span>") ?>
											</div>
										</div>
									</div>
									<div class="span6">
										<div class="control-group">
											<label class="control-label">Kaupunki</label>
											<div class="controls">
												<input type="text" class="span10" name="kaupunki"
													placeholder="esim. Helsinki"
													value="<?php print(htmlentities($posti->getKaupunki(), ENT_QUOTES, "UTF-8"));?>">
													<?php
													print ("<span class='help-block'>" . $posti->haeVirheenSyy ( $kaupunkiVirhe ) . "</span>") ?>
											</div>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Kaupunginosan tiedot</legend>
								<div class="row-fluid">
									<div class="span6">
										<div class="control-group">
											<label class="control-label">Kaupunginosa</label>
											<div class="controls">
												<input type="text" class="span10" name="kaupunginosa"
													placeholder="esim. Eira"
													value="<?php print(htmlentities($posti->getKaupunginosa(), ENT_QUOTES, "UTF-8"));?>">
																										<?php
																										print ("<span class='help-block'>" . $posti->haeVirheenSyy ( $kaupunginosaVirhe ) . "</span>") ?>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Väkiluku</label>
											<div class="controls">
												<input type="text" class="span10" name="vakiluku"
													placeholder="esim. 989"
													value="<?php print(htmlentities($posti->getVakiluku(), ENT_QUOTES, "UTF-8"));?>">
													<?php
													print ("<span class='help-block'>" . $posti->haeVirheenSyy ( $vakilukuVirhe ) . "</span>") ?>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Väkiluku päivitetty</label>
											<div class="controls">
												<input type="text" class="span10" name="pvm"
													placeholder="esim. 1.1.2009"
													value="<?php print(htmlentities($posti->getPvm(), ENT_QUOTES, "UTF-8"));?>">
												<?php
												print ("<span class='help-block'>" . $posti->haeVirheenSyy ( $pvmVirhe ) . "</span>") ?>
											</div>
										</div>
									</div>
									<div class="span6">
										<div class="form-group">
											<label>Lisätietoa kaupunginosasta</label>
											<textarea rows="8" class="span10" name="lisatietoa"><?php print(htmlentities($posti->getLisatietoa(), ENT_QUOTES, "UTF-8"));?></textarea>
												<?php print ("<span class='help-block'>" . $posti->haeVirheenSyy ( $lisatietoaVirhe ) . "</span>") ?>
										</div>

									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<button type="submit" name="peruuta" class="btn btn-danger">Peruuta</button>
										<button type="submit" name="tallenna" class="btn btn-success">Tallenna
											postinumero</button>

									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
