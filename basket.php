<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old But Gold</title>
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/basket.css">
</head>
<body>
    <?php include("assets/php/header.php");?>
    <?php
        session_start();
        include("assets/php/connect.php");

        if(isset($_POST['select'])){
            $_SESSION['busket'][$_POST['id']] = (int)$_POST['select'];
        }

        $sum = 0;
        if($_SESSION['busket']){
            foreach(array_keys($_SESSION['busket']) as $i){
                $r = $conn->query("SELECT * FROM goods WHERE id = '$i';");
                $g = $r->fetch_assoc();
                $sum += $g['price'] * $_SESSION['busket'][$i];
            }
        }
        
        $date_now = date("Y-m-d");

        $name = $_POST['name'];
        $phone = htmlspecialchars($_POST['phone']);
        $email = htmlspecialchars($_POST['email']);
        $address = $_POST['address'];
        if(isset($name, $phone, $email, $address) && $_SESSION['busket']){
            echo $_SESSION['basket'];
            $conn->query("INSERT INTO zakazi (name, phone, email, address, date, sum) VALUES('$name', '$phone', '$email', '$address', '$date_now', '$sum');");
            $result = $conn->query("SELECT * FROM zakazi ORDER BY id DESC LIMIT 1;");
            $row = $result->fetch_assoc();
            $zakaz_id = $row['id'];
            foreach(array_keys($_SESSION['busket']) as $i){
                $kol = $_SESSION['busket'][$i];
                $conn->query("INSERT INTO zakazinfo (id_zakaz, id_good, kol) VALUES ('$zakaz_id', '$i', '$kol');");
            }
            unset($_SESSION['busket']);
            header("Location: goodbuy.php");
        }
        
        $likeText = "Добавить в избранное";

        if(isset($_POST['busket'])){
            unset($_SESSION['busket'][$_POST['id']]);
            if($_SESSION['busket']){
                foreach(array_keys($_SESSION['busket']) as $i){
                    $r = $conn->query("SELECT * FROM goods WHERE id = '$i';");
                    $g = $r->fetch_assoc();
                    $sum += $g['price'] * $_SESSION['busket'][$i];
                }
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

        


        if($_SESSION['like']){
            if(in_array($id, $_SESSION['like'])){
                $likeText = "Убрать из избранного";
            }
            else {
                $likeText = "Добавить в избранное";
            }
        }

    ?>
    <main>
        <div class="main__container">
            <ul class="page-naming">
                <li><a href="index.php">Главная</a></li>
                <li><img src="assets/img/rect.png" alt="Точка"> <p><a href="catalog.php">Корзина</a></p></li>
            </ul>
            <div class="basket-parts">
                <div class="basket-left-part">
                    <div class="good-back"><img src="assets/img/arrow-good.svg" alt="">Вернуться к покупкам</div>
                    <h1>Корзина</h1>
                    <?php
                    session_start();
                    include("assets/php/connect.php");
                    if($_SESSION['busket']){
                        echo "<hr class='hr-first'>";
                        foreach(array_keys($_SESSION['busket']) as $i){
                            $result = $conn->query("SELECT * FROM goods WHERE id = '$i';");
                            $good = $result->fetch_assoc();
                            echo '
                            <div class="good-tovar">
                        <div class="good-left-img">
                            <img src="'.$good['img'].'" alt="">
                        </div>
                        <div class="good-right-info">
                            <a>'.$good['name'].'</a>    
                            <p>Количество</p>
                            <form action="" method="POST">
                                <input name="id" style="display:none;" value="'.$good['id'].'"/>
                                <select name="select" class="select-css" onchange="submit()">
                                    <option value="1"'.(($_SESSION['busket'][$i]==1)?'selected="selected"':"").'>1</option>
                                    <option value="2"'.(($_SESSION['busket'][$i]==2)?'selected="selected"':"").'>2</option>
                                    <option value="3"'.(($_SESSION['busket'][$i]==3)?'selected="selected"':"").'>3</option>
                                    <option value="4"'.(($_SESSION['busket'][$i]==4)?'selected="selected"':"").'>4</option>
                                    <option value="5"'.(($_SESSION['busket'][$i]==5)?'selected="selected"':"").'>5</option>
                                    <option value="6"'.(($_SESSION['busket'][$i]==6)?'selected="selected"':"").'>6</option>
                                    <option value="7"'.(($_SESSION['busket'][$i]==7)?'selected="selected"':"").'>7</option>
                                    <option value="8"'.(($_SESSION['busket'][$i]==8)?'selected="selected"':"").'>8</option>
                                    <option value="9"'.(($_SESSION['busket'][$i]==9)?'selected="selected"':"").'>9</option>
                                    <option value="10"'.(($_SESSION['busket'][$i]==10)?'selected="selected"':"").'>10</option>
                                </select>
                            </form>
                            <div class="good-right-info-group">
                            <form action="" method="POST">
                                <div class="good-like">
                                    <img src="assets/img/izbrannoe.png" alt="">
                                    <input type="submit" name="like" value="'.$likeText.'" style="color:black;border:0px #000 solid;background-color:#fff;">
                                </div>
                            </form>
                                <div class="good-price">'.$good['price'].' ₽</div>
                            </div>
                            <form action="" method="POST">
                                <input name="id" style="display:none;" value="'.$good['id'].'"/>
                                <input name="busket" type="submit" style="background-image: url(assets/img/krest.svg);" class="krest" value=""/>
                            </form>
                        </div>
                    </div>
                            ';
                        }
                        echo "<hr>";
                    }
                    else {
                        echo "<h2 class='busket-space'>Корзина пуста</h2>";
                    }

                    
                    ?>
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
                <div class="basket-right-part">
                    <div class="zakaz-form">
                            <h1>Краткое описание заказа</h1>
                            <p class="form-price">Итого: <?php echo $sum; ?> ₽ </p>
                            <form action="" method="POST">
                                <label for="">Имя</label>
                                <input type="text" placeholder="Имя" required name='name'>

                                <label for="">Телефон</label>
                                <input type="phone" placeholder="Телефон" required name='phone'>

                                <label for="">E-mail</label>
                                <input type="email" placeholder="E-mail" required name='email'>

                                <label for="">Адрес доставки</label>
                                <input type="text" placeholder="Адрес доставки" required name='address'>

                                <input type="submit" value="Оплатить" id="oplata">
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include("assets/php/footer.php");?>
</body>
</html>