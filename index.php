<?php
include 'koneksi.php';

// Ambil data dari database
$query = "SELECT * FROM mobil";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dealer Mobil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <h2 align="center" class="mt-3">Daftar Mobil</h2><br>
    <div class="container mt-2 p-5">
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Mobil</a>
        <table class="table table-bordered p-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Tahun Produksi</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['merk']}</td>
                            <td>{$row['model']}</td>
                            <td>{$row['tahun_produksi']}</td>
                            <td>{$row['harga']}</td>
                            <td>
                                <a href='edit.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                                <a href='hapus.php?id={$row['id']}' class='btn btn-danger' onclick='return confirmDelete()'>Hapus</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>

            <script>
                function confirmDelete() {
                    return confirm("Are you sure you want to delete this record?");
                }
            </script>

        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
