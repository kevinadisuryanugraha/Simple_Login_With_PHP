<?php
session_start();

$username = 'kevin';
$password = '12345';

if (isset($_SESSION['sudah_login']) && $_SESSION['sudah_login'] == TRUE) {
    header('Location: dashboard.php');
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $ambil_username = $_POST['username'];
    $ambil_password = $_POST['password'];

    if ($ambil_username == $username && $ambil_password == $password) {
        $_SESSION['sudah_login'] = TRUE;
        header('Location: dashboard.php');

    }else {
        echo 'Username atau password salah';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba Cookie</title>
    <style>
        .container {
            left:50%;
            top:50%;
            position:absolute;
            transform: translate(-50%, -50%);
            padding: 30px;
            background-color: red;
            border-radius: 10px;
        }

        .container .form {
            height: 200px;
        }

        .container .form h1 {
            font-family: sans-serif;
            color:white;
        }

        .container .form input {
            margin-bottom: 10px;
            height: 40px;
            width: 300px;
        }

        .container .form .button {
            width: 200px;
        }


    </style>
</head>
<body>
    <center>
    <div class="container">
        <form class="form" method="POST" action="">
            <h1>Selamat datang silahkan login</h1>
            <input type="text" name="username" placeholder="Username" required> <br>
            <input type="text" name="password" placeholder="Password" required> <br>
            <input class="button" type="submit" value = "submit">
        </form>
    </div>
    </center>
</body>
</html>
