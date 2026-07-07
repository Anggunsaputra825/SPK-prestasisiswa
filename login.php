<?php
session_start();  

// cegah masuk ke dashboard (index)
if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="adjimuhamadzidan">
<link rel="icon" type="image/x-icon" href="assets/img/SMKN9_Bekasi.ico">

<title>SPK Siswa Berprestasi - Login</title>

<!-- Fontawesome -->
<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

<!-- Template CSS -->
<link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

<style>
*{
    font-family: "Segoe UI", Arial, sans-serif;
}

/* WARNA KIRI LOGIN */
.bg-login-image{
    background: linear-gradient(135deg, #01a3a4, #019394);
    background-size: 200% 200%;
    animation: gradientMove 6s ease infinite;
}

/* ANIMASI GRADIENT */
@keyframes gradientMove{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

.logo{
    width:80px;
    height:80px;
}

h5, span{
    font-weight:600;
}

.container{
    margin-top:6rem;
}

.btn-success{
    background:#01a3a4;
    border-color:#01a3a4;
}

.btn-success:hover{
    background:#019394;
    border-color:#019394;
}

.bg-login-image h5,
.bg-login-image span{
    color:#fff;
}
</style>

</head>

<body class="bg-gradient-white">

<div class="container">

<div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">

<div class="card o-hidden border-0 shadow rounded-0">
<div class="card-body p-0">

<div class="row">

<!-- KIRI -->
<div class="col-lg-6 d-none d-lg-flex bg-login-image align-items-center justify-content-center">
    <div class="text-center px-4">
        <img src="assets/img/logodepan.jpeg" class="logo mb-3">
        <h5 class="text-uppercase">
            <span>Sistem Pendukung Keputusan</span><br>
            Penentuan Siswa Berprestasi
        </h5>
    </div>
</div>

<!-- KANAN -->
<div class="col-lg-6">

<div class="p-5">

<div class="text-center">
<img src="assets/img/logodepan.jpeg" class="logo d-lg-none mb-3">
<h5 class="d-lg-none mb-2">
<span>Sistem Penunjang Keputusan</span><br>
Penentuan Siswa Berprestasi
</h5>
<p class="h5 mb-4">Admin Login</p>
</div>

<?php if(isset($_SESSION['status'])): ?>
<div class="alert alert-danger small">
    <?= $_SESSION['status']; ?>
</div>
<?php unset($_SESSION['status']); endif; ?>

<form method="post" action="config/proses_login.php">

<div class="form-group">
<input type="text" class="form-control form-control-user rounded-0"
placeholder="Username" name="username" required>
</div>

<div class="form-group">
<input type="password" class="form-control form-control-user rounded-0"
placeholder="Password" name="password" required>
</div>

<div class="form-group">
<div class="custom-control custom-checkbox small">
<input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
<label class="custom-control-label" for="customCheck">
Remember Me
</label>
</div>
</div>

<button type="submit" name="masuk"
class="btn btn-success btn-user btn-block rounded-0">
<i class="fas fa-sign-in-alt"></i> Masuk
</button>

</form>

</div>

</div>

</div>

</div>
</div>

</div>

</div>

</div>

<!-- JS -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="assets/js/sb-admin-2.min.js"></script>

</body>
</html>
