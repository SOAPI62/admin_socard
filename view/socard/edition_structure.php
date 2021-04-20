<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin So Card| Structure</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.css">
</head>
<body class="hold-transition sidebar-mini">

  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
               </li>
               <li class="nav-item dropdown">
                  <a id="BTN_AJOUT_CONTACT" class="nav-link"  data-toggle="modal">
                  <i class="fas fa-user-plus"></i></i>
                  </a>
               </li>
            </ul>
         </nav>
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
            <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin So'Card </span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
               <!-- Sidebar user panel (optional) -->
               <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                     <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
                  <a class="btn btn-info btn-sm" href="../formulaires/form-promotions.php">
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
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
