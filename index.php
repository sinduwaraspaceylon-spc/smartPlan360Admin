<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="page-title">Dashboard - Spa Ceylon Smart 360 Admin</title>
    <!-- stylesheet -->
    <link rel="stylesheet" href="css/admin_style.css">
    
    <!-- CDN Link -->
     <?php include "components/CDN.php"?>
</head>
<body>
    <div class="app-container">
      <!-- Sidebar -->
      <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
          <h1 class="side-heading">SMART 360 ADMIN</h1>
          <button id="sidebarHide" class="hide-sidebar">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
        <nav class="sidebar-nav">
          <!-- Core Modules -->
          <div class="nav-section">
            <h2 class="nav-title">Core Modules</h2>
            <ul>
              <li>
                <a href="#" class="nav-link active" data-page="dashboard" data-title="Dashboard">
                  <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
              </li>
              <li>
                <a href="#" class="nav-link" data-page="data-management" data-title="Data Management">
                  <i class="fas fa-database"></i> Data Management
                </a>
              </li>
              <li>
                <a href="#" class="nav-link" data-page="demand-forecasting" data-title="Dermand Forecasting">
                  <i class="fas fa-chart-line"></i>Demand Forecasting
                </a>
              </li>
              <li>
                <a href="#" class="nav-link" data-page="production-planning" data-title="Production Planning">
                  <i class="fas fa-calendar-alt"></i> Production Planning
                </a>
              </li>
              <li>
                <a href="#" class="nav-link" data-page="product-development" data-title="Product Development">
                  <i class="fa-solid fa-list-ol"></i> Product Development
                </a>
              </li>
            </ul>
          </div>

          <!-- Reports -->
          <div class="nav-section">
            <h2 class="nav-title">Picking Workbench</h2>
            <ul>
              <li>
                <a href="#" class="nav-link" data-page="order-picking" data-title="Order Picking">
                  <i class="fas fa-boxes"></i> Order Picking
                </a>
              </li>
              <li>
                <a href="#" class="nav-link" data-page="capacity-utilization" data-title="Capacity Utilization">
                  <i class="fas fa-clock"></i> Capacity Utilization
                </a>
              </li>
              <li>
                <a href="#" class="nav-link" data-page="alerts" data-title="Alerts">
                  <i class="fas fa-bell"></i> Alerts
                </a>
              </li>
            </ul>
          </div>

          <!-- Settings -->
          <div class="nav-section">
            <h2 class="nav-title">Settings</h2>
            <ul>
              <li>
                <a href="#" class="nav-link" data-page="user-management" data-title="User Management">
                  <i class="fas fa-users-cog"></i> User Management
                </a>
              </li>
              <li>
                <a href="#" class="nav-link" data-page="system-settings" data-title="System Settings">
                  <i class="fas fa-cog"></i> System Settings
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </aside>

      <!-- Back to top -->
      <button id="backToTopBtn" class="back-to-top"><i class="fa-solid fa-circle-arrow-up"></i></button>
      <!-- Filter template loader -->
       <div id="filter-templates-container" style="display:none"></div>
      
      <!-- Main Content -->
      <main class="main-content">
      <!-- Header -->
        <?php include "components/admin_header.php"?>
        <?php include "components/filter_sidebar.php"?>

        <div class="content" id="content-loading">
          <!-- Dynamic Content Area -->
          <div id="content-area" class="module-container active">
            <!-- Content will be loaded here dynamically -->
          </div>
        </div>
      </main>
    </div>

    <!-- JavaScript Files-------------------------------------------------------------->

    <!-- Admin frontend js -->
    <script src="js/admin_frontend.js"></script>
    <!-- Dynamic content js -->
    <script src="js/dynamic_content.js"></script>
    <!-- filter sidebar js -->
    <script src="js/filter-sidebar.js"></script>
    <!-- Charts js -->
    <script src="js/charts.js"></script>
    <!-- Demand plan section handler js -->
    <script src="js/demand_plan_section_handler.js"></script>
    <!-- Department chart handler js -->
    <script src="js/department_chart_handler.js"></script>
    <!-- <script src="js/optimize.js"></script> -->

    <!-- Filter template loader testing -->
    <script>
      fetch("components/filter_templates.html")
        .then(res => res.text())
        .then(html => {
        document
        .getElementById("filter-templates-container")
        .innerHTML = html;
      });
  </script>

</body>
</html>