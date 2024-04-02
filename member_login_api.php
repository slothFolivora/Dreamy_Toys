<?php
//input: {"Username":"xxx", "Password":"xxxxxx"}
// {"state" : true, "data": "登入後的帳號資料(密碼除外)", "message" : "登入成功!"}
// {"state" : false, "message" : "登入失敗!"}
// {"state" : false, "message" : "傳遞參數格式錯誤!"}
// {"state" : false, "message" : "未傳遞任何參數!"}

$data = file_get_contents("php://input", "r");
if ($data != "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    if (isset($mydata["Username"]) && isset($mydata["Password"]) && $mydata["Username"] != "" && $mydata["Password"] != "") {
        $p_Username = $mydata["Username"];
        $p_Password = $mydata["Password"];


        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "Dreamy_Toys";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線失敗" . mysqli_connect_error());
        }

        $sql = "SELECT Username, Password, Email FROM member WHERE Username = '$p_Username'";
        $result = mysqli_query($conn, $sql);

        //用於檢查 MySQL 查詢結果中行數的條件式。這通常用於確保查詢返回的結果只有一行
        if (mysqli_num_rows($result) == 1) {
            //確認帳號符合, 密碼不確定
            $row = mysqli_fetch_assoc($result);
            if (password_verify($p_Password, $row["Password"])) {//如果密碼比對正確, 撈取不包含密碼的使用者資料

                
                $uid = substr(hash("sha256", uniqid(time())), 0, 8);//產生uid
                
                $sql = "UPDATE member SET UID01 = '$uid' WHERE Username = '$p_Username'";//更新uid至資料庫

                if (mysqli_query($conn, $sql)) {//如果連接資料庫成功
                    $sql = "SELECT Username, Email, UID01 FROM member WHERE Username = '$p_Username'"; //因為資料庫的password已經變成亂碼，所以抓Username和Email(不抓password)
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $mydata = array();
                    $mydata[] = $row;

                    echo '{"state" : true, "data": ' . json_encode($mydata) . ', "message" : "登入成功!"}';
                } else {
                    //uid更新錯誤
                    echo '{"state" : false, "message" : "登入失敗01, uid更新錯誤"}';
                }
            } else {
                //密碼比對錯誤
                echo '{"state" : false, "message" : "登入失敗02"}';
            }
        } else {
            //確認帳號不符合, 登入失敗
            echo '{"state" : false, "message" : "登入失敗03"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
    }
} else {
    echo '{"state" : false, "message" : "未傳遞任何參數!"}';
}
