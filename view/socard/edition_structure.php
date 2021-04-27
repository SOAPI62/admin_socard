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
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1>Structure de la So Card</h1>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <div class="card-body p-0">
            <button type="button" class="btn btn-primary">Ajouterw</button>
            <button type="button" class="btn btn-primary">Visualisation</button>
            <button type="button" class="btn btn-primary">Générer</button>
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
         <!-- /.modal -->
         <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
               <b>Version</b> 3.1.0-rc
            </div>
            <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
               { "width": "10%", "targets": 0 }, { "width": "5%", "targets": 2 },
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
         			defaultContent: "<div class='btn-group'><button type='button' class='btn btn-default edit-donnees'>Données</button> <button type='button' class='btn btn-default edit-supp'>Suppr.</button><button type='button' class='btn btn-default edit-structure'>Structure</button><button type='button' class='btn btn-default edit-pos-haut'>+</button><button type='button' class='btn btn-default edit-pos-bas'>-</button></div>"
         		}
         		],
               "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                     if (aData[4] == "INACTIF") {
                         $('td', nRow).css('background-color', '#8B0000');
                         $('td', nRow).css('color', 'White');
                     }
                 } 
         	});
         
          // -------------------------------------------------------------------------------------------------------
          // ---- TRAITEMENT : DONNEES DUNE STRUCTURE
          // -------------------------------------------------------------------------------------------------------

           $('#liste_structure tbody').on('click', '.edit-donnees', function() {
             var data = table.row($(this).parents('tr')).data();
         	  var $nom_module = "edition_" + data[3].toLowerCase() + '.php';
              location.href = $nom_module;
           });

          // -------------------------------------------------------------------------------------------------------
          // ---- TRAITEMENT : SUPPRESSION D UNE STRUCTURE
          // -------------------------------------------------------------------------------------------------------

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

          // -------------------------------------------------------------------------------------------------------
          // ---- TRAITEMENT : EDITION DE LA STRUCTURE HTML D UNE STRUCTURE
          // -------------------------------------------------------------------------------------------------------

          $('#liste_structure tbody').on('click', '.edit-structure', function() {
            alert('b');
           });

          // -------------------------------------------------------------------------------------------------------
          // ---- TRAITEMENT : MODIFICATION DE LA POSITION DE LA STRUTURE VERS LE HAUT
          // -------------------------------------------------------------------------------------------------------

          $('#liste_structure tbody').on('click', '.edit-pos-haut', function() {
            alert('c');
           });

          // -------------------------------------------------------------------------------------------------------
          // ---- TRAITEMENT : MODIFICATION DE LA POSITION DE LA STRUTURE VERS LE BAS
          // -------------------------------------------------------------------------------------------------------

          $('#liste_structure tbody').on('click', '.edit-pos-bas', function() {
            alert('d');
           });

      </script>
   </body>
</html>
