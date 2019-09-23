<?php
	require("../../../config_vp2019.php");
	require("functions_film.php");
	$userName="Winlanto";
	//loeme andmebaasi
	$database = "if19_alek_tse_1";
	
//	var_dump($_POST);
	//kui nuppu vajutati
	if(isset($_POST["submitFilm"])){
		//salvestame, kui pealkiri on olemas
		if(!empty($_POST["filmTitle"])){
			saveFilmInfo($_POST["filmTitle"],$_POST["filmYear"],$_POST["filmDuration"],$_POST["filmGenre"],$_POST["filmProduction"],$_POST["filmDirector"]);
	}	
	
	require("header.php");
?>


<!DOCTYPE html>
<html lang="et">
	<head>
		<meta charset="utf-8">
			<title>
				<?php
					echo $userName; ?> 's third PHP page
			</title>
	</head>
	
	<body vlink="#D2B4DE" alink="#D6EAF8" align="center" style="justify" alink="#808B96" link="#808B96" background="https://cdn.pixabay.com/photo/2015/10/17/17/14/background-992850_960_720.png" width="1024">
		<font style="justify" face="MV Boli, Cooper, Arial"  color="#F7F9F9">
			<h2>Eesti Filmid, lisame uue</h2>
			<p> Täida kõik failid ja lisa neid andmebaasi: </p>
			<form method="POST">
			<label><b>Sisesta pealkiri</label><input type="text" name="filmTitle">
			<br>
			<label>Filmi tootmis aasta</label><input type="number" min="1912" max="2019" value="2019" name="filmYear">
			<br>
			<label>Filmi kestus</label><input type="number" min="1" max="300" value="80" name="filmDuration">
			<br>
			<label>Žanr</label><input type="text" name="filmGenre">
			<br>
			<label>Filmi Tootja</label><input type="text" name="filmProduction">
			<br>
			<label>Filmi lavastaja</label><input type="text" name="filmDirector">
			<br>
			<input type="submit" value="Lisa" name="submitFilm">
			</form>
			<?php
			//	echo $filmInfoHTML;
			//	echo "Server: " .$serverHost .", kastutaja: " .$serverUsername;
			?>
		</font>
		</font>
	</body>
</html>
<?php
	require("footer.php");
?>