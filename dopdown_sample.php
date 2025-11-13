<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Dropdown Menu</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="css/dropdown.css"
    />
  </head>
  <body>
    <!-- Header with user dropdown -->
    <div class="header">
      <h1>Dashboard</h1>

      <div class="user-dropdown">
        <button class="user-icon" id="userIcon" aria-label="User menu">
          <i class="fa-solid fa-user"></i>
        </button>

        <!-- Dropdown Menu -->
        <div class="user-menu" id="userMenu">
          <div class="user-opt-header">
            <i class="fa-solid fa-gear"></i>
            <h1 class="opt-heading">Options</h1>
          </div>
          <nav class="user-opt-nav">
            <div class="opt-nav-section">
              <ul>
                <li>
                  <a href="#" class="nav-link active" data-module="dashboard">
                    <i class="fa-solid fa-user"></i>User Data
                  </a>
                </li>
                <li>
                  <a href="#" class="nav-link" data-module="data-management">
                    <i class="fa-solid fa-user-tie"></i>Admin Data
                  </a>
                </li>
                <li>
                  <a href="#" class="nav-link" data-module="demand-forecasting">
                    <i class="fa-solid fa-wrench"></i>Settings
                  </a>
                </li>
                <li>
                  <a
                    href="#"
                    class="nav-link"
                    data-module="production-planning"
                  >
                    <i class="fa-solid fa-hourglass-start"></i>Coming Soon
                  </a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>

    <!-- Overlay for closing dropdown -->
    <div class="dropdown-overlay" id="dropdownOverlay"></div>

    <!-- Demo content -->
    <div class="demo-content">
      <h2>Welcome to your Dashboard</h2>
      <p>
        Click the user icon in the header to see the dropdown menu in action!
      </p>
      <p>
        The dropdown includes smooth animations and will close when clicking
        outside or pressing Escape.
      </p>
    </div>

    <script>
      // Get DOM elements
      const userIcon = document.getElementById("userIcon");
      const userMenu = document.getElementById("userMenu");
      const dropdownOverlay = document.getElementById("dropdownOverlay");
      const navLinks = document.querySelectorAll(".nav-link");

      // Toggle dropdown
      function toggleDropdown() {
        const isVisible = userMenu.classList.contains("show");

        if (isVisible) {
          closeDropdown();
        } else {
          openDropdown();
        }
      }

      // Open dropdown
      function openDropdown() {
        userMenu.classList.add("show");
        dropdownOverlay.classList.add("show");
        userIcon.classList.add("active");
        document.addEventListener("keydown", handleEscapeKey);
      }

      // Close dropdown
      function closeDropdown() {
        userMenu.classList.remove("show");
        dropdownOverlay.classList.remove("show");
        userIcon.classList.remove("active");
        document.removeEventListener("keydown", handleEscapeKey);
      }

      // Handle escape key
      function handleEscapeKey(e) {
        if (e.key === "Escape") {
          closeDropdown();
        }
      }

      // Handle navigation clicks
      function handleNavClick(e) {
        e.preventDefault();

        const clickedLink = e.currentTarget;
        const module = clickedLink.dataset.module;

        // Don't do anything for "coming soon" items
        if (module === "production-planning") {
          return;
        }

        // Remove active class from all links
        navLinks.forEach((link) => link.classList.remove("active"));

        // Add active class to clicked link
        clickedLink.classList.add("active");

        // Close dropdown after selection
        setTimeout(() => {
          closeDropdown();
        }, 150);

        // Here you would typically navigate to the selected module
        console.log(`Navigating to: ${module}`);
      }

      // Event listeners
      userIcon.addEventListener("click", toggleDropdown);
      dropdownOverlay.addEventListener("click", closeDropdown);

      // Add click handlers to navigation links
      navLinks.forEach((link) => {
        link.addEventListener("click", handleNavClick);
      });

      // Close dropdown when clicking outside
      document.addEventListener("click", (e) => {
        if (!userIcon.contains(e.target) && !userMenu.contains(e.target)) {
          closeDropdown();
        }
      });

      // Prevent dropdown from closing when clicking inside the menu
      userMenu.addEventListener("click", (e) => {
        e.stopPropagation();
      });
    </script>
  </body>
</html>
