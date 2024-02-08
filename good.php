<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old But Gold</title>
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/good.css">
</head>
<body>
    <?php include("assets/php/header.php");?>
    <main>
        <?php
            session_start();
            include("assets/php/connect.php");
            $id = $_GET["id"];
            $result = $conn->query("SELECT * FROM goods WHERE id = $id");
            $row = $result->fetch_assoc();

            $busketText = "В корзину";
            $likeText = "Добавить в избранное";
            
            if(isset($_POST['busket'])){
                if(isset($_SESSION['busket'])){
                    if(isset($_SESSION['busket'][$id])){
                        unset($_SESSION['busket'][$id]);
                    }
                    else {
                        $_SESSION['busket'][$id] = 1;
                    }
                }
                else {
                    $_SESSION['busket'] = array(
                        $id => 1
                    );
                }
            }
            if(isset($_POST['like'])){
                if(isset($_SESSION['like'])){
                    if(in_array($id, $_SESSION['like'])){
                        $key = array_search($id, $_SESSION['like']);
                        unset($_SESSION['like'][$key]);
                    }
                    else {
                        array_push($_SESSION['like'], $id);
                    }
                }
                else {
                    $_SESSION['like'] = array($id);
                }
            }

            if($_SESSION['busket']){
                if(isset($_SESSION['busket'][$id])){
                    $busketText = "Добавлено в корзину";
                }
                else {
                    $busketText = "В корзину";
                }
            }

            if($_SESSION['like']){
                if(in_array($id, $_SESSION['like'])){
                    $likeText = "Убрать из избранного";
                }
                else {
                    $likeText = "Добавить в избранное";
                }
            }
        ?>
        <div class="main__container">
            <ul class="page-naming">
                <li><a href="index.php">Главная</a></li>
                <li><img src="assets/img/rect.png" alt="Точка"> <p><a href="catalog.php">Каталог</a></p></li>
                <li><img src="assets/img/rect.png" alt="Точка"> <p><a href="catalog.php">Кольца</a></p></li>
            </ul>
            <div class="good-parts">
                <div class="left-part">
                    <div class="good-back" onclick="window.location.assign('/goods.php?type=<? echo $row['type']; ?>')"><img src="assets/img/arrow-good.svg" alt="">Вернуться к покупкам</div>
                    <h1>Кольцо</h1>
                    <hr class="hr-first">
                    <div class="good-tovar">
                        <div class="good-left-img">
                            <img src="<? echo $row['img']; ?>" alt="">
                        </div>
                        <div class="good-right-info">
                            <h2><? $row['name'] ?></h2>
                            <p><? $row['shortdesc'] ?></p>
                            
                            <form action="" method="POST">
                            <div class="good-like">
                                <img src="assets/img/izbrannoe.png" alt="">
                                <input type="submit" name="like" value="<?echo $likeText;?>" style="color:black;border:0px #000 solid;background-color:#fff;">
                            </div>
                            </form>
                            
                            <div class="good-price"><? echo $row['price']; ?> ₽</div>
                            <form action="" method="POST">
                                <input type="submit" name="busket" value="<?echo $busketText;?>" class="btn-cart">
                            </form>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="right-part">
                    <p><? echo $row['fulldesc']; ?></p>
                </div>
            </div>
            <div class="nrav">
                <h2>Вам также может понравиться:</h2>
                <div class="nrav-goods">
                    <div class="nrav-good">
                        <img src="assets/img/good.png" alt="">
                        <a href="">Золотые серьги</a>
                    </div>
                    <div class="nrav-good">
                        <img src="assets/img/good.png" alt="">
                        <a href="">Золотые серьги</a>
                    </div>
                    <div class="nrav-good">
                        <img src="assets/img/good.png" alt="">
                        <a href="">Золотые серьги</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include("assets/php/footer.php");?>
</body>
</html>