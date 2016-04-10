<?php
session_start();
$_SESSION['start']=1;
if(isset($_SESSION['start']))
{
    $start=$_SESSION['start'];
    include 'database.php';
    $bd = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $query="CREATE TABLE IF NOT EXISTS shop (
    id int primary key auto_increment not null,
    idd int not null,
    p_code varchar(255) not null,
    price int not null
    ) ENGINE=INNODB;";
    
    if($bd->query($query));
    

        // Array with names
        $a =array("101ADI"=>75, "102REE"=>95, "103PEN"=>177, "104ADI"=>45,"105PEN"=>55, "106REE"=>30, "107ADI"=>51, "108ADI"=>49, "109REE"=>57, "110REE"=>84, "111PEN"=>91, "112REE"=>222, "113ADI"=>589, "114PEN"=>999, "115ADI"=>199, "116REE"=>201, "117ADI"=>11);

        // get the q parameter from URL
        $q = $_REQUEST["q"];

        $hint = "";

        // lookup all hints from array if $q is different from "" 
        if ($q !== "")
        {
            foreach($a as $name=>$value) {
                if ($q==$name) {
                        $hint =$value;

                }
            }
        }
        // Output "no suggestion" if no hint was found or output correct values 
        if($hint=="")
            echo "No suggestion";
        else
        {
            $query="INSERT INTO shop VALUES(null,'$start','$q','$hint')";
            if($bd->query($query))
            {
                echo $hint;
            }
        // Output "no suggestion" if no hint was found or output correct values 
        }
}

else
{
    echo "Please Log In";
}
    

?>