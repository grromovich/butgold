<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old But Gold</title>
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/lk.css">
</head>
<body>
    <?php include("assets/php/header.php");?>
    <?php
        include("assets/php/connect.php");
        session_start();
        if(!isset($_SESSION['id'])){
            header("Location: vhod.php");
        }
        $id = $_SESSION['id'];

        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $lastlastname = $_POST['lastlastname'];
        if(isset($name, $lastname,$lastlastname)){
            $conn->query("UPDATE users SET name = '$name', lastname = '$lastname', lastlastname = '$lastlastname' WHERE id = '$id'");        }

        $pol = $_POST['pol'];

        if(isset($pol)){
            $conn->query("UPDATE users SET pol = '$pol' WHERE id = '$id'");
        }

        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if(isset($password1, $password2)){
            $result = $conn->query("SELECT * FROM users WHERE id = '$id'");
            if($result->num_rows){
                $row = $result->fetch_assoc();
                if(password_verify($password1, $row['password'])){
                    $password = password_hash($password1, PASSWORD_DEFAULT);
                    $conn->query("UPDATE users SET password = '$password' WHERE id = '$id'");
                }
            }
            
        }

        $date = $_POST['date'];

        if(isset($date)){
            $conn->query("UPDATE users SET date = '$date' WHERE id = '$id'");
        }

        $result = $conn->query("SELECT * FROM users WHERE id = '$id'");
        $user = $result->fetch_assoc();
    ?>
    <main>
        <div class="main__container">
            <ul class="page-naming">
                <li><a href="index.php">Главная</a></li>
                <li><img src="assets/img/rect.png" alt="Точка"> <p><a href="catalog.php">Личный кабинет</a></p></li>
            </ul>
            <div class="lk-parts">
                <div class="lk-left-part">
                    <div class="lk-photo">
                        <img src="assets/img/user.svg" alt="">
                    </div>
                    <div class="lk-forms">
                        <form action="" method="POST">
                            <label for="name">Имя</label>
                            <input type="text" placeholder="Имя" id="name" name="name" value='<?if($user['name'] == null){echo '';}else{echo $user['name'];} ?>'>
                            <label for="lastname">Фамилия</label>
                            <input type="text" placeholder="Фамилия" id="lastname" name="lastname" value='<?if($user['lastname'] == null){echo '';}else{echo $user['lastname'];} ?>'>
                            <label for="lastlastname">Отчество</label>
                            <input type="text" placeholder="Отчество" id="lastlastname" name="lastlastname" value='<?if($user['lastlastname'] == null){echo '';}else{echo $user['lastlastname'];} ?>'>
                            <input type="submit" value="Сохранить">
                        </form>
                        <form action="" method="POST">
                            <h2>Изменить пароль</h2>
                            <label for="password1">Текущий пароль</label>
                            <input type="password" placeholder="Текущий пароль" minlength="6" name="password1" id="password1">
                            <label for="password2">Новый пароль</label>
                            <input type="password" placeholder="Новый пароль" minlength="6" name="password2" id="password2">
                            <input type="submit" value="Сохранить">
                        </form>
                    </div>
                    <div class="lk right-form">
                            <h3>Ваш пол</h3>
                        <form action="" method="POST">
                            <div class="lk-radio">
                                <input type="radio"name="pol" id="pol1" value='1' <?if($user['pol']=='1'){echo ' checked="checked"';}?>>
                                <label for="pol1">Женский</label>
                            </div>
                            <div class="lk-radio">
                                <input type="radio" name="pol" id="pol2" value='2' <?if($user['pol']=='2'){echo ' checked="checked"';}?>>
                                <label for="pol2">Мужской</label>
                            </div>
                            <input type="submit" value="Сохранить">
                        </form>
                        <h3>Дата рождения</h3>
                        <form action="" method="POST">
                            <input type="date" name="date" value='<?if($user['date']==null){echo ' дд.мм.гггг';}else{echo $user['date'];}?>'>
                            <input type="submit" value="Сохранить">
                        </form>
                        
                        </form>
                    </div>
                </div>
                <div class="lk-right-part">
                    <h2>Последние заказы</h2>
                    <div class="zakazi">
                        <?php
                        $last = $conn->query("SELECT * FROM zakazinfo ORDER BY id DESC LIMIT 3;"); 
                        if($last->num_rows){
                            while($i = $last->fetch_assoc()){
                                $id_zakaza = $i['id_zakaz'];
                                $id_good = $i['id_good'];
                                
                                $goodd = $conn->query("SELECT * FROM goods WHERE id = '$id_good';");
                                $zak = $conn->query("SELECT * FROM zakazi WHERE id = '$id_zakaza';");

                                $xzak = $zak->fetch_assoc();
                                $xgood = $goodd->fetch_assoc();

                                echo '
                                <div class="zakaz">
                                    <img src="'.$xgood['img'].'" alt="">
                                    <div class="info">
                                        <div class="naz">Название: '.$xgood['name'].'</div>
                                        <div class="date">Дата покупки: '.$xzak['date'].'</div>
                                        <div class="zakaz-price">Стоимость: '.$xgood['price'] * $i['kol'].'</div>
                                    </div>
                                </div>
                                ';
                            }
                        }
                        else {
                            echo '<h2>Заказов нет</h2>';
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