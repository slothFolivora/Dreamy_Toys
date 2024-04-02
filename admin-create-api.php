<?php

// 外部可以丟資料
$data = file_get_contents("php://input", "r");
// 資料不得為空值
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    // 項目必須存在且不得為空值
    if (isset($mydata["Username"]) && isset($mydata["Password"]) && isset($mydata["Email"])  && $mydata["Username"] != "" && $mydata["Password"] != "" && $mydata["Email"] != "" ) {

        $Username = $mydata["Username"];
        // 密碼加密
        $Password = password_hash($mydata["Password"], PASSWORD_DEFAULT);
        $Email =  $mydata["Email"];
      
      

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "Dreamy_Toys";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線失敗" . mysqli_connect_error());
        }

        $sql = "INSERT INTO adm(Username, Password, Email) VALUES ('$Username','$Password','$Email')";

    

        if (mysqli_query($conn, $sql)) {
            // 用json呈現
            echo '{"state" : true, "message": "管理員註冊成功"}';
        } else {
            echo '{"state" : false, "message": "管理員註冊失敗' . $sql . mysqli_error($conn) . '"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤"}';
    }
} else {
    echo '{"state": false, "message" : "未傳遞任何參數"}';
}
