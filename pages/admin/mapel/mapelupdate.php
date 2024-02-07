<?php 
if (isset($_GET['id'])) {

    $database = new Database();
    $db = $database->getConnection();

    $id = $_GET['id'];
    $findSql = "SELECT * FROM mapel_tb WHERE id = :id";
    $stmt = $db->prepare($findSql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch();
    if(isset($row['id'])) {
        if (isset($_POST['button_update'])) {

            $database = new Database();
            $db = $database->getConnection();

            $validateSql = "SELECT * FROM mapel_tb WHERE mapel = :mapel AND id != :id";
            $stmt = $db->prepare($validateSql);
            $stmt->bindParam(':mapel', $_POST['mapel']);
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
?>
                <div class="alert alert-danger alert-dimissible">
                    <button type="button" class="close" data-disimissible="alert" aria-hidden="true"></button>
                    <h5><i class="icon fa fa-ban"></i> Gagal</h5>
                    Mapel sudah ada
                </div>
        <?php 
            } else {
                $updateSql = "UPDATE mapel_tb SET mapel = :mapel WHERE id = :id";
                $stmt = $db->prepare($updateSql);
                $stmt->bindParam(':mapel', $_POST['mapel']);
                $stmt->bindParam(':id', $_POST['id']);
                if ($stmt->execute()) {
                    $_SESSION['hasil'] = true;
                    $_SESSION['pesan'] = "Berhasil ubah data";
                } else {
                    $_SESSION['hasil'] = false;
                    $_SESSION['pesan'] = "Gagal ubah data";
                }
                echo "<meta http-equiv='refresh' content='0;url=?page=mapelread'>";
            }
        }
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6">
                <h1>Ubah Data Mata Pelajaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=mapelread">Mata Pelajaran</a></li>
                    <li class="breadcrumb-item active">Ubah Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ubah Mata Pelajaran</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="kd_mapel">Kode Mapel</label>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>">
                    <label for="mapel">Mata Pelajaran</label>
                    <input type="text" class="form-control" name="mapel" value="<?php echo $row['mapel'] ?>">
                </div>
                <a href="?page=mapelread" class="btn btn-danger btn-sm float-right">
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
        echo "<meta http-equiv='refresh' content='0;url=?page=mapelread'>";
    }
} else {
    echo "<meta http-equiv='refresh' content='0;url=?page=mapelread'>";
}
?>