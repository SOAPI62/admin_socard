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
            <h1 >Structure du bloc NOS SERVICES</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="col-sm-4">
          <!-- text input -->
          <div class="form-group card-body">
            <label class="margin">Titre du bloc :</label>
            <input type="text" class="form-control" placeholder="Votre titre">
          </div>
        </div>      
      <div class="col-sm-4">
        <div class="form-group card-body">
        <label class="margin">Texte du bloc :</label>
          <div class="card card-outline card-info">
          
            <!-- /.card-header -->
            <div class="card-body ">
              <textarea id="summernote">
                <strong>Placez votre texte ici</strong>
              </textarea>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
      <div class="col-sm-4">
          <div class="form-group card-body">
            <label class="margin">Nombre(s) de service(s) :</label>
            <select id="nb_services" class="form-control">
              <option value='2'>2</option>
              <option value='4'>4</option>
              <option value='6'>6</option>
              <option value='8'>8</option>
             </select>
          </div>
        </div>
        <div class="form-group card-body form-upload col-sm-12">
              
            <div class="file-upload col-sm-4" id="BLK_IMG_SERVICE_1">
            <div class="image-upload-wrap">
                <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                <div class="drag-text">
                <h3>cliquez ou glissez un fichier</h3>
                </div>
            </div>
            <input type="text" class="form-control placeholder-service" placeholder="TITRE">
            <div class="file-upload-content">
                <img class="file-upload-image" src="#" alt="your image" />
                <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Supprimer <span class="image-title">Télécharger une image</span></button>
                </div>
            </div>
            </div>  

            <div class="file-upload col-sm-4" id="BLK_IMG_SERVICE_2">
            <div class="image-upload-wrap">
                <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                <div class="drag-text">
                <h3>cliquez ou glissez un fichier</h3>
                </div>
            </div>
            <input type="text" class="form-control placeholder-service" placeholder="TITRE">
            <div class="file-upload-content">
                <img class="file-upload-image" src="#" alt="your image" />
                <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Supprimer <span class="image-title">Télécharger une image</span></button>
                </div>
            </div>
            </div>
            
        </div>
        <div class="form-group card-body form-upload col-sm-12">
              
            <div class="file-upload col-sm-4" id="BLK_IMG_SERVICE_3">
            <div class="image-upload-wrap">
                <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                <div class="drag-text">
                <h3>cliquez ou glissez un fichier</h3>
                </div>
            </div>
            <input type="text" class="form-control placeholder-service" placeholder="TITRE">
            <div class="file-upload-content">
                <img class="file-upload-image" src="#" alt="your image" />
                <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Supprimer <span class="image-title">Télécharger une image</span></button>
                </div>
            </div>
            </div>  

            <div class="file-upload col-sm-4" id="BLK_IMG_SERVICE_4">
            <div class="image-upload-wrap">
                <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                <div class="drag-text">
                <h3>cliquez ou glissez un fichier</h3>
                </div>
            </div>
            <input type="text" class="form-control placeholder-service" placeholder="TITRE">
            <div class="file-upload-content">
                <img class="file-upload-image" src="#" alt="your image" />
                <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Supprimer <span class="image-title">Télécharger une image</span></button>
                </div>
            </div>
            </div>
            
        </div>
        <div class="form-group card-body form-upload col-sm-12">
              
            <div class="file-upload col-sm-4" id="BLK_IMG_SERVICE_5">
            <div class="image-upload-wrap">
                <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                <div class="drag-text">
                <h3>cliquez ou glissez un fichier</h3>
                </div>
            </div>
            <input type="text" class="form-control placeholder-service" placeholder="TITRE">
            <div class="file-upload-content">
                <img class="file-upload-image" src="#" alt="your image" />
                <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Supprimer <span class="image-title">Télécharger une image</span></button>
                </div>
            </div>
            </div>  

            <div class="file-upload col-sm-4" id="BLK_IMG_SERVICE_6">
            <div class="image-upload-wrap">
                <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                <div class="drag-text">
                <h3>cliquez ou glissez un fichier</h3>
                </div>
            </div>
            <input type="text" class="form-control placeholder-service" placeholder="TITRE">
            <div class="file-upload-content">
                <img class="file-upload-image" src="#" alt="your image" />
                <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Supprimer <span class="image-title">Télécharger une image</span></button>
                </div>
            </div>
            </div>
            
        </div>
        <div class="form-group card-body form-upload col-sm-12">
              
            <div class="file-upload col-sm-4" id="BLK_IMG_SERVICE_7">
            <div class="image-upload-wrap">
                <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                <div class="drag-text">
                <h3>cliquez ou glissez un fichier</h3>
                </div>
            </div>
            <input type="text" class="form-control placeholder-service" placeholder="TITRE">
            <div class="file-upload-content">
                <img class="file-upload-image" src="#" alt="your image" />
                <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Supprimer <span class="image-title">Télécharger une image</span></button>
                </div>
            </div>
            </div>  

            <div class="file-upload col-sm-4" id="BLK_IMG_SERVICE_8">
            <div class="image-upload-wrap">
                <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                <div class="drag-text">
                <h3>cliquez ou glissez un fichier</h3>
                </div>
            </div>
            <input type="text" class="form-control placeholder-service" placeholder="TITRE">
            <div class="file-upload-content">
                <img class="file-upload-image" src="#" alt="your image" />
                <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Supprimer <span class="image-title">Télécharger une image</span></button>
                </div>
            </div>
            </div>
            
        </div>
          
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
  $(function () {
    // Summernote
    $('#summernote').summernote()
  })

// ----------------------------------------------------------------------------------------------------------------
// ---- VALEURS PAR DEFAUT AU CHARGEMENT DE LA PAGE
// ----------------------------------------------------------------------------------------------------------------

$("#BLK_IMG_SERVICE_1").show();
$("#BLK_IMG_SERVICE_2").show();
$("#BLK_IMG_SERVICE_3").hide();
$("#BLK_IMG_SERVICE_4").hide();
$("#BLK_IMG_SERVICE_5").hide();
$("#BLK_IMG_SERVICE_6").hide();
$("#BLK_IMG_SERVICE_7").hide();
$("#BLK_IMG_SERVICE_8").hide();



// ----------------------------------------------------------------------------------------------------------------
// ---- DETECTION CHANGEMEN DU NOMBRE DE PROMOTIONS
// ----------------------------------------------------------------------------------------------------------------

$('#nb_services').change(function() {
  $nb_service =  $('#nb_services').val();

  switch($nb_service) {
  case '2':
    $("#BLK_IMG_SERVICE_1").show();
    $("#BLK_IMG_SERVICE_2").show();
    $("#BLK_IMG_SERVICE_3").hide();
    $("#BLK_IMG_SERVICE_4").hide();
    $("#BLK_IMG_SERVICE_5").hide();
    $("#BLK_IMG_SERVICE_6").hide();
    $("#BLK_IMG_SERVICE_7").hide();
    $("#BLK_IMG_SERVICE_8").hide();
    break;
  case '4':
    $("#BLK_IMG_SERVICE_1").show();
    $("#BLK_IMG_SERVICE_2").show();
    $("#BLK_IMG_SERVICE_3").show();
    $("#BLK_IMG_SERVICE_4").show();
    $("#BLK_IMG_SERVICE_5").hide();
    $("#BLK_IMG_SERVICE_6").hide();
    $("#BLK_IMG_SERVICE_7").hide();
    $("#BLK_IMG_SERVICE_8").hide();
    break;
  case '6':
    $("#BLK_IMG_SERVICE_1").show();
    $("#BLK_IMG_SERVICE_2").show();
    $("#BLK_IMG_SERVICE_3").show();
    $("#BLK_IMG_SERVICE_4").show();
    $("#BLK_IMG_SERVICE_5").show();
    $("#BLK_IMG_SERVICE_6").show();
    $("#BLK_IMG_SERVICE_7").hide();
    $("#BLK_IMG_SERVICE_8").hide();
  break;
  case '8':
    $("#BLK_IMG_SERVICE_1").show();
    $("#BLK_IMG_SERVICE_2").show();
    $("#BLK_IMG_SERVICE_3").show();
    $("#BLK_IMG_SERVICE_4").show();
    $("#BLK_IMG_SERVICE_5").show();
    $("#BLK_IMG_SERVICE_6").show();
    $("#BLK_IMG_SERVICE_7").show();
    $("#BLK_IMG_SERVICE_8").show();
  break;
  default:
    // code block
} 

});

// ----------------------------------------------------------------------------------------------------------------
// ---- CHARGEMENT DES IMAGES PROMOTIONS 
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

</script>
</body>
</html>
