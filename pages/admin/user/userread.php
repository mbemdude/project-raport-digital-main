
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
                <h1 class="m-0">Data User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="?page=home"> Home</a>
                    </li>
                    <li class="breadcrumb-item">Data User</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data User</h3>
            <a href="?page=usercreate" class="btn btn-success btn-sm float-right">
            <i class="fa fa-plus-circle"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <table id="myTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
                        <th>Opsi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php 
                    $database = new Database();
                    $db = $database->getConnection();

                    $selectSql = "SELECT U.id, U.username, R.role FROM user_tb U LEFT JOIN role_tb R ON U.role_id=R.id;";

                    $stmt = $db->prepare($selectSql);
                    $stmt->execute();

                    $no = 1;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['role'] ?></td>
                        <td>
                            <a href="?page=userupdate&id=<?php echo $row['id']?>" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"> Ubah</i>
                            </a>
                            <a href="?page=userdelete&id=<?php echo $row['id']?>" class="btn btn-danger btn-sm">
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