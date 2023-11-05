<?php
    session_start();
    
    if (!isset($_SESSION['login']) || $_SESSION['login'] !== "1" || isset($_SESSION['login_error'])) {
        if (!isset($_GET['page']) || $_GET['page'] !== "login") {
            header('Location: index.php?page=login');
            exit();
        }
    }
    else if ($_SESSION['login'] === "1" && $_GET['page'] === "login"){
        header('Location: index.php?page=home');
        exit();
    }
	if (isset($_GET['page'])){
		$getpage = $_GET['page'];
		if ($getpage == 'home')
			include "home.php";
        else if ($getpage == 'maps')
            include "maps.php";
		else if($getpage == 'products')
			include "product.php";
		else if ($getpage == 'login'){
            include "login.php";
        }
		else if ($getpage == 'register')
			include "register.php";
        else if ($getpage == 'logout')
            include "logout.php";
        else if ($getpage == 'get_product')
            include "get_product.php";
        else{
            header("Location: index.php?page=home");
            exit();
        }
	}
	else{ 
        header("Location: index.php?page=home");
    }
?>