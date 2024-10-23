<?php
// Démarrer la session pour récupérer l'utilisateur connecté
global $conn;
session_start();

if (!isset($_SESSION['user_id'])) {
    // Si l'utilisateur n'est pas connecté, redirection vers la page de connexion
    header('Location: login.php');
    exit();
}

// Connexion à la base de données
require_once ('db_my.php');
//require_once ('../public/composants/body_header.php');
// Récupérer l'ID de l'utilisateur depuis la session
$user_id = $_SESSION['user_id'];

// Récupérer les informations de l'utilisateur et de son abonnement
$sql = "SELECT users.nom, users.prenom, users.email,users.telephone,users.statut,users.date_naissance,subscriptions.categorie ,subscriptions.id,subscriptions.date_fin
        FROM users 
        JOIN subscriptions ON users.id = subscriptions.user_id 
        WHERE users.id= $user_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $email = $row['email'];
    $categorie = $row['categorie'];
    $telephone = $row['telephone'];
    $statut = $row['statut'];
    $date_naissance = $row['date_naissance'];
    $date_fin = $row['date_fin'];
} else {
    echo "Aucune information trouvée.";
    exit();
}

//$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil utilisateur</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!--        <link rel="stylesheet" href="../public/css/profil.css" />-->

    </head>


    <style>
    .button {
        padding: 15px 25px;
        font-size: 24px;
        text-align: center;
        cursor: pointer;
        outline: none;
        color: #fff;
        background-color: #04AA6D;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
        margin-left: 40%;justify-content: center;display: flex;
    }

    .button:hover {background-color: #3e8e41}

    .button:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }
</style>
<body style="font-family: 'Finger Paint', cursive">
<section class="my-5">

    <div class="container">

        <div class="card my-3" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
            <h1 class="mx-5">Bienvenue, <?php echo $prenom . " " . $nom; ?>!</h1>



            <?php if ($categorie == 'E-commerce'): ?>


                <p class="mx-5">Accédez à vos avantages E-commerce ici <a class="button" href="../E-Market-Place/source/">E-commerce</a>
                </p>
            <?php elseif ($categorie == 'Gestion-hopital'): ?>


                <p class="mx-5">Profitez des fonctionnalités Gestion-hopital
                    <button>
  <span class="btn-inner"><a class="button" href="../Hospital-ManagementPHP">Gestion Hopital</a></span></button>
            <?php elseif ($categorie == 'Gestion-administrative'): ?>


                <p class="mx-5">Bienvenue dans le club Gestion-administrative <a class="button" href="../arsn3/">Gestion Administrative</a></p>
            <?php endif; ?>

        </div>


        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="../public/images/just.jpg" alt="Admin"
                                     class="rounded-circle p-1 bg-warning" width="110">
                                <div class="mt-3">
                                    <h4><?php echo $prenom . " " . $nom; ?></h4>
                                    <p class="text-secondary mb-1">Telephone :<?= $telephone ?></p>
                                    <p class="text-muted font-size-sm">Date de fin: <?= $date_fin ?></p>

                                </div>
                            </div>
                            <div class="list-group list-group-flush text-center mt-4">
                                <a href="#" class="list-group-item list-group-item-action border-0 " onclick="showProfileDetails()">
                                    Profil Informaton
                                </a>
<!--                                <a href="#" class="list-group-item list-group-item-action border-0" onclick="showOrderDetails()">Orders</a>-->

                                <a href="#" class="list-group-item list-group-item-action border-0 active"
                                   onclick="showAddressBook()">
                                    Modifier Profil
                                </a>
                                <a href="logout.php" class="list-group-item list-group-item-action border-0">Déconnexion</a>
                                <a href="../souscription/user_souscription.php?id=<?=$user_id  ?>">souscription</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div  id="orderDetails" class="order_card">
                        <div class="card">
                            <div class="card-body">
                                <div class="top-status">
                                    <a href="../users/ajouter_mois.php?id=<?=$user_id  ?>">souscription</a>

                                    <?php
                                    //include_once ('../souscription/user_souscription.php');
                                    ?>
<!--                                    <h5>ORDER# 00000</h5>-->
                                    <ul>

                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div id="profileDetails" class="card" style="display: none;">
                        <div class="card-body" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                            <div class="profile-info">
                                <h5 style="font-family: 'Finger Paint', cursive;font-weight: bold">Profil</h5>
                                <p><strong>Nom:</strong> <?php echo $prenom . " " . $nom; ?></p>
                                <p><strong>Email Adresse:</strong> <?= $email ?></p>
                                <p><strong>Contact:</strong> <?= $telephone ?></p>
                                <p><strong>Date de naissance:</strong> <?= $date_naissance ?></p>

                                <p><strong>Categorie:</strong> <?= $categorie ?></p>

                                <p><strong>Statut:</strong> <?= $statut ?></p>
                            </div>
                        </div>
                    </div>

                    <div id="addressBook" class="card" style="display: none;">
                        <div class="card-body">
                            <h5>Modifier Profil</h5>
                            <button class="add_address_button" onclick="showAddAddressModal()">Modifier Profil</button>

                            <div id="addressList">

                            </div>
                        </div>
                    </div>



                    <!------------------------------------->

                    <div id="addAddressModal" class="modal" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                        <div class="modal-content" style="width: 55%;height: 50%;margin-left: 25%;margin-right: 25%;margin-top: 100px">
                            <span class="close text-danger" onclick="closeAddAddressModal()">&times;</span>
                            <h2>Modifier Profil</h2>
                            <form id="addAddressForm" method="post" action="update.php">

                                <div class="col-12 d-flex main_flex_div">
                                    <div class="col-4 d-flex flex-column inner_flex_div">
                                        <label for="name">Nom:</label>
                                        <input type="text" id="nom" name="nom" value="<?= $nom ?>" ><br>
                                    </div>
                                    <div class="col-4 d-flex flex-column inner_flex_div">
                                        <label for="mobile">Prenom:</label>
                                        <input type="text" id="mobile" value="<?= $prenom ?>" name="prenom" >
                                    </div>
                                    <div class="col-4 d-flex flex-column inner_flex_div">
                                        <label for="mobile">Email:</label>
                                        <input type="text"  id="mobile" value="<?= $email ?>" name="prenom" >
                                    </div>
                                </div>


                                <div class="col-12 d-flex main_flex_div">

                                    <div class="col-4 d-flex flex-column inner_flex_div">
                                        <label for="city">Date de naissance:</label>
                                        <input type="date" name="date_naissance" id="city" required><br>

                                    </div>
                                    <div class="col-4 d-flex flex-column inner_flex_div">
                                        <label for="city">Télephone:</label>
                                        <input type="tel" name="telephone" id="city" value="<?= $telephone ?>"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"><br>

                                    </div>
                                    <div class="col-4 d-flex flex-column inner_flex_div">
                                        <label for="state">State:</label>
                                        <select name="sexe">
                                            <option value="M">Homme</option>
                                            <option value="F">Femme</option>
                                        </select><br>
                                    </div>

                                </div>
                                <div class="col-12 d-flex button_div my-3" >
                                    <button type="submit" class="mx-2">Enregistrer</button>
                                    <button type="button" onclick="closeAddAddressModal()">Fermer</button>
                                </div>
                                </div>







                            </form>
                        </div>
                    </div>
                    <!------------------------------------->

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script>

    function showAddAddressModal() {
        const modal = document.getElementById('addAddressModal');
        modal.style.display = 'block';
        isFormVisible = true;
    }

    function closeAddAddressModal() {
        const modal = document.getElementById('addAddressModal');
        modal.style.display = 'none';
        isFormVisible = false;
    }

    function showProfileDetails() {
        hideAllSections();
        document.getElementById('profileDetails').style.display = 'block';
        setActiveLink(0);
    }

    function showOrderDetails() {
        hideAllSections();
        document.getElementById('orderDetails').style.display = 'block';
        setActiveLink(1);
    }

    function showAddressBook() {
        hideAllSections();
        document.getElementById('addressBook').style.display = 'block';
        setActiveLink(2);
    }

    function hideAllSections() {
        document.getElementById('orderDetails').style.display = 'none';
        document.getElementById('profileDetails').style.display = 'none';
        document.getElementById('addressBook').style.display = 'none';
    }

    function setActiveLink(index) {
        document.querySelector('.list-group-item.active').classList.remove('active');
        document.querySelectorAll('.list-group-item')[index].classList.add('active');
    }

    showProfileDetails();
</script>

</body>

</html>