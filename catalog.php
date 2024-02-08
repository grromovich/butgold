<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old But Gold</title>
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/catalog.css">
</head>
<body>
    <?php include("assets/php/header.php");?>
    <main>
        <div class="main__container">
            <ul class="page-naming">
                <li><a href="index.php">Главная</a></li>
                <li><img src="assets/img/rect.png" alt="Точка"> <p><a href="catalog.php">Каталог</a></p></li>
            </ul>
            <div class="catalog-group">
            <div class="group3">
                        <div class="catalog-el" onclick="window.location.assign('goods.php?type=1')">
                            <h2><a href="goods.php?type=1">Кольца</a></h2>
                        </div>
                        <div class="catalog-el" onclick="window.location.assign('goods.php?type=2')">
                            <h2><a href="goods.php?type=2">Серьги</a></h2>
                        </div>
                        <div class="catalog-el" onclick="window.location.assign('goods.php?type=3')">
                            <h2><a href="goods.php?type=3">Кулоны</a></h2>
                        </div>
                    </div>
                <div class="hrs-down">
                    <hr>
                    <hr>
                </div>
                <div class="hrs-down">
                    <hr>
                    <hr>
                </div>
            </div>
        </div>
    </main>
    <?php include("assets/php/footer.php");?>
</body>
</html>