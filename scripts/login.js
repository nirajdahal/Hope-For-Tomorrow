document
  .getElementById("login-form")
  .addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the form from submitting the default way

    var formData = new FormData(this);

    fetch("../pages/login.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          Toastify({
            text: data.message,
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            stopOnFocus: true,
          }).showToast();

          // Redirect to the URL provided by the PHP script
          setTimeout(() => {
            window.location.href = data.redirect;
          }, 3000); // Delay should match the toast duration
        } else {
          Toastify({
            text: data.message,
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
            stopOnFocus: true,
          }).showToast();
        }
      })
      .catch((error) => {
        Toastify({
          text: "An error occurred. Please try again.",
          duration: 3000,
          gravity: "top",
          position: "right",
          backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
          stopOnFocus: true,
        }).showToast();
      });
  });
