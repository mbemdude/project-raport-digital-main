<?php 
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case '';
        case 'home':
            file_exists('pages/home.php') ? include 'pages/home.php' : include 'pages/404.php';
            break;
        case 'santriread':
            file_exists('pages/admin/santri/santriread.php') ? include 'pages/admin/santri/santriread.php' : include "pages/404.php";
            break;
        case 'santricreate':
            file_exists('pages/admin/santri/santricreate.php') ? include 'pages/admin/santri/santricreate.php' : include "pages/404.php";
            break;
        case 'santriupdate':
            file_exists('pages/admin/santri/santriupdate.php') ? include 'pages/admin/santri/santriupdate.php' : include "pages/404.php";
            break;
        case 'santridelete':
            file_exists('pages/admin/santri/santridelete.php') ? include 'pages/admin/santri/santridelete.php' : include "pages/404.php";
            break;
        case 'gururead':
            file_exists('pages/admin/guru/gururead.php') ? include 'pages/admin/guru/gururead.php' : include "pages/404.php";
            break;
        case 'gurucreate':
            file_exists('pages/admin/guru/gurucreate.php') ? include 'pages/admin/guru/gurucreate.php' : include "pages/404.php";
            break;
        case 'guruupdate':
            file_exists('pages/admin/guru/guruupdate.php') ? include 'pages/admin/guru/guruupdate.php' : include "pages/404.php";
            break;
        case 'gurudelete':
            file_exists('pages/admin/guru/gurudelete.php') ? include 'pages/admin/guru/gurudelete.php' : include "pages/404.php";
            break;
        case 'mapelread':
            file_exists('pages/admin/mapel/mapelread.php') ? include 'pages/admin/mapel/mapelread.php' : include "pages/404.php";
            break;
        case 'mapelcreate':
            file_exists('pages/admin/mapel/mapelcreate.php') ? include 'pages/admin/mapel/mapelcreate.php' : include "pages/404.php";
            break;
        case 'mapelupdate':
            file_exists('pages/admin/mapel/mapelupdate.php') ? include 'pages/admin/mapel/mapelupdate.php' : include "pages/404.php";
            break;
        case 'mapeldelete':
            file_exists('pages/admin/mapeldelete.php') ? include 'pages/admin/mapeldelete.php' : include "pages/404.php";
            break;
        case 'kelasread':
            file_exists('pages/admin/kelas/kelasread.php') ? include 'pages/admin/kelas/kelasread.php' : include "pages/404.php";
            break;
        case 'kelascreate':
            file_exists('pages/admin/kelas/kelascreate.php') ? include 'pages/admin/kelas/kelascreate.php' : include "pages/404.php";
            break;
        case 'kelasupdate':
            file_exists('pages/admin/kelas/kelasupdate.php') ? include 'pages/admin/kelas/kelasupdate.php' : include "pages/404.php";
            break;
        case 'kelasdelete':
            file_exists('pages/admin/kelas/kelasdelete.php') ? include 'pages/admin/kelas/kelasdelete.php' : include "pages/404.php";
            break;
        case 'userread':
            file_exists('pages/admin/user/userread.php') ? include 'pages/admin/user/userread.php' : include "pages/404.php";
            break;
        case 'usercreate':
            file_exists('pages/admin/user/usercreate.php') ? include 'pages/admin/user/usercreate.php' : include "pages/404.php";
            break;
        case 'userupdate':
            file_exists('pages/admin/user/userupdate.php') ? include 'pages/admin/user/userupdate.php' : include "pages/404.php";
            break;
        case 'userdelete':
            file_exists('pages/admin/user/userdelete.php') ? include 'pages/admin/user/userdelete.php' : include "pages/404.php";
            break;
        case 'semester1':
            file_exists('pages/penilaian/semester1.php') ? include 'pages/penilaian/semester1.php' : include "pages/404.php";
            break;
        case 'semester2':
            file_exists('pages/penilaian/semester2.php') ? include 'pages/penilaian/semester2.php' : include "pages/404.php";
            break;
        case 'uts1':
            file_exists('pages/penilaian/uts1.php') ? include 'pages/penilaian/uts1.php' : include "pages/404.php";
            break;
        case 'uts1-7':
            file_exists('pages/penilaian/uts1_7.php') ? include 'pages/penilaian/uts1_7.php' : include "pages/404.php";
            break;
        case 'uts1-8':
            file_exists('pages/penilaian/uts1_8.php') ? include 'pages/penilaian/uts1_8.php' : include "pages/404.php";
            break;
        case 'uts1-9':
            file_exists('pages/penilaian/uts1_9.php') ? include 'pages/penilaian/uts1_9.php' : include "pages/404.php";
            break;
        case 'uts2':
            file_exists('pages/penilaian/uts2.php') ? include 'pages/penilaian/uts2.php' : include "pages/404.php";
            break;
        case 'uts2-7':
            file_exists('pages/penilaian/uts2_7.php') ? include 'pages/penilaian/uts2_7.php' : include "pages/404.php";
            break;
        case 'uts2-8':
            file_exists('pages/penilaian/uts2_8.php') ? include 'pages/penilaian/uts2_8.php' : include "pages/404.php";
            break;
        case 'uts2-9':
            file_exists('pages/penilaian/uts2_9.php') ? include 'pages/penilaian/uts2_9.php' : include "pages/404.php";
            break;
        case 'uas1':
            file_exists('pages/penilaian/uas1.php') ? include 'pages/penilaian/uas1.php' : include "pages/404.php";
            break;
        case 'uas1-7':
            file_exists('pages/penilaian/uas1_7.php') ? include 'pages/penilaian/uas1_7.php' : include "pages/404.php";
            break;
        case 'uas1-8':
            file_exists('pages/penilaian/uas1_8.php') ? include 'pages/penilaian/uas1_8.php' : include "pages/404.php";
            break;
        case 'uas1-9':
            file_exists('pages/penilaian/uas1_9.php') ? include 'pages/penilaian/uas1_9.php' : include "pages/404.php";
            break;
        case 'uas2':
            file_exists('pages/penilaian/uas2.php') ? include 'pages/penilaian/uas2.php' : include "pages/404.php";
            break;
        case 'uas2-7':
            file_exists('pages/penilaian/uas2_7.php') ? include 'pages/penilaian/uas2_7.php' : include "pages/404.php";
            break;
        case 'uas2-8':
            file_exists('pages/penilaian/uas2_8.php') ? include 'pages/penilaian/uas2_8.php' : include "pages/404.php";
            break;
        case 'uas2-9':
            file_exists('pages/penilaian/uas2_9.php') ? include 'pages/penilaian/uas2_9.php' : include "pages/404.php";
            break;
        default:
            include 'pages/404.php';
    }
} else {
    include 'pages/home.php';
}

?>