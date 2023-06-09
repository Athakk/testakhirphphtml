<?php 

    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: auth/login.php");
        exit;
    }
    
    include 'functions.php';

    $id = $_GET["id"];
    $user = query("SELECT * FROM user WHERE id = $id")[0];

    if ( isset($_POST["submit"])) {
        if ( ubah($_POST) > 0 ){
                echo "
                    <script>
                        alert('data berhasil diubah');
                        document.location.href = 'index.php'
                    </script>
                ";
            } else {
                echo "
                <script>
                    alert('data berhasil diubah');
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
    <title>Ubah User</title>
</head>
<body>
    <div class="top-bar">
        <div class="welcome">Selamat Datang, <?php echo $_SESSION['nama'] ?></div>
        <a class="logout" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>Log out</a>
    </div>
    
    <div class="container">
        <div class="title">
            <h2>Ubah User <?= $user["nama"] ?></h2>
            <a href="index.php"><button>Kembali</button></a>
        </div>
        <div class="br"></div>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$user["id"]?>">
            <input type="hidden" name="gambarLama" value="<?=$user["gambar"]?>">
            <input type="hidden" name="passwordLama" value="<?= $user["password"]?>">
                <div class="form-group">
                    <label for="nama">Nama : </label>
                    <input required type="text" name="nama" id="nama" value="<?= $user["nama"] ?>">
                </div>
                <div class="form-group">
                    <label for="username">Username : </label>
                    <input type="text" name="username" id="username" value="<?= $user["username"] ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input required type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="password_verif">Password Verifikasi : </label>
                    <input required type="password" name="password_verif" id="password_verif">
                </div>
                <div class="input-gambar">

                    <label for="gambar">Gambar : </label>
                    <input type="file" name="gambar" id="gambar" value="<?= $user["gambar"] ?>">
                    <img width="20%" src="img/<?= $user['gambar']?>" alt="">
                </div>

                <div class="submit">
                    <button type="submit" class="tambah" name="submit">Tambah Data</button>
                </div>                
            </ul>
        </form>
    </div>
</body>
</html>