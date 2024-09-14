document.addEventListener("DOMContentLoaded", function () {
  const deleteButtons = document.querySelectorAll(".delete-btn");

  deleteButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const email = this.getAttribute("data-email");

      if (
        confirm(
          `Are you sure you want to delete the subscription for ${email}?`
        )
      ) {
        fetch("../pages/manage-subscriptions.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: new URLSearchParams({
            action: "delete_subscription",
            email: email,
          }),
        })
          .then((response) => response.json())
          .then((data) => {
            alert(data.message);
            if (data.success) {
              // Remove the row from the table
              this.closest("tr").remove();
            }
          })
          .catch((error) => console.error("Error:", error));
      }
    });
  });
});
