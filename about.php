<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About us</title>
    <link rel="stylesheet" href="about.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="icon" href="{% static 'PICO-LOGO-SHORT.png' %}" type="image/gif">
</head>

<body>
<!-- -----------------------------------------------company---------------------------------------------------------------- -->
<div class="company">
    <div class="img">
        <img src="https://raw.githubusercontent.com/pico-india/main-django/main/static/about-team.jpg" alt="" />
    </div>
    <div class="company-info">
        <span>PHOTOS <span class="our">FOR EVERYONE</span></span>
        <p>
            <b>Pico</b> is a India-based website dedicated for sharing stock photography under the Pico license. Pico allows
            photographers to upload photos to its website, which are then curated by a team of photo editors. In Pico we are
            aspiring to be one of the largest photography suppliers on the internet.
        </p>
    </div>
</div>
<!-- ---------------------------------------------------------------------------------------------------------------------- -->
<!-- ----------------------------------------------------team-------------------------------------------------------------- -->
<div class="team"><span>OUR TEAM</span></div>
<div class="container">
    <div class="card">
        <div class="card-image loading"><img src="https://images.pexels.com/photos/39866/entrepreneur-startup-start-up-man-39866.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" /></div>
        <div class="card-info">
            <h3 class="card-title loading"><span>Yash <span class="yellow-surname">Falke</span></span></h3>
            <p class="card-description loading">
          <span class="personal-info">
            <span class="info">Graphic Designing Head</span> <br>
            Pursuing IT Engineering (VIT Mumbai) <br>
            Email: <a href="mailto:'yashfalke77@gmail.com'">yashfalke77@gmail.com</a>
          </span>
            </p>
            <div class="card-mediaIcons">
                <a href="#" class="loading" target="on_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="{% url 'viewprofile' 9 %}" class="loading" target="on_blank"><i><img
                            src="https://raw.githubusercontent.com/pico-india/main-django/main/static/PICO-LOGO-SHORT.png" alt="Pico"></a></i>
                <a href="https://www.instagram.com/yashfalke77/" class="loading" target="on_blank"><i
                        class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-image loading"><img src="https://media.istockphoto.com/photos/portrait-of-handsome-latino-african-man-picture-id1007763808?k=20&m=1007763808&s=612x612&w=0&h=q4qlV-99EK1VHePL1-Xon4gpdpK7kz3631XK4Hgr1ls=" alt="" /></div>
        <div class="card-info">
            <h3 class="card-title loading"><span>Harsh <span class="yellow-surname">Sunwani</span></span></h3>
            <p class="card-description loading">
          <span class="personal-info">
            <span class="info">Web Developing Head</span> <br>
            Pursuing IT Engineering (VIT Mumbai) <br>
            Email: <a href="mailto:'harshsunwani11@gmail.com'">harshsunwani11@gmail.com</a>
          </span>
            </p>
            <div class="card-mediaIcons">
                <a href="#" class="loading" target="on_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="{% url 'viewprofile' 7 %}" class="loading" target="on_blank"><i><img
                            src="https://raw.githubusercontent.com/pico-india/main-django/main/static/PICO-LOGO-SHORT.png" alt="Pico"></i></a>
                <a href="https://www.instagram.com/harshsunwani/" class="loading" target="on_blank"><i
                        class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-image loading"><img src="https://images.pexels.com/photos/837358/pexels-photo-837358.jpeg?auto=compress&cs=tinysrgb&w=600" alt="" /></div>
        <div class="card-info">
            <h3 class="card-title loading"><span>Nikhil <span class="yellow-surname">Jaiswal</span></span></h3>
            <p class="card-description loading">
          <span class="personal-info">
            <span class="info">Marketing and Publicity Head</span> <br>
            Pursuing IT Engineering (VIT Mumbai) <br>
            Email: <a href="mailto:'nikjaiswal21@gmail.com'">nikjaiswal21@gmail.com</a>
          </span>
            </p>
            <div class="card-mediaIcons">
                <a href="#" class="loading" target="on_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="{% url 'viewprofile' 6 %}" class="loading" target="on_blank"><i><img
                            src="https://raw.githubusercontent.com/pico-india/main-django/main/static/PICO-LOGO-SHORT.png" alt="Pico"></a></i>
                <a href="#" class="loading" target="on_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- ----------------------------------------footer------------------------------------------ -->
<footer>
    <div class="content">
        <div class="top">
            <div class="logo-details">
                <span class="logo_name">Pico</span>
            </div>
            <div class="media-icons">
                <a target="on_blank" href="#"><i class="fab fa-facebook"></i></a>
                <a target="on_blank" href="https://www.instagram.com/pico_india/"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="link-boxes">
            <ul class="box">
                <li class="link_name">Links</li>
                <li><a href="{% url 'home' %}">Home</a></li>
                <li><a href="{% url 'about' %}">About Us</a></li>
                <li><a href="{% url 'upload' %}">Submit Photo</a></li>

            </ul>
            <ul class="box">
                <li class="link_name">Recommended</li>
                <li><a href="{% url 'category' 6 %}">India</a></li>
                <li><a href="{% url 'category' 5 %">Art and Culture</a></li>
                <li><a href="{% url 'category' 11 %">People</a></li>
                <li><a href="{% url 'category' 2 %">Travel</a></li>

            </ul>
            <ul class="box">
                <li class="link_name">Legal Info</li>
                <li><a href="{% url 'licence' %}">Licence</a></li>
                <li><a href="{% url 'terms' %}">Terms and Conditions</a></li>
                <li><a href="{% url 'privacy' %}">Privacy Policies</a></li>

            </ul>
            <ul class="box">
                <li class="link_name">Contact</li>
                <li><a target="on_blank" href="tel:+919079680135">+91 9079680135</a></li>
                <li><a target="on_blank" href="mailto:'connectpicoindia@gmail.com'">contactpicoindia@gmail.com</a></li>
            </ul>
        </div>
    </div>

    <div class="bottom-details">
        <div class="bottom_text">
            <span class="copyright_text">Copyright © 2021 <a href="#">Pico.</a></span>
        </div>
    </div>
</footer>
<script src="about.js"></script>
</body>
<!-- ---------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------- -->

</html>
