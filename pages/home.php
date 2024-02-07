<?php 
$database = new Database();
$db = $database->getConnection();

$sqlCountSantri = "SELECT COUNT(*) FROM siswa_tb";
$sqlCountGuru = "SELECT COUNT(*) FROM guru_tb";
$sqlCountMapel = "SELECT COUNT(*) FROM mapel_tb";

$stmtSantri = $db->query($sqlCountSantri);
$stmtGuru = $db->query($sqlCountGuru);
$stmtMapel = $db->query($sqlCountMapel);

$countSantri = $stmtSantri->fetchColumn();
$countGuru = $stmtGuru->fetchColumn();
$countMapel = $stmtMapel->fetchColumn();
?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <div class="row">
                  <div class="col-lg-6 col-sm-6">
                    <i class="fa fa-users fa-4x mt-2 ml-5"></i>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                    <h3><?php echo $countSantri ?></h3>
                    <p>Total Santri</p>
                  </div>
                </div>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="?page=santriread" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <div class="row">
                  <div class="col-lg-6 col-sm-6">
                    <i class="fa fa-user fa-4x mt-2 ml-5"></i>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                    <h3><?php echo $countGuru ?></h3>
                    <p>Total Guru</p>
                  </div>
                </div>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="?page=gururead" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <div class="row">
                  <div class="col-lg-6 col-sm-6">
                    <i class="fa fa-book fa-4x mt-2 ml-5"></i>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                    <h3><?php echo $countMapel ?></h3>
                    <p style="font-size: 15px;">Total Mata Pelajaran</p>                    
                  </div>
                </div>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="?page=mapelread" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->