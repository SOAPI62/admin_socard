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
      <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
            include '../navigation/nav-top-dashboard.php';
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
                        <label >Nombre d'inscriptions : </label>
                        <select id="periode_inscription_">
                           <option value='semaine' selected>Cette semaine</option>
                        </select>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
              
                     <!-- /.d-flex -->
                     <div class="position-relative mb-4" id="canvas-reload">
                        <canvas id="visitors-chart-3" height="200"></canvas>
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
               
               <div class="card">
                  <div class="card-header border-0">
                     <div class="d-flex justify-content-between">
                        <div class="card-body">
                        <label >Nombre d'inscrits par </label>
                        <select id="periode_inscrit">
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
                           <i id="pourcentage_inscriptions" class="fas fa-arrow-up"></i> 
                           </span>
                           <span class="text-muted" id="evo-inscription">Évolution S-1</span>
                        </p>
                     </div>
                     <!-- /.d-flex -->
                     <div class="position-relative mb-4">
                        <canvas id="visitors-chart" height="200"></canvas>
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
         // ! INITIALISATION DE LA LISTE DES MESSAGES SMS DANS LE CAS D UN AJOUT D UN CONTACT
         // ! --------------------------------------------------------------------------------------------------

         $.ajax({
               url: '../../traitements/contact/liste_select_messages.php',
                dataType: 'json',
                async: false,
                success: function(data) {
                  $('#BLK_ZONE_SOCARD').html(data.HTML);
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

         $('#periode_inscrit').val('semaine');
         graphique_evolution_inscription($('#periode_inscrit').val());

         $('#periode_connexion').val('semaine');
         graphique_evolution_connexion($('#periode_connexion').val());
         
         $('#periode_inscription_').val('semaine');
         graphique_evolution_inscription_($('#periode_inscription_').val());

         // ! --------------------------------------------------------------------------------------------------
         // ! DETECTION CHANGEMENT DU TYPE DE CONTACT
         // ! --------------------------------------------------------------------------------------------------
         
         $( "#CONTACT_PAR" ).change(function() {
         
          switch ($('#CONTACT_PAR').val()) {
              case 'TEL':
              $('#BLK_TEL').show();
              $('#BLK_MAIL').hide();
              break;
              case 'MAIL':
              $('#BLK_TEL').hide();
              $('#BLK_MAIL').show();
              break;
              case 'MSG':
              $('#BLK_TEL').hide();
              $('#BLK_MAIL').hide();
              break;
          }
         });
         
         // ! --------------------------------------------------------------------------------------------------
         // ! PROCEDURE : AJOUT D UN CONTACT
         // ! --------------------------------------------------------------------------------------------------
         
         $('#AJOUT_CONTACT').click(function() {
         
            message_anomalie = "";
         
            switch ($('#CONTACT_PAR').val()) {
              case 'TEL':
               if ($ajout_POR_CLIENT.trim() == "")
               {
                  message_anomalie = "Téléphone non renseigné !";
               }
               break;
              case 'MAIL':
               if ($ajout_EMAIL_CLIENT.trim() != "")
               {
                  if (!checkEmail($ajout_EMAIL_CLIENT))
                  {
                     message_anomalie = "Adresse mail non conforme !";
                  }
               }
               else
               {
                  message_anomalie = "Adresse mail non renseigné !";
               }
               break;
              case 'MSG':
              break;
          }
         
          if (message_anomalie != '')
          {
            toastr.warning(message_anomalie);
          }
          else
          {
            $.ajax({
                url: '../../../../_creagcom/base/AJAX/clients/prospect_ajout.php',
                data: 'ajout_ORI_CLIENT=' + $ajout_ORI_CLIENT +
                    '&ajout_TYP_CLIENT=' + $ajout_TYP_CLIENT +
                    '&ajout_CIV1_CLIENT=' + $ajout_CIV1_CLIENT +
                    '&ajout_NOM1_CLIENT=' + $ajout_NOM1_CLIENT +
                    '&ajout_PNOM1_CLIENT=' + $ajout_PNOM1_CLIENT +
                    '&ajout_CIV2_CLIENT=' + $ajout_CIV2_CLIENT +
                    '&ajout_NOM2_CLIENT=' + $ajout_NOM2_CLIENT +
                    '&ajout_PNOM2_CLIENT=' + $ajout_PNOM2_CLIENT +
                    '&ajout_TEL_CLIENT=' + $ajout_TEL_CLIENT +
                    '&ajout_POR_CLIENT=' + $ajout_POR_CLIENT +
                    '&ajout_ADR1_CLIENT=' + $ajout_ADR1_CLIENT +
                    '&ajout_ADR2_CLIENT=' + $ajout_ADR2_CLIENT +
                    '&ajout_CPOSTAL_CLIENT=' + $ajout_CPOSTAL_CLIENT +
                    '&ajout_VILLE_CLIENT=' + $ajout_VILLE_CLIENT +
                    '&ajout_EMAIL_CLIENT=' + $ajout_EMAIL_CLIENT + 
                    '&ajout_COMMENTAIRE_CLIENT=' + $ajout_COMMENTAIRE_CLIENT + 
                    '&ajout_SUPPORT_COM=SOCARD' ,
                dataType: 'json',
                async: false,
                success: function(data) {
                    switch (data.REPONSE) {
                        case 'OK':
                            toastr.success('Ajout du Contact !')
                            $('#structure_modale').modal('toggle');
                            break;
                        case 'KO':
                            toastr.warning(data.MESS_ERR);
                            break;
                        default:
                          break;
                    }
                }
            });
         
             // ! ENVOIE DE LA SOCARD SI CONTACT PAR TELEPHONE UNIQUEMENT !
         
            var remember = document.getElementById('ENVOI_SOCARD');
            $type_contact = $('#CONTACT_PAR').val();
         
            if ((remember.checked == 1) && ($type_contact == 'TEL'))
            {
              $.ajax({
                url: '../../traitements/contact/envoi_sms_socard.php',
                data: 'nro_tel=' + $ajout_POR_CLIENT + '&type_message=' + $('#SOCARD').val(),
                dataType: 'json',
                async: false,
                success: function(data) {
                    switch (data.REPONSE) {
                        case 'OK':
                          toastr.success('Sms envoyé au contact!')
                          break;
                        case 'ERREUR':
                          toastr.warning('Sms non envoyé ! ' + data.CODE_ERR);
                          break;
                        default:
                          break;
                    }
                }
               });    
            }
          }
         });
         
         // ! --------------------------------------------------------------------------------------------------
         // ! INITIALISATION DES CHAMPS DE LA MODALE "CONTACT" SI CLICK SUR LE BOUTON RACCOURCI
         // ! --------------------------------------------------------------------------------------------------
         
         $('#BTN_AJOUT_CONTACT').click(function() {
            $('#BLK_TEL').show();
            $('#BLK_MAIL').hide();
            $('#BLK_ZONE_REMARQUES').hide();
         
            $('#NRO_TEL').val('');
            $('#EMAIL').val('');
            $('#NOM_CONTACT').val('');
            $('#PRENOM_CONTACT').val('');
            $('#TYPE_CONTACT').val('NC');
            $('#BLK_ZONE_REMARQUES').val('');
         
            $('#ajout_contact_modale').modal('toggle');
         });
         
         // ! --------------------------------------------------------------------------------------------------
         // ! GESTION DES CLICK SUR LA MODALE "CONTACT" POUR OPTIMISER L AFFICHAGE
         // ! --------------------------------------------------------------------------------------------------
         
         $('#BLK_TYPE_CONTACT').click(function() {
          $('#BLK_ZONE_TYPE_CONTACT').toggle();
         });
          
         $('#BLK_IDENTITE').click(function() {
          $('#BLK_ZONE_IDENTITE').toggle();
         });
         
         $('#BLK_REMARQUES').click(function() {
          $('#BLK_ZONE_REMARQUES').toggle();
         });
         
         $('#ENVOI_SOCARD').change(function() {
           $('#BLK_ZONE_SOCARD').toggle();
         })
         
         $('#BLK_CONTACT_PAR').click(function() {
           $('#BLK_ZONE_CONTACT_PAR').toggle();
         })
         
         // ! --------------------------------------------------------------------------------------------------
         // ! GESTION DU RELOAD GRAPHIQUE SELON PERIODE
         // ! --------------------------------------------------------------------------------------------------

         $('#periode_inscrit').change(function() {
            $mode =  $('#periode_inscrit').val();
            graphique_evolution_inscription($mode);
            switch ($('#periode_inscrit').val()) {
              case 'semaine':
              $('#evo-inscription').text("Évolution S-1");
              break;
              case 'mois':
              $('#evo-inscription').text("Évolution M-1");
              break;
              case 'trimestre':
              $('#evo-inscription').text("Évolution T-1");
              break;
            }
         });

         // ! --------------------------------------------------------------------------------------------------
         // ! GENERATION DU GRAPHISME : NOMBRE D INSCRIPTION POUR CHAQUE JOUR DE LA SEMAINE ENCOURS
         // ! --------------------------------------------------------------------------------------------------

         $('#periode_inscription_').change(function() {
            $mode =  $('#periode_inscription_').val();
            graphique_evolution_inscription_($('#periode_inscription_').val());
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

         function graphique_evolution_inscription($mode){

         $.ajax({
         url: '../../traitements/dashboard/evolution_inscriptions.php',
         data: 'mode=' + $mode,
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
                                       suggestedMax: $max
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

         function graphique_evolution_inscription_($mode)
         {
         $.ajax({
         url: '../../traitements/dashboard/evolution_inscriptions_.php',
         data: 'mode=' + $mode,
         dataType: 'json',
         async: false,
         success: function(data) {
                     switch (data.REPONSE) {
                           case 'OK':
                              $periodicite = data.PERIODICITE;
                              var $max     = data.MAX_INSCRIPTIONS;
          
                              var ticksStyle = {
                                 fontColor: '#495057',
                                 fontStyle: 'bold'
                              }
         
                              var mode = 'index'
                              var intersect = true
                              var $salesChart = $('#sales-chart')
                              var $nb_inscrit = data.INSCRIPTIONS;
         
                              var $visitorsChart = $('#visitors-chart-3')
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
                                       suggestedMax: $max
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
                                          suggestedMax: $max
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
         // ! FONCTION : VERIFICATION VALIDITE DE L ADRESSE MAIL
         // ! --------------------------------------------------------------------------------------------------
         
         function checkEmail(email) {
             var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
             return re.test(email);
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