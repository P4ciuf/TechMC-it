document.addEventListener("DOMContentLoaded", function () {
    let logoutButton = document.querySelector(".logout-button");

    if (logoutButton) {
        logoutButton.addEventListener("click", function () {
            fetch("logout.php").then(() => {
                window.location.href = "login.html";
            });
        });
    }
});
