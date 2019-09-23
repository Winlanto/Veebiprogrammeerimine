<?php
	$hourNow = date("H");
	$partOfDay = "hägune aeg";
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
	if($hourNow >= 22 or $hourNow < 5){
			$partOfDay ="öö";
	}
	$dayOfWeek = date("N");
	$weekDays = ["Esmaspäev", "Teisipäev", "Kolmapäev", "Neljapäev", "Reede", "Laupäev", "Pühapäev"];
		$dayOfWeekNow = $weekDays[$dayOfWeek-1];
	$monthNow = date("n");
	$months = ["Jaanuar", "Veebruar", "Märts", "Aprill", "Mai", "Juuni", "Juuli", "August", "September", "Oktoober", "November", "Detsember"];
		$fullTimeNow = (date("d") .". " .$months[$monthNow-1] ." " .date("Y H:i:s"));
?>

<!DOCTYPE html>
<html lang="et">
	<head>
		<meta charset="utf-8">
	</head>
	<body vlink="#D2B4DE" align="center" style="justify" alink="#808B96">
		<font style="justify" face="MV Boli, Cooper, Arial"  color="#F7F9F9">
		<hr>
			<?php
				echo "<p><h2>Lehe avamise hetkel oli: " .$dayOfWeekNow .", " .$partOfDay .", " .$fullTimeNow .".</h2></p>";
			?>
		<hr>
		<strong><p align="center" style="text-decoration:underline"><a href="#up"> Bring me Up &#8613  </a> OR if You want to contact the author please<a href="mailto:winlanto@tlu.com"> Write to email</a>. Also visit <a target="_blank" href="https://www.tlu.ee/"> Tallinn University </a> page.</p></strong>
		</font>
	</body>
</html>