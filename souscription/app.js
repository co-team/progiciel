document.addEventListener("DOMContentLoaded", function () {
    // Appel AJAX pour vérifier l'état de l'abonnement
    fetch('check_subscription.php')
        .then(response => response.json())
        .then(data => {
            const statusDiv = document.getElementById('subscription-status');

            if (data.is_active) {
                statusDiv.textContent = "Votre abonnement est actif.";
                statusDiv.classList.add('active');
            } else {
                statusDiv.textContent = "Votre abonnement a expiré.";
                statusDiv.classList.add('expired');

                // Optionnel : Envoyer une notification si l'abonnement est expiré
                sendNotification("Expiration d'abonnement", "Votre abonnement a expiré. Veuillez le renouveler.");
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
});

function sendNotification(title, message) {
    if (Notification.permission === "granted") {
        new Notification(title, {
            body: message,
            icon: "https://example.com/icon.png"
        });
    } else if (Notification.permission !== "denied") {
        Notification.requestPermission().then(permission => {
            if (permission === "granted") {
                new Notification(title, {
                    body: message
                });
            }
        });
    }
}
