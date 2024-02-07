<?php
if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->getConnection();

    $id = $_GET['id'];
    $findSql = "SELECT * FROM tb_user WHERE id = :id";
    $stmt = $db->prepare($findSql);
    $stmt->bindParam(':id', $id); // Updated to use $id instead of $_GET['id']
    $stmt->execute();
    $row = $stmt->fetch();

    if (isset($row['id'])) {
        if (isset($_POST['button_update'])) {
            $validateSql = "SELECT * FROM tb_user WHERE username = :username AND id != :id";
            $stmtValidate = $db->prepare($validateSql); // Changed variable name to $stmtValidate
            $hashedPassword = md5($_POST['password']);
            $stmtValidate->bindParam(':username', $_POST['username']);
            $stmtValidate->bindParam(':id', $_POST['id']); // Updated to use $_POST['id']
            $stmtValidate->execute();

            if ($stmtValidate->rowCount() > 0) {
                echo '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        <h5><i class="icon fa fa-ban"></i> Gagal</h5>
                        Username sudah ada
                    </div>';
            } else {
                $updateSql = "UPDATE tb_user SET username = :username, password = :password, role_id := role_id WHERE id = :id";
                $stmtUpdate = $db->prepare($updateSql); // Changed variable name to $stmtUpdate
                $hashedPassword = md5($_POST['password']);
                $stmtUpdate->bindParam(':username', $_POST['username']);
                $stmtUpdate->bindParam(':password', $hashedPassword);
                $stmtUpdate->bindParam(':role_id', $_POST['role_id']);
                $stmtUpdate->bindParam(':id', $_POST['id']);

                if ($stmtUpdate->execute()) {
                    $_SESSION['hasil'] = true;
                    $_SESSION['pesan'] = "Berhasil ubah data";
                } else {
                    $_SESSION['hasil'] = false;
                    $_SESSION['pesan'] = "Gagal ubah data";
                }

                echo "<meta http-equiv='refresh' content='0;url=?page=userread'>";
            }
        }
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6">
                <h1>Ubah Data User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=userread">User</a></li>
                    <li class="breadcrumb-item active">Ubah Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ubah User</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>">
                    <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" value="">
                    <label for="id_role">Role</label>
                    <select name="id_role" class="form-control">
                        <option value="">>-- Role --<</option>
                        <?php 
                        $database = new Database();
                        $db = $database->getConnection();
    
                        $selectSql = "SELECT * FROM tb_role";
                        $stmt_user = $db->prepare($selectSql);
                        $stmt_user->execute();
                        
                        while($row_role = $stmt_user->fetch(PDO::FETCH_ASSOC)) {
                            $selected = ($row_role['id'] == $row['role_id']) ? 'selected' : '';
                            echo "<option value=\"" . $row_role['id'] . "\" $selected>" . $row_role['role'] . "</option>";
                        } 
                        ?>
                    </select>
                </div>
                <a href="?page=userread" class="btn btn-danger btn-sm float-right">
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
        echo "<meta http-equiv='refresh' content='0;url=?page=userread'>";
    }
} else {
    echo "<meta http-equiv='refresh' content='0;url=?page=userread'>";
}
?>