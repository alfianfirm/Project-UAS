<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect ke halaman login kalau belum login
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Input Risiko</title>
</head>
<body>
    <h1>Input Risiko Baru</h1>
    <form action="process.php" method="POST">
        <label>Nama Risiko:</label><br>
        <input type="text" name="nama_risiko" required><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi"></textarea><br><br>


        <label>Likelihood (1-5):</label><br>
        <input type="number" name="likelihood" min="1" max="5" required><br><br>

        <label>Impact (1-5):</label><br>
        <input type="number" name="impact" min="1" max="5" required><br><br>

        <button type="submit">Simpan</button>

        <a href="logout.php">Logout</a>
    </form>
</body>
</html>
