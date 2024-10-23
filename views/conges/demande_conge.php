
<?php
require_once ('../../public/composants/header-bg.php')
?>
<!-------------------------------------------------------------->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="hamza dbani">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Demander un congé</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">



    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {font-family: Arial, Helvetica, sans-serif;
            padding: 0px;}

        input[type=text],input[type=email],input[type=date],select,input[type=number] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            margin-right: 0px;
            margin-left: 0px;
            resize: vertical;
        }
        label{margin-right: 0px;
            margin-left: 0px;
            width: 100%;}

        input[type=submit] {
            background-color: #1255a2;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #1872D9;
        }

        .container {
            /* Ajouter box-sizing */
            box-sizing : border-box;
            border-radius:5px;
            background-color:#f2f2f2;
            padding:20px;
            width: 100%;
            /* redéfinition 400 + 2*20 */
            max-width: 440px;
            margin:0 auto;
        }
        h1  {
            color: #ffc800;
            width: 100%;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        .arrow {
            color: #006064;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: white;
            text-align: center;
            line-height: 50px;
            font-size: 40px;
            text-shadow: text-shadow: 0 0 0 #006064;20px 0 0 #006064, 20px 0 0 #006064, 40px 0 0 #006064;
            transition: 0.6s linear;
            transform: translate(50%, 50%);
            cursor: pointer;
        }
        .arrow:hover {
            text-shadow: 20px 0 0 #006064, 20px 0 0 #006064, 40px 0 0 #006064;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>
<body>


<div class="container" style="margin-top: 100px;box-shadow: rgba(0, 0, 0, 0.4) 0px 30px 90px;">
    <h1>Formulaire de congé</h1>
    <form action="ajouterconge.php" method="post">


        <label for="sujet">Employe</label>
        <input type="number" name="employe_id">
        <label for="statut">Statut</label>
        <input type="text" name="statut" class="form-control" readonly>

        <label for="emailAddress">Date debut</label>
        <input id="emailAddress" type="date" name="date_debut" >

        <label>Type de congé</label>
        <select name="type_conge" required>
            <option value="Conge payé">Congé payé</option>
            <option value="Maladie">Maladie</option>
            <option value="Congé sans solde">Congé sans solde</option>
        </select>
        <label for="date">Date fin</label>
        <input type="date"  name="date_fin"  >

        <input type="submit" value="Envoyer">
    </form>
</div>

<a  onclick="history.back();" class="mb-5"><i class="fas fa-angle-left arrow"></i></a>
</body>
</html>
