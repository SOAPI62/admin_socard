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
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
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
          <span class="form_error"></span>
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
          <span class="form_error"></span>
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
            <button id="BTN_VALIDER" type="button" class="btn btn-primary btn-block">Valider</button>
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
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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
    // ---- VERIFICATION ELEMENT FORMULAIRE
    // ----------------------------------------------------------------------------------------------------------------


    function check_form(id_input,regex,msg_vide,erreur) {
        valid = true;
        if ($("#"+id_input).length === 0)
            return false;
        if($("#"+id_input).val() === "") {
            $("#"+id_input).next(".form_error").fadeIn().text(msg_vide);
            valid = false;
        }
        else if(!$("#"+id_input).val().match(regex)) {
            valid = false;
            $("#"+id_input).next(".form_error").fadeIn().text(erreur);
        }
        else
            $("#"+id_input).next(".form_error").fadeOut();
        return valid;
    }   
 
 
    // ----------------------------------------------------------------------------------------------------------------
    // ---- VERIFICATION FORMULAIRE DE CONNEXION
    // ----------------------------------------------------------------------------------------------------------------

    $('#BTN_VALIDER').click(function() {
     
      var res = check_form("pwd", /^[A-Za-z0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]{3,}/,"Champ vide", "3 carac min, chiffres et lettres");
      res = check_form("email", /^[a-z0-9\-_.]+@[a-z0-9\-_.]+\.[a-z]{2,3}$/i,"Champ vide", "Adresse mail non valide !") && res;

      if (res == true)
      {
        var formData = new FormData();
        formData.append('email', $('#email').val());
        formData.append('pwd', $('#pwd').val());
        formData.append('se_souvenir', $('#se_souvenir').val());
       
        $.ajax({
                 type: "POST",
                 url: "traitements/utilisateur/verif_utilisateur.php",
                 data: formData,
                 cache: false,
                 contentType: false,
                 processData: false,
                 dataType: 'json',
                 success: function (data) 
                 {
                   switch (data.CODE_RETOUR) {
                     case 'OK':
                      window.location.href="view/dashboard/dashboard.php";
                     break;
                     case 'ANOMALIE':
                      toastr.error(data.MESSAGE_RETOUR);
                     break;  
                     case 'ERREUR':
                      toastr.error(data.MESSAGE_SQL);
                     break;                       
                     default:
                       break;
                   }
                }
        });
      }
      else
      {
        toastr.error('Les données du formulaires sont incorrectes !');
      }

    });
   });
</script>

</body>
</html>