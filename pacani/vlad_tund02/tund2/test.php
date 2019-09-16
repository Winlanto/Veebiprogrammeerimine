<?php
	$userName = "wemit";
	$fullTimeNow = date("d.m.Y H:i:s");
	$hourNow = date("H");
	$partOfDay = "hägune aeg";
	if($hourNow < 8){
			$partOfDay = "varane hommik";
	}
?>

<!DOCTYPE html>

<html lang="et">
	
	<head>
		<meta charset="utf-8">
		<title>
			<?php
				echo $userName; ?> says "wah gwan?"
		</title>
	</head>
	
	<body>
		<?php
			echo "<h1>" .$userName ." koolitöö leht</h1>"
		?>
		<h2>test pealkiri 2</h2>
		<p>See leht on loodud koolis õppetöö raames ja ei sisalda tõsiseltvõetavat sisu!</p>
		<img src=https://inteng-storage.s3.amazonaws.com/images/sizes/M87-SMBH_resize_md.jpg></img>
		<p>Info PHP serverist saad <a href="q/serverinfo.php">siit</a>!</p>
		<hr>
		<p>Lehe avamise hetkel oli aeg <?php echo $fullTimeNow ?>.</p>
		<?php
			echo "<p>Lehe avamise hetkel oli " .$partOfDay .".</p>";
		?>
		<hr>
	</body>
</html>