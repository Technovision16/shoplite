<?php
session_start();
$_SESSION['start']=1;
$start=$_SESSION['start'];
include 'database.php';
$bd = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query="SELECT * FROM shop where idd='$start'";
$result=$bd->query($query);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Account</title>
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
        <a href="">ShopLite <strong>/ INVOICE</strong> </a>
    </div>
    <div class="container">
        
        <div class="card" id="card1">  <!-- Requires ID -->
            <h3>Customer Id -<strong>ANK8447JA08</strong></h3>
            <p><strong>Customer Name-&nbsp;</strong>Ankit Jain</p>
            <p><strong>Phone No-&nbsp;</strong>8447269408</p>
           
            <div id="total" style="border-top :2px solid darkgreen; ">
                <table cellspacing="10">
                    <tr><th>Product Id</th>
                        <th>Price</th>
                    </tr>
                     <?php
        $count=$result->num_rows;
        while($count!=0)
        {
        $row=$result->fetch_assoc();
    
        ?>
                    
                    <tr>
                        <th><?php echo $row['p_code']; ?></th>
                        <th><?php echo $row['price']; ?></th>
                    </tr>
                    <?php
$count=$count-1;
}
?>


                </table>    
                <?php
                
                $query="SELECT SUM(price) FROM shop WHERE idd='$start'";
                $res=$bd->query($query);
                $ro=$res->fetch_assoc();
                //var_dump($ro);
                $price=$ro['SUM(price)'];

                ?>
                <h2>Total Bill : Rs. <?php echo $price; ?></h2>
                <h2 id="tot"></h2>
            </div>

        </div>
        <form action="">
            <input type="hidden" id="counter">
            <input type="submit" id="submit_btn" value="Done Shopping" name="submit" onclick="send_count();showModal();">
        </form>


    </div>
</body>
</html>
