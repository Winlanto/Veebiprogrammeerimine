<?php
	function readAllFilms(){
		//loeme andmebaasiühenduse (näiteks $conn)//
		$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		//valmistame ette päringu
		//$stmt = $conn->prepare("SELECT pealkiri, aasta FROM film"); on võimalik valida mõne tabeli
		$stmt = $conn->prepare("SELECT * FROM film");
		echo $conn->error;
		//seome saadava tulemuse muutujaga
		$stmt->bind_result ($filmTitle, $filmYear, $filmDuration, $filmGenre, $filmProduction, $filmDirector);
		//käivitame SQL päringu
		$stmt->execute();
		$filmInfoHTML = "";
		while($stmt->fetch()){
			//t2psem kestus
				//tunnid
			$filmDurationH = floor($filmDuration/60);
			$filmDurationM = $filmDuration % 60;
			$filmDurationFull = "";
			if($filmDurationH > 0 and $filmDurationM > 0){	
				if($filmDurationH == 1){
					$filmDurationFull .= $filmDurationH ." tund";
				}else{
					$filmDurationFull .= $filmDurationH ." tundi";
				}
			//minutit
				if($filmDurationM == 1){
					$filmDurationFull .= " ja " .$filmDurationM ." minut";
				}else{
					$filmDurationFull .= " ja " .$filmDurationM ." minutit";
				}
			}
			//kuidas n2eb v2lja
			$filmInfoHTML .= "<h3>" .$filmTitle ."</h3>";
		$filmInfoHTML .= "<p> Žanr: " .$filmGenre ."; Lavastaja: " .$filmDirector ."; Filmi kestus: " .$filmDurationH .$filmDurationM ."; Tootja: " .$filmProduction ."; Tootmisaasta: " .$filmYear .".</p>";
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
	function readOldFilms($filmAge){
		$conn = new mysqli($GLOBALS["serverHost"],$GLOBALS["serverUsername"],$GLOBALS["serverPassword"],$GLOBALS["database"]);
		$maxYear = date("Y") - $filmAge;
		$stmt = $conn->prepare("SELECT pealkiri, aasta FROM film WHERE aasta < ?");
		echo $conn->error;
		$stmt->bind_param("i", $maxYear);
		$stmt->bind_result($filmTitle, $filmYear);
		$stmt->execute();
		$filmInfoHTML = "";
		while($stmt->fetch()){
			$filmInfoHTML .= "<h3>" .$filmTitle ."</h3>";
			$filmInfoHTML .= "<p> Tootmis aasta: " .$filmYear ."</p>";
		}
		$stmt->close();
		$conn->close();
		return $filmInfoHTML;
	}
	function readNewFilms($filmAge){
		$conn = new mysqli($GLOBALS["serverHost"],$GLOBALS["serverUsername"],$GLOBALS["serverPassword"],$GLOBALS["database"]);
		$maxYear = date("Y") - $filmAge;
		$stmt = $conn->prepare("SELECT pealkiri, aasta FROM film WHERE aasta > ?");
		echo $conn->error;
		$stmt->bind_param("i", $maxYear);
		$stmt->bind_result($filmTitle, $filmYear);
		$stmt->execute();
		$filmInfoHTML = "";
		while($stmt->fetch()){
			$filmInfoHTML .= "<h3>" .$filmTitle ."</h3>";
			$filmInfoHTML .= "<p>" .$filmYear ."</p>";
		}
		$stmt->close();
		$conn->close();
		return $filmInfoHTML;
	}
	
?>