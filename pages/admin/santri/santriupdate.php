<?php 
if (isset($_GET['id'])) {

    $database = new Database();
    $db = $database->getConnection();

    $id = $_GET['id'];
    $findSql = "SELECT * FROM siswa_tb WHERE id = :id";
    $stmt = $db->prepare($findSql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch();
    if(isset($row['id'])) {
        if (isset($_POST['button_update'])) {

            $database = new Database();
            $db = $database->getConnection();

            $validateSql = "SELECT * FROM siswa_tb WHERE nama = :nama AND id != :id";
            $stmt = $db->prepare($validateSql);
            $stmt->bindParam('nama', $_POST['nama']);
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
?>
                <div class="alert alert-danger alert-dimissible">
                    <button type="button" class="close" data-disimissible="alert" aria-hidden="true"></button>
                    <h5><i class="icon fa fa-ban"></i> Gagal</h5>
                    Nama santri sudah ada
                </div>
        <?php 
            } else {
                $updateSql = "UPDATE siswa_tb SET nis = :nis, nisn = :nisn, nama = :nama, jenis_kelamin = :jenis_kelamin WHERE id = :id";
                $stmt = $db->prepare($updateSql);
                $stmt->bindParam(':nis', $_POST['nis']);
                $stmt->bindParam(':nisn', $_POST['nisn']);
                $stmt->bindParam(':nama', $_POST['nama']);
                $stmt->bindParam(':jenis_kelamin', $_POST['jenis_kelamin']);
                $stmt->bindParam(':id', $_POST['id']);
                if ($stmt->execute()) {
                    $_SESSION['hasil'] = true;
                    $_SESSION['pesan'] = "Berhasil ubah data";
                } else {
                    $_SESSION['hasil'] = false;
                    $_SESSION['pesan'] = "Gagal ubah data";
                }
                echo "<meta http-equiv='refresh' content='0;url=?page=santriread'>";
            }
        }
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">            <div class="col-sm-6">
                <h1>Ubah Data Santri</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=santriread">Santri</a></li>
                    <li class="breadcrumb-item active">Ubah Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ubah Santri</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>">
                    <input type="text" class="form-control" name="nis" value="<?php echo $row['nis'] ?>">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" name="nisn" value="<?php echo $row['nisn'] ?>">
                    <label for="nama">Nama Santri</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $row['nama'] ?>">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select">
                        <option value="">>-- Jenis Kelamin --<</option>
                        <option value="L" <?php if ($row['jenis_kelamin'] === 'L') echo 'selected'; ?>>Laki-Laki</option>
                        <option value="P" <?php if ($row['jenis_kelamin'] === 'P') echo 'selected'; ?>>Perempuan</option>
                    </select>
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?php echo $row['nama'] ?>">
                    <label for="kelas_id">Kelas</label>
                    <select name="kelas_id" class="form-select">
                        <option value="">>-- Kelas --<</option>
                        <?php 
                        $database = new Database();
                        $db = $database->getConnection();
    
                        $selectSql = "SELECT * FROM kelas_tb";
                        $stmt_kelas = $db->prepare($selectSql);
                        $stmt_kelas->execute();
                        
                        while($row_kelas = $stmt_kelas->fetch(PDO::FETCH_ASSOC)) {
                            $selected = ($row_kelas['id'] == $row['kelas_id']) ? 'selected' : '';
                            echo "<option value=\"" . $row_kelas['id'] . "\" $selected>" . $row_kelas['kelas'] . "</option>";
                        } 
                        ?>
                    </select>
                </div>
                <a href="?page=santriread" class="btn btn-danger btn-sm float-right">
                    <i class="fa fa-times"></i> Batal
                </a>
                <button type="submit" name="button_update" class="btn btn-success btn-sm float-right mr-2">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</section>

<?php 
    } else {
        echo "<meta http-equiv='refresh' content='0;url=?page=santriread'>";
    }
} else {
    echo "<meta http-equiv='refresh' content='0;url=?page=santriread'>";
}
?>