<?php
session_start();
if (!isset($_SESSION['sudah_login']) || $_SESSION['sudah_login'] != TRUE) {
    header('Location: login.php');
    exit();
}

$nama_file = 'database_1.txt';

// Jika form disubmit
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    
    // Baca data yang sudah ada
    $data_nama = file_exists($nama_file) ? unserialize(file_get_contents($nama_file)) : array();
    
    // Tambahkan nama baru
    $data_nama[] = $nama;
    
    // Simpan kembali ke file
    file_put_contents($nama_file, serialize($data_nama));
}

// Baca data untuk ditampilkan
$data_nama = file_exists($nama_file) ? unserialize(file_get_contents($nama_file)) : array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .card {
            background-color: red;
            border-radius: 20px;
            left: 50%;
            top: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
            padding: 20px;
        }

        .card form {
            text-align: center;
            margin-bottom: 20px;
        }

        .card form h1 {
            font-family: sans-serif;
            color: white;
        }

        .card form #username {
            height: 40px;
            width: 300px;
            font-size: 16px;
            text-align: center;
            border-radius: 10px;
            border: 1px solid yellow;
        }

        input:focus {
            outline: none;
        }

        .card form #submit {
            height: 40px;
            width: 150px;
            margin-top: 20px;
            cursor: pointer;
            background-color: purple;
            font-size: 16px;
            font-weight: bold;
            color: white;
        }

        .nama-list {
            background-color: white;
            border-radius: 10px;
            padding: 10px;
            margin-top: 20px;
        }

        .logout {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="card">
        <form action="" method="POST">
            <h1>Masukkan Nama anda</h1>
            <input type="text" id="username" name="nama" value="">
            <br>
            <input type="submit" id="submit" name="submit" value="Submit">
        </form>
        
        <div class="nama-list">
            <h2>Daftar Nama:</h2>
            <ul>
                <?php foreach($data_nama as $nama): ?>
                    <li><?php echo htmlspecialchars($nama); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="logout">
            <a href="logout.php">
                <button>
                    Logout
                </button>
            </a>
        </div>
    </div>
</body>
</html>