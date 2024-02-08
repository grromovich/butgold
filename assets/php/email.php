<?php 
    include("connect.php");
    $email = $_GET['email'];
    $sogl = $_GET['sogl'];
    if(isset($email, $sogl)) {
        $conn->query("INSERT INTO emails (email) VALUES ('$email')");
    }
    header("Location: ../../index.php");
?>