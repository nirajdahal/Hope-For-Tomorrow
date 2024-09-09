<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <link rel="stylesheet" type="text/css" href="../css/pages.css" />
</head>
<body>
    <header class="main-header">
        <figure class="logo">
            <p class="font-title"><b><a href="../index.html">Hope For Tomorrow</a></b></p>
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
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="../pages/mission.html">Mission</a></li>
                    <li><a href="../pages/donation.html">Donation</a></li>
                    <li><a href="../pages/programs.php">Programs</a></li>
                    <li><a href="../pages/blogs.html">Blogs</a></li>
                    <li><a href="../pages/contact.html">Contact</a></li>

                    <?php
                    session_start();
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
                        if ($_SESSION['role'] === 'admin') {
                            // Show dashboard link for admin
                            echo '<li><a href="../protected/pages/dashboard.php">Dashboard</a></li>';
                        }
                        // Show logout link for both admin and regular users
                        echo '<li><a href="../pages/logout.php">Logout</a></li>';
                    } else {
                        // Show login and signup links for guests
                        echo '<li><a href="../pages/login.html">Login</a></li>';
                        echo '<li><a href="../pages/signup.html">Signup</a></li>';
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

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
