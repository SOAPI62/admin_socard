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
      <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
                     <h1>Liste des contacts</h1>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <div class="card-body p-0">
            <button id="BTN_AJOUT_CONTACT" type="button" class="btn btn-primary">Ajouter</button>
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
                        <th>ORIGINE</th>
                        <th>TYPE</th>
                        <th>NOM</th>
                        <th>TEL</th>
                        <th>EMAIL</th>
                        <th>ACTIF</th>
                     </tr>
                     </tr>
                  </thead>
               </table>
         </section>
         <!-- /.content -->
         </div>


         <!-- -------------------------------------------------------------------------------------------------------- -->
         <!-- AJOUT D UN CONTACT                                                                                       -->                                                           
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
         <!-- EDITION D UN CONTACT                                                                                       -->                                                           
         <!-- -------------------------------------------------------------------------------------------------------- -->

         <div class="modal fade" id="maj_contact_modale">
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
                              <option value="TEL" selected="selected">Téléphone</option>
                              <option value="MAIL">Mail</option>
                              <option value="MSG">Messenger</option>
                              <option value="SMS">Sms</option>
                           </select>
                        </div>
                        <div id="BLK_ZONE_CONTACT_PAR">
                           <div class="form-group" id="MAJ_BLK_TEL">
                              <div class="input-group" >
                                 <input id="MAJ_NRO_TEL" type="tel" class="form-control" placeholder="Saisir le numéro de téléphone">
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
                           <label id="MAJ_BLK_IDENTITE">Identité +</label>
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
                                 <input id="MAJ_PRENOM_CONTACT" type="text" class="form-control"  placeholder="Prénom" style="text-transform: uppercase">
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
                  <div class="modal-footer justify-content-between">
                     <button id="MAJ_CONTACT" type="button" class="btn btn-primary">Modifier</button>
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

         // --------------------------------------------------------------------------------------------------
         // LISTE DES MESSAGES SMS
         // --------------------------------------------------------------------------------------------------

         $.ajax({
               url: '../../traitements/contact/liste_select_messages.php',
                dataType: 'json',
                async: false,
                success: function(data) {
                  $('#BLK_ZONE_SOCARD').html(data.HTML);
                 
                }
               }); 

      // -------------------------------------------------------------------------------------------------------
      // ---- TRAITEMENT : DATATABLE DONNEES MESSAGES
      // -------------------------------------------------------------------------------------------------------

         var table = $('#liste_contacts').DataTable({
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
               { "width": "10%", "targets": 0 },
         		{
         			targets: 0,
         			data: "null",
         			defaultContent: "<div class='btn-group'><button type='button' class='btn btn-default edit-contact'>Editer</button> <button type='button' class='btn btn-default edit-supp'>Suppr.</button></div>"
         		},
               {
         			"targets": [1],
         			"visible": false,
         			"searchable": false
         		},
                 {
         			"targets": [2],
         			"visible": false,
         			"searchable": false
         		},
                 {
         			"targets": [8],
         			"visible": false,
         			"searchable": false
         		},
         		],
               "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                     if (aData[8] == "INACTIF") {
                         $('td', nRow).css('background-color', '#8B0000');
                         $('td', nRow).css('color', 'White');
                     }
                 } 
         	});
         
          //  -------------------------------------------------------------------------------------------------------
          //  ---- TRAITEMENT : EDITION D UN MESSAGE
          //  -------------------------------------------------------------------------------------------------------

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

          // --------------------------------------------------------------------------------------------------------
          // ---- TRAITEMENT : SUPPRESSION D UN CONTACT
          // -------------------------------------------------------------------------------------------------------

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
          // ---- APPEL DE LA FENETRE AJOUT CONTACT
          // -------------------------------------------------------------------------------------------------------

           $('#BTN_AJOUT_CONTACT').click(function() {
               $('#ajout_contact_modale').modal('toggle');
           });

          // -------------------------------------------------------------------------------------------------------
          // ---- TRAITEMENT : EDITION DE LA STRUCTURE HTML D UNE STRUCTURE
          // -------------------------------------------------------------------------------------------------------

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

         // --------------------------------------------------------------------------------------------------
         // FONCTION : DECONNEXION
         // --------------------------------------------------------------------------------------------------
               
         <?php
            include '../fonction/_deconnexion.php';
         ?>

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

        $( "#MAJ_CONTACT_PAR" ).change(function() {
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

        $('#MAJ_BLK_TYPE_CONTACT').click(function() {
         $('#MAJ_BLK_ZONE_TYPE_CONTACT').toggle();
        });
         
        $('#MAJ_BLK_IDENTITE').click(function() {
         $('#MAJ_BLK_ZONE_IDENTITE').toggle();
        });
        
        $('#MAJ_BLK_REMARQUES').click(function() {
         $('#MAJ_BLK_ZONE_REMARQUES').toggle();
        });
        
        $('#MAJ_ENVOI_SOCARD').change(function() {
          $('#MAJ_BLK_ZONE_SOCARD').toggle();
        })
        
        $('#MAJ_BLK_CONTACT_PAR').click(function() {
          $('#MAJ_BLK_ZONE_CONTACT_PAR').toggle();
        }) 


      </script>
   </body>
</html>
