<?php
session_start();
require 'classes/Database.php';
require 'classes/Risiko.php';

$db = (new Database())->getConnection();
$risiko = new Risiko($db);

$nama_risiko = $_POST['nama_risiko'];
$deskripsi = $_POST['deskripsi'];
$likelihood = $_POST['likelihood'];
$impact = $_POST['impact'];

if ($risiko->tambahRisiko($nama_risiko, $deskripsi, $likelihood, $impact)) {
    echo "Data berhasil disimpan! <a href='list.php'>Lihat Daftar Risiko</a>";
} else {
    echo "Error saat menyimpan data!";
}
