<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old But Gold</title>
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/svaz.css">
    <link rel="stylesheet" href="assets/css/vhod.css">
</head>
<body>
    <?php include("assets/php/header.php");?>
    <main>
        <div class="main__container">
            <div class="parts">
                <div class="left-part">
                    <h1>Вход</h1>
                    <form action="" method="POST" class="main-form">
                        <div class="enter-inputs">
                            <label for="email">Почта</label>
                            <input type="email" name="email1" id="email" placeholder="Email" class="input-form" required>
                            <label for="pass">Пароль</label>
                            <input type="password" name="password" id="pass" placeholder="Пароль" class="input-form" required>
                        </div>
                        <div class="error"><?echo $error;?></div>
                        <input type="submit" value="Войти" class="btn-form-sbmt">
                    </form>
                </div>
                <hr>
                <div class="right-part">
                    <h1>Создать аккаунт</h1>
                    <p>Экономьте время при оформлении заказа, <br>
                        просматривайте свою корзину для покупок и <br>
                        сохраненные товары с любого устройства и <br>
                        получайте доступ к истории ваших заказов.
                    </p>
                    <button class="btn-form-sbmt"  onclick="window.location.assign('reg.php')">Зарегистрироваться</button>
                </div>
            </div>
        </div>
    </main>
    <?php 
        include("assets/php/connect.php");
        session_start();

        $email = $_POST['email1'];
        $password = $_POST['password'];
        
        if(isset($email, $password)) {
            $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
            if($result->num_rows){
                $row = $result->fetch_assoc();
                if(password_verify($password, $row['password'])){
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['name'] + ' ' + $row['lastname'] + ' ' + $row['lastlastname'];
                    header("Location: /index.php");
                }
                else {
                    $error="Ошибка авторизации";
                }
            }
            else {
                $error="Ошибка авторизации";
            }
        }
    ?>
    <?php include("assets/php/footer.php");?>
</body>
</html>
