<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="Hatsune, Miku, Hatsune Miku, Hatsune miku leek catch">
	<meta name="description" content="'Hatsune Miku: Leek Catch' is a dynamic platformer where players control the character Miku, aiming to collect points while avoiding enemies. The game features a classic chessboard as the background, adding a unique strategic element to the gameplay.">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>初音ミク: ネギキャッチ</title>
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="lang">
				<a href="index.php"><button class="lang_button">EN</button></a><br>
				<a href="jp.php"><button class="lang_button">JP</button></a>
			</div>
			<div id="nav">
				<a href="#about_hatsune_miku"><button class="button1">初音ミクについて</button></a>
				<a href="#about_this_game"><button class="button1">このゲームについて</button></a>
				<a href="#contact"><button class="button1">接触</button></a>
				<a href="#play"><button class="button2">遊ぶ</button></a>
				<h1 class="h1_title">初音ミク: ネギキャッチ</h1>
			</div>
		</div>
		<div id="about_hatsune_miku">
			<div id="miku_container">
				<div id="left_side">
					<img src="image/hatsune.png" width="350">
				</div>
				<div id="right_side">
					<span class="miku_span1">初音ミクとは？</span><br>
					<span class="miku_span2">初音ミクは、クリプトン・フューチャー・メディア株式会社が開発した、歌詞やメロディーを入力することで誰でもコンピュータに歌を歌わせることができる音楽ソフトウェアです。膨大な数のユーザーがこのソフトウェアを使用して音楽を作成し、その作品をインターネット上に投稿することで、初音ミクは急速に文化現象へと進化しました。また、初音ミクはキャラクターとしても注目を集めており、バーチャル・シンガーとしてグッズ展開やライブ活動など多方面で活躍しています。今では彼女の人気は世界中に広がりました。</span>
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
					<span class="game_span1">説明：</span><br>
					<span class="game_span2">『初音ミク ネギキャッチ』はキャラクターミクを操作し、敵を避けながらポイントを集めるダイナミックプラットフォーマーです。このゲームは背景として古典的なチェス盤を備えており、ゲームプレイにユニークな戦略的要素を追加します。</span><br>
					<span class="game_span1">グラフィック:</span><br>
					<span class="game_span2">ゲームでは、キャラクターミク、ポイント、敵、チェス盤の背景などの画像が使用されます。</span><br>
					<span class="game_span1">コントロール:</span><br>
					<span class="game_span2">プレイヤーは矢印キー（上下左右）を使ってミクキャラクターを動かします。</span><br>
					<span class="game_span1">時間とポイント:</span><br>
					<span class="game_span2">プレイヤーはボード上のアイテムを収集することでポイントを獲得します。また、ゲームは残り時間を追跡し、プレイヤーは時間切れになる前にできるだけ多くのポイントを蓄積することが求められます。</span>
				</div>
			</div>
		</div>
		<div id="play">
			<div id="play_container">
				<a href="game.php"><button class="play_button">遊ぶ</button></a>
			</div>
		</div>
		<div id="contact">
			<div id="contact_container">
				<span id="contact_span">お問い合わせ</span><br>
				<form method="POST" action="jp.php">
					<p class="p_form">フルネーム<span style="font-weight: bold; color: #B71C1C;"> *</span></p>
					<input type="text" name="name"><br><br>
					<p class="p_form">Eメール<span style="font-weight: bold; color: #B71C1C;"> *</span></p>
					<input type="text" name="email"><br><br>
					<p class="p_form">メッセージ<span style="font-weight: bold; color: #B71C1C;"> *</span></p>
					<textarea rows="10" cols="43" name="message" style="resize: none;"></textarea><br>
					<input class="submit_button" type="submit" value="提出する">
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
			<h1 style="margin: 0; color: #FFFFFF">使用されているすべての画像はそれぞれの所有者に帰属します。</h1>
		</div>
	</div>
</body>
</html>