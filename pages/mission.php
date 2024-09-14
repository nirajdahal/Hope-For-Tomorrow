<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- All css links -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <link rel="stylesheet" type="text/css" href="../css/pages.css" />
    <!-- <link rel="stylesheet" type="text/css" href="../css/pages/mission.css" /> -->



    <title>Mission</title>
</head>

<body>
    <!-- Header will be loaded from JS-->
    <header id="header"></header>

    <!-- Page content -->
    <main>

        <!-- Video Banner -->
        <section class="video-banner">
            <div class="project-banner description">
                <h4 data-aos="zoom-in" data-aos-duration="3000" class="font-title banner-heading">
                    " We Help Nature<span class="decorated-text"> Breathe</span>
                    Again "</span>
                </h4>
                <div class="buttons font-content">
                    <button href="./contact.html" class="font-content join">Join Us</button>
                    <button class="font-content">Donate</button>
                </div>
            </div>
            <div class="video">
                <video autoplay muted controls>
                    <source src="../assets/videos/I AM the earth.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

        </section>

        <!-- Mission and Vision -->
        <section class="mission-vision-container container">
            <div class="container">
                <div data-aos="zoom-in-right" data-aos-duration="2000" class="description-left">
                    <h4 class="font-title"> Our <span class="decorated-text">Mission</span></h4>
                    <p class="font-content">Conservation International supports societies in responsibly and sustainably
                        caring for nature
                        and global biodiversity to benefit humanity.</p>
                </div>

                <div data-aos="zoom-in-left" data-aos-duration="2000" class="picture-right">
                    <figure>
                        <img src="../assets/images/projects/tresswatering.jpg" alt="Planting trees"></img>
                    </figure>
                </div>
            </div>

            <div class="container">
                <div data-aos="zoom-in-left" data-aos-duration="2000" class="description-left vision-description">
                    <h4 class="font-title"> Our <span class="decorated-text">Vision</span></h4>
                    <p class="font-content">We envision a thriving world where societies cherish and protect nature for
                        the enduring well-being of humanity and all living beings.</p>
                </div>
                <div data-aos="zoom-in-right" data-aos-duration="2000" class="picture-right vision-picture">
                    <figure>
                        <img src="../assets/images/projects/saveanimal.jpg" alt="Planting trees"></img>
                    </figure>
                </div>



            </div>

        </section>

        <!-- What we do -->
        <section class="container about-us-container ">
            <article data-aos="zoom-in" data-aos-duration="2000" class="about-us">
                <aside class="about-left">
                    <h4 class="font-title">United for a <span class="decorated-text">Cause</span></h4>
                    <p class="font-content">Safeguarding the Environment and Wildlife through Sustainable Practices for
                        a Brighter
                        Tomorrow</p>
                </aside>
                <section class="about-right">
                    <section class="right-divs">
                        <article>
                            <h5 class="font-title">Our Identity</h5>
                            <p class="font-content">Committed to Conserving Natural Habitats and Ecosystems with
                                Enduring
                                Environmental Impact</p>
                        </article>
                        <article>
                            <h5 class="font-title">Our Mission</h5>
                            <p class="font-content">Fostering Positive Transformation for the Environment and Wildlife
                                through
                                Groundbreaking Conservation Initiatives</p>
                        </article>
                    </section>
                    <section class="right-divs">
                        <article>
                            <h5 class="font-title">Our Reach</h5>
                            <p class="font-content">Preserving Varied Environmental and Wildlife Landscapes with Proven
                                Conservation Methods</p>
                        </article>
                        <article>
                            <h5 class="font-title">Get Involved</h5>
                            <p class="font-content">Partner with Us to Protect the Environment and Wildlife: Contribute,
                                Reduce,
                                Volunteer, and Create Change</p>
                        </article>
                    </section>
                </section>
            </article>
        </section>

        <!-- Newletter  -->

        <?php include "../components/newsletter.php"; ?>

        <!-- Meet team container -->
        <section data-aos="zoom-in" data-aos-duration="2000" class="meet-team container">
            <h4 class="title-heading font-title">Meet Our <span class="decorated-text">Team</span></h4>
            <div class="teams">
                <div>
                    <figure>
                        <img src="../assets/images/teams/niraj.jpg" />
                    </figure>
                    <h5 class="font-title">
                        Niraj
                    </h5>
                    <p class="font-content">
                        Web Developer
                    </p>

                </div>
                <div>
                    <figure>
                        <img src="../assets/images/teams/messi.avif" />
                    </figure>
                    <h5 class="font-title">
                        Leo
                    </h5>
                    <p class="font-content">
                        Social Worker
                    </p>

                </div>
                <div>
                    <figure>
                        <img src="../assets/images/teams/arijit.jpeg" />
                    </figure>
                    <h5 class="font-title">
                        Arijit
                    </h5>
                    <p class="font-content">
                        Environmentalist
                    </p>

                </div>
                <div>
                    <figure>
                        <img src="../assets/images/teams/elon.jpeg" />
                    </figure>
                    <h5 class="font-title">
                        Ellon
                    </h5>
                    <p class="font-content">
                        CEO
                    </p>

                </div>
            </div>

        </section>



    </main>

    <!-- Footer Will be Loaded From JS -->
    <header id="footer"></header>
    <!-- All js links -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script src="../scripts/common.js"></script>

</body>

</html>