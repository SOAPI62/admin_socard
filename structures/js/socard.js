    // ------------------------------------------------------------------------
    // INITIALISATION DES VARIABES
    // ------------------------------------------------------------------------
    
    $app_install   = 0;

    // ------------------------------------------------------------------------
    // VERIF SI MODE TEST
    // ------------------------------------------------------------------------
  
    $trace = location.search.split('mode_trace=')[1];
    mode_trace = 0;

    if ($trace == 'OUI') {
      mode_trace = 1;
    }

    if (mode_trace==1) { Tracing('[Mode Trace activé] ' + $trace ); }

    // ------------------------------------------------------------------------
    // GESTION DU MODE TRACE
    // ------------------------------------------------------------------------
  
    if (localStorage.getItem("MODE_TRACE") != null)
    {
      mode_trace = localStorage.getItem("MODE_TRACE");
    }
    else
    {
      localStorage.setItem("MODE_TRACE", mode_trace);
      $('#BTN_MODE_TEST_ON').hide();
      $('#BTN_MODE_TEST_OFF').show();
    }

    if (mode_trace==1) { Tracing('*******************************************'); }

    if (mode_trace==1) { Tracing('[GESTION DU MODE TRACE] : ' + mode_trace); }
    

    // ------------------------------------------------------------------------
    // GESTION DE LA VERSION SOCARD
    // ------------------------------------------------------------------------

    if (localStorage.getItem("VERSION") == null) 
    {
      if (mode_trace==1) { Tracing('[GESTION DE LA VERSION SOCARD] APPEL verif_maj_socard.php'); }

      $version = 100;

      $.ajax({
        url: '../_creagcom/base/AJAX/socard/verif_maj_socard.php',
        data: 'version=' + $version,
        dataType: 'json',
        async: false,
        success: function(data) {
          switch (data.REPONSE) {
                case 'OK':
                    $version = data.VERSION;
                    if (mode_trace==1) { Tracing('[GESTION DE LA VERSION SOCARD] RETOUR : ' + $version); }
                    break;
                case 'KO':
                     if (mode_trace==1) { Tracing('[GESTION DE LA VERSION SOCARD] RETOUR : ' + $version); }
                    break;
                default:
                  break;
            }
          }
        });

      localStorage.setItem("VERSION",$version);

      $('#ID_VERSION').html('Version : ' + $version);
    }
    else
    {
      $version = localStorage.getItem("VERSION");
      $('#ID_VERSION').html('Version : ' + $version);
      if (mode_trace==1) { Tracing('[GESTION DE LA VERSION SOCARD] VERSION ENCOURS : ' + $version); }
    }

    // ------------------------------------------------------------------------
    // GESTION DES MISE À JOURS
    // ------------------------------------------------------------------------

    function init(){


        if (localStorage.getItem("DATE_VERIF_VERSION") == null) 
        {
            var ladate = new Date();
            alert(ladate.toDateString());
            
            localStorage.setItem("DATE_VERIF_VERSION", ladate.toDateString());
        }

      loop();
    }
    
    function loop(){
    // ICI ON SET LE LOOP : 5000 = 5 secondes
      setTimeout('loop();',5000);

      if (localStorage.getItem("ONLINE") != null) 
      {
        $online = localStorage.getItem("ONLINE", 0);

        if ($online)
        {
          var ladate        = new Date()
          var ladate_format = ladate.toDateString()
          $date_memorise    = localStorage.getItem("DATE_VERIF_VERSION");

          // alert($date_memorise + '*' + ladate_format);

          if ($date_memorise < ladate_format)
          {
            $version = localStorage.getItem("VERSION");

            $.ajax({
            url: '../_creagcom/base/AJAX/socard/verif_maj_socard.php',
            data: 'version=' + $version,
            dataType: 'json',
            async: false,
            success: function(data) {
              switch (data.REPONSE) {
                    case 'OK':
                        $version = data.VERSION;
                        localStorage.setItem("VERSION",$version);
                        localStorage.setItem("DATE_VERIF_VERSION", ladate_format);
                        alert($date_memorise + '*' + ladate_format);
                        window.location.reload();
                        break;
                    case 'KO':
                         if (mode_trace==1) { Tracing('[GESTION DES MISE À JOURS] Pas de nouvelle version'); }
                         localStorage.setItem("DATE_VERIF_VERSION", ladate_format);
                        break;
                    default:
                      break;
                }
              }
            });
          }
          else
          {
            if (mode_trace==1) { Tracing('[GESTION DES MISE À JOURS] Dodo : Pas de recherche de maj : ' + h); }
          }
        }
        else
        {
          if (mode_trace==1) { Tracing('[GESTION DES MISE À JOURS] Offline : Pas de recherche de maj'); }
        }
      }
    }

    init();

    // ------------------------------------------------------------------------
    // L APPLICATION EST ELLE INSTALLE ?
    // ------------------------------------------------------------------------

    const isInStandaloneMode =  ('standalone' in window.navigator) && (window.navigator.standalone);

     // ------------------------------------------------------------------------
    // AFFICHAGE DU PROMPT POUR L'INSTALLATION
    // ------------------------------------------------------------------------

    var prompt = new pwaInstallPrompt();
    

    // ------------------------------------------------------------------------
    // INITIALISATION VARIABLES
    // ------------------------------------------------------------------------
    
    $agent          = Detection_Agent();

    if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] ... '); }
  
    // LECTURE DE L ID DE L URL
    $id_url = location.search.split('id_socard=')[1];
    if ($id_url == undefined) {
        $id_url = '/';
    }

    if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : LECTURE ID URL * ' + $id_url); }

    $pwa = location.search.split('source=')[1];
    
    if ($pwa == 'pwa') {
        $app_install = 1;
    }

    if (mode_trace==1) { Tracing('[APPLICATION INSTALLE] : ' + $app_install + '*' + $version + '*' + $pwa); }
  
    // ------------------------------------------------------------------------
    // DETECTION MODE OFFLINE / ONLINE
    // ------------------------------------------------------------------------
    
    function showStatus(online) {
        // const statusEl = document.querySelector('.network-status');
        if (online) {
            localStorage.setItem("ONLINE", 1);
            $('#BLK_CONNEXION').hide();
            $('#GOOGLEMAPS').show();
            
            if (mode_trace==1) { Tracing('[showStatus] ONLINE'); };
  
            Traitement_Connexion_OnLine();
    
        } else {
            localStorage.setItem("ONLINE", 0);
            $('#BLK_CONNEXION').show();
            $('#GOOGLEMAPS').hide();
  
            Traitement_Connexion_OffLine();

            if (mode_trace==1) { Tracing('[showStatus] OFFLINE') };
        }
    }
    
    window.addEventListener('load', () => {
        // 1st, we set the correct status when the page loads
        navigator.onLine ? showStatus(true) : showStatus(false);
    
        // now we listen for network status changes
        window.addEventListener('online', () => {
            showStatus(true);
        });
    
        window.addEventListener('offline', () => {
            showStatus(false);
        });
    });
    
    // ------------------------------------------------------------------------
    // GESTION DES CLICK SUR LES LINK
    // ------------------------------------------------------------------------
    
    (function clickMe() {
        const btn_envoi_sms = document.getElementById("envoi_sms");
        const btn_partage_sms = document.getElementById("partage_sms");
        const btn_install_close = document.getElementById("pwa-install-prompt__overlay");
        const BNT_PARAMETRE = document.getElementById("BNT_PARAMETRE");

        btn_envoi_sms.addEventListener("click", event => {
            openSMSMobile();
        });
        btn_partage_sms.addEventListener("click", event => {
            PartageSMSMobile();
        });
        btn_install_close.addEventListener("click", event => {
            $("#pwa-install-prompt__container").hide();
        });

    })();
    
    
    // ------------------------------------------------------------------------
    // TRAITEMENT ONLINE
    // ------------------------------------------------------------------------
    
    function Traitement_Connexion_OnLine()
    {

        // ------------------------------------------------------------------------
        // MEMORISATION DATE ET HEURE SYSTEME
        // ------------------------------------------------------------------------

        var d = new Date();
        var date_jour  = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
        var heure_jour = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();

      // VERIFICATION SI LOCAL STORAGE SUPPORTE
      if (typeof(Storage) != "undefined") {
      
          // VERIFICATION LA PRESENCE DU FICHIER : INSTALL
      
          if (localStorage.getItem("INSTALL_PRM") == null) 
          {

            if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : INSTALL_PRM n existe pas'); }

              // CRÉATION D UN NOUVEAU ID
              id_socard = generation_UUID();
              if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : generation_UUID * ' + id_socard); }
              
              // GENERATION DU QRCODE
              // ---------------------------------------------------------------------------------------------------
              url_qrcode = "https://www.so-shooting.com/socard/index.html?id_socard=" + id_socard;
              if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : URL_QRCODE * ' + url_qrcode); }
      
              const qrCode = new QRCodeStyling(
              {
                //to begin with we need to set the size of our QR code using the following  
                width: 250,  
                height: 250,
                //then we pass the data we want to share with the qr code  
                data: url_qrcode,
                //the following option is to set an image on the center (if you want one, if not you can avoid this )  
                //image: "https://lh3.googleusercontent.com/ogw/ADGmqu_MN8SycvmR5uqUWFdKpIJ4-LP1NWLBKoNmQ0JO=s83-c-mo",
                //image: "https://www.so-shooting.com/socard/images/icon.png",
                //then we can style the dots of the QR code
                //it has 3 different types of dots 'rounded' 'dots' and'square' 
                //for this example I will use square which is also the default type  
                dotsOptions: {    color: "#000",    type: "square"  },
                //and at last we will set the style of the background of the QR code  
                backgroundOptions: 
                {    
                  color: "#FFFFFF",  
                }
              });
      
              $('#QRCODE').html('');
              qrCode.append(document.getElementById("QRCODE"));
    
              // CREATION DU LOCAL STORAGE : INSTALL_PRM
              // ---------------------------------------------------------------------------------------------------
      
              var INSTALL_PRM = {
                  id: id_socard,
                  agent : $agent,
                  app_install : $app_install,
                  date_creation: date_jour,
                  heure_creation: heure_jour,
                  nb_visite: 1,
                  url_socard: url_qrcode,
                  retour_srv: 0,
                  version : $version
              };
      
              var INSTALL_PRM_json = JSON.stringify(INSTALL_PRM);
              localStorage.setItem("INSTALL_PRM", INSTALL_PRM_json);
              if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : CREATION INSTALL_PRM'); }
      
              // AJOUT DE LA SOCARD AU CRM
              // ---------------------------------------------------------------------------------------------------  
  
                $url = 'id_socard=' + INSTALL_PRM.id + '&id_origine=' + $id_url + '&agent=' + INSTALL_PRM.agent + '&app_install=' + INSTALL_PRM.app_install + '&date_creation=' + INSTALL_PRM.date_creation + '&heure_creation=' +  INSTALL_PRM.heure_creation + '&nb_visites=' +  INSTALL_PRM.nb_visite + '&url_socard=' + INSTALL_PRM.url_socard + '&version=' + INSTALL_PRM.version;
                if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : APPEL ajout_socard.php ' + $url); }
  
                 $.ajax({
                   url: '../_creagcom/base/AJAX/socard/ajout_socard.php',
                   data: $url,
                   dataType: 'json',
                   async: false,
                   success: function(data) {
                      
                       if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : RETOUR ajout_socard.php * ' + data.REPONSE); }
  
                       switch (data.REPONSE) {
                           case 'OK':
                               // MISE A JOUR DU LOCAL STORAGE : INSTALL_PRM > RETOUR DU SERVEUR
                              var INSTALL_PRM_json       = localStorage.getItem("INSTALL_PRM");
                               var INSTALL_PRM           = JSON.parse(INSTALL_PRM_json);
                               INSTALL_PRM.retour_srv    = 1;
                              
                               // MISE A JOUR DU LOCAL STORAGE : INSTALL_PRM > RETOUR DU SERVEUR
                               var INSTALL_PRM_json = JSON.stringify(INSTALL_PRM);
                               localStorage.setItem("INSTALL_PRM", INSTALL_PRM_json);
  
                               break;
                           case 'ERREUR':
                                break;
                           default:
                              break;
                       }
                   }
                 });
                
              // ------------------------------------------------------------------------
              // GESTION DU JOURNAL
              // ---------------------------------------------------------------------------------------------------
              var JOURNAL_PRM = id_socard + '@' +  date_jour + '@' + heure_jour;
      
              Journal_PRM(JOURNAL_PRM);
      
              $tab_journal = [];
              $tab_journal = JSON.parse(localStorage.getItem("JOURNAL_PRM"));

              $url = 'liste_socard=' + $tab_journal;
      
              if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : APPEL ajout_journal_socard.php'); }
  
               $.ajax({
                 url: '../_creagcom/base/AJAX/socard/ajout_journal_socard.php',
                 data: $url,
                 dataType: 'json',
                 async: false,
                 success: function(data) {
  
                     if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : RETOUR ajout_journal_socard.php // ' + data.REPONSE); }
                     switch (data.REPONSE) {
                         case 'OK':
                               localStorage.removeItem('JOURNAL_PRM');
                               if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : SUPPRESSION JOURNAL_PRM'); }           
                             break;
                         case 'ERREUR':
                             break;
                         default:
                           break;
                     }
                 }
             });
      
          } else {
      

              // LECTURE DES PARAMETRES INSTALL_PRM
              var INSTALL_PRM_json = localStorage.getItem("INSTALL_PRM");
              var INSTALL_PRM = JSON.parse(INSTALL_PRM_json);
              id_socard = INSTALL_PRM.id;
  
              if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : LECTURE SOCARD ' + id_socard); }
      
              // GENERATION DU QRCODE
              // ---------------------------------------------------------------------------------------------------
      
              url_qrcode = INSTALL_PRM.url_socard;
  
              const qrCode = new QRCodeStyling(
              {
                //to begin with we need to set the size of our QR code using the following  
                width: 250,  
                height: 250,
                //then we pass the data we want to share with the qr code  
                data: url_qrcode,
                //the following option is to set an image on the center (if you want one, if not you can avoid this )  
                //image: "https://lh3.googleusercontent.com/ogw/ADGmqu_MN8SycvmR5uqUWFdKpIJ4-LP1NWLBKoNmQ0JO=s83-c-mo",
                //image: "https://www.so-shooting.com/socard/images/icon.png",
                //then we can style the dots of the QR code
                //it has 3 different types of dots 'rounded' 'dots' and'square' 
                //for this example I will use square which is also the default type  
                dotsOptions: {    color: "#000",    type: "square"  },
                //and at last we will set the style of the background of the QR code  
                backgroundOptions: 
                {    
                  color: "#FFFFFF",  
                }
              });
      
              $('#QRCODE').html('');
              qrCode.append(document.getElementById("QRCODE"));

              if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : INTÉGRATION QRCodeStyling'); }
      
              // INSCREMENTATION DU NOMBRE DE VISITE
              INSTALL_PRM.nb_visite++;
              INSTALL_PRM.version     = $version;

              if (INSTALL_PRM.app_install == 0)
              {
                INSTALL_PRM.app_install = $app_install;
              }
      
              // MISE A JOUR DE LA SOCARD AU CRM
              // ---------------------------------------------------------------------------------------------------

              var INSTALL_PRM_json = JSON.stringify(INSTALL_PRM);

              localStorage.setItem("INSTALL_PRM", INSTALL_PRM_json);
              if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : MAJ LOCAL STORAGE INSTALL_PRM'); }

              $url = 'id_socard=' + id_socard + '&id_origine=' + $id_url+ '&agent=' + INSTALL_PRM.agent + '&nb_visites=' + INSTALL_PRM.nb_visite + '&app_install=' + INSTALL_PRM.app_install  + '&version=' + INSTALL_PRM.version;
              
              if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : APPEL maj_socard.php ' + $url); }  
               $.ajax({
                 url: '../_creagcom/base/AJAX/socard/ajout_socard.php',
                 data: $url,
                 dataType: 'json',
                 async: false,
                 success: function(data) {
                    if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : RETOUR maj_journal_socard.php // ' + data.REPONSE); }
  
                     switch (data.REPONSE) {
                     case 'OK':
                             break;
                         case 'ERREUR':
                             break;
                         default:
                           break;
                     }
                   }
               });

              var JOURNAL_PRM = id_socard + '@' +  date_jour + '@' + heure_jour;
           
             // ------------------------------------------------------------------------
             // AJOUT DU JOURNAL AU CRM
             // ------------------------------------------------------------------------

             Journal_PRM(JOURNAL_PRM);
      
              $tab_journal = [];
              $tab_journal = JSON.parse(localStorage.getItem("JOURNAL_PRM"));

              $url = 'liste_socard=' + $tab_journal;

              Tracing('[Traitement_Connexion_OnLine] : APPEL ajout_journal_socard.php // ' + $url);}

               $.ajax({
                 url: '../_creagcom/base/AJAX/socard/ajout_journal_socard.php',
                 data: $url,
                 dataType: 'json',
                 async: false,
                 success: function(data) {
                     if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : RETOUR ajout_journal_socard.php // ' + data.REPONSE);}

                     switch (data.REPONSE) {
                         case 'OK':
                              localStorage.removeItem('JOURNAL_PRM');
                             if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : SUPPRESSION DU LOCAL STORAGE // JOURNAL_PRM'); }
                             break;
                         case 'ERREUR':
                             break;
                         default:
                             break;
                     }
                 }
             });
          }

        // ------------------------------------------------------------------------
        // TRAITEMENT DE LA NEWSLETTER EN ATTENTE
        // ------------------------------------------------------------------------

        if (localStorage.getItem("NEWSLETTER_PRM") != null) 
        {
            if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : Existance NEWSLETTER_PRM');  }
            
            var NEWSLETTER_PRM_json = JSON.stringify(NEWSLETTER_PRM);
            localStorage.setItem("INSTALL_PRM", NEWSLETTER_PRM_json);

            var $ajout_ORI_CLIENT = 'SOCARD';
            var $ajout_TYP_CLIENT = '';
            var $ajout_CIV1_CLIENT = '';
            var $ajout_NOM1_CLIENT = '';
            var $ajout_PNOM1_CLIENT = '';
            var $ajout_CIV2_CLIENT = '';
            var $ajout_NOM2_CLIENT = '';
            var $ajout_PNOM2_CLIENT = '';
            var $ajout_TEL_CLIENT = '';
            var $ajout_POR_CLIENT = $nro_tel;
            var $ajout_EMAIL_CLIENT = $email;
            var $ajout_ADR1_CLIENT = '';
            var $ajout_ADR2_CLIENT = '';
            var $ajout_CPOSTAL_CLIENT = '';
            var $ajout_VILLE_CLIENT = '';

             $.ajax({
                 url: '../_creagcom/base/AJAX/clients/prospect_ajout.php',
                 data: 'ajout_ORI_CLIENT=' + $ajout_ORI_CLIENT +
                     '&ajout_TYP_CLIENT=' + $ajout_TYP_CLIENT +
                     '&ajout_CIV1_CLIENT=' + $ajout_CIV1_CLIENT +
                     '&ajout_NOM1_CLIENT=' + $ajout_NOM1_CLIENT +
                     '&ajout_PNOM1_CLIENT=' + $ajout_PNOM1_CLIENT +
                     '&ajout_CIV2_CLIENT=' + $ajout_CIV2_CLIENT +
                     '&ajout_NOM2_CLIENT=' + $ajout_NOM2_CLIENT +
                     '&ajout_PNOM2_CLIENT=' + $ajout_PNOM2_CLIENT +
                     '&ajout_TEL_CLIENT=' + $ajout_TEL_CLIENT +
                     '&ajout_POR_CLIENT=' + $ajout_POR_CLIENT +
                     '&ajout_ADR1_CLIENT=' + $ajout_ADR1_CLIENT +
                     '&ajout_ADR2_CLIENT=' + $ajout_ADR2_CLIENT +
                     '&ajout_CPOSTAL_CLIENT=' + $ajout_CPOSTAL_CLIENT +
                     '&ajout_VILLE_CLIENT=' + $ajout_VILLE_CLIENT +
                     '&ajout_EMAIL_CLIENT=' + $ajout_EMAIL_CLIENT,
                 dataType: 'json',
                 async: false,
                 success: function(data) {
  
                     if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : RETOUR prospect_ajout.php // ' + data.REPONSE); }
  
                     switch (data.REPONSE) {
                         case 'OK':
                             // SUPPRESSION DU LOCAL STORAGE : NEWSLETTER
                             localStorage.removeItem('NEWSLETTER_PRM');
                             break;
                         case 'ERREUR':
                             break;
                         default:
                            break;
                     }
                 }
             });
      } 
      else 
      {
        if (mode_trace==1) { Tracing('[Traitement_Connexion_OnLine] : LOCAL STORAGE NON SUPPORTE'); }
      }
    }
  
    // ------------------------------------------------------------------------
    // TRAITEMENT OFFLINE
    // ------------------------------------------------------------------------
    
    function Traitement_Connexion_OffLine()
    {
  
        // ------------------------------------------------------------------------
        // MEMORISATION DATE ET HEURE SYSTEME
        // ------------------------------------------------------------------------

        var d = new Date();
        var date_jour  = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
        var heure_jour = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();

      // VERIFICATION SI LOCAL STORAGE SUPPORTE
      if (typeof(Storage) != "undefined") {
      
          // VERIFICATION LA PRESENCE DU FICHIER : INSTALL
      
          if (localStorage.getItem("INSTALL_PRM") == null) 
          {
      
            if (mode_trace==1) { Tracing('[Traitement_Connexion_OffLine] : INSTALL_PRM n existe pas'); }

              // CRÉATION D UN NOUVEAU ID
              id_socard = generation_UUID();
              if (mode_trace==1) { Tracing('[Traitement_Connexion_OffLine] : generation_UUID * ' + id_socard); }
              
              // GENERATION DU QRCODE
              // ---------------------------------------------------------------------------------------------------
              url_qrcode = "https://www.so-shooting.com/socard/index.html?id_socard=" + id_socard;
              if (mode_trace==1) { Tracing('[Traitement_Connexion_OffLine] : URL_QRCODE * ' + url_qrcode); }
      
              const qrCode = new QRCodeStyling(
              {
                //to begin with we need to set the size of our QR code using the following  
                width: 250,  
                height: 250,
                //then we pass the data we want to share with the qr code  
                data: url_qrcode,
                //the following option is to set an image on the center (if you want one, if not you can avoid this )  
                //image: "https://lh3.googleusercontent.com/ogw/ADGmqu_MN8SycvmR5uqUWFdKpIJ4-LP1NWLBKoNmQ0JO=s83-c-mo",
                //image: "https://www.so-shooting.com/socard/images/icon.png",
                //then we can style the dots of the QR code
                //it has 3 different types of dots 'rounded' 'dots' and'square' 
                //for this example I will use square which is also the default type  
                dotsOptions: {    color: "#000",    type: "square"  },
                //and at last we will set the style of the background of the QR code  
                backgroundOptions: 
                {    
                  color: "#FFFFFF",  
                }
              });
      
              $('#QRCODE').html('');
              qrCode.append(document.getElementById("QRCODE"));

              // CREATION DU LOCAL STORAGE : INSTALL_PRM
              // ---------------------------------------------------------------------------------------------------
      
              var INSTALL_PRM = {
                  id: id_socard,
                  agent : $agent,
                  app_install : $app_install,
                  date_creation: date_jour,
                  heure_creation: heure_jour,
                  nb_visite: 1,
                  url_socard: url_qrcode,
                  retour_srv: 0,
                  version : $version
              };
      
              var INSTALL_PRM_json = JSON.stringify(INSTALL_PRM);
              localStorage.setItem("INSTALL_PRM", INSTALL_PRM_json);
      
              if (mode_trace==1) { Tracing('[Traitement_Connexion_OffLine] : CREATION INSTALL_PRM'); }
      
      
              // GESTION DU JOURNAL
              // ---------------------------------------------------------------------------------------------------
              var JOURNAL_PRM = id_socard + '@' +  date_jour + '@' + heure_jour;
      
              Journal_PRM(JOURNAL_PRM);
      
              $url = 'liste_socard=' + JOURNAL_PRM;
      
              if (mode_trace==1) { Tracing('[Traitement_Connexion_OffLine] : APPEL ajout_journal_socard.php'); }
      
          } else {
      
              // LECTURE DES PARAMETRES INSTALL_PRM
              var INSTALL_PRM_json = localStorage.getItem("INSTALL_PRM");
              var INSTALL_PRM = JSON.parse(INSTALL_PRM_json);
              id_socard = INSTALL_PRM.id;
  
              if (mode_trace==1) { Tracing('[Traitement_Connexion_OffLine] : LECTURE SOCARD ' + id_socard); }
      
              // GENERATION DU QRCODE
              // ---------------------------------------------------------------------------------------------------
      
              url_qrcode = INSTALL_PRM.url_socard;
  
              const qrCode = new QRCodeStyling(
              {
                //to begin with we need to set the size of our QR code using the following  
                width: 250,  
                height: 250,
                data: url_qrcode,
                dotsOptions: {    color: "#000",    type: "square"  },
                backgroundOptions: 
                {    
                  color: "#FFFFFF",  
                }
              });
      
              $('#QRCODE').html('');
              qrCode.append(document.getElementById("QRCODE"));
              if (mode_trace==1) { Tracing('[Traitement_Connexion_OffLine] : INTÉGRATION QRCodeStyling'); }
      
              // INSCREMENTATION DU NOMBRE DE VISITE
              INSTALL_PRM.nb_visite++;
              INSTALL_PRM.version     = $version;

              if (INSTALL_PRM.app_install == 0)
              {
                INSTALL_PRM.app_install = $app_install;
              }
      
              // MISE A JOUR DE LA SOCARD AU CRM
              // ---------------------------------------------------------------------------------------------------
              var INSTALL_PRM_json = JSON.stringify(INSTALL_PRM);

              localStorage.setItem("INSTALL_PRM", INSTALL_PRM_json);
              if (mode_trace==1) { Tracing('[Traitement_Connexion_OffLine] : MAJ LOCAL STORAGE INSTALL_PRM'); }              
      
              // AJOUT DU JOURNAL AU CRM
              // ---------------------------------------------------------------------------------------------------
                  
              // STRUCTURE DU FICHIER JOURNAL_PRM
              var JOURNAL_PRM = id_socard + '@' +  date_jour + '@' + heure_jour;
      
              Journal_PRM(JOURNAL_PRM);

          }

      } 
      else {
        if (mode_trace==1) { Tracing('[Traitement_Connexion_OffLine] : LOCAL STORAGE NON SUPPORTE'); }
      }
    }

    // ------------------------------------------------------------------------
    // TRAITEMENT DE LA NEWSLETTERS
    // ------------------------------------------------------------------------
    $("#wf-form-newsletter").submit(function() {
        event.preventDefault();
        $email = $('#email').val();
        $nro_tel = $('#nro_tel').val();
        $anomalie = 0;
        if (($email.length == 0) && ($nro_tel.length == 0)) {
            alertify.warning('Les champs ne sont pas renseignés');
            $anomalie = 1;
        } else {
            if (($email.length != 0) && (!checkEmail($email))) {
                alertify.warning('L adresse mail est non valide');
                $anomalie = 1;
            }
            if (($nro_tel.length != 0) && (!Portable_Valide($nro_tel))) {
                alertify.warning('Le numéro de téléphone est non valide');
                $anomalie = 1;
            }
        }
        if ($anomalie == 0) {
            // ---------------- Mémorisation des données du formulaire
            var $ajout_ORI_CLIENT = 'SOCARD';
            var $ajout_TYP_CLIENT = '';
            var $ajout_CIV1_CLIENT = '';
            var $ajout_NOM1_CLIENT = '';
            var $ajout_PNOM1_CLIENT = '';
            var $ajout_CIV2_CLIENT = '';
            var $ajout_NOM2_CLIENT = '';
            var $ajout_PNOM2_CLIENT = '';
            var $ajout_TEL_CLIENT = '';
            var $ajout_POR_CLIENT = $nro_tel;
            var $ajout_EMAIL_CLIENT = $email;
            var $ajout_ADR1_CLIENT = '';
            var $ajout_ADR2_CLIENT = '';
            var $ajout_CPOSTAL_CLIENT = '';
            var $ajout_VILLE_CLIENT = '';
            // ---------------- Appel de la procédure connection_utilisateur.php
            // Paramètres : ID et MOT_DE_PASSE
            // Réponse    : data (json)
            $online = localStorage.getItem("ONLINE");
    
            if ( $online == 1 )
            {
              if (mode_trace==1) { Tracing('[VALIDATION NEWSLETTER] : APPEL prospect_ajout.php'); }
           
               $.ajax({
                 url: '../_creagcom/base/AJAX/clients/prospect_ajout.php',
                 data: 'ajout_ORI_CLIENT=' + $ajout_ORI_CLIENT +
                     '&ajout_TYP_CLIENT=' + $ajout_TYP_CLIENT +
                     '&ajout_CIV1_CLIENT=' + $ajout_CIV1_CLIENT +
                     '&ajout_NOM1_CLIENT=' + $ajout_NOM1_CLIENT +
                     '&ajout_PNOM1_CLIENT=' + $ajout_PNOM1_CLIENT +
                     '&ajout_CIV2_CLIENT=' + $ajout_CIV2_CLIENT +
                     '&ajout_NOM2_CLIENT=' + $ajout_NOM2_CLIENT +
                     '&ajout_PNOM2_CLIENT=' + $ajout_PNOM2_CLIENT +
                     '&ajout_TEL_CLIENT=' + $ajout_TEL_CLIENT +
                     '&ajout_POR_CLIENT=' + $ajout_POR_CLIENT +
                     '&ajout_ADR1_CLIENT=' + $ajout_ADR1_CLIENT +
                     '&ajout_ADR2_CLIENT=' + $ajout_ADR2_CLIENT +
                     '&ajout_CPOSTAL_CLIENT=' + $ajout_CPOSTAL_CLIENT +
                     '&ajout_VILLE_CLIENT=' + $ajout_VILLE_CLIENT +
                     '&ajout_EMAIL_CLIENT=' + $ajout_EMAIL_CLIENT,
                 dataType: 'json',
                 async: false,
                 success: function(data) {
  
                     if (mode_trace==1) { Tracing('[VALIDATION NEWSLETTER] : RETOUR prospect_ajout.php // ' + data.REPONSE); }
  
                     switch (data.REPONSE) {
                         case 'OK':
                             // SUPPRESSION DU LOCAL STORAGE : NEWSLETTER
                             localStorage.removeItem('NEWSLETTER_PRM');
                             alertify.success('Votre demande a été enregistrée');
                             $('#email').val('');
                             $('#nro_tel').val('');
                             break;
                         case 'ERREUR':
                             break;
                         default:
                            break;
                     }
                 }
             });
          }
          else
          {
            if (mode_trace==1) { Tracing('[VALIDATION NEWSLETTER] : HORS CONNEXION // MAJ NEWSLETTER_PRM '); }
  
            var NEWSLETTER_PRM = {
                id: id_socard,
                email: $email,
                telephone: $nro_tel
            };
    
            var NEWSLETTER_PRM_json = JSON.stringify(NEWSLETTER_PRM);
            localStorage.setItem("NEWSLETTER_PRM", NEWSLETTER_PRM_json);
    
            alertify.success('Votre demande a bien été pris en compte');
          }
        }
    });
    // ------------------------------------------------------------------------
    // GESTION DU BOUTON SMS EN FONCTION DU TYPE DE TELEPHONE
    // ------------------------------------------------------------------------
    function openSMSMobile() {
        if ($mobile == "IOS") {
            window.open('sms:0685318827', '_self');
        } else {
            window.open('sms://0685318827', '_self');
        }
        return false;
    }
    // ------------------------------------------------------------------------
    // GESTION DU BOUTON SMS EN FONCTION DU TYPE DE TELEPHONE
    // ------------------------------------------------------------------------
    function PartageSMSMobile() {
        if ($mobile == "IOS") {
            window.open('sms:&body=Bonjour je vous communique ma carte de visite virtuelle pour rester en contact : https://urlr.me/vW9rJ', '_self');
        } else {
            window.open('sms://?body=Bonjour, je vous communique ma carte de visite virtuelle So Shooting pour rester en contact : https://urlr.me/vW9rJ ', '_self');
        }
        return false;
    }
    // ------------------------------------------------------------------------
    // VALIDITE DE L ADRESSE MAIL
    // ------------------------------------------------------------------------
    function checkEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    // ------------------------------------------------------------------------
    // VALIDITE DU NUMERO DE TELEPHONE
    // ------------------------------------------------------------------------
    function Portable_Valide(PortableTest) {
        var regex = new RegExp(/^(06|07)[0-9]{8}/gi);
        if (regex.test(PortableTest)) {
            return (true);
        } else {
            return (false);
        }
    }
    
    // ------------------------------------------------------------------------
    // GENERATEUR UUID
    // ------------------------------------------------------------------------
    function generation_UUID() {
        var dt = new Date().getTime();
        var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = (dt + Math.random() * 16) % 16 | 0;
            dt = Math.floor(dt / 16);
            return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
        });
        return uuid;
    }
    
    // ------------------------------------------------------------------------
    // DETECTION SI IOS OU ANDROID
    // ------------------------------------------------------------------------
    function Detection_Agent() {
      const userAgent = window.navigator.userAgent.toLowerCase();
      $type = /iphone|ipad|ipod/.test(userAgent);
      if ($type == true) {
          $mobile = 'IOS';
          if (!isInStandaloneMode) {
              prompt.open();
          } else {
              $('#pwa-install-prompt__container').hide();
          }
      } else {
          $mobile = 'ANDROID';
      }

      return $mobile;
    }

    // ------------------------------------------------------------------------
    // GESTION DU JOURNAL
    // ------------------------------------------------------------------------

    function Journal_PRM($journal) {

        $tab_journal = [];

        if (localStorage.getItem("JOURNAL_PRM") != null) 
        { 
            $tab_journal = JSON.parse(localStorage.getItem("JOURNAL_PRM"));
            $tab_journal.push($journal);
            localStorage.setItem("JOURNAL_PRM", JSON.stringify($tab_journal));       
        }
        else
        {
            $tab_journal.push($journal);
            localStorage.setItem("JOURNAL_PRM", JSON.stringify($tab_journal));  
        }
        
    }

    // ------------------------------------------------------------------------
    // GESTION DU MODE TRACING
    // ------------------------------------------------------------------------

    function Tracing($trace) {

        if (localStorage.getItem("TRACE_PRM") != null) 
        {
            $tab_trace = [];
            $tab_trace = JSON.parse(localStorage.getItem("TRACE_PRM"));
        }
        else
        {
            $tab_trace = [];
        }
        
        var now = new Date();

        var annee   = now.getFullYear();
        var mois    = now.getMonth() + 1;
        if (mois < 10)
        {
            mois = '0' + mois;
        }
        var jour    = now.getDate();
        if (jour < 10)
        {
            jour = '0' + jour;
        }
        var heure   = now.getHours();
        if (heure < 10)
        {
            heure = '0' + heure;
        }
        var minute  = now.getMinutes();
        if (minute < 10)
        {
            minute = '0' + heure;
        }
        var seconde = now.getSeconds();
         if (seconde < 10)
        {
            seconde = '0' + heure;
        }

        var date_heure = annee + '/' + mois + '/' + jour + ' - ' + heure + ':' + minute + ':' + seconde;

        $tab_trace.push(' ** ' + date_heure + ' ** </br> ' + $trace);
        localStorage.setItem("TRACE_PRM", JSON.stringify($tab_trace));
        
    }