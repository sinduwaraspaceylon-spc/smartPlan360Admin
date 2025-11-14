<link rel="stylesheet" href="css/content_style.css">
<link rel="stylesheet" href="css/product_development.css">

<div class="page-section-holder" id="forcast-chart">
    <h3>Secondary Packaging Information (SPI)</h3>

    <!-- search and main button seaction-->
    <div class="sub-header">
            <input type="text" id="productSearch" name="search" placeholder="Search Product Code or Sap Code..." autocomplete="off">
        <div class="button-section">
            <button class="sub-header-btn btn-submit">
                <i class="fas fa-check"></i>
                    Submit
            </button>
            <button class="sub-header-btn btn-clear">
                <i class="fas fa-times"></i>
                    Clear
            </button>
            <button class="sub-header-btn btn-check" title="Select Products">
                <i class="fas fa-check"></i>
                    
            </button>
            <button class="sub-header-btn btn-copy" title="Duplicate Specs">
                <i class="fas fa-copy"></i>
                    
            </button>
        </div>
    </div>
    
    <!-- Form Section -->
    <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3>Box Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <div class="column-grid">
                    <!-- SAP Code -->
                    <div class="form-group" style="position: relative;">
                        <label class="Label-tags label-with-tooltip" for="sapCode">
                            <span>Sap Code</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="sapCode" name="sapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="boxForm" />
                    </div>

                    <!-- Item Description -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="pckDes">
                            <span>Item Description</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span>
                            </span>
                        </label>
                        <input type="text" id="pckDes" name="pckDes" required placeholder="Fetched item description"/>
                    </div>

                    <!-- Promotion/Project -->
                    <div class="form-group span-two-rows">
                        <label for="promotion_project">Promotion/Project</label>
                        <input type="text" id="promotion_project" name="promotion_project"/>
                    </div>

                    <!-- Order Quantity -->
                    <div class="form-group">
                        <label for="order_quantity">Order Quantity</label>
                        <select id="order_quantity" name="order_quantity" oninput="calculateTotal()">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_order_quantity" name="input_order_quantity" placeholder="Enter new order quantity" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Standard Size -->
                    <div class="form-group">
                        <label for="size_standard">Standard Size</label>
                        <div class="size_standard_row" style="display: flex; gap: 10px">
                            <input type="number" id="size_standard_width" name="size_standard_width" placeholder="(W)"/>
                            <span style="align-self: center">X</span>
                            <input type="number" id="size_standard_height" name="size_standard_height" placeholder="(H)"/>
                            <span style="align-self: center">X</span>
                            <input type="number" id="size_standard_base" name="size_standard_base" placeholder="(B)"/>
                        </div>
                    </div>

                    <!-- Open Size -->
                    <div class="form-group">
                        <label for="size_open">Open Size</label>
                        <div class="size_open_row" style="display: flex; gap: 10px">
                            <input type="number" id="size_open_width" name="size_open_width" placeholder="(W)"/>
                            <span style="align-self: center">X</span>
                            <input type="number" id="size_open_height" name="size_open_height" placeholder="(H)"/>
                        </div>
                    </div>

                    <!-- UOM -->
                    <div class="form-group">
                        <label for="capacity_unit1">UOM</label>
                        <select id="capacity_unit1" name="capacity_unit1">
                            <option value="" disabled selected>Unit</option>
                            <option value="mm">mm</option>
                            <option value="cm">cm</option>
                            <option value="inches">inches</option>
                            <option value="m">m</option>
                            <option value="yards">yards</option>
                        </select>
                    </div>

                    <!-- Packing Content -->
                    <div class="form-group">
                        <label for="box_material">Packing Content</label>
                        <select id="box_material" name="box_material">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_box_material" class="input_box_material" placeholder="Enter new packing content" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Outer & Inner Plies Information -->
                    <div class="form-group">
                        <label for="box_additional_material">Outer & Inner Plies Information</label>
                        <select id="box_additional_material" name="box_additional_material">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_box_additional_material" name="input_box_additional_material" placeholder="Enter new outer & inner plies" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Print Style -->
                    <div class="form-group">
                        <label for="box_print_method">Print Style</label>
                        <select id="box_print_method" name="box_print_method">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_box_print_method" name="input_box_print_method" placeholder="Enter new print style" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Print Type Outer -->
                    <div class="form-group">
                        <label for="box_print_outer">Print Type Outer</label>
                        <select id="box_print_outer" name="box_print_outer">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input id="input_box_print_outer" name="input_box_print_outer" placeholder="Enter new print outer" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Print Type Inner -->
                    <div class="form-group">
                        <label for="box_print_inner">Print Type Inner</label>
                        <select id="box_print_inner" name="box_print_inner">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_box_print_inner" name="input_box_print_inner" placeholder="Enter new print inner" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Laminated Finish -->
                    <div class="form-group">
                        <label for="box_lamination">Laminated Finish</label>
                        <select type="text" id="box_lamination" name="box_lamination">
                            <option value="" selected disabled>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_box_lamination" name="input_box_lamination" placeholder="Enter new laminated finish" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Box Flaps -->
                    <div class="form-group">
                        <label for="box_flaps">Box Flaps</label>
                        <select type="text" id="box_flaps" name="box_flaps">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_box_flaps" name="input_box_flaps" placeholder="Enter new box flaps" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- UV Varnish -->
                    <div class="form-group">
                        <label for="box_uv_varnish">UV Varnish</label>
                        <input type="text" id="box_uv_varnish" name="box_uv_varnish"/>
                    </div>

                    <!-- Hot Stamp -->
                    <div class="form-group">
                        <label for="box_hot_stamp">Hot Stamp</label>
                        <input type="text" id="box_hot_stamp" name="box_hot_stamp"/>
                    </div>

                    <!-- Dummy/Sample Approved Date -->
                    <div class="form-group">
                        <label for="dummy_approved_date">Dummy/Sample Approved Date</label>
                        <input type="date" id="dummy_approved_date" name="dummy_approved_date"/>
                    </div>

                    <!-- Cutter -->
                    <div class="form-group">
                        <label for="box_cutter">Cutter</label>
                        <select type="text" id="box_cutter" name="box_cutter">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_box_cutter" name="input_box_cutter" placeholder="Enter new cutter" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Artwork(s) -->
                    <div class="form-group">
                        <label for="box_artworks">Artwork(s)</label>
                        <select id="box_artworks" name="box_artworks">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_box_artworks" name="input_box_artworks" placeholder="Enter new artworks" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Delivery Location -->
                    <div class="form-group">
                        <label for="delivery_location">Delivery Location</label>
                        <select id="delivery_location" name="delivery_location">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_delivery_location" name="input_delivery_location" placeholder="Enter new delivery location" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Delivery Date(s) -->
                    <div class="form-group">
                        <label for="delivery_dates">Delivery Date(s)</label>
                        <div class="select-with-button">
                            <button type="button" class="add-btn" onclick="openDateModal()">Select Dates +</button>
                            <button type="button" class="see-btn" onclick="showResult()">View Results</button>
                        </div>
                        <div id="hiddenDates"></div>
                        <div id="deliveryPreview" style="margin-top:10px; font-size:14px; color:#333;"></div>
                    </div>

                    <!-- Unit Price -->
                    <div class="form-group">
                        <label for="unit_price">Unit Price</label>
                        <div class="unit-price-row">
                            <input type="number" id="enter_unit_price1" name="enter_unit_price1" oninput="calculateTotal()" placeholder="Enter Unit Price"/>
                        </div>
                        <div class="unit-price-row1">
                            <span>Total Rs. </span>
                            <span id="total_price" name="total_price">0</span>
                            <input type="hidden" id="total_price_input" name="total_price" value="0"/>
                            <span> + </span>
                            <div class="select-group">
                                <select id="unit_price1" name="unit_price1" onchange="toggleInput('unit_price1', 'input1_unit_price1')">
                                    <option value="">SSCL</option>
                                    <option value="create_new">Create New</option>
                                </select>
                                <input type="text" id="input1_unit_price1" name="input1_unit_price1" placeholder="New SSCL" style="display: none; margin-top: 10px"/>
                            </div>
                            <span> + </span>
                            <div class="select-group">
                                <select id="unit_price2" name="unit_price2" onchange="toggleInput('unit_price2', 'input2_unit_price2')">
                                    <option value="">VAT</option>
                                    <option value="create_new">Create New</option>
                                </select>
                                <input type="text" id="input2_unit_price2" name="input2_unit_price2" placeholder="New VAT" style="display: none; margin-top: 10px"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3>Insert Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <p>Insert specification form content goes here...</p>
            </div>
        </div>
    </div>

     <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3>Insert Holder Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <p>Insert Holder specification form content goes here...</p>
            </div>
        </div>
    </div>

    <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3>Insert Holder Platform Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <p>Insert Holder Platform specification form content goes here...</p>
            </div>
        </div>
    </div>

    <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3>Insert Partition Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <p>Insert Partition specification form content goes here...</p>
            </div>
        </div>
    </div>

    <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3>Lid Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <p>Lid specification form content goes here...</p>
            </div>
        </div>
    </div>

    <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3>Base Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <p>Base specification form content goes here...</p>
            </div>
        </div>
    </div>

    <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3>Platform Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <p>Platform specification form content goes here...</p>
            </div>
        </div>
    </div>

    <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3>Sleeve Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <p>Sleeve specification form content goes here...</p>
            </div>
        </div>
    </div>
</div>

<script>
        function toggleSection(header) {
            const content = header.nextElementSibling;
            const icon = header.querySelector('.toggle-icon');
            
            // Toggle the expanded class
            content.classList.toggle('expanded');
            
            // Rotate the icon
            icon.classList.toggle('rotate');
        }
    </script>