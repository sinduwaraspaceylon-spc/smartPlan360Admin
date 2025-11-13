const ctx = document.getElementById("salesChart").getContext("2d");
const salesChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: [], // years
    datasets: [
      {
        label: "Total Quantity Sold",
        data: [],
        backgroundColor: [
          "rgb(255, 99, 132)",
          "rgb(54, 162, 235)",
          "rgb(255, 205, 86)",
        ],
        borderColor: "rgba(54, 162, 235, 1)",
        borderWidth: 1,
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: { display: true, position: "top" },
    },
    scales: { y: { beginAtZero: true, ticks: { precision: 0 } } },
  },
});
