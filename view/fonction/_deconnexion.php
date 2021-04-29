         

         $('#BTN_DECONNEXION').click(function() {
            $.ajax({
               url: '../../traitements/connexion_bdd/deconnexion.php',
                dataType: 'text',
                async: false,
                success: function(data) {
                  document.location = '../../index.php';
                }
               });  
         });