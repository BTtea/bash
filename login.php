<?php
require_once('db.php');
$userName = $_POST['name'];
$userPwd = $_POST['pwd'];
$statement = $db->prepare('SELECT pwd FROM users WHERE name = :username');
$statement->execute(array(
    ':username' => $userName,
));
$row = $statement->fetch(PDO::FETCH_ASSOC);
if (is_array($row)) {
    $statement = $db->prepare('SELECT id FROM users WHERE pwd = :pwd');
    $statement->execute(array(':pwd' => $userPwd));
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if (is_array($row)) {
        session_start();
        $_SESSION['loggedIn'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $userName;
        echo "登入成功, 歡迎$userName";
        if($_POST['remember'] == 'on'){
            setcookie('username', $userName, time()+60*60*24*365);
            setcookie('password', $userPwd, time()+60*60*24*365);
        }
        echo "<p/><a href='logout.php'>登出</a>";
    } else {
        alert('密碼錯誤, 請重新輸入');
    }
} else {
    alert('該帳號尚未註冊, 請重新輸入');
}

function alert($msg)
{
    echo "<script>alert('$msg');
     window.location.href='index.php';
    </script>";
    return false;
}