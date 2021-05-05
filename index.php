<?php
session_start();
if($_SESSION['EMAIL_UTILISATEUR'] == ''){
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Connexion</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
 
  <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/hello-icon-192.png" rel="apple-touch-icon">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="green">
  <meta name="apple-mobile-web-app-title" content="FreeCodeCamp">
  <link rel="manifest" href="manifest.json">
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
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index.html"><b>Admin </b>So'Card</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Connectez-vous pour démarrer votre session</p>

      <form id="form_connexion">
        <div class="input-group mb-3">
          <div class="input-group-erreur">
          <input  id="email" type="email" name="email" class="form-control" placeholder="Email">
          </div>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <div class="input-group-erreur">
          <input  id="pwd" type="password"  name="pwd" class="form-control" placeholder="Password">
        </div>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="se_souvenir">
              <label for="se_souvenir">
                Se souvenir de moi
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Valider</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
 
 
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery Validate Form-->
<script src=http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js></script>
<script src=http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>

$().ready(function() {


    // ----------------------------------------------------------------------------------------------------------------
    // ---- DETECTION PRESENCE SOUVENIR DE MOI
    // ----------------------------------------------------------------------------------------------------------------

    let str_utilisateur = {
      email : "",
      pwd : ""
    };

    obj_utilisateur = localStorage.getItem("UTILISATEUR");
    str_utilisateur = JSON.parse(obj_utilisateur);

 
    if (obj_utilisateur){
      $('#email').val(str_utilisateur.email);
      $('#pwd').val(str_utilisateur.pwd);
      $('#se_souvenir').attr("checked",true);
    }

    // ----------------------------------------------------------------------------------------------------------------
    // ---- DETECTION SI SOUVENIR DE MOI
    // ----------------------------------------------------------------------------------------------------------------
    
    $("#se_souvenir").change(function()
    {
      var $checked = $("#se_souvenir").is(':checked')

      if ( $checked == true)
      {
        let str_utilisateur = {
            email : $('#email').val(),
            pwd   : $('#pwd').val()
        };

        obj_utilisateur = JSON.stringify(str_utilisateur);
        localStorage.setItem("UTILISATEUR",obj_utilisateur);
       }
      else
      {
        localStorage.removeItem('UTILISATEUR');
       }
    });
    
    // ----------------------------------------------------------------------------------------------------------------
    // ---- VERIFICATION FORMULAIRE DE CONNEXION
    // ----------------------------------------------------------------------------------------------------------------

      $("#form_connexion").validate({
      rules : {
        email : {
          required : true,
          email : true
        },
        pwd : {
          required : true,
          minlength : 3
        },	
      },
      messages : {
        email: {
          required: "L'email n'est pas renseigné",
          email: "Votre adresse doit être du format name@domain.com"
        },
        pwd: {
          required: "Le mot de passe n'est pas renseigné",
          minlength: "Votre mot de passe est trop court"
        }
      },
      submitHandler: function(form) {
      
        $.ajax({
                 type: "POST",
                 url: "traitements/utilisateur/verif_utilisateur.php",
                 data: $(form).serialize(),
                 dataType: 'json',
                 success: function (data) 
                 {
                   switch (data.CODE_RETOUR) {
                     case 'OK':
                      document.location.href="view/dashboard/dashboard.php";
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
        return false;
      }
    });
 

});
</script>

</body>
</html>

<?php 
    }
    else {
        header('Location: view/dashboard/dashboard.php');
    }
?>