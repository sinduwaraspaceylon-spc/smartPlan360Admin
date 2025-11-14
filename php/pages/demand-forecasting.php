<!-- Stylesheet link -->
<link rel="stylesheet" href="css/content_style.css">
<link rel="stylesheet" href="css/test_demand.css">

<!-- Sales and Forecast chart -->
    <div class="page-section-holder" id="forcast-chart">
        <h3>Sales Analyst  For Next 6 Months<span class="blinking-indicator"></span></h3>
            <canvas id="salesChart"></canvas>
    </div>

    <!-- Filter Sidebar Overlay -->
    <div class="filter-sidebar-overlay" id="filterSidebarOverlay"></div>

    <!-- Forecast report filter sidebar -->
    <aside class="filter-sidebar" id="filterSidebar">
        <div class="filter-sidebar-header">
            <h2>Filter by</h2>
            <button class="filter-close-btn" id="filterCloseBtn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="filter-sidebar-content">
           <!-- sidebar content display here -->
        </div>
            <div class="filter-sidebar-actions">
                <button class="filter-apply-btn" id="filterApplyBtn">Apply</button>
                <button class="filter-reset-btn" id="filterResetBtn">Reset</button>
            </div>
        </div>
    </aside>

    <!-- Page Sections -->
    <div class="page-section-holder" id="forecast-report">
        <div class="section-header">
            <h3 id="report-title">Forecast Report 2025</h3>
            
            <!-- Filter Toggle Button (Inside Container) -->
            <button class="filter-toggle-btn-inline" id="filterToggleBtnInline">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                </svg>
                <span>Filters</span>
            </button>
        </div>
        <!-- Report Display Containor -->
        <div class="table-holder" id="forecast-report-section">

        </div>
        <!-- Report Download btn -->
    <div class="download-button-container">
        <button class="download-btn" id="downloadReportBtn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
            </svg>
            Download Report
        </button>
    </div>
</div>

<!-- Demand report section -->
    <div class="page-section-holder" id="demand-plan">
        <div class="section-header">
            <h3 id="demand-report-title">Demand Report 2025</h3>
            
            <!-- Filter Toggle Button (Inside Container) -->
            <button class="filter-toggle-btn-inline" id="demandFilterToggleBtnInline">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                </svg>
                <span>Filters</span>
            </button>
        </div>
        <!-- Demand Report Display Containor -->
        <div class="table-holder" id="demand-report-section">
            <!-- demand table content -->
        </div>
        
    <div class="download-button-container">
        <!-- Create new demand button -->
        <button class="download-btn" id="createDemandBtn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Create Demand
        </button>

        <!-- Report Download btn -->
        <button class="download-btn" id="downloadDemandReportBtn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
            </svg>
            Download Report
        </button>
    </div>
  </div>

    <!-- Demand plan section -->
    <div class="page-section-holder" id="forcast-chart">
        <div class="section-header">
            <h3 id="report-title">Demand Plan</h3>
            
            <!-- Create new demand button -->
        <button class="download-btn" id="createNewDemandBtn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Create Demand
        </button>
        </div>
        <!-- flip card section -->
        <div class="flip-card-holder" id="flipCard">
        <div class="flip-card-front">
            <h1>Final Demand</h1>
        </div>
        
        <div class="flip-card-back">
            <button class="back-btn" onclick="flipCard()">✕</button>
            
            <div class="action-btn-holder">
                <button class="action-btn active">Add Section</button>
                <button class="action-btn">Edit Section</button>
                <button class="action-btn">Delete Section</button>
                <button class="action-btn">Export Data</button>
            </div>
            
            <div class="multy-section-holder">
                <div class="multy-form-header">
                    <div class="form-title">
                        <h2>Nursery Sections</h2>
                        <span class="form-count">3 Sections</span>
                    </div>
                    <div class="demand-filter">
                        <input type="search" class="filter-input" placeholder="Search sections...">
                        <select class="filter-input">
                            <option>All Departments</option>
                            <option>Plant Care</option>
                            <option>Seeds & Bulbs</option>
                            <option>Tools & Equipment</option>
                        </select>
                        <select class="filter-input">
                            <option>All Categories</option>
                            <option>Indoor Plants</option>
                            <option>Outdoor Plants</option>
                            <option>Succulents</option>
                        </select>
                    </div>
                </div>
                
                <div class="section-body">
                    <div class="nursery-section">
                        <div class="nursery-header">
                            <h3 class="nursery-title">Indoor Plants Section</h3>
                            <span class="nursery-badge">Active</span>
                        </div>
                        <div class="nursery-content">
                            <div class="nursery-item">
                                <label>Section Name</label>
                                <input type="text" value="Indoor Plants" placeholder="Enter section name">
                            </div>
                            <div class="nursery-item">
                                <label>Department</label>
                                <select>
                                    <option>Plant Care</option>
                                    <option>Seeds & Bulbs</option>
                                </select>
                            </div>
                            <div class="nursery-item">
                                <label>Category</label>
                                <select>
                                    <option>Indoor Plants</option>
                                    <option>Outdoor Plants</option>
                                </select>
                            </div>
                            <div class="nursery-item">
                                <label>Capacity</label>
                                <input type="number" value="150" placeholder="Max plants">
                            </div>
                        </div>
                    </div>

                    <div class="nursery-section">
                        <div class="nursery-header">
                            <h3 class="nursery-title">Succulent Garden</h3>
                            <span class="nursery-badge">Active</span>
                        </div>
                        <div class="nursery-content">
                            <div class="nursery-item">
                                <label>Section Name</label>
                                <input type="text" value="Succulent Garden" placeholder="Enter section name">
                            </div>
                            <div class="nursery-item">
                                <label>Department</label>
                                <select>
                                    <option>Plant Care</option>
                                    <option>Seeds & Bulbs</option>
                                </select>
                            </div>
                            <div class="nursery-item">
                                <label>Category</label>
                                <select>
                                    <option>Succulents</option>
                                    <option>Cacti</option>
                                </select>
                            </div>
                            <div class="nursery-item">
                                <label>Capacity</label>
                                <input type="number" value="200" placeholder="Max plants">
                            </div>
                        </div>
                    </div>

                    <div class="nursery-section">
                        <div class="nursery-header">
                            <h3 class="nursery-title">Outdoor Garden Area</h3>
                            <span class="nursery-badge">Active</span>
                        </div>
                        <div class="nursery-content">
                            <div class="nursery-item">
                                <label>Section Name</label>
                                <input type="text" value="Outdoor Garden" placeholder="Enter section name">
                            </div>
                            <div class="nursery-item">
                                <label>Department</label>
                                <select>
                                    <option>Tools & Equipment</option>
                                    <option>Seeds & Bulbs</option>
                                </select>
                            </div>
                            <div class="nursery-item">
                                <label>Category</label>
                                <select>
                                    <option>Outdoor Plants</option>
                                    <option>Trees</option>
                                </select>
                            </div>
                            <div class="nursery-item">
                                <label>Capacity</label>
                                <input type="number" value="300" placeholder="Max plants">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- filter templates -->
    <!-- forecast table filters -->
     <template id="forecastFiltersTemplate">
  <div class="filter-group">
    <label for="yearFilter">Year</label>
    <select id="yearFilter" class="filter-select">
      <option value="">All Years</option>
    </select>
  </div>

  <div class="filter-group">
    <label for="periodFilter">Time Period</label>
    <select id="periodFilter" class="filter-select">
      <option value="6">6 Months</option>
      <option value="12">12 Months</option>
    </select>
  </div>

  <div class="filter-group">
    <label for="statusFilter">Status</label>
    <select id="statusFilter" class="filter-select">
      <option value="">All Status</option>
      <option value="exceeded">Exceeded</option>
      <option value="on track">On Track</option>
      <option value="below target">Below Target</option>
      <option value="critical">Critical</option>
    </select>
  </div>
</template>

<!-- demand table filters -->
<template id="demandFiltersTemplate">
  <div class="filter-group">
    <label for="demandRankFilter">Rank</label>
    <select id="demandRankFilter" class="filter-select">
      <option value="top">Product</option>
      <option value="low">Range</option>
      <option value="top">Category</option>
      <option value="low">Department</option>
    </select>
  </div>

  <div class="filter-group">
    <label for="yearFilter">Year</label>
    <select id="yearFilter" class="filter-select">
      <option value="">All Years</option>
      <option value="2024">2024</option>
      <option value="2025">2025</option>
    </select>
  </div>

  <div class="filter-group">
    <label for="monthFilter">Month</label>
    <select id="monthFilter" class="filter-select">
      <option value="">All Months</option>
      <option value="1">January</option>
      <option value="2">February</option>
      <option value="3">March</option>
      <option value="4">April</option>
      <option value="5">May</option>
      <option value="6">June</option>
      <option value="7">July</option>
      <option value="8">August</option>
      <option value="9">September</option>
      <option value="10">October</option>
      <option value="11">November</option>
      <option value="12">December</option>
    </select>
  </div>
</template>