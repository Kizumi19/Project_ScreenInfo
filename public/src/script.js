document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('.btn-primary').addEventListener('click', function() {
        // Amaga el botó 'Visualitzar'
        this.style.display = 'none';
      
        // Mostra el botó 'Carregant dades...'
        document.querySelector('button[disabled]').style.display = 'inline-block';
    });
    // Veure si arriva el .js al index.php
    console.log("Script cargado correctamente");    document.querySelector('.btn-primary').addEventListener('click', function() {
    });
});


