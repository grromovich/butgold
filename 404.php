<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old But Gold</title>
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/404.css">
    
</head>
<body>
    <?php include("assets/php/header.php");?>

    <main>
        <div class="main__container">
            <div class="error404-text">
                <h1>404</h1>
                <div class="left-404-side">
                    <h2>Такой страницы <br> не существует</h2>
                    <div class="btn-back">
                        <button onclick="window.location.assign('index.php')">Назад</button>
                        <img src="assets/img/arrow-left.png" alt="Стрелка вправо">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include("assets/php/footer.php");?>
</body>
</html>