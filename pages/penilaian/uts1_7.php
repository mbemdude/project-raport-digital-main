<div class="content-header">
    <div class="container-fluid">
        <?php 
        if (isset($_SESSION["hasil"])) {
            if ($_SESSION["hasil"]) {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="close"></button> -->
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5><i class="icon fa fa-check"></i> Berhasil</h5>
                    <?php echo $_SESSION['pesan']?>
                </div>
            <?php 
            } else {
            ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="close"></button>
                <h5><i class="icon fa fa-ban"></i> Gagal</h5>
                <?php echo $_SESSION['pesan']?>
            </div>

            <?php
            }
            unset($_SESSION['hasil']);
            unset($_SESSION['pesan']);
        }
        ?>
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Nilai UTS 1 Kelas 7</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="?page=home"> Home</a>
                    </li>
                    <li class="breadcrumb-item">Data Nilai</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Nilai UTS 1 Kelas 7</h3>
            <a href="?page=nilai-uts-create" class="btn btn-success btn-sm float-right">
            <i class="fa fa-plus-circle"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <table id="myTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Mapel</th>
                        <th>Nilai</th>
                        <th>Semester</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Mapel</th>
                        <th>Nilai</th>
                        <th>Semester</th>
                        <th>Opsi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php 
                    $database = new Database();
                    $db = $database->getConnection();

                    $selectSql = "SELECT tb_nilai_uts.id, tb_santri.nama_santri, tb_mapel.mapel, tb_nilai_uts.nilai, tb_semester.semester FROM tb_nilai_uts INNER JOIN tb_santri ON tb_nilai_uts.id_santri = tb_santri.id INNER JOIN tb_mapel ON tb_nilai_uts.id_mapel = tb_mapel.id INNER JOIN tb_semester ON tb_nilai_uts.id_semester = tb_semester.id INNER JOIN tb_kelas ON tb_santri.id_kelas = tb_kelas.id WHERE tb_kelas.kelas = 7";

                    $stmt = $db->prepare($selectSql);
                    $stmt->execute();

                    $no = 1;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['nama_santri'] ?></td>
                        <td><?php echo $row['mapel'] ?></td>
                        <td><?php echo $row['nilai'] ?></td>
                        <td><?php echo $row['semester'] ?></td>
                        <td>
                            <a href="?page=guruupdate&id=<?php echo $row['id']?>" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"> Ubah</i>
                            </a>
                            <a href="?page=gurudelete&id=<?php echo $row['id']?>" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"> Hapus</i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'partials/scripts.php' ?>
<?php include 'partials/scriptsdatatables.php' ?>
<script>
$(function() {
    $('#myTable').DataTable()
});
</script>