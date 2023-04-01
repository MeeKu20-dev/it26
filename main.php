<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="mainStyle.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald&family=Playfair+Display&family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <title>St. Kerby Hospital</title>

  </head>
  <body>
    <header>
      <div class="navbar">
        <div class="logo-name">
          <img src="logo.ico" class="logo" />
          <h2>St. Kerby Hospital</h2>
        </div>
        <ul class="links">
          <li><a href="">Home</a></li>
          <li><a href="">About</a></li>
          <li><a href="">Doctors</a></li>
          <li><a href="">Contact</a></li>
        </ul>
        <a href="login.php" class="login-btn">Login</a>
        <div class="bar-btn">
          <i class="fa-solid fa-bars"></i>
        </div>
      <div>
      
      <div class="drop-down">
          <li><a href="">Home</a></li>
          <li><a href="">About</a></li>
         
          <li><a href="">Contact</a></li>
          <li><a href="login.php" class="login">Login</a></li>

        </ul>
      </div>

      
    </header>

    <div class="banner">
      <div class="text-banner">
        <h1>WE CARE <br> FOR PATIENTS</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis repellendus quae ratione quidem labore, <br> quos repellat odit cupiditate quaerat id beatae adipisci quam voluptatem non velit? Praesentium veniam nostrum recusandae?</p>
        <li><a href="" class="learn-more">Learn More</a></li>
      </div>    
    </div>

    <div class="cards">

    </div>
      
    <script>
      const barBtn = document.querySelector('.bar-btn')
      const barBtnIcon = document.querySelector('.bar-btn i')
      const dropDownMenu = document.querySelector('.drop-down')

      barBtn.onclick = function() {
        dropDownMenu.classList.toggle('open')
        const isOpen = dropDownMenu.classlist.contains('open')

        barBtnIcon.classList = isOpen
        ? 'fa-sharp fa-solid fa-xmark'
        : 'fa-solid fa-bars'
      }
    </script>
  </body>
</html>
