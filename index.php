<?php 
session_start();
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<?php include 'partials/head.php' ?>
<?php include 'database/database.php' ?>

  <!-- Navbar -->
  <?php include 'partials/nav.php' ?>

  <!-- Main Sidebar Container -->
  <?php include 'partials/sidebar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include 'routes.php' ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <?php include 'partials/control.php' ?>

  <!-- Main Footer -->
  <?php include 'partials/footer.php' ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<?php include 'partials/scripts.php' ?>
</body>
</html>
