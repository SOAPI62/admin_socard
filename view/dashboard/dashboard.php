<?php
session_start();
if (isset($_SESSION['EMAIL_UTILISATEUR'])  && isset($_SESSION['PWD_UTILISATEUR']))
{
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin SOCARD</title>
      <meta http-equiv="refresh" content="900"/>
      <meta content="width=device-width, initial-scale=1" name="viewport">
      <meta content="Webflow" name="generator">
      <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
      <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
      <link href="images/hello-icon-192.png" rel="apple-touch-icon">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="green">
      <meta name="apple-mobile-web-app-title" content="FreeCodeCamp">
      <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
      <link href="images/hello-icon-192.png" rel="apple-touch-icon">
      <link rel="icon" href="images/favicon.ico" type="image/x-icon">
      <link rel="apple-touch-icon" href="images/hello-icon-152.png">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="theme-color" content="white">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black">
      <meta name="apple-mobile-web-app-title" content="So'Shooting">
      <meta name="msapplication-TileImage" content="images/hello-icon-144.png">
      <meta name="msapplication-TileColor" content="#FFFFFF">
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Tempusdominus Bootstrap 4 -->
      <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <!-- JQVMap -->
      <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../../dist/css/adminlte.css">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
      <!-- summernote -->
      <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
      <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
      <style>
         label {
         display: inline-block;
         margin-bottom: .5rem;
         margin-top: .5rem;
         }
      </style>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Navbar top-->
         <?php
            include '../navigation/nav-top.php';
            ?>
         <!-- /.navbar top-->
         <!-- Navbar utilisateur-->
         <?php
            include '../navigation/nav-utilisateur.php';
            ?> 
         <!-- /.Navbar utilisateur-->
         <!-- Navbar left-->
         <?php
            include '../navigation/nav-left.php';
            ?>
         <!-- /.Navbar left -->
      </div>
      <!-- /.sidebar -->
      </aside>

      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0">Dashboard</h1>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
         </div>
         <!-- /.content-header -->
         <!-- Main content -->
         <section class="content">
            <div class="container-fluid">
               <!-- Small boxes (Stat box) -->
               <div class="row">
                  <div class="col-lg-6 col-6">
                     <!-- small box -->
                     <div class="small-box bg-info">
                        <div class="inner">
                           <h3 id="INSCRITS">0</h3>
                           <p>Inscrit(s)</p>
                        </div>
                        <div class="icon">
                        <i class=" ion ion-ios-people"></i>
                        </div>
                     </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-6 col-6">
                     <!-- small box -->
                     <div class="small-box bg-success">
                        <div class="inner">
                           <h3 id="PARRAINAGES">0</h3>
                           <p>Parainage(s)</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-ios-personadd"></i>
                        </div>
                     </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-warning">
                        <div class="inner">
                           <h3 id='IOS_INSCRITS'>0</h3>
                           <p>IOS</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-social-apple"></i>
                        </div>
                     </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-warning">
                        <div class="inner">
                           <h3 id='IOS_INSTALLES'>0</h3>
                           <p>IOS Installé(s)</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-upload"></i>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-danger">
                        <div class="inner">
                           <h3 id='ANDROID_INSCRITS'>0</h3>
                           <p>Android</p>
                        </div>
                        <div class="icon">
                           <i class="ion ion-social-android"></i>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-danger">
                        <div class="inner">
                           <h3 id='ANDROID_INSTALLES'>0</h3>
                           <p>Android Installé(s)</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-upload"></i>
                        </div>
                     </div>
                  </div>
                  <!-- ./col -->
               </div>
               <!-- /.row -->
               <!-- /.row (main row) -->
               <form id="form_dashboard" enctype="multipart/form-data">

               <div class="card">
                  <div class="card-header border-0">
                     <div class="d-flex justify-content-between">
                        <div class="card-body">
                        <label >Nombre de contact </label>
                        <select id="periode_contact">
                        <option value='cette semaine' selected>cette semaine</option>
                            <option value='par semaine' >par semaine</option>
                            <option value='par mois'>par mois</option>
                            <option value='par trimestre'>par trimestre</option>
                         
                        </select>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="d-flex">
                    
                        <p class="ml-auto d-flex flex-column text-right">
                           <span class="text-success">
                           <i id="pourcentage_contact" class="fas fa-arrow-up"></i> 
                           </span>
                           <span class="text-muted" id="evo-contact">Évolution J-1</span>
                        </p>
                     </div>
                     <!-- /.d-flex -->
                     <div class="position-relative mb-4">
                        <canvas id="contact-chart" height="200"></canvas>
                     </div>
                  </div>
               </div>
               
               <div class="card">
                  <div class="card-header border-0">
                     <div class="d-flex justify-content-between">
                        <div style="padding-top: 20px;">
                        <label >Nombre d'inscrits </label>
                        <select id="periode_inscrit">
                           <option value='cette semaine' selected>cette semaine</option>
                            <option value='par semaine' >par semaine</option>
                            <option value='par mois'>par mois</option>
                            <option value='par trimestre'>par trimestre</option>
                        </select>
                        </div>
                        <div class="card-body" id="liste_version">

                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="d-flex">
                    
                        <p class="ml-auto d-flex flex-column text-right">
                           <span class="text-success">
                           <i id="pourcentage_inscriptions" class="fas fa-arrow-up"></i> 
                           </span>
                           <span class="text-muted" id="evo-inscription">Évolution J-1</span>
                        </p>
                     </div>
                     <!-- /.d-flex -->
                     <div class="position-relative mb-4">
                        <canvas id="visitors-chart" height="200"></canvas>
                     </div>
                  </div>
               </div>

               <div class="card">
                  <div class="card-header border-0">
                     <div class="d-flex justify-content-between">
                        <div class="card-body">
                        <label >Nombre de connexions par </label>
                        <select id="periode_connexion">
                            <option value='semaine' selected>semaine</option>
                           <option value='mois'>mois</option>
                           <option value='trimestre'>trimestre</option>
                        </select>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="d-flex">
                     
                        <p class="ml-auto d-flex flex-column text-right">
                           <span class="text-success">
                           <i id="pourcentage_connexions" class="fas fa-arrow-up"></i> 
                           </span>
                           <span class="text-muted" id="evo-connexion">Évolution S-1</span>
                        </p>
                     </div>
                     <!-- /.d-flex -->
                     <div class="position-relative mb-4" id="canvas-reload">
                        <canvas id="visitors-chart-2" height="200"></canvas>
                     </div>
                     <!--
                        <div class="d-flex flex-row justify-content-end">
                          <span class="mr-2">
                            <i class="fas fa-square text-primary"></i> This Week
                          </span>
                        
                          <span>
                            <i class="fas fa-square text-gray"></i> Last Week
                          </span>
                        </div>
                        -->
                  </div>
                  </div>
                  <!-- PIE CHART -->
                  <div class="row">
                  <div class="card card-danger col-md-4">
                  <div class="card-header">
                     <h3 class="card-title">Version de la So'Card</h3>

                     <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                        </button>
                     </div>
                  </div>
                  <div class="card-body">
                     <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                  <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  <!-- BAR CHART -->
                  <div class="card card-success col-md-4">
                  <div class="card-header">
                     <h3 class="card-title">Parrainages / Installations</h3>

                     <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                        </button>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="chart">
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  <div class="card card-info col-md-4">
                  <div class="card-header">
                     <h3 class="card-title">Onesignal</h3>

                     <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                        </button>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="chart">
                        <canvas id="barChartOnesignal" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  </div>
                  </div>
                  
               

               </form>

            </div>
            <!-- /.container-fluid -->
         </section>
         <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php
            include '../navigation/footer.php';
      ?>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->
      <!-- jQuery -->
      <script src="../../plugins/jquery/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
         $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- ChartJS -->
      <script src="../../plugins/chart.js/Chart.min.js"></script>
      <!-- Sparkline -->
      <script src="../../plugins/sparklines/sparkline.js"></script>
      <!-- daterangepicker -->
      <script src="../../plugins/moment/moment.min.js"></script>
      <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Summernote -->
      <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../../dist/js/adminlte.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../../dist/js/demo.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <!--  AJOUT PLUGIN -->
      <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
      <script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
      <script src="../../plugins/toastr/toastr.min.js"></script>
      <!-- Bootstrap Switch -->
      <script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
      <script src="../../dist/js/pages/dashboard.js"></script>
      <script>
       
          

         // ! --------------------------------------------------------------------------------------------------
         // ! INITIALISATION DE LA LISTE DES VERSIONS
         // ! --------------------------------------------------------------------------------------------------

         $.ajax({
               url: '../../traitements/dashboard/liste_select_version.php',
                dataType: 'json',
                async: false,
                success: function(data) {
                  $('#liste_version').html(data.HTML);
                }
               }); 
         
         // ! --------------------------------------------------------------------------------------------------
         // ! AFFICHAGE DES DONNÉES STAT DE LA SOCARD
         // ! --------------------------------------------------------------------------------------------------
         
         $.ajax({
         url: '../../traitements/dashboard/dashboard.php',
         dataType: 'json',
         async: false,
         success: function(data) {
          switch (data.REPONSE) {
                case 'OK':
                    $('#IOS_INSCRITS').html(data.IOS_INSCRITS);
                    $('#IOS_INSTALLES').html(data.IOS_INSTALLES);
                    $('#ANDROID_INSCRITS').html(data.ANDROID_INSCRITS);
                    $('#ANDROID_INSTALLES').html(data.ANDROID_INSTALLES);
                    $('#PARRAINAGES').html(data.PARRAINAGES);
                    $('#INSCRITS').html(data.INSCRITS);
                    break;
                case 'KO':
                    break;
                default:
                  break;
            }
          }
         });
         
         // ! --------------------------------------------------------------------------------------------------
         // ! AFFICHAGE DES TABLEAUX GRAPHIQUES : INSCRIPTION ET CONNEXION
         // ! --------------------------------------------------------------------------------------------------

         $('#periode_inscrit').val('cette semaine');
         graphique_evolution_inscription($('#periode_inscrit').val(),-1);

         $('#periode_connexion').val('semaine');
         graphique_evolution_connexion($('#periode_connexion').val());
      
         $('#periode_contact').val('cette semaine');
         graphique_evolution_contact($('#periode_contact').val());

         // ! --------------------------------------------------------------------------------------------------
         // ! Fonction AJOUT CONTACT
         // ! --------------------------------------------------------------------------------------------------
         
         <?php
            include '../fonction/_ajout-contact.php';
         ?>
         
         // ! --------------------------------------------------------------------------------------------------
         // ! GESTION DU RELOAD GRAPHIQUE SELON PERIODE
         // ! --------------------------------------------------------------------------------------------------

         $('#periode_contact').change(function() {
            $mode =  $('#periode_contact').val();
            graphique_evolution_contact($mode);
            switch ($('#periode_contact').val()) {
              case 'cette semaine':
              $('#evo-contact').text("Évolution J-1");
              break;
              case 'par semaine':
              $('#evo-contact').text("Évolution S-1");
              break;
              case 'par mois':
              $('#evo-contact').text("Évolution M-1");
              break;
              case 'par trimestre':
              $('#evo-contact').text("Évolution T-1");
              break;
            }
         });

         // ! --------------------------------------------------------------------------------------------------
         // ! GESTION DU RELOAD GRAPHIQUE SELON PERIODE
         // ! --------------------------------------------------------------------------------------------------

         $('#periode_inscrit').change(function() {
            $mode =  $('#periode_inscrit').val();
            $version =  $('#nro_version').val();
            graphique_evolution_inscription($mode, $version);
            switch ($('#periode_inscrit').val()) {
              case 'cette semaine':
              $('#evo-inscription').text("Évolution J-1");
              break;
              case 'par semaine':
              $('#evo-inscription').text("Évolution S-1");
              break;
              case 'par mois':
              $('#evo-inscription').text("Évolution M-1");
              break;
              case 'par trimestre':
              $('#evo-inscription').text("Évolution T-1");
              break;
            }
         });

         $('#nro_version').change(function() {
            $mode =  $('#periode_inscrit').val();
            $version =  $('#nro_version').val();
            graphique_evolution_inscription($mode, $version);
            switch ($('#periode_inscrit').val()) {
              case 'cette semaine':
              $('#evo-inscription').text("Évolution J-1");
              break;
              case 'par semaine':
              $('#evo-inscription').text("Évolution S-1");
              break;
              case 'par mois':
              $('#evo-inscription').text("Évolution M-1");
              break;
              case 'par trimestre':
              $('#evo-inscription').text("Évolution T-1");
              break;
            }
         });

 
         // ! --------------------------------------------------------------------------------------------------
         // ! DETECTION DU CHANGEMENT DE LA PERIODE DE CONNEXION
         // ! --------------------------------------------------------------------------------------------------

         $('#periode_connexion').change(function() {
            $mode_conn =  $('#periode_connexion').val();
            graphique_evolution_connexion($mode_conn);
            switch ($('#periode_connexion').val()) {
              case 'semaine':
              $('#evo-connexion').text("Évolution S-1");
              break;
              case 'mois':
              $('#evo-connexion').text("Évolution M-1");
              break;
              case 'trimestre':
              $('#evo-connexion').text("Évolution T-1");
              break;
            }
         });

         // ! --------------------------------------------------------------------------------------------------
         // ! FONCTION : AFFICHAGE DES DONNÉES STAT DE LA SOCARD
         // ! --------------------------------------------------------------------------------------------------

         function graphique_evolution_inscription($mode, $version){

         $.ajax({
         url: '../../traitements/dashboard/evolution_inscriptions.php',
         data: 'mode=' + $mode + '&version=' + $version,
         dataType: 'json',
         async: false,
         success: function(data) {
                     switch (data.REPONSE) {
                           case 'OK':
                              //$periodicite = ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jui', 'Jui', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'];
                              $periodicite = data.PERIODICITE;
                              var $max     = data.MAX_INSCRIPTIONS;
                              $('#pourcentage_inscriptions').html(data.EVOLUTION_INSCRIPTIONS+'%');
         
                              var ticksStyle = {
                                 fontColor: '#495057',
                                 fontStyle: 'bold'
                              }
         
                              var mode = 'index'
                              var intersect = true
         
                              var $salesChart = $('#sales-chart')
         
                              
                              var $nb_inscrit = data.INSCRIPTIONS;
                              
                              var $visitorsChart = $('#visitors-chart')
                              // eslint-disable-next-line no-unused-vars
                              var visitorsChart = new Chart($visitorsChart, {
                                 data: {
                                 labels: $periodicite,
                                 datasets: [{
                                    type: 'line',
                                    data: $nb_inscrit,
                                    backgroundColor: 'transparent',
                                    borderColor: '#007bff',
                                    pointBorderColor: '#007bff',
                                    pointBackgroundColor: '#007bff',
                                    fill: false
                                    // pointHoverBackgroundColor: '#007bff',
                                    // pointHoverBorderColor    : '#007bff'
                                 }]
                                 },
                                 options: {
                                 maintainAspectRatio: false,
                                 "animation": {
                                       "duration": 1,
                                       "onComplete": function () {
                                          var chartInstance = this.chart,
                                          ctx = chartInstance.ctx;

                                          ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                                          ctx.textAlign = 'center';
                                          ctx.textBaseline = 'bottom';

                                          this.data.datasets.forEach(function (dataset, i) {
                                             var meta = chartInstance.controller.getDatasetMeta(i);
                                             meta.data.forEach(function (bar, index) {
                                                   var data = dataset.data[index];                            
                                                   ctx.fillText(data, bar._model.x, bar._model.y -5);
                                             });
                                          });
                                       }
                                 },
                                 tooltips: {
                                    mode: mode,
                                    intersect: intersect
                                 },
                                 hover: {
                                    mode: mode,
                                    intersect: intersect
                                 },
                                 legend: {
                                    display: false
                                 },
                                 scales: {
                                    yAxes: [{
                                       // display: false,
                                       gridLines: {
                                       display: true,
                                       lineWidth: '4px',
                                       color: 'rgba(0, 0, 0, .2)',
                                       zeroLineColor: 'transparent'
                                       },
                                       ticks: $.extend({
                                       beginAtZero: true,
                                       suggestedMax: $max*1.1
                                       }, ticksStyle)
                                    }],
                                    xAxes: [{
                                       display: true,
                                       gridLines: {
                                       display: false
                                       },
                                       ticks: ticksStyle
                                    }]
                                 }
                                 }
                              })
                           break;
                case 'KO':
                    break;
                default:
                  break;
            }
          }
         });
         }

         // ! --------------------------------------------------------------------------------------------------
         // ! FONCTION : AFFICHAGE DES DONNÉES STAT DE LA SOCARD
         // ! --------------------------------------------------------------------------------------------------

         function graphique_evolution_contact($mode)
         {
         $.ajax({
         url: '../../traitements/dashboard/evolution_contact.php',
         data: 'mode=' + $mode,
         dataType: 'json',
         async: false,
         success: function(data) {
                     switch (data.REPONSE) {
                           case 'OK':
                              $periodicite = data.PERIODICITE;
                              var $max     = data.MAX_INSCRIPTIONS ;
                              $('#pourcentage_contact').html(data.EVOLUTION_INSCRIPTIONS+'%');
          
                              var ticksStyle = {
                                 fontColor: '#495057',
                                 fontStyle: 'bold'
                              }
         
                              var mode = 'index'
                              var intersect = true
                              var $salesChart = $('#sales-chart')
                              var $nb_inscrit = data.INSCRIPTIONS;
         
                              var $visitorsChart = $('#contact-chart')
                              // eslint-disable-next-line no-unused-vars
                              var visitorsChart = new Chart($visitorsChart, {
                                 data: {
                                 labels: $periodicite,
                                 datasets: [{
                                    type: 'line',
                                    data: $nb_inscrit,
                                    backgroundColor: 'transparent',
                                    borderColor: '#007bff',
                                    pointBorderColor: '#007bff',
                                    pointBackgroundColor: '#007bff',
                                    fill: false
                                    // pointHoverBackgroundColor: '#007bff',
                                    // pointHoverBorderColor    : '#007bff'
                                 }]
                                 },
                                 options: {
                                 maintainAspectRatio: false,
                                 "animation": {
                                       "duration": 1,
                                       "onComplete": function () {
                                          var chartInstance = this.chart,
                                          ctx = chartInstance.ctx;

                                          ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                                          ctx.textAlign = 'center';
                                          ctx.textBaseline = 'bottom';

                                          this.data.datasets.forEach(function (dataset, i) {
                                             var meta = chartInstance.controller.getDatasetMeta(i);
                                             meta.data.forEach(function (bar, index) {
                                                   var data = dataset.data[index];                            
                                                   ctx.fillText(data, bar._model.x, bar._model.y -5);
                                             });
                                          });
                                       }
                                 },
                                 tooltips: {
                                    mode: mode,
                                    intersect: intersect
                                 },
                                 hover: {
                                    mode: mode,
                                    intersect: intersect
                                 },
                                 legend: {
                                    display: false
                                 },
                                 scales: {
                                    yAxes: [{
                                       gridLines: {
                                       display: true,
                                       lineWidth: '4px',
                                       color: 'rgba(0, 0, 0, .2)',
                                       zeroLineColor: 'transparent'
                                       },
                                       ticks: $.extend({
                                       beginAtZero: true,
                                       suggestedMax: $max*1.1
                                       }, ticksStyle)
                                    }],
                                    xAxes: [{
                                       display: true,
                                       gridLines: {
                                       display: false
                                       },
                                       ticks: ticksStyle
                                    }]
                                 }
                                 }
                              })
                           break;
                case 'KO':
                    break;
                default:
                  break;
            }
          }
         });
         }

         

         function graphique_evolution_connexion($mode_conn)
         {
         
            $.ajax({
            url: '../../traitements/dashboard/evolution_journal.php',
            data: 'mode=' + $mode_conn,
            dataType: 'json',
            async: false,
            success: function(data) {
                        switch (data.REPONSE) {
                              case 'OK':

                                 $periodicite                = data.PERIODICITE;
                                 var $max                    = data.MAX_CONNEXIONS;
                                 $('#pourcentage_connexions').html(data.EVOLUTION_CONNEXIONS+'%');
            
                                 var ticksStyle = {
                                    fontColor: '#495057',
                                    fontStyle: 'bold'
                                 }
            
                                 var mode = 'index'
                                 var intersect = true
            
                                 var $salesChart = $('#sales-chart')
            
                                 var $nb_connexion = data.CONNEXIONS;
            
                                 var $visitorsChart = $('#visitors-chart-2')
                                 // eslint-disable-next-line no-unused-vars
                                 var visitorsChart = new Chart($visitorsChart, {
                                    data: {
                                    labels: $periodicite,
                                    datasets: [{
                                       type: 'line',
                                       data: $nb_connexion,
                                       backgroundColor: 'transparent',
                                       borderColor: '#007bff',
                                       pointBorderColor: '#007bff',
                                       pointBackgroundColor: '#007bff',
                                       fill: false
                                       // pointHoverBackgroundColor: '#007bff',
                                       // pointHoverBorderColor    : '#007bff'
                                    }]
                                    },
                                    options: {
                                    maintainAspectRatio: false,
                                    "animation": {
                                          "duration": 1,
                                          "onComplete": function () {
                                             var chartInstance = this.chart,
                                             ctx = chartInstance.ctx;

                                             ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                                             ctx.textAlign = 'center';
                                             ctx.textBaseline = 'bottom';

                                             this.data.datasets.forEach(function (dataset, i) {
                                                var meta = chartInstance.controller.getDatasetMeta(i);
                                                meta.data.forEach(function (bar, index) {
                                                      var data = dataset.data[index];                            
                                                      ctx.fillText(data, bar._model.x, bar._model.y -5);
                                                });
                                             });
                                          }
                                    },
                                    tooltips: {
                                       mode: mode,
                                       intersect: intersect
                                    },
                                    hover: {
                                       mode: mode,
                                       intersect: intersect
                                    },
                                    legend: {
                                       display: false
                                    },
                                    scales: {
                                       yAxes: [{
                                          // display: false,
                                          gridLines: {
                                          display: true,
                                          lineWidth: '4px',
                                          color: 'rgba(0, 0, 0, .2)',
                                          zeroLineColor: 'transparent'
                                          },
                                          ticks: $.extend({
                                          beginAtZero: true,
                                          suggestedMax: $max*1.1
                                          }, ticksStyle)
                                       }],
                                       xAxes: [{
                                          display: true,
                                          gridLines: {
                                          display: false
                                          },
                                          ticks: ticksStyle
                                       }]
                                    }
                                    }
                                 })
                              break;
                  case 'KO':
                     break;
                  default:
                     break;
               }
            }
            });
         }
         
         // ! --------------------------------------------------------------------------------------------------
         // ! PIE CHART
         // ! --------------------------------------------------------------------------------------------------

   
         $.ajax({
            url: '../../traitements/dashboard/evolution_version.php',
            dataType: 'json',
            async: false,
            success: function(data) {
                        switch (data.REPONSE) {
                              case 'OK':

                                 var version         = data.VERSION;
                              
                                 var nb_version      = data.NOMBRE;
                                 var pieOptions       = {
                                    maintainAspectRatio : false,
                                    responsive : true,
                                 }
            
                                 var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
                                 
                                 new Chart(pieChartCanvas, {
                                    type: 'pie',
                                    data: {
                                    labels: version,
                                    datasets: [{
                                       data: nb_version,
                                       backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc','#6C3483'],
                                    }]
                                    },
                                    options: pieOptions
                                 })
                              break;
                  case 'KO':
                     break;
                  default:
                     break;
               }
            }
            });

         // ! --------------------------------------------------------------------------------------------------
         // ! BAR CHART TELECHARGEMENT/PARRAINAGES
         // ! --------------------------------------------------------------------------------------------------
         

         

         $.ajax({
            url: '../../traitements/dashboard/evolution_parrainage.php',
            dataType: 'json',
            async: false,
            success: function(data) {
                        switch (data.REPONSE) {
                              case 'OK':
                                 var areaChartData = {
                                    labels  : data.PERIODICITE,
                                    datasets: [
                                    {
                                       label               : 'Installations',
                                       backgroundColor     : 'rgba(60,141,188,0.9)',
                                       borderColor         : 'rgba(60,141,188,0.8)',
                                       pointRadius          : false,
                                       pointColor          : '#3b8bba',
                                       pointStrokeColor    : 'rgba(60,141,188,1)',
                                       pointHighlightFill  : '#fff',
                                       pointHighlightStroke: 'rgba(60,141,188,1)',
                                       data                : data.TELECHARGEMENT
                                    },
                                    {
                                       label               : 'Parrainages',
                                       backgroundColor     : 'rgba(210, 214, 222, 1)',
                                       borderColor         : 'rgba(210, 214, 222, 1)',
                                       pointRadius         : false,
                                       pointColor          : 'rgba(210, 214, 222, 1)',
                                       pointStrokeColor    : '#c1c7d1',
                                       pointHighlightFill  : '#fff',
                                       pointHighlightStroke: 'rgba(220,220,220,1)',
                                       data                : data.PARRAINAGE
                                    },
                                    ]
                                 }

                                 var barChartCanvas = $('#barChart').get(0).getContext('2d')
                                 var barChartData = $.extend(true, {}, areaChartData)
                                 var temp0 = areaChartData.datasets[0]
                                 var temp1 = areaChartData.datasets[1]
                                 barChartData.datasets[0] = temp0
                                 barChartData.datasets[1] = temp1

                                 var barChartOptions = {
                                    responsive              : true,
                                    maintainAspectRatio     : false,
                                    datasetFill             : false,
                                    "animation": {
                                          "duration": 1,
                                          "onComplete": function () {
                                             var chartInstance = this.chart,
                                             ctx = chartInstance.ctx;

                                             ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                                             ctx.textAlign = 'center';
                                             ctx.textBaseline = 'bottom';

                                             this.data.datasets.forEach(function (dataset, i) {
                                                var meta = chartInstance.controller.getDatasetMeta(i);
                                                meta.data.forEach(function (bar, index) {
                                                      var data = dataset.data[index];                            
                                                      ctx.fillText(data, bar._model.x, bar._model.y + 15);
                                                });
                                             });
                                          }
                                    },
                                    
                                 }

                                 new Chart(barChartCanvas, {
                                    type: 'bar',
                                    data: barChartData,
                                    options: barChartOptions,
                                 })
                                 
                              break;
                  case 'KO':
                     break;
                  default:
                     break;
               }
            }
            });


            // ! --------------------------------------------------------------------------------------------------
         // ! BAR CHART ONESIGNAL
         // ! --------------------------------------------------------------------------------------------------
         

         

         $.ajax({
            url: '../../traitements/dashboard/evolution_onesignal.php',
            dataType: 'json',
            async: false,
            success: function(data) {
                        switch (data.REPONSE) {
                              case 'OK':
                                 var areaChartData = {
                                    labels  : data.PERIODICITE,
                                    datasets: [
                                    {
                                       label               : 'Nombre de clients',
                                       backgroundColor     : 'rgba(60,141,188,0.9)',
                                       borderColor         : 'rgba(60,141,188,0.8)',
                                       pointRadius          : false,
                                       pointColor          : '#3b8bba',
                                       pointStrokeColor    : 'rgba(60,141,188,1)',
                                       pointHighlightFill  : '#fff',
                                       pointHighlightStroke: 'rgba(60,141,188,1)',
                                       data                : data.NB_SOUSCRIT
                                    },
                                    {
                                       label               : 'Nombre de sessions',
                                       backgroundColor     : 'rgba(210, 214, 222, 1)',
                                       borderColor         : 'rgba(210, 214, 222, 1)',
                                       pointRadius         : false,
                                       pointColor          : 'rgba(210, 214, 222, 1)',
                                       pointStrokeColor    : '#c1c7d1',
                                       pointHighlightFill  : '#fff',
                                       pointHighlightStroke: 'rgba(220,220,220,1)',
                                       data                : data.SESSIONS
                                    }
                                    ]
                                 }

                                 var barChartCanvas = $('#barChartOnesignal').get(0).getContext('2d')
                                 var barChartData = $.extend(true, {}, areaChartData)
                                 var temp0 = areaChartData.datasets[0]
                                 var temp1 = areaChartData.datasets[1]
                                 barChartData.datasets[0] = temp0
                                 barChartData.datasets[1] = temp1
                                 
                                 var barChartOptions = {
                                    responsive              : true,
                                    maintainAspectRatio     : false,
                                    datasetFill             : false,
                                    "animation": {
                                          "duration": 1,
                                          "onComplete": function () {
                                             var chartInstance = this.chart,
                                             ctx = chartInstance.ctx;

                                             ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                                             ctx.textAlign = 'center';
                                             ctx.textBaseline = 'bottom';

                                             this.data.datasets.forEach(function (dataset, i) {
                                                var meta = chartInstance.controller.getDatasetMeta(i);
                                                meta.data.forEach(function (bar, index) {
                                                      var data = dataset.data[index];                            
                                                      ctx.fillText(data, bar._model.x, bar._model.y + 15);
                                                });
                                             });
                                          }
                                    },
                                    
                                 }

                                 new Chart(barChartCanvas, {
                                    type: 'bar',
                                    data: barChartData,
                                    options: barChartOptions,
                                 })
                                 
                              break;
                  case 'KO':
                     break;
                  default:
                     break;
               }
            }
            });

         // ! --------------------------------------------------------------------------------------------------
         // ! FONCTION : ONESIGNAL
         // ! --------------------------------------------------------------------------------------------------
               
         <?php
            include '../fonction/_import-onesignal.php';
         ?>
          
         // ! --------------------------------------------------------------------------------------------------
         // ! FONCTION : VERIFICATION VALIDITE DE L ADRESSE MAIL
         // ! --------------------------------------------------------------------------------------------------
         
         function checkEmail(email) {
             var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
             return re.test(email);
         }

         // ! --------------------------------------------------------------------------------------------------
         // ! FONCTION : VERIFICATION VALIDITE DU NUMERO DE TEL
         // ! --------------------------------------------------------------------------------------------------
         
         function checkPhone(num) {
            if(num.indexOf('+33')!=-1){
               num = num.replace('+33', '0');
            }
            var re = /^0[1-7]\d{8}$/;
            return re.test(num);
         }

         // ! --------------------------------------------------------------------------------------------------
         // ! FONCTION : TEST DE LA VALIDITE D UNE ADRESSE MAIL
         // ! --------------------------------------------------------------------------------------------------

         function validate(email) {         
             if (checkEmail(email)) {
                 return true
             } else {
              return false;
             }
         }

         // ! --------------------------------------------------------------------------------------------------
         // ! FONCTION : DECONNEXION
         // ! --------------------------------------------------------------------------------------------------
               
         <?php
            include '../fonction/_deconnexion.php';
         ?>

      </script>
   </body>
</html>
<?php 
}
else { header( 'Location: ../../index.php');}
?>