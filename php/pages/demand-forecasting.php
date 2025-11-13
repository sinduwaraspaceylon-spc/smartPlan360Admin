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
<div class="page-section-holder" id="forecast-report">
    <div class="section-header">
        <h3 id="add-demand-report-title">Demand Plan</h3>
        
        <!-- Add Demand / Cancel Button -->
        <button class="download-btn" id="addDemandBtn" onclick="toggleDemandForm()">
            <svg id="btnIcon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            <span id="btnText">Add Demand</span>
        </button>
    </div>
    
    <div class="section-holder-1">
        <div class="section-holder-2" id="demandCard">
            <!-- Front side - Demand Report -->
            <div class="demand-card-face demand-card-front">
                <div class="table-holder" id="forecast-report-section">
                    <!-- Your existing demand report table/content goes here -->
                </div>
            </div>
            
            <!-- Back side - Add Demand Form -->
            <div class="demand-card-face demand-card-back">

            <!-- Option buttons (Add/Delete/Edit) -->
    <div class="filter-actions">
        <button type="button" class="btn-action" id="addBtn">
            <i class="fa-solid fa-plus"></i> Add
        </button>
        <button type="button" class="btn-action" id="editBtn">
            <i class="fa-solid fa-pencil"></i> Edit
        </button>
        <button type="button" class="btn-action" id="deleteBtn">
            <i class="fa-solid fa-xmark"></i> Delete
        </button>
    </div>
<!-- Dual Purpose Section -->
<div class="dual-purpose-section">
    <!-- Existing Forms Section (Default View) -->
    <div id="existingFormsSection" class="existing-forms-section">
        <div class="section-header">
            <h4>Existing Demands</h4>
            <div class="forms-info">
                <span id="formCount">0 demands</span>
            </div>
        </div>
        
        <div id="formsGrid" class="forms-grid">
            <div class="no-forms">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="12" y1="18" x2="12" y2="12"></line>
                    <line x1="9" y1="15" x2="15" y2="15"></line>
                </svg>
                <p>No existing demands found</p>
            </div>
        </div>
        
        <!-- Loading indicator for forms -->
        <div id="formsLoading" class="loading-indicator" style="display: none;">
            <div class="spinner"></div>
            <p>Loading demands...</p>
        </div>
    </div>

    <!-- Product Display Section (Hidden by default, shown when Add is clicked) -->
    <div id="productDisplaySection" class="products-display-section" style="display: none;">
        <div class="section-header">
            
            <!-- Filter Section Header -->
                <div class="filter-section">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="demandSearch">Search Products</label>
                            <input type="text" id="demandSearch" name="search" placeholder="Search By Code or Name..." autocomplete="off">
                            <!-- Search Results Dropdown -->
                        <div id="searchResults" class="search-results"></div>
                    </div>

                    <!-- Option dropdowns -->
                    <div class="form-group">
                        <label for="department">Department</label>
                            <div class="custom-multiselect">
                                <div class="multiselect-header" id="departmentHeader">
                                <span class="multiselect-text">Select Departments...</span>
                                <span class="multiselect-arrow">▼</span>
                            </div>
                        <div class="multiselect-dropdown" id="departmentCheckboxes">
                    <!-- Checkboxes will be loaded here -->
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <div class="custom-multiselect">
                <div class="multiselect-header" id="categoryHeader">
                    <span class="multiselect-text">Select Categories...</span>
                    <span class="multiselect-arrow">▼</span>
                </div>
                <div class="multiselect-dropdown" id="categoryCheckboxes">
                    <div class="no-selection">Please select at least one department</div>
                </div>
            </div>
        </div>
    </div>
</div>
            <h4>Available Products</h4>
            <div class="header-actions">
                <button type="button" class="btn-back" id="backToFormsBtn">
                    <span>←</span> Back to Demands
                </button>
                <div class="products-info">
                    <span id="productCount">0 products</span>
                </div>
            </div>
        </div>
        
        <div id="productsGrid" class="products-grid">
            <div class="no-products">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 7h-9"></path>
                    <path d="M14 17H5"></path>
                    <circle cx="17" cy="17" r="3"></circle>
                    <circle cx="7" cy="7" r="3"></circle>
                </svg>
                <p>No products selected. Please select products from filters above</p>
            </div>
        </div>
        
        <!-- Loading indicator for products -->
        <div id="productsLoading" class="loading-indicator" style="display: none;">
            <div class="spinner"></div>
            <p>Loading products...</p>
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

<script>
    // Get elements
const addBtn = document.getElementById('addBtn');
const editBtn = document.getElementById('editBtn');
const deleteBtn = document.getElementById('deleteBtn');
const backToFormsBtn = document.getElementById('backToFormsBtn');
const existingFormsSection = document.getElementById('existingFormsSection');
const productDisplaySection = document.getElementById('productDisplaySection');

// Add button - Switch to product display
addBtn.addEventListener('click', function() {
    existingFormsSection.style.display = 'none';
    productDisplaySection.style.display = 'block';
    console.log('Switched to product display view');
    
    // You can load products here
    // loadProducts();
});

// Back button - Return to existing forms
backToFormsBtn.addEventListener('click', function() {
    productDisplaySection.style.display = 'none';
    existingFormsSection.style.display = 'block';
    console.log('Switched back to forms view');
});

// Edit button - Load selected form for editing
editBtn.addEventListener('click', function() {
    console.log('Edit button clicked');
    // Add your edit logic here
    // For example: check if a form is selected, then load it
});

// Delete button - Delete selected form
deleteBtn.addEventListener('click', function() {
    console.log('Delete button clicked');
    // Add your delete logic here
    // For example: confirm deletion and remove the form
});

// Function to load existing forms (call this on page load)
function loadExistingForms() {
    const formsGrid = document.getElementById('formsGrid');
    const formsLoading = document.getElementById('formsLoading');
    const formCount = document.getElementById('formCount');
    
    // Show loading
    formsLoading.style.display = 'flex';
    
    // Simulate loading forms (replace with your actual AJAX call)
    setTimeout(() => {
        // Example: Replace this with your actual data
        const forms = [
            { id: 1, title: 'Form 1', date: '2025-01-15', items: 5 },
            { id: 2, title: 'Form 2', date: '2025-01-10', items: 3 }
        ];
        
        if (forms.length > 0) {
            formsGrid.innerHTML = forms.map(form => `
                <div class="form-card" data-form-id="${form.id}">
                    <div class="form-card-header">
                        <h5 class="form-card-title">${form.title}</h5>
                        <span class="form-card-date">${form.date}</span>
                    </div>
                    <div class="form-card-info">Items: ${form.items}</div>
                </div>
            `).join('');
            
            formCount.textContent = `${forms.length} form${forms.length !== 1 ? 's' : ''}`;
        }
        
        // Hide loading
        formsLoading.style.display = 'none';
    }, 1000);
}

// Load forms on page load
document.addEventListener('DOMContentLoaded', function() {
    loadExistingForms();
});
</script>