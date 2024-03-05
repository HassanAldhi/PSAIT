<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $merk = $_POST['merk'];
    $model = $_POST['model'];
    $tahun_produksi = $_POST['tahun_produksi'];
    $harga = $_POST['harga'];

    $query = $conn->prepare("UPDATE mobil SET merk = ?, model = ?, tahun_produksi = ?, harga = ? WHERE id = ?");
    $query->bind_param("ssisi", $merk, $model, $tahun_produksi, $harga, $id);
    $query->execute();
    $query->close();

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mobil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div class="container mt-5 p-5">
        <h2>Edit Mobil</h2>
        <?php
        include('koneksi.php');

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $query = $conn->query("SELECT * FROM mobil WHERE id = $id");
            $data = $query->fetch_assoc();
        }
        ?>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="form-group">
                <label for="merk">Merk:</label>
                <input type="text" class="form-control" id="merk" name="merk" value="<?php echo $data['merk']; ?>" required>
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" class="form-control" id="model" name="model" value="<?php echo $data['model']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tahun_produksi">Tahun Produksi:</label>
                <input type="number" class="form-control" id="tahun_produksi" name="tahun_produksi" value="<?php echo $data['tahun_produksi']; ?>" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $data['harga']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
