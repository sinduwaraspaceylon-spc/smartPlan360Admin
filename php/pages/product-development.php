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
            <button class="sub-header-btn description" id="btn-description" title="Preview Description">
                <i class="fa-solid fa-eye"></i>                    
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
    <div id="form_box" class="section-holder-1">
        <div class="form-holder" onclick="toggleSection(this)">
                <h3 class="specifications-header">Box Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content" id="form1">
            <div  class="form-des-holder">
                <button class="form-description" id="form1-description" title="Preview Description">
                <i class="fa-solid fa-eye"></i>
                </button>
            </div>
            <div class="form-content-inner">
                <div class="column-grid">
                    <!-- SAP Code - BOX -->
                    <div class="form-group" >
                        <label class="Label-tags label-with-tooltip" for="boxSapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">
                                    Unique SAP code associated with the product. This code is used for inventory and tracking purposes.
                                </span>
                            </span>
                        </label>
                        <input type="text" id="boxSapCode" name="boxSapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results">                                                           </div>
                        <input type="hidden" id="formCategory" value="boxForm" />
                    </div>

                    <!-- Item Description - BOX -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="boxPckDes">
                            <span>Item Description</span>
                            <span class="tooltip">
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">
                                    Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span>
                            </span>
                        </label>
                        <input type="text" id="boxPckDes" name="boxPckDes" required placeholder="Fetched item description"/>
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
                        <label class="Label-tags label-with-tooltip" for="boxStandardSize">
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
                        <label class="Label-tags label-with-tooltip" for="boxOpenSize">
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
                                <span class="tooltipt  ext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="boxPrintStyle" name="boxPrintStyle">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBoxPrintStyle" name="inputBoxPrintStyle" placeholder="Enter new print style"/>
                    </div>

                    <!-- Print Type (Outer) - BOX-->
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
                                <input type="file" id="boxImage1" name="boxImage1" accept="image/*" onchange="previewImage(event,'preview1')">
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
                                <input type="file" id="boxImage2" name="boxImage2" accept="image/*" onchange="previewImage(event,'preview2')">
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
                                <input type="file" id="boxImage3" name="boxImage3" accept="image/*" onchange="previewImage(event,'preview3')">
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
                                <input type="file" id="boxImage4" name="boxImage4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Summary 1 -->
    <div id="form1Modal" class="descriptionModal">
        <div class="des-modal-content">
            <div class="des-modal-header">
                <h2>BOX SPECIFICATION SUMMARY</h2>
                <span class="des-close">&times;</span>
            </div>
            <div class="des-modal-body">
                <div class="des-item" id="form1DesContent">
                </div>
                <br>
            </div>
            <div class="des-print-btn-holder">
            <button class="des-print-btn print" id="btn-print" title="Print">
                <i class="fa-solid fa-print"></i> 
            </button>
        </div>
        </div>
    </div>

    <!-------------------- Insert Specification ------------------->
    <div id="form_insert" class="section-holder-1">
        <div class="form-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Insert Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content" id="form2">
            <div  class="form-des-holder">
                <button class="form-description" id="form2-description" title="Preview Description">
                <i class="fa-solid fa-eye"></i>
                </button>
            </div>
            <div class="form-content-inner">
                <div class="column-grid">
                    <!-- SAP Code - INSERT -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insSapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext"> Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="insSapCode" name="insSapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="insertForm" />
                    </div>

                    <!-- Name - INSERT -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="insPckDes">
                            <span>Item Description</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Detailed item description. Include key features or specifications to ensure clarity in identification</span>
                            </span>
                        </label>
                        <input type="text" id="insPckDes" name="insPckDes" required placeholder="Fetched item description"/>
                    </div>

                    <!-- Size Standard - INSERT -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insStandardSize">
                            <span>Standard Size</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="insStdWidth" name="insStdWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="insStdHeight" name="insStdHeight" placeholder="(H)"/>
                                <span>X</span>
                                <input type="number" id="insStdBase" name="insStdBase" placeholder="(B)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Size Open - INSERT -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insOpenSize">
                            <span>Open Size</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="insOpnWidth" name="insOpnWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="insOpnHeight" name="insOpnHeight" placeholder="(H)"/>
                            </div>
                        </div>
                        </div>

                    <!-- Unit of Measure - INSERT-->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insUom">
                            <span>Unit of Measure</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="insUom" name="insUom" >
                            <option value="" disabled selected>Unit</option>
                            <option value="mm">mm</option>
                            <option value="cm">cm</option>
                            <option value="inches">inches</option>
                            <option value="m">m</option>
                            <option value="yards">yards</option>
                        </select>
                    </div>

                    <!-- Packing Content - INSERT -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insPacContent">
                            <span>Packing Content</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select type="text" id="insPacContent" name="insPacContent">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsPacContent" name="inputInsPacContent" placeholder="Enter new Paxcking Content"/>
                    </div>

                    <!-- Print Outer - INSERT -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insPrintOuter">
                            <span>Print Type Outer</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="insPrintOuter" name="insPrintOuter">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsPrintOuter" name="inputInsPrintOuter" placeholder="Enter new Print Outer"/>
                    </div>

                    <!-- Print Inner - INSERT -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insPrintInner">
                            <span>Print Type Inner</span>
                            <span class="tooltip">
                            <i class="fa-etch fa-regular fa-circle-question"></i>
                            <span class="tooltiptext">Add Tooltip</span>
                        </span>
                        </label>
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
                                <input type="file" id="insImage1" name="insImage1" accept="image/*" onchange="previewImage(event,'preview1')">
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
                                <input type="file" id="insImage2" name="insImage2" accept="image/*" onchange="previewImage(event,'preview2')">
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
                                <input type="file" id="insImage3" name="insImage3" accept="image/*" onchange="previewImage(event,'preview3')">
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
                                <input type="file" id="insImage4" name="insImage4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Summary 2 -->
    <div id="form2Modal" class="descriptionModal">
        <div class="des-modal-content">
            <div class="des-modal-header">
                <h2>INSERT SPECIFICATION SUMMARY</h2>
                <span class="des-close">&times;</span>
            </div>
            <div class="des-modal-body">
                <div class="des-item" id="form2DesContent">
                </div>
                <br>
            </div>
            <div class="des-print-btn-holder">
            <button class="des-print-btn print" id="btn-print" title="Print">
                <i class="fa-solid fa-print"></i> 
            </button>
        </div>
        </div>
    </div>

    <!-------------------- Insert Holder Specification ------------------->
     <div id="form_insertHolder" class="section-holder-1">
        <div class="form-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Insert Holder Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content" id="form3">
            <div  class="form-des-holder">
                <button class="form-description" id="form3-description" title="Preview Description">
                <i class="fa-solid fa-eye"></i>
                </button>
            </div>
            <div class="form-content-inner">
                <div class="column-grid">
                    <!-- SAP Code - INSERT HOLDER -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insHolSapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="insHolSapCode" name="insHolSapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="insertHolderForm" />
                    </div>

                    <!-- Name - INSERT HOLDER -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="insHolPckDes">
                        <span>Item Description</span>
                            <span class="tooltip">
                            <i class="fa-etch fa-regular fa-circle-question"></i>
                            <span class="tooltiptext"
                                >Detailed item description. Include key features or specifications to ensure clarity in identification
                            </span>
                            </span>
                    </label>
                    <input type="text" id="insHolPckDes" name="insHolPckDes" required placeholder="Fetched item description"/>
                    </div>
                    
                    <!-- Standard Size - INSERT HOLDER -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insHolStandardSize">
                            <span>Standard Size</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="insHolStdWidth" name="insHolStdWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="insHolStdHeight" name="insHolStdHeight" placeholder="(H)"/>
                                <span>X</span>
                                <input type="number" id="insHolStdBase" name="insHolStdBase" placeholder="(B)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Open Size - INSERT HOLDER -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insHolOpenSize">
                            <span>Open Size</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="insHolOpnWidth" name="insHolOpnWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="insHolOpnHeight" name="insHolOpnHeight" placeholder="(H)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Unit of Measure - INSERT HOLDER -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insHolUom">
                            <span>Unit of Measure</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="insHolUom" name="insHolUom">
                            <option value="" disabled selected>Unit</option>
                            <option value="mm">mm</option>
                            <option value="cm">cm</option>
                            <option value="inches">inches</option>
                            <option value="m">m</option>
                            <option value="yards">yards</option>
                        </select>
                    </div>

                    <!-- Packing Content - INSERT HOLDER -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insHolPacContent">
                            <span>Packing Content</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="insHolPacContent" name="insHolPacContent">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsHolPacContent" name="inputInsHolPacContent" placeholder="Enter new packing content"/>
                    </div>

                    <!-- Print (Outer) - INSERT HOLDER -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip"  for="insHolPrintOuter">
                            <span>Print Type Outer</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="insHolPrintOuter" name="insHolPrintOuter">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsHolPrintOuter" name="inputInsHolPrintOuter" placeholder="Enter new print outer"/>
                    </div>

                    <!-- Print (Inner) - INSERT HOLDER  -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insHolPrintInner">
                            <span>Print Type Inner</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="insHolPrintInner" name="insHolPrintInner">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsHolPrintInner" name="inputInsHolPrintInner" placeholder="Enter new print inner"/>
                    </div>

                    <!-- UV Varnish - INSERT HOLDER  -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insHolUvVarnish">
                            <span>UV Varnish</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <input type="text" id="insHolUvVarnish" name="insHolUvVarnish"/>
                    </div>

                    <!-- Hot Stamp - INSERT HOLDER -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insHolHotStamp">
                            <span>Hot Stamp</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <input type="text" id="insHolHotStamp" name="insHolHotStamp"/>
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
                                <input type="file" id="insHolImage1" name="insHolImage1" accept="image/*" onchange="previewImage(event,'preview1')">
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
                                <input type="file" id="insHolImage2" name="insHolImage2" accept="image/*" onchange="previewImage(event,'preview2')">
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
                                <input type="file" id="insHolImage3" name="insHolImage3" accept="image/*" onchange="previewImage(event,'preview3')">
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
                                <input type="file" id="insHolImage4" name="insHolImage4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Summary 3 -->
    <div id="form3Modal" class="descriptionModal">
        <div class="des-modal-content">
            <div class="des-modal-header">
                <h2>INSERT HOLDER SPECIFICATION SUMMARY</h2>
                <span class="des-close">&times;</span>
            </div>
            <div class="des-modal-body">
                <div class="des-item" id="form3DesContent">
                </div>
                <br>
            </div>
            <div class="des-print-btn-holder">
            <button class="des-print-btn print" id="btn-print" title="Print">
                <i class="fa-solid fa-print"></i> 
            </button>
        </div>
        </div>
    </div>
    

    <!-------------------- Insert Holder Platform Specification ------------------->
    <div id="form_insertHolderPlatform" class="section-holder-1">
        <div class="form-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Insert Holder Platform Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content" id="form4">
            <div  class="form-des-holder">
                <button class="form-description" id="form4-description" title="Preview Description">
                <i class="fa-solid fa-eye"></i>
                </button>
            </div>
            <div class="form-content-inner">
                <div class="column-grid">
                    <!-- SAP Code - INSERT HOLDER PLATFORM -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insHolPlatSapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="insHolPlatSapCode" name="insHolPlatSapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="insertHolderplatformForm" />
                    </div>

                    <!-- Name - INSERT HOLDER PLATFORM -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="insHolPlatPckDes">
                            <span>Item Description</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Detailed item description. Include key features or specifications to ensure clarity in identification</span>
                            </span>
                        </label>
                        <input type="text" id="insHolPlatPckDes" name="insHolPlatPckDes" required placeholder="Fetched item description"/>
                    </div>

                    <!-- Standard Size - INSERT HOLDER PLATFORM -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insHolPlatStandardSize">
                            <span>Standard Size</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="insHolPlatStdWidth" name="insHolPlatStdWidth" placeholder="(W)" />
                                <span>X</span>
                                <input type="number" id="insHolPlatStdHeight" name="insHolPlatStdHeight"  placeholder="(H)" />
                                <span>X</span>
                                <input type="number" id="insHolPlatStdBase" name="insHolPlatStdBase" placeholder="(B)" />
                            </div>
                        </div>
                    </div>

                    <!-- Open Size - INSERT HOLDER PLATFORM-->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insHolPlatOpenSize">
                            <span>Open Size</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="insHolPlatOpnWidth" name="insHolPlatOpnWidth" placeholder="(W)" />
                                <span>X</span>
                                <input type="number" id="insHolPlatOpnHeight" name="insHolPlatOpnHeight" placeholder="(H)" />
                            </div>
                        </div>
                    </div>

                    <!-- Unit of Measure - INSERT HOLDER PLATFORM -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insHolPlatUom">
                            <span>Unit of Measure</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="insHolPlatUom" class="insHolPlatUom">
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
                        <label class="Label-tags label-with-tooltip" for="insHolPlatProdVolume">
                            <span>Product Volume</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="insHolPlatProdVolume" class="insHolPlatProdVolume" onchange="toggleSizerVolumeInput(this)">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsHolPlatProdVolume" class="inputInsHolPlatProdVolume" placeholder="Enter new volume" />
                    </div>

                    <!-- Print (Outer) - INSERT HOLDER PLATFORM -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insHolPlatPrintOuter">
                            <span>Print Type Outer</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select type="text" id="insHolPlatPrintOuter" name="insHolPlatPrintOuter"> 
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsHolPlatPrintOuter" name="inputInsHolPlatPrintOuter" placeholder="Enter new print outer"/>
                    </div>

                    <!-- Print (Inner) - INSERT HOLDER PLATFORM -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insHolPlatPrintInner">
                            <span>Print Type Inner</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select type="text" id="insHolPlatPrintInner" name="insHolPlatPrintInner">
                            <option value="">--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsHolPlatPrintInner" name="inputInsHolPlatPrintInner" placeholder="Enter new print inner"/>
                    </div>


                    <!-- UV Varnish - INSERT HOLDER PLATFORMS -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insHolPlatUvVarnish">
                            <span>UV Varnish</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <input type="text" id="insHolPlatUvVarnish" name="insHolPlatUvVarnish"/>
                    </div>

                    <!-- Hot Stamp - INSERT HOLDER PLATFORMS -->

                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insHolPlatHotStamp">
                            <span>Hot Stamp</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <input type="text" id="insHolPlatHotStamp" name="insHolPlatHotStamp"/>
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
                                <input type="file" id="insHolPlatImage1" name="insHolPlatImage1" accept="image/*" onchange="previewImage(event,'preview1')">
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
                                <input type="file" id="insHolPlatImage2" name="insHolPlatImage2" accept="image/*" onchange="previewImage(event,'preview2')">
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
                                <input type="file" id="insHolPlatImage3" name="insHolPlatImage3" accept="image/*" onchange="previewImage(event,'preview3')">
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
                                <input type="file" id="insHolPlatImage4" name="insHolPlatImage4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div> 

    <!-- Summary 4 -->
    <div id="form4Modal" class="descriptionModal">
        <div class="des-modal-content">
            <div class="des-modal-header">
                <h2>INSERT HOLDER PLATFORM SPECIFICATION SUMMARY</h2>
                <span class="des-close">&times;</span>
            </div>
            <div class="des-modal-body">
                <div class="des-item" id="form4DesContent">
                </div>
                <br>
            </div>
            <div class="des-print-btn-holder">
            <button class="des-print-btn print" id="btn-print" title="Print">
                <i class="fa-solid fa-print"></i> 
            </button>
        </div>
        </div>
    </div>

    <!-------------------- Insert Partition Specification ------------------->
    <div id="form_insertPartition" class="section-holder-1">
        <div class="form-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Insert Partition Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content" id="form5">
            <div  class="form-des-holder">
                <button class="form-description" id="form5-description" title="Preview Description">
                <i class="fa-solid fa-eye"></i>
                </button>
            </div>
            <div class="form-content-inner">
                <div class="column-grid">
                    <!-- SAP Code - INSERT PARTITION -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insPartiSapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="insPartiSapCode" name="insPartiSapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="insertPartitonForm" />
                    </div>

                    <!-- Name - INSERT PARTITION -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="insPartiPckDes">
                            <span>Item Description</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Detailed item description. Include key features or specifications to ensure clarity in identification</span>
                            </span>
                        </label>
                        <input type="text" id="insPartiPckDes" name="insPartiPckDes" required placeholder="Fetched item description"/>
                    </div>

                    <!-- Standard Size - INSERT PARTITION -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insPartiStandardSize">
                            <span>Standard Size<span>
                                <span class="tooltip">
                                    <i class="fa-etch fa-regular fa-circle-question"></i>
                                    <span class="tooltiptext">Add Tooltip</span>
                                </span>
                            </label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="insPartiStdWidth" name="insPartiStdWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="insPartiStdHeight" name="insPartiStdHeight" placeholder="(H)"/>
                                <span>X</span>
                                <input type="number" id="insPartiStdBase" name="insPartiStdBase" placeholder="(B)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Open Size - INSERT PARTITION -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insPartiOpenSize">
                            <span>Open Size</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="insPartiOpnWidth" name="insPartiOpnWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="insPartiOpnHeight" name="insPartiOpnHeight" placeholder="(H)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Unit of Measure - INSERT PARTITION -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insPartiUom">
                            <span>Unit of Measure</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
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
                        <label class="Label-tags label-with-tooltip" for="insPartiPrintOuter">
                            <span>Print Type Outer</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="insPartiPrintOuter" name="insPartiPrintOuter">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputInsPartiPrintOuter" name="inputInsPartiPrintOuter" placeholder="Enter new Print Outer"/>
                    </div>

                    <!-- Print (Inner) - INSERT PARTITION -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="insPartiPrintInner">
                            <span>Print Type Inner</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
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
                                <input type="file" id="insPartiImage1" name="insPartiImage1" accept="image/*" onchange="previewImage(event,'preview1')">
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
                                <input type="file" id="insPartiImage2" name="insPartiImage2" accept="image/*" onchange="previewImage(event,'preview2')">
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
                                <input type="file" id="insPartiImage3" name="insPartiImage3" accept="image/*" onchange="previewImage(event,'preview3')">
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
                                <input type="file" id="insPartiImage4" name="insPartiImage4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Summary 5 -->
    <div id="form5Modal" class="descriptionModal">
        <div class="des-modal-content">
            <div class="des-modal-header">
                <h2>INSERT PARTITON SPECIFICATION SUMMARY</h2>
                <span class="des-close">&times;</span>
            </div>
            <div class="des-modal-body">
                <div class="des-item" id="form5DesContent">
                </div>
                <br>
            </div>
            <div class="des-print-btn-holder">
            <button class="des-print-btn print" id="btn-print" title="Print">
                <i class="fa-solid fa-print"></i> 
            </button>
        </div>
        </div>
    </div>

    <!-------------------- Lid Specification ------------------->
    <div id="form_lid" class="section-holder-1">
        <div class="form-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Lid Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content" id="form6">
            <div  class="form-des-holder">
                <button class="form-description" id="form6-description" title="Preview Description">
                <i class="fa-solid fa-eye"></i>
                </button>
            </div>
            <div class="form-content-inner">
                <div class="column-grid">
                    <!-- SAP Code - LID -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="lidSapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="lidSapCode" name="lidSapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="lidForm"/>
                    </div>

                    <!-- Name - LID -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="lidPckDes">
                            <span>Item Description</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext"
                                >Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span>
                            </span>
                        </label>
                        <input type="text" id="lidPckDes" name="lidPckDes" required placeholder="Fetched item description"/>
                    </div>

                    <!-- Size Standard - LID -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="lidStandardSize">
                            <span>Standard Size</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="lidStdWidth" name="lidStdWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="lidStdHeight" name="lidStdHeight" placeholder="(H)"/>
                                <span>X</span>
                                <input type="number" id="lidStdBase" name="lidStdBase" placeholder="(B)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Size Open - LID -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="lidOpenSize">
                            <span>Open Size</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="lidOpnWidth" name="lidOpnWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="lidOpnHeight" name="lidOpnHeight" placeholder="(H)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Unit of Measure - LID -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="lidUom">
                            <span>Unit of Measure</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
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
                        <label class="Label-tags label-with-tooltip" for="lidPacContent">
                            <span>Packing Content</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="lidPacContent" name="lidPacContent">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputLidPacContent" name="inputLidPacContent" placeholder="Enter new packing content"/>
                    </div>

                    <!-- Print (Outer) - LID -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="lidPrintOuter">
                            <span>Print Type Outer</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select type="text" id="lidPrintOuter" name="lidPrintOuter">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputLidPrintOuter" name="inputLidPrintOuter"placeholder="Enter new print outer"/>
                    </div>

                    <!-- Print (Inner) - LID -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="lidPrintInner">
                            <span>Print Type Inner</span> 
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select type="text" id="lidPrintInner" name="lidPrintInner">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputLidPrintInner" name="inputLidPrintInner" placeholder="Enter new print inner"/>
                    </div>

                    <!-- UV Varnish - LID -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="lidUvVarnish">
                            <span>UV Varnish</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <input type="text" id="lidUvVarnish" name="lidUvVarnish" />
                    </div>

                    <!-- Hot Stamp - LID -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="lidHotStamp">
                            <span>Hot Stamp</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <input type="text" id="lidHotStamp" name="lidHotStamp" />
                    </div>
                
                    <!-- Collection Story / Limited Edition - LID -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="lidLimEdition">
                            <span>Collection Story / Limited Edition</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add tooltip.</span>
                            </span>
                        </label>
                        <textarea id="lidLimEdition" name="lidLimEdition" rows="5" cols="40"></textarea>
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
                                <input type="file" id="lidImage1" name="lidImage1" accept="image/*" onchange="previewImage(event,'preview1')">
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
                                <input type="file" id="lidImage2" name="lidImage2" accept="image/*" onchange="previewImage(event,'preview2')">
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
                                <input type="file" id="lidImage3" name="lidImage3" accept="image/*" onchange="previewImage(event,'preview3')">
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
                                <input type="file" id="lidImage4" name="lidImage4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Summary 6 -->
    <div id="form6Modal" class="descriptionModal">
        <div class="des-modal-content">
            <div class="des-modal-header">
                <h2>LID SPECIFICATION SUMMARY</h2>
                <span class="des-close">&times;</span>
            </div>
            <div class="des-modal-body">
                <div class="des-item" id="form6DesContent">
                </div>
                <br>
            </div>
            <div class="des-print-btn-holder">
            <button class="des-print-btn print" id="btn-print" title="Print">
                <i class="fa-solid fa-print"></i> 
            </button>
        </div>
        </div>
    </div>

    <!-------------------- Base Specification ------------------->
    <div id="form_base" class="section-holder-1">
        <div class="form-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Base Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content" id="form7">
            <div  class="form-des-holder">
                <button class="form-description" id="form7-description" title="Preview Description">
                <i class="fa-solid fa-eye"></i>
                </button>
            </div>
            <div class="form-content-inner">
                 <div class="column-grid">
                    <!-- SAP Code - BASE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="baseSapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="baseSapCode" name="baseSapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="baseForm" />
                    </div>

                    <!-- Name - BASE -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="basePckDes">
                            <span>Item Description</span>
                                <span class="tooltip">
                                    <i class="fa-etch fa-regular fa-circle-question"></i>
                                    <span class="tooltiptext">Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span>
                            </span>
                        </label>
                        <input type="text" id="basePckDes" name="basePckDes" required placeholder="Fetched item description"/>
                    </div>

                    <!-- Size Standard - BASE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="baseStandardSize">
                            <span>Standard Size</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="baseStdWidth" name="baseStdWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="baseStdHeight" name="baseStdHeight" placeholder="(H)"/>
                                <span>X</span>
                                <input type="number" id="baseStdBase" name="baseStdBase"placeholder="(B)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Size Open - BASE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="baseOpenSize">
                            <span>Open Size</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="baseOpnWidth" name="baseOpnWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="baseOpnHeight" name="baseOpnHeight" placeholder="(H)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Unit of Measure - BASE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="baseUom">
                            <span>Unit of Measure</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="baseUom" name="baseUom">
                            <option value="" disabled selected>Unit</option>
                            <option value="mm">mm</option>
                            <option value="cm">cm</option>
                            <option value="inches">inches</option>
                            <option value="m">m</option>
                            <option value="yards">yards</option>
                        </select>
                    </div>

                    <!-- Packing Content - BASE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="basePacContent">
                            <span>Packing Content</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="basePacContent" name="basePacContent">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBasePacContent" name="inputBasePacContent" placeholder="Enter new packing content"/>
                    </div>

                    <!-- Print (Outer) - BASE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="basePrintOuter">
                            <span>Print Type Outer</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="basePrintOuter" name="basePrintOuter">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBasePrintOuter" name="inputBasePrintOuter" placeholder="Enter new Print Outer"/>
                    </div>

                    <!-- Print (Inner) - BASE-->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="basePrintInner">
                            <span>Print Type Inner</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="basePrintInner" name="basePrintInner">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputBasePrintInner" name="inputBasePrintInner" placeholder="Enter new Print Inner"/>
                    </div>

                    <!-- UV Varnish - BASE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="baseUvVarnish">
                            <span>UV Varnish</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <input type="text" id="baseUvVarnish" name="baseUvVarnish" />
                    </div>

                    <!-- Hot Stamp - BASE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="baseHotStamp">
                            <span>Hot Stamp</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
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
                                <input type="file" id="baseImage1" name="baseImage1" accept="image/*" onchange="previewImage(event,'preview1')">
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
                                <input type="file" id="baseImage2" name="baseImage2" accept="image/*" onchange="previewImage(event,'preview2')">
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
                                <input type="file" id="baseImage3" name="baseImage3" accept="image/*" onchange="previewImage(event,'preview3')">
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
                                <input type="file" id="baseImage4" name="baseImage4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Summary 7 -->
    <div id="form7Modal" class="descriptionModal">
        <div class="des-modal-content">
            <div class="des-modal-header">
                <h2>BASE SPECIFICATION SUMMARY</h2>
                <span class="des-close">&times;</span>
            </div>
            <div class="des-modal-body">
                <div class="des-item" id="form7DesContent">
                </div>
                <br>
            </div>
            <div class="des-print-btn-holder">
            <button class="des-print-btn print" id="btn-print" title="Print">
                <i class="fa-solid fa-print"></i> 
            </button>
        </div>
        </div>
    </div>

    <!-------------------- PLatform Specification ------------------->
    <div id="form_platform" class="section-holder-1">
        <div class="form-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Platform Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content" id="form8">
            <div  class="form-des-holder">
                <button class="form-description" id="form8-description" title="Preview Description">
                <i class="fa-solid fa-eye"></i>
                </button>
            </div>
            <div class="form-content-inner">
                <div class="column-grid">
                    <!-- SAP Code - PLATFORM -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="platSapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="platSapCode" name="platSapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="platformForm" />
                    </div>

                    <!-- Name - PLATFORM -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="platPckDes">
                            <span>Item Description</span>
                                <span class="tooltip">
                                    <i class="fa-etch fa-regular fa-circle-question"></i>
                                    <span class="tooltiptext">Detailed item description. Include key features or specifications to ensure clarity in identification
                                </span>
                            </span>
                        </label>
                        <input type="text" id="platPckDes" name="platPckDes" required placeholder="Fetched item description"/>
                    </div>

                    <!-- Standard Size - PLATFORM -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="platStandardSize">
                            <span>Standard Size</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="platStdWidth" name="platStdWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="platStdHeight" name="platStdHeight" placeholder="(H)"/>
                                <span>X</span>
                                <input type="number" id="platStdBase" name="platStdBase" placeholder="(B)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Open Size - PLATFORM -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="platOpenSize">
                            <span>Open Size</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="platOpnWidth" name="platOpnWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="platOpnHeight" name="platOpnHeight" placeholder="(H)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Unit of Measure - PLATFORM -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="platUom">
                            <span>Unit of Measure</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
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
                        <label class="Label-tags label-with-tooltip" for="platPrintOuter">
                            <span>Print Type Outer</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="platPrintOuter" name="platPrintOuter">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputPlatPrintOuter" name="inputPlatPrintOuter" placeholder="Enter new print outer"/>
                    </div>

                    <!-- Print (Inner) - PLATFORM -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="platPrintInner">
                            <span>Print Type Inner</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
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
                                <input type="file" id="platImage1" name="platImage1" accept="image/*" onchange="previewImage(event,'preview1')">
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
                                <input type="file" id="platImage2" name="platImage2" accept="image/*" onchange="previewImage(event,'preview2')">
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
                                <input type="file" id="platImage3" name="platImage3" accept="image/*" onchange="previewImage(event,'preview3')">
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
                                <input type="file" id="platImage4" name="platImage4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Summary 8 -->
    <div id="form8Modal" class="descriptionModal">
        <div class="des-modal-content">
            <div class="des-modal-header">
                <h2>PLATFORM SPECIFICATION SUMMARY</h2>
                <span class="des-close">&times;</span>
            </div>
            <div class="des-modal-body">
                <div class="des-item" id="form8DesContent">
                </div>
                <br>
            </div>
            <div class="des-print-btn-holder">
            <button class="des-print-btn print" id="btn-print" title="Print">
                <i class="fa-solid fa-print"></i> 
            </button>
        </div>
        </div>
    </div>

    <!-------------------- Sleeve Specification ------------------->
    <div id="form_sleeve" class="section-holder-1">
        <div class="form-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Sleeve Specification</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content" id="form9">
            <div  class="form-des-holder">
                <button class="form-description" id="form9-description" title="Preview Description">
                <i class="fa-solid fa-eye"></i>
                </button>
            </div>
            <div class="form-content-inner">
                 <div class="column-grid">  
                    <!-- SAP Code - BASE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="slveSapCode">
                            <span>SAP Code</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Unique SAP code associated with the product. This code is used for inventory and tracking purposes.</span>
                            </span>
                        </label>
                        <input type="text" id="slveSapCode" name="slveSapCode" autocomplete="off" placeholder="Search SAP Code"/>
                        <div id="sapCodeResults" class="autocomplete-results"></div>
                        <input type="hidden" id="formCategory" value="sleeveForm" />
                    </div>

                    <!-- Name - BASE -->
                    <div class="form-group span-two-rows">
                        <label class="Label-tags label-with-tooltip" for="slvPckDes">
                            <span>Item Description</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Detailed item description. Include key features or specifications to ensure clarity in identification</span>
                            </span>
                        </label>
                        <input type="text" id="slvPckDes" name="slvPckDes" required placeholder="Fetched item description"/>
                    </div>

                    <!-- Standard Size - SLEEVE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="slvStandardSize">
                            <span>Standard Size</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="slvStdWidth" name="slvStdWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="slvStdHeight" name="slvStdHeight" placeholder="(H)"/>
                                <span>X</span>
                                <input type="number" id="slvStdBase" name="slvStdBase" placeholder="(B)"/>
                            </div>
                        </div>
                    </div>

                    <!--  Open Size - SLEEVE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="slvOpenSize">
                            <span>Open Size</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <div class="size_standard_row">
                            <div>
                                <input type="number" id="slvOpnWidth" name="slvOpnWidth" placeholder="(W)"/>
                                <span>X</span>
                                <input type="number" id="slvOpnHeight" name="slvOpnHeight" placeholder="(H)"/>
                            </div>
                        </div>
                    </div>

                    <!-- Unit of Measure - SLEEVE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="slvUom">
                            <span>Unit of Measure</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="slvUom" name="slvUom">
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
                        <label class="Label-tags label-with-tooltip" for="slvPrintOuter">
                            <span>Print Type Outer</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="slvPrintOuter" name="slvPrintOuter">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputSlvPrintOuter" name="inputSlvPrintOuter" placeholder="Enter new print outer"/>
                    </div>

                    <!-- Print (Inner) - SLEEVE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="slvPrintInner">
                            <span>Print Type Inner</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="slvPrintInner" name="slvPrintInner">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputSlvPrintInner" name="inputSlvPrintInner" placeholder="Enter new print inner"/>
                    </div>


                    <!-- Lamination - SLEEVE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="slvLamination">
                            <span>Lamination</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <select id="slvLamination" name="slvLamination">
                            <option value="" disabled selected>--SELECT--</option>
                            <option value="create_new">Create New</option>
                        </select>
                        <input type="text" id="inputslvLamination" name="inputslvLamination" placeholder="Enter new lamination" />
                    </div>


                    <!-- UV Varnish - SLEEVE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="slvUvVarnish">
                            <span>UV Varnish</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <input type="text" id="slvUvVarnish" name="slvUvVarnish"/>
                    </div>

                    <!-- Hot Stamp - SLEEVE -->
                    <div class="form-group">
                        <label class="Label-tags label-with-tooltip" for="slvHotStamp">
                            <span>Hot Stamp</span>
                            <span class="tooltip">
                                <i class="fa-etch fa-regular fa-circle-question"></i>
                                <span class="tooltiptext">Add Tooltip</span>
                            </span>
                        </label>
                        <input type="text" id="slvHotStamp" name="slvHotStamp"/>
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
                                <input type="file" id="slvImage1" name="slvImage1" accept="image/*" onchange="previewImage(event,'preview1')">
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
                                <input type="file" id="slvImage2" name="slvImage2" accept="image/*" onchange="previewImage(event,'preview2')">
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
                                <input type="file" id="slvImage3" name="slvImage3" accept="image/*" onchange="previewImage(event,'preview3')">
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
                                <input type="file" id="slvImage4" name="slvImage4" accept="image/*" onchange="previewImage(event,'preview4')">
                                <!-- <img id="preview4" class="img-preview"> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Summary 9 -->
    <div id="form9Modal" class="descriptionModal">
        <div class="des-modal-content">
            <div class="des-modal-header">
                <h2>SLEEVE SPECIFICATION SUMMARY</h2>
                <span class="des-close">&times;</span>
            </div>
            <div class="des-modal-body">
                <div class="des-item" id="form9DesContent">
                </div>
                <br>
            </div>
            <div class="des-print-btn-holder">
            <button class="des-print-btn print" id="btn-print" title="Print">
                <i class="fa-solid fa-print"></i> 
            </button>
        </div>
        </div>
    </div>

    <!-------------------- Dispatch Dates ------------------>
    <div class="section-holder-1">
        <div class="form-holder" onclick="toggleSection(this)">
            <h3 class="specifications-header">Dispatch Dates</h3>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <div class="form-content">
            <div class="form-content-inner">
                <!-- Delivery Date(s) -->
                <div class="form-group">
                    <label class="Label-tags label-with-tooltip" for="deliveryDates">
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

<!-- Description Popup Section -->
<div id="descriptionModal" class="descriptionModal">
    <div class="des-modal-content">
        <div class="des-modal-header">
            <h2>Secondary Description</h2>
            <span class="des-close">&times;</span>
        </div>
        <div class="des-modal-body" id="modalDynamicContent">
            <div class="des-item">
                <h3 class="des-main-title"><u>BOX SUMMARY</u></h4>
                <h4 class="des-title"><u>PRODUCT INFORMATION SUMMARY</u></h4>
                <div class="des-question">
                    <p><b>SAP:</b></p>
                    <span class="des-answer">
                        <p>SP-PAK-SS-50070 - PERFUMED SOAP COLLECTION BOX</p>
                    </span>
                </div> 
                
                <br>

                <h4 class="des-title"><u>DETAILS OF BOX</u></h4>
                <div class="des-question ">
                    <p><b>PROMOTION/PROJECT:</b></p>
                    <span class="des-answer">
                        <p>NEROLI JASMINE HAND AND SANITIZER (50ML)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>STANDARD SIZE:</b></b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>OPEN SIZE:</b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PACKING CONTENT:</b></p>
                    <span class="des-answer">
                        <p>FESTIVE</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PRINT (OUTER):</b></p>
                    <span class="des-answer">
                        <p>F5C (CMYK + PANTONE)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>LAMINATION:</b></p>
                    <span class="des-answer">
                        <p>THERMAL MATTE [OUTER ONLY]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>UV VARNISH:</b></p>
                    <span class="des-answer">
                        <p>STANDARD GLOSS SPOT UV [ALL PANELS]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>HOT STAMP:</b></p>
                    <span class="des-answer">
                        <p> MATTE GOLD [ALL PANELS</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>MATERIAL:</b></p>
                    <span class="des-answer">
                        <p>350GSM IVORY BOARD</p>
                    </span>
                </div>                
            </div>

            <br> 

            <div class="des-item">
                <h3 class="des-main-title"><u>INSERT SUMMARY</u></h4>
                <h4 class="des-title"><u>PRODUCT INFORMATION SUMMARY</u></h4>
                <div class="des-question">
                    <p><b>SAP:</b></p>
                    <span class="des-answer">
                        <p>SP-PAK-SS-50070 - PERFUMED SOAP COLLECTION BOX</p>
                    </span>
                </div> 
                
                <br>

                <h4 class="des-title"><u>DETAILS OF BOX</u></h4>
                <div class="des-question ">
                    <p><b>PROMOTION/PROJECT:</b></p>
                    <span class="des-answer">
                        <p>NEROLI JASMINE HAND AND SANITIZER (50ML)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>STANDARD SIZE:</b></b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>OPEN SIZE:</b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PACKING CONTENT:</b></p>
                    <span class="des-answer">
                        <p>FESTIVE</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PRINT (OUTER):</b></p>
                    <span class="des-answer">
                        <p>F5C (CMYK + PANTONE)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>LAMINATION:</b></p>
                    <span class="des-answer">
                        <p>THERMAL MATTE [OUTER ONLY]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>UV VARNISH:</b></p>
                    <span class="des-answer">
                        <p>STANDARD GLOSS SPOT UV [ALL PANELS]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>HOT STAMP:</b></p>
                    <span class="des-answer">
                        <p> MATTE GOLD [ALL PANELS</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>MATERIAL:</b></p>
                    <span class="des-answer">
                        <p>350GSM IVORY BOARD</p>
                    </span>
                </div>
            </div>

            <br> 

            <div class="des-item">
                <h3 class="des-main-title"><u>INSERT HOLDER SUMMARY</u></h4>
                <h4 class="des-title"><u>PRODUCT INFORMATION SUMMARY</u></h4>
                <div class="des-question">
                    <p><b>SAP:</b></p>
                    <span class="des-answer">
                        <p>SP-PAK-SS-50070 - PERFUMED SOAP COLLECTION BOX</p>
                    </span>
                </div> 
                
                <br>

                <h4 class="des-title"><u>DETAILS OF BOX</u></h4>
                <div class="des-question ">
                    <p><b>PROMOTION/PROJECT:</b></p>
                    <span class="des-answer">
                        <p>NEROLI JASMINE HAND AND SANITIZER (50ML)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>STANDARD SIZE:</b></b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>OPEN SIZE:</b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PACKING CONTENT:</b></p>
                    <span class="des-answer">
                        <p>FESTIVE</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PRINT (OUTER):</b></p>
                    <span class="des-answer">
                        <p>F5C (CMYK + PANTONE)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>LAMINATION:</b></p>
                    <span class="des-answer">
                        <p>THERMAL MATTE [OUTER ONLY]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>UV VARNISH:</b></p>
                    <span class="des-answer">
                        <p>STANDARD GLOSS SPOT UV [ALL PANELS]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>HOT STAMP:</b></p>
                    <span class="des-answer">
                        <p> MATTE GOLD [ALL PANELS</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>MATERIAL:</b></p>
                    <span class="des-answer">
                        <p>350GSM IVORY BOARD</p>
                    </span>
                </div>
            </div>

            <br> 

            <div class="des-item">
                <h3 class="des-main-title"><u>INSERT HOLDER PLATFORM SUMMARY</u></h4>
                <h4 class="des-title"><u>PRODUCT INFORMATION SUMMARY</u></h4>
                <div class="des-question">
                    <p><b>SAP:</b></p>
                    <span class="des-answer">
                        <p>SP-PAK-SS-50070 - PERFUMED SOAP COLLECTION BOX</p>
                    </span>
                </div> 
                
                <br>

                <h4 class="des-title"><u>DETAILS OF BOX</u></h4>
                <div class="des-question ">
                    <p><b>PROMOTION/PROJECT:</b></p>
                    <span class="des-answer">
                        <p>NEROLI JASMINE HAND AND SANITIZER (50ML)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>STANDARD SIZE:</b></b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>OPEN SIZE:</b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PACKING CONTENT:</b></p>
                    <span class="des-answer">
                        <p>FESTIVE</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PRINT (OUTER):</b></p>
                    <span class="des-answer">
                        <p>F5C (CMYK + PANTONE)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>LAMINATION:</b></p>
                    <span class="des-answer">
                        <p>THERMAL MATTE [OUTER ONLY]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>UV VARNISH:</b></p>
                    <span class="des-answer">
                        <p>STANDARD GLOSS SPOT UV [ALL PANELS]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>HOT STAMP:</b></p>
                    <span class="des-answer">
                        <p> MATTE GOLD [ALL PANELS</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>MATERIAL:</b></p>
                    <span class="des-answer">
                        <p>350GSM IVORY BOARD</p>
                    </span>
                </div>
            </div>

            <br> 

            <div class="des-item">
                <h3 class="des-main-title"><u>INSERT PARTITION SUMMARY</u></h4>
                <h4 class="des-title"><u>PRODUCT INFORMATION SUMMARY</u></h4>
                <div class="des-question">
                    <p><b>SAP:</b></p>
                    <span class="des-answer">
                        <p>SP-PAK-SS-50070 - PERFUMED SOAP COLLECTION BOX</p>
                    </span>
                </div> 
                
                <br>

                <h4 class="des-title"><u>DETAILS OF BOX</u></h4>
                <div class="des-question ">
                    <p><b>PROMOTION/PROJECT:</b></p>
                    <span class="des-answer">
                        <p>NEROLI JASMINE HAND AND SANITIZER (50ML)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>STANDARD SIZE:</b></b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>OPEN SIZE:</b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PACKING CONTENT:</b></p>
                    <span class="des-answer">
                        <p>FESTIVE</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PRINT (OUTER):</b></p>
                    <span class="des-answer">
                        <p>F5C (CMYK + PANTONE)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>LAMINATION:</b></p>
                    <span class="des-answer">
                        <p>THERMAL MATTE [OUTER ONLY]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>UV VARNISH:</b></p>
                    <span class="des-answer">
                        <p>STANDARD GLOSS SPOT UV [ALL PANELS]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>HOT STAMP:</b></p>
                    <span class="des-answer">
                        <p> MATTE GOLD [ALL PANELS</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>MATERIAL:</b></p>
                    <span class="des-answer">
                        <p>350GSM IVORY BOARD</p>
                    </span>
                </div>
            </div>

            <br> 

            <div class="des-item">
                <h3 class="des-main-title"><u>LID SUMMARY</u></h4>
                <h4 class="des-title"><u>PRODUCT INFORMATION SUMMARY</u></h4>
                <div class="des-question">
                    <p><b>SAP:</b></p>
                    <span class="des-answer">
                        <p>SP-PAK-SS-50070 - PERFUMED SOAP COLLECTION BOX</p>
                    </span>
                </div> 
                
                <br>

                <h4 class="des-title"><u>DETAILS OF BOX</u></h4>
                <div class="des-question ">
                    <p><b>PROMOTION/PROJECT:</b></p>
                    <span class="des-answer">
                        <p>NEROLI JASMINE HAND AND SANITIZER (50ML)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>STANDARD SIZE:</b></b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>OPEN SIZE:</b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PACKING CONTENT:</b></p>
                    <span class="des-answer">
                        <p>FESTIVE</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PRINT (OUTER):</b></p>
                    <span class="des-answer">
                        <p>F5C (CMYK + PANTONE)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>LAMINATION:</b></p>
                    <span class="des-answer">
                        <p>THERMAL MATTE [OUTER ONLY]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>UV VARNISH:</b></p>
                    <span class="des-answer">
                        <p>STANDARD GLOSS SPOT UV [ALL PANELS]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>HOT STAMP:</b></p>
                    <span class="des-answer">
                        <p> MATTE GOLD [ALL PANELS</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>MATERIAL:</b></p>
                    <span class="des-answer">
                        <p>350GSM IVORY BOARD</p>
                    </span>
                </div>
            </div>

            <br> 

            <div class="des-item">
                <h3 class="des-main-title"><u>BASE SUMMARY</u></h4>
                <h4 class="des-title"><u>PRODUCT INFORMATION SUMMARY</u></h4>
                <div class="des-question">
                    <p><b>SAP:</b></p>
                    <span class="des-answer">
                        <p>SP-PAK-SS-50070 - PERFUMED SOAP COLLECTION BOX</p>
                    </span>
                </div> 
                
                <br>

                <h4 class="des-title"><u>DETAILS OF BOX</u></h4>
                <div class="des-question ">
                    <p><b>PROMOTION/PROJECT:</b></p>
                    <span class="des-answer">
                        <p>NEROLI JASMINE HAND AND SANITIZER (50ML)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>STANDARD SIZE:</b></b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>OPEN SIZE:</b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PACKING CONTENT:</b></p>
                    <span class="des-answer">
                        <p>FESTIVE</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PRINT (OUTER):</b></p>
                    <span class="des-answer">
                        <p>F5C (CMYK + PANTONE)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>LAMINATION:</b></p>
                    <span class="des-answer">
                        <p>THERMAL MATTE [OUTER ONLY]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>UV VARNISH:</b></p>
                    <span class="des-answer">
                        <p>STANDARD GLOSS SPOT UV [ALL PANELS]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>HOT STAMP:</b></p>
                    <span class="des-answer">
                        <p> MATTE GOLD [ALL PANELS</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>MATERIAL:</b></p>
                    <span class="des-answer">
                        <p>350GSM IVORY BOARD</p>
                    </span>
                </div>
            </div>

            <br> 

            <div class="des-item">
                <h3 class="des-main-title"><u>PLATFORM SUMMARY</u></h4>
                <h4 class="des-title"><u>PRODUCT INFORMATION SUMMARY</u></h4>
                <div class="des-question">
                    <p><b>SAP:</b></p>
                    <span class="des-answer">
                        <p>SP-PAK-SS-50070 - PERFUMED SOAP COLLECTION BOX</p>
                    </span>
                </div> 
                
                <br>

                <h4 class="des-title"><u>DETAILS OF BOX</u></h4>
                <div class="des-question ">
                    <p><b>PROMOTION/PROJECT:</b></p>
                    <span class="des-answer">
                        <p>NEROLI JASMINE HAND AND SANITIZER (50ML)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>STANDARD SIZE:</b></b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>OPEN SIZE:</b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PACKING CONTENT:</b></p>
                    <span class="des-answer">
                        <p>FESTIVE</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PRINT (OUTER):</b></p>
                    <span class="des-answer">
                        <p>F5C (CMYK + PANTONE)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>LAMINATION:</b></p>
                    <span class="des-answer">
                        <p>THERMAL MATTE [OUTER ONLY]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>UV VARNISH:</b></p>
                    <span class="des-answer">
                        <p>STANDARD GLOSS SPOT UV [ALL PANELS]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>HOT STAMP:</b></p>
                    <span class="des-answer">
                        <p> MATTE GOLD [ALL PANELS</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>MATERIAL:</b></p>
                    <span class="des-answer">
                        <p>350GSM IVORY BOARD</p>
                    </span>
                </div>
            </div>

            <br> 

            <div class="des-item">
                <h3 class="des-main-title"><u>SLEEVE SUMMARY</u></h4>
                <h4 class="des-title"><u>PRODUCT INFORMATION SUMMARY</u></h4>
                <div class="des-question">
                    <p><b>SAP:</b></p>
                    <span class="des-answer">
                        <p>SP-PAK-SS-50070 - PERFUMED SOAP COLLECTION BOX</p>
                    </span>
                </div> 
                
                <br>

                <h4 class="des-title"><u>DETAILS OF BOX</u></h4>
                <div class="des-question ">
                    <p><b>PROMOTION/PROJECT:</b></p>
                    <span class="des-answer">
                        <p>NEROLI JASMINE HAND AND SANITIZER (50ML)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>STANDARD SIZE:</b></b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>OPEN SIZE:</b></p>
                    <span class="des-answer">
                        <p>45.00 × 45.00 MM</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PACKING CONTENT:</b></p>
                    <span class="des-answer">
                        <p>FESTIVE</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>PRINT (OUTER):</b></p>
                    <span class="des-answer">
                        <p>F5C (CMYK + PANTONE)</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>LAMINATION:</b></p>
                    <span class="des-answer">
                        <p>THERMAL MATTE [OUTER ONLY]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>UV VARNISH:</b></p>
                    <span class="des-answer">
                        <p>STANDARD GLOSS SPOT UV [ALL PANELS]</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>HOT STAMP:</b></p>
                    <span class="des-answer">
                        <p> MATTE GOLD [ALL PANELS</p>
                    </span>
                </div>
                <div class="des-question">
                    <p><b>MATERIAL:</b></p>
                    <span class="des-answer">
                        <p>350GSM IVORY BOARD</p>
                    </span>
                </div>
            </div>

            <br> 

            <div class="des-item">
                <h3 class="des-main-title"><u>DISPATCH DATES SUMMARY</u></h4>
                <h4 class="des-title"><u>PRODUCT INFORMATION SUMMARY</u></h4>
                <div class="des-question">
                    <p><b>SAP:</b></p>
                    <span class="des-answer">
                        <p>SP-PAK-SS-50070 - PERFUMED SOAP COLLECTION BOX</p>
                    </span>
                </div> 
                
            </div>

            <br>
        </div>
        <div class="des-print-btn-holder">
            <button class="des-print-btn print" id="btn-print" title="Print">
                <i class="fa-solid fa-print"></i> 
            </button>
        </div>
    </div>   
</div>

<!-- Form holder Section Toggle script -->
<script>
   function toggleSection(header) {
    const content = header.nextElementSibling;
    const icon = header.querySelector('.toggle-icon');

    // Hide all form-content sections first
    document.querySelectorAll(".form-content").forEach(f => {
        f.style.display = "none";           // hide all
        f.classList.remove('expanded');     // remove expanded class
    });

    // Remove rotation from all icons
    document.querySelectorAll(".toggle-icon").forEach(i => i.classList.remove('rotate'));

    // Show the clicked section
    content.style.display = "block";
    content.classList.add('expanded');

    // Rotate the clicked icon
    icon.classList.add('rotate');
}

</script>

<!--  Remove default title tooltip and store it in data attribute -->
<script>
    document.querySelectorAll('.sub-header-btn').forEach(button => {
        const title = button.getAttribute('title');
        if (title) {
            button.setAttribute('data-title', title);
            button.removeAttribute('title');
        }
    });
    
</script>


<script>
    // Get modal elements
    const modal = document.getElementById('descriptionModal');
    const btnDescription = document.getElementById('btn-description');
    const closeBtn = document.querySelector('.des-close');

    // Function to open modal
    function openModal() {
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    // Function to close modal
    function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Open modal when button is clicked
    btnDescription.addEventListener('click', openModal);

    // Close modal when X is clicked
    closeBtn.addEventListener('click', closeModal);

    // Close modal when clicking outside of it
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });

    // Close modal with ESC key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && modal.style.display === 'block') {
            closeModal();
        }
    });
</script>

<!---------------------------- Form Descriptions ---------------------->
<script>
// Box 
 document.getElementById('form1-description').addEventListener('click', function() {
    const getVal = id => document.getElementById(id)?.value || '';
    
    const descriptionHTML = `
        <div><strong style="text-decoration: underline;"><b>PRODUCT INFORMATION SUMMARY</b></strong></div>
        <p><strong>SAP:</strong> ${getVal('boxSapCode')} - ${getVal('boxPckDes')}</p>

        <br><div><strong style="text-decoration: underline;"><b>DETAILS OF BOX</b></strong></div>
        <p><strong>PROMOTION/PROJECT:</strong> ${getVal('boxPromoProject')}</p>
        <p><strong>STANDARD SIZE (W x H x B):</strong> ${getVal('boxStdWidth')} x ${getVal('boxStdHeight')} x ${getVal('boxStdBase')}</p>
        <p><strong>OPEN SIZE (W x H):</strong> ${getVal('boxOpnWidth')} x ${getVal('boxOpnHeight')}</p>
        <p><strong>UNIT OF MEASURE:</strong> ${getVal('boxUom')}</p>
        <p><strong>PACKING CONTENT:</strong> ${getVal('boxPacContent') || getVal('inputBoxPacContent')}</p>
        <p><strong>OUTER & INNER PLIES INFORMATION:</strong> ${getVal('boxOutInnInformation') || getVal('inputBoxOutInnInformation')}</p>
        <p><strong>PRINT STYLE:</strong> ${getVal('boxPrintStyle') || getVal('inputBoxPrintStyle')}</p>
        <p><strong>PRINT TYPE OUTER:</strong> ${getVal('boxPrintOuter') || getVal('inputBoxPrintOuter')}</p>
        <p><strong>PRINT TYPE INNER:</strong> ${getVal('boxPrintInner') || getVal('inputBoxPrintInner')}</p>
        <p><strong>LAMINATED FINISH:</strong> ${getVal('boxLamination') || getVal('inputBoxLamination')}</p>
        <p><strong>BOX FLAPS:</strong> ${getVal('boxFlaps') || getVal('inputBoxFlaps')}</p>
        <p><strong>UV VARNISH:</strong> ${getVal('boxUvVarnish')}</p>
        <p><strong>HOT STAMP:</strong> ${getVal('boxHotStamp')}</p>
        <p><strong>DUMMY/SAMPLE APPROVED DATE:</strong> ${getVal('boxDummyApprovedDate')}</p>
        <p><strong>CUTTER:</strong> ${getVal('boxCutter') || getVal('inputBoxCutter')}</p>
        <p><strong>ARTWORK(S):</strong> ${getVal('boxArtworks') || getVal('inputBoxArtworks')}</p>
        <p><strong>DELIVERY LOCATION:</strong> ${getVal('boxDeliveryLocation') || getVal('inputBoxDeliveryLocation')}</p>
    `;

    // Insert description into modal content
    document.getElementById('form1DesContent').innerHTML = descriptionHTML;

    // Show modal
    const modal = document.getElementById('form1Modal');
    modal.style.display = 'block';

    // Close modal on clicking 'x'
    modal.querySelector('.des-close').onclick = () => modal.style.display = 'none';

    // Close modal on clicking outside the modal content
    window.onclick = (event) => {
        if(event.target == modal) modal.style.display = 'none';
    }
});

// Insert
document.getElementById('form2-description').addEventListener('click', function() {
    const getVal = id => document.getElementById(id)?.value || '';
    
    const descriptionHTML = `
        <div><strong style="text-decoration: underline;"><b>PRODUCT INFORMATION SUMMARY</b></strong></div>
        <p><strong>SAP:</strong> ${getVal('insSapCode')} - ${getVal('insPckDes')}</p>

        <br><div><strong style="text-decoration: underline;"><b>DETAILS OF INSERT</b></strong></div>
        <p><strong>STANDARD SIZE (W x H x B):</strong> ${getVal('insStdWidth')} x ${getVal('insStdHeight')} x ${getVal('insStdBase')}</p>
        <p><strong>OPEN SIZE (W x H):</strong> ${getVal('insOpnWidth')} x ${getVal('insOpnHeight')}</p>
        <p><strong>UNIT OF MEASURE:</strong> ${getVal('insUom')}</p>
        <p><strong>PACKING CONTENT:</strong> ${getVal('insPacContent') || getVal('inputInsPacContent')}</p>
        <p><strong>PRINT TYPE OUTER:</strong> ${getVal('insPrintOuter') || getVal('inputInsPrintOuter')}</p>
        <p><strong>PRINT TYPE INNER:</strong> ${getVal('insPrintInner') || getVal('inputInsPrintInner')}</p>
    `;

    // Insert description into modal content
    document.getElementById('form2DesContent').innerHTML = descriptionHTML;

    // Show modal
    const modal = document.getElementById('form2Modal');
    modal.style.display = 'block';

    // Close modal on clicking 'x'
    modal.querySelector('.des-close').onclick = () => modal.style.display = 'none';

    // Close modal on clicking outside the modal content
    window.onclick = (event) => {
        if(event.target == modal) modal.style.display = 'none';
    }
});

// Insert Holder
document.getElementById('form3-description').addEventListener('click', function() {
    const getVal = id => document.getElementById(id)?.value || '';
    
    const descriptionHTML = `
        <div><strong style="text-decoration: underline;"><b>PRODUCT INFORMATION SUMMARY</b></strong></div>
        <p><strong>SAP:</strong> ${getVal('insHolSapCode')} - ${getVal('insHolPckDes')}</p>
        
        <br><div><strong style="text-decoration: underline;"><b>DETAILS OF INSERT HOLDER</b></strong></div>
        <p><strong>STANDARD SIZE (W x H x B):</strong> ${getVal('insHolStdWidth')} x ${getVal('insHolStdHeight')} x ${getVal('insHolStdBase')}</p>
        <p><strong>OPEN SIZE (W x H):</strong> ${getVal('insHolOpnWidth')} x ${getVal('insHolOpnHeight')}</p>
        <p><strong>UNIT OF MEASURE:</strong> ${getVal('insHolUom')}</p>
        <p><strong>PACKING CONTENT:</strong> ${getVal('insHolPacContent') || getVal('inputInsHolPacContent')}</p>
        <p><strong>PRINT TYPE OUTER:</strong> ${getVal('insHolPrintOuter') || getVal('inputInsHolPrintOuter')}</p>
        <p><strong>PRINT TYPE INNER:</strong> ${getVal('insHolPrintInner') || getVal('inputInsHolPrintInner')}</p>
        <p><strong>UV VARNISH:</strong> ${getVal('insHolUvVarnish')}</p>
        <p><strong>HOT STAMP:</strong> ${getVal('insHolHotStamp')}</p>
    `;

    // Insert description into modal content
    document.getElementById('form3DesContent').innerHTML = descriptionHTML;

    // Show modal
    const modal = document.getElementById('form3Modal');
    modal.style.display = 'block';

    // Close modal on clicking 'x'
    modal.querySelector('.des-close').onclick = () => modal.style.display = 'none';

    // Close modal on clicking outside the modal content
    window.onclick = (event) => {
        if(event.target == modal) modal.style.display = 'none';
    }
});

// Insert Holder Platform
document.getElementById('form4-description').addEventListener('click', function() {
    const getVal = id => document.getElementById(id)?.value || '';
    
    const descriptionHTML = `
        <div><strong style="text-decoration: underline;"><b>PRODUCT INFORMATION SUMMARY</b></strong></div>
        <p><strong>SAP:</strong> ${getVal('insHolPlatSapCode')} - ${getVal('insHolPlatPckDes')}</p>

        <br><div><strong style="text-decoration: underline;"><b>DETAILS OF INSERT HOLDER PLATFORM</b></strong></div>
        <p><strong>STANDARD SIZE (W x H x B):</strong> ${getVal('insHolPlatStdWidth')} x ${getVal('insHolPlatStdHeight')} x ${getVal('insHolPlatStdBase')}</p>
        <p><strong>OPEN SIZE (W x H):</strong> ${getVal('insHolPlatOpnWidth')} x ${getVal('insHolPlatOpnHeight')}</p>
        <p><strong>UNIT OF MEASURE:</strong> ${getVal('insHolPlatUom')}</p>
        <p><strong>PRODUCT VOLUME:</strong> ${getVal('insHolPlatProdVolume') || getVal('inputInsHolPlatProdVolume')}</p>
        <p><strong>PRINT TYPE OUTER:</strong> ${getVal('insHolPlatPrintOuter') || getVal('inputInsHolPlatPrintOuter')}</p>
        <p><strong>PRINT TYPE INNER:</strong> ${getVal('insHolPlatPrintInner') || getVal('inputInsHolPlatPrintInner')}</p>
        <p><strong>UV VARNISH:</strong> ${getVal('insHolPlatUvVarnish')}</p>
        <p><strong>HOT STAMP:</strong> ${getVal('insHolPlatHotStamp')}</p>
    `;

    // Insert description into modal content
    document.getElementById('form4DesContent').innerHTML = descriptionHTML;

    // Show modal
    const modal = document.getElementById('form4Modal');
    modal.style.display = 'block';

    // Close modal on clicking 'x'
    modal.querySelector('.des-close').onclick = () => modal.style.display = 'none';

    // Close modal on clicking outside the modal content
    window.onclick = (event) => {
        if(event.target == modal) modal.style.display = 'none';
    }
});

// Insert Partition
document.getElementById('form5-description').addEventListener('click', function() {
    const getVal = id => document.getElementById(id)?.value || '';
    
    const descriptionHTML = `
        <div><strong style="text-decoration: underline;"><b>PRODUCT INFORMATION SUMMARY</b></strong></div>
        <p><strong>SAP:</strong> ${getVal('insPartiSapCode')} - ${getVal('insPartiPckDes')}</p>
        
        <br><div><strong style="text-decoration: underline;"><b>DETAILS OF INSERT PARTITON</b></strong></div>
        <p><strong>STANDARD SIZE (W x H x B):</strong> ${getVal('insPartiStdWidth')} x ${getVal('insPartiStdHeight')} x ${getVal('insPartiStdBase')}</p>
        <p><strong>OPEN SIZE (W x H):</strong> ${getVal('insPartiOpnWidth')} x ${getVal('insPartiOpnHeight')}</p>
        <p><strong>UNIT OF MEASURE:</strong> ${getVal('insPartiUom')}</p>
        <p><strong>PRINT TYPE OUTER:</strong> ${getVal('insPartiPrintOuter') || getVal('inputInsPartiPrintOuter')}</p>
        <p><strong>PRINT TYPE INNER:</strong> ${getVal('insPartiPrintInner') || getVal('inputInsPartiPrintInner')}</p>
    `;

    // Insert description into modal content
    document.getElementById('form5DesContent').innerHTML = descriptionHTML;

    // Show modal
    const modal = document.getElementById('form5Modal');
    modal.style.display = 'block';

    // Close modal on clicking 'x'
    modal.querySelector('.des-close').onclick = () => modal.style.display = 'none';

    // Close modal on clicking outside the modal content
    window.onclick = (event) => {
        if(event.target == modal) modal.style.display = 'none';
    }
});

// Lid
document.getElementById('form6-description').addEventListener('click', function() {
    const getVal = id => document.getElementById(id)?.value || '';
    
    const descriptionHTML = `
        <div><strong style="text-decoration: underline;"><b>PRODUCT INFORMATION SUMMARY</b></strong></div>
        <p><strong>SAP:</strong> ${getVal('lidSapCode')} - ${getVal('lidPckDes')}</p>
        
        <br><div><strong style="text-decoration: underline;"><b>DETAILS OF LID</b></strong></div>
        <p><strong>STANDARD SIZE (W x H x B):</strong> ${getVal('lidStdWidth')} x ${getVal('lidStdHeight')} x ${getVal('lidStdBase')}</p>
        <p><strong>OPEN SIZE (W x H):</strong> ${getVal('lidOpnWidth')} x ${getVal('lidOpnHeight')}</p>
        <p><strong>UNIT OF MEASURE:</strong> ${getVal('lidUom')}</p>
        <p><strong>PACKING CONTENT:</strong> ${getVal('lidPacContent') || getVal('inputLidPacContent')}</p>
        <p><strong>PRINT TYPE OUTER:</strong> ${getVal('lidPrintOuter') || getVal('inputLidPrintOuter')}</p>
        <p><strong>PRINT TYPE INNER:</strong> ${getVal('lidPrintInner') || getVal('inputLidPrintInner')}</p>
        <p><strong>UV VARNISH:</strong> ${getVal('lidUvVarnish')}</p>
        <p><strong>HOT STAMP:</strong> ${getVal('lidHotStamp')}</p>
        <p><strong>COLLECTION STORY / LIMITED EDITION:</strong> ${getVal('lidLimEdition')}</p>
    `;

    // Insert description into modal content
    document.getElementById('form6DesContent').innerHTML = descriptionHTML;

    // Show modal
    const modal = document.getElementById('form6Modal');
    modal.style.display = 'block';

    // Close modal on clicking 'x'
    modal.querySelector('.des-close').onclick = () => modal.style.display = 'none';

    // Close modal on clicking outside the modal content
    window.onclick = (event) => {
        if(event.target == modal) modal.style.display = 'none';
    }
});

// Base
document.getElementById('form7-description').addEventListener('click', function() {
    const getVal = id => document.getElementById(id)?.value || '';
    
    const descriptionHTML = `
        <div><strong style="text-decoration: underline;"><b>PRODUCT INFORMATION SUMMARY</b></strong></div>
        <p><strong>SAP:</strong> ${getVal('baseSapCode')} - ${getVal('basePckDes')}</p>
        
        <br><div><strong style="text-decoration: underline;"><b>DETAILS OF BASE</b></strong></div>
        <p><strong>STANDARD SIZE (W x H x B):</strong> ${getVal('baseStdWidth')} x ${getVal('baseStdHeight')} x ${getVal('baseStdBase')}</p>
        <p><strong>OPEN SIZE (W x H):</strong> ${getVal('baseOpnWidth')} x ${getVal('baseOpnHeight')}</p>
        <p><strong>UNIT OF MEASURE:</strong> ${getVal('baseUom')}</p>
        <p><strong>PACKING CONTENT:</strong> ${getVal('basePacContent') || getVal('inputBasePacContent')}</p>
        <p><strong>PRINT TYPE OUTER:</strong> ${getVal('basePrintOuter') || getVal('inputBasePrintOuter')}</p>
        <p><strong>PRINT TYPE INNER:</strong> ${getVal('basePrintInner') || getVal('inputBasePrintInner')}</p>
        <p><strong>UV VARNISH:</strong> ${getVal('baseUvVarnish')}</p>
        <p><strong>HOT STAMP:</strong> ${getVal('baseHotStamp')}</p>
    `;

    // Insert description into modal content
    document.getElementById('form7DesContent').innerHTML = descriptionHTML;

    // Show modal
    const modal = document.getElementById('form7Modal');
    modal.style.display = 'block';

    // Close modal on clicking 'x'
    modal.querySelector('.des-close').onclick = () => modal.style.display = 'none';

    // Close modal on clicking outside the modal content
    window.onclick = (event) => {
        if(event.target == modal) modal.style.display = 'none';
    }
});

// Platform
document.getElementById('form8-description').addEventListener('click', function() {
    const getVal = id => document.getElementById(id)?.value || '';
    
    const descriptionHTML = `
        <div><strong style="text-decoration: underline;"><b>PRODUCT INFORMATION SUMMARY</b></strong></div>
        <p><strong>SAP:</strong> ${getVal('platSapCode')} - ${getVal('platPckDes')}</p>

        <br><div><strong style="text-decoration: underline;"><b>DETAILS OF PLATFORM</b></strong></div>
        <p><strong>STANDARD SIZE (W x H x B):</strong> ${getVal('platStdWidth')} x ${getVal('platStdHeight')} x ${getVal('platStdBase')}</p>
        <p><strong>OPEN SIZE (W x H):</strong> ${getVal('platOpnWidth')} x ${getVal('platOpnHeight')}</p>
        <p><strong>UNIT OF MEASURE:</strong> ${getVal('platUom')}</p>
        <p><strong>PRINT TYPE OUTER:</strong> ${getVal('platPrintOuter') || getVal('inputPlatPrintOuter')}</p>
        <p><strong>PRINT TYPE INNER:</strong> ${getVal('platPrintInner') || getVal('inputPlatPrintInner')}</p>
    `;

    // Insert description into modal content
    document.getElementById('form8DesContent').innerHTML = descriptionHTML;

    // Show modal
    const modal = document.getElementById('form8Modal');
    modal.style.display = 'block';

    // Close modal on clicking 'x'
    modal.querySelector('.des-close').onclick = () => modal.style.display = 'none';

    // Close modal on clicking outside the modal content
    window.onclick = (event) => {
        if(event.target == modal) modal.style.display = 'none';
    }
});

// Sleeve
document.getElementById('form9-description').addEventListener('click', function() {
    const getVal = id => document.getElementById(id)?.value || '';
    
    const descriptionHTML = `
        <div><strong style="text-decoration: underline;"><b>PRODUCT INFORMATION SUMMARY</b></strong></div>
        <p><strong>SAP:</strong> ${getVal('slveSapCode')} - ${getVal('slvPckDes')}</p>

        <br><div><strong style="text-decoration: underline;"><b>DETAILS OF SLEEVE</b></strong></div>
        <p><strong>STANDARD SIZE (W x H x B):</strong> ${getVal('slvStdWidth')} x ${getVal('slvStdHeight')} x ${getVal('slvStdBase')}</p>
        <p><strong>OPEN SIZE (W x H):</strong> ${getVal('slvOpnWidth')} x ${getVal('slvOpnHeight')}</p>
        <p><strong>UNIT OF MEASURE:</strong> ${getVal('slvUom')}</p>
        <p><strong>PRINT TYPE OUTER:</strong> ${getVal('slvPrintOuter') || getVal('inputSlvPrintOuter')}</p>
        <p><strong>PRINT TYPE INNER:</strong> ${getVal('slvPrintInner') || getVal('inputSlvPrintInner')}</p>
        <p><strong>LAMINATED FINISH:</strong> ${getVal('slvLamination') || getVal('inputslvLamination')}</p>
        <p><strong>UV VARNISH:</strong> ${getVal('slvUvVarnish')}</p>
        <p><strong>HOT STAMP:</strong> ${getVal('slvHotStamp')}</p>
    `;

    // Insert description into modal content
    document.getElementById('form9DesContent').innerHTML = descriptionHTML;

    // Show modal
    const modal = document.getElementById('form9Modal');
    modal.style.display = 'block';

    // Close modal on clicking 'x'
    modal.querySelector('.des-close').onclick = () => modal.style.display = 'none';

    // Close modal on clicking outside the modal content
    window.onclick = (event) => {
        if(event.target == modal) modal.style.display = 'none';
    }
});
</script>


    