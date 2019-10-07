<?php
	$userName="Winlanto";
	$photoDir = "../photos/";
	$picFileTypes = ["image/jpeg", "image/png"];
	$hourNow = date("H");
	$partOfDay = "";
	if($hourNow >= 5 and $hourNow < 8){
			$partOfDay = "varane hommik";
	}
	if($hourNow >= 8 and $hourNow < 12){
			$partOfDay ="hommik";
	}
	if($hourNow >= 12 and $hourNow < 17){
			$partOfDay ="päev";
	}
	if($hourNow >= 17 and $hourNow < 22){
			$partOfDay ="õhtu";
	}
	if($hourNow >= 22 and $hourNow >= 0){
			$partOfDay ="öö";
	}
	
	//info semestri kulgemise kohta
	$semesterStart = new DateTime("2019-9-2");
	$semesterEnd = new DateTime("2019-12-13");
	$semesterDuration = $semesterStart->diff($semesterEnd);
	$today = new DateTime("now");
	$fromSemesterStart = $semesterStart ->diff($today);
	//var_dump($fromSemesterStart);
	$semesterInfoHTML = "<p>Siin peaks olema info semestri kulgemise kohta!</p>";
	//$testValue = $fromSemesterStart->format("%r%a");
	$elapsedValue = $fromSemesterStart->format("%r%a");
	$durationValue = $semesterDuration->format("%r%a");
	//echo $testValue;
	//<meter min="0" max="155" value="33"> Väärtus </meter>
	if($elapsedValue > 0){
		$semesterInfoHTML = "<p>Semester on täies hoos: ";
		$semesterInfoHTML .= '<meter min="0" max="' .$durationValue .'" ';
		$semesterInfoHTML .= 'value="' .$elapsedValue .'">';
		$semesterInfoHTML .= round($elapsedValue / $durationValue *100, 1)."%";
		$semesterInfoHTML .= "</meter>";
		$semesterInfoHTML .= "</p>";
	}
	
	//foto lisamine lehele
	$allPhotos = ["tlu_terra_600x400_1.jpg", "tlu_terra_600x400_2.jpg", "tlu_terra_600x400_3.jpg"];
	$dirContent = array_slice(scandir($photoDir), 2);
	//var_dump($dirContent);
	foreach($dirContent as $file){
		$fileInfo = getImagesize($photoDir. $file);
		//var_dump($fileInfo);
		if(in_array($fileInfo["mime"], $picFileTypes) == true){
			array_push($allPhotos, $file);
		}
	}
	//var_dump($allPhotos);
	$picCount = count($allPhotos);
	$picNum = mt_rand(0, ($picCount - 1));
	$photoFile = $photoDir. $allPhotos[$picNum];
	$randomImgHTML = '<img src="' .$photoFile .'" alt="TLÜ Terra õppehoone">';
	//echo $picNum;
	//echo $allPhotos;
	
	//Kuu ja nädalapäevade massiiv
 // $dateNow = date("d");
 // $monthNow = date("m");
 // $yearNow = date("Y");
 // $timeNow = date("H:i:s");
//  $fullTimeNow = date("d.m.Y H:i:s");
  //$hourNow = date("H");
	$dayOfWeek = date("N");
	$weekDays = ["Esmaspäev", "Teisipäev", "Kolmapäev", "Neljapäev", "Reede", "Laupäev", "Pühapäev"];
		$dayOfWeekNow = $weekDays[$dayOfWeek-1];
	$monthNow = date("n");
	$months = ["Jaanuar", "Veebruar", "Märts", "Aprill", "Mai", "Juuni", "Juuli", "August", "September", "Oktoober", "November", "Detsember"];
		$fullTimeNow = (date("d") .". " .$months[$monthNow-1] ." " .date("Y H:i:s"));

	require("header.php");
?>


<!DOCTYPE html>
<html lang="et">
	<head>
		<meta charset="utf-8">
			<title>
				<?php
					echo $userName; ?> 's second PHP page
			</title>
	</head>
	
	<body vlink="#D2B4DE" alink="#D6EAF8" align="center" style="justify" alink="#808B96" link="#808B96" background="https://cdn.pixabay.com/photo/2015/10/17/17/14/background-992850_960_720.png" width="1024">
		<font style="justify" face="MV Boli, Cooper, Arial"  color="#F7F9F9">
			<figure align="center">
			<img src="https://gamepedia.cursecdn.com/minecraft_gamepedia/b/b2/Torch.png" alt="Torch" border="0" align="center"></img>
				<h5><p align="center"><figcaption><a target="_blank" href="https://gamepedia.cursecdn.com/minecraft_gamepedia/b/b2/Torch.png"> Picture Link </a></figcaption></p></h5>
			</figure>
				<p>Info PHP serverist saad <a target="_blank" href="./serverinfo.php">siit</a>!</p>
		<hr>
		</font>
		</font>
		<?php
			echo $randomImgHTML;
		?>
		<?php
		require("footer.php");
		?>
	</body>
</html>