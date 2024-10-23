<?php
session_start();
require_once ('./config/db.php');
// Connexion à la base de données
//$host = 'localhost';
//$dbname = 'salarie_gestion';
//$username = 'root';
//$password = '';
//
//try {
//    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//} catch (PDOException $e) {
//    die("Erreur de connexion : " . $e->getMessage());
//}

// Vérification si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $name = trim($_POST['nom']);

    // Requête pour trouver l'utilisateur avec cet email
    $sql = "SELECT * FROM employes WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'utilisateur existe et si le nom correspond au mot de passe
    if ($user && $name == $user['nom']) {
        // Connexion réussie, stocker les informations de l'utilisateur en session
        $_SESSION['user_id'] = $user['id'];

        $_SESSION['poste'] = $user['poste'];
        $_SESSION['nom'] = $user['nom'];

        if($_SESSION['poste'] != '') {
            header('Location: ../employe/employe_view.php');

        }else{
            echo "Identifiants incorrects."  ;

        }
        }
}
?>
<style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

    body {
        background: #c0c0c0;
        font-family: Raleway, sans-serif;
        color: #666;
    }

    .login {
        margin: 20px auto;
        padding: 40px 50px;
        max-width: 300px;
        border-radius: 5px;
        background: #fff;
        box-shadow: 1px 1px 1px #666;
    }
    .login input {
        width: 100%;
        display: block;
        box-sizing: border-box;
        margin: 10px 0;
        padding: 14px 12px;
        font-size: 16px;
        border-radius: 2px;
        font-family: Raleway, sans-serif;
    }

    .login input[type=text],
    .login input[type=password] {
        border: 1px solid #c0c0c0;
        transition: .2s;
    }

    .login input[type=text]:hover {
        border-color: #F44336;
        outline: none;
        transition: all .2s ease-in-out;
    }

    .login input[type=submit] {
        border: none;
        background: #EF5350;
        color: white;
        font-weight: bold;
        transition: 0.2s;
        margin: 20px 0px;
    }

    .login input[type=submit]:hover {
        background: #F44336;
    }

    .login h2 {
        margin: 20px 0 0;
        color: #EF5350;
        font-size: 28px;
    }

    .login p {
        margin-bottom: 40px;
    }

    .links {
        display: table;
        width: 100%;
        box-sizing: border-box;
        border-top: 1px solid #c0c0c0;
        margin-bottom: 10px;
    }

    .links a {
        display: table-cell;
        padding-top: 10px;
    }

    .links a:first-child {
        text-align: left;
    }

    .links a:last-child {
        text-align: right;
    }

    .login h2,
    .login p,
    .login a {
        text-align: center;
    }

    .login a {
        text-decoration: none;
        font-size: .8em;
    }

    .login a:visited {
        color: inherit;
    }

    .login a:hover {
        text-decoration: underline;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<form class="login" method="POST">
    <h2>Bienvenue 😊!</h2>
    <p>Se connecter</p>
    <input type="email" name="email" placeholder="Email" />
    <input type="password" name="nom" placeholder="mot de passe" />
    <input type="submit" value="Connexion" />
    <div class="links">

    </div>
</form>
</body>
</html>

