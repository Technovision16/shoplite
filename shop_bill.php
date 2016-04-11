<?php
session_start();
$shop_id="REE103R";
$id=substr($shop_id, 0,3);
include 'database.php';
$bd = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query="SELECT idd, SUM(price) FROM shop where p_code LIKE '%___$id%' GROUP BY idd";
$result=$bd->query($query);




?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shop Account</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/script.js"></script>
    <style type="text/css">
    </style>

</head>
<body>
 <!--    <div class="modal" id="#myModal">
        <div class="inner">
            <h2>Do you want to confirm the order</h2>
            <p><strong>Note : </strong>The order will be non-cancellable after this step.</p>
            <button>Submit</button>
        </div>

    </div>  -->
    <div class="navbar">
        <a href="">ShopLite <strong>/ Customers List</strong> </a>
    </div>
    <div class="container">
         <?php
             $count=$result->num_rows;
            while($count!=0)
            {
            $row=$result->fetch_assoc();
             $idd=$row['idd'];
             $query="SELECT * FROM register where id='$idd'";
             $res=$bd->query($query);
             $ro=$res->fetch_assoc();
    
        ?>
        <div class="card" id="card1">  <!-- Requires ID -->
            <h3>Customer Id -<strong><?php echo $ro['customer_id']; ?></strong></h3>
            <p><strong>Customer Name-&nbsp;</strong><?php echo $ro['name']; ?></p>
            <p><strong>Phone No-&nbsp;</strong><?php echo $ro['mob']; ?></p>
            <div id="total" style="border-top :2px solid darkgreen; ">
                <h2>Total Bill : Rs. <?php echo $row['SUM(price)']; ?></h2>
                <h2 id="tot"></h2>
            </div>

        </div>
                    <?php
$count=$count-1;
}
?>
        <form action="">
            <input type="hidden" id="counter">
            <input type="submit" id="submit_btn" value="Print " name="submit" onclick="send_count();showModal();">
        </form>
    </div>
</body>
</html>