<?php 
    include("connect.php");
    $fullname = $_GET['fullname'];
    $comment = htmlspecialchars($_GET['comment']);
    $phone = htmlspecialchars($_GET['phone']);
    $email = $_GET['email'];
    $sogl = $_GET['sogl'];

    if(isset($sogl)) {
        $conn->query("INSERT INTO svaz (name, comment, phone, email) VALUES ('$fullname','$comment','$phone','$email')");
        header("Location: ../../index.php");
    }
    
    
?>