<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demand Plan - Flip Card</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .page-section-holder {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .section-header h3 {
            font-size: 1.75rem;
            color: #111827;
        }

        .download-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background-color: #04127a;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .download-btn:hover {
            background-color: #030d5a;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(4, 18, 122, 0.3);
        }

        .download-btn.cancel {
            background-color: #dc3545 !important;
        }

        .download-btn.cancel:hover {
            background-color: #c82333 !important;
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
        }

        /* Flip card container */
        .flip-card-holder {
            position: relative;
            width: 100%;
            min-height: 500px;
            perspective: 1500px;
            transform-style: preserve-3d;
            transition: transform 0.7s ease-in-out;
            transform: rotateY(0deg);
        }

        .flip-card-holder.flipped {
            transform: rotateY(180deg);
        }

        /* Front and back faces */
        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            min-height: 500px;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            border-radius: 12px;
        }

        /* Front face */
        .flip-card-front {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            transform: rotateY(0deg);
        }

        .flip-card-front h1 {
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Back face */
        .flip-card-back {
            transform: rotateY(180deg);
            background: white;
            padding: 32px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        /* Back button */
        .back-btn {
            position: absolute;
            top: 16px;
            right: 16px;
            background: #f3f4f6;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #6b7280;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            transition: all 0.2s;
            z-index: 10;
        }

        .back-btn:hover {
            background-color: #e5e7eb;
            color: #111827;
        }

        /* Action buttons */
        .action-btn-holder {
            display: flex;
            gap: 12px;
            margin-bottom: 32px;
            flex-wrap: wrap;
            padding-top: 24px;
        }

        .action-btn {
            padding: 10px 20px;
            border: 1px solid #e5e7eb;
            background: white;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 14px;
            font-weight: 500;
        }

        .action-btn:hover {
            background-color: #f9fafb;
            border-color: #d1d5db;
        }

        .action-btn.active {
            background-color: #04127a;
            color: white;
            border-color: #04127a;
        }

        /* Multi-section styles */
        .multy-form-header {
            margin-bottom: 24px;
        }

        .form-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .form-title h2 {
            margin: 0;
            font-size: 1.5rem;
            color: #111827;
        }

        .form-count {
            background-color: #e5e7eb;
            padding: 6px 14px;
            border-radius: 16px;
            font-size: 0.875rem;
            color: #374151;
            font-weight: 500;
        }

        .demand-filter {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .filter-input {
            padding: 10px 14px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            min-width: 180px;
            transition: border-color 0.2s;
        }

        .filter-input:focus {
            outline: none;
            border-color: #04127a;
        }

        /* Nursery sections */
        .section-body {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .nursery-section {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            background: #f9fafb;
            transition: all 0.2s;
        }

        .nursery-section:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .nursery-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .nursery-title {
            margin: 0;
            font-size: 1.125rem;
            color: #111827;
        }

        .nursery-badge {
            background-color: #10b981;
            color: white;
            padding: 6px 14px;
            border-radius: 16px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .nursery-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .nursery-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .nursery-item label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
        }

        .nursery-item input,
        .nursery-item select {
            padding: 10px 12px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            background: white;
            transition: border-color 0.2s;
        }

        .nursery-item input:focus,
        .nursery-item select:focus {
            outline: none;
            border-color: #04127a;
        }
    </style>
</head>
<body>
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
            <div class="flip-card-front">
                <h1>Final Demand</h1>
            </div>
            
            <div class="flip-card-back">
                <button class="back-btn" id="backBtn">✕</button>
                
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

    <script>
        // Global flag to prevent multiple initializations
        let demandFiltersInitialized = false;

        // Flip function (Create Demand / Cancel Button)
        function toggleDemandForm() {
            const card = document.getElementById('flipCard');
            const btn = document.getElementById('createNewDemandBtn');
            const title = document.getElementById('report-title');

            // Check if card element exists
            if (!card || !btn || !title) {
                console.error('Required elements not found');
                return;
            }

            card.classList.toggle('flipped');

            if (card.classList.contains('flipped')) {
                // Change button to Cancel
                btn.innerHTML = `
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    Cancel
                `;
                btn.classList.add('cancel');
                title.textContent = 'Add Demand';

                // Initialize filters when flipped to form (only once)
                if (!demandFiltersInitialized) {
                    // Call your filter initialization function here if needed
                    // initDemandFilters();
                    demandFiltersInitialized = true;
                    console.log('Demand filters initialized');
                }
            } else {
                // Change button back to Create Demand
                btn.innerHTML = `
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Create Demand
                `;
                btn.classList.remove('cancel');
                title.textContent = 'Demand Plan';
            }
        }

        // Initialize event listeners when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            // Add click event to the Create Demand button
            const createBtn = document.getElementById('createNewDemandBtn');
            if (createBtn) {
                createBtn.addEventListener('click', toggleDemandForm);
                console.log('Create Demand button listener attached');
            } else {
                console.error('createNewDemandBtn not found');
            }

            // Also handle the back button (✕) on the card
            const backBtn = document.getElementById('backBtn');
            if (backBtn) {
                backBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    toggleDemandForm();
                });
                console.log('Back button listener attached');
            }
        });
    </script>
</body>
</html>