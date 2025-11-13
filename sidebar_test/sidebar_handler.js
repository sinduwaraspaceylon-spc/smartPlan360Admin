// Shared Filter Sidebar Handler
function initSharedFilterSidebar() {
  const currentYear = new Date().getFullYear();

  // Sidebar elements
  const filterSidebar = document.getElementById("filterSidebar");
  const filterSidebarOverlay = document.getElementById("filterSidebarOverlay");
  const filterCloseBtn = document.getElementById("filterCloseBtn");
  const filterSidebarContent = document.querySelector(".filter-sidebar-content");
  const filterApplyBtn = document.getElementById("filterApplyBtn");
  const filterResetBtn = document.getElementById("filterResetBtn");

  // Toggle buttons
  const forecastToggleBtn = document.getElementById("filterToggleBtnInline");
  const demandToggleBtn = document.getElementById("demandFilterToggleBtnInline");

  // Templates
  const forecastTemplate = document.getElementById("forecastFiltersTemplate");
  const demandTemplate = document.getElementById("demandFiltersTemplate");

  // Download buttons
  const forecastDownloadBtn = document.getElementById("downloadReportBtn");
  const demandDownloadBtn = document.getElementById("downloadDemandReportBtn");

  // Track current filter type
  let currentFilterType = null;

  // Helper function
  const populateYearDropdown = (dropdown, startYear = 2023) => {
    dropdown.innerHTML = "";
    for (let year = currentYear; year >= startYear; year--) {
      dropdown.innerHTML += `<option value="${year}">${year}</option>`;
    }
    dropdown.value = currentYear;
  };

  // Open sidebar with specific filter type
  const openSidebar = (filterType) => {
    currentFilterType = filterType;
    
    // Clear current content
    filterSidebarContent.innerHTML = "";
    
    // Load appropriate template
    const template = filterType === "forecast" ? forecastTemplate : demandTemplate;
    if (template) {
      const clone = template.content.cloneNode(true);
      filterSidebarContent.appendChild(clone);
      
      // Initialize filters based on type
      if (filterType === "forecast") {
        initializeForecastFilters();
      } else if (filterType === "demand") {
        initializeDemandFilters();
      }
    }
    
    // Show sidebar
    filterSidebar.classList.add("show");
    filterSidebarOverlay.classList.add("show");
  };

  // Close sidebar
  const closeSidebar = () => {
    filterSidebar.classList.remove("show");
    filterSidebarOverlay.classList.remove("show");
    currentFilterType = null;
  };

  // Initialize forecast filters
  const initializeForecastFilters = () => {
    const yearFilter = document.getElementById("yearFilter");
    const periodFilter = document.getElementById("periodFilter");
    
    if (yearFilter) {
      populateYearDropdown(yearFilter);
    }
    if (periodFilter) {
      periodFilter.value = "6";
    }
  };

  // Initialize demand filters
  const initializeDemandFilters = () => {
    const yearFilter = document.getElementById("yearFilter");
    
    if (yearFilter) {
      populateYearDropdown(yearFilter);
    }
  };

  // Fetch forecast table
  const fetchForecastTable = async (year, period, status) => {
    try {
      const params = new URLSearchParams({ year, period, status });
      const res = await fetch(`testing/forcast_table_handler.php?${params}`);
      const tableHTML = await res.text();
      document.getElementById("forecast-report-section").innerHTML = tableHTML;
      document.getElementById("report-title").textContent = `Forecast Report ${year}`;
    } catch (err) {
      console.error("Error fetching forecast table:", err);
    }
  };

  // Fetch demand table
  const fetchDemandTable = async (rank, year, month) => {
    try {
      const params = new URLSearchParams({ rank, year, month });
      const res = await fetch(`testing/demand_table_handler.php?${params}`);
      const tableHTML = await res.text();
      document.getElementById("demand-report-section").innerHTML = tableHTML;
      document.getElementById("demand-report-title").textContent = `Demand Report ${year}`;
    } catch (err) {
      console.error("Error fetching demand table:", err);
    }
  };

  // Apply filters based on current type
  const applyFilters = () => {
    if (currentFilterType === "forecast") {
      const yearFilter = document.getElementById("yearFilter");
      const periodFilter = document.getElementById("periodFilter");
      const statusFilter = document.getElementById("statusFilter");
      
      fetchForecastTable(
        yearFilter.value,
        periodFilter.value,
        statusFilter.value
      );
    } else if (currentFilterType === "demand") {
      const demandRankFilter = document.getElementById("demandRankFilter");
      const yearFilter = document.getElementById("yearFilter");
      const monthFilter = document.getElementById("monthFilter");
      
      fetchDemandTable(
        demandRankFilter.value,
        yearFilter.value,
        monthFilter.value
      );
    }
    
    closeSidebar();
  };

  // Reset filters based on current type
  const resetFilters = () => {
    if (currentFilterType === "forecast") {
      const yearFilter = document.getElementById("yearFilter");
      const periodFilter = document.getElementById("periodFilter");
      const statusFilter = document.getElementById("statusFilter");
      
      yearFilter.value = currentYear;
      periodFilter.value = "6";
      statusFilter.value = "";
      
      fetchForecastTable(currentYear, "6", "");
    } else if (currentFilterType === "demand") {
      const demandRankFilter = document.getElementById("demandRankFilter");
      const yearFilter = document.getElementById("yearFilter");
      const monthFilter = document.getElementById("monthFilter");
      
      demandRankFilter.value = "";
      yearFilter.value = currentYear;
      monthFilter.value = "";
      
      fetchDemandTable("", currentYear, "");
    }
  };

  // Event listeners for toggle buttons
  forecastToggleBtn?.addEventListener("click", () => openSidebar("forecast"));
  demandToggleBtn?.addEventListener("click", () => openSidebar("demand"));

  // Event listeners for close
  filterCloseBtn?.addEventListener("click", closeSidebar);
  filterSidebarOverlay?.addEventListener("click", closeSidebar);

  // ESC key to close
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && filterSidebar.classList.contains("show")) {
      closeSidebar();
    }
  });

  // Apply and Reset buttons
  filterApplyBtn?.addEventListener("click", applyFilters);
  filterResetBtn?.addEventListener("click", resetFilters);

  // Forecast PDF Download
  if (forecastDownloadBtn) {
    forecastDownloadBtn.addEventListener("click", () => {
      // Get current filter values or defaults
      const yearFilter = document.getElementById("yearFilter");
      const periodFilter = document.getElementById("periodFilter");
      const statusFilter = document.getElementById("statusFilter");
      
      const year = yearFilter?.value || currentYear;
      const period = periodFilter?.value || "6";
      const status = statusFilter?.value || "";

      window.open(
        `testing/download_pdf.php?year=${year}&period=${period}&status=${status}`,
        "_blank"
      );
    });
  }

  // Demand PDF Download (if you have one)
  if (demandDownloadBtn) {
    demandDownloadBtn.addEventListener("click", () => {
      const demandRankFilter = document.getElementById("demandRankFilter");
      const yearFilter = document.getElementById("yearFilter");
      const monthFilter = document.getElementById("monthFilter");
      
      const rank = demandRankFilter?.value || "";
      const year = yearFilter?.value || currentYear;
      const month = monthFilter?.value || "";

      window.open(
        `testing/download_demand_pdf.php?rank=${rank}&year=${year}&month=${month}`,
        "_blank"
      );
    });
  }

  // Initial table loads
  fetchForecastTable(currentYear, "6", "");
  // Uncomment when demand table is ready
  // fetchDemandTable("", currentYear, "");
}

// Initialize when DOM is ready
document.addEventListener("DOMContentLoaded", initSharedFilterSidebar);