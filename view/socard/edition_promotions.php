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
                  <div class="card-body">
                     <h1 >Structure du bloc : PROMOTIONS</h1>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
         </section>
         <!-- Main content -->
         <section class="content">
            <form id="form_promotion" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-sm-6">
                     <!-- text input -->
                     <div class="form-group card-body">
                        <label class="margin">Titre du bloc :</label>
                        <input type="text" id="titre" name="titre" class="form-control" placeholder="Votre titre">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group card-body">
                        <label class="margin">Lien URL :</label>
                        <input type="text" id="bouton" name="bouton" value="" class="form-control" placeholder="URL du bouton">
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group card-body">
                     <label class="margin">Nombre(s) de promo(s) :</label>
                     <select id="nb_promotions" class="form-control">
                        <option value='0'>0</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                     </select>
                  </div>
               </div>
               <div class="form-group card-body form-upload col-sm-12">
                  <div class="file-upload col-sm-3" id="BLK_IMG_PROMO_1">
                     <div class="image-upload-wrap-1">
                        <input class="file-upload-input-1" id="file-1" name="files" type='file' onchange="readURL_1(this);" accept="image/*" />
                        <div class="drag-text">
                           <h3>cliquez ou glissez un fichier</h3>
                        </div>
                     </div>
                     <div class="file-upload-content-1">
                        <img class="file-upload-image-1" src="#" alt="" />
                        <div class="image-title-wrap-1">
                           <button type="button" onclick="removeUpload_1()" class="remove-image">Supprimer <span class="image-title-1">Télécharger une image</span></button>
                        </div>
                     </div>
                  </div>
                  <div class="file-upload col-sm-3" id="BLK_IMG_PROMO_2">
                     <div class="image-upload-wrap-2">
                        <input class="file-upload-input-2" id="file-2" name="files" type='file' onchange="readURL_2(this);" accept="image/*" />
                        <div class="drag-text">
                           <h3>cliquez ou glissez un fichier</h3>
                        </div>
                     </div>
                     <div class="file-upload-content-2">
                        <img class="file-upload-image-2" src="#" alt="" />
                        <div class="image-title-wrap">
                           <button type="button" onclick="removeUpload_2()" class="remove-image">Supprimer <span class="image-title-2">Télécharger une image</span></button>
                        </div>
                     </div>
                  </div>
                  <div class="file-upload col-sm-3" id="BLK_IMG_PROMO_3">
                     <div class="image-upload-wrap-3">
                        <input class="file-upload-input-3" id="file-3" name="files" type='file' onchange="readURL_3(this);" accept="image/*" />
                        <div class="drag-text">
                           <h3>cliquez ou glissez un fichier</h3>
                        </div>
                     </div>
                     <div class="file-upload-content-3">
                        <img class="file-upload-image-3" src="#" alt="" />
                        <div class="image-title-wrap">
                           <button type="button" onclick="removeUpload_3()" class="remove-image">Supprimer <span class="image-title-3">Télécharger une image</span></button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group card-body">
                     <button type="button" class="btn btn-primary" onclick="location.href='../socard/edition_structure.php'">Annuler</button>
                     <button type="button"  id="btn_valider" class="btn btn-primary">Valider</button>
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
      <script>

         // !----------------------------------------------------------------------------------------------------------------
         // !---- VALEURS PAR DEFAUT AU CHARGEMENT DE LA PAGE
         // !----------------------------------------------------------------------------------------------------------------
         
         $("#BLK_IMG_PROMO_1").hide();
         $("#BLK_IMG_PROMO_2").hide();
         $("#BLK_IMG_PROMO_3").hide();
                  
         // ! ----------------------------------------------------------------------------------------------------------------
         // ! ---- CHARGEMENT DES DONNEES PROMOTIONS
         // ! ----------------------------------------------------------------------------------------------------------------

         $.ajax({
                  type: "POST",
                  url: "../../traitements/socard/structures/lecture_promotions.php",
                  dataType: 'json',
                  success: function (data) 
                  {
                     switch (data.CODE_RETOUR) {
                     case 'OK':
                        $('#titre').val(data.TITRE_PROMOTION);

                        if (data.LIEN_PROMOTION != '')
                        {
                           $('#bouton').val(data.LIEN_PROMOTION);

                        }


                        $('#nb_promotions').val(data.NB_PROMOTIONS);

                        $('.file-upload-image-1').attr('src', data.IMG_PROMOTION_1);
                        $('.file-upload-content-1').show();
                        $('.image-upload-wrap-1').hide();

                        $('.file-upload-image-2').attr('src', data.IMG_PROMOTION_2);
                        $('.file-upload-content-2').show();
                        $('.image-upload-wrap-2').hide();

                        $('.file-upload-image-3').attr('src', data.IMG_PROMOTION_3);
                        $('.file-upload-content-3').show();
                        $('.image-upload-wrap-3').hide();

                        switch(data.NB_PROMOTIONS) {
                        case 0:
                           $("#BLK_IMG_PROMO_1").hide();
                           $("#BLK_IMG_PROMO_2").hide();
                           $("#BLK_IMG_PROMO_3").hide();
                           break;
                        case 1:
                           $("#BLK_IMG_PROMO_1").show();
                           $("#BLK_IMG_PROMO_2").hide();
                           $("#BLK_IMG_PROMO_3").hide();
                           break;
                        case 2:
                           $("#BLK_IMG_PROMO_1").show();
                           $("#BLK_IMG_PROMO_2").show();
                           $("#BLK_IMG_PROMO_3").hide();
                        break;
                        case 3:
                           $("#BLK_IMG_PROMO_1").show();
                           $("#BLK_IMG_PROMO_2").show();
                           $("#BLK_IMG_PROMO_3").show();
                        break;
                        default:
                           // code block
                        } 

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

         // !----------------------------------------------------------------------------------------------------------------
         // ! ---- DETECTION CHANGEMENT DU NOMBRE DE PROMOTIONS
         // !----------------------------------------------------------------------------------------------------------------
         
         $('#nb_promotions').change(function() {
           $nb_promotion =  $('#nb_promotions').val();
         
           switch($nb_promotion) {
           case '0':
             $("#BLK_IMG_PROMO_1").hide();
             $("#BLK_IMG_PROMO_2").hide();
             $("#BLK_IMG_PROMO_3").hide();
             break;
           case '1':
             $("#BLK_IMG_PROMO_1").show();
             $("#BLK_IMG_PROMO_2").hide();
             $("#BLK_IMG_PROMO_3").hide();
             break;
           case '2':
             $("#BLK_IMG_PROMO_1").show();
             $("#BLK_IMG_PROMO_2").show();
             $("#BLK_IMG_PROMO_3").hide();
           break;
           case '3':
             $("#BLK_IMG_PROMO_1").show();
             $("#BLK_IMG_PROMO_2").show();
             $("#BLK_IMG_PROMO_3").show();
           break;
           default:
             // code block
         } 
         
         });
         
         // ! ----------------------------------------------------------------------------------------------------------------
         // ! ---- CHARGEMENT DES IMAGES PROMOTIONS 
         // ! ----------------------------------------------------------------------------------------------------------------
         
           function readURL_1(input) {
           if (input.files && input.files[0]) {
         
             var reader = new FileReader();
         
             reader.onload = function(e) {
               $('.image-upload-wrap-1').hide();
               $('.file-upload-image-1').attr('src', e.target.result);
               $('.file-upload-content-1').show();
         
               $('.image-title-1').html(input.files[0].name);
             };
         
             reader.readAsDataURL(input.files[0]);
         
           } else {
             removeUpload_1();
           }
         }

         function readURL_2(input) {
           if (input.files && input.files[0]) {
         
             var reader = new FileReader();
         
             reader.onload = function(e) {
               $('.image-upload-wrap-2').hide();
               $('.file-upload-image-2').attr('src', e.target.result);
               $('.file-upload-content-2').show();
         
               $('.image-title-2').html(input.files[0].name);
             };
         
             reader.readAsDataURL(input.files[0]);
         
           } else {
             removeUpload_2();
           }
         }

         function readURL_3(input) {
           if (input.files && input.files[0]) {
         
             var reader = new FileReader();
         
             reader.onload = function(e) {
               $('.image-upload-wrap-3').hide();
               $('.file-upload-image-3').attr('src', e.target.result);
               $('.file-upload-content-3').show();
         
               $('.image-title-3').html(input.files[0].name);
             };
         
             reader.readAsDataURL(input.files[0]);
         
           } else {
             removeUpload_2();
           }
         }

         function removeUpload_1() {
           $('.file-upload-input-1').replaceWith($('.file-upload-input-1').clone());
           $('.file-upload-content-1').hide();
           $('.image-upload-wrap-1').show();
         }

         function removeUpload_2() {
           $('.file-upload-input-2').replaceWith($('.file-upload-input-2').clone());
           $('.file-upload-content-2').hide();
           $('.image-upload-wrap-2').show();
         }

         function removeUpload_3() {
           $('.file-upload-input-3').replaceWith($('.file-upload-input-3').clone());
           $('.file-upload-content-3').hide();
           $('.image-upload-wrap-3').show();
         }

         $('.image-upload-wrap').bind('dragover', function () {
         		$('.image-upload-wrap').addClass('image-dropping');
         	});

         $('.image-upload-wrap').bind('dragleave', function () {
            $('.image-upload-wrap').removeClass('image-dropping');
         });

         // ! ----------------------------------------------------------------------------------------------------------------
         // ! ---- VALIDATION DE LA MISE A JOUR DU FORMULAIRE : PROMOTION
         // ! ----------------------------------------------------------------------------------------------------------------
          
          $("#btn_valider").click(function(){
         
            $nb_promotion =  $('#nb_promotions').val();

            switch ($nb_promotion) {
               case '0':
                  $img_1 ='#';
                  $img_2 ='#';
                  $img_3 ='#';
                  break;
               case '1':
                  $img_1 = $('.file-upload-image-1').attr('src');
                  $img_2 ='#';
                  $img_3 ='#';
                  break;
               case '2':
                  $img_1 = $('.file-upload-image-1').attr('src');
                  $img_2 = $('.file-upload-image-2').attr('src');
                  $img_3 ='#';
                  break;
               case '3':
                  $img_1 = $('.file-upload-image-1').attr('src');
                  $img_2 = $('.file-upload-image-2').attr('src');
                  $img_3 = $('.file-upload-image-3').attr('src');
                  break;
               default:
                  break;
            }
            
            var formData = new FormData();
            
            formData.append('titre', $('#titre').val());
            formData.append('lien_url', $('#bouton').val());
            formData.append('file_1', $img_1);
            formData.append('file_2', $img_2);
            formData.append('file_3', $img_3);
      
            $.ajax({
                  type: "POST",
                  url: "../../traitements/socard/structures/maj_promotions.php",
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

         // ! --------------------------------------------------------------------------------------------------
         // ! FONCTION : DECONNEXION
         // ! --------------------------------------------------------------------------------------------------
               
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