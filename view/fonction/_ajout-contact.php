// ! --------------------------------------------------------------------------------------------------
// ! INITIALISATION DE LA LISTE DES MESSAGES SMS DANS LE CAS D UN AJOUT D UN CONTACT
// ! --------------------------------------------------------------------------------------------------

$.ajax({
    url: '../../traitements/contact/liste_select_messages.php',
    dataType: 'json',
    async: false,
    success: function(data) {
        $('#BLK_ZONE_SOCARD').html(data.HTML);
    }
    }); 

// ! --------------------------------------------------------------------------------------------------
// ! DETECTION CHANGEMENT DU TYPE DE CONTACT
// ! --------------------------------------------------------------------------------------------------

$( "#CONTACT_PAR" ).change(function() {

switch ($('#CONTACT_PAR').val()) {
    case 'TEL':
    $('#BLK_TEL').show();
    $('#BLK_MAIL').hide();
    break;
    case 'MAIL':
    $('#BLK_TEL').hide();
    $('#BLK_MAIL').show();
    break;
    case 'MSG':
    $('#BLK_TEL').hide();
    $('#BLK_MAIL').hide();
    break;
}
});

// ! --------------------------------------------------------------------------------------------------
// ! PROCEDURE : AJOUT D UN CONTACT
// ! --------------------------------------------------------------------------------------------------

$('#AJOUT_CONTACT').click(function() {

message_anomalie = "";


const reg = /\W+\W/;
const str = $('#NRO_TEL').val();
const newStr = str.replace(reg, "+");
const newStr2 = newStr.replace(reg, "");
const newStr3 = newStr2.replace('+33', '0');
const num = newStr3.replace('France', "");

var $ajout_ORI_CLIENT = $('#CONTACT_PAR').val();
var $ajout_TYP_CLIENT = $('#TYPE_CONTACT').val();
var $ajout_CIV1_CLIENT = '';
var $ajout_NOM1_CLIENT = $('#NOM_CONTACT').val();
var $ajout_PNOM1_CLIENT = $('#PRENOM_CONTACT').val();
var $ajout_CIV2_CLIENT = '';
var $ajout_NOM2_CLIENT = '';
var $ajout_PNOM2_CLIENT = '';
var $ajout_TEL_CLIENT = '';
var $ajout_POR_CLIENT = num;
var $ajout_EMAIL_CLIENT = $('#EMAIL').val();
var $ajout_ADR1_CLIENT = '';
var $ajout_ADR2_CLIENT = '';
var $ajout_CPOSTAL_CLIENT = '';
var $ajout_VILLE_CLIENT = '';
var $ajout_COMMENTAIRE_CLIENT = $('#BLK_ZONE_REMARQUES').val();


switch ($('#CONTACT_PAR').val()) {
    case 'TEL':
    if ($ajout_POR_CLIENT.trim() == "")
    {
        message_anomalie = "Téléphone non renseigné !";
    }
    else if ($ajout_POR_CLIENT.trim() != "")
    {
        if (!checkPhone(num))
        {
            message_anomalie = "Numero de téléphone non conforme !";
        }
    }
    break;
    case 'MAIL':
    if ($ajout_EMAIL_CLIENT.trim() != "")
    {
        if (!checkEmail($ajout_EMAIL_CLIENT))
        {
            message_anomalie = "Adresse mail non conforme !";
        }
    }
    else
    {
        message_anomalie = "Adresse mail non renseigné !";
    }
    break;
    case 'MSG':
    break;
}

if (message_anomalie != '')
{
toastr.warning(message_anomalie);
}
else
{
$nro_client = 0;

$.ajax({ 
    url: '../../../../_creagcom/base/AJAX/clients/prospect_ajout.php', 
    data: 'ajout_ORI_CLIENT=' + $ajout_ORI_CLIENT + '&ajout_TYP_CLIENT=' + $ajout_TYP_CLIENT + '&ajout_CIV1_CLIENT=' + $ajout_CIV1_CLIENT + '&ajout_NOM1_CLIENT=' + $ajout_NOM1_CLIENT + '&ajout_PNOM1_CLIENT=' + $ajout_PNOM1_CLIENT + '&ajout_CIV2_CLIENT=' + $ajout_CIV2_CLIENT + '&ajout_NOM2_CLIENT=' + $ajout_NOM2_CLIENT + '&ajout_PNOM2_CLIENT=' + $ajout_PNOM2_CLIENT + '&ajout_TEL_CLIENT=' + $ajout_TEL_CLIENT + '&ajout_POR_CLIENT=' + $ajout_POR_CLIENT + '&ajout_ADR1_CLIENT=' + $ajout_ADR1_CLIENT + '&ajout_ADR2_CLIENT=' + $ajout_ADR2_CLIENT + '&ajout_CPOSTAL_CLIENT=' + $ajout_CPOSTAL_CLIENT + '&ajout_VILLE_CLIENT=' + $ajout_VILLE_CLIENT + '&ajout_EMAIL_CLIENT=' + $ajout_EMAIL_CLIENT  + '&ajout_SUPPORT_COM=SOCARD' , 
    dataType: 'json', 
    async: false, 
    success: function(data) 
    { 
        switch (data.REPONSE) 
        { 
            case 'OK': 
            toastr.success('Ajout du Contact !');
            $('#ajout_contact_modale').modal('toggle'); 
            $nro_client = data.VALEUR;
            break; 
            case 'KO': 
            toastr.warning(data.MESS_ERR); 
            $nro_client = data.VALEUR;
            $('#ajout_contact_modale').modal('toggle'); 
            break; 
            default: 
            break; 
        } 
    } 
});

if ($ajout_COMMENTAIRE_CLIENT.trim() != '')
{
        var ladate     = new Date()
        var date_jour  = ladate.getFullYear() + "/" + (ladate.getMonth()+1) + "/" + ladate.getDate();

        var item = {
        "ajout_CHEMIN_PROJET":  '',
        "ajout_PROJET3": 0,
        "ajout_TITRE": $ajout_COMMENTAIRE_CLIENT,
        "ajout_COMMENTAIRE": '',
        "ajout_DATE_PLANNIF": date_jour,
        "ajout_PRIORITE": 1,
        "ajout_REPETITION": 0,
        "ajout_RESSOURCE": 1,
        "ajout_CLIENT": $nro_client,
        "ajout_CONTRAT": 0
        };

        myJSON = JSON.stringify(item);

        $.ajax({
        url: '../../traitements/todo/ajout_todo.php',
            data: 'data=' + myJSON, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            dataType:'json',
            async: false,
            success: function(data) {
            switch (data.REPONSE) {
                case 'OK':
                toastr.success('Ajout du Todo!');
                break;
                case 'ERREUR':
                alert(data.MESS_ERR);
                break;
                case 'ANOMALIE':
                alert(data.REPONSE);
                break;
            }
            }
        });
}
        

    // ! ENVOIE DE LA SOCARD SI CONTACT PAR TELEPHONE UNIQUEMENT !

var remember = document.getElementById('ENVOI_SOCARD');
$type_contact = $('#CONTACT_PAR').val();

if ((remember.checked == 1) && ($type_contact == 'TEL'))
{
    $.ajax({
    url: '../../traitements/contact/envoi_sms_socard.php',
    data: 'nro_tel=' + $ajout_POR_CLIENT + '&type_message=' + $('#SOCARD').val(),
    dataType: 'json',
    async: false,
    success: function(data) {
        switch (data.REPONSE) {
            case 'OK':
                toastr.success('Sms envoyé au contact!')
                $('#ajout_contact_modale').modal('toggle');
                break;
            case 'ERREUR':
                toastr.warning('Sms non envoyé ! ' + data.CODE_ERR);
                break;
            default:
                break;
        }
    }
    });    
}
}
});


// ! --------------------------------------------------------------------------------------------------
// ! INITIALISATION DES CHAMPS DE LA MODALE "CONTACT" SI CLICK SUR LE BOUTON RACCOURCI
// ! --------------------------------------------------------------------------------------------------

$('#BTN_AJOUT_CONTACT').click(function() {
$('#BLK_TEL').show();
$('#BLK_MAIL').hide();
$('#BLK_ZONE_REMARQUES').hide();

$('#NRO_TEL').val('');
$('#EMAIL').val('');
$('#NOM_CONTACT').val('');
$('#PRENOM_CONTACT').val('');
$('#TYPE_CONTACT').val('NC');
$('#BLK_ZONE_REMARQUES').val('');

$('#ajout_contact_modale').modal('toggle');
});

// ! --------------------------------------------------------------------------------------------------
// ! GESTION DES CLICK SUR LA MODALE "CONTACT" POUR OPTIMISER L AFFICHAGE
// ! --------------------------------------------------------------------------------------------------

$('#BLK_TYPE_CONTACT').click(function() {
$('#BLK_ZONE_TYPE_CONTACT').toggle();
});

$('#BLK_IDENTITE').click(function() {
$('#BLK_ZONE_IDENTITE').toggle();
});

$('#BLK_REMARQUES').click(function() {
$('#BLK_ZONE_REMARQUES').toggle();
});

$('#ENVOI_SOCARD').change(function() {
$('#BLK_ZONE_SOCARD').toggle();
})

$('#BLK_CONTACT_PAR').click(function() {
$('#BLK_ZONE_CONTACT_PAR').toggle();
})