<?php
// {"state" : true, "data": "所有會員資料(密碼除外)", "message" : "讀取成功!"}
// {"state" : false, "message" : "讀取失敗!"}

$data = file_get_contents("php://input", "r");
$servername = "localhost";
$username = "owner01";
$password = "123456";
$dbname = "Dreamy_Toys";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("連線失敗" . mysqli_connect_error());
}

$sql = "SELECT * FROM member ORDER BY ID DESC";//descending"，意思是降序。ASC"，代表 "ascending"，意思是升序。
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $mydata = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $mydata[] = $row;
    }
    echo '{"state" : true, "data": ' . json_encode($mydata) . ', "message" : "讀取成功!"}';
} else {
    echo '{"state" : false, "message" : "讀取失敗!"}';
}
mysqli_close($conn);
