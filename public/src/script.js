document.addEventListener("DOMContentLoaded", function () {  
    window.addEventListener('pageshow', function(event) {
        const loadingButton = document.querySelector("button[disabled]");
        const originalButton = document.querySelector(".btn-primary");
        // Comprovem si la pàgina va cargando desde la caché
        if (event.persisted) {
            const loadingButton = document.querySelector("button[disabled]");
            if (loadingButton) {
                loadingButton.style.display = "none";
            }
            if (originalButton) {
                originalButton.style.display = "inline-block"; 
            }
        }
    });

    const timeoutId = setTimeout(function () {
        console.log("Funciono!");
    }, 2000);

    clearTimeout(timeoutId);
    //console.log(`Tiempo de espera ID ${timeoutId} ha sido limpiado`);
    let loadingTimeout;

    document.querySelector(".btn-primary").addEventListener("click", function () {
        // Amaga el botó 'Visualitzar'
        this.style.display = "none";

        // Mostra el botó 'Carregant dades...'
        document.querySelector("button[disabled]").style.display = "inline-block";
        setTimeout(function () {
            clearTimeout(loadingTimeout);
            window.location.href = "formDoctor.php";
        }, 5500);
    });



    // Veure si arriva el .js al index.php
    console.log("Script cargado correctamente");
});
