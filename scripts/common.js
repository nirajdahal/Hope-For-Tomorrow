// Encapsulate theme-related functions and variables
const themeManager = (() => {
  const applyTheme = () => {
    try {
      const currentMode = localStorage.getItem("theme") || "dark-mode";
      document.body.classList.add(currentMode);
    } catch (error) {
      console.error("Error applying theme:", error);
    }
  };

  const toggleMode = () => {
    const isLightMode = document.body.classList.contains("light-mode");
    document.body.classList.toggle("light-mode", !isLightMode);
    document.body.classList.toggle("dark-mode", isLightMode);

    try {
      localStorage.setItem("theme", isLightMode ? "dark-mode" : "light-mode");
    } catch (error) {
      console.error("Error toggling theme:", error);
    }
  };

  return { applyTheme, toggleMode };
})();

// Load Header and Footer
const loadHeader = () => {
  fetch("../components/header.php")
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("header").innerHTML = data;
    })
    .catch((error) => console.error("Error loading header:", error));
};

const loadFooter = () => {
  fetch("../components/footer.html")
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("footer").innerHTML = data;
    })
    .catch((error) => console.error("Error loading footer:", error));
};

// Expose toggleMode globally (if necessary)
window.toggleMode = themeManager.toggleMode;

// Load Header and Footer
loadHeader();
loadFooter();

// Call applyTheme when the document is ready
document.addEventListener("DOMContentLoaded", themeManager.applyTheme);

// Add this JavaScript code to toggle the navigation links on click

function toggleMenu() {
  const hamburger = document.querySelector(".hamburger");
  const navLinks = document.querySelector(".nav-links");

  hamburger.classList.toggle("active");
  navLinks.classList.toggle("show");

  // Add this to toggle the display of navLinks
  if (navLinks.classList.contains("show")) {
    navLinks.style.display = "block";
  } else {
    navLinks.style.display = ""; // Set display to an empty string to allow CSS to take over
  }
}

/*
<section class="dashboard-container">
    <h3 class="font-title">Manage Projects</h3>
    <div class="table-responsive">
        <table id="project-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><img src="../../assets/images/projects/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" width="100"></td>
                    <td>
                        <a href="edit_project.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="edit-btn">Edit</a>
                        <button class="delete-btn" data-project-id="<?php echo htmlspecialchars($row['id']); ?>" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>



*/
