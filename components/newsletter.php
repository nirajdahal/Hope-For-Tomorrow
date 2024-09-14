<?php
// Database connection settings
$host = 'localhost';
$db = 'hopefortomorrow_db';
$user = 'root';
$pass = '';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Establish database connection
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get the email from POST request
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        // Insert the email into the newsletter table
        $stmt = $conn->prepare("INSERT INTO newsletter_subscriptions (email) VALUES (:email)");
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            $message = "Subscription successful!";
        } else {
            $message = "Failed to subscribe.";
        }
    } catch (PDOException $e) {
        if ($e->getCode() === '23000') {
            // Handle duplicate entry error
            $message = "You are already subscribed with this email.";
        } else {
            // Handle other database errors
            $message = "Error: " . $e->getMessage();
        }
    }

    $conn = null; // Close connection

    // Return JSON response
    echo json_encode(['message' => $message]);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Newsletter</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />
</head>
<body>
    <!-- Newsletter Form -->
    <section class="newsletter">
        <header class="subscript-text">
            <h5 class="font-title">Subscribe to our newsletter</h5>
        </header>
        <form id="newsletterForm" class="subscript-input font-content" method="POST">
            <input
              class="subscribe-input"
              placeholder="Your Email"
              type="email"
              name="email"
              required
            />
            <button class="subscribe-button" type="submit">Submit</button>
        </form>
    </section>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
      document.getElementById('newsletterForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    var formData = new FormData(this);

    // Define the paths
    const primaryPath = '../components/newsletter.php';
    const fallbackPath = './components/newsletter.php';

    // Function to handle fetch request
    function fetchData(path) {
        return fetch(path, {
            method: 'POST',
            body: formData
        }).then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        });
    }

    // Try primary path first
    fetchData(primaryPath)
        .then(data => {
            Toastify({
                text: data.message,
                duration: 3000,
                gravity: 'top',
                position: 'right',
                backgroundColor: data.message.includes("successful") ? "green" : "red"
            }).showToast();

            // Clear the input field after subscription
            if (data.message.includes("successful")) {
                document.querySelector('input[name="email"]').value = '';
            }
        })
        .catch(error => {
            console.error('Error:', error);

            // Try fallback path if primary path fails
            fetchData(fallbackPath)
                .then(data => {
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        gravity: 'top',
                        position: 'right',
                        backgroundColor: data.message.includes("successful") ? "green" : "red"
                    }).showToast();

                    // Clear the input field after subscription
                    if (data.message.includes("successful")) {
                        document.querySelector('input[name="email"]').value = '';
                    }
                })
                .catch(fallbackError => {
                    console.error('Fallback error:', fallbackError);
                });
        });
});

    </script>
</body>
</html>
