// Navigation functionality
document.addEventListener("DOMContentLoaded", function () {
  const navLinks = document.querySelectorAll(".nav-link");
  const sidebar = document.getElementById("sidebar");
  const sidebarToggle = document.getElementById("mobileSidebarActive");
  const sidebarHide = document.getElementById("sidebarHide");
  const backToTopBtn = document.getElementById("backToTopBtn");
  const contentArea = document.getElementById("content-loading");

  navLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();

      // Hide sidebar on mobile after selection
      if (window.innerWidth <= 768) {
        sidebar.classList.remove("active");
      }
    });
  });

  // Back to top
  contentArea.addEventListener("scroll", () => {
    if (contentArea.scrollTop > 300) {
      backToTopBtn.classList.add("show");
    } else {
      backToTopBtn.classList.remove("show");
    }
  });

  backToTopBtn.addEventListener("click", () => {
    contentArea.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });

  // Mobile sidebar toggle
  sidebarToggle.addEventListener("click", function () {
    sidebar.classList.add("active");
  });

  sidebarHide.addEventListener("click", function () {
    sidebar.classList.remove("active");
  });

  // Close sidebar when clicking outside on mobile
  document.addEventListener("click", function (e) {
    if (window.innerWidth <= 768) {
      if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
        sidebar.classList.remove("active");
      }
    }
  });
});
