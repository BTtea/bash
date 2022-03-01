<?php
require_once('db.php');
$userName = $_POST['name'];
$userPwd = $_POST['pwd'];
$statement = $db->prepare('SELECT id FROM users WHERE name = :username AND pwd = :pwd');
$statement->execute(array(
    ':username' => $userName,
    ':pwd' => $userPwd
));
$row = $statement->fetch(PDO::FETCH_ASSOC);
if (is_array($row)) {
    echo "登入成功, 歡迎$userName";
}else{
    alert('帳號或密碼錯誤, 請重新輸入');
}

function alert($msg){
    echo "<script>alert('$msg');
     window.location.href='index.html';
    </script>";
    return false;
}