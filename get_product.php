<?php
    $servername = "localhost";
	$username = "Kiet";
	$password = "123";

    $conn = new mysqli($servername,$username,$password);
    $conn->select_db("OnlineStore");
    $num_per_page = 10;
    
    $page = isset($_GET["slide"]) ? $_GET["slide"] : 1;
    $start = ($page - 1) * $num_per_page;
    
    if (isset($_GET['name'])){
        $name = $_GET['name'];
        // $name = mysqli_real_escape_string($conn, $name);
        $sql = "SELECT * FROM Product WHERE productName LIKE '$name%' LIMIT $start,$num_per_page";
    }
    else{
        $sql = "SELECT * FROM Product LIMIT $start,$num_per_page";
    }
    
    if (!mysqli_query($conn, $sql)) {
      throw new Exception(mysqli_error($conn));
    }
    $result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_assoc($result)){
        if ($row === NULL)
            continue;
        echo "<tr>";
        echo "<td>" . $row['productID'] . "</td>";
        echo "<td>" . $row['productName'] . "</td>";
        echo "<td>" . $row['prices'] . "</td>";
        echo "</tr>";
    }
?>