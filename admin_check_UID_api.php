<?php

// 外部可以丟資料
$data = file_get_contents("php://input", "r");
// 資料不得為空值
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    // 項目必須存在且不得為空值
    if (isset($mydata["UID01"]) && $mydata["UID01"] != "") {

        $p_UID01 = $mydata["UID01"];


        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "Dreamy_Toys";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線失敗" . mysqli_connect_error());
        }

        $sql = "SELECT ID, Username, Email, UID01 FROM adm WHERE UID01 = '$p_UID01'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1){
            //驗證成功
            $mydata = array();
            while($row = mysqli_fetch_assoc($result)){
                $mydata[] = $row;
            }
            echo '{"state" : true, "data":' . json_encode($mydata) . ' ,"message": "驗證成功，可以登入"}';
        } else {
            echo '{"state" : false, "message": ""驗證失敗，不可登入' . $sql. '"}';
        }
       
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤"}';
    }
} else {
    echo '{"state": false, "message" : "未傳遞任何參數"}';
}
 mysqli_close($conn);