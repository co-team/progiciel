<?php
global $pdo;
session_start();
require '../../config/db.php';
//require '../../config/employes.php';
require_once ('../../public/composants/body_header.php');
$size=isset($_GET['size'])?$_GET['size']:6;
$page=isset($_GET['page'])?$_GET['page']:1;
$offset=($page-1)*$size;

$nomE=isset($_GET['nomE'])?$_GET['nomE']:"";
$requete="select * from employes where nom like '%$nomE%' limit $size offset $offset";

$requetecount="select count(*) countE from employes where nom like '%$nomE%'";
$resultatR=$pdo->query($requete);

$resultatcount=$pdo->query($requetecount);
$tabcount=$resultatcount->fetch();
$nbemployes=$tabcount['countE'];

$reste=$nbemployes % $size;
if($reste===0){
    $nbpage=$nbemployes / $size;
}
else $nbpage=floor($nbemployes/$size)+1;
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="hamza dbani">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Employés</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Festive&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link rel="stylesheet" href="chercherStyle.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="">



    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>


        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .lignecolor{
            background: white;
            text-align: center;
        }
        .tablecolor{
            background: #228B22;
            color: white;
            font-weight: bold;
            font-family:serif;
            padding: 12px 15px;
            text-align: center;
        }
        .tablecontent{
            border-radius: 10px 10px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
            width: 100%;
            height: 100%;
        }
        .pagination {
            display: inline-block;


        }

        .pagination a {
            color: green;
            background-color: white;
            float: left;
            margin-top: 20%;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 30px 30px 30px 30px;
        }

    </style>
    <link href="navbar-top.css" rel="stylesheet">



    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

</head>
<body>

<br>
<div class="container">

    <div class="panel panel-success margetop" data-aos="fade-right">
        <div  class="panel-heading" style=" display: inline-block;width: 500px;height: 100px;color:white; font-size:xx-large;">>Liste des employés</div>
        <div class="panel-body">
            <form method="get" action="liste_employe.php">
               <div>
                   <button type="submit" class=""><i class="fa fa-search " ></i></button>
                   <input type="text" name="nomE" class="input-search" placeholder="Tapez pour chercher...">
               </div>


            </form>
        </div>
        <form method="get" action="modifier_employe.php">
            <div class="panel panel-primary margetop">
                <div class="panel-body">
                    <table class=tablecontent>
                        <thead class=tablecolor>
                        <tr>
                            <th></th>
                            <th>NOM</th>
                            <th>POSTE</th>
                            <th>EMAIL</th>
                            <th>TELEPHONE</th>
                            <th>ACTION</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php while($employes=$resultatR->fetch()){ ?>
                            <tr class=lignecolor>
                                <td><img style="width:80px;height:80px;border-radius:500px;" src="../../public/images/user.jpg"/></td>
                                <td><?php echo $employes['nom'] ?></td>
                                <td><?php echo $employes['poste'] ?></td>
                                <td><?php echo $employes['email'] ?></td>
                                <td><?php echo $employes['telephone'] ?></td>
                                <td>
                                    <a href="modifier_employe.php?id=<?php echo $employes['id']?>" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <a onclick="return confirm('Etes vous sûr de vouloir supprimer l\'employé')" href="#!"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                    <a  onclick="return confirm('Etes vous sûr de vouloir changer le statut?')" href="activerEmployer.php?id=<?php echo $employes['id']?>&etat=<?= $employes['statut']?>">
                                        <?php
                                        if ($employes['statut']=="inactif") {?>
                                            <span class="material-icons" style="color: red;font-weight: bolder;font-size: 25px">close</span>
                                        <?php }?>
                                        <?php
                                        if ($employes['statut']=="actif") {?>
                                            <span class="material-icons" style="color: green;font-weight: bolder;font-size: 25px">done</span>
                                        <?php }?>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <div>
                        <ul class="pagination">
                            <?php for($i=1;$i<=$nbpage;$i++){ ?>
                                <li><a href="liste_employe.php?page=<?php echo $i; ?>&nomE=<?php echo $nomE; ?>"><?php echo $i; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>

                </div>
            </div>
        </form>
        <a onclick="history.back();"  class="mb-5"><i class="fas fa-angle-left arrow"></i></a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>



</body>
</html>

