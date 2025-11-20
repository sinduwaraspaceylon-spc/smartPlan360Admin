<link rel="stylesheet" href="css/content_style.css">
<link rel="stylesheet" href="css/product_development.css">

<div class="page-section-holder" id="forcast-chart">
    <h3 class="page-section-header">Secondary Packaging Information (SPI)</h3>

    <!-- search and main button seaction-->
    <div class="sub-header">
            <input type="text" id="productSearch" name="search" placeholder="Search Product Code or Sap Code..." autocomplete="off">
        <div class="button-section">
            <button class="sub-header-btn submit" id="btn-submit" title="Form Submit">
                <i class="fas fa-paper-plane"></i>             
            </button>
            <button class="sub-header-btn clear" id="btn-clear" title="Form Clear">
                <i class="fas fa-eraser"></i>          
            </button>
            <button class="sub-header-btn check" id="btn-check" title="Select Products">
                <i class="fa-solid fa-list-check"></i>                    
            </button>
            <button class="sub-header-btn copy" id="btn-copy" title="Duplicate Specs">
                <i class="fas fa-copy"></i>
            </button>
        </div>
    </div>
    
    <!------------------------------------------------------------ Form Section ---------------------------------------------------------------------->
    <!-------------------- Box Specification ------------------->
    <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Box Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <div class="column-grid">
                    <!-- SAP Code - BOX -->
                    <div class="form-group" >
                        <label class="Label-tags label-with-tooltip" for="sapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">
                                    Unique SAP code associated with the product. This code is used for inventory and tracking purposes.
                                </span>
                            </span>
                        </label>
                        <input type="text" id="sapCode" name="sapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results">                                                           </div>
                        <input type="hidden" id="formCategory" value="boxForm" />
                    </div>

                    <!-- Item Description - BOX -->
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

                    <!-- Promotion/Project - BOX -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="boxPromoProject">
                            <span>Promotion/Project</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        
                        <input type="text" id="boxPromoProject" name="boxPromoProject"/>
                    </div>

                    <!-- Standard Size - BOX -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="boxStandard">
                            <span>Standard Size</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_standard_row">
                            <input type="number" id="boxStdWidth" name="boxStdWidth" placeholder="(W)"/>
                            <span>X</span>
                            <input type="number" id="boxStdHeight" name="boxStdHeight" placeholder="(H)"/>
                            <span>X</span>
                            <input type="number" id="boxStdBase" name="boxStdBase" placeholder="(B)"/>
                        </div>
                    </div>

                    <!-- Open Size - BOX -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="boxOpen">
                            <span>Open Size</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_open_row">
                            <input type="number" id="boxOpnWidth" name="boxOpnWidth" placeholder="(W)"/>
                            <span>X</span>
                            <input type="number" id="boxOpnHeight" name="boxOpnHeight" placeholder="(H)"/>
                        </div>
                    </div>

                    <!-- Unit of Measure - BOX -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="boxUom">
                            <span>Unit of Measure</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="boxUom" name="boxUom">
                            <option value="" disabled selected>Unit</option>
                            <option value="mm">mm</option>
                            <option value="cm">cm</option>
                            <option value="inches">inches</option>
                            <option value="m">m</option>
                            <option value="yards">yards</option>
                        </select>
                    </div>

                    <!-- Packing Content - BOX-->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="boxPacContent">
                            <span>Packing Content</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="boxPacContent" name="boxPacContent">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBoxPacContent" class="inputBoxPacContent" placeholder="Enter new packing content"/>
                    </div>

                    <!-- Outer & Inner Plies Information - BOX -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="boxOutInnInformation">
                            <span>Outer & Inner Plies Information</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="boxOutInnInformation" name="boxOutInnInformation">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBoxOutInnInformation" name="inputBoxOutInnInformation" placeholder="Enter new outer & inner plies"/>
                    </div>

                    <!-- Print Style - BOX -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="boxPrintStyle">
                            <span>Print Style</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="boxPrintStyle" name="boxPrintStyle">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBoxPrintStyle" name="inputBoxPrintStyle" placeholder="Enter new print style"/>
                    </div>

                    <!-- Print Type Outer - BOX-->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="boxPrintOuter">
                            <span>Print Type Outer</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="boxPrintOuter" name="boxPrintOuter">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBoxPrintOuter" name="inputBoxPrintOuter" placeholder="Enter new print outer" />
                    </div>

                    <!-- Print Type Inner - BOX -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="boxPrintInner">
                            <span>Print Type Inner</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="boxPrintInner" name="boxPrintInner">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBoxPrintInner" name="inputBoxPrintInner" placeholder="Enter new print inner"/>
                    </div>

                    <!-- Laminated Finish - BOX -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="boxLamination">
                            <span>Laminated Finish</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select type="text" id="boxLamination" name="boxLamination">
                            <option value="" selected disabled>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBoxLamination" name="inputBoxLamination" placeholder="Enter new laminated finish" />
                    </div>

                    <!-- Box Flaps - BOX -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="boxFlaps">
                            <span>Box Flaps</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select type="text" id="boxFlaps" name="boxFlaps">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBoxFlaps" name="inputBoxFlaps" placeholder="Enter new box flaps"/>
                    </div>

                    <!-- UV Varnish - BOX -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="boxUvVarnish">
                            <span>UV Varnish</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <input type="text" id="boxUvVarnish" name="boxUvVarnish"/>
                    </div>

                    <!-- Hot Stamp - BOX -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="boxHotStamp">
                            <span>Hot Stamp</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <input type="text" id="boxHotStamp" name="boxHotStamp"/>
                    </div>

                    <!-- Dummy/Sample Approved Date - BOX -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="boxDummyApprovedDate">
                            <span>Dummy/Sample Approved Date</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <input type="date" id="boxDummyApprovedDate" name="boxDummyApprovedDate"/>
                    </div>

                    <!-- Cutter - BOX -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="boxCutter">
                            <span>Cutter</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select type="text" id="boxCutter" name="boxCutter">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBoxCutter" name="inputBoxCutter" placeholder="Enter new cutter"/>
                    </div>

                    <!-- Artwork(s) - BOX -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="boxArtworks">
                            <span>Artwork(s)</span>
                             <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="boxArtworks" name="boxArtworks">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBoxArtworks" name="inputBoxArtworks" placeholder="Enter new artworks"/>
                    </div>

                    <!-- Delivery Location - BOX-->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="boxDeliveryLocation">
                            <span>Delivery Location</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="boxDeliveryLocation" name="boxDeliveryLocation">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBoxDeliveryLocation" name="inputBoxDeliveryLocation" placeholder="Enter new delivery location"/>
                    </div>

                    <!-- Images - BOX -->
                    <div class="form-group full-width">
                        <span><h4>Box Visual</h4></span>
                    </div>

                    <div class="form-group full-width image-grid-container">
                        <div class="image-grid-four-columns">
                            <!-- Image 1 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Front View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_1" name="product_image_1" accept="image/*" onchange="previewImage(event,'preview1')">
                                <!-- <img id="preview1" class="img-preview"> -->
                            </div>

                            <!-- Image 2 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Rear View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_2" name="product_image_2" accept="image/*" onchange="previewImage(event,'preview2')">
                                <!-- <img id="preview2" class="img-preview"> -->
                            </div>

                            <!-- Image 3 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Side View 1
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_3" name="product_image_3" accept="image/*" onchange="previewImage(event,'preview3')">
                                <!-- <img id="preview3" class="img-preview"> -->
                            </div>

                            <!-- Image 4 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Side View 2
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_4" name="product_image_4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-------------------- Insert Specification ------------------->
    <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Insert Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <div class="column-grid">
                    <!-- SAP Code - INSERT -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="sapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext"> Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="sapCode" name="sapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="insertForm" />
                    </div>

                    <!-- Name - INSERT -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="pckDes">
                            <span>Item Description</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Detailed item description. Include key features or specifications to ensure clarity in identification</span>
                            </span>
                        </label>
                        <input type="text" id="pckDes" name="pckDes" required placeholder="Fetched item description"/>
                    </div>

                    <!-- Size Standard - INSERT -->
                    <div class="form-group">
                        <label for="insStdSize">Standard Size</label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="insSizeStdWidth" name="insSizeStdWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="insSizeStdHeight" name="insSizeStdHeight" placeholder="(H)"/>
                                <span>X</span>
                                <input type="number" id="insSizeStdBase" name="insSizeStdBase" placeholder="(B)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Size Open - INSERT -->
                    <div class="form-group">
                        <label for="insert_size">Open Size</label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="insSizeOpnWidth" name="insSizeOpnWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="insSizeOpnHeight" name="insSizeOpnHeight" placeholder="(H)"/>
                            </div>
                        </div>
                        </div>

                    <!-- Unit of Measure - INSERT-->
                    <div class="form-group">
                        <label for="uom">Unit of Measure</label>
                        <select id="uom" name="uom" >
                            <option value="" disabled selected>Unit</option>
                            <option value="mm">mm</option>
                            <option value="cm">cm</option>
                            <option value="inches">inches</option>
                            <option value="m">m</option>
                            <option value="yards">yards</option>
                        </select>
                    </div>

                    <!-- Material - INSERT -->
                    <div class="form-group">
                        <label for="insMaterial">Packing Content</label>
                        <select type="text" id="insMaterial" name="insMaterial">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsMaterial" name="inputInsMaterial" placeholder="Enter new Paxcking Content"/>
                    </div>

                    <!-- Print Outer - INSERT -->
                    <div class="form-group">
                        <label for="insPrintOuter">Print Type Outer</label>
                        <select id="insPrintOuter" name="insPrintOuter">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsPrintOuter" name="inputInsPrintOuter" placeholder="Enter new Print Outer"/>
                    </div>

                    <!-- Print Inner - INSERT -->
                    <div class="form-group">
                        <label for="insPrintInner">Print Type Inner</label>
                        <select id="insPrintInner" name="insPrintInner">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsPrintInner" name="inputInsPrintInner" placeholder="Enter new Print Inner"/>
                    </div>

                    <!-- Images - INSERT-->
                    <div class="form-group full-width">
                        <span><h4>Insert Visual</h4></span>
                    </div>

                    <div class="form-group full-width image-grid-container">
                        <div class="image-grid-four-columns">
                            <!-- Image 1 -->
                            <div class="form-group">
                                <label class="Label-tags label-with-tooltip">Front View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_1" name="product_image_1" accept="image/*" onchange="previewImage(event,'preview1')">
                                <!-- <img id="preview1" class="img-preview"> -->
                            </div>

                            <!-- Image 2 -->
                            <div class="form-group">
                                <label class="Label-tags label-with-tooltip">Rear View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_2" name="product_image_2" accept="image/*" onchange="previewImage(event,'preview2')">
                                <!-- <img id="preview2" class="img-preview"> -->
                            </div>

                            <!-- Image 3 -->
                            <div class="form-group">
                                <label class="Label-tags label-with-tooltip">Side View 1
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_3" name="product_image_3" accept="image/*" onchange="previewImage(event,'preview3')">
                                <!-- <img id="preview3" class="img-preview"> -->
                            </div>

                            <!-- Image 4 -->
                            <div class="form-group">
                                <label class="Label-tags label-with-tooltip">Side View 2
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_4" name="product_image_4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-------------------- Insert Holder Specification ------------------->
     <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Insert Holder Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <div class="column-grid">
                    <!-- SAP Code - INSERT HOLDER -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="sapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="sapCode" name="sapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="insertHolderForm" />
                    </div>

                    <!-- Name - INSERT HOLDER -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="pckDes">
                        <span>Item Description</span>
                            <span class="tooltip">
                            <i class="fa-etch fa-regular fa-circle-question"></i>
                            <span class="tooltiptext"
                                >Detailed item description. Include key features or specifications to ensure clarity in identification
                            </span>
                            </span>
                    </label>
                    <input type="text" id="pckDes" name="pckDes" required placeholder="Fetched item description"/>
                    </div>
                    
                    <!-- Standard Size - INSERT HOLDER -->
                    <div class="form-group">
                        <label for="insert_holder_size_standard">Standard Size</label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="insHoldSizeStdWidth" name="insHoldSizeStdWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="insHoldSizeStdHeight" name="insHoldSizeStdHeight" placeholder="(H)"/>
                                <span>X</span>
                                <input type="number" id="insHoldSizeStdBase" name="insHoldSizeStdBase" placeholder="(B)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Open Size - INSERT HOLDER -->
                    <div class="form-group">
                        <label for="insert_holder_size_standard">Open Size</label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="insHoldSizeOpnWidth" name="insHoldSizeOpnWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="insHoldSizeOpnHeight" name="insHoldSizeOpnHeight" placeholder="(H)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Unit of Measure - INSERT HOLDER -->
                    <div class="form-group">
                        <label for="insHoldUom">Unit of Measure</label>
                        <select id="insHoldUom" name="insHoldUom">
                            <option value="" disabled selected>Unit</option>
                            <option value="mm">mm</option>
                            <option value="cm">cm</option>
                            <option value="inches">inches</option>
                            <option value="m">m</option>
                            <option value="yards">yards</option>
                        </select>
                    </div>

                    <!-- Material - INSERT HOLDER -->
                    <div class="form-group">
                        <label for="insHoldMaterial">Packing Content</label>
                        <select id="insHoldMaterial" name="insHoldMaterial">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsHoldMaterial" name="inputInsHoldMaterial" placeholder="Enter new packing content"/>
                    </div>

                    <!-- Print (Outer) - INSERT HOLDER -->

                    <div class="form-group">
                        <label for="insHoldPrintOuter">Print Type Outer </label>
                        <select id="insHoldPrintOuter" name="insHoldPrintOuter">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsHoldPrintOuter" name="inputInsHoldPrintOuter" placeholder="Enter new print outer"/>
                    </div>

                    <!-- Print (Inner) - INSERT HOLDER  -->

                    <div class="form-group">
                        <label for="insHoldPrintInner">Print Type Inner </label>
                        <select id="insHoldPrintInner" name="insHoldPrintInner">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsHoldPrintInner" name="inputInsHoldPrintInner" placeholder="Enter new print inner"/>
                    </div>

                    <!-- UV Varnish - INSERT HOLDER  -->

                    <div class="form-group">
                        <label for="insHoldUvVarnish">UV Varnish</label>
                        <input type="text" id="insHoldUvVarnish" name="insHoldUvVarnish"/>
                    </div>

                    <!-- Hot Stamp - INSERT HOLDER -->
                    <div class="form-group">
                        <label for="insHoldHotStamp">Hot Stamp</label>
                        <input type="text" id="insHoldHotStamp" name="insHoldHotStamp"/>
                    </div>

                    <!-- Images - INSERT HOLDER-->
                    <div class="form-group full-width">
                        <span><h4>Insert Holder Visual</h4></span>
                    </div>

                    <div class="form-group full-width image-grid-container">
                        <div class="image-grid-four-columns">
                            <!-- Image 1 -->
                            <div class="form-group">
                                <label class="Label-tags label-with-tooltip">Front View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_1" name="product_image_1" accept="image/*" onchange="previewImage(event,'preview1')">
                                <!-- <img id="preview1" class="img-preview"> -->
                            </div>

                            <!-- Image 2 -->
                            <div class="form-group">
                                <label class="Label-tags label-with-tooltip">Rear View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_2" name="product_image_2" accept="image/*" onchange="previewImage(event,'preview2')">
                                <!-- <img id="preview2" class="img-preview"> -->
                            </div>

                            <!-- Image 3 -->
                            <div class="form-group">
                                <label class="Label-tags label-with-tooltip">Side View 1
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_3" name="product_image_3" accept="image/*" onchange="previewImage(event,'preview3')">
                                <!-- <img id="preview3" class="img-preview"> -->
                            </div>

                            <!-- Image 4 -->
                            <div class="form-group">
                                <label class="Label-tags label-with-tooltip">Side View 2
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_4" name="product_image_4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-------------------- Insert Holder Platform Specification ------------------->
    <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Insert Holder Platform Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <div class="column-grid">
                    <!-- SAP Code - INSERT HOLDER PLATFORM -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="sapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="sapCode" name="sapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="insertHolderplatformForm" />
                    </div>

                    <!-- Name - INSERT HOLDER PLATFORM -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="pckDes">
                            <span>Item Description</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Detailed item description. Include key features or specifications to ensure clarity in identification</span>
                            </span>
                        </label>
                        <input type="text" id="pckDes" name="pckDes" required placeholder="Fetched item description"/>
                    </div>

                    <!-- Standard Size - INSERT HOLDER PLATFORM -->
                    <div class="form-group">
                        <label for="insert_holder_platforms_size_standard">Standard Size</label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="insert_holder_platform_size_standard_width" placeholder="(W)" />
                                <span>X</span>
                                <input type="number" id="insert_holder_platform_size_standard_height" placeholder="(H)" />
                                <span>X</span>
                                <input type="number" id="insert_holder_platform_size_standard_base" placeholder="(B)" />
                            </div>
                        </div>
                    </div>

                    <!-- Open Size - INSERT HOLDER PLATFORM-->
                    <div class="form-group">
                        <label for="insert_holder_platforms_size_open">Open Size</label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="insert_holder_platform_size_open_width" placeholder="(W)" />
                                <span>X</span>
                                <input type="number" id="insert_holder_platform_size_open_height" placeholder="(H)" />
                            </div>
                        </div>
                    </div>

                    <!-- Unit of Measure - INSERT HOLDER PLATFORM -->
                    <div class="form-group">
                        <label for="capacity_unit6">Unit of Measure</label>
                        <select id="capacity_unit6" >
                            <option value="" disabled selected>Unit</option>
                            <option value="mm">mm</option>
                            <option value="cm">cm</option>
                            <option value="inches">inches</option>
                            <option value="m">m</option>
                            <option value="yards">yards</option>
                        </select>
                    </div>

                    <!-- Product Volume - INSERT HOLDER PLATFORM -->
                    <div class="form-group">
                        <label for="insert_holder_platforms_product_volume">Product Volume</label>
                        <select id="insert_holder_platforms_product_volume" onchange="toggleSizerVolumeInput(this)">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_insert_holder_platforms_product_volume" placeholder="Enter new volume" />
                    </div>

                    <!-- Print (Outer) - INSERT HOLDER PLATFORM -->
                    <div class="form-group">
                        <label for="insert_holder_platform_print_outer">Print Type Outer</label>
                        <select type="text" id="insert_holder_platform_print_outer" name="insert_holder_platform_print_outer"> 
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_insert_holder_platform_print_outer" name="input_insert_holder_platform_print_outer" placeholder="Enter new print outer"/>
                    </div>

                    <!-- Print (Inner) - INSERT HOLDER PLATFORM -->
                    <div class="form-group">
                        <label for="insert_holder_platform_print_inner">Print Type Inner</label>
                        <select type="text" id="insert_holder_platform_print_inner" name="insert_holder_platform_print_inner">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="input_insert_holder_platform_print_inner" name="input_insert_holder_platform_print_inner" placeholder="Enter new print inner"/>
                    </div>


                    <!-- UV Varnish - INSERT HOLDER PLATFORMS -->
                    <div class="form-group">
                        <label for="insert_holder_platforms_uv_varnish">UV Varnish</label>
                        <input type="text" id="insert_holder_platforms_uv_varnish" name="insert_holder_platforms_uv_varnish"/>
                    </div>

                    <!-- Hot Stamp - INSERT HOLDER PLATFORMS -->

                    <div class="form-group">
                        <label for="insert_holder_platforms_hot_stamp">Hot Stamp</label>
                        <input type="text" id="insert_holder_platforms_hot_stamp" name="insert_holder_platforms_hot_stamp"/>
                    </div>

                    <!-- Images - INSERT HOLDER PLATFORM-->
                    <div class="form-group full-width">
                        <span><h4>Insert Holder Platform Visual</h4></span>
                    </div>

                    <div class="form-group full-width image-grid-container">
                        <div class="image-grid-four-columns">
                            <!-- Image 1 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Front View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_1" name="product_image_1" accept="image/*" onchange="previewImage(event,'preview1')">
                                <!-- <img id="preview1" class="img-preview"> -->
                            </div>

                            <!-- Image 2 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Rear View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_2" name="product_image_2" accept="image/*" onchange="previewImage(event,'preview2')">
                                <!-- <img id="preview2" class="img-preview"> -->
                            </div>

                            <!-- Image 3 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Side View 1
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_3" name="product_image_3" accept="image/*" onchange="previewImage(event,'preview3')">
                                <!-- <img id="preview3" class="img-preview"> -->
                            </div>

                            <!-- Image 4 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Side View 2
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_4" name="product_image_4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-------------------- Insert Partiton Specification ------------------->
    <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Insert Partition Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <div class="column-grid">
                    <!-- SAP Code - INSERT PARTITION -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="sapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="sapCode" name="sapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="insertPartitonForm" />
                    </div>

                    <!-- Name - INSERT PARTITION -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="pckDes">
                            <span>Item Description</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Detailed item description. Include key features or specifications to ensure clarity in identification</span>
                            </span>
                        </label>
                        <input type="text" id="pckDes" name="pckDes" required placeholder="Fetched item description"/>
                    </div>

                    <!-- Standard Size - INSERT PARTITION -->
                    <div class="form-group">
                        <label for="insPartiStdSize">Standard Size</label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="insPartiSizeStdWidth" name="insPartiSizeStdWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="insPartiSizeStdHeight" name="insPartiSizeStdHeight" placeholder="(H)"/>
                                <span>X</span>
                                <input type="number" id="insPartiSizeStdBase" name="insPartiSizeStdBase" placeholder="(B)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Open Size - INSERT PARTITION -->
                    <div class="form-group">
                        <label for="insert_partition_size_open">Open Size</label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="insPartiSizeOpnWidth" name="insPartiSizeOpnWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="insPartiSizeOpnHeight" name="insPartiSizeOpnHeight" placeholder="(H)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Unit of Measure - INSERT PARTITION -->
                    <div class="form-group">
                        <label for="insPartiUom">Unit of Measure</label>
                        <select id="insPartiUom" name="insPartiUom">
                            <option value="" disabled selected>Unit</option>
                            <option value="mm">mm</option>
                            <option value="cm">cm</option>
                            <option value="inches">inches</option>
                            <option value="m">m</option>
                            <option value="yards">yards</option>
                        </select>
                    </div>

                    <!-- Print (Outer) - INSERT PARTITION -->
                    <div class="form-group">
                        <label for="insPartiPrintOuter">Print Type Outer</label>
                        <select id="insPartiPrintOuter" name="insPartiPrintOuter">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsPartiPrintOuter" name="inputInsPartiPrintOuter" placeholder="Enter new Print Outer"/>
                    </div>

                    <!-- Print (Inner) - INSERT PARTITION -->
                    <div class="form-group">
                        <label for="insPartiPrintInner">Print Type Inner</label>
                        <select id="insPartiPrintInner" name="insPartiPrintInner">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsPartiPrintInner" name="inputInsPartiPrintInner" placeholder="Enter new print inner"/>
                    </div>

                    
                    <!-- Images - INSERT PARTITON -->
                    <div class="form-group full-width">
                        <span><h4>Insert Partition Visual</h4></span>
                    </div>

                    <div class="form-group full-width image-grid-container">
                        <div class="image-grid-four-columns">
                            <!-- Image 1 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Front View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_1" name="product_image_1" accept="image/*" onchange="previewImage(event,'preview1')">
                                <!-- <img id="preview1" class="img-preview" > -->
                            </div>

                            <!-- Image 2 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Rear View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_2" name="product_image_2" accept="image/*" onchange="previewImage(event,'preview2')">
                                <!-- <img id="preview2" class="img-preview" > -->
                            </div>

                            <!-- Image 3 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Side View 1
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_3" name="product_image_3" accept="image/*" onchange="previewImage(event,'preview3')">
                                <!-- <img id="preview3" class="img-preview"> -->
                            </div>

                            <!-- Image 4 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Side View 2
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_4" name="product_image_4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-------------------- Lid Specification ------------------->
    <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Lid Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <div class="column-grid">
                    <!-- SAP Code - LID -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="sapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="sapCode" name="sapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="lidForm"/>
                    </div>

                    <!-- Name - LID -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="pckDes">
                            <span>Item Description</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext"
                                >Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span>
                            </span>
                        </label>
                        <input type="text" id="pckDes" name="pckDes" required placeholder="Fetched item description"/>
                    </div>

                    <!-- Size Standard - LID -->
                    <div class="form-group">
                        <label for="lidSize">Standard Size</label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="lidSizeStdWidth" name="lidSizeStdWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="lidSizeStdHeight" name="lidSizeStdHeight" placeholder="(H)"/>
                                <span>X</span>
                                <input type="number" id="lidSizeStdBase" name="lidSizeStdBase" placeholder="(B)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Size Open - LID -->
                    <div class="form-group">
                        <label for="insert_size">Open Size</label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="lidSizeOpnWidth" name="lidSizeOpnWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="lidSizeOpnHeight" name="lidSizeOpnHeight" placeholder="(H)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Unit of Measure - LID -->
                    <div class="form-group">
                        <label for="lidUom">Unit of Measure</label>
                        <select id="lidUom" name="lidUom">
                            <option value="" disabled selected>Unit</option>
                            <option value="mm">mm</option>
                            <option value="cm">cm</option>
                            <option value="inches">inches</option>
                            <option value="m">m</option>
                            <option value="yards">yards</option>
                        </select>
                    </div>

                    <!-- Packing Content - LID -->

                    <div class="form-group">
                        <label for="lidMaterial">Packing Content</label>
                        <select id="lidMaterial" name="lidMaterial">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputLidMaterial" name="inputLidMaterial" placeholder="Enter new packing content"/>
                    </div>

                    <!-- Print (Outer) - LID -->
                    <div class="form-group">
                        <label for="lidPrintOuter">Print Type Outer</label>
                        <select type="text" id="lidPrintOuter" name="lidPrintOuter">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputLidPrintOuter" name="inputLidPrintOuter"placeholder="Enter new print outer"/>
                    </div>

                    <!-- Print (Inner) - LID -->
                    <div class="form-group">
                        <label for="lidPrintInner">Print Type Inner</label>
                        <select type="text" id="lidPrintInner" name="lidPrintInner">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputLidPrintInner" name="inputLidPrintInner" placeholder="Enter new print inner"/>
                    </div>

                    <!-- UV Varnish - LID -->
                    <div class="form-group">
                        <label for="lidUvVarnish">UV Varnish</label>
                        <input type="text" id="lidUvVarnish" name="lidUvVarnish" />
                    </div>

                    <!-- Hot Stamp - LID -->

                    <div class="form-group">
                        <label for="lidHotStamp">Hot Stamp</label>
                        <input type="text" id="lidHotStamp" name="lidHotStamp" />
                    </div>
                
                    <!-- Collection Story / Limited Edition - LID -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="limEdition">
                            <span>Collection Story / Limited Edition</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add tooltip.</span>
                            </span>
                        </label>
                        <textarea id="limEdition" name="limEdition" rows="5" cols="40"></textarea>
                    </div>
                    
                    
                    <!-- Images - LID -->
                    <div class="form-group full-width">
                        <span><h4>Lid Visual</h4></span>
                    </div>

                    <div class="form-group full-width image-grid-container">
                        <div class="image-grid-four-columns">
                            <!-- Image 1 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Front View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_1" name="product_image_1" accept="image/*" onchange="previewImage(event,'preview1')">
                                <!-- <img id="preview1" class="img-preview" > -->
                            </div>

                            <!-- Image 2 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Rear View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_2" name="product_image_2" accept="image/*" onchange="previewImage(event,'preview2')">
                                <!-- <img id="preview2" class="img-preview" > -->
                            </div>

                            <!-- Image 3 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Side View 1
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_3" name="product_image_3" accept="image/*" onchange="previewImage(event,'preview3')">
                                <!-- <img id="preview3" class="img-preview"> -->
                            </div>

                            <!-- Image 4 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Side View 2
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_4" name="product_image_4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-------------------- Base Specification ------------------->
    <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Base Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                 <div class="column-grid">
                    <!-- SAP Code - BASE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="sapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="sapCode" name="sapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="baseForm" />
                    </div>

                    <!-- Name - BASE -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="pckDes">
                            <span>Item Description</span>
                                <span class="tooltip">
                                    <i class="fa-etch fa-regular fa-circle-question"></i>
                                    <span class="tooltiptext">Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span>
                            </span>
                        </label>
                        <input type="text" id="pckDes" name="pckDes" required placeholder="Fetched item description"/>
                    </div>

                    <!-- Size Standard - BASE -->
                    <div class="form-group">
                        <label for="baseStdSize">Standard Size</label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="baseSizeStdWidth" name="baseSizeStdWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="baseSizeStdHeight" name="baseSizeStdHeight" placeholder="(H)"/>
                                <span>X</span>
                                <input type="number" id="baseSizeStdBase" name="baseSizeStdBase"placeholder="(B)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Size Open - BASE -->

                    <div class="form-group">
                        <label for="baseOpnSize">Open Size</label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="baseSizeOpnWidth" name="baseSizeOpnWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="baseSizeOpnHeight" name="baseSizeOpnHeight" placeholder="(H)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Unit of Measure - BASE -->
                    <div class="form-group">
                        <label for="baseUom">Unit of Measure</label>
                        <select id="baseUom" name="baseUom">
                            <option value="" disabled selected>Unit</option>
                            <option value="mm">MM</option>
                            <option value="cm">CM</option>
                            <option value="inches">INCHES</option>
                            <option value="m">M</option>
                            <option value="yards">Y</option>
                        </select>
                    </div>

                    <!-- Material - BASE -->
                    <div class="form-group">
                        <label for="baseMaterial">Packing Content</label>
                        <select id="baseMaterial" name="baseMaterial">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBaseMaterial" name="inputBaseMaterial" placeholder="Enter new packing content"/>
                    </div>

                    <!-- Print (Outer) - BASE -->
                    <div class="form-group">
                        <label for="basePrintOuter">Print Type Outer</label>
                        <select id="basePrintOuter" name="basePrintOuter">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBasePrintOuter" name="inputBasePrintOuter" placeholder="Enter new Print Outer"/>
                    </div>

                    <!-- Print (Inner) - BASE-->
                    <div class="form-group">
                        <label for="basePrintInner">Print Type Inner</label>
                        <select id="basePrintInner" name="basePrintInner">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBasePrintInner" name="inputBasePrintInner" placeholder="Enter new Print Inner"/>
                    </div>

                    <!-- UV Varnish - BASE -->
                    <div class="form-group">
                        <label for="baseUvVarnish">UV Varnish</label>
                        <input type="text" id="baseUvVarnish" name="baseUvVarnish" />
                    </div>

                    <!-- Hot Stamp - BASE -->
                    <div class="form-group">
                        <label for="baseHotStamp">Hot Stamp</label>
                        <input type="text" id="baseHotStamp" name="baseHotStamp" />
                    </div>

                    
                    <!-- Images - BASE PARTITON -->
                    <div class="form-group full-width">
                        <span><h4>Base Visual</h4></span>
                    </div>

                    <div class="form-group full-width image-grid-container">
                        <div class="image-grid-four-columns">
                            <!-- Image 1 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Front View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_1" name="product_image_1" accept="image/*" onchange="previewImage(event,'preview1')">
                                <!-- <img id="preview1" class="img-preview" > -->
                            </div>

                            <!-- Image 2 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Rear View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_2" name="product_image_2" accept="image/*" onchange="previewImage(event,'preview2')">
                                <!-- <img id="preview2" class="img-preview" > -->
                            </div>

                            <!-- Image 3 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Side View 1
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_3" name="product_image_3" accept="image/*" onchange="previewImage(event,'preview3')">
                                <!-- <img id="preview3" class="img-preview"> -->
                            </div>

                            <!-- Image 4 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Side View 2
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_4" name="product_image_4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-------------------- PLatform Specification ------------------->
    <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Platform Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <div class="column-grid">
                    <!-- SAP Code - PLATFORM -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="sapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="sapCode" name="sapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="platformForm" />
                    </div>

                    <!-- Name - PLATFORM -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="pckDes">
                            <span>Item Description</span>
                                <span class="tooltip">
                                    <i class="fa-etch fa-regular fa-circle-question"></i>
                                    <span class="tooltiptext">Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span>
                            </span>
                        </label>
                        <input type="text" id="pckDes" name="pckDes" required placeholder="Fetched item description"/>
                    </div>

                    <!-- Standard Size - PLATFORM -->
                    <div class="form-group">
                        <label for="platform_size_standard">Standard Size</label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="platSizeStdWidth" name="platSizeStdWidth"placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="platSizeStdHeight" name="platSizeStdHeight" placeholder="(H)"/>
                                <span>X</span>
                                <input type="number" id="platSizeStdBase" name="platSizeStdBase" placeholder="(B)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Open Size - PLATFORM -->
                    <div class="form-group">
                        <label for="insert_sleeve_ size_open">Open Size</label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="platSizeOpnWidth" name="platSizeOpnWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="platSizeOpnHeight" name="platSizeOpnHeight" placeholder="(H)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Unit of Measure - PLATFORM -->
                    <div class="form-group">
                        <label for="platUom">Unit of Measure</label>
                        <select id="platUom" name="platUom">
                            <option value="" disabled selected>Unit</option>
                            <option value="mm">mm</option>
                            <option value="cm">cm</option>
                            <option value="inches">inches</option>
                            <option value="m">m</option>
                            <option value="yards">yards</option>
                        </select>
                    </div>

                    <!-- Print (Outer) - PLATFORM -->
                    <div class="form-group">
                        <label for="platPrintOuter">Print Type Outer</label>
                        <select id="platPrintOuter" name="platPrintOuter">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputPlatPrintOuter" name="inputPlatPrintOuter"placeholder="Enter new print outer"/>
                    </div>

                    <!-- Print (Inner) - PLATFORM -->
                    <div class="form-group">
                        <label for="platPrintInner">Print Type Inner</label>
                        <select id="platPrintInner" name="platPrintInner">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputPlatPrintInner" name="inputPlatPrintInner" placeholder="Enter new print inner"/>
                    </div>

                    
                    <!-- Images - PLATFORM  -->
                    <div class="form-group full-width">
                        <span><h4>Platform Visual</h4></span>
                    </div>

                    <div class="form-group full-width image-grid-container">
                        <div class="image-grid-four-columns">
                            <!-- Image 1 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Front View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_1" name="product_image_1" accept="image/*" onchange="previewImage(event,'preview1')">
                                <!-- <img id="preview1" class="img-preview" > -->
                            </div>

                            <!-- Image 2 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Rear View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_2" name="product_image_2" accept="image/*" onchange="previewImage(event,'preview2')">
                                <!-- <img id="preview2" class="img-preview" > -->
                            </div>

                            <!-- Image 3 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Side View 1
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_3" name="product_image_3" accept="image/*" onchange="previewImage(event,'preview3')">
                                <!-- <img id="preview3" class="img-preview"> -->
                            </div>

                            <!-- Image 4 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Side View 2
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_4" name="product_image_4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-------------------- Sleeve Specification ------------------->
    <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Sleeve Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                 <div class="column-grid">  
                    <!-- SAP Code - BASE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="sapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="sapCode" name="sapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="sleeveForm" />
                    </div>

                    <!-- Name - BASE -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="pckDes">
                            <span>Item Description</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Detailed item description. Include key features or specifications to ensure clarity in identification</span>
                            </span>
                        </label>
                        <input type="text" id="pckDes" name="pckDes" required placeholder="Fetched item description"/>
                    </div>


                    <!-- Standard Size - SLEEVE -->
                    <div class="form-group">
                        <label for="sleeve_size_standard">Standard Size</label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="sleSizeStdWidth" name="sleSizeStdWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="sleSizeStdHeight" name="sleSizeStdHeight" placeholder="(H)"/>
                                <span>X</span>
                                <input type="number" id="sleSizeStdBase" name="sleSizeStdBase" placeholder="(B)"/>
                            </div>
                        </div>
                    </div>

                    <!--  Open Size - SLEEVE -->
                    <div class="form-group">
                        <label for="insert_sleeve_size_open">Open Size</label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="sleSizeOpnWidth" name="sleSizeOpnWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="sleSizeOpnHeight" name="sleSizeOpnHeight" placeholder="(H)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Unit of Measure - SLEEVE -->
                    <div class="form-group">
                        <label for="sleUom">Unit of Measure</label>
                        <select id="sleUom" name="sleUom">
                            <option value="" disabled selected>Unit</option>
                            <option value="mm">mm</option>
                            <option value="cm">cm</option>
                            <option value="inches">inches</option>
                            <option value="m">m</option>
                            <option value="yards">yards</option>
                        </select>
                    </div>

                    <!-- Print (Outer) - SLEEVE -->
                    <div class="form-group">
                        <label for="slePrintOuter">Print Type Outer</label>
                        <select id="slePrintOuter" name="slePrintOuter">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputSlePrintOuter" name="inputSlePrintOuter" placeholder="Enter new print outer"/>
                    </div>

                    <!-- Print (Inner) - SLEEVE -->
                    <div class="form-group">
                        <label for="slePrintInner">Print Type Inner</label>
                        <select id="slePrintInner" name="slePrintInner">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputSlePrintInner" name="inputSlePrintInner" placeholder="Enter new print inner"/>
                    </div>


                    <!-- Lamination - SLEEVE -->
                    <div class="form-group">
                        <label for="sleLamination">Lamination</label>
                        <select id="sleLamination" name="sleLamination">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputSleLamination" name="inputSleLamination" placeholder="Enter new lamination" />
                    </div>


                    <!-- UV Varnish - SLEEVE -->
                    <div class="form-group">
                        <label for="sleUvVarnish">UV Varnish</label>
                        <input type="text" id="sleUvVarnish" name="sleUvVarnish"/>
                    </div>

                    <!-- Hot Stamp - SLEEVE -->
                    <div class="form-group">
                        <label for="sleHotStamp">Hot Stamp</label>
                        <input type="text" id="sleHotStamp" name="sleHotStamp"/>
                    </div>

                    
                    <!-- Images - SLEEVE -->
                    <div class="form-group full-width">
                        <span><h4>Sleeve Visual</h4></span>
                    </div>

                    <div class="form-group full-width image-grid-container">
                        <div class="image-grid-four-columns">
                            <!-- Image 1 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Front View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_1" name="product_image_1" accept="image/*" onchange="previewImage(event,'preview1')">
                                <!-- <img id="preview1" class="img-preview" > -->
                            </div>

                            <!-- Image 2 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Rear View
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_2" name="product_image_2" accept="image/*" onchange="previewImage(event,'preview2')">
                                <!-- <img id="preview2" class="img-preview" > -->
                            </div>

                            <!-- Image 3 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Side View 1
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_3" name="product_image_3" accept="image/*" onchange="previewImage(event,'preview3')">
                                <!-- <img id="preview3" class="img-preview"> -->
                            </div>

                            <!-- Image 4 -->
                            <div class="image-upload-item">
                                <label class="Label-tags label-with-tooltip">Side View 2
                                    <span class="tooltip"> 
                                        <i class="fa-regular fa-circle-question"></i>
                                        <span class="tooltiptext">Add Tooltip</span>
                                    </span>
                                </label>
                                <input type="file" id="product_image_4" name="product_image_4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-------------------- Dispatch Dates ------------------>
    <div class="section-holder-1">
        <div class="from-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Dispatch Dates</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <!-- Delivery Date(s) -->
                <div class="form-group">
                    <label class="Label-tags label-with-tooltip" for="delivery_dates">
                        <span>Delivery Quantity</span>
                        <span class="tooltip"> 
                            <i class="fa-regular fa-circle-question"></i>
                            <span class="tooltiptext">Add Tooltip</span>
                        </span>
                    </label>
                    <div class="select-with-button">
                        <button type="button" class="form-btn" id="add-btn" onclick="openDateModal()">Select Dates <i class="fa-regular fa-calendar-plus"></i></button>
                        <div class="input-percent">
                            <input type="number" id="deliveryDates" name="deliveryDates"/>
                            <span clss="percent-sign">%</span>
                        </div>
                        <!-- <button type="button" class="form-btn" id="see-btn" onclick="showResult()">View Results <i class="fa-solid fa-check"></i></button> -->
                    </div>
                    <div id="hiddenDates"></div>
                    <div id="deliveryPreview"></div>
                </div>
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