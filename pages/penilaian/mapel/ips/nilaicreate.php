<?php 
if (isset($_POST['button_create'])) {

    $database = new Database();
    $db = $database->getConnection();

    $validationSql = "SELECT * FROM tb_nilai_uts WHERE id = :id";
    $stmtValidation = $db->prepare($validationSql);
    $stmtValidation->bindParam(':id', $_POST['id']);
    $stmtValidation->execute();

    if ($stmtValidation->rowCount() > 0) {
        ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <h5><i class="icon fa fa-ban"></i> Gagal</h5>
            Gagal Menambah Nilai
        </div>
        <?php
    } else {
        $insertSql = "INSERT INTO tb_nilai_uts (id_santri, id_mapel, nilai, id_semester) VALUES (:id_santri, :id_mapel, :nilai, :id_semester)";
        $stmt = $db->prepare($insertSql);
        $stmt->bindParam(':id_santri', $_POST['id_santri']);
        $stmt->bindParam(':id_mapel', $_POST['id_mapel']);
        $stmt->bindParam(':nilai', $_POST['nilai']);
        $stmt->bindParam(':id_semester', $_POST['id_semester']);
        
        if ($stmt->execute()) {
            $_SESSION['hasil'] = true;
            $_SESSION['pesan'] = "Berhasil simpan data";
        } else {
            $_SESSION['hasil'] = false;
            $_SESSION['pesan'] = "Gagal simpan data";
        }
        echo "<meta http-equiv='refresh' content='0;url=?page=uts1-7'>";
    }
}
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6">
                <h1>Tambah Data Nilai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=uts1-7">Data Nilai</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Nilai</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="id_santri">Santri</label>
                    <select name="id_santri" class="form-control" disabled>
                        <option value="">>-- Pilih Santri--<</option>
                        <?php 
                        $database = new Database();
                        $db = $database->getConnection();
    
                        $selectSql = "SELECT * FROM tb_santri WHERE id_kelas = 1 AND 2 AND 3";
                        $stmt_santri = $db->prepare($selectSql);
                        $stmt_santri->execute();
                        
                        while($row_santri = $stmt_santri->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=\"" . $row_santri['id'] .   "\">" . $row_santri['nama_santri'] . "</option>";
                        } 
                        ?>
                    </select>
                    <label for="id_mapel">Mata Pelajaran</label>
                    <select name="id_mapel" class="form-control" disabled>
                        <option value="16">IPS</option>
                    </select>
                    <label for="nilai">Nilai</label>
                    <input type="text" class="form-control" name="nilai">
                    <label for="id_semester">Semester</label>
                    <select name="id_semester" class="form-control" disabled>
                        <option value="1">1<</option>
                    </select>
                </div>
                <a href="?page=gururead" class="btn btn-danger btn-sm float-right">
                    <i class="fa fa-times"></i> Batal
                </a>
                <button type="submit" name="button_create" class="btn btn-success btn-sm float-right mr-2">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</section>