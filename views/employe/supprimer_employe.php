<?php
session_start();
global $pdo;
require '../../config/db.php';
//require '../../config/employes.php';
if (isset($_SESSION['user_id'])){
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $requete="delete from employes where id=$id";
    $resultat=$pdo->prepare($requete);
    $resultat->execute();
}
?>

<html>
<body>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    swal({
        icon: "success",
        title: "bon travail !",
        text: "l'employé a été supprimé avec succès!",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        closeOnConfirm: false
    }). then(function(result){
        window.location = "../employe/afficher_employes.php";
    })
</script>

</body></html>
<?php
    //header("Location: ../employe/afficher_employes.php");
}
?>

