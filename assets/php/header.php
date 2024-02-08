    <header>
        <script src="./assets/js/control.js" defer></script>
        <div class="header__container">
            <nav>
                <ul>
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="catalog.php">Каталог</a></li>
                    <li><a href="onas.php">О нас</a></li>
                    <li><a href="svaz.php">Обратная связь</a></li>
                </ul>
            </nav>
            <img src="/assets/img/logo.png" alt="Логотип Old But Gold" class="logo" onclick="window.location.assign('index.php')">
            <div class="left-group">
                <img src="/assets/img/izbrannoe.png" alt="Избранное" class="minipic" onclick="window.location.assign('favorites.php')">
                <img src="/assets/img/korzina.png" alt="Корзина" class="minipic" onclick="window.location.assign('basket.php')">
                <?php
                session_start();
                if($_SESSION['id']){
                    echo '<div class="header-krug" id="krug">
                    <img src="assets/img/user.svg" alt="Иконка пользователя">
                    <div class="header-panel">
                        <div class="header-panel__container">
                            <div class="header-ico-group">
                                <div class="header-krug-black"></div>
                                <div class="header-text-group">
                                    <p>'.$_SESSION['name'].'</p>
                                    <p>'.$_SESSION['email'].'</p>
                                </div>
                            </div>
                            <hr>
                            <div class="ico-group" onclick="window.location.assign(\'../lk.php\')">
                                <img src="assets/img/user.svg" alt="">
                                <p>Личные данные</p>
                            </div>
                            <div class="ico-group" onclick="window.location.assign(\'../favorites.php\')">
                                <img src="assets/img/izbrannoe.png" alt="">
                                <p>Избранное</p>
                            </div>
                            <div class="ico-group" onclick="window.location.assign(\'assets/php/exit.php\')">
                                <img src="assets/img/exit.svg" alt="">
                                <p>Выйти</p>
                            </div>
                        </div>
                    </div>
                </div>';
                }
                else {
                    echo '<button class="but_header" onclick="window.location.assign(\'vhod.php\')">Войти/Зарегистрироваться</button>';
                }
                ?>
            </div>
        </div>
        <hr>
    </header>