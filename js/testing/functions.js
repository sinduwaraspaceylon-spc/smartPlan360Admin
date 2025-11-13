// Fetch yearly totals when page loads
async function loadSalesData() {
  try {
    const res = await fetch("get_sales.php");
    const data = await res.json();

    salesChart.data.labels = data.map((r) => r.year);
    salesChart.data.datasets[0].data = data.map((r) => r.total_quantity);
    salesChart.update();
  } catch (err) {
    console.error("Error loading sales data:", err);
  }
}
