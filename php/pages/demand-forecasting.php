<!-- Stylesheet link -->
<link rel="stylesheet" href="css/content_style.css">
<link rel="stylesheet" href="css/test_demand.css">

<!-- Sales and Forecast chart -->
    <div class="page-section-holder" id="forcast-chart">
        <h3>Sales Analyst  For Next 6 Months<span class="blinking-indicator"></span></h3>
            <canvas id="salesChart"></canvas>
    </div>

    <!-- Filter Sidebar Overlay -->
    <!-- <div class="filter-sidebar-overlay" id="filterSidebarOverlay"></div> -->

    <!-- Forecast report filter sidebar -->
    <!-- <aside class="filter-sidebar" id="filterSidebar">
        <div class="filter-sidebar-header">
            <h2>Filter by</h2>
            <button class="filter-close-btn" id="filterCloseBtn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div> -->

        <!-- <div class="filter-sidebar-content"> -->
           <!-- sidebar content display here -->
        <!-- </div>
            <div class="filter-sidebar-actions">
                <button class="filter-apply-btn" id="filterApplyBtn">Apply</button>
                <button class="filter-reset-btn" id="filterResetBtn">Reset</button>
            </div>
        </div>
    </aside> -->

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

    <!-- Flip card section -->
    <div class="flip-card-holder" id="flipCard">
        <!-- Front Side -->
        <div class="flip-card-front">
            <h1>Demand Plan</h1>
        </div>
        
        <!-- Back Side -->
        <div class="flip-card-back">
            <!-- Action buttons -->
            <div class="action-btn-holder">
                <button class="action-btn active" id="add-demand-btn">
                    <i class="fa-solid fa-plus"></i>Add
                </button>
                <button class="action-btn">
                    <i class="fa-solid fa-gear"></i>Edit
                </button>
                <button class="action-btn">
                    <i class="fa-solid fa-trash"></i>Delete
                </button>
                <button class="action-btn hidden" id="pick-demand-btn">
                    <i class="fa-solid fa-hand"></i></i>Pick
                </button>
                <button class="close-add-demand hidden" id="back-to-demands-btn">
                    <i class="fa-solid fa-arrow-left"></i>Back to Existing Demands
                </button>
            </div>
            
            <!-- Multi section holder -->
            <div class="multy-section-holder">
                <!-- Form header with title and filters -->
                <div class="multy-form-header">
                    <div class="form-title">
                        <h2 id="section-title">Existing Demands</h2>
                    </div>
                </div> <!-- Close multy-form-header -->

                <div class="demand-filter hidden" id="demand-filters">
                    <input type="search" class="filter-input" id="search-input" placeholder="Search product...">
                    <div class="demand-filter-dropdowns">
                        <!-- Single Select Brand -->
                        <select class="filter-input" id="brand-filter">
                            <option value="">Select Brand</option>
                        </select>
                        <!-- Multi-Select Department -->
                        <div class="custom-dropdown">
                            <button type="button" class="filter-input dropdown-toggle" id="department-toggle" disabled>
                                <span class="dropdown-text">Departments</span>
                                <span class="dropdown-arrow">▼</span>
                            </button>
                            <div class="dropdown-menu" id="department-menu">
                                <div class="dropdown-search">
                                    <input type="text" placeholder="Search departments..." class="dropdown-search-input">
                                </div>
                                <div class="dropdown-options" id="department-options">
                                    <div class="dropdown-message">Please select a brand first</div>
                                </div>
                            </div>
                        </div>
                        <!-- Multi-Select Category -->
                        <div class="custom-dropdown">
                            <button type="button" class="filter-input dropdown-toggle" id="category-toggle" disabled>
                                <span class="dropdown-text">Categories</span>
                                <span class="dropdown-arrow">▼</span>
                            </button>
                            <div class="dropdown-menu" id="category-menu">
                                <div class="dropdown-search">
                                    <input type="text" placeholder="Search categories..." class="dropdown-search-input">
                                </div>
                                <div class="dropdown-options" id="category-options">
                                    <div class="dropdown-message">Please select department(s) first</div>
                                </div>
                            </div>
                        </div>
                        <!-- Multi-Select Range -->
                        <div class="custom-dropdown">
                            <button type="button" class="filter-input dropdown-toggle" id="range-toggle" disabled>
                                <span class="dropdown-text">Ranges</span>
                                <span class="dropdown-arrow">▼</span>
                            </button>
                            <div class="dropdown-menu" id="range-menu">
                                <div class="dropdown-search">
                                    <input type="text" placeholder="Search ranges..." class="dropdown-search-input">
                                </div>
                                <div class="dropdown-options" id="range-options">
                                    <div class="dropdown-message">Please select category/categories first</div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- close demand filter dropdowns -->
                </div> <!-- Close demand-filters -->
            
                <!-- Section body - main content area -->
                <div class="section-body">
                    <!-- Existing Demands Section -->
                    <div class="container" id="existing-demands-section">
                        <div class="item-list" id="existing-demands-list">
                            <!-- Existing demand cards will be populated here dynamically -->
                        </div>
                    </div>
                    
                    <!-- Add Demand Section -->
                    <div class="demand-flip-container hidden" id="demand-flip-section">
                        <div class="add-demand-flip-front">
                            <p>Select demand options to add</p>
                        </div>
                        <div class="add-demand-flip-back">
                            <div class="demand-apply-section">
                                <input type="number" placeholder="Enter Demand %" id="demandInput">
                                <div class="demand-filter-dropdowns">
                                    <select class="month-filter-input" id="brand-filter">
                                        <option value="">Select Months</option>
                                        <option value="">12 Months</option>
                                        <option value="">6 Months</option>
                                        <option value="">3 Months</option>
                                    </select>
                                </div> <!-- close demand filter dropdown -->
                                <button class="demand-apply-btn" id="apply-demand-btn">Apply</button>
                            </div>
                            <div class="add-demand-content">
                                <!-- demand applied products are showing here -->
                            </div>
                        </div>  
                    </div> <!-- Close demand-flip-container -->
                </div> <!-- Close section-body -->
            </div> <!-- Close multy-section-holder -->
        </div> <!-- Close flip-card-back -->
    </div> <!-- Close flip-card-holder -->
</div> <!-- Close page-section-holder -->

<script>
    // DOM Elements
const brandFilter = document.getElementById("brand-filter");

// Multi Dropdown Elements
const deptToggle = document.getElementById("department-toggle");
const deptOptions = document.getElementById("department-options");

const catToggle = document.getElementById("category-toggle");
const catOptions = document.getElementById("category-options");

const rangeToggle = document.getElementById("range-toggle");
const rangeOptions = document.getElementById("range-options");

// Load brands on page loads
fetch("testing/product_handler.php?action=get_brands")
    .then(res => res.json())
    .then(data => {
        brandFilter.innerHTML = `<option value="">Select Brand</option>`;
        data.forEach(b => {
            brandFilter.innerHTML += `<option value="${b.id}">${b.brand_name}</option>`;
        });
    });


// Load departments when a brand is selected
brandFilter.addEventListener("change", () => {
    const brandId = brandFilter.value;

    // Reset all dropdowns
    deptToggle.disabled = true;
    catToggle.disabled = true;
    rangeToggle.disabled = true;

    deptOptions.innerHTML = "";
    catOptions.innerHTML = `<div class="dropdown-message">Please select department(s) first</div>`;
    rangeOptions.innerHTML = `<div class="dropdown-message">Please select category/categories first</div>`;

    if (!brandId) return;

    fetch(`testing/product_handler.php?action=get_departments_by_brand&brand_id=${brandId}`)
        .then(res => res.json())
        .then(data => {

            if (data.length === 0) {
                deptOptions.innerHTML = `<div class="dropdown-message">No departments found</div>`;
                return;
            }

            deptToggle.disabled = true;
            deptOptions.innerHTML = "";

            data.forEach(dep => {
                deptOptions.innerHTML += `
                    <label class="dropdown-item">
                        <input type="checkbox" value="${dep.id}" class="department-checkbox">
                        ${dep.department_name}
                    </label>
                `;
            });

            deptToggle.disabled = false;
        });
});


// Load categories when departments are selected (POST)
document.addEventListener("change", (e) => {
    if (!e.target.classList.contains("department-checkbox")) return;

    const selectedDepartments = [...document.querySelectorAll(".department-checkbox:checked")]
        .map(cb => cb.value);

    catToggle.disabled = selectedDepartments.length === 0;
    catOptions.innerHTML = "";

    if (selectedDepartments.length === 0) {
        catOptions.innerHTML = `<div class="dropdown-message">Please select department(s) first</div>`;
        return;
    }
// Prepare form data for POST request
    const formData = new FormData();
    selectedDepartments.forEach(id => formData.append("departments[]", id));

    fetch("testing/product_handler.php?action=get_categories_by_departments", {
        method: "POST",
        body: formData
    })
        .then(res => res.json())
        .then(data => {

            if (data.length === 0) {
                catOptions.innerHTML = `<div class="dropdown-message">No categories found</div>`;
                return;
            }

            data.forEach(cat => {
                catOptions.innerHTML += `
                    <label class="dropdown-item">
                        <input type="checkbox" value="${cat.id}" class="category-checkbox">
                        ${cat.category_name}
                    </label>
                `;
            });

        });
});


// Load ranges when categories are selected (POST)
document.addEventListener("change", (e) => {
    if (!e.target.classList.contains("category-checkbox")) return;

    const selectedCategories = [...document.querySelectorAll(".category-checkbox:checked")]
        .map(cb => cb.value);

    rangeToggle.disabled = selectedCategories.length === 0;
    rangeOptions.innerHTML = "";

    if (selectedCategories.length === 0) {
        rangeOptions.innerHTML = `<div class="dropdown-message">Please select category/categories first</div>`;
        return;
    }

    const formData = new FormData();
    selectedCategories.forEach(id => formData.append("categories[]", id));

    fetch("testing/product_handler.php?action=get_ranges_by_categories", {
        method: "POST",
        body: formData
    })
        .then(res => res.json())
        .then(data => {

            if (data.length === 0) {
                rangeOptions.innerHTML = `<div class="dropdown-message">No ranges found</div>`;
                return;
            }

            data.forEach(r => {
                rangeOptions.innerHTML += `
                    <label class="dropdown-item">
                        <input type="checkbox" value="${r.id}" class="range-checkbox">
                        ${r.range_name}
                    </label>
                `;
            });

        });
});


// Load dropdown open/close logic
document.querySelectorAll(".dropdown-toggle").forEach(btn => {
    btn.addEventListener("click", () => {
        btn.nextElementSibling.classList.toggle("show");
    });
});

// Close on click outside
document.addEventListener("click", (e) => {
    if (!e.target.closest(".custom-dropdown")) {
        document.querySelectorAll(".dropdown-menu").forEach(menu => menu.classList.remove("show"));
    }
});

</script>