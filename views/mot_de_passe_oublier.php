<?php
global $pdo;
require('../config/db.php');

if (isset($_POST['username']))

    $username = $_POST['username'];

else

    $username = "";

$requete1 = "select * from utilisateurs where username='$username'";

$resultat1 = $pdo->query($requete1);

if ($employes = $resultat1->fetch()) {
    $id = $employes['id'];
    $password="0000";
    $mt = password_hash($password, PASSWORD_BCRYPT);
    $requete = "update utilisateurs set password=? where id=?";
    $param = array($mt,$id);
    $resultat = $pdo->prepare($requete);
    $resultat->execute($param);

    $to = $employes['username'];

    $subject = "INITIALISATION DE MOT DE PASSE ";

    $txt = "Votre nouveau mot de passe est :$mt";

    $headers = "From: RHPLUS" . "\r\n" . "CC: sanou196@gmail.com";

    mail($to, $subject, $txt, $headers);?>
    <html>
    <body>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal({
            icon: "success",
            title: "bon travail !",
            text: "  Un message contenant votre nouveau mot de passe a été envoyé sur votre adresse Email !",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
        }). then(function(result){
            window.location = "./utilisateurs/connexion.php";
        })
    </script>

    </body></html>
<?php }
else { ?>
    <html>
    <body>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal({
            icon: "warning",
            title: "Erreur !",
            text: "Le nom est incorrecte!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
        }). then(function(result){
            window.location = "motdepasseoublier.php";
        })
    </script>

    </body></html>
<?php }

?>