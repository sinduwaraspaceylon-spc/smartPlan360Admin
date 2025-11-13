function initForecastFilter() {
  const currentYear = new Date().getFullYear();

  const filterSidebar = document.getElementById("filterSidebar");
  const filterSidebarOverlay = document.getElementById("filterSidebarOverlay");
  const filterToggleBtnInline = document.getElementById("filterToggleBtnInline");
  const filterCloseBtn = document.getElementById("filterCloseBtn");

  const yearFilter = document.getElementById("yearFilter");
  const periodFilter = document.getElementById("periodFilter");
  const statusFilter = document.getElementById("statusFilter");
  const filterApplyBtn = document.getElementById("filterApplyBtn");
  const filterResetBtn = document.getElementById("filterResetBtn");
  const forecastTitle = document.getElementById("report-title");

  const downloadBtn = document.getElementById("downloadReportBtn");

  // Stop if not demand forecasting page
  if (!yearFilter) return;

  // Helper function
  const populateYearDropdown = (dropdown, startYear = 2023) => {
    dropdown.innerHTML = "";
    for (let year = currentYear; year >= startYear; year--) {
      dropdown.innerHTML += `<option value="${year}">${year}</option>`;
    }
    dropdown.value = currentYear;
  };

  // Populate filters
  populateYearDropdown(yearFilter);
  periodFilter.value = "6";

  // Toggle sidebar
  const toggleFilterSidebar = () => {
    filterSidebar.classList.toggle("show");
    filterSidebarOverlay.classList.toggle("show");
  };

  filterToggleBtnInline?.addEventListener("click", toggleFilterSidebar);
  filterCloseBtn?.addEventListener("click", toggleFilterSidebar);
  filterSidebarOverlay?.addEventListener("click", toggleFilterSidebar);

  // Fetch table
  const fetchFilteredTable = async (year, period, status) => {
    try {
      const params = new URLSearchParams({ year, period, status });
      const res = await fetch(`testing/forcast_table_handler.php?${params}`);
      const tableHTML = await res.text();
      document.getElementById("forecast-report-section").innerHTML = tableHTML;
      forecastTitle.textContent = `Forecast Report ${year}`;
    } catch (err) {
      console.error(err);
    }
  };

  // Apply filters
  filterApplyBtn.addEventListener("click", () => {
    fetchFilteredTable(yearFilter.value, periodFilter.value, statusFilter.value);
    toggleFilterSidebar();
  });

  // Reset filters
  filterResetBtn.addEventListener("click", () => {
    yearFilter.value = currentYear;
    periodFilter.value = "6";
    statusFilter.value = "";
    fetchFilteredTable(currentYear, "6", "");
  });

  // PDF Download Button
  if (downloadBtn) {
    downloadBtn.addEventListener("click", () => {
      const year = yearFilter.value || currentYear;
      const period = periodFilter.value || "6";
      const status = statusFilter.value || "";

      window.open(
        `testing/download_pdf.php?year=${year}&period=${period}&status=${status}`,
        "_blank"
      );
    });
  }

  // Initial table load
  fetchFilteredTable(currentYear, "6", "");
}
