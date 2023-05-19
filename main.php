<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles/mainStyle.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald&family=Playfair+Display&family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
  <title>St. Kerby Hospital</title>
  <style>
    
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family:Verdana, Geneva, Tahoma, sans-serif
}

.logo {
  width: 60px;
}

li {
  list-style: none;
}

a {
  text-decoration: none;
  color: #fff;
  font-size: 1.5rem;
}

.links a:hover {
  color: rgb(53, 135, 151);
}

header {
  position: sticky;
  top: 0;
  background-color: #2e2185;
  padding: 10px 0;
}

.logo-name {
  display: flex;
  align-items: center;
}

.logo-name h2 {
  color: #000000;
  font-size: 20px;
  color: #fff;
}

.navbar {
  width: 100%;
  height: 60px;
  max-width: 1500px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.navbar .links {
  display: flex;
  gap: 2rem;
}

.links a {
  font-size: 20px;
}

.navbar .nav-btn {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
}

.bar-btn {
  color: #fff;
  font-size: 1.5rem;
  cursor: pointer;
  justify-content: right;
  display: none;
  position: absolute;
  right: 0;
  padding-right: 20px;
}

.btn {
  background-color:blue;
  color: #fff;
  padding: 10px;
  border: none;
  border-radius: 20px;
  outline: none;
  font-size: 15px;
  width: 100px;
  display: flex;
  justify-content: center;
}

.btn:hover {
  background-color: rgb(53, 135, 151);
}

.drop-down {
  display: none;
  position: absolute;
  right: 2rem;
  top: 60px;
  height: 0;
  width: 300px;
  background: rgba(232, 236, 236, 0.53);
  backdrop-filter: blur(15px);
  border-radius: 10px;
  overflow: hidden;
  transition: height 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.drop-down.open {
  height: 215px;
  background-color: #2e2185;
}
.drop-down li {
  padding: 0.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
}

.drop-down .login {
  width: 50%;
  display: flex;
  justify-content: center;
  background-color: #fff;
  color: rgb(38, 38, 38);
  padding: 0.5rem 1.5rem;
  border: none;
  outline: none;
  border-radius: 20px;
}

.drop-down .login:hover {
  background-color: rgb(53, 135, 151);
}
.drop-down a {
  font-size: 20px;
  color: white;
}

.banner {
  display: flex;
  align-items: right;
  padding: 80px 55px;
  background-image: url("https://wp02-media.cdn.ihealthspot.com/wp-content/uploads/sites/201/2021/03/08004925/iStock-1072286960.jpg");
  background-size: cover;
}

.banner span {
  color: #2e2185;
}

.banner h1 {
  font-size: 100px;
  color: rgb(38, 38, 38);
}

.banner p {
  font-size: 20px;
  padding-bottom: 30px;
  text-align: justify;
  width: 52%;
}

.learn-more {
  background-color: blue;
  color: #fff;
  padding: 1rem 2rem;
  border: none;
  outline: none;
  font-size: 1.2rem;
  width: 20%;
  display: flex;
  justify-content: center;
}

.learn-more:hover {
  background-color: rgb(53, 135, 151);
}



.doctor-banner {
  display: flex;
  flex-direction: column;
  background: #f2f2f2;
  padding: 40px;
}
.doctor-banner h2 {
  display: flex;
  align-items: center;
  justify-content: center;
  padding-bottom: 30px;
  color: #2e2185;
  
}
.doctor-banner p {
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: justify;
  
}

.doctors{
  display: flex;
  min-height: 40vh;
  align-items: center;
  justify-content: center;
  background: #f2f2f2;
}
.doctors::before{
  content: '';
  position: absolute;
  width: 100%;
  clip-path: inset(47% 0 0 0);
  z-index: -1;
}
::selection{
  background:	#2e2185;
  color: #fff;
}
.container{
  max-width: 950px;
  width: 100%;
  overflow: hidden;
  padding: 20px 0;
}
.container .main-card{
  display: flex;
  justify-content: space-evenly;
  width: 200%;
  transition: 1s;
}
#two:checked ~ .main-card{
  margin-left: -100%;
}
.container .main-card .cards{
  width: calc(100% / 2 - 10px);
  display: flex;
  flex-wrap: wrap;
  margin: 0 20px;
  justify-content: space-between;
}
.main-card .cards .card{
  width: calc(100% / 3 - 10px);
  background: #fff;
  border-radius: 12px;
  padding: 30px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.25);
  transition: all 0.4s ease;
}
.main-card .cards .card:hover{
  transform: translateY(-15px);
}
.cards .card .content{
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
}
.cards .card .content .img{
  height: 130px;
  width: 130px;
  border-radius: 50%;
  padding: 3px;
  background: #2e2185;
  margin-bottom: 14px;
}
.card .content .img img{
  height: 100%;
  width: 100%;
  border: 3px solid #ffff;
  border-radius: 50%;
  object-fit: cover;
}
.card .content .name{
  font-size: 20px;
  font-weight: 500;
}
.card .content .job{
  font-size: 20px;
  color: #2e2185;
}
.card .content .media-icons{
  margin-top: 10px;
  display: flex;

}
.media-icons a{
  text-align: center;
  line-height: 33px;
  height: 35px;
  width: 35px;
  margin: 0 4px;
  font-size: 14px;
  color: #FFF;
  border-radius: 50%;
  border: 2px solid transparent;
  background: #2e2185;
  transition: all 0.3s ease;
}
.media-icons a:hover{
  color: #2e2185;
  background-color: #fff;
  border-color: #2e2185;
}
 .container .button{
  width: 100%;
  display: flex;
  justify-content: center;
  margin: 20px;
}
.button label{
  height: 15px;
  width: 15px;
  border-radius: 20px;
  background: #757577;
  margin: 0 4px;
  cursor: pointer;
  transition: all 0.5s ease;
}
.button label.active{
  width: 35px;
  background: #2e2185;
  
}
#one:checked ~ .button .one{
  width: 35px;
  
}
#one:checked ~ .button .two{
  width: 15px;
  background: #757577;
}
#two:checked ~ .button .one{
  width: 15px;
  background: #757577; 
}
#two:checked ~ .button .two{
  width: 35px;
  background: #2e2185;
}
input[type="radio"]{
  display: none;
}
@media (max-width: 768px) {
  .main-card .cards .card{
    margin: 20px 0 10px 0;
    width: calc(100% / 2 - 10px);
  }
  .aboutBox {
    display: flex;
    flex-direction: column;
  }
}
@media (max-width: 600px) {
  .main-card .cards .card{
    /* margin: 20px 0 10px 0; */
    width: 100%;
  }
}



@media (max-width: 1050px) {
  .navbar .links,
  .navbar .btn {
    display: none;
  }

  .navbar .bar-btn {
    display: block;
  }

  .drop-down {
    display: block;
  }

}

@media (max-width: 882px) {
  .banner h1 {
    font-size: 46px;
  }

  .banner p {
    width: 100%;
  }
  .learn-more {
    width: 200px;
  }


}

@media (max-width: 520px) {
  .drop-down {
    left: 2rem;
    width: unset;
  }

  .learn-more {
    width: 200px;
  }

  
  

}


.about {
  padding: 30px 80px;
  background-color: #2e2185;
  color: #fff;
}

.about h2 {
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 30px;
  padding-bottom: 30px;
  
}

.aboutBox {
  display: flex;
}
.aboutBox p {
  text-align: justify;
  padding: 20px;
}


.contact {
  margin: 50px 0;
}

.contact h2 {
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 32px;
  font-weight: bold;
  margin-bottom: 20px;
}

.contact-info {
  display: flex;
  flex-direction: column;
  text-align: center;
}

.contact-info p {
  font-size: 18px;
  margin-right: 20px;
  margin-bottom: 10px;


}

.contact-info a {
  text-decoration: none;
  color: #0057ff;
  margin-left: 5px;
  font-size: 17px;
}

.contact-info i {
  font-size: 24px;
  margin-right: 10px;
  color: #0057ff;
}


  </style>
</head>


<body>
  <header>
    <div class="navbar">
      <div class="logo-name">
        <img src="logo.ico" class="logo" />
        <h2>St. Kerby Hospital</h2>
      </div>
      <ul class="links">
        <li><a href="#">Home</a></li>
        <li><a href="#doctor">Doctors</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>

      <div class="nav-btn">
        <a href="login.php" class="btn">Login</a>
        <a href="signUp.php" class="btn">Sign Up</a>
      </div>

      <div class="bar-btn">
        <i class="fa-solid fa-bars"></i>
      </div>
      <div>

        <div class="drop-down">
          <li><a href="#">Home</a></li>
          <li><a href="#doctor">Doctors</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="login.php" class="login">Login</a></li>

          </ul>
        </div>


  </header>

  <div id="home" class="banner">
    <div class="text-banner">
      <h1>WE CARE FOR<span><br>PATIENTS</span></h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis repellendus quae ratione quidem labore, quos repellat odit cupiditate quaerat id beatae adipisci quam voluptatem non velit? Praesentium veniam nostrum recusandae?</p>
    </div>
  </div>

  <div id="doctor" class="doctor-banner">
    <h2>OUR DOCTORS</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis perspiciatis tenetur ad fuga iusto quod quo quam omnis, recusandae beatae!</p>
  </div>
  <div class="doctors">
    <div class="container">
      <input type="radio" name="dot" id="one">
      <input type="radio" name="dot" id="two">
      <div class="main-card">
        <div class="cards">
          <div class="card">
            <div class="content">
              <div class="img">
                <img src="images/img1.webp" alt="">
              </div>
              <div class="details">
                <div class="name">Caroline Garde</div>
                <div class="job">Pediatrician</div>
              </div>
              <div class="media-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="content">
              <div class="img">
                <img src="images/img1.webp" alt="">
              </div>
              <div class="details">
                <div class="name">Cathy Chua</div>
                <div class="job">Ob-gynecologist</div>
              </div>
              <div class="media-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="content">
              <div class="img">
                <img src="images/img1.webp" alt="">
              </div>
              <div class="details">
                <div class="name">Avinida Vista</div>
                <div class="job">Ob-gynecologist</div>
              </div>
              <div class="media-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="cards">
          <div class="card">
            <div class="content">
              <div class="img">
                <img src="images/img1.webp" alt="">
              </div>
              <div class="details">
                <div class="name">Ranier Poloyapoy</div>
                <div class="job">Surgeon</div>
              </div>
              <div class="media-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="content">
              <div class="img">
                <img src="images/img1.webp" alt="">
              </div>
              <div class="details">
                <div class="name">Liz Parangan</div>
                <div class="job">Physician</div>
              </div>
              <div class="media-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="content">
              <div class="img">
                <img src="images/aila.jpg" alt="">
              </div>
              <div class="details">
                <div class="name">Aila Kye Hinlog</div>
                <div class="job">Internal Medicine</div>
              </div>
              <div class="media-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="button">
        <label for="one" class=" active one"></label>
        <label for="two" class="two"></label>
      </div>
    </div>

  </div>

  <div id="about" class="about">
    <h2>About Us</h2>
    <div class="aboutBox">
      <div class="box-1">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum consequuntur architecto similique vel iure odio, error qui temporibus animi obcaecati!</p>
      </div>
      <div class="box-2">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum consequuntur architecto similique vel iure odio, error qui temporibus animi obcaecati!</p>
      </div>
      <div class="box-3">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum consequuntur architecto similique vel iure odio, error qui temporibus animi obcaecati!</p>
      </div>
    </div>

  </div>

  <section class="contact" id="contact">
    <h2>Contact Us</h2>
    <div class="contact-info">
      <p><i class="fas fa-map-marker-alt"></i>J.P. Laurel Ave, Bajada, Davao City, 8000 Davao del Sur, Philippines</p>
      <p><i class="fas fa-phone-alt"></i> <a href="tel:[insert hospital's contact number]">+639204883294</a></p>
      <p><i class="fab fa-facebook-square"></i> <a href="https://www.facebook.com/mico.rojo/">https://www.facebook.com/mico.rojo/</a></p>
    </div>
  </section>




  <script>
    const barBtn = document.querySelector('.bar-btn');
    const barBtnIcon = document.querySelector('.bar-btn i');
    const dropDownMenu = document.querySelector('.drop-down');

    barBtn.onclick = function() {
      dropDownMenu.classList.toggle('open');
      const isOpen = dropDownMenu.classList.contains('open');

      barBtnIcon.classList = isOpen ?
        'fa-sharp fa-solid fa-xmark' :
        'fa-solid fa-bars';
    };
  </script>

</body>

</html>