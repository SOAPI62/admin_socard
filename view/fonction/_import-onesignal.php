// ! -------------------------------------------------------------------------------------------------------
// ! ---- APPEL DE LA FENETRE IMPORT ONESIGNAL
// ! -------------------------------------------------------------------------------------------------------

$('#BTN_CSV_ONESIGNAL').click(function() {
    $('#import_onesignal_modale').modal('toggle');
});

// ! -------------------------------------------------------------------------------------------------------
// ! ---- FERMETURE DE LA MODALE IMPORT ONESIGNAL
// ! -------------------------------------------------------------------------------------------------------

$('#ANNULATION_IMPORT').click(function() {
    $('#import_onesignal_modale').modal('toggle');
});

// ! -------------------------------------------------------------------------------------------------------
// ! ---- VALIDATION DE L IMPORT DU FICHIER CSV
// ! -------------------------------------------------------------------------------------------------------


$('#form_import').on('submit', function(e){
    e.preventDefault();

$.ajax({
        type: "POST",             
        data: new FormData(this), 
        contentType: false,       
        cache: false,             
        processData:false,        
        dataType: 'json',
        url: "../../traitements/dashboard/import_onesignal.php",
        success: function (data) 
        {                     
            switch (data.CODE_RETOUR) {   
            case 'OK':
            toastr.success('Fichier uplaod');
            $('#import_onesignal_modale').modal('toggle');
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
});

// ! --------------------------------------------------------------------------------------------------
// ! UPLOAD FICHIER
// ! --------------------------------------------------------------------------------------------------

$("#file").on("change", function (e) {
var files = $(this)[0].files;
if (files.length >= 2) {
        $(".file_label").text(files.length + " Files Ready To Upload");
} else {
        var fileName = e.target.value.split("\\").pop();
        $(".file_label").text(fileName);
}
});