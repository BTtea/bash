<?php
if ((!isset($_POST['name'])) || !isset($_POST['pwd'])) {
    return;
}
$dbms = 'mysql';
$dbhost = 'localhost';
$dbname = 'account';
$dbuser = 'root';
$dbpwd = 'password';
$dsn = "$dbms:host=$dbhost;dbname=$dbname";
//echo "<p>$dsn";
$db = new PDO($dsn, $dbuser, $dbpwd);
header('Content-Type: text/plain');
$username = $_POST['name'];
$statement = $db->prepare('SELECT id FROM users WHERE name = :username');
$statement->execute(array(
    ':username' => $username
));
$row = $statement->fetch(PDO::FETCH_ASSOC);
if (is_array($row)) {
    echo "您的帳號 $username 已被註冊, 請更換其他帳號";
} else {
    $statement = $db->prepare('INSERT INTO users(name, pwd) VALUES(:username, :pwd)');
    $statement->execute(array(
        ':username' => $username,
        ':pwd' => $_POST['pwd']
    ));
    echo "歡迎$username, 註冊成功\n";
    echo $row['userid'];
}
echo "\n";
echo $_POST["name"];
echo "\n";
echo $_POST["pwd"];
