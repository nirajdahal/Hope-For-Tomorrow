document.addEventListener("DOMContentLoaded", function () {
  // Handle role change with confirmation
  document.querySelectorAll(".role-select").forEach((select) => {
    select.addEventListener("change", function () {
      const userId = this.getAttribute("data-user-id");
      const newRole = this.value;

      // Confirmation dialog
      if (confirm("Are you sure you want to change this user's role?")) {
        fetch("manage-users.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: new URLSearchParams({
            action: "update_role",
            user_id: userId,
            new_role: newRole,
          }),
        })
          .then((response) => response.json())
          .then((data) => {
            alert(data.message);
          });
      } else {
        // Revert to previous role if cancelled
        this.value = this.options[0].value;
      }
    });
  });

  // Handle user deletion with confirmation
  document.querySelectorAll(".delete-btn").forEach((button) => {
    button.addEventListener("click", function () {
      const userId = this.getAttribute("data-user-id");

      if (confirm("Are you sure you want to delete this user?")) {
        fetch("manage-users.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: new URLSearchParams({
            action: "delete_user",
            user_id: userId,
          }),
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              this.closest("tr").remove(); // Remove the row from the table
            }
            alert(data.message);
          });
      }
    });
  });
});
