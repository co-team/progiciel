<?php
session_start();
// ajouter_employe.php (modifié)
require '../../config/db.php';
require '../../config/employes.php';
require_once ('../../public/composants/body_header.php');
require_once ('../../public/composants/footer.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $poste = $_POST['poste'];
    $salaire_brut = $_POST['salaire_brut'];
    $departement_id = $_POST['departement_id'];
    $date_embauche = $_POST['date_embauche'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $statut = $_POST['statut'];
    $date_creation = $_POST['date_creation'];
    $contrat = $_POST['contrat'];

    ajouterEmploye(nom:$nom, prenom:$prenom, date_naissance:$date_naissance, poste:$poste,salaire_brut: $salaire_brut,departement_id:$departement_id, date_embauche:$date_embauche, email:$email, telephone:$telephone, adresse:$adresse,statut: $statut,date_creation: $date_creation,contrat: $contrat);
    header("Location: afficher_employes.php");
}
?>
<a onclick="history.back();"  class="mb-5"><i class="fas fa-angle-left arrow"></i></a>
<div class="container my-5" >

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css">
    <link rel="stylesheet" href="">
    <style>
        .intl-tel-input .selected-flag {
            z-index: 4;
        }
    </style>
<form method="POST" action="ajouter_employe.php" id="employed">

    <div class="row">

        <div class="col-3">
            <div class="input-group mb-3">
           <label> Nom:
                <input type="text" name="nom" class="form-control form-control-lg" required id="employed">
            </label>
            </div>
            <div class="input-group mb-3">
           <label> Prénom:
                <input type="text" name="prenom" class="form-control form-control-lg" required id="employed" >
            </label>
            </div>
            <div class="input-group mb-3">
             <label>Email:
                <input type="email" name="email" class="form-control form-control-lg" required id="employed"  >
            </label>
            </div>
            <div class="input-group mb-3">
             <label>Adresse:
                <input type="text" name="adresse" class="form-control form-control-lg" id="employed" >
            </label>
            </div>
            <div class="input-group mb-3">

 <label>Téléphone:
        <input id="tel" type="tel" name="telephone" class="form-control" id="employed"  >
    </label>
            </div>
            <div class="input-group mb-3">
 <label>Poste:
        <input type="text" name="poste" class="form-control form-control-lg" required id="employed"  >
    </label>
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
<label>Date d'embauche:
                    <input type="date" name="date_embauche" class="form-control form-control-lg" required id="employed"  >
    </label>
            </div>
            <div class="input-group mb-3">
     <label>Date d'ajout:
        <input type="date" name="date_creation" class="form-control form-control-lg" required id="employed" >
    </label>
            </div>
            <div class="input-group mb-3">
     <label>Salaire:
        <input type="number" name="salaire_brut" class="form-control form-control-lg" step="0.01" required id="employed"  >
    </label>
            </div>
            <div class="input-group mb-3">
    <label>Département:
        <?php
        if ($_SESSION['role'] == 'RH') {
            ?>
            <input type="text" name="departement_id" value="<?= $_SESSION['departement'] ?>" class="form-control form-control-lg">
 <?php
        }else{
        ?>
            <select class="form-control form-control-lg" name="departement_id" required id="employed">
                <?php
                global $pdo;
                // Récupérer la liste des employés depuis la base de données
                require('../../config/db.php');
                $sql = "SELECT id, nom FROM departements ";
                $stmt = $pdo->query($sql);
                while ($row = $stmt->fetch()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nom'] . "</option>";
                }
                ?>
            </select>

        <?php
        }
        ?>

    </label>
            </div>
<!--    Département: <input type="number" name="departement_id">-->
            <div class="input-group mb-3">
     <label>Date de naissance:
        <input type="date" name="date_naissance" class="form-control form-control-lg" id="employed" required>
    </label>
            </div>
            <div class="input-group mb-3">
                <label>  Statut:
                    <select class="form-control form-control-lg" name="statut" id="employed" required >
                        <option value="Actif" class="form-group">Actif</option>
                        <option value="Inactif" class="form-group">Inactif</option>
                    </select>
                </label>
            </div>
        </div>



        <div class="input-group mb-3">

    <label>Type de contrat:
        <select class="form-control form-control-lg" name="contrat" required id="employed" >
            <option value="CDI">CDI</option>
            <option value="CDD">CDD</option>
            <option value="Stage">Stage</option>
        </select>
    </label>
        </div>
            </div>


    <button id="submitBtn" type="submit" disabled class="btn btn-success">Ajouter Employé</button>

</form>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
<script>
    $("#tel").intlTelInput({
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
    });



</script>
<script>
    $("#employed").keyup(function(event) {
        var fieldValue = event.target.value;
        if (fieldValue == 0) {
            $("#submitBtn").attr("disabled", "disabled");
        } else {
            $("#submitBtn").removeAttr("disabled", "disabled");
        }
    });
</script>