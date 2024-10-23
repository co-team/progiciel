<?php
global $pdo;
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$departement = $_SESSION['departement'];
require_once ('../../../config/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $departement = $_POST['departement'];

// Vérifie si le nom d'utilisateur est déjà pris
    $sql_check = "SELECT COUNT(*) FROM utilisateurs WHERE username = :username";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([':username' => $username]);
    $count = $stmt_check->fetchColumn();

    if ($count > 0) {
        echo "Le nom d'utilisateur est déjà pris.";
    } else {
        // Hachage sécurisé du mot de passe
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (username, password, role,departement) VALUES (?,?,?,?)");
        $stmt->bind_param("ssssi", $username, $password, $role, $department);
        $stmt->execute();

        echo "Employé ajouté avec succès.";
    }
}


$result = "SELECT *,departements.id as departe,departements.nom as depart FROM utilisateurs INNER JOIN departements ON departements.id=utilisateurs.departement WHERE utilisateurs.departement= '".$departement."'";
$requete = $pdo->query($result);
$resultats = $requete->fetchAll();
foreach ($resultats as $resultat) {
    $depart= $resultat['depart'];
}
?>
<!DOCTYPE html>
<html>
<style>
    .test-text {
        position: absolute;
    }

    .butt {
        width: 378px;
        appearance: none;
        background: transparent;
        border: none;
        cursor: pointer;
        isolation: isolate;
        z-index: 5;
        margin-left: 50px;
    }

    .butt {
        color: #000;
        font-size: 16px;
        line-height: 1.5;
        font-weight: 600;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 24px 72px;
        /*   border-block: 1px solid color-mix(in oklab, white, transparent 20%);
          border-inline: 1px solid color-mix(in oklab, black, transparent 40%); */
        border-radius: 9999rem;
        background: color-mix(in oklab, black, transparent 95%);
        backdrop-filter: blur(6px);
        position: relative;
        box-shadow: 0 -1px 0 0 color-mix(in oklab, white, transparent 50%), 0 1px 0 0 color-mix(in oklab, white, transparent 50%), -1px 0 0 0 color-mix(in oklab, black, transparent 50%), 1px 0 0 0 color-mix(in oklab, black, transparent 50%);

        &::before {
            content: '';
            border-radius: inherit;
            background: color-mix(in oklab, black, transparent 90%);
            position: absolute;
            inset: 0;
            transform: translate(0, 12px);
            filter: blur(6px);
            z-index: -1;
        }

        &:hover {
            scale: 1.1;
            transition: scale 200ms ease-out;

            &::before {
                background: color-mix(in oklab, black, transparent 95%);
            }
        }

        &:active {
            scale: 0.9;
            transition: scale 100ms ease-out;

            &::before {
                background: color-mix(in oklab, black, transparent 85%);
            }
        }
    }
</style>
<head><title>Tableau de bord RH</title></head>
<body>
<h2 style="justify-content: center;align-items: center;display: flex;color: #3d8de3;text-transform: capitalize;">Vous pouvez ajouter un nouvel employé <?= $_SESSION['username'] ?></h2>
<a class="butt"  href="../../admin/dashboard.php"><span>Acceder au Dashboard</span></a>
<link rel="stylesheet" href="../../../public/css/inscription.css">
<link rel="stylesheet" href="https://use.fontawesome.com/4ecc3dbb0b.js">
<div class="form_wrapper" style="margin-bottom: 100px">
    <div class="form_container">
        <div class="title_container">
            <h2>Responsive Registration Form</h2>
        </div>
        <div class="row clearfix">
            <div class="">
                <form method="POST" action="dashboard.php">
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                        <input type="text" name="username" placeholder="Nom" required />
                    </div>
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="password" name="password" placeholder="Mot de passe" required />
                    </div>
                    <div class="input_field select_option">

                        <select name="departement" required>
                            <option>Selectionner le Departement:</option>

                            <option value='<?= $departement ?>'> <?= $depart ?> </option>

                        </select>
                        <div class="select_arrow"></div>
                    </div>
                    <div class="input_field select_option">
                        <select name="role" required>
                            <option>Selectionner le role:</option>
<!--                            <option value="Admin">Admin</option>-->
                            <option value="RH">RH</option>
                            <option value="Employe">Employé</option>
                        </select>
                        <div class="select_arrow"></div>
                    </div>
                    <div class="input_field checkbox_option">
                        <input type="checkbox" id="cb1">
                        <label for="cb1">I agree with terms and conditions</label>
                    </div>
                    <div class="input_field checkbox_option">
                        <input type="checkbox" id="cb2">
                        <label for="cb2">I want to receive the newsletter</label>
                    </div>
                    <input class="button" type="submit" value="Enregistrer" />
                </form>
            </div>
        </div>
    </div>
</div>



<h3 style="justify-content: center;align-items: center;display: flex">Employés du département <b style="color: #7d1038">&nbsp; <?= $depart ?></b></h3>

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css">

<table id="example" class="display nowrap" style="width:100%">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Position</th>
        <th>Office</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($resultats as $resultat) {


        ?>
        <tr>
            <td><?= $resultat['username'] ?></td>
            <td><?= $resultat['role'] ?></td>
            <td><?= $resultat['depart'] ?></td>

        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<a style="border: 1px solid black;padding: 10px;background-color: #6A6A6A;border-radius: 10px;margin-bottom: 100px;color: white" href="logout.php">Se déconnecter</a>
<br>
<br>
<br>
</body>
</html>








<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.print.min.js"></script>
<script>
    new DataTable('#example', {
        layout: {
            topStart: {
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            }
        }
    });
</script>