<?php
	$userName="Winlanto";
	$photoDir = "../photos/";
	$picFileTypes = ["image/jpeg", "image/png"];
	$fullTimeNow = date("d.m.Y H:i:s");
	$hourNow = date("H");
	$partOfDay = "Hägune aeg";
	if($hourNow >= 5 and $hourNow < 8){
			$partOfDay = "Varane hommik";
	}
	if($hourNow >= 8 and $hourNow < 12){
			$partOfDay ="Hommik";
	}
	if($hourNow >= 12 and $hourNow < 17){
			$partOfDay ="Päev";
	}
	if($hourNow >= 17 and $hourNow < 22){
			$partOfDay ="Õhtu";
	}
	if($hourNow >= 22 and $hourNow < 5){
			$partOfDay ="Öö";
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
	
	require("header.php");
?>


<!DOCTYPE html>
<html lang="et">
	<head>
		<meta charset="utf-8">
			<title>
				<?php
					echo $userName; ?> 's Homepage
			</title>
	</head>
	
	<body vlink="#D2B4DE" alink="#D6EAF8" align="center" style="justify" bgcolor="#F7F9F9" alink="#808B96" background="https://cdn.pixabay.com/photo/2015/10/17/17/14/background-992850_960_720.png" width="1024px">
		<font style="justify" face="MV Boli, Cooper, Arial"  color="#F7F9F9">
		<?php
		echo "<header><h1>".$userName ." koolitöö leht</h1></header>";
		?>
			<article><h2>Alek-Jaan Tšern</h2></article>
			<p><strong>See leht on loodud koolis õppetöö raames ja ei sisalda tõsiseltvõetavat sisu!</strong></p>
		<?php
			echo $semesterInfoHTML;
		?>
		<hr>
			<figure align="center">
			<img src="https://gamepedia.cursecdn.com/minecraft_gamepedia/b/b2/Torch.png" alt="Torch" border="0" align="center"></img>
				<h5><p align="center"><figcaption><a target="_blank" href="https://gamepedia.cursecdn.com/minecraft_gamepedia/b/b2/Torch.png"> Picture Link </a></figcaption></p></h5>
			</figure>
				<p>Info PHP serverist saad <a href="public_html/Veebiprogrammeerimine/tund02/serverinfo.php">siit</a>!</p>
				<p> Kasutame php serverit, mille kohta saaab infot <a href="serverinfo.php">siit</a>! </p>
		<hr>
		<font face="Cooper, Arial" size="2" align="center">
			<p><h2>Lehe avamise hetkel oli aeg:
			<?php 
				echo $fullTimeNow;
			?>
			.</h2></p>
			<?php
				echo "<p><h2>Lehe avamise hetkel oli " .$partOfDay .".</h2></p>";
			?>
		<hr>
		</font>
		</font>
		<?php
			echo $randomImgHTML;
		?>
		<hr>
		<strong><p align="center" style="text-decoration:underline"><a href="#up"> Bring me Up &#8613  </a> OR if You want to contact the author please<a href="mailto:winlanto@tlu.com"> Write to email</a>. Also visit <a target="_blank" href="https://www.tlu.ee/"> Tallinn University </a> page.</p></strong>
	</body>
</html>