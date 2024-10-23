<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'abonnement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .subscription-status {
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-size: 18px;
        }
        .active {
            background-color: #d4edda;
            color: #155724;
        }
        .expired {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<h1>Votre abonnement</h1>
<div id="subscription-status" class="subscription-status">
    Chargement du statut...
</div>

<script src="app.js"></script>
</body>
</html>

