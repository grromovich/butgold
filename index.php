<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old But Gold</title>
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/wallop.css">
    
    <link rel="stylesheet" href="assets/css/wallop--slide.css">

    <script src="assets/js/Wallop.min.js"></script>
</head>
<body>
    <?php include("assets/php/header.php");?>
    <main>
        <div class="main__container">
            <section class="main-section">
                <h1 class="main-h1">Украшения — это признание в<br>
                    чувствах, которое останется<br>
                    рядом с любимой навсегда
                </h1>
                <h2 class="main-h2">Скидка 20 процентов на наши изделия из новой коллекции</h2>
                <div class="btn-back">
                    <button onclick="window.location.assign('catalog.php')">Смотреть всё</button>
                    <img src="assets/img/arrow-left.png" alt="Стрелка вправо">
                </div>
                <div class="main-images">
                    <div class="main-images__container">
                        <img src="assets/img/main-1.png" alt="Картинка Женщина" id="main-image-1">
                        <img src="assets/img/main-2.png" alt="Картинка Женщина" id="main-image-2">
                        <img src="assets/img/main-3.png" alt="Скидка 20%" id="main-image-3">
                        <img src="assets/img/main-arrow.png" alt="Стрелка" id="main-image-4">
                    </div>
                </div>
            </section>
            <section class="undermain">
                <div class="undermain__container">
                    <div class="undermain-images">
                        <img src="assets/img/onas1.png" alt="Кольцо" class="undermain-img1">
                        <img src="assets/img/onas2.png" alt="Кольцо" class="undermain-img2">
                    </div>
                    <img src="assets/img/undermain-arrow.png" alt="Стрелка" class="undermain-arrow">
                    <ul class="undermain-list">
                        <li>Настоящее <br>золото</li>
                        <hr>
                        <li>Драгоценные <br>камни</li>
                        <hr>
                        <li>Жемчуг</li>
                    </ul>
                </div>
            </section>
            <section class="main-slider">
                <div class="Wallop Wallop--slide">
                    <div class="Wallop-list">
                      <div class="Wallop-item Wallop-item--current">
                        <img src="assets/img/slider-1.png" alt="">
                        <p class="wallop-p wallop-p1">Создание лучших в мире бриллиантов<br>
                        начинается с осведомленности об их<br>
                        происхождении. Мы можем отследить<br>
                        100 процентов наших неограненных<br>
                        алмазов до известных месторождений<br>
                        и источников</p>
                      </div>
                      <div class="Wallop-item">
                        <img src="assets/img/slider-2.png" alt="">
                        <p class="wallop-p wallop-p2">Мы гордимся тем, что, опираясь на<br>
                        наше наследие лидера в области<br>
                        отслеживания бриллиантов,<br>
                        производим кольца с бриллиантами<br>
                        ответственного происхождения<br>
                        искусно изготовленные, которые<br>
                        прославляют любовь во всех ее<br>
                        проявлениях.</p>
                      </div>
                      <div class="Wallop-item">
                        <img src="assets/img/slider-3.png" alt="">
                        <p class="wallop-p wallop-p3"></p>
                      </div>
                      <div class="Wallop-item">
                        <img src="assets/img/slider-4.png" alt="">
                        <p class="wallop-p wallop-p4"></p>
                      </div>
                    </div>
                    <img src="assets/img/slider-arrow.png" class="Wallop-buttonPrevious" alt="">
                    <img src="assets/img/slider-arrow.png" class="Wallop-buttonNext" alt="">
                  </div>
            </section>
            <section class="main-dop">
                <div class="main-dop__container">
                    <div class="main-dop-textbox">
                        <div class="main-dop-textbox__container">
                               <h3>Ювелирные украшения дополняют<br>
                                тебя, дают возможность почувствовать<br>
                                себя особенной
                                </h3>
                                <hr>
                        </div>
                    </div>
                    <img src="assets/img/zhenshina.png" alt="" class="main-dop-1">
                    <img src="assets/img/main-hend.png" alt="" class="main-dop-2">
                    <img src="assets/img/main-arrow.png" alt="Стрелка" class="main-dop-3">
                </div>
            </section>
            <section class="main-popular">
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
            </section>
        </div>
    </main>
    <?php include("assets/php/footer.php");?>
</body>
<script>
  var wallopEl = document.querySelector('.Wallop');
  var slider = new Wallop(wallopEl);
</script>
</html>