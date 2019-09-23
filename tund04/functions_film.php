<?php
	function readAllFilms(){
		//loeme andmebaasiühenduse (näiteks $conn)//
		$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		//valmistame ette päringu
		$stmt = $conn->prepare("SELECT * FROM film");
		//seome saadava tulemuse muutujaga
		$stmt->bind_result ($filmTitle, $filmYear, $filmDuration, $filmGenre, $filmProduction, $filmDirector);
		//käivitame SQL päringu
		$stmt->execute();
		$filmInfoHTML = "";
		while($stmt->fetch()){
			$filmInfoHTML .= "<h3>" .$filmTitle ."</h3>";
			$filmInfoHTML .= "<p>Tootmisaasta: " .$filmYear .".</p>";
			$filmInfoHTML .= "<p>Filmi kestus: " .$filmDuration ." minutit.</p>";
			$filmInfoHTML .= "<p> Žanr: " .$filmGenre .".</p>";
			$filmInfoHTML .= "<p> Tootja: " .$filmProduction .".</p>";
			$filmInfoHTML .= "<p> Lavastaja: " .$filmDirector ."</p>";
			//echo $filmTitle;
		}
		//sulgeme uhenduse
		$stmt->close();
		$conn->close();
		//väljastan väärtuse
		return $filmInfoHTML;
	}
	function saveFilmInfo($filmTitle, $filmYear, $filmDuration, $filmGenre, $filmProduction, $filmDirector){
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("INSERT INTO film (pealkiri,aasta,kestus,zanr,tootja,lavastaja) VALUES (?,?,?,?,?,?)");
	echo $conn->error;
	// s - string, i - integer, d - date
	$stmt->bind_param("siisss", $filmTitle, $filmYear, $filmDuration, $filmGenre, $filmProduction, $filmDirector);
	$stmt->execute();
	$stmt->close();
	$conn->close();
	}
?>