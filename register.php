<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab1-4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
        header{
            position: relative;
            left: 0px;
            top: 0px;
            background-color: #37a3fa;
            width: 105vw;
            height: 100px;
            margin: 0;
        }
        header .logo img{
            position: relative;
            width: 90px;
            height: 90px;
            left: 10px;
            top: 7px;
        }
        header .name{
            position: relative;
            text-align: center;
            top: -90px;
            font-size: 3.5vw;
            color: white;
        }
        footer{
            position: relative;
            width: 105vw;
            height: 100px;
            background-color: #37a3fa;
            bottom: 0px;
            color: white;
            font-size: 30px;
            text-align: center;
        }
        .sidebar{
            margin: 0;
            float: left;
            position: relative;
            background-color: rgb(145, 142, 142);
            width: 180px;
            height: 800px;
            padding: 6px 14px;
            z-index: 99;
        }
        .sidebar li{
            position: relative;
            top: 35px;
            margin: 8px 0;
            list-style: none;
        }
        .sidebar li a{
            display: flex;
            height: 100%;
            width: 100%;
            text-decoration: none;
            font-size: 30px;
            color: white;
        }
        .sidebar li a:hover{
            color: black;
        }
        .sidebar li link a{
            text-decoration: none;
        }
        .home_page{
            position: relative;
            background: #E4E9F7;
            min-height: 800px;
            top: 0;
            width: 105vw;
            z-index: 2;
        }
        .home_page .text{
            position: relative;
            top: 30px;
            left: 30px;
            width: 100vw;
            justify-items: center;
        }
        .home_page .text h1{
            font-size: 50px;
        }
        .home_page .text p{
            font-size: 30px;
        }
        @media (max-width:760px){
            .home_page .text p{
                display: none;
            }
        }
        @media (max-width:400px){
            header .name, .home_page .text h1{
                display: none;
            }
        }
    </style>
</head>

<body>
    <header>
        <div>
            <div class="logo"><img src="https://1.bp.blogspot.com/-t0S8GXCUUSk/WEe2fKgRfAI/AAAAAAAACzs/lV6Mxe9_mUs7XKyVB8qstvrBtl99jAJLwCLcB/s1600/543px-Logo-hcmut.svg.png" alt=""></div>
            <div class="name">Web programming lab</div>
        </div>
    </header>

    <div class="sidebar">
        <ul>
            <li>
                <a  href = "index.php?page=home">Home</a>
            </li>
            <li>
                <a href="index.php?page=products">Product</a>
            </li>
            <li>
                <a href="index.php?page=login">Login</a>
            </li>
            <li>
                <a href="index.php?page=register">Register</a>
            </li>
        </ul>
    </div>
    <div class="home_page">
        <div class="text">
            <h1>this is the register page</h1>
        </div>
    </div>
    <footer>
        <div>Name: Huỳnh Tuấn Kiệt 2052561</div>
    </footer>
</body>

</html>