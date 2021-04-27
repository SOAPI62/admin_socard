<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin So Card | Structure PROMOTION</title>
      <meta content="width=device-width, initial-scale=1" name="viewport">
      <meta content="Webflow" name="generator">
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
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../../dist/css/adminlte.css">
   </head>
   <body class="hold-transition sidebar-mini">
      <!-- Site wrapper -->
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
         <!-- /.Navbar utilisateur -->
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
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-4  card-body">
                     <h1>Structure du bloc NOUVEAUTE</h1>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
         </section>
         <!-- Main content -->
         <!-- Main content -->
         <section class="content">
            <form id="form_nouveaute" enctype="multipart/form-data">
               <div class="row" >
                  <div class="col-sm-6">
                     <!-- text input -->
                     <div class="form-group card-body">
                        <label class="margin">Titre :</label>
                        <input type="text"  id="titre" name="titre" class="form-control" placeholder="Votre titre">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group card-body">
                        <label class="margin">Description :</label>
                        <div class="card card-outline card-info">
                           <!-- /.card-header -->
                           <div class="card-body ">
                              <textarea id="summernote" name="description" class="val">
                              <strong></strong>
                              </textarea>
                           </div>
                        </div>
                     </div>
                     <!-- /.col-->
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group card-body">
                     <div >
                        <!-- text input -->
                        <div class="">
                           <label class="margin">Image :</label>
                        </div>
                     </div>
                     <div >
                        <div class="image-upload-wrap  ">
                           <input class="file-upload-input" id="file" name="files" type='file' onchange="readURL(this);" accept="image/*" />
                           <div class="drag-text">
                              <h3>cliquez ou glissez un fichier</h3>
                           </div>
                        </div>
                        <div class="file-upload-content">
                           <img class="file-upload-image" src="#" alt="your image" />
                           <div class="image-title-wrap">
                              <button type="button" onclick="removeUpload()" class="remove-image">Supprimer <span class="image-title">Télécharger une image</span></button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
               <div class="col-sm-6">
                  <div class="form-group card-body">
                     <button type="button" class="btn btn-primary" onclick="location.href='../socard/edition_structure.php'">Annuler</button>
                     <button type="button"  id="btn_valider" class="btn btn-primary">Valider</button>
                  </div>
               </div>
               <!-- ./row -->
            </form>
         </section>
         <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
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
      <!-- Bootstrap Switch -->
      <script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../../dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../../dist/js/demo.js"></script>
      <!-- Summernote -->
      <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../../dist/js/demo.js"></script>   
      <script>    

      $( document ).ready(function() {
         // ----------------------------------------------------------------------------------------------------------------
         // ---- DESIGN DESCRIPTION
         // ---------------------------------------------------------------------------------------------------------------- 
             
  
         $.ajax({
               type: "POST",
               url: "../../traitements/socard/structures/lire_nouveaute.php",
               dataType: 'json',
               success: function (data) 
               {
                  switch (data.CODE_RETOUR) {
                  case 'OK':
                     $('#titre').val(data.TITRE_NOUVEAUTE);
                     $('#summernote').val(data.DESCRIPTION_NOUVEAUTE);
                     $('#summernote').summernote();

                     $('.image-upload-wrap').hide();
                     $('.file-upload-image').attr('src', data.IMG_NOUVEAUTE);
                     $('.file-upload-content').show();
      
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
          
         // ----------------------------------------------------------------------------------------------------------------
         // ---- CHARGEMENT DE L IMAGE NOUVAUTE
         // ----------------------------------------------------------------------------------------------------------------
          
          function readURL(input) {
            if (input.files && input.files[0]) {
          
              var reader = new FileReader();
          
              reader.onload = function(e) {
                $('.image-upload-wrap').hide();
          
                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();
          
                $('.image-title').html(input.files[0].name);
              };
          
              reader.readAsDataURL(input.files[0]);
          
            } else {
              removeUpload();
            }
          }
          
          function removeUpload() {
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
          }
          
          $('.image-upload-wrap').bind('dragover', function () {
          		$('.image-upload-wrap').addClass('image-dropping');
          	});
          	$('.image-upload-wrap').bind('dragleave', function () {
          		$('.image-upload-wrap').removeClass('image-dropping');
          });
          
          // ----------------------------------------------------------------------------------------------------------------
          // ---- VALIDATION DU FORMULAIRE
          // ----------------------------------------------------------------------------------------------------------------
          
            $("#btn_valider").click(function(){
         
             $img = $('.file-upload-image').attr('src');
         
             var formData = new FormData();
             
             formData.append('titre', $('#titre').val());
             formData.append('description', $('#summernote').val());
             formData.append('file', $img);
         
              $.ajax({
                   type: "POST",
                   url: "../../traitements/socard/structures/maj_nouveaute.php",
                   data: formData,
                   cache: false,
                   contentType: false,
                   processData: false,
                   dataType: 'json',
                   success: function (data) 
                   {
                      switch (data.CODE_RETOUR) {
                      case 'OK':
                         location.href='../socard/edition_structure.php';
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
      });

      </script>
   </body>
</html>
