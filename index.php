<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>Dashboard Admin</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/templatemo_main.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>

    <!--
    Dashboard Template
    http://www.templatemo.com/preview/templatemo_415_dashboard
    -->

</head>
<body>
<div class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
        <div class="logo"><h1>Dashboard - Admin</h1></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
</div>
<div class="template-page-wrapper">
    <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
            <li id="dashboard"><a href="index.php"><i class="fa fa-home"></i>Dashboard</a></li>

            <!-- Menu Jadwal Penugasan -->
            <li class="sub" id="jadwal">
                <a href="javascript:;">
                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Jadwal Penugasan
                    <div class="pull-right"><span class="caret"></span></div>
                </a>
                <ul class="templatemo-submenu">
                    <li><a href="index.php?posisi=jadwal">Lihat</a></li>
                    <li><a href="index.php?posisi=jadwal&type=insert">Input</a></li>
                </ul>
            </li>

            <!-- Menu Surat Perintah Tugas -->
            <li class="sub" id="spt">
                <a href="javascript:;">
                    <i class="fa fa-car" aria-hidden="true"></i> Surat Perintah Tugas
                    <div class="pull-right"><span class="caret"></span></div>
                </a>
                <ul class="templatemo-submenu">
                    <li><a href="index.php?posisi=spt">Lihat</a></li>
                    <li><a href="index.php?posisi=spt&type=insert">Input</a></li>
                </ul>
            </li>

            <!-- Menu Surat Perintah Perjalanan Dinas -->
            <li class="sub" id="sppd">
                <a href="javascript:;">
                    <i class="fa fa-map-marker" aria-hidden="true"></i> Surat Perintah Perjalanan Dinas
                    <div class="pull-right"><span class="caret"></span></div>
                </a>
                <ul class="templatemo-submenu">
                    <li><a href="index.php?posisi=sppd">Lihat</a></li>
                    <li><a href="index.php?posisi=sppd&type=insert">Input</a></li>
                </ul>
            </li>

            <!-- Menu SBP, Pegawai, Rekening, SRB, dll -->
            <li class="sub" id="lainnya">
                <a href="javascript:;">
                    <i class="fa fa-tasks" aria-hidden="true"></i> Lainnya
                    <div class="pull-right"><span class="caret"></span></div>
                </a>
                <ul class="templatemo-submenu">
                    <li><a href="index.php?posisi=rincianbiaya">Rincian Biaya</a></li>
                    <li><a href="index.php?posisi=buktipengeluaran">Bukti Pengeluaran</a></li>
                    <li><a href="index.php?posisi=pergub">Peraturan Gubernur</a></li>
                    <li><a href="index.php?posisi=dpa">Dokumen Pelaksana Anggaran</a></li>
                    <li><a href="index.php?posisi=pegawai">Pegawai</a></li>
                    <li><a href="index.php?posisi=rekening">Rekening</a></li>
                </ul>
            </li>
            <li id="users"><a href="tables.html"><i class="fa fa-users"></i>Manage Users</a></li>
            <li id="pref"><a href="preferences.html"><i class="fa fa-cog"></i>Preferences</a></li>
            <li><a href="#" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a>
            </li>
        </ul>
    </div><!--/.navbar-collapse -->

    <?php
      if(!isset($_GET['posisi'])) {
        require_once 'overview.php';
      }

      /* Jadwal Dinas */
      else if(($_GET['posisi'] == "jadwal") && ((!isset($_GET['posisi'])) || (!isset($_GET['type'])))) {
        require_once 'view/jadwal.php';
      } else if(($_GET['posisi'] == "jadwal") && ($_GET['type'] == "insert")) {
        require_once 'input/jadwal.php';
      } else if(($_GET['posisi'] == "jadwal") && ($_GET['type'] == "edit") && (isset($_GET['no']))) {
        require_once 'edit/jadwal.php';
      }

      /* SPT */
      else if(($_GET['posisi'] == "spt") && ((!isset($_GET['posisi'])) || (!isset($_GET['type'])))) {
        require_once 'view/spt.php';
      } else if(($_GET['posisi'] == "spt") && ($_GET['type'] == "insert")) {
        require_once 'input/spt.php';
      } else if(($_GET['posisi'] == "spt") && ($_GET['type'] == "edit") && (isset($_GET['nospt']))) {
        require_once 'edit/spt.php';
      }

      /* SPPD */
      else if(($_GET['posisi'] == "sppd") && ((!isset($_GET['posisi'])) || (!isset($_GET['type'])))) {
        require_once 'view/sppd.php';
      } else if(($_GET['posisi'] == "sppd") && ($_GET['type'] == "insert")) {
        require_once 'input/sppd.php';
      } else if(($_GET['posisi'] == "sppd") && ($_GET['type'] == "edit") && (isset($_GET['nosppd']))) {
        require_once 'edit/sppd.php';
      }

      /* RINCIAN BIAYA */
      else if(($_GET['posisi'] == "rincianbiaya") && ((!isset($_GET['posisi'])) || (!isset($_GET['type'])))) {
        require_once 'view/rincianbiaya.php';
      } else if(($_GET['posisi'] == "rincianbiaya") && ($_GET['type'] == "insert")) {
        require_once 'input/rincianbiaya.php';
      } else if(($_GET['posisi'] == "rincianbiaya") && ($_GET['type'] == "edit") && (isset($_GET['norincian']))) {
        require_once 'edit/rincianbiaya.php';
      }

      /* BUKTI PENGELUARAN */
      else if(($_GET['posisi'] == "buktipengeluaran") && ((!isset($_GET['posisi'])) || (!isset($_GET['type'])))) {
        require_once 'view/buktipengeluaran.php';
      } else if(($_GET['posisi'] == "buktipengeluaran") && ($_GET['type'] == "insert")) {
        require_once 'input/buktipengeluaran.php';
      } else if(($_GET['posisi'] == "buktipengeluaran") && ($_GET['type'] == "edit") && (isset($_GET['nobuktipengeluaran']))) {
        require_once 'edit/buktipengeluaran.php';
      }

      /* REKENING */
      else if(($_GET['posisi'] == "rekening") && ((!isset($_GET['posisi'])) || (!isset($_GET['type'])))) {
        require_once 'view/rekening.php';
      } else if(($_GET['posisi'] == "rekening") && ($_GET['type'] == "insert")) {
        require_once 'input/rekening.php';
      } else if(($_GET['posisi'] == "rekening") && ($_GET['type'] == "edit") && (isset($_GET['nomorRekening']))) {
        require_once 'edit/rekening.php';
      }

      /* PERATURAN GUBERNUR */
      else if(($_GET['posisi'] == "pergub") && ((!isset($_GET['posisi'])) || (!isset($_GET['type'])))) {
        require_once 'view/pergub.php';
      } else if(($_GET['posisi'] == "pergub") && ($_GET['type'] == "insert")) {
        require_once 'input/pergub.php';
      } else if(($_GET['posisi'] == "pergub") && ($_GET['type'] == "edit") && (isset($_GET['noPergub']))) {
        require_once 'edit/pergub.php';
      }

      /* DPA */
      else if(($_GET['posisi'] == "dpa") && ((!isset($_GET['posisi'])) || (!isset($_GET['type'])))) {
        require_once 'view/dpa.php';
      } else if(($_GET['posisi'] == "dpa") && ($_GET['type'] == "insert")) {
        require_once 'input/dpa.php';
      } else if(($_GET['posisi'] == "dpa") && ($_GET['type'] == "edit") && (isset($_GET['noDPA']))) {
        require_once 'edit/dpa.php';
      }

      /* PEGAWAI */
      else if(($_GET['posisi'] == "pegawai") && ((!isset($_GET['posisi'])) || (!isset($_GET['type'])))) {
        require_once 'view/pegawai.php';
      } else if(($_GET['posisi'] == "pegawai") && ($_GET['type'] == "insert")) {
        require_once 'input/pegawai.php';
      } else if(($_GET['posisi'] == "pegawai") && ($_GET['type'] == "edit") && (isset($_GET['nip']))) {
        require_once 'edit/pegawai.php';
      }

    ?>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Are you sure you want to sign out?</h4>
                </div>
                <div class="modal-footer">
                    <a href="logout.php" class="btn btn-primary">Yes</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    <footer class="templatemo-footer">
        <div class="templatemo-copyright">
            <p>Copyright &copy; 2016 - Dinas Perhubungan, Komunikasi dan Informasi Provinsi Jawa Tengah</p>
        </div>
    </footer>
</div>

<script src="js/templatemo_script.js"></script>
<script type="text/javascript">
  var type = "<?php echo (isset($_GET['posisi']) ? $_GET['posisi'] : false) ?>"
  if(type == false) {
    $('#dashboard').addClass("active");
  } else if(type == "dpa" || type == "pergub" || type == "rekening" || type == "pegawai" || type == "buktipengeluaran" || type == "rincianbiaya") {
    $('#lainnya').addClass("open");
    $('#lainnya').addClass("active");
  } else {
    $('#' + type).addClass("open");
    $('#' + type).addClass("active");
  }
</script>
</body>
</html>