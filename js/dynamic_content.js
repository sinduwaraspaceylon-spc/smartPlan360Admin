// Menu configurations - frozen for immutability
const MENU_CONFIGS = Object.freeze({
  dashboard: [
    { page: "dashboard", title: "Analytics", section: "accurecy-menu" },
    { page: "dashboard", title: "Gross Sale", section: "gross_sale" },
    {
      page: "dashboard",
      title: "Department",
      section: "departments-chart",
    },
    { page: "dashboard", title: "Trend", section: "trend" },
  ],
  "data-management": [
    { page: "data-management", title: "All Data", section: "all-data" },
    { page: "data-management", title: "Upload", section: "upload" },
    {
      page: "data-management",
      title: "Import/Export",
      section: "import-export",
    },
    { page: "data-management", title: "History", section: "history" },
  ],
  "demand-forecasting": [
    { page: "demand-forecasting", title: "Forecast", section: "forcast-chart" },
    { page: "demand-forecasting", title: "Report", section: "forecast-report" },
    {
      page: "demand-forecasting",
      title: "Demand plan",
      section: "demand-plan",
    },
    { page: "demand-forecasting", title: "Reports", section: "reports" },
  ],
  "production-planning": [
    { page: "production-planning", title: "Planning", section: "planning" },
    { page: "production-planning", title: "Schedule", section: "schedule" },
    { page: "production-planning", title: "Resources", section: "resources" },
    { page: "production-planning", title: "Timeline", section: "timeline" },
  ],
  "product-development": [
    { page: "product-development", title: "Products", section: "products" },
    {
      page: "product-development",
      title: "New Product",
      section: "new-product",
    },
    { page: "product-development", title: "Prototypes", section: "prototypes" },
    { page: "product-development", title: "Testing", section: "testing" },
  ],
});

// State management
const state = {
  currentPage: "dashboard",
  currentSection: "accurecy-menu",
  observer: null,
};

// Cache DOM elements
const DOM = {
  menuContainer: null,
  contentArea: null,
  pageTitle: null,
  headerTitle: null,
  init() {
    this.menuContainer = document.getElementById("dynamic-menu");
    this.contentArea = document.getElementById("content-area");
    this.pageTitle = document.getElementById("page-title");
    this.headerTitle = document.querySelector(".currentModule");
  },
};

// Build dynamic header menu with document fragment for better performance
function buildHeaderMenu(page) {
  const menuItems = MENU_CONFIGS[page] || MENU_CONFIGS.dashboard;
  if (!DOM.menuContainer) return;

  const fragment = document.createDocumentFragment();

  menuItems.forEach((item, i) => {
    const li = document.createElement("li");
    const a = document.createElement("a");

    a.href = "#";
    a.className = "heading-nav-link";
    if (i === 0 || item.section === state.currentSection) {
      a.classList.add("active");
    }

    // Use dataset for cleaner attribute handling
    Object.assign(a.dataset, {
      page: item.page,
      section: item.section,
      title: item.title,
    });

    a.textContent = item.title;
    a.onclick = handleHeaderNavClick;

    li.appendChild(a);
    fragment.appendChild(li);
  });

  DOM.menuContainer.innerHTML = "";
  DOM.menuContainer.appendChild(fragment);
}

// Optimized scroll spy with single observer
function initScrollSpy() {
  // Clean up existing observer
  if (state.observer) {
    state.observer.disconnect();
  }

  const sections = document.querySelectorAll(
    "[id].dashboard-grid, [id].page-section-holder"
  );
  if (!sections.length) return;

  state.observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const sectionId = entry.target.id;
          updateActiveMenuLink(sectionId);
          state.currentSection = sectionId;
        }
      });
    },
    { threshold: 0.4, rootMargin: "-20% 0px -20% 0px" }
  );

  sections.forEach((sec) => state.observer.observe(sec));
}

// Update active menu link efficiently
function updateActiveMenuLink(sectionId) {
  const links = DOM.menuContainer?.querySelectorAll(".heading-nav-link");
  if (!links) return;

  links.forEach((link) => {
    link.classList.toggle("active", link.dataset.section === sectionId);
  });
}

// Handle header menu navigation
function handleHeaderNavClick(e) {
  e.preventDefault();

  const { section, page, title } = this.dataset;

  // Update active state
  updateActiveMenuLink(section);

  // Scroll to section
  scrollToSection(section);
  state.currentSection = section;

  // Update URL
  const url = new URL(window.location);
  url.searchParams.set("page", page);
  url.searchParams.set("section", section);
  history.pushState({ page, section, title }, title, url);
}

// Optimized scroll to section with RAF
function scrollToSection(section) {
  const el = document.getElementById(section);

  if (el) {
    requestAnimationFrame(() => {
      el.scrollIntoView({ behavior: "smooth", block: "start" });

      // Highlight effect
      el.classList.add("section-highlight");
      setTimeout(() => el.classList.remove("section-highlight"), 1500);
    });
  } else {
    loadSectionContent(state.currentPage, section);
  }
}

// Load section content with better error handling
async function loadSectionContent(page, section) {
  try {
    const res = await fetch(`php/pages/${page}_${section}.php`);
    if (!res.ok) {
      console.log("Section file not found, using main page content");
      return;
    }

    const html = await res.text();
    if (DOM.contentArea) {
      DOM.contentArea.innerHTML = html;
      executeScripts(DOM.contentArea);
    }
  } catch (err) {
    console.error("Error loading section:", err);
  }
}

// Execute scripts
function executeScripts(container) {
  const scripts = container.querySelectorAll("script");
  const fragment = document.createDocumentFragment();

  scripts.forEach((script) => {
    const newScript = document.createElement("script");
    if (script.src) {
      newScript.src = script.src;
    } else {
      newScript.textContent = script.textContent;
    }
    fragment.appendChild(newScript);
  });

  document.body.appendChild(fragment);
}

// Load page content with async/await
async function loadContent(page, title) {
  state.currentPage = page;
  state.currentSection = MENU_CONFIGS[page]?.[0]?.section || "overview";

  buildHeaderMenu(page);

  try {
    const res = await fetch(`php/pages/${page}.php`);
    if (!res.ok) throw new Error("Page not found");

    const html = await res.text();

    if (DOM.contentArea) DOM.contentArea.innerHTML = html;
    if (DOM.pageTitle)
      DOM.pageTitle.textContent = `${title} - Spa Ceylon Smart 360 Admin`;
    if (DOM.headerTitle) DOM.headerTitle.textContent = title;

    // Update URL
    const url = new URL(window.location);
    url.searchParams.set("page", page);
    url.searchParams.delete("section");
    history.pushState({ page, title }, title, url);

    executeScripts(DOM.contentArea);

    // Initialize scroll spy after content loads
    setTimeout(initScrollSpy, 200);

    // Demand-forecast page-specific functions
    if (
      page === "demand-forecasting" &&
      typeof initForecastFilter === "function"
    ) {
      initForecastFilter();
    }
    
    if (
      page === "demand-forecasting" &&
      typeof initSharedFilterSidebar === "function"
    ) {
      initSharedFilterSidebar();
    }

    if (
      page === "demand-forecasting" &&
      typeof initDemandPlanSection === "function"
    ) {
      initDemandPlanSection();
    }

    // demand filter handler
    if (
      page === "demand-forecasting" &&
      typeof initDemandFilters === "function"
    ) {
      initDemandFilters();
    }

    // Dashboard page-specific functions
    if (page === "dashboard" && typeof initDashboardCharts === "function") {
      initDashboardCharts();
    }

    if (
      (page === "demand-forecasting" || page === "dashboard") &&
      typeof loadChartData === "function"
    ) {
      loadChartData();
    }

    if((page === "order-picking") && typeof initEvents === "function"){
      initEvents();
    }
  } catch (err) {
    if (DOM.contentArea) {
      DOM.contentArea.innerHTML = `
        <div style="padding: 20px; color: #e74c3c; background: #fadbd8; border-radius: 5px;">
          <i class="fas fa-exclamation-triangle"></i> Error: ${err.message}
        </div>`;
    }
  }
}

// Event delegation for sidebar navigation
function handleSidebarNavigation(e) {
  const link = e.target.closest(".nav-link:not(.header-nav-link)");
  if (!link) return;

  e.preventDefault();

  // Update active state
  document
    .querySelectorAll(".nav-link:not(.header-nav-link)")
    .forEach((l) => l.classList.remove("active"));
  link.classList.add("active");

  const { page, title } = link.dataset;
  loadContent(page, title);
}

// Handle browser navigation
function handlePopState(e) {
  if (!e.state) return;

  const { page, section, title } = e.state;

  if (section) {
    state.currentPage = page;
    state.currentSection = section;
    buildHeaderMenu(page);
    scrollToSection(section);
    updateActiveMenuLink(section);
  } else {
    loadContent(page, title);
  }

  // Update sidebar active state
  document
    .querySelectorAll(".nav-link:not(.header-nav-link)")
    .forEach((link) => {
      link.classList.toggle("active", link.dataset.page === page);
    });
}

// Initialize on DOM ready
function init() {
  DOM.init();

  // Use event delegation for sidebar
  document.addEventListener("click", handleSidebarNavigation);
  window.addEventListener("popstate", handlePopState);

  // Load initial page
  const params = new URLSearchParams(window.location.search);
  const page = params.get("page") || "dashboard";
  const section = params.get("section");
  const link = document.querySelector(`[data-page="${page}"]`);
  const title = link?.dataset.title || "Dashboard";

  // Set active sidebar link
  if (link) {
    document
      .querySelectorAll(".nav-link:not(.header-nav-link)")
      .forEach((l) => l.classList.remove("active"));
    link.classList.add("active");
  }

  loadContent(page, title);

  // Navigate to section if specified
  if (section) {
    setTimeout(() => {
      state.currentSection = section;
      scrollToSection(section);
      updateActiveMenuLink(section);
    }, 500);
  }
}

// Start when DOM is ready
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", init);
} else {
  init();
}
