
<?php
session_start();
global$pdo;
// Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
if (!isset($_SESSION['user_id'])) {
    header('Location:../../home.php');
    exit;
}
$user_role = $_SESSION['role']; // Rôle de l'utilisateur (Admin, RH, Employe)
$user_id = $_SESSION['user_id'];
require_once('../../public/composants/heading.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "boosts";

$pdo = new mysqli($servername, $username, $password, $dbname);

if ($pdo->connect_error) {
    die("Connection failed: " . $pdo->connect_error);
}
// Requête pour compter les utilisateurs ayant le rôle "user" (nouveaux utilisateurs non encore promus)
$sql = "SELECT COUNT(*) as new_users FROM users ";
$result = $pdo->query($sql);
$row = $result->fetch_assoc();

// Retourner le nombre d'utilisateurs sous format JSON
//echo json_encode(['new_users' => $row['new_users']]);
$pdo->close();

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"  crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .notification-bell {
        position: relative;
        display: inline-block;
    }
    .notification-count {
        position: absolute;
        top: 50px;
        right: 190px;

        color: #7d1111;
        padding: 3px 6px;
        font-weight: bold;
        font-size: 20px;
    }
    }
</style>

<title>Progiciel</title>
<link rel="icon" type="image/x-icon" href="../../public/images/icon.jpg">
<link rel="stylesheet" href="../../public/css/sidebar.css">
<nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0 font-weight-bold" href="https://www.coteamdev.tech/" style="font-family:Papyrus,fantasy;">CoteamDev</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="../logout.php">Déconnectez-vous !</a>
        </li>
    </ul>
</nav>
<div data-aos="fade-down"
           data-aos-easing="linear"
           data-aos-duration="1500">
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar mt-5">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="zmdi zmdi-view-dashboard"></i>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../ecommerce_boost/sign.php" >

                                <i class="zmdi zmdi-notifications"></i>
                                <b class="notification-count" style="color: #8b1014"><?=  $row['new_users'] ?></b>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            <i class="zmdi zmdi-assignment"></i>
                            Tableau
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../bulletin/bulletins.php?id=<?=$_SESSION['user_id']  ?>">
                            <i class="zmdi zmdi-chart 14s"></i>
                            Salaire payé
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../conges/afficher_conge_demande.php">
                            <i class="zmdi zmdi-accounts"></i>
                            Congés
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../utilisateurs/utilisateurs.php">
                            <i class="zmdi zmdi-face"></i>
                            Utilisateurs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../departement/departement.php">
                            <i class="zmdi zmdi-layers"></i>
                            Departement
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center pl-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="d-flex align-items-center text-muted" href="../index.php">
                        <i class="zmdi zmdi-plus-circle-o"></i>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="../notifications/notifications.php">
                            <i class="zmdi zmdi-notifications-none"></i>
                            Notifications
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">
                            <i class="zmdi zmdi-eject"></i>
                            Déconnexion
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../souscription/admin.php">
                            <i class="zmdi zmdi-file-text"></i>
                            Souscription
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="zmdi zmdi-file-text"></i>
                            Year-end sale
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 my-3">
            <div class="card-list">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card blue">
                            <div class="title">Nombre utilisateurs</div>
                            <i class="zmdi zmdi-upload"></i>
                            <?php
                            require_once ('../../config/db.php');
                            require_once ('../../config/employes.php');
                            // require_once ('../../config/employe.php');
                            global $pdo;
                            // Requête pour obtenir le total
                            $stmt = $pdo->query("SELECT COUNT(*) as total  FROM utilisateurs");
                            $partResult = $stmt->fetch(PDO::FETCH_ASSOC);
                            $total = $partResult['total'];

                            // Requête pour obtenir une partie spécifique (par exemple, avec une condition)
                            $partQuery = $pdo->query("SELECT COUNT(*) as part FROM utilisateurs WHERE role = 'employe'");
                            $partResult = $partQuery->fetch(PDO::FETCH_ASSOC);
                            $part = $partResult['part'];

                            // Requête pour obtenir une partie spécifique (par exemple, avec une condition)
                            $partQuery = $pdo->query("SELECT COUNT(*) as utilisateur FROM utilisateurs");
                            $partResult = $partQuery->fetch(PDO::FETCH_ASSOC);
                            $utilisateur = $partResult['utilisateur'];


                            // Requête pour obtenir une partie spécifique (par exemple, avec une condition)
                            $partQueries = $pdo->query("SELECT COUNT(*) as party FROM utilisateurs WHERE role != 'employe'");
                            $partResult = $partQueries->fetch(PDO::FETCH_ASSOC);
                            $party = $partResult['party'];


                            // Requête pour obtenir une partie spécifique (par exemple, avec une condition)
                            $partQueries = $pdo->query("SELECT COUNT(categorie) as ecommerce FROM `subscriptions`WHERE`categorie`='E-commerce'");
                            $partResult = $partQueries->fetch(PDO::FETCH_ASSOC);
                            $ecommerce = $partResult['ecommerce'];

                            $partQueries = $pdo->query("SELECT COUNT(categorie) as gestion FROM `subscriptions`WHERE`categorie`='Gestion-hopital'");
                            $partResult = $partQueries->fetch(PDO::FETCH_ASSOC);
                            $gestion = $partResult['gestion'];

                            $partQueries = $pdo->query("SELECT COUNT(categorie) as gestion_entreprise FROM `subscriptions`WHERE`categorie`='Gestion-administrative'");
                            $partResult = $partQueries->fetch(PDO::FETCH_ASSOC);
                            $gestion_entreprise = $partResult['gestion_entreprise'];

                            // Requête pour obtenir une partie spécifique (par exemple, avec une condition)
                            $partQuery = $pdo->query("SELECT SUM(salaire_net) as budget FROM `bulletins_paie`");
                            $partResult = $partQuery->fetch(PDO::FETCH_ASSOC);
                            $budget = $partResult['budget'];

                            // Calcul du pourcentage
                            if ($total > 0) {
                                $percentage = ($part / $total) * 100;
                            }

                            if ($total > 0) {
                                $percent = ($party / $total) * 100;
                            }



                            // Requête pour obtenir une partie spécifique (par exemple, avec une condition)
                            $partQuery = $pdo->query("SELECT COUNT(*) as contrat FROM employes WHERE contrat = 'CDI'");
                            $partResults = $partQuery->fetch(PDO::FETCH_ASSOC);
                            $contrat = $partResults['contrat'];

                            if ($total > 0) {
                                $pourcentage = ($contrat / $total) * 100;
                            }
                            ?>
                            <div class="value"><?= $total ?></div>
                            <div class="stat"><b><?= round($percentage, 2) ?></b>% increase</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card green">
                            <div class="title">Administration</div>
                            <i class="zmdi zmdi-upload"></i>
                            <div class="value"><?= $party ?></div>
                            <div class="stat"><b><?= round($percent, 2) ?></b>% increase</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card orange">
                            <div class="title">total budget</div>
                            <i class="zmdi zmdi-download"></i>
                            <div class="value"><?= $budget  ?></div>

                            <div class="stat"><b>Salaires</b></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card red">
                            <div class="title">employés en CDI</div>
                            <i class="zmdi zmdi-download"></i>
                            <div class="value"><?= $contrat  ?></div>
                            <div class="stat"><b><?= round($pourcentage, 2) ?></b>% increase</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="projects mb-5">
                <div class="projects-inner">
                    <header class="projects-header">
                        <div class="title">Ongoing Projects</div>
                        <div class="count">| 32 Projects</div>
                        <i class="zmdi zmdi-download"></i>
                    </header>
                    <table class="projects-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Poste</th>
                            <th>Salaire Brut</th>
                            <th>Type Contrat</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($_SESSION['role'] == 'Admin'){
                            $employes = getEmploye();
                        }else{
                            $employes = getEmployes();
                        }

                        foreach ($employes as $employe):
                        $res = substr($employe["nom"], 0, 4);
                        ?>

                        <tr>
                            <td>
                                <p><?=$res , htmlspecialchars($employe['id']); ?>0026SILOTEC</p>
                                <p><?= htmlspecialchars($employe['email']); ?></p>
                            </td>
                            <td>
                                <p><?= htmlspecialchars($employe['nom']); ?></p>
                                <p class="text-danger"><?= htmlspecialchars($employe['prenom']); ?></p>
                            </td>
                            <td class="member">
                                <figure><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/584938/people_8.png" /></figure>
                                <div class="member-info">
                                    <p><?= htmlspecialchars($employe['poste']); ?></p>
                                    <p><?= htmlspecialchars($employe['departement']); ?></p>
                                </div>
                            </td>
                            <td>
                                <p><?= htmlspecialchars($employe['salaire_brut']); ?></p>
                                <p>Brut</p>
                            </td>
                            <td class="status">
                                <span class="status-text status-orange"><?= htmlspecialchars($employe['contrat']); ?></span>
                            </td>
                            <td>
                                <form class="form" action="#" method="POST">
                                    <select class="action-box">
                                        <option>Actions😉😉</option>
<!--                                        <option>------</option>-->
<!--                                        <option>Send for QA</option>-->
<!--                                        <option>Send invoice</option>-->
                                    </select>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="projects mb-5">
                <div class="projects-inner">
                    <header class="projects-header">
                        <div class="title">Les utilisateurs</div>
                        <div class="count" style="color: #DA932C;font-size: 15px;font-weight: bold">| <?=$utilisateur ?></div>
                        <i class="zmdi zmdi-download"></i>
                    </header>
                    <table class="projects-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Role</th>
                           <th>Departement</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $employes = getUsers();
                        foreach ($employes as $employe):
                            $res = substr($employe["nom"], 0, 4);
                            ?>

                            <tr>
                                <td>
                                    <p><?=$res , htmlspecialchars($employe['id']); ?>0026SILOTEC</p>

                                </td>
                                <td>
                                    <p><?= htmlspecialchars($employe['username']); ?></p>


                                </td>
                                <td class="member">
                                    <figure><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/584938/people_8.png" /></figure>
                                    <div class="member-info">
                                        <p><?= htmlspecialchars($employe['role']); ?></p>

                                        <p><?= htmlspecialchars($employe['responsable']); ?></p>
                                    </div>
                                </td>
                                <td>
                                    <p><?= htmlspecialchars($employe['depart']); ?></p>
                                </td>


                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
 <?php
                        global $pdo;
                        $sql = "SELECT COUNT(*) as nbrusers FROM users ";
                        $result=$pdo->query($sql);
                        $resultats = $result->fetchAll();
                        $nbrusers = $resultats[0]['nbrusers'];
                        ?>
            <div class="projects mb-5">
                <div class="projects-inner">
                    <header class="projects-header">
                        <div class="title">Les Abonnés</div>
                        <div class="count" style="color: #DA932C;font-size: 15px;font-weight: bold">| <?=$nbrusers ?></div>
                        <i class="zmdi zmdi-download"></i>
                    </header>
                    <table class="projects-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>email</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        global $pdo;
                        $sql = "SELECT * FROM users order by id desc";
                        $result=$pdo->query($sql);
                        $resultats = $result->fetchAll();
                        foreach ($resultats as $employe):
                            $res = substr($employe["nom"], 0, 4);
                            ?>

                            <tr>
                                <td>
                                    <p><?=$res , htmlspecialchars($employe['id']); ?>0026SILOTEC</p>

                                </td>
                                <td>
                                    <p><?= htmlspecialchars($employe['nom']); ?></p>


                                </td>
                                <td class="member">
                                    <figure><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/584938/people_8.png" /></figure>
                                    <div class="member-info">
                                        <p><?= htmlspecialchars($employe['prenom']); ?></p>

                                        <p><?= htmlspecialchars($employe['telephone']); ?></p>
                                    </div>
                                </td>
                                <td>
                                    <p><?= htmlspecialchars($employe['email']); ?></p>
                                </td>


                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="chart-data">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="chart radar-chart dark">
                            <div class="actions">
                                <button type="button" class="btn btn-link"
                                        data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"><a href="../../ecommerce_boost/">E-COMMERCE</a></button>
                                    <button class="dropdown-item" type="button">Another action</button>
                                    <button class="dropdown-item" type="button">Something else here</button>
                                </div>
                            </div>
                            <h3 class="title">E COMMERCE FASO FERE</h3>
                            <p class="tagline" style="color: #2298F1"><?=  $ecommerce ?> Abonnements</p>


                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="chart bar-chart light">
                            <div class="actions">
                                <button type="button" class="btn btn-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"><a href="../../arsn3/">GESTION ENTREPRISE</a></button>
                                    <button class="dropdown-item" type="button">Another action</button>
                                    <button class="dropdown-item" type="button">Something else here</button>
                                </div>
                            </div>
                            <h3 class="title">GESTION ENTREPRISE</h3>
                            <p class="tagline" style="color: #66B92E"><?=$gestion_entreprise ?> Abonnements</p>

                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="chart doughnut-chart dark">
                            <div class="actions">
                                <button type="button" class="btn btn-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"> <a href="../../Hospital-ManagementPHP/">GESTION HOPITAL</a></button>
                                    <button class="dropdown-item" type="button">Another action</button>
                                    <button class="dropdown-item" type="button">Something else here</button>
                                </div>
                            </div>
                            <h3 class="title">GESTION HOPITAL</h3>
                            <p class="tagline" style="color:#DA932C"><?=$gestion ?> Abonnements</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </main></div>
    </div>
</div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
<?php
require_once('../../public/composants/secondfooter.php');
?>

<script src="../../public/js/sidebar.js"></script>
