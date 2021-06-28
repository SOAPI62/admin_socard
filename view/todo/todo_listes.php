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
      <title>Admin So Card  | Todo </title>
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
      <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
      <!-- DataTables -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
      
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
                     <h1 class="h1-responsive">TODO</h1>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <div class="card-body p-0 BLOCK-BTN">
           
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="page-content">
               <!-- Panel Table Add Row -->
               <!-- Default box -->
               <table id="liste_todo" style="width:100%" class="cell-border order-column hover">
                  <thead>
                     <tr>
                        <th>Action</th>
                        <th>TODO</th>
                        <th>CLIENT</th>
                        <th>NOM</th>
                        <th>PNOM</th>
                        <th>PORTABLE</th>
                        <th>EMAIL</th>
                        <th>TACHE</th>
                        <th>COMM</th>
                        <th>PRIO</th>
                        <th>EFFECT</th>
                     </tr>
                  </thead>
               </table>
         </section>
         <!-- /.content -->
         </div>
 
         <!-- -------------------------------------------------------------------------------------------------------- -->
         <!-- IMPORT CONTACT                                                                                           -->                                                           
         <!-- -------------------------------------------------------------------------------------------------------- -->

         <div class="modal fade dropdown" tabindex="-1" role="dialog" aria-hidden="true" id="envoi_sms_client">
            <div class="modal-dialog modal-xl ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Envoi SMS</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                     <div class="modal-body">
                     <div class="form-group">
                        <label>Numero de telephone</label>
                        <div class="input-group" >
                            <input id="NUMERO_TEL" type="text" class="form-control"  disabled>
                        </div>
                        </div>
                        <div class="form-group"  >
                           <label id="MAJ_BLK_REMARQUES">SMS </label>
                           <textarea id="CONTENU_SMS_CLIENT" class="form-control" rows="10" >Bonjour, 

 Cordialement Laurent Vandenbussche | 06 85 31 88 27 | Carte de visite : https://urlr.me/FxNZP
  

                           </textarea>
                        </div>
                     </div>
                    <div class="modal-footer">
                        <button id="ANNULATION_SMS" type="button" class="btn btn-primary btn-info">Annuler</button>
                        <button id="VALIDATION_SMS" type="submit" class="btn btn-success">Envoyer</button>
                    </div>
                    </form>
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
      <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
      <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../../dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../../dist/js/demo.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" charset="utf8" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
      
      <script>

      
      // ! --------------------------------------------------------------------------------------------------
      // ! FONCTION : ONESIGNAL
      // ! --------------------------------------------------------------------------------------------------
            
      <?php
         include '../fonction/_import-onesignal.php';
      ?>
      
      // ! -------------------------------------------------------------------------------------------------------
      // ! ---- TRAITEMENT : DATATABLE DONNEES CONTACT
      // ! -------------------------------------------------------------------------------------------------------
            
         var table = $('#liste_todo').DataTable({
               "responsive": true,
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
         			"url": "../../traitements/todo/ajax_todo.php",
         			"data": function() {}
         		},
             columnDefs: [
         		{
                  "width": "5%",
         			"targets": [0],
         			"data": null,
         			"defaultContent": "<div class='btn-group'><button type='button' class='btn btn-default edit-desactive'><i class='fas fa-user-slash'></i></button><button type='button' class='btn btn-default appel-client'><i class='fas fa-phone-alt'></i></button><button type='button' class='btn btn-default sms-client'><i class='fas fa-sms'></i></button></div>"
         		},
               {
                  "width": '5%',
         			"targets": [10],
         			"visible": false,
               }
         		]  ,
               "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                     if (aData[10] == "1") {
                         $('td', nRow).css('background-color', '#8B0000');
                         $('td', nRow).css('color', 'White');
                     }
                 }
         	});
            
            // Add event listener for opening and closing details
               $('#liste_todo tbody').on('click', 'td.details-control', function () {
                  var tr = $(this).closest('tr');
                  var row = table.row( tr );
            
                  if ( row.child.isShown() ) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                  }
                  else {
                        // Open this row
                        console.log(row.data());

                        row.child( format(row.data()) ).show();
                        tr.addClass('shown');
                  }
               } );
  
          // ! --------------------------------------------------------------------------------------------------------
          // ! ---- TRAITEMENT : TODO REALISE
          // ! -------------------------------------------------------------------------------------------------------

          $('#liste_todo tbody').on('click', '.edit-desactive', function() {
            var data = table.row($(this).parents('tr')).data();
         	var $id_todo = data[1];

            $.ajax({
                  type: "POST",
                  url: "../../traitements/todo/termine_todo.php",
                  data: 'id_todo=' + $id_todo,
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                        toastr.success('Le todo est terminé !');
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

          // ! --------------------------------------------------------------------------------------------------------
          // ! ---- TRAITEMENT : APPEL CLIENT
          // ! -------------------------------------------------------------------------------------------------------

         $(function() {
            $('.appel-client').click(function() {
               var data = table.row($(this).parents('tr')).data();
               var $phone_todo = data[5];
               window.location.href = 'tel://' + $phone_todo;
            });
         });

         // ! -------------------------------------------------------------------------------------------------------
          // ! ---- APPEL DE LA FENETRE SMS CLIENT
          // ! -------------------------------------------------------------------------------------------------------


          $('#liste_todo').on('click', '.sms-client', function() {
             var data = table.row($(this).parents('tr')).data();
             var $client= data[2];

             $.ajax({
                  type: "POST",
                  url: "../../traitements/todo/lecture_todo.php",
                  data: 'client=' + $client,
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                           $('#NUMERO_TEL').val(data.NRO_CLIENT);
                           
                           $('#envoi_sms_client').modal('toggle');
                        

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
          // ! ---- TRAITEMENT : SMS CLIENT
          // ! -------------------------------------------------------------------------------------------------------

         $('#VALIDATION_SMS').click(function() {

               $.ajax({
               url: '../../traitements/contact/envoi_sms_todo.php',
               data: 'nro_tel=' + $('#NUMERO_TEL').val() + '&message=' + $('#CONTENU_SMS_CLIENT').val(),
               dataType: 'json',
               async: false,
               success: function(data) {
                  switch (data.REPONSE) {
                        case 'OK':
                           toastr.success('Sms envoyé au contact!')
                           $('#envoi_sms_client').modal('toggle');
                           break;
                        case 'ERREUR':
                           toastr.warning('Sms non envoyé ! ' + data.CODE_ERR);
                           break;
                        default:
                           break;
                  }
               }
               });  

           });

           // ! -------------------------------------------------------------------------------------------------------
          // ! ---- TRAITEMENT : ANNULATION SMS CLIENT
          // ! -------------------------------------------------------------------------------------------------------

         $('#ANNULATION_SMS').click(function() {

            $('#envoi_sms_client').modal('toggle');

         });



         // ! --------------------------------------------------------------------------------------------------
         // ! FONCTION : DECONNEXION
         // ! --------------------------------------------------------------------------------------------------
               
         <?php
            include '../fonction/_deconnexion.php';
         ?>
 

         // ! --------------------------------------------------------------------------------------------------
         // ! Fonction AJOUT CONTACT
         // ! --------------------------------------------------------------------------------------------------
         
         <?php
            include '../fonction/_ajout-contact.php';
         ?>
         

   
      </script>
   </body>
</html>
<?php 
}
else { header( 'Location: ../../index.php');}
?>