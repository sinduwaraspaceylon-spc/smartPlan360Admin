<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hybrid Demand Management</title>
<style>
* { margin: 0; padding: 0; box-sizing: border-box; }
body { 
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    padding: 30px 20px;
}
h2 { 
    color: #fff; 
    text-align: center; 
    margin-bottom: 30px; 
    font-size: 32px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
}
.container {
    max-width: 1200px;
    margin: 0 auto;
    background: #fff;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
}
.filter-bar { 
    display: flex; 
    gap: 15px; 
    margin-bottom: 25px; 
    flex-wrap: wrap; 
    align-items: center;
}
#searchProduct {
    flex: 1;
    min-width: 200px;
    padding: 12px 18px;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    font-size: 14px;
    transition: all 0.3s;
}
#searchProduct:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}
.dropdown { 
    position: relative; 
    min-width: 180px;
}
.dropdown-btn { 
    padding: 12px 18px; 
    border: 2px solid #e0e0e0; 
    cursor: pointer; 
    background: #fff;
    border-radius: 10px;
    font-size: 14px;
    transition: all 0.3s;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.dropdown-btn:after {
    content: '▼';
    font-size: 10px;
    margin-left: 10px;
    color: #667eea;
}
.dropdown-btn:hover { 
    border-color: #667eea;
    background: #f8f9ff;
}
.dropdown-content { 
    display: none; 
    position: absolute; 
    background: #fff; 
    border: 2px solid #e0e0e0; 
    width: 100%; 
    max-height: 250px; 
    overflow-y: auto; 
    z-index: 100;
    border-radius: 10px;
    margin-top: 5px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}
.dropdown-content label { 
    display: block; 
    padding: 10px 15px; 
    cursor: pointer;
    transition: all 0.2s;
    font-size: 14px;
}
.dropdown-content label:hover { 
    background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
    color: #fff;
}
.dropdown-content input[type="checkbox"] {
    margin-right: 8px;
    cursor: pointer;
}
.demand-assignment { 
    margin-bottom: 30px; 
    display: flex; 
    gap: 15px; 
    align-items: center;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    padding: 20px;
    border-radius: 15px;
}
#demandInput {
    flex: 1;
    max-width: 250px;
    padding: 12px 18px;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    font-size: 14px;
    transition: all 0.3s;
}
#demandInput:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}
#applyDemandBtn {
    padding: 12px 30px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-size: 15px;
    font-weight: 600;
    transition: all 0.3s;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}
#applyDemandBtn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
}
#applyDemandBtn:active {
    transform: translateY(0);
}
#selectedItemsList { 
    border: 2px solid #e0e0e0; 
    padding: 20px; 
    max-height: 400px; 
    overflow-y: auto;
    border-radius: 15px;
    background: #fafafa;
}
#selectedItemsList:empty:before {
    content: 'No items selected. Apply demand to see products here.';
    color: #999;
    font-style: italic;
    display: block;
    text-align: center;
    padding: 40px 20px;
}
.item { 
    padding: 15px; 
    border-bottom: 1px solid #e0e0e0;
    background: #fff;
    margin-bottom: 10px;
    border-radius: 8px;
    transition: all 0.3s;
}
.item:last-child {
    border-bottom: none;
    margin-bottom: 0;
}
.item:hover {
    transform: translateX(5px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.item span { 
    font-weight: 600;
    color: #667eea;
    font-size: 15px;
}
.hidden { 
    display: none !important; 
}
.dropdown-content::-webkit-scrollbar,
#selectedItemsList::-webkit-scrollbar {
    width: 8px;
}
.dropdown-content::-webkit-scrollbar-track,
#selectedItemsList::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}
.dropdown-content::-webkit-scrollbar-thumb,
#selectedItemsList::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 10px;
}
</style>
</head>
<body>

<h2>Demand Management System</h2>

<div class="filter-bar">
    <input type="text" placeholder="Search product" id="searchProduct">

    <div class="dropdown" id="brandDropdown">
        <div class="dropdown-btn">Select Brand</div>
        <div class="dropdown-content" id="brandOptions"></div>
    </div>

    <div class="dropdown hidden" id="departmentDropdown">
        <div class="dropdown-btn">Select Department</div>
        <div class="dropdown-content" id="departmentOptions"></div>
    </div>

    <div class="dropdown hidden" id="categoryDropdown">
        <div class="dropdown-btn">Select Category</div>
        <div class="dropdown-content" id="categoryOptions"></div>
    </div>

    <div class="dropdown hidden" id="rangeDropdown">
        <div class="dropdown-btn">Select Range</div>
        <div class="dropdown-content" id="rangeOptions"></div>
    </div>

    <!-- Month dropdown -->
    <div class="dropdown" id="monthDropdown">
        <div class="dropdown-btn">Select Months</div>
        <div class="dropdown-content" id="monthOptions"></div>
    </div>
</div>

<div class="demand-assignment">
    <input type="number" placeholder="Enter Demand %" id="demandInput">
    <button id="applyDemandBtn">Apply Demand</button>
</div>

<div id="selectedItemsList"></div>

<script>
// Hybrid data
const data = {
    brands: [
        {id: 1, name: "Brand A", departments: [
            {id: 11, name: "Dept A1", categories: [
                {id: 111, name: "Cat A1-1", ranges: [
                    {id: 1111, name: "Range A1-1-1", products: [
                        {id: 11111, name: "Prod A1-1-1-1"},
                        {id: 11112, name: "Prod A1-1-1-2"}
                    ]}
                ]}
            ]}
        ]},
        {id: 2, name: "Brand B", products: [
            {id: 201, name: "Prod B1"},
            {id: 202, name: "Prod B2"},
            {id: 203, name: "Prod B3"}
        ]}
    ]
};

// Months list
const months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];

// Demand map by month
const demandMap = {brand:{}, department:{}, category:{}, range:{}, product:{}};

// Helper: toggle dropdown
document.querySelectorAll('.dropdown-btn').forEach(btn=>{
    btn.addEventListener('click', ()=>{
        const content = btn.nextElementSibling;
        content.style.display = content.style.display==='block' ? 'none' : 'block';
    });
});
document.addEventListener('click', e=>{
    if(!e.target.closest('.dropdown')) document.querySelectorAll('.dropdown-content').forEach(dc=>dc.style.display='none');
});

// Populate dropdown
function populateDropdown(container, items, level){
    container.innerHTML='';
    items.forEach(i=>{
        const hasDemand = demandMap[level][i.id] && Object.keys(demandMap[level][i.id]).length>0;
        const label = document.createElement('label');
        label.innerHTML = `<input type="checkbox" value="${i.id}" data-level="${level}" ${hasDemand?'checked':''}> ${i.name}`;
        if(hasDemand){ label.style.fontWeight='bold'; label.style.color='green'; }
        container.appendChild(label);
    });
}

// Populate brand
populateDropdown(document.getElementById('brandOptions'), data.brands, 'brand');

// Populate months
function populateMonths(){
    const container = document.getElementById('monthOptions');
    container.innerHTML='';
    months.forEach(m=>{
        const label = document.createElement('label');
        label.innerHTML = `<input type="checkbox" value="${m}"> ${m}`;
        container.appendChild(label);
    });
}
populateMonths();

// Get selected months
function getSelectedMonths(){
    return Array.from(document.querySelectorAll('#monthOptions input:checked')).map(i=>i.value);
}

// Get selected brands
function getSelectedBrands(){ 
    return Array.from(document.querySelectorAll('#brandOptions input:checked')).map(b=>parseInt(b.value)); 
}

// Show/hide hierarchy
function updateHierarchyDropdowns(){
    const selected = getSelectedBrands();
    const hasHierarchy = selected.some(id=>data.brands.find(b=>b.id===id && b.departments));
    document.getElementById('departmentDropdown').classList.toggle('hidden', !hasHierarchy);
    document.getElementById('categoryDropdown').classList.toggle('hidden', !hasHierarchy);
    document.getElementById('rangeDropdown').classList.toggle('hidden', !hasHierarchy);

    if(hasHierarchy){
        populateDepartments();
        populateCategories();
        populateRanges();
    } else {
        document.getElementById('departmentOptions').innerHTML='';
        document.getElementById('categoryOptions').innerHTML='';
        document.getElementById('rangeOptions').innerHTML='';
    }
}

// Populate Departments
function populateDepartments(){
    const selectedBrands = getSelectedBrands();
    let depts = [];
    data.brands.forEach(b=>{ if(selectedBrands.includes(b.id) && b.departments) depts.push(...b.departments); });
    populateDropdown(document.getElementById('departmentOptions'), depts, 'department');
}

// Populate Categories
function populateCategories(){
    const selectedDepts = Array.from(document.querySelectorAll('#departmentOptions input:checked')).map(d=>parseInt(d.value));
    let cats = [];
    data.brands.flatMap(b=>b.departments||[]).forEach(d=>{ if(selectedDepts.includes(d.id)) cats.push(...d.categories); });
    populateDropdown(document.getElementById('categoryOptions'), cats, 'category');
}

// Populate Ranges
function populateRanges(){
    const selectedCats = Array.from(document.querySelectorAll('#categoryOptions input:checked')).map(c=>parseInt(c.value));
    let ranges = [];
    data.brands.flatMap(b=>b.departments||[]).flatMap(d=>d.categories||[]).forEach(c=>{ if(selectedCats.includes(c.id)) ranges.push(...c.ranges); });
    populateDropdown(document.getElementById('rangeOptions'), ranges, 'range');
}

// Event delegation
['brandOptions','departmentOptions','categoryOptions','rangeOptions'].forEach(id=>{
    document.getElementById(id).addEventListener('change', e=>{
        if(id==='brandOptions') updateHierarchyDropdowns();
        if(id==='departmentOptions') populateCategories();
        if(id==='categoryOptions') populateRanges();
    });
});

// Apply demand
document.getElementById('applyDemandBtn').addEventListener('click', ()=>{
    const value = parseFloat(document.getElementById('demandInput').value);
    const selectedMonths = getSelectedMonths();
    const searchVal = document.getElementById('searchProduct').value.toLowerCase();
    if(isNaN(value)){ alert('Enter valid demand'); return; }
    if(selectedMonths.length===0){ alert('Select at least one month'); return; }

    const selectedBrands = getSelectedBrands();
    selectedBrands.forEach(bid=>{
        const brand = data.brands.find(b=>b.id===bid);
        if(brand.products){ // flat
            brand.products.forEach(p=>{
                if(!demandMap.product[p.id]) demandMap.product[p.id]={};
                selectedMonths.forEach(m=>demandMap.product[p.id][m]=value);
            });
        } else { // hierarchical
            brand.departments.forEach(d=>{
                if(!demandMap.department[d.id]) demandMap.department[d.id]={};
                selectedMonths.forEach(m=>demandMap.department[d.id][m]=value);
                d.categories.forEach(c=>{
                    if(!demandMap.category[c.id]) demandMap.category[c.id]={};
                    selectedMonths.forEach(m=>demandMap.category[c.id][m]=value);
                    c.ranges.forEach(r=>{
                        if(!demandMap.range[r.id]) demandMap.range[r.id]={};
                        selectedMonths.forEach(m=>demandMap.range[r.id][m]=value);
                        r.products.forEach(p=>{
                            if(!demandMap.product[p.id]) demandMap.product[p.id]={};
                            selectedMonths.forEach(m=>demandMap.product[p.id][m]=value);
                        });
                    });
                });
            });
        }
    });

    if(searchVal){
        const allProducts = data.brands.flatMap(b=>b.products||[]).concat(
            data.brands.flatMap(b=>b.departments||[]).flatMap(d=>d.categories||[]).flatMap(c=>c.ranges||[]).flatMap(r=>r.products)
        );
        allProducts.filter(p=>p.name.toLowerCase().includes(searchVal)).forEach(p=>{
            if(!demandMap.product[p.id]) demandMap.product[p.id]={};
            selectedMonths.forEach(m=>demandMap.product[p.id][m]=value);
        });
    }

    renderSelected();
    populateDropdown(document.getElementById('brandOptions'), data.brands, 'brand');
    populateDepartments(); populateCategories(); populateRanges();
});

// Render products with month-wise demand
function renderSelected(){
    const allProducts = data.brands.flatMap(b=>b.products||[]).concat(
        data.brands.flatMap(b=>b.departments||[]).flatMap(d=>d.categories||[]).flatMap(c=>c.ranges||[]).flatMap(r=>r.products)
    );
    const container = document.getElementById('selectedItemsList');
    container.innerHTML='';
    allProducts.forEach(p=>{
        if(demandMap.product[p.id]){
            const monthsStr = Object.entries(demandMap.product[p.id]).map(([m,v])=>`${m}: ${v}%`).join(', ');
            const div = document.createElement('div');
            div.className='item';
            div.innerHTML=`<span>${p.name}</span>: ${monthsStr}`;
            container.appendChild(div);
        }
    });
}
</script>
</body>
</html>
