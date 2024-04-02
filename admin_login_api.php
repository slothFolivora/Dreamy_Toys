<?php

// 外部可以丟資料
$data = file_get_contents("php://input", "r");
// 資料不得為空值
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    // 項目必須存在且不得為空值
    if (isset($mydata["Username"]) && isset($mydata["Password"]) && $mydata["Username"] != "" && $mydata["Password"] != "") {

        $p_Username = $mydata["Username"];
        // 密碼加密
        // $Password = password_hash($mydata["Password"], PASSWORD_DEFAULT);
        $p_Password = $mydata["Password"];

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "Dreamy_Toys";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線失敗" . mysqli_connect_error());
        }

        $sql = "SELECT  Username, Password ,Email FROM adm WHERE Username = '$p_Username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            // 確認帳號符合，密碼不確定
            $row = mysqli_fetch_assoc($result);
            if (password_verify($p_Password, $row["Password"])) {

                // 密碼比對正確，撈取不包含密碼的使用者資料並產生uid
                $uid =  substr(hash("sha256", uniqid(time())), 0, 8);
                // 更新uid至資料庫
                $sql = "UPDATE adm SET UID01 = '$uid' WHERE Username = '$p_Username'";
                if (mysqli_query($conn, $sql)) {
                    $sql = "SELECT  Username , Email, UID01 FROM adm WHERE Username = '$p_Username'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $mydata = array();
                    // 只有一筆，其實可以不用加[]或不用寫
                    $mydata[] = $row;

                    echo '{"state" : true, "data":' . json_encode($mydata) . ', "message": "登入成功"}';
                } else {
                    // uid更新錯誤
                    echo '{"state" : false, "message": "登入失敗，UID更新錯誤"}';
                }
            } else {
                // 密碼比對錯誤
                echo '{"state" : false, "message": "登入失敗密碼比對錯誤"}';
            }
        } else {
            // 確認帳號不符合，登入失敗
            echo '{"state" : false, "message": "確認帳號不符合登入失敗"}';
        }
      
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤"}';
    }
} else {
    echo '{"state": false, "message" : "未傳遞任何參數"}';
}
  mysqli_close($conn);