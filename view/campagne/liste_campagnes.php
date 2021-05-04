<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin So Card| Structure</title>
      <meta content="width=device-width, initial-scale=1" name="viewport">
      <meta content="Webflow" name="generator">
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
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <!-- Site wrapper -->
      <div class="wrapper">
         <!-- Navbar top -->
         <?php
            include '../navigation/nav-top.php';
            ?>
         <!-- /.navbar top -->
         <!-- Navbar utilisateur -->
         <?php
            include '../navigation/nav-utilisateur.php';
            ?>   
         <!-- /.Navbar utilisateur -->
         <!-- Navbar left -->
         <?php
            include '../navigation/nav-left.php';
            ?>
         <!-- /.Navbar left -->
      </div>
      <!-- /.sidebar -->
      </aside>

    <!-- -------------------------------------------------------------------------------------------------------- -->
    <!-- LISTE DES CAMPAGNES                                                                                       -->
    <!-- -------------------------------------------------------------------------------------------------------- -->

      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="h1-responsive">Liste des campagnes</h1>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <div class="card-body p-0">
            <button id="BTN_AJOUT_CAMPAGNE" type="button" class="btn btn-primary">Ajouter</button>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="page-content">
               <!-- Panel Table Add Row -->
               <!-- Default box -->
               <table id="liste_campagnes" style="width:100%" class="cell-border order-column hover">
                  <thead>
                     <tr>
                        <th>Action</th>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Date d'emission</th>
                        <th>Nb d'émission</th>
                        <th>Actif</th>
                     </tr>
                  </thead>
               </table>
         </section>
         <!-- /.content -->
         </div>

         <!-- -------------------------------------------------------------------------------------------------------- -->
         <!-- AJOUT D UNE CAMPAGNE                                                                                     -->                                                           
         <!-- -------------------------------------------------------------------------------------------------------- -->

         <div class="modal fade" id="ajout_campagne_modale">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div id="DIV_ALERT" class="alert alert-warning alert-dismissible">
                    <h5>Attention !</h5>
                    <label>Vous n'avez pas assez de crédits !</label>
                    </div>
                    <div class="modal-header">
                        <h4 class="modal-title">Ajout d'une campagne SMS</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Nom de la campagne</label>
                        <div class="input-group" >
                            <input id="NOM_CAMPAGNE" type="text" class="form-control" placeholder="Saisir le nom de la campagne" style="text-transform: uppercase">
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="form-group">
                            <label>Date et heure d'émission</label>
                            <input id="DATE_EMISSION" type="date" value="<?php echo date('Y-m-d'); ?>">
                            <input id="HEURE_EMISSION" type="time" value="<?php echo date('H:i'); ?>">
                        </div>
                        <div class="form-group"  >
                            <label >Message </label>
                            <label id="NB_CARACTERES_RESTANTS">[000]</label>
                            <textarea id="BLK_ZONE_MESSAGE" class="form-control" rows="5" placeholder="..." ></textarea>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="VALIDATION_CAMPAGNE" type="button" class="btn btn-success">Valider</button>
                        <button id="ANNULATION_CAMPAGNE" type="button" class="btn btn-primary btn-info">Annuler</button>
                        <button id="TEST_CAMPAGNE" type="button" class="btn btn-primary btn-custom">Tester</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>         

         <!-- -------------------------------------------------------------------------------------------------------- -->
         <!-- EDITION D UNE CAMPAGNE                                                                                     -->                                                           
         <!-- -------------------------------------------------------------------------------------------------------- -->

         <div class="modal fade" id="maj_campagne_modale">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Mise à jour d'une campagne SMS</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Nom de la campagne</label>
                        <div class="input-group" >
                            <input id="MAJ_NOM_CAMPAGNE" type="text" class="form-control" placeholder="Saisir le nom de la campagne" style="text-transform: uppercase">
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="form-group">
                            <label>Date d'émission</label>
                            <input id="MAJ_DATE_EMISSION" type="date" value="0000-00-00">
                            <input id="HEURE_EMISSION" type="time">
                        </div>
                        <div class="form-group"  >
                            <label >Message </label>
                            <label id="MAJ_NB_CARACTERES_RESTANTS">[000]</label>
                            <textarea id="MAJ_BLK_ZONE_MESSAGE" class="form-control" rows="5" placeholder="..." ></textarea>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="MAJ_VALIDATION_CAMPAGNE" type="button" class="btn btn-success">Valider</button>
                        <button id="MAJ_ANNULATION_CAMPAGNE" type="button" class="btn btn-primary">Annuler</button>
                        <button id="MAJ_TEST_CAMPAGNE" type="button" class="btn btn-primary btn-custom">Tester</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>     

         <!-- /.modal -->
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
      <!-- Bootstrap 4 -->
      <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../../dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../../dist/js/demo.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
      <script>

      // ! -------------------------------------------------------------------------------------------------------
      // ! ---- INITIALISATION  
      // ! -------------------------------------------------------------------------------------------------------

      var $nb_credits_sms = 10;

      var $nb_contact = 20;

      var $nb_caracteres_max = 160;


      // ! -------------------------------------------------------------------------------------------------------
      // ! ---- LISTE CRUD : CAMPAGNE
      // ! -------------------------------------------------------------------------------------------------------

         var table = $('#liste_campagnes').DataTable({
         		dom: '<"top"Bf><"liste"l>rt<p>',
         		buttons: [
         		'excel', 'pdf', 'print'
         		],
         		"language": {
         			"lengthMenu": "Afficher : _MENU_",
         			"oPaginate": {
         				"sNext": ">",
         				"sPrevious": "<"
         			}
         		},
         		"lengthMenu": [
         		[10, 25, 50, 9999],
         		[10, 25, 50, "Tout"]
         		],
         		"responsive": true,
         		"processing": true,
         		"serverSide": true,
         		"ajax": {
         			"url": "../../traitements/campagnes/ajax_campagnes.php",
         			"data": function() {}
         		},
             columnDefs: [
               { "width": "5%", "targets": 0 },
         		{
         			targets: 0,
         			data: "null",
         			defaultContent: "<div class='btn-group'><button type='button' class='btn btn-default edit-campagne'><i class='fas fa-user-edit'></i></button> <button type='button' class='btn btn-default edit-supp'><i class='fas fa-trash'></i></button></div>"
         		},
               {
         			"targets": [1],
         			"visible": false,
         			"searchable": false
         		},
               {
         			"targets": [5],
         			"visible": false,
         			"searchable": false
         		}
         		],
               "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                     if (aData[5] == "INACTIF") {
                         $('td', nRow).css('background-color', '#8B0000');
                         $('td', nRow).css('color', 'White');
                     }
                 } 
         	});
         
          //  ! -------------------------------------------------------------------------------------------------------
          //  ! ---- TRAITEMENT : EDITION D UNE CAMPAGNE
          //  ! -------------------------------------------------------------------------------------------------------

           $('#liste_campagnes tbody').on('click', '.edit-campagne', function() {
             var data = table.row($(this).parents('tr')).data();
             var $id_campagne= data[1];

             $.ajax({
                  type: "POST",
                  url: "../../traitements/campagnes/lecture_campagne.php",
                  data: 'id_campagne=' + $id_campagne,
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                        $('#MAJ_NOM_CAMPAGNE').val(data.NOM_CAMPAGNE);
                        $('#MAJ_DATE_EMISSION').val(data.DATE_CAMPAGNE);
                        $('#MAJ_BLK_ZONE_MESSAGE').val(data.MESSAGE_CAMPAGNE);

                        $maj_message = $('#MAJ_BLK_ZONE_MESSAGE').val();
                        $lg_maj_message = $maj_message.length;

                        $('#MAJ_NB_CARACTERES_RESTANTS').html('[' + ($nb_caracteres_max - $lg_maj_message ) + ']');
                        

                        $('#maj_campagne_modale').modal('toggle');
                     break;
                     case 'ANOMALIE':
                        alert(data.MESSAGE_RETOUR);
                     break;  
                     case 'ERREUR':
                        alert(data.MESSAGE_SQL);
                     break;                       
                     default:
                        break;
                     }
                  }
            });

           });

          // ! --------------------------------------------------------------------------------------------------------
          // ! ---- TRAITEMENT : SUPPRESSION D UNE CAMPAGNE
          // ! -------------------------------------------------------------------------------------------------------

          $('#liste_campagnes tbody').on('click', '.edit-supp', function() {
            var data = table.row($(this).parents('tr')).data();
         	var $id_campagne = data[1];

            $.ajax({
                  type: "POST",
                  url: "../../traitements/campagnes/suppression_campagne.php",
                  data: 'id_campagne=' + $id_campagne,
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                        table.ajax.reload();
                     break;
                     case 'ANOMALIE':
                        alert(data.MESSAGE_RETOUR);
                     break;  
                     case 'ERREUR':
                        alert(data.MESSAGE_SQL);
                     break;                       
                     default:
                        break;
                     }
                  }
            });
           });
  
          // ! -------------------------------------------------------------------------------------------------------
          // ! ---- APPEL DE LA FENETRE AJOUT CAMPAGNE
          // ! -------------------------------------------------------------------------------------------------------

           $('#BTN_AJOUT_CAMPAGNE').click(function() {
               $('#ajout_campagne_modale').modal('toggle');
           });

          // ! -------------------------------------------------------------------------------------------------------
          // ! ---- FERMETURE DE LA FENETRE AJOUT CAMPAGNE
          // ! -------------------------------------------------------------------------------------------------------

          $('#ANNULATION_CAMPAGNE').click(function() {
               $('#ajout_campagne_modale').modal('toggle');
           });

          // ! -------------------------------------------------------------------------------------------------------
          // ! ---- FERMETURE DE LA FENETRE MAJ CAMPAGNE
          // ! -------------------------------------------------------------------------------------------------------

          $('#MAJ_ANNULATION_CAMPAGNE').click(function() {
               $('#maj_campagne_modale').modal('toggle');
           });

         // ! --------------------------------------------------------------------------------------------------
         // ! FONCTION : DECONNEXION
         // ! --------------------------------------------------------------------------------------------------
               
         <?php
            include '../fonction/_deconnexion.php';
         ?>
        
        // ! --------------------------------------------------------------------------------------------------
        // ! INITIALISATION DES CHAMPS DE LA MODALE "CAMPAGNE" SI CLICK SUR LE BOUTON AJOUTER
        // ! --------------------------------------------------------------------------------------------------
        
        $('#BTN_AJOUT_CAMPAGNE').click(function() {
        
           $('#NOM_CAMPAGNE').val('');
           $('#BLK_ZONE_MESSAGE').val('');
           $('#NB_CARACTERES_RESTANTS').html('[' + $nb_caracteres_max + ']');
        });
        
        // ! -------------------------------------------------------------------------------------------------------
        // ! ---- AFFICHAGE ALERTE NOMBRE DE CREDITS  
        // ! -------------------------------------------------------------------------------------------------------
        
        $('#BTN_AJOUT_CAMPAGNE').click(function() {
            if ( $nb_contact < $nb_credits_sms) {
                $("#DIV_ALERT").css("display", "none");
            }
        });

        // ! -------------------------------------------------------------------------------------------------------
        // ! ---- GESTION NOMBRE DE CARACTERES MESSAGE : CREATION CAMPAGNE 
        // ! -------------------------------------------------------------------------------------------------------

        $('#BLK_ZONE_MESSAGE').keypress(function() {
            $message = $('#BLK_ZONE_MESSAGE').val();
            $lg_message = $message.length + 1;
             if(($nb_caracteres_max - $lg_message) < 0)
            {
                return false;
            }
            else{
                $('#NB_CARACTERES_RESTANTS').html('[' + ($nb_caracteres_max - $lg_message)  + ']');
            }
        });

        // ! -------------------------------------------------------------------------------------------------------
        // ! ---- GESTION NOMBRE DE CARACTERES MESSAGE : EDITION CAMPAGNE 
        // ! -------------------------------------------------------------------------------------------------------

        $('#MAJ_BLK_ZONE_MESSAGE').keypress(function() {
            $maj_message = $('#MAJ_BLK_ZONE_MESSAGE').val();
            $lg_maj_message = $maj_message.length + 1;
             if(($nb_caracteres_max - $lg_maj_message) < 0)
            {
                return false;
            }
            else{
                $('#MAJ_NB_CARACTERES_RESTANTS').html('[' + ($nb_caracteres_max - $lg_maj_message)  + ']');
            }
        });

        // ! -------------------------------------------------------------------------------------------------------
        // ! ---- VALIDATION AJOUT CAMPAGNE
        // ! -------------------------------------------------------------------------------------------------------

        $('#VALIDATION_CAMPAGNE').click(function() {
               alert('VALIDATION CAMPAGNE');
        });

        // ! -------------------------------------------------------------------------------------------------------
        // ! ---- TEST AJOUT CAMPAGNE
        // ! -------------------------------------------------------------------------------------------------------

        $('#TEST_CAMPAGNE').click(function() {
               alert('TEST CAMPAGNE');
        });

        // ! -------------------------------------------------------------------------------------------------------
        // ! ---- VALIDATION MAJ CAMPAGNE
        // ! -------------------------------------------------------------------------------------------------------

        $('#MAJ_VALIDATION_CAMPAGNE').click(function() {
               alert('VALIDATION MAJ CAMPAGNE');
        });

        // ! -------------------------------------------------------------------------------------------------------
        // ! ---- TEST MAJ CAMPAGNE
        // ! -------------------------------------------------------------------------------------------------------

        $('#MAJ_TEST_CAMPAGNE').click(function() {
               alert('TEST MAJ CAMPAGNE');
        });


      </script>
   </body>
</html>
