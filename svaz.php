<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old But Gold</title>
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/svaz.css">
</head>
<body>
    <?php include("assets/php/header.php");?>
    <main>
        <div class="main__container">
            <ul class="page-naming">
                <li><a href="index.php">Главная</a></li>
                <li><img src="assets/img/rect.png" alt="Точка"> <p><a href="svaz.php">Обратная связь</a></p></li>
            </ul>
            <div class="parts">
                <div class="left-part">
                    <div class="phon_left-part">
                        <h2>Ваше мнение - крайне ценно для нас. <br>
                            Отправьте заяву через эту форму и мы ответим Вам в ближайшее время! <br>
                            Помогите нам стать лучше.</h2>
                    </div>
                </div>
                <div class="right-part">
                    <form action="assets/php/svaz.php" method="GET" class="main-form">
                        <label for="fullname">Имя</label>
                        <input type="text" placeholder="Имя" class="input-form" if="fullname" name="fullname" required>
                        <label for="comment">Комментарий</label>
                        <textarea name="comment" id="comment" cols="30" rows="4" placeholder="Комментарий" required></textarea>
                        <label for="phone">Телефон</label>
                        <input type="tel" name="phone" id="phone" placeholder="Телефон" class="input-form" required>
                        <label for="email">Email</label>    
                        <input type="email" name="email" id="email" placeholder="Email" class="input-form" required>
                        <div class="checkbox">
                            <input type="checkbox" fd="sogl" name="sogl" value="yes" required>
                            <label for="sogl">Соглашаюсь с условиями политики конфиденциальности</label>
                        </div>
                        <input type="submit" value="Подписаться" class="btn-form-sbmt">
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include("assets/php/footer.php");?>
</body>
</html>