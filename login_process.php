<?php
    session_start();
    
    $servername = "localhost";
	$db_username = "Kiet";
	$db_password = "123";
    $dbname = "OnlineStore";

    $conn =  mysqli_connect($servername,$db_username,$db_password,$dbname);

    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    echo $username;
    echo $password;

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $check = mysqli_query($conn, $sql);
    // echo mysqli_fetch_assoc($check)['user_password'];
    if (mysqli_num_rows($check) != 0 && password_verify($password,mysqli_fetch_assoc($check)['user_password'])){
        unset($_SESSION['login_error']);
        $_SESSION['login'] = "1";
        // session_write_close();
        if (!isset($_COOKIE["username"])){
            setcookie("username",$username,time()+60*60);
        }
        header("Location: index.php?page=home");
        exit();
    }
    else{
        $_SESSION['login_error'] = "1";
        echo $_SESSION['login_error'];
        // session_write_close();
        header("Location: index.php?page=login");
        exit();
    }
?>