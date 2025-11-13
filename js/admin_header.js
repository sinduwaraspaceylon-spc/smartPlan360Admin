/**
 * Unified Menu System
 * Handles both notification panel and user dropdown functionality
 */
class MenuSystem {
  constructor() {
    this.activeMenus = new Set();
    this.init();
  }

  init() {
    // Wait for DOM to be fully loaded
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", () => {
        this.initializeMenus();
      });
    } else {
      this.initializeMenus();
    }
  }

  initializeMenus() {
    this.initNotificationPanel();
    this.initUserDropdown();
    this.setupGlobalEventListeners();
  }

  // Generic menu controller methods
  toggleMenu(menuElement, triggerElement, options = {}) {
    const activeClass = options.activeClass || "active";
    const isActive = menuElement.classList.contains(activeClass);

    if (isActive) {
      this.closeMenu(menuElement, triggerElement, options);
    } else {
      this.openMenu(menuElement, triggerElement, options);
    }
  }

  openMenu(menuElement, triggerElement, options = {}) {
    const activeClass = options.activeClass || "active";

    // Close other menus if specified (default behavior)
    if (options.closeOthers !== false) {
      this.closeAllMenus();
    }

    // Add active classes
    menuElement.classList.add(activeClass);
    if (triggerElement) {
      triggerElement.classList.add("active");
    }

    // Handle overlay
    if (options.overlayElement) {
      options.overlayElement.classList.add(activeClass);
    }

    // Handle body scroll prevention
    if (options.preventBodyScroll) {
      this.preventBodyScroll();
    }

    // Track active menu
    this.activeMenus.add({
      menu: menuElement,
      trigger: triggerElement,
      options: options,
    });

    // Trigger custom event
    menuElement.dispatchEvent(
      new CustomEvent("menuOpened", {
        detail: { trigger: triggerElement, options },
      })
    );
  }

  closeMenu(menuElement, triggerElement, options = {}) {
    const activeClass = options.activeClass || "active";

    // Remove active classes
    menuElement.classList.remove(activeClass);
    if (triggerElement) {
      triggerElement.classList.remove("active");
    }

    // Handle overlay
    if (options.overlayElement) {
      options.overlayElement.classList.remove(activeClass);
    }

    // Restore body scroll
    if (options.preventBodyScroll) {
      this.restoreBodyScroll();
    }

    // Remove from active menus tracking
    this.activeMenus.forEach((item) => {
      if (item.menu === menuElement) {
        this.activeMenus.delete(item);
      }
    });

    // Trigger custom event
    menuElement.dispatchEvent(
      new CustomEvent("menuClosed", {
        detail: { trigger: triggerElement, options },
      })
    );
  }

  closeAllMenus() {
    // Create a copy of the set to avoid modification during iteration
    const menusToClose = Array.from(this.activeMenus);
    menusToClose.forEach(({ menu, trigger, options }) => {
      this.closeMenu(menu, trigger, options);
    });
  }

  preventBodyScroll() {
    document.body.style.overflow = "hidden";
    document.body.style.position = "fixed";
    document.body.style.width = "100%";
    document.body.style.height = "100%";
  }

  restoreBodyScroll() {
    document.body.style.overflow = "";
    document.body.style.position = "";
    document.body.style.width = "";
    document.body.style.height = "";
  }

  // Notification Panel Implementation
  initNotificationPanel() {
    const notificationIcon = document.getElementById("notificationIcon");
    const notificationMenu = document.getElementById("notificationMenu");
    const notificationBadge = document.getElementById("notificationBadge");
    const markAllRead = document.getElementById("markAllRead");
    const closePanelBtn = document.getElementById("closePanelBtn");
    const notificationItems = document.querySelectorAll(".notification-item");

    if (!notificationIcon || !notificationMenu) {
      console.warn("Notification elements not found");
      return;
    }

    // Toggle notification panel
    notificationIcon.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();
      this.toggleMenu(notificationMenu, notificationIcon, {
        activeClass: "active",
        preventBodyScroll: true,
      });
    });

    // Close panel button
    if (closePanelBtn) {
      closePanelBtn.addEventListener("click", (e) => {
        e.preventDefault();
        this.closeMenu(notificationMenu, notificationIcon, {
          activeClass: "active",
          preventBodyScroll: true,
        });
      });
    }

    // Mark individual notification as read
    notificationItems.forEach((item) => {
      item.addEventListener("click", (e) => {
        // Don't mark as read if clicking on links or buttons inside
        if (e.target.tagName === "A" || e.target.tagName === "BUTTON") {
          return;
        }

        if (item.classList.contains("unread")) {
          item.classList.remove("unread");
          this.updateNotificationBadge();

          // Add visual feedback
          item.style.transition = "background-color 0.3s ease";
          const originalBg = item.style.backgroundColor;
          item.style.backgroundColor = "#e8f5e8";
          setTimeout(() => {
            item.style.backgroundColor = originalBg;
          }, 300);
        }
      });
    });

    // Mark all as read
    if (markAllRead) {
      markAllRead.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();

        notificationItems.forEach((item) => {
          item.classList.remove("unread");
        });

        this.updateNotificationBadge();
      });
    }

    // Prevent panel from closing when clicking inside
    notificationMenu.addEventListener("click", (e) => {
      e.stopPropagation();
    });

    // Initialize badge count
    this.updateNotificationBadge();

    // Handle "View all notifications" link
    const viewAllLink = notificationMenu.querySelector(".view-all-link");
    if (viewAllLink) {
      viewAllLink.addEventListener("click", (e) => {
        e.preventDefault();
        console.log("Navigate to all notifications page");
        // Add your navigation logic here
      });
    }
  }

  // Update notification badge count
  updateNotificationBadge() {
    const notificationBadge = document.getElementById("notificationBadge");
    if (!notificationBadge) return;

    const unreadCount = document.querySelectorAll(
      ".notification-item.unread"
    ).length;

    if (unreadCount > 0) {
      notificationBadge.textContent = unreadCount;
      notificationBadge.style.display = "flex";
      notificationBadge.setAttribute(
        "aria-label",
        `${unreadCount} unread notifications`
      );
    } else {
      notificationBadge.style.display = "none";
      notificationBadge.removeAttribute("aria-label");
    }
  }

  // User Dropdown Implementation
  initUserDropdown() {
    const userIcon = document.getElementById("userIcon");
    const userMenu = document.getElementById("userMenu");
    const navLinks = document.querySelectorAll(".dropdown-nav-link");

    if (!userIcon || !userMenu) {
      console.warn("User dropdown elements not found");
      return;
    }

    // Toggle user dropdown
    userIcon.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();
      this.toggleMenu(userMenu, userIcon, {
        activeClass: "active",
      });
    });

    // Handle navigation link clicks
    navLinks.forEach((link) => {
      link.addEventListener("click", (e) => {
        e.preventDefault();

        const module = link.dataset.module;

        // Handle "Coming Soon" items
        if (module === "production-planning") {
          // Add visual feedback for coming soon items
          link.style.opacity = "0.6";
          setTimeout(() => {
            link.style.opacity = "";
          }, 200);
          return;
        }

        // Update active states
        navLinks.forEach((l) => l.classList.remove("active"));
        link.classList.add("active");

        // Close dropdown after selection with slight delay for UX
        setTimeout(() => {
          this.closeMenu(userMenu, userIcon, {
            activeClass: "active",
          });
        }, 150);

        // Handle navigation
        this.handleNavigation(module, link);
      });
    });

    // Prevent dropdown from closing when clicking inside
    userMenu.addEventListener("click", (e) => {
      e.stopPropagation();
    });
  }

  // Handle navigation logic
  handleNavigation(module, linkElement) {
    console.log(`Navigating to: ${module}`);

    // Add loading state
    const originalText = linkElement.innerHTML;
    linkElement.innerHTML =
      '<i class="fa-solid fa-spinner fa-spin"></i> Loading...';

    // Simulate navigation delay
    setTimeout(() => {
      linkElement.innerHTML = originalText;
      // Add your actual navigation logic here
      // For example: window.location.href = `/dashboard/${module}`;
    }, 500);
  }

  // Global Event Listeners
  setupGlobalEventListeners() {
    // Handle escape key for all active menus
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") {
        this.closeAllMenus();
      }
    });

    // Close menus when clicking outside
    document.addEventListener("click", (e) => {
      let shouldCloseMenus = true;

      // Check if the click is inside any active menu or its trigger
      this.activeMenus.forEach(({ menu, trigger }) => {
        if (menu && menu.contains(e.target)) {
          shouldCloseMenus = false;
        }
        if (trigger && trigger.contains(e.target)) {
          shouldCloseMenus = false;
        }
      });

      if (shouldCloseMenus) {
        this.closeAllMenus();
      }
    });

    // Handle window resize - close menus on mobile orientation change
    let resizeTimeout;
    window.addEventListener("resize", () => {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(() => {
        if (window.innerWidth <= 768) {
          // Mobile breakpoint
          this.closeAllMenus();
        }
      }, 100);
    });
  }

  // Public API methods
  getActiveMenus() {
    return Array.from(this.activeMenus);
  }

  isMenuOpen(menuId) {
    const menu = document.getElementById(menuId);
    if (!menu) return false;

    return Array.from(this.activeMenus).some((item) => item.menu === menu);
  }

  openNotificationPanel() {
    const notificationMenu = document.getElementById("notificationMenu");
    const notificationIcon = document.getElementById("notificationIcon");
    if (notificationMenu && notificationIcon) {
      this.openMenu(notificationMenu, notificationIcon, {
        activeClass: "active",
        preventBodyScroll: true,
      });
    }
  }

  closeNotificationPanel() {
    const notificationMenu = document.getElementById("notificationMenu");
    const notificationIcon = document.getElementById("notificationIcon");
    if (notificationMenu && notificationIcon) {
      this.closeMenu(notificationMenu, notificationIcon, {
        activeClass: "active",
        preventBodyScroll: true,
      });
    }
  }
}

// Initialize the menu system and make it globally available
let menuSystem;

// Auto-initialize when script loads
(function () {
  menuSystem = new MenuSystem();

  // Make it available globally for external access
  window.MenuSystem = menuSystem;
})();

// Export for module systems
if (typeof module !== "undefined" && module.exports) {
  module.exports = MenuSystem;
}
