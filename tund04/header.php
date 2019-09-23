<?php 
	$userName="Winlanto";
	$semesterStart = new DateTime("2019-9-2");
	$semesterEnd = new DateTime("2019-12-13");
	$semesterDuration = $semesterStart->diff($semesterEnd);
	$today = new DateTime("now");
	$fromSemesterStart = $semesterStart ->diff($today);
	$semesterInfoHTML = "<p>Siin peaks olema info semestri kulgemise kohta!</p>";;
	$elapsedValue = $fromSemesterStart->format("%r%a");
	$durationValue = $semesterDuration->format("%r%a");
	if($elapsedValue > 0){
		$semesterInfoHTML = "<p>Semester on täies hoos: ";
		$semesterInfoHTML .= '<meter min="0" max="' .$durationValue .'" ';
		$semesterInfoHTML .= 'value="' .$elapsedValue .'">';
		$semesterInfoHTML .= round($elapsedValue / $durationValue *100, 1)."%";
		$semesterInfoHTML .= "</meter>";
		$semesterInfoHTML .= "</p>";
	}
		else{
			$semesterInfoHTML = "<p>Semester veel ei alganud<p>";
		}
?>
<!DOCTYPE html>
<html lang="et">
	<head>
		<meta charset="utf-8">
	</head>
	<body align="center" style="justify" alink="#808B96" width="1024px">
		<font style="justify" face="MV Boli, Cooper, Arial"  color="#F7F9F9">
		<?php
		echo "<header><h1><mark>".$userName ." koolitöö leht</mark></h1></header>";
		?>
			<article id="up"><h2> Alek-Jaan Tšern </h2></article>
			<p><strong>See leht on loodud koolis õppetöö raames ja ei sisalda tõsiseltvõetavat sisu!</strong></p>
		<?php
			echo $semesterInfoHTML;
		?>
		<hr>
		</font>
	</body>
	</html>
	