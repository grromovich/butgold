<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old But Gold</title>
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/goods.css">
</head>
<body>
    <?php include("assets/php/header.php");?>
    <?php
    session_start();

    if(isset($_POST['busket'])){
        $id = $_POST['id'];
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

    <?php
    $good = '1';
    $mat = '1';

    if(isset($_POST['good-radio'])){
        $good = $_POST['good-radio'];
        $mat = $_POST['mat-radio'];
    }
    ?>
    <main>
        <div class="main__container">
            <ul class="page-naming">
                <li><a href="index.php">Главная</a></li>
                <li><img src="assets/img/rect.png" alt="Точка"> <p><a href="catalog.php">Каталог</a></p></li>
                <li><img src="assets/img/rect.png" alt="Точка"> <p><a href="catalog.php"><?php include("assets/php/selecttype.php");?></a></p></li>
            </ul>
            <div class="goods-panels">
                <div class="goods-left-panel">
                    <div class="goods-left-panel__container">
                        <h2>Цена</h2>
                        <form action="" method="post">
                        <div class="goods-radio">
                            <input type="radio" name="good-radio" id="goods-radio1" value="0" onclick="submit();"
                            <?php
                                if($good == 0){echo ' checked="checked"';}?>
                            />
                            <label for="goods-radio1">Любая</label>
                        </div>
                        <div class="goods-radio">
                            <input type="radio" name="good-radio" id="goods-radio2" value="1" onclick="submit();"
                            <?php 
                                if($good == 1){echo ' checked="checked"';}?>
                            />
                            <label for="goods-radio2">От 120.000 до 450.000</label>
                        </div>
                        <div class="goods-radio">
                            <input type="radio" name="good-radio" id="goods-radio3" value="2" onclick="submit();"
                            <?php 
                                if($good == 2){echo ' checked="checked"';}?>
                            />
                            <label for="goods-radio3">От 460.000 до 700.000</label>
                        </div>
                        <div class="goods-radio">
                            <input type="radio" name="good-radio" id="goods-radio4" value="3" onclick="submit();"
                            <?php
                                if($good == 3){echo ' checked="checked"';}?>
                            />
                            <label for="goods-radio4">От 710.000 до 950.000</label>
                        </div>
                        <div class="goods-radio">
                            <input type="radio" name="good-radio" id="goods-radio5" value="4" onclick="submit();"
                            <?php
                                if($good == 4){echo ' checked="checked"';}?>
                            />
                            <label for="goods-radio5">От 960.000 до 1.200.000</label>
                        </div>
                        <div class="goods-radio">
                            <input type="radio" name="good-radio" id="goods-radio6" value="5" onclick="submit();"
                            <?php 
                                if($good == 5){echo ' checked="checked"';}?>
                            />
                            <label for="goods-radio6">От 1.210.000 до 1.500.000</label>
                        </div>
                        <h2>Материал</h2>
                        <div class="goods-radio">
                            <input type="radio" name="mat-radio" id="goods2-radio1" value="0" onclick="submit();"
                            <?php 
                                if($mat == 0){echo ' checked="checked"';}?>
                            />
                            <label for="goods2-radio1">Любой</label>
                        </div>
                        <div class="goods-radio">
                            <input type="radio" name="mat-radio" id="goods2-radio2" value="1" onclick="submit();"
                            <?php 
                                if($mat == 1){echo ' checked="checked"';}?>
                            />
                            <label for="goods2-radio2">Золото</label>
                        </div>
                        <div class="goods-radio">
                            <input type="radio" name="mat-radio" id="goods2-radio3" value="2" onclick="submit();"
                            <?php 
                                if($mat == 2){echo ' checked="checked"';}?>
                            />
                            <label for="goods2-radio3">Золото белое</label>
                        </div>
                        <div class="goods-radio">
                            <input type="radio" name="mat-radio" id="goods2-radio4" value="3" onclick="submit();"
                            <?php 
                                if($mat == 3){echo ' checked="checked"';}?>
                            />
                            <label for="goods2-radio4">Золото розовое</label>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="goods-right-content">
                    <div class="goods-right-content__container">
                        <?php
                            include("assets/php/connect.php");
                            
                            $type = $_GET['type'];
                            $result = null;

                            if($mat=='0'){
                                if($good=='0') {
                                    $result = $conn->query("SELECT * FROM goods WHERE type = $type");
                                }
                                elseif($good=='1'){
                                    $result = $conn->query("SELECT * FROM goods WHERE type = $type AND price BETWEEN 120000 AND 450000");
                                }
                                elseif($good=='2'){
                                    $result = $conn->query("SELECT * FROM goods WHERE type = $type AND price BETWEEN 460000 AND 700000");
                                }
                                elseif($good=='3'){
                                    $result = $conn->query("SELECT * FROM goods WHERE type = $type AND price BETWEEN 710000 AND 950000");
                                }
                                elseif($good=='4'){
                                    $result = $conn->query("SELECT * FROM goods WHERE type = $type AND price BETWEEN 960000 AND 1200000");
                                }
                                elseif($good=='5'){
                                    $result = $conn->query("SELECT * FROM goods WHERE type = $type AND price BETWEEN 1210000 AND 1500000");
                                }
                            }
                            else {
                                if($good=='0') {
                                    $result = $conn->query("SELECT * FROM goods WHERE type = $type AND zoloto = $mat");
                                }
                                elseif($good=='1'){
                                    $result = $conn->query("SELECT * FROM goods WHERE type = $type AND price BETWEEN 120000 AND 450000 AND zoloto = $mat");
                                }
                                elseif($good=='2'){
                                    $result = $conn->query("SELECT * FROM goods WHERE type = $type AND price BETWEEN 460000 AND 700000 AND zoloto = $mat");
                                }
                                elseif($good=='3'){
                                    $result = $conn->query("SELECT * FROM goods WHERE type = $type AND price BETWEEN 710000 AND 950000 AND zoloto = $mat");
                                }
                                elseif($good=='4'){
                                    $result = $conn->query("SELECT * FROM goods WHERE type = $type AND price BETWEEN 960000 AND 1200000 AND zoloto = $mat");
                                }
                                elseif($good=='5'){
                                    $result = $conn->query("SELECT * FROM goods WHERE type = $type AND price BETWEEN 1210000 AND 1500000 AND zoloto = $mat");
                                }
                            }

                            if($result->num_rows){
                                while($row = $result->fetch_assoc()){
                                    echo '
                                    <div class="good" style="background: url('.$row['img'].')">
                                        <div class="good__container">
                                        <form action="" method="POST">
                                            <input name="id" style="display:none;" value="'.$row['id'].'"/>
                                            <input name="like" type="submit" style="background-image: url(assets/img/like.svg);" class="button-like" value=""/>
                                        </form>
                                        <div class="good-info" onclick="window.location.assign(\'good.php?id='.$row['id'].'\')">
                                            '.$row['name'].'<br>
                                            <span class="good-span-price">'.$row['price'].' ₽</span>
                                        </div>
                                        <form action="" method="POST">
                                            <input name="id" style="display:none;" value="'.$row['id'].'"/>
                                            <input name="busket" type="submit" style="background-image: url(assets/img/cart.svg);" class="button-like" value="" />
                                        </form>
                                        <div class="zoloto">'.$row['zoloto'].'</div>
                                        </div>
                                    </div>
                                    ';
                                    
                                }
                            }
                            else {
                                echo "<h1 style='white-space:nowrap; padding-left: 100%;'>Товаров нет</h1>";
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