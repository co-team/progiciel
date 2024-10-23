<?php
//session_start();
//if (!isset($_SESSION['user_id'])) {
//    // Si l'utilisateur n'est pas connecté, redirection vers la page de connexion
//    header('Location: login.php');
//    exit();
//}
//?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="souc.css">
    <title>Document</title>
</head>
<body>
<a href="../../Progiciel/" ><i class="fas fa-arrow-left fa-3dicon fa-3x"></i></a>

<div style="margin-left: 100px;margin-right: 100px">


<h1 class="ml9">
  <span class="text-wrapper">
    <span class="letters">Bienvenue dans la famille, toute mon équipe se fait une joie de vous accueillir,
        voici un petit bonus pour vous souhaiter la bienvenue</span>
  </span>
</h1></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script>
    // Wrap every letter in a span
    var textWrapper = document.querySelector('.ml9 .letters');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({loop: true})
        .add({
            targets: '.ml9 .letter',
            scale: [0, 1],
            duration: 1500,
            elasticity: 600,
            delay: (el, i) => 45 * (i+1)
        }).add({
        targets: '.ml9',
        opacity: 0,
        duration: 100,
        easing: "easeOutExpo",
        delay: 1000
    });
</script>
</body>
</html>