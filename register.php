<?php
require_once("db.php");
if ((!isset($_POST['name'])) || !isset($_POST['pwd'])) {
    return;
}
$userName = $_POST['name'];
$statement = $db->prepare('SELECT id FROM users WHERE name = :username');
$statement->execute(array(
    ':username' => $userName
));
$row = $statement->fetch(PDO::FETCH_ASSOC);
if (is_array($row)) {
    echo "您的帳號 $userName 已被註冊, 請更換其他帳號";
} else {
    $statement = $db->prepare('INSERT INTO users(name, pwd) VALUES(:username, :pwd)');
    $statement->execute(array(
        ':username' => $userName,
        ':pwd' => $_POST['pwd']
    ));
    echo "歡迎$userName, 註冊成功\n";
    echo $row['userid'];
}
echo "\n";
echo $_POST["name"];
echo "\n";
echo $_POST["pwd"];
