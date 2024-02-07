<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $database = new Database();
    $db = $database->getConnection();

    $deleteSql = "DELETE FROM siswa_tb WHERE id = :id";
    $stmt = $db->prepare($deleteSql);
    $stmt->bindParam(':id', $_GET['id']);
    if($stmt->execute()) {
        $_SESSION['hasil'] = true;
        $_SESSION['pesan'] = "santri berhasil dihapus";
    } else {
        $_SESSION['hasil'] = false;
        $_SESSION['pesan'] = "santri gagal dihapus";
    }
}
echo "<meta http-equiv='refresh' content='0;url=?page=santriread'>";
?>