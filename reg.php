<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old But Gold</title>
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/reg.css">
</head>
<body>
<?php include("assets/php/header.php");?>
<?php 
    include("assets/php/connect.php");
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $sogl = $_POST['sogl'];

    if(isset($sogl, $email, $password, $password2)) {
        $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
        if($result->num_rows){
            $error = "Такой аккаунт уже есть";
            die();
        }
        if($password == $password2){
            $row = $result->fetch_assoc();
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'] + ' ' + $row['lastname'] + ' ' + $row['lastlastname'];
            $_SESSION['email'] = $row['email'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $result = $conn->query("INSERT INTO users (email, password) VALUES ('$email','$password')");
            header("Location: /index.php");
        }
        else {
            $error = "Пароли не совпадают";
        }
    }
    
    
?>
    <main>
        <div class="main__container">
            <div class="parts">
                <div class="left-part">
                    <h1>Регистрация</h1>
                    <form action="reg.php" method="POST" class="main-form">
                        <label for="email">Почта</label>
                        <input type="email" name="email" id="email" placeholder="Email" class="input-form" required>
                        <label for="pass">Пароль</label>
                        <input type="password" name="password" id="pass" placeholder="Пароль" class="input-form" required>
                        <label for="pass2">Повторите пароль</label>
                        <input type="password" name="password2" id="pass2" placeholder="Повторите пароль" class="input-form" required>
                        <div class="checkbox">
                            <input type="checkbox" name="sogl" id="sogl" value="yes">
                            <label for="sogl">Соглашаюсь с условиями политики конфиденциальности </label>
                        </div>
                        <div class="error"></div>
                        <input type="submit" value="Зарегистрироваться" class="btn-form-sbmt">
                    </form>
                </div>
                <hr>
                <div class="right-part"></div>
            </div>
        </div>
    </main>
    <?php include("assets/php/footer.php");?>
</body>
</html>