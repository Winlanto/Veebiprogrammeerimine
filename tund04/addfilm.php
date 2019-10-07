<?php
	require("../../../config_vp2019.php");
	require("functions_film.php");
	$userName="Winlanto";
	//loeme andmebaasi
	$database = "if19_alek_tse_1";
	$noND = "";
	
	$filmTitle = null;
  $filmYear = date("Y");
  $filmDuration = 80;
  $filmGenre = null;
  $filmProduction = null;
  $filmDirector = null;
	
//	var_dump($_POST);
	//kui nuppu vajutati
	if(isset($_POST["submitFilm"])){
		$filmTitle = $_POST["filmTitle"];
		$filmYear = $_POST["filmYear"];
		$filmDuration = $_POST["filmDuration"];
		$filmGenre = $_POST["filmGenre"];
		$filmProduction = $_POST["filmProduction"];
		$filmDirector = $_POST["filmDirector"];
		//salvestame, kui pealkiri on olemas
		if(!empty($_POST["filmTitle"]) and !empty($_POST["filmYear"])){
			saveFilmInfo($_POST["filmTitle"],$_POST["filmYear"],$_POST["filmDuration"],$_POST["filmGenre"],$_POST["filmProduction"],$_POST["filmDirector"]);
			 $filmTitle = "";
			$filmYear = date("Y");
			$filmDuration = 80;
			$filmGenre = "";
			$filmProduction = "";
			$filmDirector = "";
		}
		else{
			$noND = "Filmi pealkiri ja aasta peavad olema sisestatud!";
		}
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
			<form style="center" method="POST">
			<label><b>Sisesta pealkiri</label><input type="text" name="filmTitle" value="<?php echo $filmTitle?>">
			<br>
			<label>Filmi tootmis aasta</label><input type="number" min="1912" max= "2019" value="<?php echo $filmYear?>" name="filmYear">
			<br>
			<label>Filmi kestus</label><input type="number" min="1" max="300" value="<?php echo $filmDuration?>" name="filmDuration">
			<br>
			<label>Žanr</label><input type="text" name="filmGenre" value="<?php echo $filmGenre?>">
			<br>
			<label>Filmi Tootja</label><input type="text" name="filmProduction" value="<?php echo $filmProduction?>">
			<br>
			<label>Filmi lavastaja</label><input type="text" name="filmDirector" value="<?php echo $filmDirector?>">
			<br>
			<input type="submit" value="Lisa" name="submitFilm">
			</form>
			<br>
		<?php
		echo $noND;
			//	echo $filmInfoHTML;
			//	echo "Server: " .$serverHost .", kastutaja: " .$serverUsername;
		?>
		</font>
		</font>
	</body>
<?php
	require("footer.php");
?>
</html>