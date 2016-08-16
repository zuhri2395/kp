<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Dashboard Admin</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/templatemo_main.css">

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
          <li class="active"><a href="index.php"><i class="fa fa-home"></i>Dashboard</a></li>

          <!-- Menu Jadwal Penugasan -->
          <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Jadwal Penugasan <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="#">Lihat 1</a></li>
              <li><a href="#">Input</a></li>
            </ul>
          </li>
          
          <!-- Menu Surat Perintah Tugas -->
          <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-car" aria-hidden="true"></i> Surat Perintah Tugas <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="#">Lihat 2</a></li>
              <li><a href="#">Input</a></li>
            </ul>
          </li>

          <!-- Menu Surat Perintah Perjalanan Dinas -->
          <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-map-marker" aria-hidden="true"></i> Surat Perintah Perjalanan Dinas <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="#">Lihat 3</a></li>
              <li><a href="#">Input</a></li>
            </ul>
          </li>

          <!-- Menu SBP, Pegawai, Rekening, SRB, dll -->
          <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-tasks" aria-hidden="true"></i> Lainnya <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="#">Rincian Biaya</a></li>
              <li><a href="#">Biaya Perjalanan</a></li>
              <li><a href="#">Peraturan Gubernur</a></li>
              <li><a href="#">Dokumen Pelaksana Anggaran</a></li>
              <li><a href="#">Surat Penyedia Anggaran</a></li>
              <li><a href="#">Pegawai</a></li>
              <li><a href="#">Rekening</a></li>
            </ul>
          </li>
          <li><a href="tables.html"><i class="fa fa-users"></i>Manage Users</a></li>
          <li><a href="preferences.html"><i class="fa fa-cog"></i>Preferences</a></li>
          <li><a href="#" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div><!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
            <li class="active">Dashboard</li>
          </ol>
          <h1>Dashboard</h1>
          <p>Dashboard is free admin template for everyone. Credits go to <a href="http://chartjs.org">Chart JS</a>, <a href="http://getbootstrap.com">Bootstrap</a>, and <a href="http://jqvmap.com">JQVMap</a>. templatemo provides <a href="#">free website templates</a> that can be used for any purpose. Morbi id nisi enim. Ut congue interdum pharetra facilisi. Aenean consectetur pellentesque mauris nec ornare. Nam tortor just, condimentum.</p>      
          
          <div class="templatemo-panels">
            <div class="row">
              <div class="col-md-6 col-sm-6 margin-bottom-30">
                <div class="panel panel-success">
                  <div class="panel-heading">Surat Perintah Tugas</div>
                  <canvas id="templatemo-line-chart" height="120" width="500"></canvas>
                </div>
              </div>      
            </div>
          </div>    
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
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

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/templatemo_script.js"></script>
    <script type="text/javascript">
    // Line chart
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
    var lineChartData = {
      labels : ["January","February","March","April","May","June","July"],
      datasets : [
      {
        label: "My Second dataset",
        fillColor : "rgba(151,187,205,0.2)",
        strokeColor : "rgba(151,187,205,1)",
        pointColor : "rgba(151,187,205,1)",
        pointStrokeColor : "#fff",
        pointHighlightFill : "#fff",
        pointHighlightStroke : "rgba(151,187,205,1)",
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      }]
    }

    window.onload = function(){
      var ctx_line = document.getElementById("templatemo-line-chart").getContext("2d");
      window.myLine = new Chart(ctx_line).Line(lineChartData, {
        responsive: true
      });
    };
  </script>
</body>
</html>