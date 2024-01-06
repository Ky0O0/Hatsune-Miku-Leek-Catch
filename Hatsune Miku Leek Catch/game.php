<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="game_style.css">
    <title>Hatsune Miku: Leek Catch</title>
</head>
<body>
    <div id="loading-text">Loading...</div>
    <div id="loading-bar">
        <div id="progress-bar"></div>
    </div>
    <h1 id="game-title">Hatsune Miku: Leek Catch</h1>
    <div id="game-board">
        <canvas id="gameCanvas" width="600" height="600"></canvas>
        <div id="enemy"></div>
    </div>
    <div id="controls">
        <button class="center-button"></button>
        <button class="arrow-button" onclick="ruch('up')">&#8593;</button>
        <button class="center-button"></button>
        <button class="arrow-button" onclick="ruch('left')">&#8592;</button>
        <button class="center-button"></button>
        <button class="arrow-button" onclick="ruch('right')">&#8594;</button>
        <button class="center-button"></button>
        <button class="arrow-button" onclick="ruch('down')">&#8595;</button>
        <button class="center-button"></button>
    </div>
    <div id="points">
        Points: <span id="punkty">0</span>
    </div>
    <div id="timer">Time: <span id="czas">03:39</span></div>
    <div id="end-game">
        <p>Your Score: <span id="koncowe-punkty">0</span></p>
        <button id="restart-button" onclick="restartGame()">Play Again</button>
    </div>
    <script type="text/javascript" src="game_script.js"></script>
</body>
</html>