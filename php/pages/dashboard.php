<link rel="stylesheet" href="css/content_style.css">
<!-- Dashboard Cards -->
            <div class="dashboard-grid" id="accurecy-menu">
              <div class="dashboard-card">
                <i class="fa-solid fa-arrow-up-from-ground-water"></i>
                <h3>Supply Accuracy</h3>
                <div class="value">94%</div>
                <div class="label">6% Increesed</div>
              </div>
              <div class="dashboard-card">
                <i class="fa-solid fa-people-group"></i>
                <h3>Team Accuracy</h3>
                <div class="value">88%</div>
                <div class="label">4% Increesed</div>
              </div>
              <div class="dashboard-card">
                <i class="fas fa-chart-line"></i>
                <h3>Forcast Accuracy</h3>
                <div class="value">90%</div>
                <div class="label">8% Increesed</div>
              </div>
              <div class="dashboard-card">
                <i class="fa-solid fa-truck-field"></i>
                <h3>On-Time Delivery</h3>
                <div class="value">98%</div>
                <div class="label">5% Increesed</div>
              </div>
              <div class="dashboard-card">
                <i class="fas fa-clock"></i>
                <h3>Capacity Usage</h3>
                <div class="value">87%</div>
                <div class="label">3% Dicreesed</div>
              </div>
            </div>

<!-- Dashboard Sections -->
      <div class="page-section-holder" id="gross_sale">
        <h3>Gross Sale</h3>
        <canvas id="salesBarChart"></canvas>
      </div>
<!-- Sales by department -->
<div class="page-section-holder" id="departments-chart">
  <div class="section-header">
    <h3 id="department-chart-title"></h3>

    <!-- Year Dropdown -->
    <select id="yearDropdown" class="year-dropdown"></select>

    <!-- Chart filter -->
    <select id="chartTypeDropdown" class="chart-TypeDropdown">
      <option value="doughnut" selected>Doughnut</option>
      <option value="bar">Bar</option>
    </select>
  </div>

  <canvas id="departmentChart"></canvas>
</div>

<!-- Trent section -->
      <div class="page-section-holder" id="trend">
        <h3>Trend</h3>
      </div>