<?php
session_start();
require 'classes/Database.php';
require 'classes/Risiko.php';

$db = new Database();
$conn = $db->getConnection();
$risiko = new Risiko($conn);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($risiko->hapusRisiko($id)) {
        echo "success"; // Balasan untuk AJAX
    } else {
        echo "error"; // Balasan jika gagal
    }
}
