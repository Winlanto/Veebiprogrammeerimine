<?php
	require("../../../config_vp2019.php");
	require("functions_film.php");
	$userName="Winlanto";
	//loeme andmebaasi
	$database = "if19_alek_tse_1";
	$filmInfoHTML = readAllFilms();
	$filmAge = 50;
	$oldFilmInfoHTML = readOldFilms($filmAge);
	$newFilmInfoHTML = readNewFilms($filmAge);

	
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
	
	<body vlink="#D2B4DE" alink="#D2B4DE" align="center" style="justify" link="#D2B4DE" background="https://cdn.pixabay.com/photo/2015/10/17/17/14/background-992850_960_720.png" width="1024">
		<font style="justify" face="MV Boli, Cooper, Arial"  color="#F7F9F9">
			<h2>Eesti Filmid</h2>
			<b> Praegu on andmebaasis jrgmised filmid: </b>
			<?php
				echo $filmInfoHTML;
				echo "<hr>";
				echo "<h2>Filmid, mis on vanemad, kui " .$filmAge ." aastat.</h2>";
				echo $oldFilmInfoHTML;
				echo "<hr>";
				echo "<h2>Filmid, mis on uuemad, kui " .$filmAge ." aastat.</h2>";
				echo $newFilmInfoHTML;
				//echo "Server: " .$serverHost .", kastutaja: " .$serverUsername;
			?>
		</font>
		</font>
	</body>
</html>
<?php
	require("footer.php");
?>