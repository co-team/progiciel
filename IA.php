<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"><!-- Font Awesome CSS -->
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="service.css">
    <!-- Navik navigation CSS -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> <!-- Google fonts -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Progiciel</title>
    <link rel="icon" type="image/x-icon" href="./public/images/icon.jpg">
    <link rel="stylesheet" href="ia.css">
  <style>


  </style>
</head>
<body>
<div class="navik-header header-opacity header-shadow" style="background-color:#534f4f ">
    <div>

        <!-- Navik header -->
        <div class="navik-header-container">

            <!--Logo-->
            <div class="logo" data-mobile-logo="./public/images/just.jpg" data-sticky-logo="./public/images/just.jpg" style="width: 100px;margin-left: 5px">
                <a href="home.php"><img src="./public/images/erp.gif" alt="logo"/></a>
            </div>

            <!-- Burger menu -->
            <div class="burger-menu">
                <div class="line-menu line-half first-line"></div>
                <div class="line-menu"></div>
                <div class="line-menu line-half last-line"></div>
            </div>

            <!--Navigation menu-->
            <nav class="navik-menu separate-line submenu-top-border submenu-scale" style="float: left;!important;">
                <ul class="list-unstyled" style="margin-left: 100px">
                    <li class="current-menu"><a href="#">Connexions</a>
                        <ul class="list-unstyled" >
                            <li><a href="./views/utilisateurs/login.php" style="color: green">Connexion Employé</a></li>
                            <li><a href="./users/login.php" style="color:#7d1038">Connexion Souscripteur</a></li>
                            <!--                            <li><a href="#">Dropdown menu</a></li>-->
                            <!--                            <li><a href="#">Dropdown menu</a>-->
                            <!--                                <ul class="list-unstyled" >-->
                            <!--                                    <li><a href="#">Dropdown menu</a></li>-->
                            <!--                                    <li><a href="#">Dropdown menu</a></li>-->
                            <!--                                    <li><a href="#">Dropdown menu</a></li>-->
                            <!--                                    <li><a href="#">Dropdown menu</a></li>-->
                            <!--                                </ul>-->
                            <!--                            </li>-->
                        </ul>
                    </li>
                    <li><a href="coteam.php">A propos</a></li>
                    <li><a href="service.php">Services</a></li>
                    <li><a href="IA.php">Assistance</a></li>
                    <li><a href="./souscription/info.php">Nouvelles</a></li>
                    <li class="submenu-right"><a href="mailto:sanou196@gmail.com" target="_blank">Contact</a>
                        <!--                        <ul class="list-unstyled" >-->
                        <!--                            <li><a href="#">Dropdown menu</a></li>-->
                        <!--                            <li><a href="#">Dropdown menu</a></li>-->
                        <!--                            <li><a href="#">Dropdown menu</a></li>-->
                        <!--                            <li><a href="#">Dropdown menu</a></li>-->
                        <!--                        </ul>-->
                    </li>
                </ul>
            </nav>

        </div>

    </div>
</div>
<!--<a onclick="window.history.back()"><i class="fas fa-arrow-left fa-3dicon fa-4x"></i></a>-->
<canvas id="starfield" ></canvas>
<section id="aiJourney" style="margin-top: 100px;">
  <div class="journey-intro">
    <h1>ASSISTANT IA DE STARFIELD</h1>
    <p>Embarquez pour un voyage interstellaire avec notre IA avancée. Quels secrets du cosmos allons-nous découvrir ?</p>
    <button id="startJourney">
      Initier la séquence</button>
  </div>
  <div class="conversation hidden">
    <div class="chat-area">
      <div class="chat-bubble ai-bubble">Salutations, explorateur. Je suis votre guide IA des étoiles. Quel aspect de notre voyage cosmique vous intrigue ?</div>
    </div>
    <div class="user-input">
      <input type="text" id="userResponse" placeholder="Entrez votre requête cosmique...">
      <button id="sendResponse">Transmettre</button>
    </div>
  </div>
</section>
<div></div>
<div></div>
<script>
  // JavaScript code will be added here
  document.getElementById('startJourney').addEventListener('click', function() {
    document.querySelector('.journey-intro').classList.add('hidden');
    document.querySelector('.conversation').classList.remove('hidden');
    initStarfield();
  });

  document.getElementById('sendResponse').addEventListener('click', sendMessage);
  document.getElementById('userResponse').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      sendMessage();
    }
  });

  function sendMessage() {
    const userInput = document.getElementById('userResponse').value;
    if (userInput.trim() !== '') {
      const chatArea = document.querySelector('.chat-area');
      const userBubble = document.createElement('div');
      userBubble.classList.add('chat-bubble', 'user-bubble');
      userBubble.textContent = userInput;
      chatArea.appendChild(userBubble);

      setTimeout(() => {
        const aiResponse = document.createElement('div');
        aiResponse.classList.add('chat-bubble', 'ai-bubble');
        aiResponse.textContent = generateResponse(userInput);
        chatArea.appendChild(aiResponse);
        chatArea.scrollTop = chatArea.scrollHeight;
      }, 1000);
    }
    document.getElementById('userResponse').value = '';
  }

  function generateResponse(input) {
    const responses = [

      "  Requête fascinante. Nos banques de données suggèrent que  "  +  input +
      " est étroitement lié aux phénomènes cosmiques que nous avons observés dans le Starfield. ",
      "Ah, " +  input +
      "! Un sujet d'un grand intérêt. Des découvertes récentes en bordure extérieure ont apporté un nouvel éclairage sur ce sujet.",
      "Votre intérêt pour"  +  input +  " est bien placé. C'est un élément crucial dans notre compréhension des voyages interstellaires. ",
      "Les mystères de" + input + " continuent de rendre perplexes même nos systèmes d'IA les plus avancés. Devons-nous approfondir ? ",
      "Notre dernière mission au" + input + " Le secteur a donné des résultats inattendus. Souhaitez-vous en savoir plus ?", +  input +  "  <a href='' >cc</a>"
    ];
    return responses[Math.floor(Math.random() * responses.length)];
  }

  function initStarfield() {
    const canvas = document.getElementById('starfield');
    const ctx = canvas.getContext('2d');
    let stars = [];

    function resizeCanvas() {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
      initStars();
    }

    function initStars() {
      stars = [];
      const numStars = Math.floor((canvas.width * canvas.height) / 1000);
      for (let i = 0; i < numStars; i++) {
        stars.push({
          x: Math.random() * canvas.width,
          y: Math.random() * canvas.height,
          radius: Math.random() * 1.5,
          speed: Math.random() * 0.5
        });
      }
    }

    function drawStars() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      ctx.fillStyle = '#FFF';
      stars.forEach(star => {
        ctx.beginPath();
        ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
        ctx.fill();
        star.y += star.speed;
        if (star.y > canvas.height) {
          star.y = 0;
        }
      });
      requestAnimationFrame(drawStars);
    }

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();
    drawStars();
  }
</script>
</body>
</html>