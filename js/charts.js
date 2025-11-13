// Chart configuration constants
const CHART_COLORS = {
  actualSale: "#1f77b4",
  simpleMovement: "#ff7f0e",
  exponentialMovement: "#2ca02c",
  forecast: "#d62728",
  outlet: "rgba(54, 162, 235, 0.8)",
  bia: "rgba(75, 192, 192, 0.8)",
  online: "rgba(255, 99, 132, 0.8)",
  export: "rgba(255, 206, 86, 0.8)",
  hotels: "rgba(160, 43, 137, 0.8)",
};

const DEPARTMENT_COLORS = [
  "#FF5733",
  "#33FF57",
  "#3357FF",
  "#FF33A1",
  "#FF8C33",
  "#33FFF5",
  "#8D33FF",
  "#33FF8A",
  "#FF3333",
  "#33A1FF",
  "#A1FF33",
  "#FF33F6",
  "#FFBD33",
  "#33FFBD",
  "#BD33FF",
  "#FF3364",
  "#FFC300",
  "#581845",
  "#900C3F",
  "#DAF7A6",
];

const COMMON_OPTIONS = {
  responsive: true,
  scales: {
    y: {
      beginAtZero: true,
      title: { display: true, text: "Sales Amount (Rs)" },
    },
  },
  plugins: { legend: { position: "top" } },
};

// Chart instances cache
const chartInstances = {
  sales: null,
  salesBar: null,
  department: null,
};

// Create line dataset configuration
const createLineDataset = (label, data, color, isDashed = false) => ({
  label,
  data,
  borderColor: color,
  borderWidth: 2,
  borderDash: isDashed ? [5, 5] : [],
  pointRadius: 4,
  fill: false,
  tension: 0.3,
});

// Initialize sales forecast chart
const initSalesChart = (data) => {
  const ctx = document.getElementById("salesChart")?.getContext("2d");
  if (!ctx) return;

  // Destroy existing chart
  if (chartInstances.sales) {
    chartInstances.sales.destroy();
  }

  chartInstances.sales = new Chart(ctx, {
    type: "line",
    data: {
      labels: data.labels,
      datasets: [
        createLineDataset("Actual Sale", data.sales, CHART_COLORS.actualSale),
        createLineDataset(
          "Simple Movement",
          data.sma,
          CHART_COLORS.simpleMovement
        ),
        createLineDataset(
          "Exponential Movement",
          data.expo,
          CHART_COLORS.exponentialMovement
        ),
        createLineDataset(
          "Forecast",
          data.forecast,
          CHART_COLORS.forecast,
          true
        ),
      ],
    },
    options: {
      ...COMMON_OPTIONS,
      interaction: { mode: "index", intersect: false },
      scales: {
        ...COMMON_OPTIONS.scales,
        x: { title: { display: true, text: "Months" } },
      },
      plugins: {
        ...COMMON_OPTIONS.plugins,
        tooltip: { enabled: true },
      },
    },
  });
};

// Initialize sales by sources bar chart
const initSalesBarChart = (data) => {
  const ctx = document.getElementById("salesBarChart")?.getContext("2d");
  if (!ctx) return;

  // Destroy existing chart
  if (chartInstances.salesBar) {
    chartInstances.salesBar.destroy();
  }

  const sourceConfig = [
    { label: "Outlet", key: "outlet", color: CHART_COLORS.outlet },
    { label: "BIA", key: "bia", color: CHART_COLORS.bia },
    { label: "Online", key: "online", color: CHART_COLORS.online },
    { label: "Export", key: "export", color: CHART_COLORS.export },
    { label: "Hotels", key: "hotels", color: CHART_COLORS.hotels },
  ];

  chartInstances.salesBar = new Chart(ctx, {
    type: "bar",
    data: {
      labels: data.sources.labels,
      datasets: sourceConfig.map(({ label, key, color }) => ({
        label,
        data: data.sources[key],
        backgroundColor: color,
      })),
    },
    options: {
      ...COMMON_OPTIONS,
      scales: {
        ...COMMON_OPTIONS.scales,
        x: { title: { display: true, text: "Months" } },
      },
    },
  });
};

// Initialize department chart
const initDepartmentChart = (data, year, chartType) => {
  const ctx = document.getElementById("departmentChart")?.getContext("2d");
  if (!ctx) return;

  // Destroy existing chart
  if (chartInstances.department) {
    chartInstances.department.destroy();
  }

  const colorCount = data.departments.labels.length;
  const isBar = chartType === "bar";

  chartInstances.department = new Chart(ctx, {
    type: chartType,
    data: {
      labels: data.departments.labels,
      datasets: [
        {
          label: `Sales by Departments ${year}`,
          data: data.departments.sales,
          backgroundColor: DEPARTMENT_COLORS.slice(0, colorCount),
        },
      ],
    },
    options: {
      responsive: true,
      scales: isBar
        ? {
            y: {
              beginAtZero: true,
              title: { display: true, text: "Sales Amount (Rs)" },
            },
            x: { title: { display: true, text: "Departments" } },
          }
        : {},
      plugins: {
        legend: { position: chartType === "doughnut" ? "right" : "top" },
      },
    },
  });
};

// Main data loading function
async function loadChartData() {
  try {
    const response = await fetch("testing/chart_handler.php");

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();
    console.log("API Response:", data);

    // Initialize charts
    initSalesChart(data);
    initSalesBarChart(data);

    // Setup department chart event listener (only once)
    setupDepartmentChartListener();
  } catch (error) {
    console.error("Failed to load chart data:", error);
  }
}

// Setup department chart event listener
let departmentListenerAdded = false;

const setupDepartmentChartListener = () => {
  if (departmentListenerAdded) return;

  document.addEventListener("departmentChartDataLoaded", (event) => {
    const { data, year, chartType } = event.detail;
    initDepartmentChart(data, year, chartType);
  });

  departmentListenerAdded = true;
};

// Cleanup function (optional - call when needed)
const destroyAllCharts = () => {
  Object.values(chartInstances).forEach((chart) => {
    if (chart) chart.destroy();
  });
};

// Initialize
loadChartData();
