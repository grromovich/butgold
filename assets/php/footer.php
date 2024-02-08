<?php
echo 
'
<footer>
        <div class="footer__container">
            <div class="panels">
                <div class="left-panel">
                    <div class="footer-front">
                        <img src="/assets/img/logo.png" alt="Логотип Old But Gold" class="logo">
                        <nav>
                            <ul>
                                <li><a href="onas.html">О нас</a></li>
                                <li><a href="svaz.html">Обратная связь</a></li>
                                <li><a href="lk.html">Личный кабинет</a></li>
                            </ul>
                        </nav>
                        <nav>
                            <ul>
                                <li><a href="catalog.html">Каталог</a></li>
                                <li><a href="catalog/kolza.html">Кольца</a></li>
                                <li><a href="catalog/sergi.html">Серьги</a></li>
                                <li><a href="catalog/kuloni.html">Кулоны</a></li>
                                <li><a href="basket.html">Корзина</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="bottom-a">
                        <p>© 2023 ООО «OldbutGold»</p>
                        <a href="">Пользовательское соглашение</a>
                        <a href="">Справка</a>
                    </div>
                </div>
                <hr>
                <div class="right-panel">
                    <form action="/assets/php/email.php" action="GET">
                        <h2>Подписаться на рассылку</h2>
                        <input type="email" placeholder="Email" class="email-form-input" name="email" required>
                        <div class="checkbox">
                            <input type="checkbox" name="sogl" value="yes" required>
                            <label for="sogl">Соглашаюсь с условиями политики конфиденциальности</label>
                        </div>
                        <input type="submit" value="Подписаться" class="btn-form-sbmt">
                    </form>
                    <div class="conts">
                        <img src="assets/img/conts-odn.png" alt="Одноклассники">
                        <img src="assets/img/conts-teleg.png" alt="Телеграмм">
                        <img src="assets/img/conts-vk.png" alt="Вконтакте">
                    </div>
                </div>              
            </div>
        </div>
    </footer>
';
?>