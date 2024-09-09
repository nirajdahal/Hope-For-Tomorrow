<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- All Internal links -->
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <link rel="stylesheet" type="text/css" href="../css/pages.css" />

    <title>Signup</title>
</head>

<body>
    <!-- Header will be loaded from JS-->
    <header id="header"></header>

    <main>

        <!-- Signup Section -->
        <section class="get-connected container">

            <div class="get-connected-container ">
                <form class="get-connected-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-description">
                        <h4 class="font-title">Create an Account</h4>
                        <p class="font-content">Join our community to make a difference!</p>

                    </div>
                    <div>
                                <div class="input-name">
                <input type="text" placeholder="Username" id="username" name="username">
                <span class="error font-content"></span>
            </div>
            <div class="input-email">
                <input type="password" placeholder="Password" id="password" name="password">
                <span class="error font-content"></span>
            </div>
            <div class="input-email">
                <input type="email" placeholder="Email" id="email" name="email">
                <span class="error font-content"></span>
            </div>
</div>
                    <!-- <input type="hidden" name="role" value="user"> -->
                    <div class="submit-button">
                        <button>Signup</button>
                    </div>

                </form>

              
            </div>

        </section>
    </main>

    <!-- Footer Will be Loaded From JS -->
    <footer id="footer">
       
    </footer>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="../scripts/common.js"></script>
    <script src="../scripts/signup.js"></script> 

    <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $role = $_POST["role"];

        // Connect to database
        $conn = new mysqli("localhost", "root", "", "hopefortomorrow_db");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to insert new user
        $sql = "INSERT INTO user (username, password, email, role) VALUES ('$username', '$password', '$email', '$role')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>

</html>