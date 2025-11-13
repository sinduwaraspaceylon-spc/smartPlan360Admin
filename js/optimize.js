// Global flag to prevent multiple initializations
let demandFiltersInitialized = false;

// Flip function (Add / Cancel Button)
function toggleDemandForm() {
    const card = document.getElementById('demandCard');
    const btn = document.getElementById('addDemandBtn');
    const btnText = document.getElementById('btnText');
    const btnIcon = document.getElementById('btnIcon');
    const title = document.getElementById('add-demand-report-title');

    card.classList.toggle('flipped');

    if (card.classList.contains('flipped')) {
        btnText.textContent = 'Cancel';
        btn.classList.add('cancel');
        btn.style.backgroundColor = '#dc3545';
        title.textContent = 'Add Demand';
        btnIcon.innerHTML = `
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        `;

        // Initialize filters when flipped to form (only once)
        if (!demandFiltersInitialized) {
            initDemandFilters();
            demandFiltersInitialized = true;
        }
    } else {
        btnText.textContent = 'Add Demand';
        btn.classList.remove('cancel');
        btn.style.backgroundColor = '#04127a';
        title.textContent = 'Demand Plan';
        btnIcon.innerHTML = `
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
        `;
    }
}

// Demand filter handler with dropdown-style multi-select
function initDemandFilters() {
    const searchInput = document.getElementById('demandSearch');
    const searchResults = document.getElementById('searchResults');
    const departmentHeader = document.getElementById('departmentHeader');
    const departmentDropdown = document.getElementById('departmentCheckboxes');
    const categoryHeader = document.getElementById('categoryHeader');
    const categoryDropdown = document.getElementById('categoryCheckboxes');
    const productsGrid = document.getElementById('productsGrid');
    const productsLoading = document.getElementById('productsLoading');
    const productCount = document.getElementById('productCount');

    // If DOM not ready yet, retry
    if (!searchInput || !departmentHeader || !categoryHeader) {
        console.log("DOM elements not ready, retrying...");
        setTimeout(initDemandFilters, 300);
        return;
    }

    console.log("Initializing demand filters...");

    let selectedDepartments = [];
    let selectedCategories = [];
    let allDepartments = [];
    let allCategories = [];

    // Toggle dropdown functionality
    function setupDropdownToggle(header, dropdown) {
        // Remove any existing listeners to prevent duplicates
        const newHeader = header.cloneNode(true);
        header.parentNode.replaceChild(newHeader, header);
        
        newHeader.addEventListener('click', (e) => {
            e.stopPropagation();
            const isActive = dropdown.classList.contains('active');
            
            // Close all dropdowns first
            document.querySelectorAll('.multiselect-dropdown').forEach(dd => {
                dd.classList.remove('active');
            });
            document.querySelectorAll('.multiselect-header').forEach(h => {
                h.classList.remove('active');
            });
            
            // Toggle current dropdown
            if (!isActive) {
                dropdown.classList.add('active');
                newHeader.classList.add('active');
            }
        });
        
        return newHeader;
    }

    // Close dropdowns when clicking outside
    const closeDropdownsHandler = (e) => {
        if (!e.target.closest('.custom-multiselect')) {
            document.querySelectorAll('.multiselect-dropdown').forEach(dd => {
                dd.classList.remove('active');
            });
            document.querySelectorAll('.multiselect-header').forEach(h => {
                h.classList.remove('active');
            });
        }
    };
    
    // Remove existing listener if any
    document.removeEventListener('click', closeDropdownsHandler);
    document.addEventListener('click', closeDropdownsHandler);

    // Update header text based on selections
    function updateHeaderText(header, selections, allItems) {
        const textSpan = header.querySelector('.multiselect-text');
        
        if (!textSpan) return;
        
        if (selections.length === 0) {
            textSpan.textContent = header.id === 'departmentHeader' 
                ? 'Select Departments...' 
                : 'Select Categories...';
            textSpan.classList.remove('has-selection');
        } else if (selections.length === 1) {
            const selectedItem = allItems.find(item => item.id == selections[0]);
            textSpan.textContent = selectedItem ? selectedItem.name : `${selections.length} selected`;
            textSpan.classList.add('has-selection');
        } else {
            textSpan.textContent = `${selections.length} selected`;
            textSpan.classList.add('has-selection');
        }
    }

    // Load and display products based on filters
    function loadProducts() {
        // If no departments selected, show empty state
        if (selectedDepartments.length === 0) {
            productsGrid.innerHTML = `
                <div class="no-products">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 7h-9"></path>
                        <path d="M14 17H5"></path>
                        <circle cx="17" cy="17" r="3"></circle>
                        <circle cx="7" cy="7" r="3"></circle>
                    </svg>
                    <p>No products selected. Please select departments and categories.</p>
                </div>
            `;
            productCount.textContent = '0 products';
            return;
        }

        // Show loading
        productsLoading.style.display = 'flex';
        productsGrid.innerHTML = '';

        const departmentIds = selectedDepartments.join(',');
        const categoryIds = selectedCategories.join(',');

        let url = `testing/product_handler.php?action=get_products&department_ids=${departmentIds}`;
        if (categoryIds) {
            url += `&category_ids=${categoryIds}`;
        }
        url += '&limit=100';

        fetch(url)
            .then(res => res.json())
            .then(data => {
                productsLoading.style.display = 'none';

                if (!data || data.length === 0) {
                    productsGrid.innerHTML = `
                        <div class="no-products">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 7h-9"></path>
                                <path d="M14 17H5"></path>
                                <circle cx="17" cy="17" r="3"></circle>
                                <circle cx="7" cy="7" r="3"></circle>
                            </svg>
                            <p>No products found for the selected filters.</p>
                        </div>
                    `;
                    productCount.textContent = '0 products';
                    return;
                }

                // Update product count
                productCount.textContent = `${data.length} product${data.length !== 1 ? 's' : ''}`;

                // Display products as list
                productsGrid.innerHTML = data.map(product => `
                    <div class="product-list-item" data-product-id="${product.id}">
                        <div class="product-checkbox-wrapper">
                            <input type="checkbox" class="product-checkbox" value="${product.id}">
                        </div>
                        <div class="product-info">
                            <div class="product-main-info">
                                <span class="product-code">${product.product_code || product.new_product_code || 'N/A'}</span>
                                <span class="product-name">${product.product_name}</span>
                            </div>
                            <div class="product-secondary-info">
                                <span class="product-category">${product.category_name}</span>
                                <span class="separator">•</span>
                                <span class="product-department">${product.department_name}</span>
                            </div>
                        </div>
                    </div>
                `).join('');

                // Add click handlers for product list items
                document.querySelectorAll('.product-list-item').forEach(item => {
                    item.addEventListener('click', function(e) {
                        // Don't toggle if clicking on checkbox directly
                        if (e.target.classList.contains('product-checkbox')) {
                            return;
                        }
                        
                        const checkbox = this.querySelector('.product-checkbox');
                        checkbox.checked = !checkbox.checked;
                        this.classList.toggle('selected', checkbox.checked);
                    });
                });

                // Add change handlers for checkboxes
                document.querySelectorAll('.product-checkbox').forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        this.closest('.product-list-item').classList.toggle('selected', this.checked);
                    });
                });
            })
            .catch(err => {
                console.error('Error loading products:', err);
                productsLoading.style.display = 'none';
                productsGrid.innerHTML = `
                    <div class="no-products">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        <p>Error loading products. Please try again.</p>
                    </div>
                `;
                productCount.textContent = '0 products';
            });
    }

    // Setup dropdown toggles and get updated header references
    const updatedDeptHeader = setupDropdownToggle(departmentHeader, departmentDropdown);
    const updatedCatHeader = setupDropdownToggle(categoryHeader, categoryDropdown);

    // Load Departments as Checkboxes
    fetch('testing/product_handler.php?action=get_departments')
        .then(res => res.json())
        .then(data => {
            allDepartments = data.map(dep => ({ id: dep.id, name: dep.department_name }));
            
            // Add "Select All" option at the top
            departmentDropdown.innerHTML = `
                <label class="checkbox-label select-all-label">
                    <input type="checkbox" id="selectAllDept" class="select-all-checkbox">
                    Select All Departments
                </label>
                <div class="checkbox-divider"></div>
            ` + data.map(dep => `
                <label class="checkbox-label">
                    <input type="checkbox" class="dept-checkbox" value="${dep.id}" data-name="${dep.department_name}">
                    ${dep.department_name}
                </label>
            `).join('');

            // Handle "Select All Departments"
            const selectAllDept = document.getElementById('selectAllDept');
            selectAllDept.addEventListener('change', function() {
                const deptCheckboxes = document.querySelectorAll('.dept-checkbox');
                deptCheckboxes.forEach(cb => {
                    cb.checked = this.checked;
                });
                handleDepartmentChange();
            });

            // Add event listeners to department checkboxes
            document.querySelectorAll('.dept-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // Update "Select All" state
                    const allChecked = Array.from(document.querySelectorAll('.dept-checkbox'))
                        .every(cb => cb.checked);
                    selectAllDept.checked = allChecked;
                    
                    handleDepartmentChange();
                });
            });
        })
        .catch(err => console.error('Error loading departments:', err));

    // Handle Department Selection Change
    function handleDepartmentChange() {
        selectedDepartments = Array.from(document.querySelectorAll('.dept-checkbox:checked'))
            .map(cb => cb.value);

        console.log('Selected departments:', selectedDepartments);
        updateHeaderText(updatedDeptHeader, selectedDepartments, allDepartments);

        // Reset selected categories when departments change
        selectedCategories = [];
        updateHeaderText(updatedCatHeader, selectedCategories, []);

        if (selectedDepartments.length === 0) {
            categoryDropdown.innerHTML = '<div class="no-selection">Please select at least one department</div>';
            loadProducts(); // Clear products display
            return;
        }

        // Load categories for selected departments
        const departmentIds = selectedDepartments.join(',');
        fetch(`testing/product_handler.php?action=get_categories&department_ids=${departmentIds}`)
            .then(res => res.json())
            .then(data => {
                if (data.length === 0) {
                    categoryDropdown.innerHTML = '<div class="no-results">No categories found</div>';
                    loadProducts(); // Load products even without categories
                    return;
                }

                allCategories = data.map(cat => ({ id: cat.id, name: cat.category_name }));

                // Add "Select All" option at the top
                categoryDropdown.innerHTML = `
                    <label class="checkbox-label select-all-label">
                        <input type="checkbox" id="selectAllCat" class="select-all-checkbox">
                        Select All Categories
                    </label>
                    <div class="checkbox-divider"></div>
                ` + data.map(cat => `
                    <label class="checkbox-label">
                        <input type="checkbox" class="cat-checkbox" value="${cat.id}" data-name="${cat.category_name}">
                        ${cat.category_name}
                    </label>
                `).join('');

                // Handle "Select All Categories"
                const selectAllCat = document.getElementById('selectAllCat');
                selectAllCat.addEventListener('change', function() {
                    const catCheckboxes = document.querySelectorAll('.cat-checkbox');
                    catCheckboxes.forEach(cb => {
                        cb.checked = this.checked;
                    });
                    handleCategoryChange();
                });

                // Add event listeners to category checkboxes
                document.querySelectorAll('.cat-checkbox').forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        // Update "Select All" state
                        const allChecked = Array.from(document.querySelectorAll('.cat-checkbox'))
                            .every(cb => cb.checked);
                        selectAllCat.checked = allChecked;
                        
                        handleCategoryChange();
                    });
                });

                // Load products after categories are loaded
                loadProducts();
            })
            .catch(err => console.error('Error loading categories:', err));
    }

    // Handle Category Selection Change
    function handleCategoryChange() {
        selectedCategories = Array.from(document.querySelectorAll('.cat-checkbox:checked'))
            .map(cb => cb.value);
        
        console.log('Selected categories:', selectedCategories);
        updateHeaderText(updatedCatHeader, selectedCategories, allCategories);
        
        // Load products with updated filters
        loadProducts();
    }

    // Product Search
    function searchProducts() {
        const search = searchInput.value.trim();

        if (search.length < 2) {
            searchResults.style.display = 'none';
            return;
        }

        const departmentIds = selectedDepartments.join(',');
        const categoryIds = selectedCategories.join(',');

        let url = `testing/product_handler.php?action=search_products&search=${encodeURIComponent(search)}`;
        if (departmentIds) url += `&department_ids=${departmentIds}`;
        if (categoryIds) url += `&category_ids=${categoryIds}`;

        fetch(url)
            .then(res => res.json())
            .then(data => {
                if (!data.length) {
                    searchResults.innerHTML = '<div class="no-results">No results found</div>';
                    searchResults.style.display = 'block';
                    return;
                }

                searchResults.innerHTML = data.map(p => `
                    <div class="search-item" data-id="${p.id}">
                        <strong>${p.product_code || p.new_product_code}</strong> - ${p.product_name}
                    </div>
                `).join('');

                searchResults.style.display = 'block';
            })
            .catch(err => {
                console.error('Error searching products:', err);
                searchResults.innerHTML = '<div class="no-results">Error searching</div>';
                searchResults.style.display = 'block';
            });
    }

    if (searchInput) {
        searchInput.addEventListener('input', searchProducts);

        // Click on Search Result
        if (searchResults) {
            searchResults.addEventListener('click', e => {
                const item = e.target.closest('.search-item');
                if (!item) return;

                searchInput.value = item.textContent.trim();
                searchResults.style.display = 'none';
            });
        }
    }

    console.log("Demand filter initialized successfully");
}