<?php 
if (isset($_POST['button_create'])) {

    $database = new Database();
    $db = $database->getConnection();

    $validationSql = "SELECT * FROM user_tb WHERE username = :username";
    $stmtValidation = $db->prepare($validationSql);
    $stmtValidation->bindParam(':username', $_POST['username']);
    $stmtValidation->execute();

    if ($stmtValidation->rowCount() > 0) {
        ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <h5><i class="icon fa fa-ban"></i> Gagal</h5>
            Username sudah ada
        </div>
        <?php
    } else {
        $insertSql = "INSERT INTO user_tb (username, password, role_id) VALUES (:username, :password, :role_id)";
        $hashedPassword = md5($_POST['password']);
        $stmt = $db->prepare($insertSql);
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role_id', $_POST['role_id']);
        
        if ($stmt->execute()) {
            $_SESSION['hasil'] = true;
            $_SESSION['pesan'] = "Berhasil simpan data";
        } else {
            $_SESSION['hasil'] = false;
            $_SESSION['pesan'] = "Gagal simpan data";
        }
        echo "<meta http-equiv='refresh' content='0;url=?page=userread'>";
    }
}
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6">
                <h1>Tambah Data User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=mapelread">User</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah User</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password">
                    <label for="role_id">Role</label>
                    <select name="role_id" class="form-control">
                        <option value="">>-- Pilih Role --<</option>
                        <?php 
                        $database = new Database();
                        $db = $database->getConnection();
    
                        $selectSql = "SELECT * FROM role_tb";
                        $stmt_user = $db->prepare($selectSql);
                        $stmt_user->execute();
                        
                        while($row_user = $stmt_user->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=\"" . $row_user['id'] .   "\">" . $row_user['role'] . "</option>";
                        } 
                        ?>
                    </select>
                </div>
                <a href="?page=userread" class="btn btn-danger btn-sm float-right">
                    <i class="fa fa-times"></i> Batal
                </a>
                <button type="submit" name="button_create" class="btn btn-success btn-sm float-right mr-2">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</section>