<?php

// 外部可以丟資料
$data = file_get_contents("php://input", "r");
// 資料不得為空值
if ($data!= "") {
    $mydata = array();
    $mydata = json_decode($data, true);
    // 項目必須存在且不得為空值
    
    if (isset($mydata["ID"]) &&  isset($mydata["Email"])  && $mydata["ID"] != "" && $mydata["Email"] != "" )  {
    
        $p_ID = $mydata["ID"];
        $p_Email =  $mydata["Email"];

        $servername = "localhost";
        $username = "owner01";
        $password = "123456";
        $dbname = "Dreamy_Toys";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線失敗". mysqli_connect_error());
        }

        // 修改的SQL語法: UPDATE 資料表(table) SET 欄位 WHERE 項目
        $sql = "UPDATE adm SET Email = '$p_Email' WHERE ID = '$p_ID'";

        if (mysqli_query($conn, $sql)) {
            // 用json呈現
            echo '{"state" : true, "message": "更新成功"}';
        } else {
            echo '{"state" : false, "message": "更新失敗'. $sql. mysqli_error($conn). '"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "傳遞參數格式錯誤"}';
    }
} else {
    echo '{"state": false, "message" : "未傳遞任何參數"}';
}
