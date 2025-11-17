<link rel="stylesheet" href="css/content_style.css">
<link rel="stylesheet" href="css/product_development.css">

<div class="page-section-holder" id="forcast-chart">
    <h3>Secondary Packaging Information (SPI)</h3>

    <!-- search and main button seaction-->
    <div class="sub-header">
            <input type="text" id="productSearch" name="search" placeholder="Search Product Code or Sap Code..." autocomplete="off">
        <div class="button-section">
            <button class="sub-header-btn submit" id="btn-submit">
                <i class="fas fa-check"></i>
                    Submit
            </button>
            <button class="sub-header-btn clear" id="btn-clear">
                <i class="fas fa-times"></i>
                    Clear
            </button>
            <button class="sub-header-btn check" id="btn-check" title="Select Products">
                <i class="fas fa-check"></i>
                    
            </button>
            <button class="sub-header-btn copy" id="btn-copy" title="Duplicate Specs">
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
                                <!-- <span class="tooltiptext">Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span> -->
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
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        <input type="text" id="pckDes" name="pckDes" required placeholder="Fetched item description"/>
                    </div>

                    <!-- Promotion/Project -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="promotion_project">
                            <span>Promotion/Project</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        
                        <input type="text" id="promotion_project" name="promotion_project"/>
                    </div>

                    <!-- Standard Size -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="size_standard">
                            <span>Standard Size</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
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
                        <label class="Label-tags label-with-tooltip" for="size_open">
                            <span>Open Size</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        <div class="size_open_row" style="display: flex; gap: 10px">
                            <input type="number" id="size_open_width" name="size_open_width" placeholder="(W)"/>
                            <span style="align-self: center">X</span>
                            <input type="number" id="size_open_height" name="size_open_height" placeholder="(H)"/>
                        </div>
                    </div>

                    <!-- UOM -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="capacity_unit1">
                            <span>Unit of Measure</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
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
                        <label class="Label-tags label-with-tooltip" for="box_material">
                            <span>Packing Content</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        <select id="box_material" name="box_material">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_box_material" class="input_box_material" placeholder="Enter new packing content" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Outer & Inner Plies Information -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="box_additional_material">
                            <span>Outer & Inner Plies Information</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        <select id="box_additional_material" name="box_additional_material">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_box_additional_material" name="input_box_additional_material" placeholder="Enter new outer & inner plies" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Print Style -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="box_print_method">
                            <span>Print Style</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        <select id="box_print_method" name="box_print_method">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_box_print_method" name="input_box_print_method" placeholder="Enter new print style" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Print Type Outer -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="box_print_outer">
                            <span>Print Type Outer</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        <select id="box_print_outer" name="box_print_outer">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input id="input_box_print_outer" name="input_box_print_outer" placeholder="Enter new print outer" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Print Type Inner -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="box_print_inner">
                            <span>Print Type Inner</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        <select id="box_print_inner" name="box_print_inner">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_box_print_inner" name="input_box_print_inner" placeholder="Enter new print inner" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Laminated Finish -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="box_lamination">
                            <span>Laminated Finish</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        <select type="text" id="box_lamination" name="box_lamination">
                            <option value="" selected disabled>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_box_lamination" name="input_box_lamination" placeholder="Enter new laminated finish" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Box Flaps -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="box_flaps">
                            <span>Box Flaps</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        <select type="text" id="box_flaps" name="box_flaps">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_box_flaps" name="input_box_flaps" placeholder="Enter new box flaps" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- UV Varnish -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="box_uv_varnish">
                            <span>UV Varnish</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        <input type="text" id="box_uv_varnish" name="box_uv_varnish"/>
                    </div>

                    <!-- Hot Stamp -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="box_hot_stamp">
                            <span>Hot Stamp</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        <input type="text" id="box_hot_stamp" name="box_hot_stamp"/>
                    </div>

                    <!-- Dummy/Sample Approved Date -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="dummy_approved_date">
                            <span>Dummy/Sample Approved Date</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        <input type="date" id="dummy_approved_date" name="dummy_approved_date"/>
                    </div>

                    <!-- Cutter -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="box_cutter">
                            <span>Cutter</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        <select type="text" id="box_cutter" name="box_cutter">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_box_cutter" name="input_box_cutter" placeholder="Enter new cutter" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Artwork(s) -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="box_artworks">
                            <span>Artwork(s)</span>
                             <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        <select id="box_artworks" name="box_artworks">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_box_artworks" name="input_box_artworks" placeholder="Enter new artworks" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Delivery Location -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="delivery_location">
                            <span>Delivery Location</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        <select id="delivery_location" name="delivery_location">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_delivery_location" name="input_delivery_location" placeholder="Enter new delivery location" style="display: none; margin-top: 10px"/>
                    </div>

                    <!-- Delivery Date(s) -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="delivery_dates">
                            <span>Delivery Date(s)</span>
                            <span class="tooltip"> 
                                <i class="fa-regular fa-circle-question"></i>
                                <!-- <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span> -->
                            </span>
                        </label>
                        <div class="select-with-button">
                            <button type="button" class="form-btn" id="add-btn" onclick="openDateModal()">Select Dates <i class="fa-regular fa-calendar-plus"></i></button>
                            <button type="button" class="form-btn" id="see-btn" onclick="showResult()">View Results <i class="fa-solid fa-check"></i></button>
                        </div>
                        <div id="hiddenDates"></div>
                        <div id="deliveryPreview" style="margin-top:10px; font-size:14px; color:#333;"></div>
                    </div>

                    
<!-- ✅ INSERT PRODUCT IMAGES HERE -->
<!-- Product Images -->
<div class="form-group full-width">
    <label class="Label-tags label-with-tooltip">
        <span>Product Images</span>
        <span class="tooltip">
            <i class="fa-regular fa-circle-question"></i>
        </span>
    </label>
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