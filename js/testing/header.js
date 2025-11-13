// Get DOM elements
const userIcon = document.getElementById("userIcon");
const userMenu = document.getElementById("userMenu");
const dropdownOverlay = document.getElementById("dropdownOverlay");
const navLinks = document.querySelectorAll(".dropdown-nav-link");

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

//Notificatiion pannel functions
document.addEventListener("DOMContentLoaded", function () {
  const notificationIcon = document.getElementById("notificationIcon");
  const notificationMenu = document.getElementById("notificationMenu");
  const notificationBadge = document.getElementById("notificationBadge");
  const markAllRead = document.getElementById("markAllRead");
  const closePanelBtn = document.getElementById("closePanelBtn");
  const notificationItems = document.querySelectorAll(".notification-item");

  // Toggle notification panel
  notificationIcon.addEventListener("click", function (e) {
    e.preventDefault();
    e.stopPropagation();
    notificationMenu.classList.toggle("active");

    // Prevent body scroll when panel is open
    if (notificationMenu.classList.contains("active")) {
      document.body.style.overflow = "hidden";
      document.body.style.position = "fixed";
      document.body.style.width = "100%";
      document.body.style.height = "100%";
    } else {
      document.body.style.overflow = "";
      document.body.style.position = "";
      document.body.style.width = "";
      document.body.style.height = "";
    }
  });

  // Close notification panel
  if (closePanelBtn) {
    closePanelBtn.addEventListener("click", function () {
      notificationMenu.classList.remove("active");
      document.body.style.overflow = "";
      document.body.style.position = "";
      document.body.style.width = "";
      document.body.style.height = "";
    });
  }

  // Close panel when pressing Escape key
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && notificationMenu.classList.contains("active")) {
      notificationMenu.classList.remove("active");
      document.body.style.overflow = "";
      document.body.style.position = "";
      document.body.style.width = "";
      document.body.style.height = "";
    }
  });

  // Mark individual notification as read
  notificationItems.forEach((item) => {
    item.addEventListener("click", function () {
      this.classList.remove("unread");
      updateBadgeCount();
    });
  });

  // Mark all as read
  markAllRead.addEventListener("click", function (e) {
    e.preventDefault();
    notificationItems.forEach((item) => {
      item.classList.remove("unread");
    });
    updateBadgeCount();
  });

  // Update badge count
  function updateBadgeCount() {
    const unreadCount = document.querySelectorAll(
      ".notification-item.unread"
    ).length;
    if (unreadCount > 0) {
      notificationBadge.textContent = unreadCount;
      notificationBadge.style.display = "flex";
    } else {
      notificationBadge.style.display = "none";
    }
  }

  // Initialize badge count
  updateBadgeCount();

  // Prevent panel from closing when clicking inside it
  notificationMenu.addEventListener("click", function (e) {
    e.stopPropagation();
  });
});
