
//ON CHANGE
document.getElementById('language-selector').addEventListener('change', function() {
    const selectedLanguage = this.value;
    const routeBase = this.getAttribute('data-route');
    const url = `${routeBase}/${selectedLanguage}`;

    fetch(url, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest', 
            'Accept': 'application/json',
        },
    })
    .then(response => {
        if (response.ok) {
            window.location.reload();
        } else {
            console.error('Error al cambiar el idioma');
        }
    })
    .catch(error => {
        console.error('Error de red:', error);
    });
});

