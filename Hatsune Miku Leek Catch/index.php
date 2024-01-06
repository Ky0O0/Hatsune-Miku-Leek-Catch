<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="Hatsune, Miku, Hatsune Miku, Hatsune miku leek catch">
	<meta name="description" content="'Hatsune Miku: Leek Catch' is a dynamic platformer where players control the character Miku, aiming to collect points while avoiding enemies. The game features a classic chessboard as the background, adding a unique strategic element to the gameplay.">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Hatsune Miku: Leek Catch</title>
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="lang">
				<a href="index.php"><button class="lang_button">EN</button></a><br>
				<a href="jp.php"><button class="lang_button">JP</button></a>
			</div>
			<div id="nav">
				<a href="#about_hatsune_miku"><button class="button1">About Hatsune Miku</button></a>
				<a href="#about_this_game"><button class="button1">About This Game</button></a>
				<a href="#contact"><button class="button1">Contact</button></a>
				<a href="#play"><button class="button2">Play</button></a>
				<h1 class="h1_title">Hatsune Miku: Leek Catch</h1>
			</div>
		</div>
		<div id="about_hatsune_miku">
			<div id="miku_container">
				<div id="left_side">
					<img src="image/hatsune.png" width="350">
				</div>
				<div id="right_side">
					<span class="miku_span1">WHAT IS HATSUNE MIKU?</span>
					<span class="miku_span2">Hatsune Miku is music software developed by Crypton Future Media, INC., and it enables anyone to make the computer sing by entering lyrics and melodies. As a massive number of users created music using the software and posted their works on the Internet, Hatsune Miku quickly evolved into a cultural phenomenon. Moreover, Hatsune Miku has gained much attention as a character, involved in many fields such as merchandising and live performance as a virtual singer. Now her popularity has spread across the globe.</span>
				</div>
			</div>
		</div>
		<div id="about_this_game">
			<div id="about_this_game_container">
				<div id="game_left">
					<table>
						<tr>
							<th><a href="image/img1.png"><img src="image/img1.png" width="100%"></a></th>
							<th><a href="image/img2.png"><img src="image/img2.png" width="100%"></a></th>
						</tr>
						<tr>
							<th><a href="image/img3.png"><img src="image/img3.png" width="100%"></a></th>
							<th><a href="image/img4.png"><img src="image/img4.png" width="100%"></a></th>
						</tr>
					</table>
				</div>
				<div id="game_right">
					<span class="game_span1">Description:</span><br>
					<span class="game_span2">"Hatsune Miku: Leek Catch" is a dynamic platformer where players control the character Miku, aiming to collect points while avoiding enemies. The game features a classic chessboard as the background, adding a unique strategic element to the gameplay.</span><br>
					<span class="game_span1">Graphics:</span><br>
					<span class="game_span2">The game utilizes images, including character Miku, points, the enemy, and the chessboard background.</span><br>
					<span class="game_span1">Controls:</span><br>
					<span class="game_span2">Players move the Miku character using arrow keys (up, down, left, right).</span><br>
					<span class="game_span1">Time and Points:</span><br>
					<span class="game_span2">Players earn points by collecting items on the board. The game also tracks the remaining time, challenging players to accumulate as many points as possible before time expires.</span>
				</div>
			</div>
		</div>
		<div id="play">
			<div id="play_container">
				<a href="game.php"><button class="play_button">Play</button></a>
			</div>
		</div>
		<div id="contact">
			<div id="contact_container">
				<span id="contact_span">Contact Us</span><br>
				<form method="POST" action="index.php">
					<p class="p_form">Full Name<span style="font-weight: bold; color: #B71C1C;"> *</span></p>
					<input type="text" name="name"><br><br>
					<p class="p_form">E-mail<span style="font-weight: bold; color: #B71C1C;"> *</span></p>
					<input type="text" name="email"><br><br>
					<p class="p_form">Message<span style="font-weight: bold; color: #B71C1C;"> *</span></p>
					<textarea rows="10" cols="43" name="message" style="resize: none;"></textarea><br>
					<input class="submit_button" type="submit" value="Submit">
				</form>
				<?php
					if (isset($_POST['name']) && $_POST['name'] !="" && isset($_POST['email']) && $_POST['email'] !="" && isset($_POST['message']) && $_POST['message'] !="") {
						$name = $_POST['name'];
						$email = $_POST['email'];
						$message = $_POST['message'];
						$base = mysqli_connect('localhost', 'root', '', 'db');
						$que1 = "INSERT INTO data VALUES('1', '$name', '$email', '$message')";
						mysqli_query($base, $que1);
						mysqli_close($base);
					}
				?>
			</div>
		</div>
		<div id="footer">
			<h1 style="margin: 0; color: #FFFFFF">All images used belong to their respective owners.</h1>
		</div>
	</div>
</body>
</html>