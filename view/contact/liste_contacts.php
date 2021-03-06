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
                     <h1 class="h1-responsive">Liste des contacts</h1>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <div class="card-body p-0 BLOCK-BTN">
            <button id="BTN_IMPORT_CONTACT" type="button" class="btn btn-primary">Importer</button>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="page-content">
               <!-- Panel Table Add Row -->
               <!-- Default box -->
               <table id="liste_contacts" style="width:100%" class="cell-border order-column hover">
                  <thead>
                     <tr>
                        <th>Action</th>
                        <th>CODE</th>
                        <th>SUPPORT</th>
                        <th>TEL</th>
                        <th>EMAIL</th>
                        <th>ORIGINE</th>
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>ACTIF</th>
                        <th>EXCLU</th>
                     </tr>
                  </thead>
               </table>
         </section>
         <!-- /.content -->
         </div>


         <!-- -------------------------------------------------------------------------------------------------------- -->
         <!-- AJOUT D UN CONTACT                                                                                       -->                                                           
         <!-- -------------------------------------------------------------------------------------------------------- -->

         <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="ajout_contact_modale">
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
         
                        </div>
                     </div>
                     <div class="form-group">

                        <div class="form-group">
                           <label id="BLK_CONTACT_PAR">Support de contact + </label>
                           <select  id="CONTACT_PAR" class="form-control select2" style="width: 100%;" style="display: none;">
                              <option value="TEL" selected="selected">T??l??phone</option>
                              <option value="MAIL">Mail</option>
                              <option value="MSG">Messenger</option>
                              <option value="SMS">Sms</option>
                           </select>
                        </div>
                        <div id="BLK_ZONE_CONTACT_PAR">
                           <div class="form-group" id="BLK_TEL">
                              <div class="input-group" >
                                 <input id="NRO_TEL" type="tel" class="form-control" placeholder="Saisir le num??ro de t??l??phone">
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
                           <label id="BLK_IDENTITE">Identit?? +</label>
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
                                 <input id="PRENOM_CONTACT" type="text" class="form-control"  placeholder="Pr??nom" style="text-transform: uppercase">
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
         <!-- IMPORT CONTACT                                                                                           -->                                                           
         <!-- -------------------------------------------------------------------------------------------------------- -->

         <div class="modal fade dropdown" tabindex="-1" role="dialog" aria-hidden="true" id="import_contact_modale">
            <div class="modal-dialog modal-xl ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Import de contact</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <select  id="IMPORT_SUPPORT" class="form-control import-support" style="width: 40%;" style="display: none;">
                              <option value="TIDIO" selected="selected">TIDIO</option>
                           </select>
                        </div>
                        <form id="form_import" method="post" action="">
                        <div class="input_file">
                           <label for="file" class="file_label">
                           <i class="fa fa-upload" aria-hidden="true"></i>
                           Importez votre fichier csv
                           </label>
                           <input id="file" classe="file_csv" type="file" name="file-csv" accept=".csv" />
                        </div>
                        
                     </div>
                    <div class="modal-footer">
                        <button id="ANNULATION_IMPORT" type="button" class="btn btn-primary btn-info">Annuler</button>
                        <button id="VALIDATION_IMPORT" type="submit" class="btn btn-success">Valider</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>  

         <!-- -------------------------------------------------------------------------------------------------------- -->
         <!-- ENVOI SMS CONTACT                                                                                        -->                                                           
         <!-- -------------------------------------------------------------------------------------------------------- -->

         <div class="modal fade dropdown" tabindex="-1" role="dialog" aria-hidden="true" id="envoi_sms_contact">
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
                        <div class="form-group">
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

         <!-- -------------------------------------------------------------------------------------------------------- -->
         <!-- EDITION D UN CONTACT                                                                                       -->                                                           
         <!-- -------------------------------------------------------------------------------------------------------- -->

         <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="maj_contact_modale">
            <div class="modal-dialog modal-xl">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Modifier un contact</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label>Envoyer la SOCARD</label>
                        <input type="checkbox" id="MAJ_ENVOI_SOCARD" >
                        <div id="MAJ_BLK_ZONE_SOCARD">
         
                        </div>
                     </div>
                     <div class="form-group">

                        <div class="form-group">
                           <label id="MAJ_BLK_CONTACT_PAR">Support de contact + </label>
                           <select  id="MAJ_CONTACT_PAR" class="form-control select2" style="width: 100%;" style="display: none;">
                              <option value="TEL" selected="selected">T??l??phone</option>
                              <option value="MAIL">Mail</option>
                              <option value="MSG">Messenger</option>
                              <option value="SMS">Sms</option>
                           </select>
                        </div>
                        <div id="BLK_ZONE_CONTACT_PAR">
                           <div class="form-group" id="MAJ_BLK_TEL">
                              <div class="input-group" >
                                 <input id="MAJ_NRO_TEL" type="tel" class="form-control" placeholder="Saisir le num??ro de t??l??phone">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group" id="MAJ_BLK_MAIL">
                              <div class="input-group">
                                 <input id="MAJ_EMAIL" type="email" class="form-control" placeholder="Saisir l adresse mail">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group" >
                           <label id="MAJ_BLK_TYPE_CONTACT">Type contact +</label>
                           <div id="MAJ_BLK_ZONE_TYPE_CONTACT" style="display: none;">
                              <select id="MAJ_TYPE_CONTACT" class="form-control select2" style="width: 100%;">
                                 <option value="NC" selected="selected">Non connu</option>
                                 <option value="PART">Particulier</option>
                                 <option value="PRO">Professsionnel</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group" >
                           <label id="MAJ_BLK_IDENTITE">Identit?? +</label>
                           <div id="MAJ_BLK_ZONE_IDENTITE" style="display: none;">
                              <div class="input-group" >
                                 <input id="MAJ_NOM_CONTACT" type="text" class="form-control" placeholder="Nom" style="text-transform: uppercase">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                 </div>
                              </div>
                              </br>
                              <div class="input-group" >
                                 <input id="MAJ_PRENOM_CONTACT" type="text" class="form-control"  placeholder="Pr??nom" style="text-transform: uppercase">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group"  >
                           <label id="MAJ_BLK_REMARQUES">Remarques + </label>
                           <textarea id="MAJ_BLK_ZONE_REMARQUES" class="form-control" rows="2" placeholder="..." style="text-transform: uppercase"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button id="MAJ_CONTACT" type="button" class="btn btn-primary">Modifier</button>
                     <button id="APPEL_CONTACT" type="button" class="btn btn-primary">Appeler</button>
                     <button id="SMS_CONTACT" type="button" class="btn btn-primary">SMS</button>
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
            
         var table = $('#liste_contacts').DataTable({
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
         			"url": "../../traitements/contact/ajax_contacts.php",
         			"data": function() {}
         		},
             columnDefs: [
         		{
                  "width": "5%",
         			"targets": [0],
         			"data": null,
         			"defaultContent": "<div class='btn-group'><button type='button' class='btn btn-default edit-contact'><i class='fas fa-user-edit'></i></button> <button type='button' class='btn btn-default edit-supp'><i class='fas fa-trash'></i></button><button type='button' class='btn btn-default edit-desactive'><i class='fas fa-user-slash'></i></button></div>"
         		},
               {
                  "width": '5%',
         			"targets": [1],
         			"visible": false,
         		},
               {
                  "width": '5%',
         			"targets": [2],
         			"visible": false,
               },
               
               {
                  
         			"targets": [4],
         		},
               {
         			"targets": [5],
                  "searchable": false       		
               },
               {
                  "width": '5%',
         			"targets": [6],

         		},
               {
                  "width": '5%',
         			"targets": [7],

         		},
               {
         			"targets": [8],
         			"visible": false,
         			"searchable": false
         		},
               {
         			"targets": [9],
         			"searchable": false,
                  "visible": false,
         		}
         		] ,
               "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                     if (aData[8] == "INACTIF") {
                         $('td', nRow).css('background-color', '#8B0000');
                         $('td', nRow).css('color', 'White');
                     }
                     if (aData[9] == "SMS") {
                         $('td', nRow).css('background-color', '#FFA500');
                         $('td', nRow).css('color', 'White');
                     }

                 }
         	});
            // Add event listener for opening and closing details
               $('#liste_contacts tbody').on('click', 'td.details-control', function () {
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
         
          // !  -------------------------------------------------------------------------------------------------------
          // !  ---- TRAITEMENT : EDITION D UN MESSAGE
          // !  -------------------------------------------------------------------------------------------------------

           $('#liste_messages tbody').on('click', '.edit-message', function() {
             var data = table.row($(this).parents('tr')).data();
             var  $id_message= data[2];
         
             $.ajax({
                  type: "POST",
                  url: "../../traitements/contact/lecture_message.php",
                  data: 'id_message=' + $id_message,
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
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

          // ! --------------------------------------------------------------------------------------------------------
          // ! ---- TRAITEMENT : SUPPRESSION D UN CONTACT
          // ! -------------------------------------------------------------------------------------------------------

          $('#liste_contacts tbody').on('click', '.edit-supp', function() {
            var data = table.row($(this).parents('tr')).data();
         	var $id_contact = data[1];

            $.ajax({
                  type: "POST",
                  url: "../../traitements/contact/suppression_contact.php",
                  data: 'id_contact=' + $id_contact,
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                        toastr.success('Le contact a ??t?? supprim?? !');
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
          // ! ---- TRAITEMENT : D??SACTIVATION D UN CONTACT
          // ! -------------------------------------------------------------------------------------------------------

          $('#liste_contacts tbody').on('click', '.edit-desactive', function() {
            var data = table.row($(this).parents('tr')).data();
         	var $id_contact = data[1];

            $.ajax({
                  type: "POST",
                  url: "../../traitements/contact/exclu_sms_contact.php",
                  data: 'id_contact=' + $id_contact,
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                        toastr.success('Le contact a ??t?? d??sactiv?? !');
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
          // ! ---- APPEL DE LA FENETRE IMPORT CONTACT
          // ! -------------------------------------------------------------------------------------------------------

          $('#BTN_IMPORT_CONTACT').click(function() {
               $('#import_contact_modale').modal('toggle');
           });

          // ! -------------------------------------------------------------------------------------------------------
          // ! ---- FERMETURE DE LA MODALE IMPORT CONTACT
          // ! -------------------------------------------------------------------------------------------------------

          $('#ANNULATION_IMPORT').click(function() {
               $('#import_contact_modale').modal('toggle');
           });

          // ! -------------------------------------------------------------------------------------------------------
          // ! ---- VALIDATION DE L IMPORT DU FICHIER CSV
          // ! -------------------------------------------------------------------------------------------------------

          $('#form_import').on('submit', function(e){
             e.preventDefault();

            $.ajax({
                  type: "POST",             
                  data: new FormData(this), 
                  contentType: false,       
                  cache: false,             
                  processData:false,        
                  dataType: 'json',
                  url: "../../traitements/contact/import_contact.php",
                  success: function (data) 
                  {                     
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                        toastr.success(data.MESSAGE_RETOUR);
                        $('#import_contact_modale').modal('toggle');
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
          // ! ---- TRAITEMENT : EDITION DE LA STRUCTURE HTML D UNE STRUCTURE
          // ! -------------------------------------------------------------------------------------------------------

          $('#liste_contacts tbody').on('click', '.edit-contact', function() {
            var data = table.row($(this).parents('tr')).data();
         	var $id_contact = data[1];

            $.ajax({
                  type: "POST",
                  url: "../../traitements/contact/lecture_contact.php",
                  data: 'id_contact=' + $id_contact,
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':

                        switch ($('#MAJ_CONTACT_PAR').val()) {
                           case 'TEL':
                           $('#MAJ_BLK_TEL').show();
                           $('#MAJ_BLK_MAIL').hide();
                           break;
                           case 'MAIL':
                           $('#MAJ_BLK_TEL').hide();
                           $('#MAJ_BLK_MAIL').show();
                           break;
                           case 'MSG':
                           $('#MAJ_BLK_TEL').hide();
                           $('#MAJ_BLK_MAIL').hide();
                           break;
                        }

                        $('#MAJ_CONTACT_PAR').val(data.ORI_CLIENT);
                        $('#MAJ_TYPE_CONTACT').val();
                        $('#MAJ_NOM_CONTACT').val(data.NOM1_CLIENT);
                        $('#MAJ_PRENOM_CONTACT').val(data.PNOM1_CLIENT);
                        $('#MAJ_NRO_TEL').val(data.POR_CLIENT);
                        $('#MAJ_EMAIL').val(data.EMAIL_CLIENT);
                        $('#MAJ_BLK_ZONE_REMARQUES').val(data.ANNOTATION_CLIENT);

                        $('#maj_contact_modale').modal('toggle');
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
          // ! ---- TRAITEMENT : AJOUT D UN MESSAGE
          // ! -------------------------------------------------------------------------------------------------------

          $('#BTN_AJOUT_MESSAGE').click(function() {   
             $('#AJOUT_MSG_COURT').val('');
             $('#AJOUT_MSG_LONG').val('');        
             $('#nouveau_message_modale').modal('toggle');
          });

          // ! -------------------------------------------------------------------------------------------------------
          // ! ---- TRAITEMENT : VALIDATION D UN NOUVEAU MESSAGE
          // ! -------------------------------------------------------------------------------------------------------

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

         // ! --------------------------------------------------------------------------------------------------
         // ! FONCTION : DECONNEXION
         // ! --------------------------------------------------------------------------------------------------
               
         <?php
            include '../fonction/_deconnexion.php';
         ?>

          // ! -------------------------------------------------------------------------------------------------------
          // ! ---- TRAITEMENT : VALIDATION DE L EDITION D UN MESSAGE
          // ! -------------------------------------------------------------------------------------------------------

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



         // ! -------------------------------------------------------------------------------------------------------
          // ! ---- TRAITEMENT : APPEL CONTACT
          // ! -------------------------------------------------------------------------------------------------------

          $('#APPEL_CONTACT').click(function() {

            var $phone_contact = $('#MAJ_NRO_TEL').val();
            window.location.href = 'tel://' + $phone_contact;
            $('#maj_contact_modale').modal('toggle');

         });

         // ! -------------------------------------------------------------------------------------------------------
          // ! ---- TRAITEMENT : 
          // ! -------------------------------------------------------------------------------------------------------

         $('#SMS_CONTACT').click(function() {
            
            var $phone_contact = $('#MAJ_NRO_TEL').val();
            $('#maj_contact_modale').modal('toggle');
            $('#NUMERO_TEL').val($phone_contact);
            $('#envoi_sms_contact').modal('toggle');
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
                        toastr.success('Sms envoy?? au contact!')
                        $('#envoi_sms_contact').modal('toggle');
                        break;
                     case 'ERREUR':
                        toastr.warning('Sms non envoy?? ! ' + data.CODE_ERR);
                        break;
                     default:
                        break;
               }
            }
            });  

            });



         // ! --------------------------------------------------------------------------------------------------
         // ! Fonction AJOUT CONTACT
         // ! --------------------------------------------------------------------------------------------------
         
         <?php
            include '../fonction/_ajout-contact.php';
         ?>
         

  
        // ! --------------------------------------------------------------------------------------------------
        // ! UPLOAD FICHIER
        // ! --------------------------------------------------------------------------------------------------

      $("#file").on("change", function (e) {
         var files = $(this)[0].files;
         if (files.length >= 2) {
               $(".file_label").text(files.length + " Files Ready To Upload");
         } else {
               var fileName = e.target.value.split("\\").pop();
               $(".file_label").text(fileName);
         }
      });
      </script>
   </body>
</html>
<?php 
}
else { header( 'Location: ../../index.php');}
?>