    const loadingText = document.getElementById('loading-text');
    const loadingBar = document.getElementById('loading-bar');
    const progressBar = document.getElementById('progress-bar');
    const gameTitle = document.getElementById('game-title');
    const gameBoard = document.getElementById('game-board');
    const controls = document.getElementById('controls');
    const points = document.getElementById('points');
    const timer = document.getElementById('timer');
    const czasElement = document.getElementById('czas');
    const canvas = document.getElementById('gameCanvas');
    const ctx = canvas.getContext('2d');
    const enemyElement = document.getElementById('enemy');
    const endGameElement = document.getElementById('end-game');
    const koncowePunktyElement = document.getElementById('koncowe-punkty');
    const restartButton = document.getElementById('restart-button');

   
    const mikuImage = new Image();
    mikuImage.src = 'game_image/miku.png';

    const punktImage = new Image();
    punktImage.src = 'game_image/point.png';

    const enemyImage = new Image();
    enemyImage.src = 'game_image/enemy.gif';

    const rozmiar_pola = 100;
    const plansza_szachowa = [
        [0, 1, 0, 1, 0, 1, 0, 1],
        [1, 0, 1, 0, 1, 0, 1, 0],
        [0, 1, 0, 1, 0, 1, 0, 1],
        [1, 0, 1, 0, 1, 0, 1, 0],
        [0, 1, 0, 1, 0, 1, 0, 1],
        [1, 0, 1, 0, 1, 0, 1, 0],
        [0, 1, 0, 1, 0, 1, 0, 1],
        [1, 0, 1, 0, 1, 0, 1, 0]
    ];

    const jasny_zielony = '#8CEA8C';
    const ciemny_zielony = '#228B22';
    const bialy = '#FFFFFF';
    const punkt_kolor = '#FF0000';

    let miku_x = canvas.width / 2 - rozmiar_pola / 2;
    let miku_y = canvas.height / 2 - rozmiar_pola / 2;
    const miku_szerokosc = 65;
    const miku_wysokosc = 80;
    const predkosc_miku = 30;

    let punkt_x = Math.floor(Math.random() * (canvas.width - miku_szerokosc));
    let punkt_y = Math.floor(Math.random() * (canvas.height - miku_wysokosc));

    let enemy_x = 0;
    let enemy_y = 0;
    const enemySize = 65;
    const enemySpeed = 2;

    let punkty = 0;
    let czas = 3 * 60 + 39;

    function formatujCzas(sekundy) {
        const minuty = Math.floor(sekundy / 60);
        const resztaSekundy = sekundy % 60;
        return `${minuty.toString().padStart(2, '0')}:${resztaSekundy.toString().padStart(2, '0')}`;
    }

    function odswiezCzas() {
        czasElement.innerText = formatujCzas(czas);
    }

    function rysujPlansze() {
        for (let i = 0; i < 8; i++) {
            for (let j = 0; j < 8; j++) {
                const kolor = plansza_szachowa[i][j] === 0 ? jasny_zielony : ciemny_zielony;
                ctx.fillStyle = kolor;
                ctx.fillRect(j * rozmiar_pola, i * rozmiar_pola, rozmiar_pola, rozmiar_pola);
            }
        }
    }

    function rysujMiku() {
        ctx.drawImage(mikuImage, miku_x, miku_y, miku_szerokosc, miku_wysokosc);
    }

    function rysujPunkt() {
        ctx.drawImage(punktImage, punkt_x, punkt_y, miku_szerokosc, miku_wysokosc);
    }

    function rysujPrzeciwnika() {
        ctx.drawImage(enemyImage, enemy_x, enemy_y, enemySize, enemySize);
    }

    function rysujPunkty() {
        const punktyElement = document.getElementById('punkty');
        punktyElement.innerText = punkty;
    }

    function ruch(direction) {
        switch (direction) {
            case 'up':
                miku_y -= predkosc_miku;
                break;
            case 'down':
                miku_y += predkosc_miku;
                break;
            case 'left':
                miku_x -= predkosc_miku;
                break;
            case 'right':
                miku_x += predkosc_miku;
                break;
        }

        if (
            miku_x < punkt_x + miku_szerokosc &&
            miku_x + miku_szerokosc > punkt_x &&
            miku_y < punkt_y + miku_wysokosc &&
            miku_y + miku_wysokosc > punkt_y
        ) {
            punkt_x = Math.floor(Math.random() * (canvas.width - miku_szerokosc));
            punkt_y = Math.floor(Math.random() * (canvas.height - miku_wysokosc));
            punkty++;
        }

        if (
            miku_x < enemy_x + enemySize &&
            miku_x + miku_szerokosc > enemy_x &&
            miku_y < enemy_y + enemySize &&
            miku_y + miku_wysokosc > enemy_y
        ) {
            resetGame();
        }

        if (miku_x < 0) miku_x = 0;
        if (miku_x > canvas.width - miku_szerokosc) miku_x = canvas.width - miku_szerokosc;
        if (miku_y < 0) miku_y = 0;
        if (miku_y > canvas.height - miku_wysokosc) miku_y = canvas.height - miku_wysokosc;

        if (enemy_x < 0) enemy_x = 0;
        if (enemy_x > canvas.width - enemySize) enemy_x = canvas.width - enemySize;
        if (enemy_y < 0) enemy_y = 0;
        if (enemy_y > canvas.height - enemySize) enemy_y = canvas.height - enemySize;

        ctx.clearRect(0, 0, canvas.width, canvas.height);

        rysujPlansze();
        rysujMiku();
        rysujPunkt();
        rysujPrzeciwnika();
        rysujPunkty();
    }

    function rysujGre() {
        rysujPlansze();
        rysujMiku();
        rysujPunkt();
        rysujPrzeciwnika();
        rysujPunkty();
    }

    function startGame() {
        loadingText.style.display = 'none';
        loadingBar.style.display = 'none';
        gameTitle.style.display = 'block';
        gameBoard.style.display = 'block';
        controls.style.display = 'grid';
        points.style.display = 'block';
        timer.style.display = 'block';
        rysujGre();
        setInterval(() => {
            czas--;
            odswiezCzas();
            if (czas === 0) {
                resetGame();
            }
        }, 1000);

        enemy_x = Math.floor(Math.random() * (canvas.width - enemySize));
        enemy_y = Math.floor(Math.random() * (canvas.height - enemySize));

        setInterval(() => {
            if (miku_x < enemy_x) enemy_x -= enemySpeed;
            if (miku_x > enemy_x) enemy_x += enemySpeed;
            if (miku_y < enemy_y) enemy_y -= enemySpeed;
            if (miku_y > enemy_y) enemy_y += enemySpeed;

            ctx.clearRect(0, 0, canvas.width, canvas.height);

            rysujPlansze();
            rysujMiku();
            rysujPunkt();
            rysujPrzeciwnika();
            rysujPunkty();
        }, 50);
    }

    function resetGame() {
        punkty = 0;
        czas = 3 * 60 + 39;
        odswiezCzas();
        miku_x = canvas.width / 2 - rozmiar_pola / 2;
        miku_y = canvas.height / 2 - rozmiar_pola / 2;
        punkt_x = Math.floor(Math.random() * (canvas.width - miku_szerokosc));
        punkt_y = Math.floor(Math.random() * (canvas.height - miku_wysokosc));
        enemy_x = 0;
        enemy_y = 0;
        enemySpeed = 2;
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        rysujPlansze();
        rysujMiku();
        rysujPunkt();
        rysujPrzeciwnika();
        rysujPunkty();
    }

    function restartGame() {
        endGameElement.style.display = 'none';
        gameTitle.style.display = 'block';
        gameBoard.style.display = 'block';
        controls.style.display = 'grid';
        points.style.display = 'block';
        timer.style.display = 'block';
        resetGame();
        startGame();
    }

    function koniecGry() {
        gameTitle.style.display = 'none';
        gameBoard.style.display = 'none';
        controls.style.display = 'none';
        points.style.display = 'none';
        timer.style.display = 'none';
        endGameElement.style.display = 'block';
        koncowePunktyElement.innerText = punkty;
    }

    function startGame() {
       loadingText.style.display = 'none';
        loadingBar.style.display = 'none';
        gameTitle.style.display = 'block';
        gameBoard.style.display = 'block';
        controls.style.display = 'grid';
        points.style.display = 'block';
        timer.style.display = 'block';
        rysujGre();
        setInterval(() => {
            czas--;
            odswiezCzas();
            if (czas === 0) {
                koniecGry();
            }
        }, 1000);

        enemy_x = Math.floor(Math.random() * (canvas.width - enemySize));
        enemy_y = Math.floor(Math.random() * (canvas.height - enemySize));

        setInterval(() => {
            if (miku_x < enemy_x) enemy_x -= enemySpeed;
            if (miku_x > enemy_x) enemy_x += enemySpeed;
            if (miku_y < enemy_y) enemy_y -= enemySpeed;
            if (miku_y > enemy_y) enemy_y += enemySpeed;

            if (
                miku_x < enemy_x + enemySize &&
                miku_x + miku_szerokosc > enemy_x &&
                miku_y < enemy_y + enemySize &&
                miku_y + miku_wysokosc > enemy_y
            ) {
                koniecGry();
            }

            ctx.clearRect(0, 0, canvas.width, canvas.height);

            rysujPlansze();
            rysujMiku();
            rysujPunkt();
            rysujPrzeciwnika();
            rysujPunkty();
        }, 50);
    }

    let progress = 0;
    const loadingInterval = setInterval(() => {
        progress += 5;
        progressBar.style.width = `${progress}%`;
        if (progress >= 100) {
            clearInterval(loadingInterval);
            startGame();
        }
    }, 200);