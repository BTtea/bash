<html lang="zh_Hant_TW" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="/style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<form method="post">
    帳號:&nbsp;
    <input type="text" name="name" value=
        <?php
        if (isset($_COOKIE['username'])) {
            echo $_COOKIE['username'];
        }
        ?>
    >
    <br>
    密碼:&nbsp;
    <input type="password" name="pwd" value=
        <?php
        if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
            echo $_COOKIE['password'];
        }
        ?>
    >
    <br/>
    <input type="checkbox" name="remember" checked=
    <?php
    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        echo 'checked';
    }
    ?>
    >記住密碼</input>

    <p/>
    <button type="submit" formaction='register.php'>註冊</button>
    <button type="submit" formaction='login.php'>登入</button>
</form>
</body>
</html>