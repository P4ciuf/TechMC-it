document.addEventListener("DOMContentLoaded", function () {
    const textarea = document.getElementById("editable-text");
    const saveButton = document.getElementById("save-text");
    const statusMessage = document.getElementById("status");

    // Carica il testo esistente
    fetch("edit_text.php")
        .then(response => response.text())
        .then(data => textarea.value = data)
        .catch(error => console.error("Errore nel caricamento del testo:", error));

    // Salva il testo modificato
    saveButton.addEventListener("click", function () {
        const newText = textarea.value;

        fetch("edit_text.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "text=" + encodeURIComponent(newText)
        })
        .then(response => response.text())
        .then(data => {
            statusMessage.innerText = data;
            statusMessage.style.color = "green";
        })
        .catch(error => {
            console.error("Errore nel salvataggio del testo:", error);
            statusMessage.innerText = "Errore nel salvataggio.";
            statusMessage.style.color = "red";
        });
    });
});
