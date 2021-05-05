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

    <!-- -------------------------------------------------------------------------------------------------------- -->
    <!-- LISTE DES MESSAGES                                                                                       -->
    <!-- -------------------------------------------------------------------------------------------------------- -->

      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="h1-responsive" >Liste des messages</h1>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <div class="card-body p-0">
            <button id="BTN_AJOUT_MESSAGE" type="button" class="btn btn-primary">Ajouter</button>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="page-content">
               <!-- Panel Table Add Row -->
               <!-- Default box -->
               <table id="liste_messages" style="width:100%" class="cell-border order-column hover">
                  <thead>
                     <tr>
                        <th>Action</th>
                        <th>Id</th>
                        <th>Messages</th>
                        <th>Statut</th>
                     </tr>
                  </thead>
               </table>
         </section>
         <!-- /.content -->
         </div>

         <!-- -------------------------------------------------------------------------------------------------------- -->
         <!-- NOUVEAU  MESSAGE                                                                                         -->
         <!-- -------------------------------------------------------------------------------------------------------- -->
         
         <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="nouveau_message_modale">
            <div class="modal-dialog modal-xl">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Nouveau message</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                            <label">Message court</label>
                           <textarea id="AJOUT_MSG_COURT" class="form-control" rows="2" placeholder="..." ></textarea>
                           </br>
                           <label">Message long</label>
                           <textarea id="AJOUT_MSG_LONG" class="form-control" rows="2" placeholder="..." ></textarea>

                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button id="BTN_NOUVEAU_MESSAGE" type="button" class="btn btn-primary">Ajouter</button>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>

         <!-- -------------------------------------------------------------------------------------------------------- -->
         <!-- EDITION D UN MESSAGE                                                                                     -->
         <!-- -------------------------------------------------------------------------------------------------------- -->

         <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="edition_message_modale">
            <div class="modal-dialog modal-xl">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Edition d un message</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                            <div id='ID_MESSAGE' style='display:none'></div>
                           <label">Message court</label>
                           <textarea id="MSG_COURT" class="form-control" rows="2" placeholder="..." ></textarea>
                           </br>
                           <label">Message long</label>
                           <textarea id="MSG_LONG" class="form-control" rows="2" placeholder="..." ></textarea>

                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button id="BTN_MODIF_MESSAGE" type="button" class="btn btn-primary">Modifier</button>
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

          // -------------------------------------------------------------------------------------------------------
          // ---- TRAITEMENT : DATATABLE DONNEES STRUCTURES
          // -------------------------------------------------------------------------------------------------------

         var table = $('#liste_messages').DataTable({
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
         			"url": "../../traitements/contact/ajax_messages.php",
         			"data": function() {}
         		},
             columnDefs: [
               { "width": "5%", "targets": 0 },
               {
         			"targets": [1],
         			"visible": false,
         			"searchable": false
         		},
                 {
         			"targets": [3],
         			"visible": false,
         			"searchable": false
         		},
         		{
         			targets: 0,
         			data: "null",
         			defaultContent: "<div class='btn-group'><button type='button' class='btn btn-default edit-message'><i class='fas fa-user-edit'></i></button> <button type='button' class='btn btn-default edit-supp'><i class='fas fa-trash'></i></button></div>"
         		}
         		],
               "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                     if (aData[3] == "0") {
                         $('td', nRow).css('background-color', '#8B0000');
                         $('td', nRow).css('color', 'White');
                     }
                 } 
         	});
            
         
          // -------------------------------------------------------------------------------------------------------
          // ---- TRAITEMENT : EDITION D UN MESSAGE
          // -------------------------------------------------------------------------------------------------------

           $('#liste_messages tbody').on('click', '.edit-message', function() {
             var data = table.row($(this).parents('tr')).data();
             var  $id_message= data[1];

             $.ajax({
                  type: "POST",
                  url: "../../traitements/contact/lecture_message.php",
                  data: 'id_message=' + $id_message,
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                            $('#ID_MESSAGE').val(data.ID_MSG);
                            $('#MSG_COURT').val(data.DESC_COURT_MSG);
                            $('#MSG_LONG').val(data.DESC_LONG_MSG);
                            
                            $('#edition_message_modale').modal('toggle');
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

         // --------------------------------------------------------------------------------------------------
         // FONCTION : DECONNEXION
         // --------------------------------------------------------------------------------------------------
               
         <?php
            include '../fonction/_deconnexion.php';
         ?>

          // -------------------------------------------------------------------------------------------------------
          // ---- TRAITEMENT : SUPPRESSION D UN MESSAGE
          // -------------------------------------------------------------------------------------------------------

          $('#liste_messages tbody').on('click', '.edit-supp', function() {
            var data = table.row($(this).parents('tr')).data();
         	var $id_message = data[1];

            $.ajax({
                  type: "POST",
                  url: "../../traitements/contact/suppression_message.php",
                  data: 'id_message=' + $id_message,
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

          // -------------------------------------------------------------------------------------------------------
          // ---- TRAITEMENT : EDITION DE LA STRUCTURE HTML D UNE STRUCTURE
          // -------------------------------------------------------------------------------------------------------

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

                        $('#edition_message_modale').modal('toggle');

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

          // -------------------------------------------------------------------------------------------------------
          // ---- TRAITEMENT : AJOUT D UN MESSAGE
          // -------------------------------------------------------------------------------------------------------

          $('#BTN_AJOUT_MESSAGE').click(function() {   
             $('#AJOUT_MSG_COURT').val('');
             $('#AJOUT_MSG_LONG').val('');        
             $('#nouveau_message_modale').modal('toggle');
          });

          // -------------------------------------------------------------------------------------------------------
          // ---- TRAITEMENT : VALIDATION D UN NOUVEAU MESSAGE
          // -------------------------------------------------------------------------------------------------------

          $('#BTN_NOUVEAU_MESSAGE').click(function() {           
             $('#nouveau_message_modale').modal('toggle');

             var formData = new FormData();

             formData.append('msg_court', $('#AJOUT_MSG_COURT').val());
             formData.append('msg_long', $('#AJOUT_MSG_LONG').val());

             $.ajax({
                  type: "POST",
                  url: "../../traitements/contact/ajout_message.php",
                  data: formData,
                  cache: false,
                   contentType: false,
                   processData: false,
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                        $('#nouveau_message_modale').modal('toggle');
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

          // -------------------------------------------------------------------------------------------------------
          // ---- TRAITEMENT : EVALIDATION DE L EDITION D UN MESSAGE
          // -------------------------------------------------------------------------------------------------------

            $('#BTN_MODIF_MESSAGE').click(function() {

                var formData = new FormData();

                formData.append('id_message', $('#ID_MESSAGE').val());
                formData.append('msg_court', $('#MSG_COURT').val());
                formData.append('msg_long', $('#MSG_LONG').val());

               $.ajax({
                  type: "POST",
                  url: "../../traitements/contact/modification_message.php",
                  data: formData,
                  cache: false,
                   contentType: false,
                   processData: false,
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                        $('#edition_message_modale').modal('toggle');
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

          
      </script>
   </body>
</html>
<?php 
}
else { header( 'Location: ../../index.php');}
?>