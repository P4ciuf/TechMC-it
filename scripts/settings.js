document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("settings-form");

    // Carica le impostazioni esistenti
    fetch("update_settings.php")
        .then(response => response.json())
        .then(data => {
            document.getElementById("site-title").value = data.site_title;
            document.getElementById("site-description").value = data.site_description;
            document.getElementById("maintenance-mode").value = data.maintenance_mode;
        })
        .catch(error => console.error("Errore nel caricamento delle impostazioni:", error));

    // Salva le nuove impostazioni
    form.addEventListener("submit", function (event) {
        event.preventDefault();

        const settingsData = {
            site_title: document.getElementById("site-title").value,
            site_description: document.getElementById("site-description").value,
            maintenance_mode: document.getElementById("maintenance-mode").value
        };

        fetch("update_settings.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(settingsData)
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        })
        .catch(error => console.error("Errore nell'aggiornamento delle impostazioni:", error));
    });
});
