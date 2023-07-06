function Commande() {
  const urlFull = window.location.search;
  const urlParams = new URLSearchParams(urlFull);
  const id = urlParams.get('id');
  
  document.getElementById('commande').addEventListener('click', function () {
    const phoneNumber = document.getElementById('telephone').value;
    const phoneRegex = /^(06|07|03)\d{8}$/;
    
    if (phoneRegex.test(phoneNumber)) {
      Swal.fire({
        title: 'Êtes-vous sûr de vouloir passer commande ?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Valider',
        cancelButtonText: 'Annuler'
      }).then((result) => {
        if (result.isConfirmed) {
          document.querySelector('#form1').submit();
        }
      });
    } else {
      Swal.fire({
        title: 'Numéro de téléphone invalide',
        text: 'Veuillez entrer un numéro de téléphone valide',
        icon: 'error',
        confirmButtonText: 'OK'
      });
    }
  });
}

// Appeler la fonction Commande() au chargement de la page
window.addEventListener('load', Commande);



   