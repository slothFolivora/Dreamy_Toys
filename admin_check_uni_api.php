<?php

// 外部可以丟資料
$data = file_get_contents("php://input", "r");
// 資料不得為空值
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    // 項目必須存在且不得為空值
    if (isset($mydata["Username"]) && $mydata["Username"] != "") {

        $p_username = $mydata["Username"];


        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "Dreamy_Toys";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線失敗" . mysqli_connect_error());
        }

        $sql = "SELECT Username FROM adm WHERE Username = '$p_username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result)==0) {
            // 用json呈現
            echo '{"state" : true, "message": "帳號不存在，可以使用"}';
        } else {
            echo '{"state" : false, "message": "帳號已存在，無法使用' . $sql . mysqli_error($conn) . '"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤"}';
    }
} else {
    echo '{"state": false, "message" : "未傳遞任何參數"}';
}
