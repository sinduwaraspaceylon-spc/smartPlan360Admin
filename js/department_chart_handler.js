function initDashboardCharts() {
  const currentYear = new Date().getFullYear();
  const yearDropdown = document.getElementById("yearDropdown");
  const chartTypeDropdown = document.getElementById("chartTypeDropdown");
  const departmentSaleTitle = document.getElementById("department-chart-title");

  // Stop if dashboard HTML not found
  if (!yearDropdown) return;

  // Populate year dropdown
  const populateYearDropdown = (dropdown) => {
    dropdown.innerHTML = "";
    for (let year = currentYear; year >= 2023; year--) {
      dropdown.innerHTML += `<option value="${year}">${year}</option>`;
    }
    dropdown.value = currentYear;
  };
  populateYearDropdown(yearDropdown);

  // Fetch department chart
  const loadDepartmentChart = async (year, chartType = "doughnut") => {
    try {
      const res = await fetch(`testing/chart_handler.php?year=${year}`);
      const data = await res.json();

      document.dispatchEvent(
        new CustomEvent("departmentChartDataLoaded", {
          detail: { data, year, chartType },
        })
      );
    } catch (err) {
      console.error(err);
    }
  };

  // Listeners
  yearDropdown.addEventListener("change", () => {
    loadDepartmentChart(yearDropdown.value, chartTypeDropdown.value);
    departmentSaleTitle.textContent = `Sales by Departments ${yearDropdown.value}`;
  });

  chartTypeDropdown?.addEventListener("change", () => {
    loadDepartmentChart(yearDropdown.value, chartTypeDropdown.value);
  });

  // Initial load
  loadDepartmentChart(currentYear, "doughnut");
  departmentSaleTitle.textContent = `Sales by Departments ${currentYear}`;
}
