<?php
    session_start();
    
    $conn = mysqli_connect("localhost","root","","assignment1");
    //$link = mysqli_connect("aa4xf37s2fw51e.cs0uliqvpua0.us-east-1.rds.amazonaws.com","uts","internet","uts");
    if (!$conn)
        die("Could not connect to Server");
    
        if (isset($_GET['category2'])) {
            $category2 = $_GET['category2'];
            $sql = "SELECT * FROM products WHERE category2 LIKE '%$category2%'";
        } else if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $sql = "SELECT * FROM products WHERE product_name LIKE '%$search%'";
        } else if (isset($_GET['category1'])){
            $category1 = $_GET['category1'];
            $sql = "SELECT * FROM products WHERE category1 LIKE '%$category1%'";
        } else{
            $sql = "SELECT * FROM products";
        }
          

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        print "<div class = 'table'>";

        while ($row = $result->fetch_assoc()) {
            print "<div class='item'>";
            echo "<h3 id='name_" . $row["product_id"] . "'>" . $row["product_name"] . "</h3>";
            echo "<img src='" . $row["url"] . "' style='max-width:100%; max-height:200px;' />";
            echo "<p id='price_" . $row["product_id"] . "'>$" . $row["unit_price"] . "</p>";
            echo "<p id='unit_" . $row["product_id"] . "'>Unit:" . $row["unit_quantity"] . "</p>";
            print "<p>Quantity: <input type='number' id='quantity_" . $row["product_id"] . "' value='1' min='1' style='width:50px;' /></p>";
            if($row["unit_price"] > 0 ){
                print "<p>In stock</p>";
            }else{
                print "<p>" . "no stock" . "</p>";
            }
            print "<button class='button-68' onclick='addToCart(" . $row["product_id"] . ")'>Add to Cart</button>";
            echo "</div>";
        }
    }
    mysqli_close($conn);
?>