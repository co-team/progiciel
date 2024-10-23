<?php
global $pdo;
require('../config/db.php');

if (isset($_POST['username']))

    $username = $_POST['nom'];

else

    $username = "";

$requete1 = "select * from users where nom='$username'";

$resultat1 = $pdo->query($requete1);

if ($employes = $resultat1->fetch()) {
    $id = $employes['id'];
    $mot_de_passe="0000";
    $mt = password_hash($mot_de_passe, PASSWORD_BCRYPT);
    $requete = "update users set mot_de_passe=? where id=?";
    $param = array($mt,$id);
    $resultat = $pdo->prepare($requete);
    $resultat->execute($param);

    $to = $employes['nom'];

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
            text: "  Un message contenant votre nouveau mot de passe est: <?= $mot_de_passe ?>!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
        }). then(function(result){
            window.location = "login.php";
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