document.addEventListener("DOMContentLoaded", function () {
    function loadStats() {
        fetch("get_stats.php")
            .then(response => response.json())
            .then(data => {
                document.getElementById("visit-count").innerText = data.visits;
                document.getElementById("image-count").innerText = data.images;
            })
            .catch(error => console.error("Errore nel caricamento delle statistiche:", error));
    }

    loadStats();
});
