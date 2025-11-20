<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demand Management</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        .multy-section-holder {
            max-width: 1400px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .multy-form-header {
            padding: 24px 32px;
            border-bottom: 1px solid #e0e0e0;
            background: #fafafa;
        }

        .form-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-title h2 {
            font-size: 24px;
            color: #333;
        }

        .header-actions {
            display: flex;
            gap: 12px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #4CAF50;
            color: white;
        }

        .btn-primary:hover {
            background: #45a049;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .demand-filter {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .filter-input {
            padding: 10px 16px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            min-width: 200px;
            outline: none;
        }

        .filter-input:focus {
            border-color: #4CAF50;
        }

        .section-body {
            padding: 32px;
        }

        .container {
            width: 100%;
        }

        .tabs {
            display: flex;
            gap: 8px;
            border-bottom: 2px solid #e0e0e0;
            margin-bottom: 24px;
        }

        .tab {
            padding: 12px 24px;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            margin-bottom: -2px;
            font-weight: 500;
            color: #666;
            transition: all 0.3s;
        }

        .tab:hover {
            color: #4CAF50;
        }

        .tab.active {
            color: #4CAF50;
            border-bottom-color: #4CAF50;
        }

        .content {
            min-height: 400px;
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
        }

        .item-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 16px;
        }

        .item-card {
            display: flex;
            align-items: center;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background: white;
            transition: all 0.3s;
        }

        .item-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-color: #4CAF50;
        }

        .item-icon {
            font-size: 32px;
            margin-right: 16px;
        }

        .item-info {
            flex: 1;
        }

        .item-info h4 {
            font-size: 16px;
            color: #333;
            margin-bottom: 4px;
        }

        .item-info p {
            font-size: 13px;
            color: #666;
        }

        .item-action {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .item-price {
            font-size: 18px;
            font-weight: 600;
            color: #4CAF50;
        }

        .item-btn {
            padding: 8px 16px;
            border: 1px solid #4CAF50;
            background: white;
            color: #4CAF50;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .item-btn:hover {
            background: #4CAF50;
            color: white;
        }

        .badge {
            padding: 4px 12px;
            background: #e8f5e9;
            color: #4CAF50;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }

        .demand-card {
            padding: 24px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background: white;
            transition: all 0.3s;
        }

        .demand-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .demand-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 16px;
        }

        .demand-title h3 {
            font-size: 18px;
            color: #333;
            margin-bottom: 4px;
        }

        .demand-date {
            font-size: 13px;
            color: #999;
        }

        .demand-status {
            padding: 6px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-active {
            background: #e8f5e9;
            color: #4CAF50;
        }

        .status-pending {
            background: #fff3e0;
            color: #ff9800;
        }

        .demand-details {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 16px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
        }

        .detail-label {
            font-size: 12px;
            color: #666;
            margin-bottom: 4px;
        }

        .detail-value {
            font-size: 16px;
            font-weight: 600;
            color: #333;
        }

        .demand-actions {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="multy-section-holder">
        <!-- Header -->
        <div class="multy-form-header">
            <div class="form-title">
                <h2 id="header-title">Existing Demands</h2>
                <div class="header-actions">
                    <button class="btn btn-secondary hidden" id="back-btn">← Back to Existing Demands</button>
                    <button class="btn btn-primary" id="action-btn">+ Add Demand</button>
                </div>
            </div>
            <div class="demand-filter hidden" id="filter-section">
                <input type="search" class="filter-input" placeholder="Search product...">
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
        
        <!-- Body -->
        <div class="section-body">
            <!-- Existing Demands Section -->
            <div class="container" id="existing-demands-section">
                <div class="item-list">
                    <div class="demand-card">
                        <div class="demand-header">
                            <div class="demand-title">
                                <h3>Spring Garden Collection</h3>
                                <span class="demand-date">Created: Nov 15, 2025</span>
                            </div>
                            <span class="demand-status status-active">Active</span>
                        </div>
                        <div class="demand-details">
                            <div class="detail-item">
                                <span class="detail-label">Total Products</span>
                                <span class="detail-value">45</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Departments</span>
                                <span class="detail-value">3</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Est. Value</span>
                                <span class="detail-value">$12,450</span>
                            </div>
                        </div>
                        <div class="demand-actions">
                            <button class="item-btn">View Details</button>
                            <button class="item-btn">Edit</button>
                        </div>
                    </div>

                    <div class="demand-card">
                        <div class="demand-header">
                            <div class="demand-title">
                                <h3>Indoor Plant Essentials</h3>
                                <span class="demand-date">Created: Nov 10, 2025</span>
                            </div>
                            <span class="demand-status status-pending">Pending</span>
                        </div>
                        <div class="demand-details">
                            <div class="detail-item">
                                <span class="detail-label">Total Products</span>
                                <span class="detail-value">28</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Departments</span>
                                <span class="detail-value">2</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Est. Value</span>
                                <span class="detail-value">$8,320</span>
                            </div>
                        </div>
                        <div class="demand-actions">
                            <button class="item-btn">View Details</button>
                            <button class="item-btn">Edit</button>
                        </div>
                    </div>

                    <div class="demand-card">
                        <div class="demand-header">
                            <div class="demand-title">
                                <h3>Summer Sale Inventory</h3>
                                <span class="demand-date">Created: Nov 8, 2025</span>
                            </div>
                            <span class="demand-status status-active">Active</span>
                        </div>
                        <div class="demand-details">
                            <div class="detail-item">
                                <span class="detail-label">Total Products</span>
                                <span class="detail-value">62</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Departments</span>
                                <span class="detail-value">5</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Est. Value</span>
                                <span class="detail-value">$18,900</span>
                            </div>
                        </div>
                        <div class="demand-actions">
                            <button class="item-btn">View Details</button>
                            <button class="item-btn">Edit</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Demand Section -->
            <div class="container hidden" id="add-demand-section">
                <div class="tabs">
                    <div class="tab active" data-tab="products">Products</div>
                    <div class="tab" data-tab="departments">Departments</div>
                    <div class="tab" data-tab="categories">Categories</div>
                </div>

                <div class="content">
                    <div class="section products active" id="products">
                        <div class="item-list">
                            <div class="item-card">
                                <div class="item-info">
                                    <h4>Lavender</h4>
                                    <p>Special lavender perfume</p>
                                </div>
                                <div class="item-action">
                                    <span class="item-price">$1,299</span>
                                    <button class="item-btn">Add</button>
                                </div>
                            </div>
                            <div class="item-card">
                                <div class="item-info">
                                    <h4>Rose Plant</h4>
                                    <p>Beautiful red roses</p>
                                </div>
                                <div class="item-action">
                                    <span class="item-price">$899</span>
                                    <button class="item-btn">Add</button>
                                </div>
                            </div>
                            <div class="item-card">
                                <div class="item-info">
                                    <h4>Succulent Mix</h4>
                                    <p>Assorted succulents pack</p>
                                </div>
                                <div class="item-action">
                                    <span class="item-price">$599</span>
                                    <button class="item-btn">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section departments" id="departments">
                        <div class="item-list">
                            <div class="item-card">
                                <div class="item-icon">🌱</div>
                                <div class="item-info">
                                    <h4>Plant Care</h4>
                                    <p>Everything for healthy plants • 342 products</p>
                                </div>
                                <div class="item-action">
                                    <span class="badge">8 Categories</span>
                                    <button class="item-btn">Add All</button>
                                </div>
                            </div>
                            <div class="item-card">
                                <div class="item-icon">🌾</div>
                                <div class="item-info">
                                    <h4>Seeds & Bulbs</h4>
                                    <p>Fresh seeds and bulbs • 156 products</p>
                                </div>
                                <div class="item-action">
                                    <span class="badge">5 Categories</span>
                                    <button class="item-btn">Add All</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section categories" id="categories">
                        <div class="item-list">
                            <div class="item-card">
                                <div class="item-info">
                                    <h4>Indoor Plants</h4>
                                    <p>Perfect for home decoration • 89 products</p>
                                </div>
                                <div class="item-action">
                                    <button class="item-btn">Add All</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tab switching functionality
        const tabs = document.querySelectorAll('.tab');
        const sections = document.querySelectorAll('.section');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const targetTab = tab.getAttribute('data-tab');
                
                tabs.forEach(t => t.classList.remove('active'));
                sections.forEach(s => s.classList.remove('active'));
                
                tab.classList.add('active');
                document.getElementById(targetTab).classList.add('active');
            });
        });

        // Section switching functionality
        const actionBtn = document.getElementById('action-btn');
        const backBtn = document.getElementById('back-btn');
        const headerTitle = document.getElementById('header-title');
        const filterSection = document.getElementById('filter-section');
        const existingDemandsSection = document.getElementById('existing-demands-section');
        const addDemandSection = document.getElementById('add-demand-section');

        actionBtn.addEventListener('click', () => {
            if (actionBtn.textContent.includes('Add Demand')) {
                // Switch to Add Demand view
                existingDemandsSection.classList.add('hidden');
                addDemandSection.classList.remove('hidden');
                filterSection.classList.remove('hidden');
                backBtn.classList.remove('hidden');
                headerTitle.textContent = 'Add Demand';
                actionBtn.textContent = 'Submit Demand';
                actionBtn.classList.remove('btn-primary');
                actionBtn.classList.add('btn-success');
            } else {
                // Submit the demand
                alert('Demand submitted successfully!');
                // Reset to existing demands view
                showExistingDemands();
            }
        });

        backBtn.addEventListener('click', () => {
            showExistingDemands();
        });

        function showExistingDemands() {
            existingDemandsSection.classList.remove('hidden');
            addDemandSection.classList.add('hidden');
            filterSection.classList.add('hidden');
            backBtn.classList.add('hidden');
            headerTitle.textContent = 'Existing Demands';
            actionBtn.textContent = '+ Add Demand';
            actionBtn.classList.add('btn-primary');
            actionBtn.classList.remove('btn-success');
        }
    </script>
</body>
</html>