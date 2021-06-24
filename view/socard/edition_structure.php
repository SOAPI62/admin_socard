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
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="h1-responsive" >Structure de la So Card</h1>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <div class="card-body p-0 BLOCK-BTN">
            <button id='BTN_VERSION' type="button" class="btn btn-primary">Versionning</button>
            <button type="button" class="btn btn-primary"  onclick="socard_temporaire();" >Visualisation</button>
            <button id='BTN_GENERER' type="button" class="btn btn-primary">Générer</button>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="page-content">
               <!-- Panel Table Add Row -->
               <!-- Default box -->
               <table id="liste_structure" style="width:100%" class="cell-border order-column hover">
                  <thead>
                     <tr>
                        <th>Action</th>
                        <th>Id</th>
                        <th>Position</th>
                        <th>Bloc</th>
                        <th>Statut</th>
                     </tr>
                  </thead>
               </table>
         </section>
         <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <div class="modal fade" id="modal-danger">
            <div class="modal-dialog">
               <div class="modal-content bg-danger">
                  <div class="modal-header">
                     <h4 class="modal-title">Suppression du bloc xxx</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <p>Voulez vous supprimer le bloc xxx ?</p>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-outline-light" data-dismiss="modal">Annuler</button>
                     <button type="button" class="btn btn-outline-light">Valider</button>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>

         <!-- -------------------------------------------------------------------------------------------------------- -->
         <!-- AJOUT D UN CONTACT ( RACCOURCI )                                                                         -->
         <!-- -------------------------------------------------------------------------------------------------------- -->
         <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="structure_modale">
            <div class="modal-dialog modal-xl">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Edition de la structure HTML</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <div class="form-group"  >
                           <div id='nro_structure' style='display:none'></div>
                           <label">Structure HTML</label>
                           <textarea id="BLK_STRUCTURE_HTML" class="form-control" rows="20" placeholder="..." style="text-transform: uppercase"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button id="BTN_MODIF_STRUCTURE" type="button" class="btn btn-primary">Modifier</button>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>

         <!-- -------------------------------------------------------------------------------------------------------- -->
         <!-- GESTION DE LA VERSION.                                                                                   -->
         <!-- -------------------------------------------------------------------------------------------------------- -->
         <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="version_modale">
            <div class="modal-dialog modal-xl">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Gestion de la version SOCARD</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
               
                     <div class="form-group">
                        
                        <div class="form-group"  >
                        
                           <div id='nro_structure' style='display:none'></div>

                           <label">Version</label>
                           <input id="BLK_VERSION" class="form-control"  ></input>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button id="BTN_MODIF_VERSION" type="button" class="btn btn-primary">Valider</button>
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

      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <script>
      
         // ! --------------------------------------------------------------------------------------------------
         // ! Fonction AJOUT CONTACT
         // ! --------------------------------------------------------------------------------------------------
         
         <?php
            include '../fonction/_ajout-contact.php';
         ?>
         
         // ! --------------------------------------------------------------------------------------------------
         // ! FONCTION : ONESIGNAL
         // ! --------------------------------------------------------------------------------------------------
               
         <?php
            include '../fonction/_import-onesignal.php';
         ?>

          // ! -------------------------------------------------------------------------------------------------------
          // ! ---- TRAITEMENT : DATATABLE DONNEES STRUCTURES
          // ! -------------------------------------------------------------------------------------------------------

         var table = $('#liste_structure').DataTable({
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
         			"url": "../../traitements/socard/structures/ajax_structures.php",
         			"data": function() {}
         		},
             columnDefs: [
               { "width": "5%", "targets": 0 }, { "width": "2%", "targets": 2 },
               {
         			"targets": [1],
         			"visible": false,
         			"searchable": false
         		},
             {
         			"targets": [4],
         			"visible": false,
         			"searchable": false
         		},
         		{
         			targets: 0,
         			data: "null",
         			defaultContent: "<div class='btn-group'><button type='button' class='btn btn-default edit-donnees'><i class='fas fa-edit'></i></button> <button type='button' class='btn btn-default edit-supp'><i class='fas fa-trash'></i></button><button type='button' class='btn btn-default edit-structure'><i class='fas fa-puzzle-piece'></i></button></div>"
         		}
         		],
               "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                     if (aData[4] == "INACTIF") {
                         $('td', nRow).css('background-color', '#8B0000');
                         $('td', nRow).css('color', 'White');
                     }
                 } 
         	});
         
          // ! -------------------------------------------------------------------------------------------------------
          // ! ---- TRAITEMENT :  EDITION D UNE STRUCTURE
          // ! -------------------------------------------------------------------------------------------------------

           $('#liste_structure tbody').on('click', '.edit-donnees', function() {
             var data = table.row($(this).parents('tr')).data();
             var  $id_structure = data[1];

         	  var $nom_module = "edition_" + data[3].toLowerCase() + '.php?id_structure=' + $id_structure;
              location.href = $nom_module;
           });

          // ! -------------------------------------------------------------------------------------------------------
          // ! ---- TRAITEMENT : SUPPRESSION D UNE STRUCTURE
          // ! -------------------------------------------------------------------------------------------------------

          $('#liste_structure tbody').on('click', '.edit-supp', function() {
            var data = table.row($(this).parents('tr')).data();
         	var $id_structure = data[1];

            $.ajax({
                  type: "POST",
                  url: "../../traitements/socard/structures/supp_structures.php",
                  data: 'id_structure=' + $id_structure,
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
          // ! TRAITEMENT : EDITION DE LA STRUCTURE HTML D UNE STRUCTURE
          // ! -------------------------------------------------------------------------------------------------------

          $('#liste_structure tbody').on('click', '.edit-structure', function() {
            var data = table.row($(this).parents('tr')).data();
         	var $id_structure = data[1];

            $.ajax({
                  type: "POST",
                  url: "../../traitements/socard/structures/lecture_structure.php",
                  data: 'id_structure=' + $id_structure,
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                        $('#nro_structure').html($id_structure);
                        $('#BLK_STRUCTURE_HTML').val(data.STRUCTURE_HTML);
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

          // ! -------------------------------------------------------------------------------------------------------
          // ! TRAITEMENT : MODIFICATION D UNE STRUCTURE
          // ! -------------------------------------------------------------------------------------------------------

            $('#BTN_MODIF_STRUCTURE').click(function() {

               $.ajax({
                  type: "POST",
                  url: "../../traitements/socard/structures/maj_structure.php",
                  data: 'id_structure=' + $('#nro_structure').html() + '&structure_html=' + $('#BLK_STRUCTURE_HTML').val(),
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                        $('#structure_modale').modal('toggle');
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

            $('#structure_modale').modal('toggle');
           });
 
          // ! -------------------------------------------------------------------------------------------------------
          // ! TRAITEMENT : GENERER UN NOUVELLE VERSION DE LA SOCARD
          // ! -------------------------------------------------------------------------------------------------------

          $('#BTN_GENERER').click(function() {
            $.ajax({
                  type: "POST",
                  url: "../../traitements/socard/structures/generer_socard.php",
                  data: "mode=production",
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                         toastr.success('Mise à jour de la SOCARD effectuée !');
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
          // ! TRAITEMENT : GESTION DU NUMERO DE VERSION
          // ! -------------------------------------------------------------------------------------------------------

          $('#BTN_VERSION').click(function() {
            $('#version_modale').modal('toggle');

            $.ajax({
                  type: "POST",
                  url: "../../traitements/socard/versionning/lecture_version.php",
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                     $('#BLK_VERSION').val(data.VERSION);
                         break;
                     case 'ANOMALIE':
                        toastr.error(data.MESSAGE_RETOUR);
                     break;  
                     case 'ERREUR':
                        toastr.error(data.MESSAGE_RETOUR);
                     break;                       
                     default:
                        break;
                     }
                  }
                });
         });

         $('#BTN_MODIF_VERSION').click(function() {
            
            $.ajax({
                  type: "POST",
                  url: "../../traitements/socard/versionning/maj_version.php",
                  data:"NRO_VERSION=" + $('#BLK_VERSION').val(),
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                         toastr.success('Mise à jour de la version SOCARD effectuée !');
                         $('#version_modale').modal('toggle');
                         break;
                     case 'ANOMALIE':
                        toastr.error(data.MESSAGE_RETOUR);
                     break;  
                     case 'ERREUR':
                        toastr.error(data.MESSAGE_RETOUR);
                     break;                       
                     default:
                        break;
                     }
                  }
                });
         });
         
          // ! -------------------------------------------------------------------------------------------------------
          // !  FONCTION : REDIRECTION VERS NOUVELLE FENETRE : VISUALISATION
          // ! -------------------------------------------------------------------------------------------------------

          function socard_temporaire() {

            $.ajax({
                  type: "POST",
                  url: "../../traitements/socard/structures/generer_socard.php",
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                         toastr.success('Génération de la SOCARD temporaire effectuée !');
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

            var myWindow = window.open("../../structures/socard-temporaire.html", "");
         }

         // ! -------------------------------------------------------------------------------------------------------
         // ! FONCTION : DECONNEXION
         // ! -------------------------------------------------------------------------------------------------------
               
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