<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $database = new Database();
    $db = $database->getConnection();

    $deleteSql = "DELETE FROM kelas_tb WHERE id = :id";
    $stmt = $db->prepare($deleteSql);
    $stmt->bindParam(':id', $_GET['id']);
    if($stmt->execute()) {
        $_SESSION['hasil'] = true;
        $_SESSION['pesan'] = "Kelas berhasil dihapus";
    } else {
        $_SESSION['hasil'] = false;
        $_SESSION['pesan'] = "Kelas gagal dihapus";
    }
}
echo "<meta http-equiv='refresh' content='0;url=?page=kelasread'>";
?>