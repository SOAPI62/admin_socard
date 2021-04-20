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
         <!-- Navbar -->
         <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
               </li>
               <li class="nav-item dropdown">
                  <a id="BTN_AJOUT_CONTACT" class="nav-link"  data-toggle="modal">
                  <i class="fas fa-user-plus"></i></i>
                  </a>
               </li>
            </ul>
         </nav>
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
            <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin So'Card </span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
               <!-- Sidebar user panel (optional) -->
               <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                     <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                     <a href="#" class="d-block">So Shooting</a>
                  </div>
               </div>
               <!-- Sidebar Menu -->
               <?php
                  include '../navigation/nav-left.php';
               ?>
               <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
         </aside>
         <!-- -------------------------------------------------------------------------------------------------------- -->
         <!-- AJOUT D UN CONTACT ( RACCOURCI )                                                                         -->
         <!-- -------------------------------------------------------------------------------------------------------- -->
         <div class="modal fade" id="ajout_contact_modale">
            <div class="modal-dialog modal-xl">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Ajout un contact</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label>Envoyer la SOCARD</label>
                        <input type="checkbox" id="ENVOI_SOCARD" checked >
                        <div id="BLK_ZONE_SOCARD">
                           <select id="SOCARD" class="form-control select2" style="width: 100%;">
                              <option value="01" selected="selected">Je ne suis pas disponibile ...</option>
                              <option value="02">Vous avez essayé de me joindre ...</option>
                              <option value="03">Suite à notre conversation ...</option>
                              <option value="04">Je vous communique ma carte ...</option>
                              <option value="05">Suite à votre passage à l agence ...</option>
                              <option value="06">Suite à votre commande ...</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
  
                        <div class="form-group">
                           <label id="BLK_CONTACT_PAR">Support de contact + </label>
                           <select  id="CONTACT_PAR" class="form-control select2" style="width: 100%;" style="display: none;">
                              <option value="TEL" selected="selected">Téléphone</option>
                              <option value="MAIL">Mail</option>
                              <option value="MSG">Messenger</option>
                              <option value="SMS">Sms</option>
                           </select>
                        </div>
                        <div id="BLK_ZONE_CONTACT_PAR">
                           <div class="form-group" id="BLK_TEL">
                              <div class="input-group" >
                                 <input id="NRO_TEL" type="tel" class="form-control" placeholder="Saisir le numéro de téléphone">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group" id="BLK_MAIL">
                              <div class="input-group">
                                 <input id="EMAIL" type="email" class="form-control" placeholder="Saisir l adresse mail">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group" >
                           <label id="BLK_TYPE_CONTACT">Type contact +</label>
                           <div id="BLK_ZONE_TYPE_CONTACT" style="display: none;">
                              <select id="TYPE_CONTACT" class="form-control select2" style="width: 100%;">
                                 <option value="NC" selected="selected">Non connu</option>
                                 <option value="PART">Particulier</option>
                                 <option value="PRO">Professsionnel</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group" >
                           <label id="BLK_IDENTITE">Identité +</label>
                           <div id="BLK_ZONE_IDENTITE" style="display: none;">
                              <div class="input-group" >
                                 <input id="NOM_CONTACT" type="text" class="form-control" placeholder="Nom" style="text-transform: uppercase">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                 </div>
                              </div>
                              </br>
                              <div class="input-group" >
                                 <input id="PRENOM_CONTACT" type="text" class="form-control"  placeholder="Prénom" style="text-transform: uppercase">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group"  >
                           <label id="BLK_REMARQUES">Remarques + </label>
                           <textarea id="BLK_ZONE_REMARQUES" class="form-control" rows="2" placeholder="..." style="text-transform: uppercase"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button id="AJOUT_CONTACT" type="button" class="btn btn-primary">Ajouter</button>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- -------------------------------------------------------------------------------------------------------- -->
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
                              <i class="ion ion-bag"></i>
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
                              <i class="ion ion-stats-bars"></i>
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
                              <i class="ion ion-person-add"></i>
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
                              <i class="ion ion-pie-graph"></i>
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
                              <i class="ion ion-pie-graph"></i>
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
                              <i class="ion ion-pie-graph"></i>
                           </div>
                        </div>
                     </div>
                     <!-- ./col -->
                  </div>
                  <!-- /.row -->
                  <!-- /.row (main row) -->
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <footer class="main-footer">
            www.so-api.com
         </footer>
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

         // --------------------------------------------------------------------------------------------------
         // AFFICHAGE DES DONNÉES STAT DE LA SOCARD
         // --------------------------------------------------------------------------------------------------
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
         
         // --------------------------------------------------------------------------------------------------
         // DETECTION CHANGEMENT DU TYPE DE CONTACT
         // --------------------------------------------------------------------------------------------------

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
         
         // --------------------------------------------------------------------------------------------------
         // PROCEDURE : AJOUT D UN CONTACT
         // --------------------------------------------------------------------------------------------------

         $('#AJOUT_CONTACT').click(function() {
         
            var $ajout_ORI_CLIENT = $('#CONTACT_PAR').val();
            var $ajout_TYP_CLIENT = $('#TYPE_CONTACT').val();
            var $ajout_CIV1_CLIENT = '';
            var $ajout_NOM1_CLIENT = $('#NOM_CONTACT').val();
            var $ajout_PNOM1_CLIENT = $('#PRENOM_CONTACT').val();
            var $ajout_CIV2_CLIENT = '';
            var $ajout_NOM2_CLIENT = '';
            var $ajout_PNOM2_CLIENT = '';
            var $ajout_TEL_CLIENT = '';
            var $ajout_POR_CLIENT = $('#NRO_TEL').val();
            var $ajout_EMAIL_CLIENT = $('#EMAIL').val();
            var $ajout_ADR1_CLIENT = '';
            var $ajout_ADR2_CLIENT = '';
            var $ajout_CPOSTAL_CLIENT = '';
            var $ajout_VILLE_CLIENT = '';
            var $ajout_COMMENTAIRE_CLIENT = $('#BLK_ZONE_REMARQUES').val();
         
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
                url: '../../../_creagcom/base/AJAX/clients/prospect_ajout.php',
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
                    '&ajout_COMMENTAIRE_CLIENT=' + $ajout_COMMENTAIRE_CLIENT,
                dataType: 'json',
                async: false,
                success: function(data) {
                    switch (data.REPONSE) {
                        case 'OK':
                            toastr.success('Ajout du Contact !')
                            $('#ajout_contact_modale').modal('toggle');
                            break;
                        case 'KO':
                            toastr.warning(data.MESS_ERR);
                            break;
                        default:
                          break;
                    }
                }
            });

             // ENVOIE DE LA SOCARD SI CONTACT PAR TELEPHONE UNIQUEMENT !

            var remember = document.getElementById('ENVOI_SOCARD');
            $type_contact = $('#CONTACT_PAR').val();

            if ((remember.checked == 1) && ($type_contact == 'TEL'))
            {
              $.ajax({
                url: '../../../_creagcom/base/AJAX/socard/envoi_sms_socard.php',
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
         
         // --------------------------------------------------------------------------------------------------
         // INITIALISATION DES CHAMPS DE LA MODALE "CONTACT" SI CLICK SUR LE BOUTON RACCOURCI
         // --------------------------------------------------------------------------------------------------

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

         // --------------------------------------------------------------------------------------------------
         // GESTION DES CLICK SUR LA MODALE "CONTACT" POUR OPTIMISER L AFFICHAGE
         // --------------------------------------------------------------------------------------------------

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

         // --------------------------------------------------------------------------------------------------
         // FONCTION : VERIFICATION VALIDITE DE L ADRESSE MAIL
         // --------------------------------------------------------------------------------------------------

        function checkEmail(email) {
             var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
             return re.test(email);
         }
         function validate(email) {         
             if (checkEmail(email)) {
                 return true
             } else {
              return false;
             }
         }
      </script>
   </body>
</html>
