<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/autoloader.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/error.inc.php';
$url = new Url();
$BASE_URL = $url->BASE_URL;


if (isset($_POST["email"]) && isset($_POST["password"])){
    $adm = new Admin();
    $adm->LoginAdmin($_POST["email"], $_POST["password"]);
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $BASE_URL;?> /lib/bootstrap-4.6.2/css/bootstrap.min.css">
    <title>Login</title>
    <style>
        body{
            background: #2a323c;
        }
        .container{
            height: 100vh;
            width: 100%;

        }
        .container .box{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;

        }
        .container form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: max-content;
            background: #323c48;
            padding: 50px;
            border-radius: 5px;
        }
        .container h1{
            color: white;
        }
        .container form input{
            background: rgba(255,255,255, 1);
            border: 2px solid rgba(255,255,255, .7);
            margin-top: 10px;
            border-radius: 5px;
            padding: 10px;
        }
        input[type=submit]{
            background: #04a2b3 !important;
            border: none;
            color: white;
            text-decoration: none;
            width: 90%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <form action="login.php" method="post">
                <h1>Admin Login</h1>
                <input type="email" name="email" id="" placeholder="email">
                <input type="password" name="password" placeholder="password">
                <input type="submit">
            </form>
        </div>
    </div>
</body>
</html>
