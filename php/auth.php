<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    setcookie('user', '', time() - 86400, "/" );

    $mysql = new mysqli('eporqep6b4b8ql12.chr7pe7iynqr.eu-west-1.rds.amazonaws.com', 'euu7bk3xyma0vpnw', 'y86jquk4ya29ia69', 'q2es9sphx9i4qtq9');

    $result = $mysql->query("SELECT * FROM `Participants` WHERE (Login = '$login') AND (Password = '$pass')");
    $user = $result->fetch_assoc();

    if(count($user) == 0) {
        setcookie('user', 'Вход не выполнен', time() + 86400, "/");
        header('Location: /');
        exit();
    }

    setcookie('user', $user['Login'], time() + 86400, "/");
    setcookie('rules', $user['Rules'], time() + 86400, "/");

    switch ($user['Rules']) {
        case 4:
            header('Location: /mainpage.php');
            break;
        case 1:
            header('Location: /modpanel.php');
            break;
        case 2:
            header('Location: /adminpanel.php');
            break;
    }
?>