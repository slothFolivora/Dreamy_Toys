<?php
    //input: {"Username":"xxx", "Password":"xxx", "Email":"xxx"}
    // $data = '{"Username":"xxx", "Password":"xxx", "Email":"xxx"}';

    $data = file_get_contents("php://input", "r");
    /*
    "r" 是用來指定檔案模式（file mode）的一個選項。在這個情境下，"r" 代表讀取（read）模式。
    "php://input" 是一個可以用來存取請求主體內容的資源，通常在處理 POST 請求時使用。
    */
    if($data != ""){
        $mydata = array();
        $mydata = json_decode($data, true);
        if(isset($mydata["Username"]) && isset($mydata["Password"]) && isset($mydata["Email"]) 
        && $mydata["Username"] != "" && $mydata["Password"] != "" && $mydata["Email"] != ""){
            $p_Username = $mydata["Username"];
            //密碼加密PASSWORD_DEFAULT
            $p_Password = password_hash($mydata["Password"], PASSWORD_DEFAULT);
            // $p_Password = $mydata["Password"];
            $p_Email = $mydata["Email"];

            $servername = "localhost";
            $username = "owner01";
            $password = "123456";
            $dbname = "Dreamy_Toys";

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if(!$conn){
                die("連線失敗".mysqli_connect_error());
            }

            $sql = "INSERT INTO member(Username, Password, Email, UID01) VALUES('$p_Username', '$p_Password', '$p_Email', '')";
            if(mysqli_query($conn, $sql)){
                //新增成功
                echo '{"state" : true, "message" : "註冊成功!"}';
            }else{
                //新增失敗
                echo '{"state" : false, "message" : "註冊失敗!"}';
            }
            mysqli_close($conn);
        }else{
            echo '{"state" : false, "message" : "傳遞參數格式錯誤!"}';
        }
    }else{
        echo '{"state" : false, "message" : "未傳遞任何參數!"}';
    }
?>