<?php
session_start();
include 'database.php';
$bd = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query="SELECT * FROM shop_reg";
$result=$bd->query($query);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mall Account</title>
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
        <a href="">ShopLite <strong>/ Payments</strong> </a>
    </div>
    <div class="container">
        <?php
             $count=$result->num_rows;
            while($count!=0)
            {
            $row=$result->fetch_assoc();
            $shop_id=$row['shop_id'];
            $id=substr($shop_id,0,3);

    
        ?>
        <div class="card" id="card1">  <!-- Requires ID -->
            <h3>Shop Id -<strong><?php echo $row['shop_id']; ?></strong></h3>
            <p><strong>Shop Name-&nbsp;</strong><?php echo $row['name']; ?></p>
            <div id="total" style="border-top :2px solid darkgreen; ">
                <?php
                $query="SELECT SUM(price) FROM shop WHERE p_code LIKE '%___$id%'";
                $res=$bd->query($query);
                $ro=$res->fetch_assoc();
                ?>

                <h2>Total Purchases : Rs. <?php echo $ro['SUM(price)']; ?></h2>
                <h2 id="tot"></h2>
            </div>

        </div>
        <?php
        $count=$count-1;
    }
    ?>
       
        <form action="">
            <input type="hidden" id="counter">
            <input type="submit" id="submit_btn" value="Pay Transactions" name="submit" onclick="send_count();showModal();">
        </form>
    </div>
</body>
</h