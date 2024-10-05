document.addEventListener('DOMContentLoaded', function() {
    
    function validerFormulaire(event) {
        const prix = parseFloat(document.getElementById('prix').value);
        const nbPers = parseInt(document.getElementById('nbPers').value);
        const nbLits = parseInt(document.getElementById('nbLits').value);

        if (prix < 50 || prix > 250) {
            alert('Le prix doit être compris entre 50 et 250.');
            event.preventDefault();
            return false;
        }
        if (nbPers < 1 || nbPers > 4) {
            alert('Le nombre de personnes doit être entre 1 et 4.');
            event.preventDefault();
            return false;
        }
        if (nbLits > 2) {
            alert('Le nombre de lits ne peut pas dépasser 2.');
            event.preventDefault();
            return false;
        }

        return true;
    }

    const form = document.getElementById('formAjoutChambre');
    if (form) {
        form.addEventListener('submit', validerFormulaire);
    }

    function confirmerSuppression(event) {
        const confirmation = confirm("Voulez-vous vraiment supprimer cette chambre ?");
        if (!confirmation) {
            event.preventDefault();
        }
    }

    const boutonsSupprimer = document.querySelectorAll('.btnSupprimer');
    boutonsSupprimer.forEach(function(button) {
        button.addEventListener('click', confirmerSuppression);
    });

});
