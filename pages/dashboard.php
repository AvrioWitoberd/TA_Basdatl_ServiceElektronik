<?php
require_once "../includes/session.php";   // cek login
require_once "../includes/header.php";    // header + bootstrap
require_once "../models/pelanggan.php";
require_once "../models/teknisi.php";
require_once "../models/perangkat.php";
require_once "../models/service.php";

// Ambil summary data
$totalPelanggan = Pelanggan::count();
$totalTeknisi   = Teknisi::count();
$totalPerangkat = Perangkat::count();
$totalService   = Service::count();

// Ambil service terbaru
$latestService = Service::getLatest(5);
?>

<div class="container mt-4">
    <h2>Dashboard</h2>
    <p>Selamat datang, <b><?= $_SESSION['user']['nama']; ?></b></p>

    <!-- Summary Cards -->
    <div class="row mt-4">

        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3 shadow">
                <div class="card-body">
                    <h5>Total Pelanggan</h5>
                    <h2><?= $totalPelanggan ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success mb-3 shadow">
                <div class="card-body">
                    <h5>Total Teknisi</h5>
                    <h2><?= $totalTeknisi ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3 shadow">
                <div class="card-body">
                    <h5>Total Perangkat</h5>
                    <h2><?= $totalPerangkat ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-info mb-3 shadow">
                <div class="card-body">
                    <h5>Total Service</h5>
                    <h2><?= $totalService ?></h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Latest Service Tabel -->
    <div class="card shadow mt-4">
        <div class="card-header">
            <h5>Service Terbaru</h5>
        </div>
        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pelanggan</th>
                        <th>Perangkat</th>
                        <th>Status</th>
                        <th>Tanggal Masuk</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($latestService as $s): ?>
                    <tr>
                        <td><?= $s['id'] ?></td>
                        <td><?= $s['pelanggan'] ?></td>
                        <td><?= $s['perangkat'] ?></td>
                        <td><?= ucfirst($s['status']) ?></td>
                        <td><?= $s['tanggal_masuk'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>

</div>

<?php require_once "../includes/footer.php"; ?>
