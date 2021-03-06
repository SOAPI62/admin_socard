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
                     <h1 >Structure du bloc A PROPOS</h1>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
         </section>
         <form id="form_a_propos" enctype="multipart/form-data">
         <section class="content">
         <div class="row" >
            <div class="col-sm-6">
               <!-- text input -->
               <div class="form-group card-body">
                  <label class="margin">Titre :</label>
                  <input type="text" id="titre" name="titre" class="form-control" placeholder="Votre titre">
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
                        <div class="image-upload-wrap ">
                           <input class="file-upload-input" id="file" name="files" type='file' onchange="readURL(this);" accept="image/*" />
                           <div class="drag-text">
                              <h3>cliquez ou glissez un fichier</h3>
                           </div>
                        </div>
                        <div class="file-upload-content">
                           <img class="file-upload-image" src="#" alt="your image" />
                           <div class="image-title-wrap">
                              <button type="button" onclick="removeUpload()" class="remove-image">Supprimer <span class="image-title">T??l??charger une image</span></button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               </div>
            <div class="row">
            <div class="col-sm-6">
               <div class="form-group card-body">
                  <label class="margin">Texte :</label>
                  <div class="card card-outline card-info">
                     <div class="card-body ">
                        <textarea id="summernote" name="description">
                        <strong>Placez votre texte ici</strong>
                        </textarea>
                     </div>
                  </div>
               </div>
            </div>

            <!-- ./row -->
            <div class="col-sm-6">
               <div class="form-group card-body">
                  <label class="margin">Avis :</label>
                  <input type="checkbox" name="my-checkbox"  value="other" >
                  <input type="text" id="avis" name="avis" value="otherValue" class="form-control" placeholder="URL du bouton">
               </div>
            </div>
            </div>
            </form>
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

         $(function () {
           // Summernote
           $('#summernote').summernote()
         })
         
         // ----------------------------------------------------------------------------------------------------------------
         // ---- CHARGEMENT DE L IMAGE A PROPOS 
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

         // --------------------------------------------------------------------------------------------------
         // FONCTION : DECONNEXION
         // --------------------------------------------------------------------------------------------------
               
         <?php
            include '../fonction/_deconnexion.php';
         ?>

         
         // ----------------------------------------------------------------------------------------------------------------
         // ---- DETECTION SI AFFICHAGE URL DE LA PGE PROMOTION 
         // ----------------------------------------------------------------------------------------------------------------
         
         var otherCheckbox           = document.querySelector('input[value="other"]');
         var otherText               = document.querySelector('input[value="otherValue"]');
         otherText.style.visibility  = 'hidden';
         
         otherCheckbox.onchange = function() {
         if(otherCheckbox.checked) {
           otherText.style.visibility = 'visible';
           otherText.value = '';
         } else {
           otherText.style.visibility = 'hidden';
         }
         };

         


         
      </script>
   </body>
</html>
<?php 
}
else { header( 'Location: ../../index.php');}
?>