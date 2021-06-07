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
        <li class="nav-item calendrier">
            <a id="BTN_CALENDRIER" class="nav-link"  data-toggle="modal">
            <i class="fas fa-calendar-alt"></i>
            </a>
        </li>
        <li class="nav-item deconnexion">
            <a id="BTN_DECONNEXION" class="nav-link"  data-toggle="modal">
            <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>



<!-- -------------------------------------------------------------------------------------------------------- -->
<!-- AJOUT D UN CONTACT ( RACCOURCI )                                                                         -->
<!-- -------------------------------------------------------------------------------------------------------- -->
<div class="modal fade dropdown" tabindex="-1" role="dialog" aria-hidden="true" id="ajout_contact_modale">
   <div class="modal-dialog modal-xl">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Ajout un contact</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="form-group">
               <label>Envoyer la SOCARD</label>
               <input type="checkbox" id="ENVOI_SOCARD" checked >
               <div id="BLK_ZONE_SOCARD">
 
               </div>
            </div>
            <div class="form-group">

               <div class="form-group">
                  <label id="BLK_CONTACT_PAR">Support de contact + </label>
                  <select  id="CONTACT_PAR" class="form-control select2" style="width: 100%;" style="display: none;">
                     <option value="TEL" selected="selected">Téléphone</option>
                     <option value="MAIL">Mail</option>
                     <option value="MSG">Messenger</option>
                     <option value="SMS">Sms</option>
                  </select>
               </div>
               <div id="BLK_ZONE_CONTACT_PAR">
                  <div class="form-group" id="BLK_TEL">
                     <div class="input-group" >
                        <input id="NRO_TEL" type="tel" class="form-control" placeholder="Saisir le numéro de téléphone">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                     </div>
                  </div>
                  <div class="form-group" id="BLK_MAIL">
                     <div class="input-group">
                        <input id="EMAIL" type="email" class="form-control" placeholder="Saisir l adresse mail">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="far fa-envelope"></i></span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group" >
                  <label id="BLK_TYPE_CONTACT">Type contact +</label>
                  <div id="BLK_ZONE_TYPE_CONTACT" style="display: none;">
                     <select id="TYPE_CONTACT" class="form-control select2" style="width: 100%;">
                        <option value="NC" selected="selected">Non connu</option>
                        <option value="PART">Particulier</option>
                        <option value="PRO">Professsionnel</option>
                     </select>
                  </div>
               </div>
               <div class="form-group" >
                  <label id="BLK_IDENTITE">Identité +</label>
                  <div id="BLK_ZONE_IDENTITE" style="display: none;">
                     <div class="input-group" >
                        <input id="NOM_CONTACT" type="text" class="form-control" placeholder="Nom" style="text-transform: uppercase">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i>
                           </span>
                        </div>
                     </div>
                     </br>
                     <div class="input-group" >
                        <input id="PRENOM_CONTACT" type="text" class="form-control"  placeholder="Prénom" style="text-transform: uppercase">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i>
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group"  >
                  <label id="BLK_REMARQUES">Remarques + </label>
                  <textarea id="BLK_ZONE_REMARQUES" class="form-control" rows="2" placeholder="..." style="text-transform: uppercase"></textarea>
               </div>
            </div>
         </div>
         <div class="modal-footer justify-content-between">
            <button id="AJOUT_CONTACT" type="button" class="btn btn-primary">Ajouter</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- -------------------------------------------------------------------------------------------------------- -->