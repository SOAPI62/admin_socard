<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin So Card| Structure</title>

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
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="card-body p-0">
          <button type="button" class="btn btn-primary">Visualisation</button>
          <button type="button" class="btn btn-primary">Générer</button>
          <table class="table table-striped projects">
            <thead>
              <tr>
                <th style="width: 20%">#</th>
                <th style="width: 30%">Bloc</th>
                <th style="width: 20%" class="text-center">Statut</th>
                <th style="width: 20%"></th>
              </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>
                  <a>HEADER</a>
                </td>
                <td class="project-state">
                  <span class="badge badge-success">Actif</span>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="#">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Editer
                  </a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Supprimer</button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>
                  <a>A_PROPOS</a>
                </td>
                <td class="project-state">
                  <span class="badge badge-success">Actif</span>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="#">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Editer
                  </a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Supprimer</button>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>
                  <a>PROMOTION</a>
                </td>
                <td class="project-state">
                  <span class="badge badge-success">Actif</span>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="edition_promotions.php">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Editer
                  </a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Supprimer</button>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>
                  <a>SERVICE</a>
                </td>
                <td class="project-state">
                  <span class="badge badge-success">Actif</span>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="#">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Editer
                  </a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Supprimer</button>
                </td>
              </tr>
              <tr>
                <td>5</td>
                <td>
                  <a>NOUVEAUTE</a>
                </td>
                <td class="project-state">
                  <span class="badge badge-success">Actif</span>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="#">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Editer
                  </a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Supprimer</button>
                </td>
              </tr>
              <tr>
                <td>6</td>
                <td>
                  <a>IDEES_KDO</a>
                </td>
                <td class="project-state">
                  <span class="badge badge-success">Actif</span>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="#">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Editer
                  </a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Supprimer</button>
                </td>
              </tr>
              <tr>
                <td>7</td>
                <td>
                  <a>NEWSLETTER</a>
                </td>
                <td class="project-state">
                  <span class="badge badge-success">Actif</span>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="#">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Editer
                  </a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Supprimer</button>
                </td>
              </tr>
              <tr>
                <td>8</td>
                <td>
                  <a>PARTAGE</a>
                </td>
                <td class="project-state">
                  <span class="badge badge-success">Actif</span>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="#">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Editer
                  </a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Supprimer</button>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>
                  <a>VISITE</a>
                </td>
                <td class="project-state">
                  <span class="badge badge-inactif">Inactif</span>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="#">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Editer
                  </a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Supprimer</button>
                </td>
              </tr>
              <tr>
                <td>10</td>
                <td>
                  <a>FOOTER</a>
                </td>
                <td class="project-state">
                  <span class="badge badge-success">Actif</span>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="#">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Editer
                  </a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Supprimer</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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
</body>
</html>
