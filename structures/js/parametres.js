
if (navigator.connection) 
{                 
  var type = navigator.connection.type;
  $('#NAV_TYPE').html('TYPE NAVIG : ' + type);

  var max = navigator.connection.downlinkMax;
  $('#downlinkMax').html('DownlinkMax : ' + max);

  var downlink  = navigator.connection.downlink;
  $('#downlink').html('Downlink : ' + downlink);

}
else
{
  $('#NAV_TYPE').html('TYPE NAVIG : non supporté' );
  $('#downlinkMax').html('DownlinkMax : non supporté');
  $('#downlink').html('Downlink : non supporté');
}

function maPosition(position) {
var infopos = "Position déterminée :\n";
infopos += "Latitude : "+position.coords.latitude +"\n";
infopos += "Longitude: "+position.coords.longitude+"\n";
infopos += "Altitude : "+position.coords.altitude +"\n";
alertify.success(infopos);
}

if(navigator.geolocation)
navigator.geolocation.getCurrentPosition(maPosition);


// ------------------------------------------------------------------------
// DETECTION MODE OFFLINE / ONLINE
// ------------------------------------------------------------------------

function showStatus(online) {
    // const statusEl = document.querySelector('.network-status');
    if (online) {
        localStorage.setItem("ONLINE", 1);
         $('#ONLINE').html('ONLINE');
    } else {
        localStorage.setItem("ONLINE", 0);
        $('#ONLINE').html('OFFLINE');
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
    const BTN_RESET = document.getElementById("BTN_RESET");
    const BTN_MODE_TEST_ON = document.getElementById("BTN_MODE_TEST_ON");
    const BTN_MODE_TEST_OFF = document.getElementById("BTN_MODE_TEST_OFF");
    const BTN_LISTE_TRACING = document.getElementById("BTN_LISTE_TRACING");
    const BTN_RESET_TRACING = document.getElementById("BTN_RESET_TRACING");
    const BTN_ENVOI_EMAIL = document.getElementById("BTN_ENVOI_EMAIL");

    BTN_RESET.addEventListener("click", event => {
      localStorage.removeItem('INSTALL_PRM');
      localStorage.removeItem('JOURNAL_PRM');
      localStorage.removeItem('NEWSLETTER_PRM');
      INSTALL_PRM();
      JOURNAL_PRM();
      NEWSLETTER_PRM();
    });

    BTN_MODE_TEST_ON.addEventListener("click", event => {
      $('#BTN_MODE_TEST_ON').hide();
      $('#BTN_MODE_TEST_OFF').show();
      localStorage.setItem("MODE_TRACE", 0);
    });

    BTN_MODE_TEST_OFF.addEventListener("click", event => {
      $('#BTN_MODE_TEST_ON').show();
      $('#BTN_MODE_TEST_OFF').hide();
      localStorage.setItem("MODE_TRACE", 1);
    });

    BTN_LISTE_TRACING.addEventListener("click", event => {
    
        if (localStorage.getItem("TRACE_PRM") != null)
        {
            $tab_trace = [];
            $tab_trace = JSON.parse(localStorage.getItem("TRACE_PRM"));
            $zone = "";
             for ( index = 0; index < $tab_trace.length; index++) {
                $zone += $tab_trace[index] + "</br>";             
             }
             $('#LISTE_TRACING').html($zone);
        }
        else
        {
            $('#LISTE_TRACING').html('');
            alert('Pas de trace !');
        }

      });

      BTN_RESET_TRACING.addEventListener("click", event => {
        localStorage.removeItem('TRACE_PRM');
        $('#LISTE_TRACING').html('');
      });

      BTN_ENVOI_EMAIL.addEventListener("click", event => {

        $data = $('#LISTE_TRACING').html();

        $.ajax({
          url: '../../_creagcom/base/AJAX/socard/envoi_tracing_email.php',
          data: 'data=' + JSON.stringify($data),
          dataType: 'text',
          async: false,
          success: function(data) {
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
      });

      

})();

// ------------------------------------------------------------------------
// GESTION DU MODE TRACE
// ------------------------------------------------------------------------

if (localStorage.getItem("MODE_TRACE") != null)
{
  mode_test = localStorage.getItem("MODE_TRACE");
  if (mode_test == 1)
  {
    $('#BTN_MODE_TEST_ON').show();
    $('#BTN_MODE_TEST_OFF').hide();
  }
  else
  {
    $('#BTN_MODE_TEST_ON').hide();
    $('#BTN_MODE_TEST_OFF').show();
  }
}
else
{
  localStorage.setItem("MODE_TRACE", 0);
  $('#BTN_MODE_TEST_ON').hide();
 $('#BTN_MODE_TEST_OFF').show();
}

INSTALL_PRM();
JOURNAL_PRM();
NEWSLETTER_PRM();

// ------------------------------------------------------------------------
// AFFICHAGE INSTALL_PRM
// ------------------------------------------------------------------------

function INSTALL_PRM()
{
  if (localStorage.getItem("INSTALL_PRM") != null)
  {
    var INSTALL_PRM_json = localStorage.getItem("INSTALL_PRM");
    var INSTALL_PRM = JSON.parse(INSTALL_PRM_json);
    id_socard = INSTALL_PRM.id;
    
    // DETECTION SI L APP EST INSTALLÉE
    if (INSTALL_PRM.app_install==1)
    {
      $('#INSTALLATION').html('APPLICATION : INSTALLÉE');
    }
    else
    {
      $('#INSTALLATION').html('APPLICATION : NON INSTALLÉE');
    }
    
    $('#ID_SOCARD').html('ID_SOCARD : ' + id_socard);
    $('#INSTALL_PRM').html('INSTALL_PRM : ' + INSTALL_PRM.id + ' @ ' + INSTALL_PRM.agent + ' @ ' + INSTALL_PRM.date_creation + ' @ ' + INSTALL_PRM.heure_creation + ' @ ' + INSTALL_PRM.nb_visite + ' @ ' + INSTALL_PRM.url_socard + ' @ ' + INSTALL_PRM.retour_srv);
  }
  else
  {
    $('#ID_SOCARD').html('ID_SOCARD : Vide');
    $('#INSTALL_PRM').html('INSTALL_PRM : vide');
  }
}

// ------------------------------------------------------------------------
// AFFICHAGE JOURNAL_PRM
// ------------------------------------------------------------------------

function JOURNAL_PRM()
{
if (localStorage.getItem("JOURNAL_PRM") != null)
{
  var JOURNAL_PRM_json = localStorage.getItem("JOURNAL_PRM");
  $('#JOURNAL_PRM').html('JOURNAL_PRM : ' + JOURNAL_PRM_json);
}
else
{
  $('#JOURNAL_PRM').html('JOURNAL_PRM : vide');
}
}

// ------------------------------------------------------------------------
// AFFICHAGE NEWSLETTER_PRM
// ------------------------------------------------------------------------

function NEWSLETTER_PRM()
{
if (localStorage.getItem("NEWSLETTER_PRM") != null)
{
  var NEWSLETTER_PRM_json = localStorage.getItem("NEWSLETTER_PRM");
  var NEWSLETTER_PRM = JSON.parse(NEWSLETTER_PRM_json);
  $('#NEWSLETTER_PRM').html('NEWSLETTER_PRM : ' + NEWSLETTER_PRM.id + ' @ ' + NEWSLETTER_PRM.email + ' @ ' + NEWSLETTER_PRM.telephone);
}
else
{
  $('#NEWSLETTER_PRM').html('NEWSLETTER_PRM : vide');
}
}

// ------------------------------------------------------------------------
// AFFICHAGE AGENT
// ------------------------------------------------------------------------

$agent = Detection_Agent();
$('#AGENT').html( 'AGENT : ' + $agent );

// ------------------------------------------------------------------------
// DETECTION SI IOS OU ANDROID
// ------------------------------------------------------------------------

function Detection_Agent() {
const userAgent = window.navigator.userAgent.toLowerCase();
$type = /iphone|ipad|ipod/.test(userAgent);
if ($type == true) {
    $mobile = 'IOS';
} else {
    $mobile = 'ANDROID';
}
return $mobile;
}
