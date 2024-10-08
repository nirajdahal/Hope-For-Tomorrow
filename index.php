<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- External CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lightgallery.min.css"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"
    />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Internal CSS -->
    <link rel="stylesheet" type="text/css" href="./css/main.css" />
    <link rel="stylesheet" type="text/css" href="./css/pages.css" />

    <title>Home</title>
  </head>

  <body>
    <!-- Header will be loaded from JS-->
    <header class="main-header">
        <figure class="logo">
            <p class="font-title"><b><a href="../index.php">Hope For Tomorrow</a></b></p>
        </figure>
        <nav class="navigation font-content">
            <!-- Hamburger icon -->
            <button class="hamburger" onclick="toggleMenu()">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="./pages/mission.php">Mission</a></li>
                    <li><a href="./pages/donation.html">Donation</a></li>
                    <li><a href="./pages/programs.php">Programs</a></li>
                    <li><a href="./pages/blogs.html">Blogs</a></li>
                    <li><a href="./pages/contact.html">Contact</a></li>

                    <?php
                    session_start();
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
                        if ($_SESSION['role'] === 'admin') {
                            // Show dashboard link for admin
                            echo '<li><a href="./protected/pages/dashboard.php">Dashboard</a></li>';
                        }
                        // Show logout link for both admin and regular users
                        echo '<li><a href="./pages/logout.php">Logout</a></li>';
                    } else {
                        // Show login and signup links for guests
                        echo '<li><a href="./pages/login.html">Login</a></li>';
                        echo '<li><a href="./pages/signup.html">Signup</a></li>';
                    }
                    ?>

                    <button class="switch-mode-button" style="background-color: transparent;" onclick="toggleMode()">
                        <svg class="theme-icon sun" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <!-- Sun -->
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                        <svg class="theme-icon moon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <!-- Moon -->
                            <path d="M21 12.79A9 9 0 0111.21 3 7.5 7.5 0 1021 12.79z"></path>
                        </svg>
                    </button>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Page content -->
    <main>
      <header class="hero-section container">
        <div data-aos="zoom-in" data-aos-duration="3000" class="header-content">
          <h4 class="font-title hero-title">"Save Environment Save Future"</h4>
          <div class="hero-content">
            <p class="font-content">
              The food we eat, the water we drink, the air we breathe
            </p>
            <p class="font-content">— it all comes from nature.</p>
          </div>
        </div>
        <div data-aos="zoom-in" data-aos-duration="3000" class="hero-buttons">
          <a class="font-content" href="./pages/contact.html">Team Up</a>
          <button>
            <a class="font-content" href="./pages/donation.html">Donate</a>
          </button>
        </div>
      </header>

      <!-- Newletter  -->

      
      <?php include './components/newsletter.php'; ?>
      <!-- What we do -->
      <section data-aos="zoom-in" data-aos-duration="2000" class="container">
        <div class="about-us">
          <div class="about-left">
            <h4 class="font-title">
              Together, We Find A <span class="decorated-text">Way</span>
            </h4>
            <p class="font-content">
              Hope For Tomorrow Offers Sustainable Solutions To Support Nature
              and Animals, Creating a Better Future
            </p>
          </div>
          <div class="about-right">
            <div class="right-divs">
              <div>
                <h5 class="font-title">Who we are</h5>
                <p class="font-content">
                  Dedicated to Preserving Nature and Animal Habitats with
                  Lasting Conservation Impact
                </p>
              </div>
              <div>
                <h5 class="font-title">Who we do</h5>
                <p class="font-content">
                  Driving Positive Change for Nature and Animals through
                  Innovative Conservation Efforts
                </p>
              </div>
            </div>
            <div class="right-divs">
              <div>
                <h5 class="font-title">Where we work</h5>
                <p class="font-content">
                  Protecting Diverse Nature and Animal Environments with
                  Effective Conservation Strategies
                </p>
              </div>
              <div>
                <h5 class="font-title">How to help</h5>
                <p class="font-content">
                  Join Us in Protecting Nature and Animals: Volunteer, Reduce,
                  Donate, and Make a Difference
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Working Areas -->
      <section class="working-areas">
        <div class="left-layout">
          <h4 class="font-title">
            Working <span class="decorated-text">Areas</span>
          </h4>
          <p class="font-content">
            Our mission is to conserve nature and reduce
          </p>
          <p class="font-content">
            the most pressing threats to the diversity of life on Earth.
          </p>
        </div>
        <div class="right-layout font-content">
          <div data-aos="zoom-in" data-aos-duration="1000" class="card">
            <h5>Forest</h5>
          </div>
          <div data-aos="zoom-in" data-aos-duration="1500" class="card">
            <h5>Ocean</h5>
          </div>
          <div data-aos="zoom-in" data-aos-duration="2000" class="card">
            <h5>Animal</h5>
          </div>
        </div>
      </section>

      <!-- Look into Projects -->
      <section class="projects container">
        <div class="project-heading font-title">
          <h4>Look At Our <span class="decorated-text">Projects</span></h4>
        </div>
        <div class="cards">
          <div
            data-aos="zoom-in-right"
            data-aos-duration="2000"
            class="card-with-image"
          >
            <figure class="card-image">
              <img
                src="./assets/images/projects/tree-plantation.jpg"
                alt="Trees plantation"
              />
            </figure>

            <div class="card-info">
              <h5 class="card-info-heading font-title">Forest Restoration</h5>
              <p class="card-info-description font-content">
                Reforestation revitalizes ecosystems, combats climate change, &
                biodiversity.
              </p>
              <button class="card-info-button">
                <a href="./pages/programs.php">View</a>
              </button>
            </div>
          </div>
          <div
            data-aos="zoom-in"
            data-aos-duration="2000"
            class="card-with-image"
          >
            <figure class="card-image">
              <img
                src="./assets/images/projects/cleanplastic.webp"
                alt="Cleaning Plastic"
              />
            </figure>

            <div class="card-info">
              <h5 class="card-info-heading font-title">
                The Clean-Up Team - Plastic waste
              </h5>
              <p class="card-info-description font-content">
                The Clean-Up Team fights plastic waste, protecting our
                environment.
              </p>
              <button class="card-info-button">
                <a href="./pages/programs.php">View</a>
              </button>
            </div>
          </div>
          <div
            data-aos="zoom-in-left"
            data-aos-duration="2000"
            class="card-with-image"
          >
            <figure class="card-image">
              <img
                src="./assets/images/projects/savedogs.jpg"
                alt="Dog picture with man"
              />
            </figure>

            <div class="card-info">
              <h5 class="card-info-heading font-title">
                Dog Rescue: Promoting Protection
              </h5>
              <p class="card-info-description font-content">
                Dog Rescue: Advocating for the protection, safety, and
                well-being of dogs.
              </p>
              <button class="card-info-button">
                <a href="./pages/programs.php">View</a>
              </button>
            </div>
          </div>
        </div>
      </section>

      <!-- Gallery -->

      <section class="gallery container">
        <div class="gallery-heading font-title">
          <h4>Look At Our <span class="decorated-text">Gallery</span></h4>
        </div>
        <div data-aos="fade-in" data-aos-duration="2000" class="image-gallery">
          <!-- Gallery container -->
          <div id="light-gallery">
            <a
              href="./assets/images/projects/ocean clean.jpg"
              data-sub-html="<h4>Cleaning Ocean</h4>"
            >
              <img
                src="./assets/images/projects/ocean clean.jpg"
                alt="Cleaning Ocean"
              />
            </a>

            <a
              href="./assets/images/projects/treeplant.jpg"
              data-sub-html="<h4>Planting Trees</h4>"
            >
              <img
                src="./assets/images/projects/treeplant.jpg"
                alt="Planting Trees"
              />
            </a>

            <a
              href="./assets/images/projects/saveanimal.jpg"
              data-sub-html="<h4>Rescue Mission</h4>"
            >
              <img
                src="./assets/images/projects/saveanimal.jpg"
                alt="Rescue Mission"
              />
            </a>

            <a
              href="./assets/images/projects/treeplantation.jpg"
              data-sub-html="<h4>Tree Plantation</h4>"
            >
              <img
                src="./assets/images/projects/treeplantation.jpg"
                alt="Tree Plantation"
              />
            </a>
            <a
              href="./assets/images/projects/wildliferescue.jpeg"
              data-sub-html="<h4>Cleaning Ocean</h4>"
            >
              <img
                src="./assets/images/projects/wildliferescue.jpeg"
                alt="Cleaning Ocean"
              />
            </a>

            <a
              href="./assets/images/projects/cleanforest.jpg"
              data-sub-html="<h4>Cleaning Forest</h4>"
            >
              <img
                src="./assets/images/projects/cleanforest.jpg"
                alt="Cleaning Forest"
              />
            </a>
            <a
              href="./assets/images/projects/tresswatering.jpg"
              data-sub-html="<h4>Watering Plant</h4>"
            >
              <img
                src="./assets/images/projects/tresswatering.jpg"
                alt="Watering Plant"
              />
            </a>

            <a
              href="./assets/images/projects/saveanimals.jpg"
              data-sub-html="<h4>Rescue Animal</h4>"
            >
              <img
                src="./assets/images/projects/saveanimals.jpg"
                alt="Rescue Animal"
              />
            </a>
            <a
              href="./assets/images/projects/saveanimals.jpg"
              data-sub-html="<h4>Rescue Animal</h4>"
            >
              <img
                src="./assets/images/projects/tree-plantation.jpg"
                alt="Rescue Animal"
              />
            </a>
          </div>
        </div>
      </section>

      <!-- Get connected -->
      <section class="get-connected container">
        <div class="get-connected-container">
          <form class="get-connected-form">
            <div class="form-description">
              <h4 class="font-title">Stay Connected</h4>
              <p class="font-content">
                Join s and give your Help in the efforts to protect our green
                forest today!
              </p>
            </div>

            <div class="input-name">
              <input placeholder="Name" />
            </div>
            <div class="input-email">
              <input placeholder="Your Email" />
              <span class="email-error font-content"></span>
            </div>

            <div class="input-message">
              <textarea placeholder="Your Message" rows="8"></textarea>
            </div>
            <div class="submit-button">
              <button>Submit</button>
            </div>
          </form>

          <div class="right-image">
            <img
              src="./assets/images/floating-plant.png"
              alt="Floating Plant Inside Bulb"
            />
          </div>
        </div>
      </section>
    </main>

    <!-- Footer Will be Loaded From JS
    <div id="footer"></div> -->

    <!-- All js links -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/toastify-js"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/lightgallery.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <script src="./scripts/home.js"></script>
    <script src="./scripts/common.js"></script>
    <script src="./scripts/contact.js"></script>
  </body>
</html>
