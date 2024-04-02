<?php

$servername = "localhost";
$username = "owner01";
$password = "123456";
$dbname = "Dreamy_Toys";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("連線失敗" . mysqli_connect_error());
}

$sql = "SELECT  * FROM adm ORDER BY ID DESC ";
$result = mysqli_query($conn, $sql);
$mydata = array();
if(mysqli_num_rows($result)>0){
    while($rows = mysqli_fetch_assoc($result)){
        $mydata[]=$rows;
    }
    echo'{"state" : true, "data":'.json_encode($mydata).', "message": "讀取成功"}';
}else{
    echo'{"state" : false, "message": "讀取失敗"}';
}

mysqli_close($conn);
