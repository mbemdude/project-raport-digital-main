<?php 
if (isset($_GET['id'])) {

    $database = new Database();
    $db = $database->getConnection();

    $id = $_GET['id'];
    $findSql = "SELECT * FROM guru_tb WHERE id = :id";
    $stmt = $db->prepare($findSql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch();
    if(isset($row['id'])) {
        if (isset($_POST['button_update'])) {

            $database = new Database();
            $db = $database->getConnection();

            $validateSql = "SELECT * FROM guru_tb WHERE nip = :nip AND id != :id";
            $stmt = $db->prepare($validateSql);
            $stmt->bindParam('nip', $_POST['nip']);
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
?>
                <div class="alert alert-danger alert-dimissible">
                    <button type="button" class="close" data-disimissible="alert" aria-hidden="true"></button>
                    <h5><i class="icon fa fa-ban"></i> Gagal</h5>
                    Data guru sudah ada
                </div>
        <?php 
            } else {
                $updateSql = "UPDATE guru_tb SET nip = :nip, nama = :nama, alamat = :alamat WHERE id = :id";
                $stmt = $db->prepare($updateSql);
                $stmt->bindParam(':nip', $_POST['nip']);
                $stmt->bindParam(':nama', $_POST['nama']);
                $stmt->bindParam(':alamat', $_POST['alamat']);
                $stmt->bindParam(':id', $_POST['id']);
                if ($stmt->execute()) {
                    $_SESSION['hasil'] = true;
                    $_SESSION['pesan'] = "Berhasil ubah data";
                } else {
                    $_SESSION['hasil'] = false;
                    $_SESSION['pesan'] = "Gagal ubah data";
                }
                echo "<meta http-equiv='refresh' content='0;url=?page=gururead'>";
            }
        }
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6">
                <h1>Ubah Data Guru</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=gururead">Guru</a></li>
                    <li class="breadcrumb-item active">Ubah Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Guru</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="id">Id</label>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>">
                    <NIPel for="nip">NIP</NIPel>
                    <input type="text" class="form-control" name="nip" value="<?php echo $row['nip'] ?>">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $row['nama'] ?>">
                    <label for="alamat">Alamat</label>
                    <textarea type="text" class="form-control" name="alamat"><?php echo $row['alamat'] ?></textarea>
                </div>
                <a href="?page=gururead" class="btn btn-danger btn-sm float-right">
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
        echo "<meta http-equiv='refresh' content='0;url=?page=gururead'>";
    }
} else {
    echo "<meta http-equiv='refresh' content='0;url=?page=gururead'>";
}
?>