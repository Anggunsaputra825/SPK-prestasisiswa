<?php
  session_start();
  require '../../config/connect_db.php';

  // proses tambah
  $nisn = htmlspecialchars($_POST['nisn']);
  $siswa = htmlspecialchars($_POST['nama_siswa']);
  $jk = htmlspecialchars($_POST['jenis_kelamin']);
  $kelas = htmlspecialchars($_POST['kelas']);

  $query = mysqli_query($koneksi_db, "SELECT NISN FROM data_alternatif WHERE NISN = '$nisn'");
  $nisnSiswa = mysqli_num_rows($query);

  // validasi input alternatif sudah ada atau belum
  if ($nisnSiswa > 0) {
    $_SESSION['pesan'] = 'NISN sudah ada!';
    $_SESSION['status'] = 'warning';
    header('Location: ../../index.php?page=tambah_alter');
    exit;
  } else {
    // PERBAIKAN DI SINI: Sebutkan kolom yang ingin diisi saja
    // Kolom Nilai, Prestasi, Absensi, dan Tahun dikosongkan dulu (atau beri nilai default)
    $sql = "INSERT INTO data_alternatif (NISN, Nama_Siswa, JK, Kelas) 
            VALUES ('$nisn', '$siswa', '$jk', '$kelas')";
    
    $send = mysqli_query($koneksi_db, $sql);

    if ($send) {
      $_SESSION['pesan'] = 'Alternatif berhasil tersimpan!';
      $_SESSION['status'] = 'success';
      header('Location: ../../index.php?page=data_siswa');
      exit;
    } else {
      // Menampilkan error spesifik jika gagal untuk debugging
      $_SESSION['pesan'] = 'Alternatif gagal tersimpan! Error: ' . mysqli_error($koneksi_db);
      $_SESSION['status'] = 'danger';
      header('Location: ../../index.php?page=data_siswa');
      exit;
    }
  }
?>