<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles/mainStyle.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald&family=Playfair+Display&family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
  <title>St. Kerby Hospital</title>
</head>

<body>
  <header>
    <div class="navbar">
      <div class="logo-name">
        <img src="images/logo.ico" class="logo" />
        <h2>St. Kerby Hospital</h2>
      </div>
      <ul class="links">
        <li><a href="#home">Home</a></li>
        <li><a href="#doctor">Doctors</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="">Contact</a></li>
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
          <li><a href="">Home</a></li>
          <li><a href="">Doctors</a></li>
          <li><a href="">About</a></li>
          <li><a href="">Contact</a></li>
          <li><a href="login.php" class="login">Login</a></li>

          </ul>
        </div>


  </header>

  <div id="home" class="banner">
    <div class="text-banner">
      <h1>WE CARE FOR<span><br>PATIENTS</span></h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis repellendus quae ratione quidem labore, quos repellat odit cupiditate quaerat id beatae adipisci quam voluptatem non velit? Praesentium veniam nostrum recusandae?</p>
      <li><a href="" class="learn-more">Learn More</a></li>
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
    <div class="about-text">
      <h1>About Us</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis repellendus quae ratione quidem labore, quos repellat odit cupiditate quaerat id beatae adipisci quam voluptatem non velit? Praesentium veniam nostrum recusandae?
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis repellendus quae ratione quidem labore, quos repellat odit cupiditate quaerat id beatae adipisci quam voluptatem non velit? Praesentium veniam nostrum recusandae?</p>
    </div>
  </div>

  <section class="contact">
    <h2>Contact Us</h2>
    <div class="contact-info">
      <p><i class="fas fa-map-marker-alt"></i> [insert hospital's address]</p>
      <p><i class="fas fa-phone-alt"></i> <a href="tel:[insert hospital's contact number]">[insert hospital's contact number]</a></p>
      <p><i class="fab fa-facebook-square"></i> <a href="[insert hospital's Facebook page link]">[insert hospital's Facebook page link]</a></p>
    </div>
  </section>




  <script>
    const barBtn = document.querySelector('.bar-btn')
    const barBtnIcon = document.querySelector('.bar-btn i')
    const dropDownMenu = document.querySelector('.drop-down')

    barBtn.onclick = function() {
      dropDownMenu.classList.toggle('open')
      // const isOpen = dropDownMenu.classlist.contains('open')

      barBtnIcon.classList = isOpen ?
        'fa-sharp fa-solid fa-xmark' :
        'fa-solid fa-bars'
    }
  </script>
</body>

</html>