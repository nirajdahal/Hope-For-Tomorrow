<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "hopefortomorrow_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch project data from the database
$sql = "SELECT image, title, description FROM projects"; // Change 'projects' to your actual table name
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- All css links -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://unpkg.com/accordion-js@3.3.4/dist/accordion.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <link rel="stylesheet" type="text/css" href="./css/pages.css" />

    <title>Programs</title>
</head>

<body>
    <!-- Header will be loaded from JS -->
    <div id="header"></div>

    <!-- Page content -->
    <main>

        <header class="project-banner container">
            <div class="header-content">
                <h4 data-aos="zoom-in" data-aos-duration="3000" class="font-title hero-title">"Projects for a <span class="decorated-text">Sustainable Future"</span></h4>
                <div class="hero-content">
                    <p class="font-content "></p>
                </div>
            </div>
            <div class="hero-buttons">
                <button class="font-content" onclick="window.location.href='./pages/donation.html'">Donate</button>
            </div>
        </header>

        <!-- Look into Projects -->
        <section class="projects container">
            <div class="project-heading font-title">
                <h4>Look At Our <span class="decorated-text">Projects</span></h4>
            </div>
            <div data-aos="zoom-in" data-aos-duration="2000" class="cards">

                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        // Use string concatenation with echo
                        echo '
                        <div class="card-with-image">
                            <figure class="card-image">
                                <img src="../assets/images/projects/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '" />
                            </figure>
                            <div class="card-info">
                                <h5 class="card-info-heading font-title">' . htmlspecialchars($row["title"]) . '</h5>
                                <p class="card-info-description font-content">' . htmlspecialchars($row["description"]) . '</p>
                                <button class="card-info-button">View</button>
                            </div>
                        </div>';
                    }
                } else {
                    echo '<p>No projects found.</p>';
                }
                ?>

            </div>
        </section>

        <!-- FAQS -->
        <section class="faqs container">
            <h4 class="font-title">Frequently <span class="decorated-text">Asked</span></h4>
            <div class="accordion-container font-content ">
                <div class="ac">
                    <h5 class="ac-header">
                        <button type="button" class="ac-trigger">Can I direct my donation to a particular area or
                            project?</button>
                    </h5>
                    <div class="ac-panel">
                        <p class="ac-text">To designate your donation to a specific area or project, send us a note with
                            your donation by mail. We'll allocate it accordingly and send you an acknowledgment. If
                            donating by phone, inform the representative about your preference. Online donations do not
                            renew memberships and can only be allocated to states or countries, not individual projects.
                        </p>
                    </div>
                </div>

                <div class="ac">
                    <h2 class="ac-header">
                        <button type="button" class="ac-trigger">How do I volunteer with Hope For Tomorrow?</button>
                    </h2>
                    <div class="ac-panel">
                        <p class="ac-text">To volunteer, please submit an application form on our website, and our team
                            will contact you to discuss available opportunities and scheduling.</p>
                    </div>
                </div>

                <div class="ac">
                    <h2 class="ac-header">
                        <button type="button" class="ac-trigger">How can I learn more about giving through my workplace
                            and employer matches for donations?</button>
                    </h2>
                    <div class="ac-panel">
                        <p class="ac-text">Contact your HR department to inquire about your company's matching gift
                            program and eligibility. You can also reach out to us directly, and we'll guide you through
                            the process.</p>
                    </div>
                </div>

                <div class="ac">
                    <h2 class="ac-header">
                        <button type="button" class="ac-trigger">How do I unsubscribe from Newsletters?</button>
                    </h2>
                    <div class="ac-panel">
                        <p class="ac-text">Click the 'Unsubscribe' link at the bottom of any newsletter email, or
                            contact our office directly, and we'll remove your email address from our mailing list.</p>
                    </div>
                </div>
                <div class="ac">
                    <h5 class="ac-header">
                        <button type="button" class="ac-trigger">What is the impact of my donation?</button>
                    </h5>
                    <div class="ac-panel">
                        <p class="ac-text">Your donation supports our programs and services, making a tangible
                            difference in the lives of those we serve.</p>
                    </div>
                </div>

                <div class="ac">
                    <h5 class="ac-header">
                        <button type="button" class="ac-trigger">Can I volunteer abroad with your organization?</button>
                    </h5>
                    <div class="ac-panel">
                        <p class="ac-text">Yes, we offer international volunteer opportunities. Contact us to learn more
                            about our global programs.</p>
                    </div>
                </div>

                <div class="ac">
                    <h5 class="ac-header">
                        <button type="button" class="ac-trigger">How do I know my donation is secure?</button>
                    </h5>
                    <div class="ac-panel">
                        <p class="ac-text">Our website uses industry-standard SSL encryption to ensure your donation is
                            secure and private.</p>
                    </div>
                </div>

                <div class="ac">
                    <h5 class="ac-header">
                        <button type="button" class="ac-trigger">Can I donate stock or securities?</button>
                    </h5>
                    <div class="ac-panel">
                        <p class="ac-text">Yes, we accept donations of stock or securities. Please contact our office
                            for more information.</p>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer will be loaded from JS -->
    <div id="footer"></div>

    <!-- All js links -->
    <script src="https://unpkg.com/accordion-js@3.3.4/dist/accordion.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="../scripts/common.js"></script>
    <script src="../scripts/donation.js"></script>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>
