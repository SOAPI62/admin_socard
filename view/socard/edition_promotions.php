<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin So Card | Structure PROMOTION</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
      <meta content="Webflow" name="generator">
      <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
      <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
      <link href="images/hello-icon-192.png" rel="apple-touch-icon">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="green">
      <meta name="apple-mobile-web-app-title" content="FreeCodeCamp">
      <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
      <link href="images/hello-icon-192.png" rel="apple-touch-icon">
      <link rel="icon" href="images/favicon.ico" type="image/x-icon">
      <link rel="apple-touch-icon" href="images/hello-icon-152.png">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="theme-color" content="white">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black">
      <meta name="apple-mobile-web-app-title" content="So'Shooting">
      <meta name="msapplication-TileImage" content="images/hello-icon-144.png">
      <meta name="msapplication-TileColor" content="#FFFFFF">
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
    <!-- Navbar -->
    <?php
          include '../navigation/nav-top.php';
        ?>
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
            <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin So'Card </span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
               <!-- Sidebar user panel (optional) -->
               <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                     <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                     <a href="#" class="d-block">So Shooting</a>
                  </div>
               </div>

        <?php
          include '../navigation/nav-left.php';
        ?>
    
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
            <h1>Structure du bloc PROMOTION</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form>
        <div class="col-sm-4">
          <!-- text input -->
          <div class="form-group card-body">
            <label>Titre :</label>
            <input type="text" class="form-control" placeholder="Votre titre">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group card-body">
            <label>Bouton :</label>
            <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
            <input type="text" class="form-control" placeholder="URL du bouton">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group card-body">
            <label>Nombre(s) de promo(s) :</label>
            <select class="form-control">
              <option>0</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
            </select>
          </div>
        </div>
            <div class="form-group card-body form-upload col-sm-12">
              <div class="file-upload col-sm-3">
                <div class="image-upload-wrap">
                  <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
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
              <div class="file-upload col-sm-3">
                <div class="image-upload-wrap">
                  <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
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
              <div class="file-upload col-sm-3">
                <div class="image-upload-wrap">
                  <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
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

<script>
$(function () {
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
  });

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
