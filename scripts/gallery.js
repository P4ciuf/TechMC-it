document.addEventListener("DOMContentLoaded", function () {
    const uploadForm = document.getElementById("upload-form");
    const imageInput = document.getElementById("image-input");
    const galleryContainer = document.getElementById("gallery-container");

    function loadGallery() {
        fetch("fetch_gallery.php")
            .then(response => response.json())
            .then(images => {
                galleryContainer.innerHTML = "";
                images.forEach(image => {
                    const imgElement = document.createElement("img");
                    imgElement.src = image;
                    galleryContainer.appendChild(imgElement);
                });
            })
            .catch(error => console.error("Errore nel caricamento della galleria:", error));
    }

    uploadForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData();
        formData.append("image", imageInput.files[0]);

        fetch("upload.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.success) {
                loadGallery();
            }
        })
        .catch(error => console.error("Errore nel caricamento dell'immagine:", error));
    });

    // Carica le immagini esistenti al caricamento della pagina
    loadGallery();
});
