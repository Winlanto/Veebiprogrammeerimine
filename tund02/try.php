<?php
	$userName="winlanto";
	$fullTimeNow = date("d.m.Y H:i:s");
	$hourNow = date("H");
	$partOfDay = "Hägune aeg";
	if($hourNow > 5 and $hourNow < 8){
			$partOfDay = "Varane hommik";
	}
	if($hourNow > 8 and $hourNow < 12){
			$partOfDay ="Hommik";
	}
	if($hourNow > 12 and $hourNow < 17){
			$partOfDay ="Päev";
	}
	if($hourNow > 17 and $hourNow < 22){
			$partOfDay ="Õhtu";
	}
	if($hourNow > 22 and $hourNow < 5){
			$partOfDay ="Öö";
	}
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
	
	<body vlink="#D2B4DE" alink="#D6EAF8" align="center" style="justify" bgcolor="#F7F9F9" alink="#808B96" background="https://cdn.pixabay.com/photo/2015/10/17/17/14/background-992850_960_720.png">
		<font face="Ravie, Snap ITC, Goudy Stout,Arial" border="2">
		<?php
		echo "<header>".$userName ."koolitöö leht</header>";
		?>
			<article>Alek-Jaan Tšern</article>
			<p><strong>See leht on loodud koolis õppetöö raames ja ei sisalda tõsiseltvõetavat sisu!</strong></p>
			<figure align="center">
			<img src="https://gamepedia.cursecdn.com/minecraft_gamepedia/b/b2/Torch.png" alt="wood" border="0" align="center"></img>
				<p align="center"><figcaption><a target="_blank" href="https://gamepedia.cursecdn.com/minecraft_gamepedia/b/b2/Torch.png"> Picture Link </a></figcaption></p>
			</figure>
				<p>Info PHP serverist saad <a href="public_html/Veebiprogrammeerimine/tund02/serverinfo.php">siit</a>!</p>
				<p> Kasutame php serverit, mille kohta saaab infot <a href="serverinfo.php">siit</a>! </p>
		<hr>
		<font face="Cooper, Arial" size="2" align="center">
			<p>Lehe avamise hetkel oli aeg:
			<?php 
				echo $fullTimeNow;
			?>
			.</p>
			<?php
				echo "<p>Lehe avamise hetkel oli " .$partOfDay .".</p>";
			?>
		<hr>
	</body>
</html>