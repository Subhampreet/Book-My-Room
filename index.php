<?php
  // session start
  session_start();

  // include db connection
  include('./scripts/db.php');

  // check for logged in user!
  if(isset($_SESSION['email'])) {

    header('Location: ./booking/index.php?message=You have logged in successfully!');

  } 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>bookMyRoom</title>
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="./gallery.css" />

    <script src="./index.js"></script>

    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&family=Poppins:wght@200;300;400;500;600;700;800;900&family=Roboto:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!----------------AOS------------------>
    <link
      href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css"
      rel="stylesheet"
    />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- ---------------GALLERY------------------- -->
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css"
    />
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- --------------------------NAVBAR-------------------------- -->
    <nav>
      <div class="nav-logo" data-aos="fade-down" data-aos-delay="300">
        bookMy<b>Room</b>
      </div>
      <ul class="nav-items">
        <li><a href="#home" data-aos="fade-down" data-aos-delay="400">Home</a></li>
        <li>
          <a href="#about" data-aos="fade-down" data-aos-delay="500">About Us</a>
        </li>
        <li>
          <a href="#explore" data-aos="fade-down" data-aos-delay="600">Room Tarrifs</a>
        </li>
        <li>
          <a href="#nearest" data-aos="fade-down" data-aos-delay="700"
            >Nearest Places</a
          >
        </li>
        <li>
          <a href="#" data-aos="fade-down" data-aos-delay="800">Contact</a>
        </li>
      </ul>

      <div class="nav-button">
        <button class="sign-in" data-aos="fade-down" data-aos-delay="900">
          Sign in
        </button>
        <button class="book-room" data-aos="fade-down" data-aos-delay="1000">
          <a href="./modal/index.html">BOOK ROOM</a>
        </button>
      </div>


      <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
          <a href="#home">HOME</a>
          <a href="#about">ABOUT</a>
          <a href="#explore">ROOM TARIFFS</a>
          <a href="#nearest">NEAREST PLACES</a>
          <a href="#">CONTACT</a>
          
          
          <button class="book-room" data-aos="fade-down" data-aos-delay="1000">
            <a href="./login/index.php">BOOK ROOM</a>
          </button>
          
        </div>
      </div>
      
      
      <span class="res-nav-icon" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
      
    </nav>

    <!-- -------------------------------HERO SECTION-------------------- -->

    <div class="hero" id="home">
      <div class="hero-top" data-aos="fade-up" data-aos-delay="300">
        <div class="hero-top-left">
          <h1>
            We Make Your <br />
            <span>Living Better</span>
          </h1>
        </div>
        <div class="hero-top-right">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt quo
          neque numquam minus quae at unde praesentium Lorem ipsum dolor sit
          amet. Lorem, ipsum dolor. Lorem ipsum dolor sit!
        </div>
      </div>

      <div class="hero-mid" data-aos="fade-up" data-aos-delay="300">
        <img src="./assets/H3.jpg" />
      </div>

      <div class="hero-bottom">
        <div class="hero-bottom-left">
          <h2 data-aos="fade-up" data-aos-delay="300">
            Hello, <br />
            <span>Book Your Room Now!</span>
          </h2>
          <img src="./assets/H6.jpg" data-aos="fade-up" data-aos-delay="300" />
        </div>
        <div class="hero-bottom-right">
          <img src="./assets/H7.jpg" data-aos="fade-up" data-aos-delay="300" />
          <p data-aos="fade-up" data-aos-delay="300">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus
            neque accusamus ad officia. Quaerat impedit similique eum dolorem
            sit. Officia sint et pariatur? Aut amet perferendis illo provident
            consectetur. Nemo!
          </p>
          <button data-aos="fade-up" data-aos-delay="300">
            <a href="./modal/index.html">Book my Room</a> <span>»</span>
          </button>
          <h1 data-aos="fade-up" data-aos-delay="300">
            We make the ordinary, <br /><span>Extraordinary.</span>
          </h1>
        </div>
      </div>
    </div>

    <!-- --------------------------------------ABOUT SECTION------------------ -->

    <div class="about" id="about">
      <div class="about-body">
        <div class="about-left">
          <h2 data-aos="fade-up" data-aos-delay="300">
            Small space for comfortable <br /><span>night with family</span>
          </h2>
          <p data-aos="fade-up" data-aos-delay="300">
            <span>Lorem ipsum</span> dolor sit amet consectetur, adipisicing
            elit. <span>Quia voluptatem </span> adipisci, et dignissimos saepe
            vitae accusamus consequatur aut deserunt soluta.
            <br />
            <br />
            <span>Lorem ipsum</span> dolor sit, amet consectetur adipisicing
            elit. <span>Dolorum</span> ea expedita laudantium impedit, ratione
            assumenda nostrum temporibus illum voluptatum similique autem quas
            perferendis ex illo sit, quaerat,
            <span>numquam blanditiis</span> in.
          </p>
          <a href="#" data-aos="fade-up" data-aos-delay="300">LEARN MORE</a>
        </div>
        <img src="./assets/H8.jpg" data-aos="fade-up" data-aos-delay="300" />
      </div>
    </div>

    <!-- ---------------------------------------EXPLORE---------------------- -->

    <div class="explore" id="explore">
      <div class="explore-body">
        <h1 data-aos="fade-up" data-aos-delay="300">
          Explore <br />
          <span>by category</span>
        </h1>
        <p data-aos="fade-up" data-aos-delay="300">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ex
          minima corrupti fugiat earum tenetur quo nisi accusamus labore magni.
        </p>

        <div class="wrap">
          <div class="search" data-aos="fade-up" data-aos-delay="300">
            <input
              type="text"
              class="searchTerm"
              placeholder="What are you looking for?"
            />
            <button type="submit" class="searchButton">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>

        <div class="gallery">
          <div class="row-filter" data-aos="fade-up" data-aos-delay="300">
            <div align="center">
              <button class="filter-button" data-filter="all">ALL</button>
              <button class="filter-button" data-filter="category1">
                SINGLE ROOM
              </button>
              <button class="filter-button" data-filter="category2">
                EXECUTIVE SUITE
              </button>
              <button class="filter-button" data-filter="category3">
                JUNIOR SUITE
              </button>
              <button class="filter-button" data-filter="category4">
                PRESIDENTIAL SUITE
              </button>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="300">
            <br />

            <div class="gallery_product filter category2">
              <a class="fancybox" rel="ligthbox" href="./assets/H1.jpg">
                <img
                  class="img-responsive"
                  alt=""
                  src="./assets/H1.jpg"
                  width="360"
                />
                <div class="img-info">
                  <div class="img-info-main">
                    <h4>AVAILABLE</h4>
                    <p>$100/NIGHT</p>
                  </div>
                </div>
              </a>
            </div>

            <div class="gallery_product filter category2">
              <a class="fancybox" rel="ligthbox" href="./assets/H2.jpg">
                <img
                  class="img-responsive"
                  alt=""
                  src="./assets/H2.jpg"
                  width="360"
                />
                <div class="img-info">
                  <div class="img-info-main">
                    <h4>SOLD OUT</h4>
                    <p>$90/NIGHT</p>
                  </div>
                </div>
              </a>
            </div>

            <div class="gallery_product filter category3">
              <a class="fancybox" rel="ligthbox" href="./assets/H7.jpg">
                <img
                  class="img-responsive"
                  alt=""
                  src="./assets/H7.jpg"
                  width="360"
                />
                <div class="img-info">
                  <div class="img-info-main">
                    <h4>AVAILABLE</h4>
                    <p>$70/NIGHT</p>
                  </div>
                </div>
              </a>
            </div>

            <div class="gallery_product filter category1">
              <a class="fancybox" rel="ligthbox" href="./assets/H4.jpg">
                <img
                  class="img-responsive"
                  alt=""
                  src="./assets/H4.jpg"
                  width="360"
                />
                <div class="img-info">
                  <div class="img-info-main">
                    <h4>AVAILABLE</h4>
                    <p>$70/NIGHT</p>
                  </div>
                </div>
              </a>
            </div>

            <div class="gallery_product filter category1">
              <a class="fancybox" rel="ligthbox" href="./assets/H1.jpg">
                <img
                  class="img-responsive"
                  alt=""
                  src="./assets/H1.jpg"
                  width="360"
                />
                <div class="img-info">
                  <div class="img-info-main">
                    <h4>AVAILABLE</h4>
                    <p>$70/NIGHT</p>
                  </div>
                </div>
              </a>
            </div>

            <div class="gallery_product filter category1">
              <a class="fancybox" rel="ligthbox" href="./assets/H2.jpg">
                <img
                  class="img-responsive"
                  alt=""
                  src="./assets/H2.jpg"
                  width="360"
                />
                <div class="img-info">
                  <div class="img-info-main">
                    <h4>SOLD OUT</h4>
                    <p>$70/NIGHT</p>
                  </div>
                </div>
              </a>
            </div>
          </div>

          <div class="book-room" data-aos="fade-up" data-aos-delay="300">
            <button class="book"><a href="./modal/index.html">Book my Room</a> <span>»</span></button>
          </div>
        </div>
      </div>
    </div>


    <!-- --------------------NEAREST---------------------- -->

    <div class="nearest" id="nearest">
      <div class="nearest-body">
        <div class="nearest-left">
          <h1 data-aos="fade-up" data-aos-delay="300"> Find Nearest Places to <br><span>Wander</span></h1>
          <p data-aos="fade-up" data-aos-delay="300"><span>Lorem, ipsum</span>  dolor sit amet consectetur adipisicing elit. Consequatur provident unde,<span>nesciunt expedita</span>  repellendus dolore magni corporis iusto ab nobis perferendis nostrum ut, non consequuntur, maiores repellat. Voluptate,<span>odit mollitia.</span>
          <br>
          <br>
          <span>Lorem ipsum dolor sit</span> , amet consectetur adipisicing elit. <span>Dignissimos</span> officiis porro nihil totam quod iusto consequatur. 
          </p>
          <a href="#" data-aos="fade-up" data-aos-delay="300">EXPLORE MORE</a>
        </div>
        <div class="nearest-right" data-aos="fade-up" data-aos-delay="300">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14968.769710253046!2d85.8187831!3d20.2923007!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x207ffdd0d4b1cd49!2sThe%20Crown!5e0!3m2!1sen!2sin!4v1614161620339!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="map"></iframe>
        </div>
      </div>
    </div>

    <!-- -------------------TESTIMONIAL------------------- -->

    <div class="testimonial">
      <div class="test-body">
        <div class="test-body-left" >
          <div class="test-left-top" data-aos="fade-up" data-aos-delay="300">
            <img src="./assets/H9.jpg" />
            <div>
              <img src="./assets/H10.jpg" />
              <img src="./assets/H2.jpg" />
            </div>
          </div>
          <img src="./assets/H1.jpg" data-aos="fade-up" data-aos-delay="400" />
        </div>
        <div class="test-body-right" >
          <h1 data-aos="fade-up" data-aos-delay="300">
            Our guests <br />
            <span>testimonial excellent.</span>
          </h1>
          <div class="test-1">
            <h1 data-aos="fade-up" data-aos-delay="300">#1</h1>
            <p data-aos="fade-up" data-aos-delay="300">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio
              impedit, dolor minima inventore tempore veniam? Lorem, ipsum
              dolor.
            </p>
            <h4 data-aos="fade-up" data-aos-delay="300">Mat Clovo Clovo</h4>
            <h5 data-aos="fade-up" data-aos-delay="300">CEO Barel Company</h5>
          </div>
          <div class="test-1">
            <h1 data-aos="fade-up" data-aos-delay="300">#2</h1>
            <p data-aos="fade-up" data-aos-delay="300">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio
              impedit, dolor minima inventore tempore veniam? Lorem ipsum dolor
              sit amet consectetur, adipisicing elit.
            </p>
            <h4 data-aos="fade-up" data-aos-delay="300">Andrew Stephen</h4>
            <h5 data-aos="fade-up" data-aos-delay="300">Husband of a wife</h5>
          </div>
          <div class="test-1">
            <h1 data-aos="fade-up" data-aos-delay="300">#3</h1>
            <p data-aos="fade-up" data-aos-delay="300">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio
              impedit, dolor minima inventore tempore veniam? Lorem ipsum dolor
              sit amet.
            </p>
            <h4 data-aos="fade-up" data-aos-delay="300">Alex Mat</h4>
            <h5 data-aos="fade-up" data-aos-delay="300">Brand Ambassador Hopkins</h5>
          </div>
        </div>
      </div>
    </div>

    <!-- -------------------------------FOOTER---------------------- -->

    <footer>
      <div class="footer-body">
        <div class="footer-left">
          <div class="footer-logo" data-aos="fade-up" data-aos-delay="300">bookMy<b>Room</b></div>
          <p data-aos="fade-up" data-aos-delay="300">
            Lorem ipsum dolor sit amet consectetur <br />adipisicing elit. Eum,
            repudiandae? Lorem ipsum dolor sit amet consectetur adipisicing
            elit. Quidem, excepturi!
          </p>
          <div class="footer-social">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-linkedin"></i>
            <i class="fa fa-youtube"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-twitter"></i>
          </div>
        </div>
        <div class="footer-right">
          <ul class="footer-list" data-aos="fade-up" data-aos-delay="300">
            <li class="main">COMPANY</li>
            <li>About Us</li>
            <li>Careers</li>
            <li>BLog</li>
            <li>Press Room</li>
            <li>We Are Hiring</li>
          </ul>
          <ul class="footer-list" data-aos="fade-up" data-aos-delay="300">
            <li class="main">HELPFUL LINKS</li>
            <li>Our Work</li>
            <li>Services</li>
            <li>Get Inspiration</li>
          </ul>
          <ul class="footer-list" data-aos="fade-up" data-aos-delay="300">
            <li class="main">PARTNERSHIP</li>
            <li>Apex</li>
            <li>Impact Home</li>
            <li>Home Less</li>
            <li>Smart Home</li>
          </ul>
        </div>
      </div>
    </footer>

    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>

    <script>
      AOS.init();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
    <script src="./gallery.js"></script>

    <script src="./modal/js/jquery.min.js"></script>



    <script>
      function openNav() {
        document.getElementById("myNav").style.height = "100%";
      }
      
      function closeNav() {
        document.getElementById("myNav").style.height = "0%";
      }
    </script>
  </body>
</html>
