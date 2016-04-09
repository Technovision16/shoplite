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
$qq="Hello";
    
    if($bd->query($query));
    

        // Array with names
        $a =array("101"=>75, "102"=>95, "103"=>177, "104"=>45,"105"=>55, "106"=>30, "107"=>51, "108"=>49, "109"=>57, "110"=>84, "111"=>91, "112"=>222, "113"=>589, "114"=>999, "115"=>199, "116"=>201, "117"=>11);

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
            $query="INSERT INTO shop VALUES(null,'$start','$qq','$hint')";
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