<?php  
    $queryKrit = mysqli_query($koneksi_db, "SELECT COUNT(Nama_Kriteria) FROM data_kriteria");
    $queryAlt  = mysqli_query($koneksi_db, "SELECT COUNT(Nama_Siswa) FROM data_alternatif");
    $querySub  = mysqli_query($koneksi_db, "SELECT COUNT(Nama_Subkriteria) FROM data_subkriteria");

    $resKrit = mysqli_fetch_row($queryKrit);
    $resAlt  = mysqli_fetch_row($queryAlt);
    $resSub  = mysqli_fetch_row($querySub);
?>

<!-- ================= PAGE HEADING ================= -->
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h4 mb-0 text-gray-800 text-uppercase">
        SPK Menentukan Siswa Berprestasi <br>
        Metode Simple Additive Weighting (SAW)
    </h1>
</div>

<!-- ================= CARD TOTAL DATA ================= -->
<div class="row">

    <!-- DATA KRITERIA -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info h-100 py-2 rounded-0">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Data Kriteria
                        </div>
                        <div class="text-md mb-0 text-gray-800">
                            Total <?= $resKrit[0]; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-folder fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DATA ALTERNATIF -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info h-100 py-2 rounded-0">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Data Alternatif
                        </div>
                        <div class="text-md mb-0 text-gray-800">
                            Total <?= $resAlt[0]; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-folder fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SUB KRITERIA -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info h-100 py-2 rounded-0">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Sub Kriteria
                        </div>
                        <div class="text-md mb-0 text-gray-800">
                            Total <?= $resSub[0]; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-folder fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- ================= GRAFIK ================= -->
<div class="row">

    <!-- BAR CHART -->
    <div class="col-md-6 mb-4">
        <div class="card shadow rounded-0">
            <div class="card-header py-2">
                <h6 class="m-0 font-weight-bold text-info">
                    Grafik Batang Jumlah Data
                </h6>
            </div>
            <div class="card-body">
                <canvas id="barChart" height="160"></canvas>
            </div>
        </div>
    </div>

    <!-- PIE CHART -->
    <div class="col-md-6 mb-4">
        <div class="card shadow rounded-0">
            <div class="card-header py-2">
                <h6 class="m-0 font-weight-bold text-info">
                    Grafik Lingkaran Persentase Data
                </h6>
            </div>
            <div class="card-body">
                <canvas id="pieChart" height="160"></canvas>
            </div>
        </div>
    </div>

</div>

<!-- ================= CHART JS ================= -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
/* BAR CHART */
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: ['Data Kriteria', 'Data Alternatif', 'Sub Kriteria'],
        datasets: [{
            label: 'Jumlah Data',
            data: [
                <?= $resKrit[0]; ?>,
                <?= $resAlt[0]; ?>,
                <?= $resSub[0]; ?>
            ],
            backgroundColor: ['#36b9cc','#1cc88a','#4e73df']
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: { beginAtZero: true }
        }
    }
});

/* PIE CHART */
new Chart(document.getElementById('pieChart'), {
    type: 'pie',
    data: {
        labels: ['Data Kriteria', 'Data Alternatif', 'Sub Kriteria'],
        datasets: [{
            data: [
                <?= $resKrit[0]; ?>,
                <?= $resAlt[0]; ?>,
                <?= $resSub[0]; ?>
            ],
            backgroundColor: ['#36b9cc','#1cc88a','#4e73df']
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>
