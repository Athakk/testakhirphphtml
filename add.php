<?php 

    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: auth/login.php");
        exit;
    }
    
    include 'functions.php';

    if ( isset($_POST["submit"])) {

        if ( tambah($_POST) > 0 ){
                echo "
                    <script>
                        alert('data berhasil ditambahkan');
                        document.location.href = 'index.php'
                    </script>
                ";
            } else {
                echo "
                <script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'index.php'
                </script>";
            };
        };

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tambah User</title>
</head>
<body>
    <div class="add">
        <div class="top-bar">
            <div class="welcome">Selamat Datang, <?php echo $_SESSION['nama'] ?></div>
            <a class="logout" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>Log out</a>
        </div>
                
        <div class="container">
            <div class="title">
                <h2>Tambah User</h2>
                <a href="index.php"><button>Kembali</button></a>
            </div>
            <div class="br"></div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-text">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" placeholder="Masukkan username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_verif">Password Verifikasi:</label>
                        <input type="password" id="password_verif" name="password_verif" required>
                    </div>
                </div>
                <div class="input-gambar">
                    <label for="gambar">Gambar : </label><br>
                    <input type="file" name="gambar" id="gambar">
                </div>
                <div class="submit">
                    <button type="submit" class="tambah" name="submit">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>