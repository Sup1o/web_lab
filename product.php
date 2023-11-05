<?php
    $servername = "localhost";
	$username = "Kiet";
	$password = "123";

    $conn = new mysqli($servername,$username,$password);

    function check_insert_products($name, $price){
        global $conn;
        $name = mysqli_real_escape_string($conn, $name);
        $check = mysqli_query($conn, "SELECT * FROM Product WHERE productName = '$name'");
        if (mysqli_num_rows($check) == 0) {
            $sql = "INSERT INTO Product (productName, prices) VALUES ('$name', $price)";
            if (!mysqli_query($conn, $sql)) {
                throw new Exception(mysqli_error($conn));
            }
        }
    }
    function check_insert_users($user, $pass){
        global $conn;
        $user = mysqli_real_escape_string($conn, $user);
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $pass = mysqli_real_escape_string($conn, $pass);
        $check = mysqli_query($conn, "SELECT * FROM Users WHERE username = '$user'");
        if (mysqli_num_rows($check) == 0) {
            $sql = "INSERT INTO Users (username, user_password) VALUES ('$user', '$pass')";
            if (!mysqli_query($conn, $sql)) {
                throw new Exception(mysqli_error($conn));
            }
        }
    }
    


    if ($conn->connect_error){
		die("connection failed: " . $conn->connect_error);
	}

    $sql = "CREATE DATABASE IF NOT EXISTS OnlineStore";
    if (!mysqli_query($conn, $sql)) {
      throw new Exception(mysqli_error($conn));
    }

    $conn->select_db("OnlineStore");

    $sql = "CREATE TABLE IF NOT EXISTS Product(
        productID INT(9) AUTO_INCREMENT PRIMARY KEY,
        productName VARCHAR(255) NOT NULL UNIQUE,
        prices FLOAT NOT NULL
    )";
    if (!mysqli_query($conn, $sql)) {
      throw new Exception(mysqli_error($conn));
    }


    $sql = "CREATE TABLE IF NOT EXISTS Users(
        username VARCHAR(255) NOT NULL PRIMARY KEY,
        user_password VARCHAR(255) NOT NULL
    )";
    if (!mysqli_query($conn, $sql)) {
      throw new Exception(mysqli_error($conn));
    }

    check_insert_products('giay',100000);
    check_insert_products('ao',300000);
    check_insert_products('quan',300000);
    

    check_insert_users('Admin@email.com','123');
    check_insert_users('Admin2@email.com','456');
?>
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
            overflow-x: hidden;
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
            height: 50px;
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
            height: 100vh;
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
            height: 100vh;
            top: 0;
            width: 105vw;
            z-index: 2;
        }
        .home_page .text{
            position: relative;
            width: calc(100vw-108px);
            height: 800px;
        }
        .home_page .text .container{
            position: relative;
            left: 0px;
            top: 50px;
        }
        .home_page .text .container h1{
            position: relative;
            font-size: 50px;
        }
        .home_page .text .container p{
            font-size: 30px;
        }
        .home_page .text .table-container{
            position: relative;
            width: calc(100vw-108px);
            justify-content: center;
            display: flex;
            top: 17.5%;
            max-height: 60%;
            overflow-y: scroll;
        }
        .home_page .text .table-container::-webkit-scrollbar{
            display: none;
        }
        .home_page .text .table-container table {
            position: relative;
            border-collapse: collapse;
            width: 70%;
            padding: 20px 60px;
        }
        .home_page .text .search {
            position:relative;
            width: calc(100vw-108px);
            top: 12.5%;
            justify-content: center;
            display: flex;
        }
        .home_page .text .search input{
            position:relative;
            width: 45%;
            height: 40px;
            padding: 0 25px 0 25px;
            border-radius: 15px;
        }
        th, td {
          border: 1px solid #ddd;
          text-align: left;
          padding: 8px;
        }
        td{
            height: 10rem;
        }
        th {
          background-color: #f2f2f2;
        }

        tr:nth-child(even) {
          background-color: #f2f2f2;
        }
        .home_page .text a{
            position: relative;
            top: 20%;
            left: 13%;
            padding: 0% 1%;
            text-decoration: none;
            /* margin-left: 60%; */
            color:red;
        }
        tr:hover {
          background-color: #ddd;
        }

        @media (max-width:760px){
            .home_page .text table{
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
                <a href="index.php?page=maps">Maps</a>
            </li>
            <li>
                <a href="index.php?page=logout">Logout</a>
            </li>
        </ul>
    </div>
    <div class="home_page">
        <div class="text">
            <?php
                if(isset($_GET['id'])){
                    $sql = " SELECT * FROM Product WHERE productID =" .$_GET['id'];
                    if (!mysqli_query($conn, $sql)) {
                      throw new Exception(mysqli_error($conn));
                    }
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    if ($result === null || !$row){
                        echo "<div class=\"container\">";
                        echo "<h1>Product not found</h1>";
                        echo "</div>";
                    }
                    else{
                        
                        echo "<div class=\"container\">";
                        echo "<h1> Product: ". $row['productName']." - ID: ".$row['productID']."</h1>";
                        echo "<p> Gia: ". $row['prices']." dong</p>";
                        echo "</div>";
                    }
                }
                else{
            ?>
            <div class="search">
                <input type="text" id="SearchInput" placeholder="search for products" value="">
                
            </div>
            <div class="table-container" onscroll="loadTableData()">
                <table>
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody id="TableBody">
                        

                    </tbody>
                </table>
            </div>
            <?php
                $servername = "localhost";
                $username = "Kiet";
                $password = "123";

                $conn = new mysqli($servername,$username,$password);
                $conn->select_db("OnlineStore");
                if (isset($_GET['name'])){
                    $name = $_GET['name'];
                    // $name = mysqli_real_escape_string($conn, $name);
                    $sql = "SELECT * FROM Product WHERE productName LIKE '$name%'";
                }
                else{
                    $sql = " SELECT * FROM Product";
                }
                $records_per_page = 10;
                $res =mysqli_query($conn, $sql);
                $total_records = mysqli_num_rows($res);
                $page = ceil($total_records/$records_per_page);
                // echo $page;
                $slide = isset($_GET["slide"])? $_GET["slide"] : 1;
                for ($i=1; $i <= $page; $i++) { 
                    if ($i == $slide){
                        echo "<a style=\"color:blue;\" href=\"index.php?page=products&slide=".$i."\">".$i."</a>";
                    }
                    else
                        echo "<a href=\"index.php?page=products&slide=".$i."\">".$i."</a>";
                }
                }

                
            ?>
            
        </div>
    </div>
    <footer>
        <div>Name: Huỳnh Tuấn Kiệt 2052561</div>
    </footer>
    <script>
        const TableBody = document.getElementById("TableBody");
        const SearchInput = document.getElementById("SearchInput");
        function LoadTable(){
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    TableBody.innerHTML = this.responseText;
                    addRowListeners();
                }
            };

            let url = "index.php?page=get_product";
            let slide = '<?php echo isset($_GET["slide"]) ? $_GET["slide"] : "" ?>';
            
            if (slide !== "") {
                url += "&slide=" + slide;
            }
            xhttp.open("GET", url,true);
            xhttp.send();
           
        }
        function up() {
            const xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    TableBody.innerHTML = this.responseText;
                    addRowListeners();
                }
            };
            if (SearchInput.value === ''){
                LoadTable();
            }
            else{
                xhttp.open("GET", "index.php?page=get_product&name=" + SearchInput.value, true);
                xhttp.send();
            }

        }
        function addRowListeners() {
          const rows = document.querySelectorAll("#TableBody tr");
          rows.forEach(row => {
            row.addEventListener("click", () => {
              const id = row.cells[0].textContent;
              window.location.href = `index.php?page=products&id=${id}`;
            });
          });
        }
        let page = 1; // initial page number
        const numPerPage = 10; // number of items to load per page

        function loadTableData() {
            
        }
        SearchInput.addEventListener("keyup",up); 
        LoadTable();
    </script>

</body>

</html>