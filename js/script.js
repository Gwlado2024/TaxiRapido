$(document).ready(function() {
    $('.chauffDispo').change(function() {
         var chauffeurId = $(this).val();
         var courseId = $(this).closest('tr').find('td:first').text();

        $.ajax({
            url: 'miseAJour.php', 
            method: 'POST',
            data: {
                chauffeur_id: chauffeurId, course_id: courseId
            },
            success: function() {

                $('.chauffDispo option[value="' + chauffeurId + '"]').prop('disabled', true);
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la mise à jour de la disponibilité du chauffeur:', error);
            }
        }); 
        console.log("Salut Ici!");
    });
});

$(document).ready(function() {
    $('.termine').click(function() {
         var chauffeurId = $(this).data('chauffeur-id');
         var status = $(this).val();
 
        $.ajax({
            url: 'courseTermine.php', 
            method: 'POST',
            data: {
                status: status, chauffeur_id: chauffeurId
            },
            success: function() {
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la mise à jour de la disponibilité du chauffeur:', error);
            }
        });
        console.log(chauffeurId);
        console.log(status);
    });
});