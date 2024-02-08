<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old But Gold</title>
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/favorites.css">
    <link rel="stylesheet" href="assets/css/goods.css">
</head>
<body>
    <?php include("assets/php/header.php");?>
    <?php
    session_start();

    if(isset($_POST['busket'])){
        if(isset($_SESSION['busket'])){
            if(in_array($id, $_SESSION['busket'])){
                $key = array_search($_POST['id'], $_SESSION['busket']);
                unset($_SESSION['busket'][$key]);
            }
            else {
                array_push($_SESSION['busket'], $_POST['id']);
            }
        }
        else {
            $_SESSION['busket'] = array($_POST['id']);
        }
    }
    if(isset($_POST['like'])){
        if(isset($_SESSION['like'])){
            if(in_array($_POST['id'], $_SESSION['like'])){
                $key = array_search($_POST['id'], $_SESSION['like']);
                unset($_SESSION['like'][$key]);
            }
            else {
                array_push($_SESSION['like'], $_POST['id']);
            }
        }
        else {
            $_SESSION['like'] = array($_POST['id']);
        }
    }
    ?>
    <main>
        <div class="main__container">
            <ul class="page-naming">
                <li><a href="index.php">Главная</a></li>
                <li><img src="assets/img/rect.png" alt="Точка"> <p><a href="catalog.php">Избранное</a></p></li>
            </ul>
            <h1>Избранное</h1>
                <div class="favorites-goods">
                    <div class="favorites-goods__container">
                    <?php
                        session_start();
                        include("assets/php/connect.php");
                        if($_SESSION['like']){
                            foreach($_SESSION['like'] as $i){
                                $result = $conn->query("SELECT * FROM goods WHERE id = '$i'");
                                if($result->num_rows){
                                    $row = $result->fetch_assoc();
                                    echo '
                                    <div class="good" style="background-image:url('.$row['img'].');">
                                        <form action="" method="POST">
                                                <input name="id" style="display:none;" value="'.$row['id'].'"/>
                                                <input name="like" type="submit" style="background-image: url(assets/img/krest.svg);" class="krest" value=""/>
                                        </form>
                                        <div class="good__container">
                                                <img src="assets/img/like.svg" class="button-like" />
                                                <div class="good-info">
                                                '.$row['name'].'<br>'.$row['price'].'
                                                </div>
                                                <form action="" method="POST">
                                                    <input name="id" style="display:none;" value="'.$row['id'].'"/>
                                                    <input name="basket" type="submit" style="background-image: url(assets/img/cart.svg);" class="button-like" value="" />
                                                </form>
                                        </div>
                                    </div>
                                    ';
                                }
                            }
                        }
                        else {
                            echo '<h1 style="justify-self:center;margin-bottom:240px;font-size:24px">Избранных товаров нет</h1>';
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include("assets/php/footer.php");?>
</body>
</html>