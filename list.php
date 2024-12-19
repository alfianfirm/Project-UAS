<?php
session_start();
require 'classes/Database.php';
require 'classes/Risiko.php';

$db = new Database();
$conn = $db->getConnection();
$risiko = new Risiko($conn);

$data = $risiko->getRisiko(); // Ambil semua data risiko
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Risiko</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background: #007bff;
            color: #fff;
        }

        .btn-delete {
            color: red;
            cursor: pointer;
            text-decoration: underline;
        }

        /* Notifikasi Popup */
        .notification {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            width: 400px;
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            display: none; /* Awalnya disembunyikan */
            animation: fadeIn 0.4s ease;
        }

        .notification-header {
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
            color: #333;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .notification-body {
            font-size: 1rem;
            text-align: center;
            margin-bottom: 15px;
            color: #555;
        }

        .notification-footer {
            display: flex;
            justify-content: center;
        }

        .notification-footer button {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .notification-footer button:hover {
            background: #218838;
        }

        /* Animasi */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, -60%);
            }
            to {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }
    </style>
</head>
<body>
    <h1>Daftar Risiko</h1>
    <a href="form.php">Tambah Risiko Baru</a> | <a href="logout.php">Logout</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Risiko</th>
                <th>Deskripsi</th>
                <th>Likelihood</th>
                <th>Impact</th>
                <th>Risk Score</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php $no = 1; foreach ($data as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_risiko']; ?></td>
                    <td><?= $row['deskripsi']; ?></td>
                    <td><?= $row['likelihood']; ?></td>
                    <td><?= $row['impact']; ?></td>
                    <td><?= $row['risk_score']; ?></td>
                    <td><?= $row['kategori']; ?></td>
                    <td>
                        <span class="btn-delete" data-id="<?= $row['id']; ?>">Hapus</span>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">Tidak ada data risiko.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Notifikasi -->
    <div id="notification" class="notification">
        <div class="notification-header">
            <strong>Notifikasi</strong>
        </div>
        <div class="notification-body">
            <p id="notification-text">Data berhasil dihapus!</p>
        </div>
        <div class="notification-footer">
            <button onclick="closeNotification()">OK</button>
        </div>
    </div>

    <script>
        // Event Listener untuk tombol hapus
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                // AJAX untuk hapus data
                fetch(`delete.php?id=${id}`)
                    .then(response => response.text())
                    .then(result => {
                        if (result.trim() === 'success') {
                            // Tampilkan notifikasi
                            const notification = document.getElementById('notification');
                            document.getElementById('notification-text').innerText = "Data berhasil dihapus!";
                            notification.style.display = 'block'; // Munculkan notifikasi
                        }
                    });
            });
        });

        // Fungsi untuk menutup notifikasi
        function closeNotification() {
            const notification = document.getElementById('notification');
            notification.style.display = 'none';
            location.reload(); // Reload halaman setelah notifikasi ditutup
        }
    </script>
</body>
</html>
